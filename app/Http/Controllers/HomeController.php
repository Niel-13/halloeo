<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Testimonial;
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

        return view('home', compact('featuredPortfolios', 'testimonials'));
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