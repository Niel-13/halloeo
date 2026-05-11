<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest('updated_at')->get();
        $lastmod    = now()->toAtomString();

        $pages = [
            ['loc' => route('home'),            'priority' => '1.0', 'changefreq' => 'daily',   'lastmod' => $lastmod],
            ['loc' => route('about'),           'priority' => '0.8', 'changefreq' => 'monthly',  'lastmod' => $lastmod],
            ['loc' => route('services'),        'priority' => '0.9', 'changefreq' => 'monthly',  'lastmod' => $lastmod],
            ['loc' => route('portfolio.index'), 'priority' => '0.9', 'changefreq' => 'weekly',   'lastmod' => $lastmod],
            ['loc' => route('contact'),         'priority' => '0.8', 'changefreq' => 'monthly',  'lastmod' => $lastmod],
        ];

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($pages as $page) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$page['loc']}</loc>\n";
            $xml .= "    <lastmod>{$page['lastmod']}</lastmod>\n";
            $xml .= "    <changefreq>{$page['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$page['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        foreach ($portfolios as $portfolio) {
            $loc     = route('portfolio.show', $portfolio->id);
            $lastmod = $portfolio->updated_at->toAtomString();

            $xml .= "  <url>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.7</priority>\n";

            // Include portfolio image in sitemap if available
            if (!empty($portfolio->image_path)) {
                $imageUrl = asset($portfolio->image_path);
                $title    = e($portfolio->title);
                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>{$imageUrl}</image:loc>\n";
                $xml .= "      <image:title>{$title}</image:title>\n";
                $xml .= "    </image:image>\n";
            }

            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
