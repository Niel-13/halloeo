<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = Service::query()
            ->latest()
            ->get(['id', 'title']);

        $query = Portfolio::query()
            ->select(['id', 'title', 'description', 'category', 'image_path', 'client_name', 'project_date', 'created_at', 'updated_at'])
            ->latest();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $portfolios = $query->paginate(9)->withQueryString();

        return view('portfolio', compact('portfolios', 'categories'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::query()
            ->with(['galleries:id,portfolio_id,file_path,type'])
            ->findOrFail($id);

        $relatedPortfolios = Portfolio::query()
            ->where('category', $portfolio->category)
            ->where('id', '!=', $portfolio->id)
            ->latest()
            ->take(3)
            ->get(['id', 'title', 'description', 'category', 'image_path', 'created_at', 'updated_at']);

        return view('portfolio-detail', compact('portfolio', 'relatedPortfolios'));
    }
}
