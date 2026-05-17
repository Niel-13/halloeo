<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPortfolios = Portfolio::query()
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get(['id', 'title', 'description', 'category', 'image_path', 'created_at', 'updated_at']);

        $testimonials = Testimonial::approved()
            ->latest()
            ->limit(6)
            ->get(['id', 'name', 'company', 'rating', 'message', 'created_at', 'updated_at']);

        $galleries = Gallery::query()
            ->where('is_visible', true)
            ->latest()
            ->take(12)
            ->get(['id', 'file_path', 'type', 'created_at', 'updated_at']);

        $services = Service::query()
            ->latest()
            ->get(['id', 'title', 'slug', 'description', 'features', 'icon', 'image_path', 'created_at', 'updated_at']);

        return view('home', compact('featuredPortfolios', 'testimonials', 'galleries', 'services'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
