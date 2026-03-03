@extends('layout')

@section('title', 'Tentang Kami - HalloEO')

@section('styles')
<style>
    .about-hero {
        padding: 8rem 2rem 6rem;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        text-align: center;
        color: var(--white);
    }

    .about-hero h1 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .about-hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
        animation: fadeInUp 0.8s ease-out 0.2s backwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .about-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 6rem 2rem;
    }

    .about-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        margin-bottom: 6rem;
    }

    .about-section:nth-child(even) {
        direction: rtl;
    }

    .about-section:nth-child(even) > * {
        direction: ltr;
    }

    .about-text h2 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 1.5rem;
    }

    .about-text p {
        font-size: 1.15rem;
        line-height: 1.9;
        color: var(--dark);
        opacity: 0.8;
        margin-bottom: 1.5rem;
    }

    .about-image {
        position: relative;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .about-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .about-image:hover img {
        transform: scale(1.1);
    }

    .stats-section {
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        padding: 5rem 2rem;
        margin: 6rem 0;
    }

    .stats-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 3rem;
        text-align: center;
    }

    .stat-item {
        color: var(--white);
    }

    .stat-number {
        font-family: 'Playfair Display', sans-serif;
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: block;
    }

    .stat-label {
        font-size: 1.2rem;
        opacity: 0.95;
    }

    .values-section {
        max-width: 1400px;
        margin: 0 auto;
        padding: 6rem 2rem;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
        margin-top: 3rem;
    }

    .value-card {
        background: var(--white);
        padding: 2.5rem;
        border-radius: 25px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: var(--white);
    }

    .value-card h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.6rem;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .value-card p {
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.8;
    }

    .team-section {
        background: var(--light);
        padding: 6rem 2rem;
    }

    .team-grid {
        max-width: 1200px;
        margin: 3rem auto 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2.5rem;
    }

    .team-card {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        text-align: center;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .team-avatar {
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        border-radius: 50%;
        margin: 2rem auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: var(--white);
        font-family: 'Playfair Display', sans-serif;
        font-weight: 700;
    }

    .team-info {
        padding: 0 2rem 2rem;
    }

    .team-info h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .team-info p {
        color: var(--dark);
        opacity: 0.7;
    }

    @media (max-width: 768px) {
        .about-hero h1 {
            font-size: 2.5rem;
        }

        .about-section {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .about-section:nth-child(even) {
            direction: ltr;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stat-number {
            font-size: 3rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="about-hero">
    <h1>Tentang HalloEO</h1>
    <p>Kami adalah partner terpercaya dalam mewujudkan dekorasi impian Anda dengan karya styrofoam berkualitas tinggi</p>
</section>

<!-- About Content -->
<div class="about-content">
    <!-- Company Story -->
    <div class="about-section">
        <div class="about-text">
            <h2>Perjalanan Kami</h2>
            <p>HalloEO didirikan pada tahun 2008 dengan visi menghadirkan solusi dekorasi dan maskot styrofoam yang berkualitas, kreatif, dan terjangkau untuk berbagai kebutuhan event dan promosi.</p>
            <p>Dengan pengalaman lebih dari 15 tahun di industri ini, kami telah melayani ratusan klien dari berbagai kalangan, mulai dari perusahaan besar, institusi pendidikan, hingga acara pribadi.</p>
            <p>Didukung oleh tim profesional yang berpengalaman dan berdedikasi, kami selalu berkomitmen memberikan hasil terbaik serta kepuasan maksimal dalam setiap proyek yang kami tangani.</p>        </div>
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800" alt="Our Team">
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="about-section">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800" alt="Our Mission">
        </div>
        <div class="about-text">
            <h2>Visi & Misi Kami</h2>
            <p><strong>Visi:</strong> Menjadi perusahaan penyedia jasa dekorasi dan maskot styrofoam terdepan di Indonesia yang dikenal dengan kualitas, kreativitas, dan pelayanan terbaik.</p>
            <p><strong>Misi:</strong></p>
            <ul style="list-style: none; padding: 0; line-height: 2.5;">
                <li>✓ Memberikan solusi dekorasi kreatif dan berkualitas tinggi</li>
                <li>✓ Menggunakan bahan berkualitas premium dengan harga kompetitif</li>
                <li>✓ Memberikan pelayanan profesional dan responsif</li>
                <li>✓ Terus berinovasi mengikuti perkembangan tren terkini</li>
                <li>✓ Membangun kepercayaan jangka panjang dengan klien</li>
            </ul>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="stats-grid">
        <div class="stat-item">
            <span class="stat-number">500+</span>
            <span class="stat-label">Proyek Selesai</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">350+</span>
            <span class="stat-label">Klien Puas</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">5+</span>
            <span class="stat-label">Tahun Pengalaman</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">100%</span>
            <span class="stat-label">Kepuasan Klien</span>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="section-title" style="text-align: center;">
        <h2>Nilai-Nilai Kami</h2>
        <p>Prinsip yang kami pegang dalam setiap pekerjaan</p>
    </div>
    <div class="values-grid">
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3>Passion</h3>
            <p>Kami mencintai setiap karya yang kami buat dan memberikan yang terbaik dengan penuh dedikasi</p>
        </div>
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-medal"></i>
            </div>
            <h3>Quality</h3>
            <p>Kualitas adalah prioritas utama kami dalam setiap detail pekerjaan</p>
        </div>
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <h3>Trust</h3>
            <p>Membangun kepercayaan melalui transparansi, kejujuran, dan integritas</p>
        </div>
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-rocket"></i>
            </div>
            <h3>Innovation</h3>
            <p>Terus berinovasi dan mengikuti tren untuk memberikan solusi terbaik</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="section-title" style="text-align: center;">
        <h2>Tim Kami</h2>
        <p>Orang-orang hebat di balik kesuksesan HalloEO</p>
    </div>
    <div class="team-grid">
        <div class="team-card">
            <div class="team-avatar">B</div>
            <div class="team-info">
                <h3>Budi Santoso</h3>
                <p>Founder & CEO</p>
            </div>
        </div>
        <div class="team-card">
            <div class="team-avatar">A</div>
            <div class="team-info">
                <h3>Ani Wijaya</h3>
                <p>Creative Director</p>
            </div>
        </div>
        <div class="team-card">
            <div class="team-avatar">D</div>
            <div class="team-info">
                <h3>Dedi Kurniawan</h3>
                <p>Production Manager</p>
            </div>
        </div>
        <div class="team-card">
            <div class="team-avatar">S</div>
            <div class="team-info">
                <h3>Siti Rahayu</h3>
                <p>Customer Relations</p>
            </div>
        </div>
    </div>
</section>
@endsection