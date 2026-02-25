@extends('layout')

@section('title', 'Kontak Kami - HalloEO')

@section('styles')
<style>
    .contact-hero {
        padding: 8rem 2rem 6rem;
        background: linear-gradient(135deg, var(--pastel-blue), var(--dark-pastel-red));
        text-align: center;
        color: var(--white);
    }

    .contact-hero h1 {
        font-family: 'Fredoka', sans-serif;
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .contact-hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
        animation: fadeInUp 0.8s ease-out 0.2s backwards;
    }

    .contact-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 6rem 2rem;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 4rem;
        align-items: start;
    }

    .contact-info {
        background: var(--white);
        padding: 3rem;
        border-radius: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 100px;
    }

    .contact-info h2 {
        font-family: 'Fredoka', sans-serif;
        font-size: 2rem;
        color: var(--dark);
        margin-bottom: 2rem;
    }

    .info-item {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    }

    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .info-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--white);
        flex-shrink: 0;
    }

    .info-content h3 {
        font-family: 'Fredoka', sans-serif;
        font-size: 1.3rem;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .info-content p {
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .info-content a {
        color: var(--deep-blue);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .info-content a:hover {
        color: var(--pastel-blue);
    }

    .social-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .social-btn {
        flex: 1;
        min-width: 45%;
        padding: 1rem;
        border-radius: 15px;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        transition: all 0.3s ease;
        color: var(--white);
    }

    .social-btn.whatsapp {
        background: #25D366;
    }

    .social-btn.email {
        background: #EA4335;
    }

    .social-btn.instagram {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }

    .social-btn.facebook {
        background: #1877F2;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .contact-form {
        background: var(--white);
        padding: 3rem;
        border-radius: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .contact-form h2 {
        font-family: 'Fredoka', sans-serif;
        font-size: 2rem;
        color: var(--dark);
        margin-bottom: 2rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.8rem;
        font-size: 1.05rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 1.1rem 1.5rem;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        font-size: 1rem;
        font-family: 'Outfit', sans-serif;
        transition: all 0.3s ease;
        background: var(--light);
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--pastel-blue);
        background: var(--white);
        box-shadow: 0 5px 20px rgba(168, 216, 234, 0.3);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 150px;
    }

    .submit-btn {
        width: 100%;
        padding: 1.3rem;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        border: none;
        border-radius: 15px;
        font-size: 1.2rem;
        font-weight: 700;
        font-family: 'Fredoka', sans-serif;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .map-section {
        margin-top: 4rem;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .map-section iframe {
        width: 100%;
        height: 450px;
        border: none;
    }

    .faq-section {
        max-width: 1000px;
        margin: 6rem auto 0;
        padding: 0 2rem;
    }

    .faq-section h2 {
        font-family: 'Fredoka', sans-serif;
        font-size: 2.5rem;
        color: var(--dark);
        text-align: center;
        margin-bottom: 3rem;
    }

    .faq-item {
        background: var(--white);
        padding: 2rem;
        border-radius: 20px;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .faq-item:hover {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: 'Fredoka', sans-serif;
        font-size: 1.3rem;
        color: var(--dark);
        font-weight: 600;
    }

    .faq-question i {
        color: var(--pastel-blue);
        transition: transform 0.3s ease;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .faq-item.active .faq-answer {
        max-height: 500px;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 2px solid rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 968px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .contact-info {
            position: static;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .social-buttons {
            grid-template-columns: 1fr;
        }

        .social-btn {
            min-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .contact-hero h1 {
            font-size: 2.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="contact-hero">
    <h1>Hubungi Kami</h1>
    <p>Kami siap membantu mewujudkan proyek dekorasi impian Anda. Jangan ragu untuk menghubungi kami!</p>
</section>

<!-- Contact Container -->
<div class="contact-container">
    <div class="contact-grid">
        <!-- Contact Info -->
        <div class="contact-info">
            <h2>Informasi Kontak</h2>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="info-content">
                    <h3>Telepon</h3>
                    <p><a href="tel:+6281234567890">+62 812-3456-7890</a></p>
                    <p><a href="tel:+6281234567891">+62 812-3456-7891</a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info-content">
                    <h3>Email</h3>
                    <p><a href="mailto:info@halloeo.com">info@halloeo.com</a></p>
                    <p><a href="mailto:order@halloeo.com">order@halloeo.com</a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="info-content">
                    <h3>Alamat</h3>
                    <p>Jl. Kreatif No. 123<br>Jakarta Selatan, DKI Jakarta<br>Indonesia 12345</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="info-content">
                    <h3>Jam Operasional</h3>
                    <p>Senin - Jumat: 08:00 - 17:00<br>
                    Sabtu: 09:00 - 15:00<br>
                    Minggu & Libur: Tutup</p>
                </div>
            </div>

            <div class="social-buttons">
                <a href="https://wa.me/6281234567890" class="social-btn whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="mailto:info@halloeo.com" class="social-btn email">
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="https://instagram.com/halloeo" class="social-btn instagram" target="_blank">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="https://facebook.com/halloeo" class="social-btn facebook" target="_blank">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <form action="#" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="08xx xxxx xxxx">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required placeholder="nama@email.com">
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan Yang Dibutuhkan *</label>
                        <select id="service" name="service" required>
                            <option value="">Pilih Layanan</option>
                            <option value="dekorasi">Dekorasi Event</option>
                            <option value="maskot">Maskot Custom</option>
                            <option value="huruf">Huruf Timbul 3D</option>
                            <option value="display">Display Product</option>
                            <option value="patung">Patung & Replika</option>
                            <option value="props">Props Photo Studio</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <input type="text" id="subject" name="subject" placeholder="Subjek pesan Anda">
                </div>

                <div class="form-group">
                    <label for="message">Pesan *</label>
                    <textarea id="message" name="message" required placeholder="Ceritakan detail proyek Anda..."></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i>
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.1751171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sJakarta!5e0!3m2!1sen!2sid!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<!-- FAQ Section -->
<section class="faq-section">
    <h2>Pertanyaan yang Sering Diajukan</h2>
    
    <div class="faq-item">
        <div class="faq-question">
            <span>Berapa lama waktu pengerjaan produk?</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-answer">
            Waktu pengerjaan bervariasi tergantung kompleksitas dan ukuran produk. Untuk produk standar biasanya membutuhkan waktu 3-7 hari kerja. Untuk proyek besar atau custom, kami akan memberikan estimasi waktu setelah konsultasi.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            <span>Apakah bisa custom design sendiri?</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-answer">
            Tentu saja! Kami menerima custom design sesuai keinginan Anda. Tim desainer kami siap membantu mewujudkan ide kreatif Anda menjadi kenyataan. Silakan konsultasikan ide Anda dengan kami.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            <span>Apakah ada minimum order?</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-answer">
            Tidak ada minimum order untuk sebagian besar produk kami. Kami melayani pesanan mulai dari 1 unit hingga dalam jumlah besar. Hubungi kami untuk informasi lebih detail mengenai harga dan ketersediaan.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            <span>Bagaimana sistem pembayaran?</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-answer">
            Kami menerima pembayaran melalui transfer bank, e-wallet, dan untuk order besar bisa dengan sistem DP 50% di muka dan pelunasan sebelum pengiriman. Detail pembayaran akan dijelaskan setelah konfirmasi pesanan.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            <span>Apakah melayani pengiriman ke luar kota?</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-answer">
            Ya, kami melayani pengiriman ke seluruh Indonesia. Produk akan dikemas dengan aman menggunakan packaging khusus untuk memastikan produk sampai dalam kondisi sempurna. Biaya pengiriman disesuaikan dengan jarak dan ukuran produk.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            <span>Apakah ada garansi untuk produk?</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-answer">
            Kami memberikan garansi untuk cacat produksi. Jika ada kerusakan saat pengiriman atau cacat produksi, kami akan melakukan penggantian atau perbaikan. Syarat dan ketentuan garansi akan dijelaskan saat pemesanan.
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // FAQ Accordion
    document.querySelectorAll('.faq-item').forEach(item => {
        item.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(faq => {
                faq.classList.remove('active');
            });
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    // Form validation
    const form = document.querySelector('.contact-form form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Terima kasih! Pesan Anda telah diterima. Tim kami akan segera menghubungi Anda.');
        form.reset();
    });
</script>
@endsection