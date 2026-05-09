<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $xml .= '<url>';
        $xml .= '<loc>' . route('home') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';

        // About Page
        $xml .= '<url>';
        $xml .= '<loc>' . route('about') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';

        // Services Page
        $xml .= '<url>';
        $xml .= '<loc>' . route('services') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.9</priority>';
        $xml .= '</url>';

        // Portfolio Index
        $xml .= '<url>';
        $xml .= '<loc>' . route('portfolio.index') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.9</priority>';
        $xml .= '</url>';

        // Portfolio Detail Pages
        foreach ($portfolios as $portfolio) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('portfolio.show', $portfolio->id) . '</loc>';
            $xml .= '<lastmod>' . $portfolio->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.7</priority>';
            $xml .= '</url>';
        }

        // Contact Page
        $xml .= '<url>';
        $xml .= '<loc>' . route('contact') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}