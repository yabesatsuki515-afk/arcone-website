<?php

namespace App\Http\Controllers;

use App\Support\Faqs;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'faqs' => Faqs::preview(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function works(): View
    {
        return view('pages.works');
    }

    public function faq(): View
    {
        return view('pages.faq', [
            'faqs' => Faqs::all(),
        ]);
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}
