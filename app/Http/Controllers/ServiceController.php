<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->latest()
            ->get(['id', 'title', 'slug', 'description', 'features', 'icon', 'image_path', 'created_at', 'updated_at']);

        return view('services', compact('services'));
    }

    public function show(string $slug)
    {
        return redirect()->route('services', [], 301);
    }
}
