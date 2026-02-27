<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPortfolios = Portfolio::where('is_featured', true)
                                     ->latest()
                                     ->take(6)
                                     ->get();
        
        $testimonials = Testimonial::approved()
            ->latest()
            ->limit(6)
            ->get();

        $galleries = Gallery::where('is_visible', true)->latest()->get();

        return view('home', compact('featuredPortfolios', 'testimonials', 'galleries'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }
}