<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Mengkonversi gambar JPEG/PNG ke format WebP untuk performa lebih baik.
 * Jalankan: php artisan images:optimize
 * Butuh: apt install webp  ATAU  pecl install imagick
 */
class OptimizeImages extends Command
{
    protected $signature   = 'images:optimize {--quality=82 : Kualitas WebP (1-100)}';
    protected $description  = 'Konversi gambar public ke WebP untuk meningkatkan LCP';

    public function handle(): int
    {
        $quality    = (int) $this->option('quality');
        $publicPath = public_path();
        $extensions = ['jpg', 'jpeg', 'png'];
        $converted  = 0;
        $skipped    = 0;

        $files = File::allFiles($publicPath . '/images');

        foreach ($files as $file) {
            $ext = strtolower($file->getExtension());
            if (!in_array($ext, $extensions)) continue;

            $webpPath = $file->getPathname();
            $webpPath = preg_replace('/\.(jpe?g|png)$/i', '.webp', $webpPath);

            if (File::exists($webpPath)) {
                $skipped++;
                continue;
            }

            // Gunakan cwebp jika tersedia
            if (shell_exec('which cwebp')) {
                $cmd = sprintf(
                    'cwebp -q %d %s -o %s 2>/dev/null',
                    $quality,
                    escapeshellarg($file->getPathname()),
                    escapeshellarg($webpPath)
                );
                exec($cmd, $out, $code);
                if ($code === 0) {
                    $this->line("  ✓ " . basename($file->getPathname()) . " → WebP");
                    $converted++;
                }
            } elseif (extension_loaded('imagick')) {
                try {
                    $im = new \Imagick($file->getPathname());
                    $im->setImageFormat('webp');
                    $im->setImageCompressionQuality($quality);
                    $im->writeImage($webpPath);
                    $im->clear();
                    $this->line("  ✓ " . basename($file->getPathname()) . " → WebP");
                    $converted++;
                } catch (\Exception $e) {
                    $this->warn("  ✗ Gagal: " . $e->getMessage());
                }
            } else {
                $this->error('cwebp atau Imagick tidak tersedia. Install dulu: sudo apt install webp');
                return 1;
            }
        }

        $this->info("Selesai: {$converted} dikonversi, {$skipped} sudah ada.");
        return 0;
    }
}
