<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ExhibitionController extends Controller
{
    public function index(): View
    {
        $exhibitions = Exhibition::query()
            ->where('is_primary', 1)
            ->orderBy('updated_at', 'desc')
            ->take(1)
            ->get();

        if ($exhibitions->isEmpty()) {
            $exhibitions = Exhibition::query()
                ->where('status', 'active')
                ->orderBy('updated_at', 'desc')
                ->take(2)
                ->get();

            if ($exhibitions->isEmpty()) {
                $exhibitions = Exhibition::query()
                    ->inRandomOrder()
                    ->take(2)
                    ->get();
            }
        }


        return view('pages.exhibition.index', compact('exhibitions'));
    }

    public function show(Exhibition $exhibition): View
    {
        $images_exhibition = $exhibition->images;
        $exhibition->link_vidio = $this->convertToEmbed($exhibition->link_vidio);
        return view('pages.exhibition.show', compact(['exhibition', 'images_exhibition']));
    }

    public function convertToEmbed($url)
    {
        // Jika format youtu.be/xxxx
        if (Str::contains($url, 'youtu.be/')) {
            return str_replace('youtu.be/', 'www.youtube.com/embed/', $url);
        }

        return $url;
    }
}
