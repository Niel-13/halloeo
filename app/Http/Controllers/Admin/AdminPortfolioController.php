<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Testimonial; // JANGAN LUPA TAMBAHKAN INI
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPortfolioController extends Controller
{
    public function index()
    {
        // Hanya ambil data portfolio, tidak perlu data statistik/testimonial
        $portfolios = Portfolio::latest()->paginate(15);
        
        return view('admin.portfolio.index', compact('portfolios'));
    }
    
    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:dekorasi,maskot,event',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('portfolio', 'public');
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:dekorasi,maskot,event',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($portfolio->image_path) {
                Storage::disk('public')->delete($portfolio->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil diupdate!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        // Delete image
        if ($portfolio->image_path) {
            Storage::disk('public')->delete($portfolio->image_path);
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