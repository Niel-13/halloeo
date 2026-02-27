<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service; // Pastikan Anda sudah membuat model Service
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'features' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $destinationPath = base_path('../public_html/services');
            $file->move($destinationPath, $filename);
            $validated['image_path'] = 'services/' . $filename;
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'features' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            // Hapus foto lama di public_html/services menggunakan unlink()
            if ($service->image_path && file_exists(public_path($service->image_path))) {
                unlink(public_path($service->image_path));
            }
            
            $file = $request->file('image');
            $filename = $file->hashName();
            $destinationPath = base_path('../public_html/services');
            $file->move(public_path('services'), $filename);
            $validated['image_path'] = 'services/' . $filename;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        if ($service->image_path && file_exists(public_path($service->image_path))) {
            unlink(public_path($service->image_path));
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}