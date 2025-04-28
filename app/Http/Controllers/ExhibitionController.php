<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExhibitionController extends Controller
{
    public function index(): View
    {
        $exhibition = Exhibition::query()
            ->where('is_primary', 1)
            ->orderBy('updated_at', 'desc')
            ->first();

        if (!$exhibition) {
            $exhibition = Exhibition::query()
                // ->whereDate('updated_at', '>=', now())
                ->orderBy('updated_at', 'desc')
                ->take(2)
                ->get();
            // dd($exhibitions);

            if (!$exhibition) {
                $exhibition = Exhibition::query()
                    ->inRandomOrder()
                    ->first();
            }
        }

        return view('pages.exhibition.index', compact('exhibition'));
    }

    public function show(Exhibition $exhibition): View
    {
        $images_exhibition = $exhibition->images;
        return view('pages.exhibition.show', compact(['exhibition', 'images_exhibition']));
    }
}
