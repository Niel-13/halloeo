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
        $portfolio = \App\Models\Portfolio::with('galleries')->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:services,title',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'galleries' => 'nullable|array',
            'galleries.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:20480',
        ]);

        try {
            \Illuminate\Support\Facades\DB::beginTransaction();

            $dataToUpdate = [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'client_name' => $validated['client_name'] ?? null,
                'project_date' => $validated['project_date'] ?? null,
                'is_featured' => $validated['is_featured'] ?? 0,
            ];

            if ($request->hasFile('image')) {
                if ($portfolio->image_path && file_exists(base_path('../public_html/' . $portfolio->image_path))) {
                    unlink(base_path('../public_html/' . $portfolio->image_path));
                }

                $file = $request->file('image');
                $filename = time() . '_' . $file->hashName();
                $file->move(base_path('../public_html/portfolio'), $filename);
                $dataToUpdate['image_path'] = 'portfolio/' . $filename;
            }

            $portfolio->update($dataToUpdate);

            if ($request->hasFile('galleries')) {
                $galleryPath = base_path('../public_html/portfolio/galleries');
                
                if (!file_exists($galleryPath)) {
                    mkdir($galleryPath, 0755, true);
                }

                foreach ($request->file('galleries') as $gFile) {
                    $mime = $gFile->getMimeType();
                    $type = str_contains($mime, 'video') ? 'video' : 'image';
                    
                    $gFilename = time() . '_' . $gFile->hashName();
                    $gFile->move($galleryPath, $gFilename);
                    
                    \App\Models\PortfolioGallery::create([
                        'portfolio_id' => $portfolio->id,
                        'type' => $type,
                        'file_path' => 'portfolio/galleries/' . $gFilename
                    ]);
                }
            }

            \Illuminate\Support\Facades\DB::commit();

            return redirect()->route('admin.portfolio.index')
                ->with('success', 'Portfolio berhasil diperbarui!');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            \Illuminate\Support\Facades\Log::error('Error Update Portfolio: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan pada server saat update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            $portfolio = \App\Models\Portfolio::with('galleries')->findOrFail($id);

            if ($portfolio->image_path && file_exists(base_path('../public_html/' . $portfolio->image_path))) {
                unlink(base_path('../public_html/' . $portfolio->image_path));
            }

            if ($portfolio->galleries) {
                foreach ($portfolio->galleries as $gallery) {
                    if ($gallery->file_path && file_exists(base_path('../public_html/' . $gallery->file_path))) {
                        unlink(base_path('../public_html/' . $gallery->file_path));
                    }
                }
            }            $portfolio->delete();

            \Illuminate\Support\Facades\DB::commit();

            return redirect()->route('admin.portfolio.index')
                ->with('success', 'Portfolio beserta semua galerinya berhasil dihapus!');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            \Illuminate\Support\Facades\Log::error('Error Delete Portfolio: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus portfolio: ' . $e->getMessage());
        }
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