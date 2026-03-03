@extends('layout')

@section('title', 'Layanan Kami - HalloEO')

@section('styles')
<style>
    .services-hero {
        padding: 8rem 2rem 6rem;
        background: linear-gradient(135deg, var(--pastel-green), var(--pastel-blue));
        text-align: center;
        color: var(--white);
    }

    .services-hero h1 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .services-hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
        animation: fadeInUp 0.8s ease-out 0.2s backwards;
    }

    .services-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem 2rem;
    }

    .services-grid {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 400px));
        justify-content: center;
        gap: 2rem;
    }

    .service-card {
        background: var(--white);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.5s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--pastel-blue), var(--pastel-green), var(--dark-pastel-red));
        transform: scaleX(0);
        transition: transform 0.5s ease;
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .service-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .service-card:hover .service-image img {
        transform: scale(1.15);
    }

    .service-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(168, 216, 234, 0.9), rgba(184, 224, 210, 0.9));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .service-card:hover .service-overlay {
        opacity: 1;
    }

    .service-icon {
        font-size: 5rem;
        color: var(--white);
        animation: bounceIn 0.5s ease;
    }

    @keyframes bounceIn {
        0% { transform: scale(0); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    .service-content {
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .service-title {
        font-family: 'Playfair Display', sans-serif;
        font-size: 2rem;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .service-description {
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.9;
        margin-bottom: 1.5rem;
        font-size: 1.05rem;
    }

    .service-features {
        list-style: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .service-features li {
        color: var(--dark);
        padding: 0.7rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 1.05rem;
    }

    .service-features li:last-child {
        border-bottom: none;
    }

    .service-features i {
        color: var(--pastel-blue);
        font-size: 1.2rem;
    }

    .service-btn {
        display: inline-block;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: auto;   
        align-self: flex-start; 
    }

    .service-btn:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .process-section {
        background: var(--light);
        padding: 6rem 2rem;
        margin-top: 4rem;
    }

    .process-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .process-step {
        text-align: center;
        position: relative;
    }

    .process-step::after {
        content: '→';
        position: absolute;
        right: -1.5rem;
        top: 50px;
        font-size: 3rem;
        color: var(--pastel-blue);
        opacity: 0.3;
    }

    .process-step:last-child::after {
        display: none;
    }

    .process-number {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-family: 'Playfair Display', sans-serif;
        font-size: 3rem;
        color: var(--white);
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: all 0.4s ease;
    }

    .process-step:hover .process-number {
        transform: rotate(360deg) scale(1.1);
    }

    .process-step h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .process-step p {
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.8;
    }

    .cta-section {
        padding: 6rem 2rem;
        background: linear-gradient(135deg, var(--dark-pastel-red), var(--pastel-blue));
        text-align: center;
        color: var(--white);
    }

    .cta-section h2 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3rem;
        margin-bottom: 1.5rem;
    }

    .cta-section p {
        font-size: 1.3rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 768px) {
        .services-hero {
            padding: 4rem 1.2rem 2rem;
        }

        .services-hero h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .services-section {
            padding: 2rem 1.2rem; 
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem; 
        }

        .process-grid {
            grid-template-columns: 1fr; 
            gap: 2rem;
        }

        .process-step {
            padding: 1.5rem; 
            text-align: center;
        }

        .process-step::after {
            display: none; 
        }
    }
</style>
@endsection

@section('content')
<section class="services-hero">
    <h1>Layanan Kami</h1>
    <p>Solusi lengkap dekorasi dan maskot styrofoam untuk berbagai kebutuhan Anda</p>
</section>

<div class="services-container">
    <div class="services-grid">
        @forelse($services as $service)
        <div class="service-card">
            <div class="service-image">
                <img src="{{ asset($service->image_path) }}" alt="{{ $service->title }}" onerror="this.src='https://via.placeholder.com/800x600?text=HalloEO+Service'">
                
                <div class="service-overlay">
                    <i class="{{ $service->icon }} service-icon"></i>
                </div>
            </div>
            <div class="service-content">
                <h2 class="service-title">{{ $service->title }}</h2>
                <p class="service-description">
                    {{ $service->description }}
                </p>
                
                @if($service->features)
                <ul class="service-features">
                    @php
                        $features = explode("\n", str_replace("\r", "", $service->features));
                    @endphp
                    @foreach($features as $feature)
                        @if(trim($feature) != "")
                        <li><i class="fas fa-check-circle"></i> {{ trim($feature) }}</li>
                        @endif
                    @endforeach
                </ul>
                @endif
                
                <a href="{{ route('contact') }}" class="service-btn">
                    <i class="fas fa-arrow-right"></i> Konsultasi Gratis
                </a>
            </div>
        </div>
        @empty
        <div style="text-align: center; grid-column: 1 / -1; padding: 4rem;">
            <i class="fas fa-concierge-bell" style="font-size: 4rem; color: #ccc; margin-bottom: 1rem;"></i>
            <p style="color: #999;">Maaf, saat ini layanan belum tersedia.</p>
        </div>
        @endforelse
    </div>
</div>

<section class="process-section">
    <div class="process-container">
        <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
            <h2 style="font-family: 'Playfair Display', sans-serif; font-size: 2.5rem; color: var(--dark);">Alur Kerja Kami</h2>
            <p style="color: #7f8c8d;">Proses mudah dan transparan dari konsultasi hingga pengiriman</p>
        </div>
        <div class="process-steps">
            <div class="process-step">
                <div class="process-number">1</div>
                <h3>Konsultasi</h3>
                <p>Diskusikan kebutuhan dan ide Anda dengan tim kami secara gratis</p>
            </div>
            <div class="process-step">
                <div class="process-number">2</div>
                <h3>Desain & Quote</h3>
                <p>Kami buat desain konsep dan penawaran harga yang detail</p>
            </div>
            <div class="process-step">
                <div class="process-number">3</div>
                <h3>Produksi</h3>
                <p>Tim ahli kami mulai memproduksi dengan kualitas terbaik</p>
            </div>
            <div class="process-step">
                <div class="process-number">4</div>
                <h3>Finishing</h3>
                <p>Pengecatan dan detail akhir untuk hasil yang sempurna</p>
            </div>
            <div class="process-step">
                <div class="process-number">5</div>
                <h3>Delivery</h3>
                <p>Pengiriman aman tepat waktu ke lokasi Anda</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <h2>Siap Memulai Proyek Anda?</h2>
    <p>Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik untuk kebutuhan dekorasi Anda!</p>
    <a href="{{ route('contact') }}" class="btn btn-primary" style="background: white; color: var(--dark-pastel-red); border: none; padding: 1rem 2.5rem; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-block;">
        <i class="fas fa-phone"></i> Hubungi Kami Sekarang
    </a>
</section>
@endsection