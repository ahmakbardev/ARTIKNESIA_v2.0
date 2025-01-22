<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExhibitionController extends Controller
{
    public function index(): View
    {
        return view('pages.exhibition.index');
    }

    public function show(Exhibition $exhibition): View
    {
        return view('pages.exhibition.show', compact('exhibition'));
    }
}
