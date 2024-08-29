<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'metadata'   => 'array',
        'detail'     => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($order) {
            $year   = now()->year;
            $month  = now()->month;
            $prefix = 'INV';
            $count  = 1;
            // Update count for the next invoice
            $lastInvoice = static::query()->where('user_id', $order->user_id)->whereMonth('created_at', $month)->whereYear('created_at', $year)->latest('created_at')->first();

            if ($lastInvoice) {
                $lastInvoiceArray = explode('/', $lastInvoice->invoice);

                // Check if the array has at least 4 elements before accessing index 3
                if (isset($lastInvoiceArray[4])) {
                    $count = (int)$lastInvoiceArray[4] + 1;
                }
            }

            // Update the invoice with the correct count
            $order->invoice = $prefix . '/' . $year . '/' . $month . '/' . $order->user_id . '/' . str_pad($count, 5, '0', STR_PAD_LEFT);
        });
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingOrder(): HasOne
    {
        return $this->hasOne(ShippingOrder::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
