<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = \App\Models\Service::all();
        
        $query = Portfolio::query();

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        $portfolios = $query->latest()->paginate(9);

        return view('portfolio', compact('portfolios', 'categories'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $relatedPortfolios = Portfolio::where('category', $portfolio->category)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();

        return view('portfolio-detail', compact('portfolio', 'relatedPortfolios'));
    }
}