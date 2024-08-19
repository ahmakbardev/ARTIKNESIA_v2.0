<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\LogOrderPayment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function midtransHandler(Request $request): JsonResponse
    {
        $data = $request->all();
        Log::info('Midtrans callback', $data);

        $signatureKey = $data['signature_key'];

        $orderId     = $data['order_id'];
        $statusCode  = $data['status_code'];
        $grossAmount = $data['gross_amount'];
        $serverKey   = env('MIDTRANS_SERVER_KEY');

        $mySignatureKey = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        $transactionStatus = $data['transaction_status'];
        $type              = $data['payment_type'];
        $fraudStatus       = $data['fraud_status'];

        if ($signatureKey !== $mySignatureKey) {
            return response()->json([
                'status'  => 'error',
                'message' => 'invalid signature',
            ], 400);
        }

        $realOrderId = explode('-', $orderId);
        $order       = Order::query()->find($realOrderId[0]);

        if (!$order) {
            return response()->json([
                'status'  => 'error',
                'message' => 'order id not found',
            ], 404);
        }

        if ($order->status === 'success') {
            return response()->json([
                'status'  => 'error',
                'message' => 'operation not permitted',
            ], 405);
        }

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $order->status = 'challenge';
            } else if ($fraudStatus == 'accept') {
                $order->status = 'success';
            }
        } else if ($transactionStatus == 'settlement') {
            $order->status = 'success';
        } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $order->status = 'failure';
            $orderItems    = OrderItem::query()->where('order_id', $order->id)->get();
            foreach ($orderItems as $orderItem) {
                $product = Karya::query()->find($orderItem->product_id);
                $product->update([
                    'stock' => $product->stock + $orderItems->quantity,
                ]);
            }
        } else if ($transactionStatus == 'pending') {
            $order->status = 'pending';
        }

        $logData = [
            'status'       => $transactionStatus,
            'raw_response' => json_encode($data),
            'order_id'     => $realOrderId[0],
            'payment_type' => $type,
        ];

        LogOrderPayment::query()->create($logData);
        $order->save();

        if ($order->status === 'success') {
            // Action on success
        }

        return response()->json('Ok');
    }
}
