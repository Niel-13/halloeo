<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;

class SitemapController extends Controller
{
    public function index()
    {
        $now = now()->toAtomString();

        $latestPortfolioUpdate = Portfolio::query()->max('updated_at');
        $latestServiceUpdate = Service::query()->max('updated_at');

        $pages = [
            ['loc' => route('home'),            'priority' => '1.0', 'changefreq' => 'weekly',  'lastmod' => $latestPortfolioUpdate ?: $now],
            ['loc' => route('about'),           'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['loc' => route('services'),        'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $latestServiceUpdate ?: $now],
            ['loc' => route('portfolio.index'), 'priority' => '0.9', 'changefreq' => 'weekly',  'lastmod' => $latestPortfolioUpdate ?: $now],
            ['loc' => route('contact'),         'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $now],
        ];

        $portfolios = Portfolio::query()
            ->latest('updated_at')
            ->get(['id', 'title', 'image_path', 'updated_at']);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($pages as $page) {
            $xml .= $this->urlNode($page['loc'], $page['lastmod'], $page['changefreq'], $page['priority']);
        }

        foreach ($portfolios as $portfolio) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . $this->xml(route('portfolio.show', $portfolio->id)) . "</loc>\n";
            $xml .= '    <lastmod>' . $this->xml(optional($portfolio->updated_at)->toAtomString() ?: $now) . "</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.7</priority>\n";

            if (!empty($portfolio->image_path)) {
                $xml .= "    <image:image>\n";
                $xml .= '      <image:loc>' . $this->xml(asset($portfolio->image_path)) . "</image:loc>\n";
                $xml .= '      <image:title>' . $this->xml($portfolio->title) . "</image:title>\n";
                $xml .= "    </image:image>\n";
            }

            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=21600');
    }

    private function urlNode(string $loc, string $lastmod, string $changefreq, string $priority): string
    {
        return "  <url>\n"
            . '    <loc>' . $this->xml($loc) . "</loc>\n"
            . '    <lastmod>' . $this->xml($lastmod) . "</lastmod>\n"
            . '    <changefreq>' . $this->xml($changefreq) . "</changefreq>\n"
            . '    <priority>' . $this->xml($priority) . "</priority>\n"
            . "  </url>\n";
    }

    private function xml(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
    }
}
