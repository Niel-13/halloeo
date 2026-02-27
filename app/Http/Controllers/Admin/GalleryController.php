<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:51200', // Max 50MB
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $type = in_array(strtolower($extension), ['mp4', 'mov', 'avi']) ? 'video' : 'image';
        $filename = $file->hashName();
        $destinationPath = base_path('../public_html/galleries');
        $file->move($destinationPath, $filename);
        $path = 'galleries/' . $filename;

        Gallery::create([
            'file_path' => $path,
            'type' => $type,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'File berhasil diunggah ke Galeri!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $filePath = base_path('../public_html/' . $gallery->file_path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'File berhasil dihapus dari Galeri!');
    }
    public function toggleVisibility($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->is_visible = !$gallery->is_visible;
        $gallery->save();

        $status = $gallery->is_visible ? 'ditampilkan' : 'disembunyikan';
        return back()->with('success', "File galeri berhasil $status di website!");
    }

}