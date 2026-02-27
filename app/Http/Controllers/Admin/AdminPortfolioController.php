<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(15);
        
        return view('admin.portfolio.index', compact('portfolios'));
    }
    
    public function create()
    {
        $services = \App\Models\Service::all();
        return view('admin.portfolio.create', compact('services'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:services,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            // Pindah langsung ke public/portfolio
            $file->move(public_path('portfolio'), $filename);
            $validated['image_path'] = 'portfolio/' . $filename;
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $services = \App\Models\Service::all();
        return view('admin.portfolio.edit', compact('portfolio', 'services'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:services,title',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus foto lama di public_html/portfolio
            if ($portfolio->image_path && file_exists(public_path($portfolio->image_path))) {
                unlink(public_path($portfolio->image_path));
            }
            
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('portfolio'), $filename);
            $validated['image_path'] = 'portfolio/' . $filename;
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil diupdate!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        // Hapus file fisik dari public_html/portfolio
        if ($portfolio->image_path && file_exists(public_path($portfolio->image_path))) {
            unlink(public_path($portfolio->image_path));
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }

    public function toggleFeatured($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->is_featured = !$portfolio->is_featured;
        $portfolio->save();

        return redirect()->back()
            ->with('success', 'Status featured berhasil diubah!');
    }
}