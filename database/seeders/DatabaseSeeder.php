<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Portfolio::truncate();
        Testimonial::truncate();
        ContactMessage::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ===== CREATE ADMIN USER =====
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@halloeo.com',
            'username' => 'admin',
            'password' => 'halloeo2024', // Will be auto-hashed by model
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->command->info('✅ Admin user created!');
        $this->command->info('   Username: admin');
        $this->command->info('   Password: halloeo2024');
        $this->command->info('   Email: admin@halloeo.com');

        // ===== SEED PORTFOLIOS =====
        $portfolios = [
            [
                'title' => 'Dekorasi Pernikahan Garden Party',
                'description' => 'Dekorasi pernikahan outdoor dengan konsep garden party yang elegan. Menggunakan styrofoam untuk membuat backdrop, huruf nama pengantin, dan ornamen bunga yang indah.',
                'category' => 'dekorasi',
                'image_path' => 'portfolio/wedding-1.jpg',
                'client_name' => 'Andi & Sari Wedding',
                'project_date' => now()->subMonths(2),
                'is_featured' => true,
            ],
            [
                'title' => 'Maskot Brand Makanan',
                'description' => 'Pembuatan maskot 3D untuk brand makanan lokal. Maskot berkarakter lucu dengan tinggi 2 meter, sangat eye-catching untuk booth pameran dan promosi.',
                'category' => 'maskot',
                'image_path' => 'portfolio/mascot-1.jpg',
                'client_name' => 'PT Kuliner Nusantara',
                'project_date' => now()->subMonths(1),
                'is_featured' => true,
            ],
            [
                'title' => 'Booth Exhibition Tech Startup',
                'description' => 'Desain dan pembuatan booth exhibition untuk startup teknologi. Menggunakan huruf timbul 3D dan display product yang modern dan futuristik.',
                'category' => 'event',
                'image_path' => 'portfolio/booth-1.jpg',
                'client_name' => 'TechVenture Indonesia',
                'project_date' => now()->subMonths(3),
                'is_featured' => true,
            ],
            [
                'title' => 'Dekorasi Ulang Tahun Anak Tema Unicorn',
                'description' => 'Dekorasi ulang tahun anak dengan tema unicorn yang penuh warna. Lengkap dengan backdrop, standing figure unicorn, dan props photo booth.',
                'category' => 'dekorasi',
                'image_path' => 'portfolio/birthday-1.jpg',
                'client_name' => 'Keluarga Budi',
                'project_date' => now()->subWeeks(3),
                'is_featured' => true,
            ],
            [
                'title' => 'Logo Perusahaan 3D',
                'description' => 'Huruf timbul 3D untuk logo perusahaan dengan finishing premium. Dipasang di lobby kantor sebagai focal point yang menarik perhatian.',
                'category' => 'dekorasi',
                'image_path' => 'portfolio/logo-1.jpg',
                'client_name' => 'PT Maju Bersama',
                'project_date' => now()->subMonths(4),
                'is_featured' => false,
            ],
            [
                'title' => 'Maskot Event Festival Musik',
                'description' => 'Maskot custom untuk festival musik tahunan. Design karakter yang energik dan memorable, sempurna untuk foto bersama pengunjung.',
                'category' => 'maskot',
                'image_path' => 'portfolio/mascot-2.jpg',
                'client_name' => 'Jakarta Music Festival',
                'project_date' => now()->subMonths(5),
                'is_featured' => true,
            ],
            [
                'title' => 'Display Product Mall',
                'description' => 'Standing display dan backdrop untuk tenant di mall. Design minimalis modern dengan branding yang kuat.',
                'category' => 'event',
                'image_path' => 'portfolio/display-1.jpg',
                'client_name' => 'Fashion Store XYZ',
                'project_date' => now()->subWeeks(2),
                'is_featured' => false,
            ],
            [
                'title' => 'Dekorasi Grand Opening Cafe',
                'description' => 'Dekorasi grand opening cafe dengan konsep instagramable. Menggunakan huruf timbul, frame photo, dan ornamen dekoratif.',
                'category' => 'dekorasi',
                'image_path' => 'portfolio/cafe-1.jpg',
                'client_name' => 'Kopi Hangat Cafe',
                'project_date' => now()->subWeeks(1),
                'is_featured' => true,
            ],
            [
                'title' => 'Props Photo Studio Wedding',
                'description' => 'Berbagai props photo untuk studio wedding. Termasuk frame 3D, background bertema, dan ornamen dekoratif lainnya.',
                'category' => 'dekorasi',
                'image_path' => 'portfolio/props-1.jpg',
                'client_name' => 'Dream Wedding Studio',
                'project_date' => now()->subMonths(2),
                'is_featured' => false,
            ],
            [
                'title' => 'Dekorasi Acara Seminar Perusahaan',
                'description' => 'Dekorasi backdrop dan podium untuk acara seminar perusahaan. Professional dan elegant dengan branding yang jelas.',
                'category' => 'event',
                'image_path' => 'portfolio/seminar-1.jpg',
                'client_name' => 'PT Innovasi Digital',
                'project_date' => now()->subWeeks(4),
                'is_featured' => false,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }

        $this->command->info('✅ 10 Portfolios seeded!');

        // ===== SEED TESTIMONIALS =====
        $testimonials = [
            [
                'name' => 'Sarah Wijaya',
                'company' => 'Event Organizer Pro',
                'message' => 'HalloEO sangat profesional! Dekorasi pernikahan yang dibuat melebihi ekspektasi kami. Tim yang sangat responsif dan hasil akhir yang sempurna. Highly recommended!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Budi Santoso',
                'company' => 'PT Teknologi Maju',
                'message' => 'Maskot yang dibuat untuk brand kami benar-benar luar biasa! Detail dan finishingnya sangat rapi. Klien kami sangat impressed dengan mascot ini. Terima kasih HalloEO!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Diana Putri',
                'company' => 'Wedding Planner',
                'message' => 'Sudah berkali-kali order di HalloEO untuk berbagai acara pernikahan klien. Selalu puas dengan hasil dan pelayanannya. Tepat waktu dan sesuai request.',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Andi Kurniawan',
                'company' => 'Startup Tech',
                'message' => 'Booth exhibition yang dibuat sangat keren! Modern dan eye-catching. Banyak pengunjung yang tertarik datang ke booth kami. Worth it banget!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Lisa Permata',
                'company' => null,
                'message' => 'Dekorasi ulang tahun anak saya jadi sangat memorable berkat HalloEO. Anak-anak senang sekali dengan dekorasinya yang lucu dan colorful. Terima kasih!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Rudi Hermawan',
                'company' => 'PT Kreatif Indonesia',
                'message' => 'Kualitas produk bagus dengan harga yang reasonable. Proses pemesanan mudah dan komunikasi lancar. Akan order lagi untuk project berikutnya.',
                'rating' => 4,
                'is_approved' => true,
            ],
            [
                'name' => 'Nina Rahayu',
                'company' => 'Fashion Store',
                'message' => 'Display product yang dibuat sangat menarik perhatian customer. Sales kami meningkat sejak pakai display dari HalloEO. Recommended!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Dedi Wijaya',
                'company' => 'Cafe Owner',
                'message' => 'Grand opening cafe jadi lebih meriah dengan dekorasi dari HalloEO. Banyak yang foto-foto dan share di social media. Great for branding!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Putri Ayu',
                'company' => null,
                'message' => 'Pelayanan ramah dan hasil memuaskan. Recommended untuk yang cari dekorasi styrofoam berkualitas!',
                'rating' => 5,
                'is_approved' => false, // Pending approval
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('✅ 9 Testimonials seeded! (8 approved, 1 pending)');

        // ===== SEED CONTACT MESSAGES =====
        $messages = [
            [
                'name' => 'Ahmad Fauzi',
                'phone' => '081234567890',
                'email' => 'ahmad.fauzi@email.com',
                'service' => 'dekorasi',
                'subject' => 'Tanya Harga Dekorasi Pernikahan',
                'message' => 'Halo, saya mau tanya untuk dekorasi pernikahan outdoor kapasitas 200 orang. Kira-kira harganya berapa ya? Terima kasih.',
                'status' => 'new',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'phone' => '082345678901',
                'email' => 'siti.nur@email.com',
                'service' => 'maskot',
                'subject' => 'Order Maskot Brand',
                'message' => 'Saya tertarik untuk membuat maskot untuk brand saya. Apakah bisa konsultasi terlebih dahulu?',
                'status' => 'read',
                'read_at' => now()->subHours(2),
            ],
            [
                'name' => 'Budi Pramono',
                'phone' => '083456789012',
                'email' => 'budi.pramono@company.com',
                'service' => 'event',
                'subject' => 'Booth Exhibition',
                'message' => 'Kami butuh booth untuk pameran bulan depan. Mohon info detail dan quotation. Terima kasih.',
                'status' => 'replied',
                'read_at' => now()->subDays(1),
                'admin_notes' => 'Sudah dikirim quotation via email. Follow up tanggal 25.',
            ],
            [
                'name' => 'Linda Kartika',
                'phone' => '084567890123',
                'email' => 'linda.k@email.com',
                'service' => 'dekorasi',
                'subject' => null,
                'message' => 'Bagus sekali portfolio yang ditampilkan! Kapan bisa konsultasi untuk acara saya?',
                'status' => 'new',
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }

        $this->command->info('✅ 4 Contact Messages seeded!');
        $this->command->info('');
        $this->command->info('================================================');
        $this->command->info('Database seeded successfully!');
        $this->command->info('================================================');
        $this->command->info('');
        $this->command->info('📊 Summary:');
        $this->command->info('   - 1 Admin User');
        $this->command->info('   - 10 Portfolio Items (6 featured)');
        $this->command->info('   - 9 Testimonials (8 approved, 1 pending)');
        $this->command->info('   - 4 Contact Messages (2 new, 1 read, 1 replied)');
        $this->command->info('');
        $this->command->info('🔐 Admin Login:');
        $this->command->info('   URL: http://localhost:8000/admin/login');
        $this->command->info('   Username: admin');
        $this->command->info('   Password: halloeo2024');
        $this->command->info('');
    }
}