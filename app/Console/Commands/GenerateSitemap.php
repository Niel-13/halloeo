<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schedule;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Portfolio;

Schedule::command('sitemap:generate')->daily();

class GenerateSitemap extends Command
{
    /**
     * Nama perintah yang akan dipanggil di terminal
     */
    protected $signature = 'sitemap:generate';

    /**
     * Deskripsi perintah
     */
    protected $description = 'Generate sitemap.xml otomatis untuk HalloEO';
    
    public function handle()
    {
        // 1. Masukkan halaman statis (Home, Tentang Kami, Layanan, dll)
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create('/tentang-kami')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/layanan-kami')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/portofolio')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

        // 2. Looping halaman dinamis dari Database
        // Ini akan mengambil semua data portfolio/maskot yang ada
        $portfolios = Portfolio::all(); 
        
        foreach ($portfolios as $item) {
            $sitemap->add(
                // Jika URL kamu pakai ID: "/portfolio/{$item->id}"
                // Jika URL kamu pakai Slug: "/portfolio/{$item->slug}"
                Url::create("/portfolio/{$item->id}") 
                    ->setLastModificationDate($item->updated_at)
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        }

        // 3. Simpan file ke folder public
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Mantap! Sitemap.xml berhasil diperbarui.');
    }
}
