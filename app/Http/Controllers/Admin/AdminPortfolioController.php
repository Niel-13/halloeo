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
            'galleries' => 'nullable|array', 
            'galleries.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:50480', 
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $destinationPath = base_path('../public_html/portfolio');
            $file->move($destinationPath, $filename);
            $validated['image_path'] = 'portfolio/' . $filename;
        }

        $portfolio = Portfolio::create($validated);

        if ($request->hasFile('galleries')) {
            $galleryDestinationPath = base_path('../public_html/portfolio/galleries');

            if (!file_exists($galleryDestinationPath)) {
                mkdir($galleryDestinationPath, 0755, true);
            }

            foreach ($request->file('galleries') as $galleryFile) {
                $mimeType = $galleryFile->getMimeType();
                $type = str_contains($mimeType, 'video') ? 'video' : 'image';

                $galleryFilename = time() . '_' . $galleryFile->hashName();
                
                $galleryFile->move($galleryDestinationPath, $galleryFilename);
                
                \App\Models\PortfolioGallery::create([
                    'portfolio_id' => $portfolio->id,
                    'type'         => $type,
                    'file_path'    => 'portfolio/galleries/' . $galleryFilename,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio dan galeri berhasil ditambahkan!');
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
            if ($portfolio->image_path && file_exists(public_path($portfolio->image_path))) {
                unlink(public_path($portfolio->image_path));
            }
            
            $file = $request->file('image');
            $filename = $file->hashName();
            $destinationPath = base_path('../public_html/portfolio');
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