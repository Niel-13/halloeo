<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(20);
        $pendingCount = Testimonial::where('is_approved', false)->count();
        
        return view('admin.testimonial.index', compact('testimonials', 'pendingCount'));
    }

    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_approved = true;
        $testimonial->save();

        return redirect()->back()
            ->with('success', 'Testimonial berhasil disetujui!');
    }

    public function reject($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_approved = false;
        $testimonial->save();

        return redirect()->back()
            ->with('success', 'Testimonial berhasil ditolak!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()
            ->with('success', 'Testimonial berhasil dihapus!');
    }

    public function pending()
    {
        $testimonials = Testimonial::where('is_approved', false)
            ->latest()
            ->paginate(20);
        $pendingCount = $testimonials->total();

        return view('admin.testimonial.pending', compact('testimonials', 'pendingCount'));
    }
}