<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Mengambil data dari database agar variabel $services terdefinisi
        $services = Service::latest()->get(); 
        
        // Mengirim ke view 'services.blade.php'
        return view('services', compact('services'));
    }
}