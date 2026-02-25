<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\ContactMessage; 
class AdminDashboardController extends Controller
{
   public function index()
{
    // 1. Siapkan data statistik (Mirip Dashboard)
    $stats = [
        'total_portfolios' => Portfolio::count(),
        'featured_portfolios' => Portfolio::where('is_featured', true)->count(),
        'total_testimonials' => Testimonial::count(),
        'approved_testimonials' => Testimonial::where('is_approved', true)->count(),
        'pending_testimonials' => Testimonial::where('is_approved', false)->count(),
    ];

    // 2. Siapkan data tabel
    $recentPortfolios = Portfolio::latest()->take(5)->get();
    $recentTestimonials = Testimonial::latest()->take(5)->get();

    // 3. Kirim semua variabel ke view (Perhatikan nama variabelnya)
    return view('admin.dashboard', compact('stats', 'recentPortfolios', 'recentTestimonials'));
}
}