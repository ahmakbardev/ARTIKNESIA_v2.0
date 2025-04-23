<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExhibitionController extends Controller
{
    public function index(): View
    {
        $exhibitions = Exhibition::query()
            ->where('is_primary', 1)
            ->orderBy('updated_at', 'desc')
            ->first();

        if (!$exhibitions) {
            $exhibitions = Exhibition::query()
                // ->whereDate('updated_at', '>=', now())
                ->orderBy('updated_at', 'desc')
                ->take(2)
                ->get();
            // dd($exhibitions);

            if (!$exhibitions) {
                $exhibitions = Exhibition::query()
                    ->inRandomOrder()
                    ->first();
            }
        }

        return view('pages.exhibition.index', compact('exhibitions'));
    }

    public function show(Exhibition $exhibition): View
    {
        return view('pages.exhibition.show', compact('exhibition'));
    }
}
