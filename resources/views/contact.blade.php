@extends('layout')

@section('title', 'Kontak Kami - HalloEO')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   CONTACT PAGE — HalloEO
   Consistent with Portfolio & Services · Editorial · Soft Luxury
═══════════════════════════════════════════════ */

/* ── Hero ── */
.contact-hero {
    min-height: 46vh;
    display: flex;
    align-items: flex-end;
    padding: 0 2.5rem 4.5rem;
    background: var(--dark);
    position: relative;
    overflow: hidden;
}

.contact-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 55% 80% at 5%  20%, rgba(168,216,234,.13) 0%, transparent 55%),
        radial-gradient(ellipse 45% 70% at 95% 80%, rgba(184,224,210,.10) 0%, transparent 55%),
        radial-gradient(ellipse 55% 55% at 50% 110%, rgba(216,138,138,.07) 0%, transparent 50%);
    pointer-events: none;
    animation: ct-mesh-drift 18s ease-in-out infinite alternate;
}

@keyframes ct-mesh-drift {
    from { opacity: .7; transform: scale(1); }
    to   { opacity: 1;  transform: scale(1.04); }
}

.contact-hero::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

.hero-deco-word {
    position: absolute;
    right: 2.5rem;
    top: 50%;
    transform: translateY(-52%);
    font-family: var(--font-display);
    font-size: clamp(8rem, 18vw, 16rem);
    font-weight: 900;
    line-height: 1;
    color: rgba(168,216,234,.06);
    pointer-events: none;
    user-select: none;
    letter-spacing: -0.04em;
    white-space: nowrap;
}

.contact-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 1360px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 2rem;
    padding-top: 7rem;
}

.hero-left { flex: 1; }

.hero-eyebrow-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.25rem;
    animation: ct-fade-up .7s cubic-bezier(0,0,.2,1) both;
}

.hero-line {
    width: 36px; height: 2px;
    background: linear-gradient(90deg, var(--blue), var(--green));
    border-radius: 2px;
    flex-shrink: 0;
}

.hero-eyebrow-badge {
    background: rgba(168,216,234,.12);
    color: var(--blue-muted);
    border: 1px solid rgba(168,216,234,.25);
    border-radius: 50px;
    padding: 0.22rem 0.78rem;
    font-size: 0.71rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
}

.contact-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.8rem, 6.5vw, 5.5rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.03em;
    line-height: 1.08;
    margin-bottom: 1.5rem;
    animation: ct-fade-up .8s cubic-bezier(0,0,.2,1) .08s both;
}

.contact-hero h1 span {
    display: block;
    background: linear-gradient(135deg, var(--blue-muted) 0%, var(--green-deep) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-right {
    flex-shrink: 0;
    max-width: 280px;
    text-align: right;
    animation: ct-fade-up .8s cubic-bezier(0,0,.2,1) .18s both;
    padding-bottom: 0.5rem;
}

.hero-right p {
    font-size: 1rem;
    color: rgba(255,255,255,.5);
    line-height: 1.75;
    margin-bottom: 1.5rem;
}

.hero-stats {
    display: flex;
    gap: 2rem;
    justify-content: flex-end;
}

.hero-stat strong {
    display: block;
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
}

.hero-stat span {
    font-size: 0.74rem;
    color: rgba(255,255,255,.4);
    letter-spacing: 0.06em;
    text-transform: uppercase;
}

@keyframes ct-fade-up {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Main Container ── */
.contact-container {
    max-width: 1360px;
    margin: 0 auto;
    padding: 4rem 2.5rem 6rem;
}

/* ── Section intro ── */
.ct-section-intro {
    margin-bottom: 2.5rem;
}

.ct-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.74rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 0.6rem;
}

.ct-eyebrow::before {
    content: '';
    width: 20px; height: 2px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
    border-radius: 2px;
    flex-shrink: 0;
}

.ct-section-intro h2 {
    font-family: var(--font-display);
    font-size: clamp(1.7rem, 3vw, 2.4rem);
    font-weight: 800;
    color: var(--dark);
    letter-spacing: -0.02em;
    line-height: 1.15;
}

.ct-section-intro h2 span { color: var(--blue-deep); }

/* ── Contact Grid ── */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 1.5rem;
    align-items: start;
}

/* ── Info Card ── */
.contact-info-card {
    background: var(--white);
    border-radius: 20px;
    overflow: hidden;
    border: 1.5px solid var(--surface-alt);
    box-shadow: var(--shadow-sm);
    position: sticky;
    top: 90px;
    transition: box-shadow var(--t-slow);
    animation: ct-fade-up .55s cubic-bezier(0,0,.2,1) .04s both;
}

.contact-info-card:hover {
    box-shadow: var(--shadow-lg);
}

.info-card-header {
    padding: 2rem 2rem 1.5rem;
    border-bottom: 1.5px solid var(--surface-alt);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.info-card-header-icon {
    width: 44px; height: 44px;
    background: linear-gradient(135deg, var(--blue-deep), var(--green-deep));
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    color: var(--white);
    font-size: 1.1rem;
    flex-shrink: 0;
}

.info-card-header h2 {
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--dark);
    letter-spacing: -0.02em;
    line-height: 1.2;
}

.info-card-header p {
    font-size: 0.78rem;
    color: var(--muted);
    margin-top: 0.1rem;
}

/* Info items */
.info-items {
    padding: 0.5rem 0;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.2rem 2rem;
    border-bottom: 1px solid var(--surface-alt);
    transition: background var(--t-base);
}

.info-item:last-child { border-bottom: none; }
.info-item:hover { background: var(--light); }

.info-item-icon {
    width: 40px; height: 40px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.95rem;
    color: var(--white);
    flex-shrink: 0;
    transition: transform var(--t-base);
}

.info-item:hover .info-item-icon { transform: scale(1.08); }

.info-item:nth-child(1) .info-item-icon { background: linear-gradient(135deg, var(--blue-deep),  var(--blue));  }
.info-item:nth-child(2) .info-item-icon { background: linear-gradient(135deg, var(--green-deep), var(--green)); }
.info-item:nth-child(3) .info-item-icon { background: linear-gradient(135deg, var(--red-deep),   var(--red-pastel)); }
.info-item:nth-child(4) .info-item-icon { background: linear-gradient(135deg, var(--gold),        #e8c97a); }

.info-item-body h3 {
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.3rem;
    letter-spacing: -0.01em;
}

.info-item-body p {
    font-size: 0.85rem;
    color: var(--muted);
    line-height: 1.7;
}

.info-item-body a {
    color: var(--blue-deep);
    text-decoration: none;
    transition: color var(--t-base);
}

.info-item-body a:hover { color: var(--green-deep); }

/* Social buttons */
.social-section {
    padding: 1.5rem 2rem 2rem;
    border-top: 1.5px solid var(--surface-alt);
}

.social-section-label {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.social-section-label::before {
    content: '';
    width: 14px; height: 1.5px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
    border-radius: 2px;
}

.social-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.65rem;
}

.social-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.55rem;
    padding: 0.7rem 0.8rem;
    border-radius: 10px;
    font-size: 0.82rem;
    font-weight: 700;
    text-decoration: none;
    color: var(--white);
    transition: transform var(--t-base), box-shadow var(--t-base);
}

.social-btn:hover { transform: translateY(-2px); }

.social-btn.whatsapp  { background: #25D366; box-shadow: 0 4px 12px rgba(37,211,102,.25); }
.social-btn.tiktok    { background: #111;    box-shadow: 0 4px 12px rgba(0,0,0,.25); }
.social-btn.instagram { background: linear-gradient(45deg,#f09433,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888); box-shadow: 0 4px 12px rgba(220,39,67,.25); }
.social-btn.facebook  { background: #1877F2; box-shadow: 0 4px 12px rgba(24,119,242,.25); }

.social-btn:hover { transform: translateY(-2px) scale(1.02); }

/* ── Form Card ── */
.contact-form-card {
    background: var(--white);
    border-radius: 20px;
    overflow: hidden;
    border: 1.5px solid var(--surface-alt);
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--t-slow);
    animation: ct-fade-up .55s cubic-bezier(0,0,.2,1) .1s both;
}

.contact-form-card:hover { box-shadow: var(--shadow-lg); }

.form-card-header {
    padding: 2rem 2rem 1.5rem;
    border-bottom: 1.5px solid var(--surface-alt);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.form-card-header-icon {
    width: 44px; height: 44px;
    background: linear-gradient(135deg, var(--green-deep), var(--green));
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    color: var(--white);
    font-size: 1.1rem;
    flex-shrink: 0;
}

.form-card-header h2 {
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--dark);
    letter-spacing: -0.02em;
    line-height: 1.2;
}

.form-card-header p {
    font-size: 0.78rem;
    color: var(--muted);
    margin-top: 0.1rem;
}

.contact-form {
    padding: 2rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-group {
    margin-bottom: 1.15rem;
}

.form-group label {
    display: block;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: var(--dark-mid);
    margin-bottom: 0.5rem;
    text-transform: uppercase;
}

.form-group label .req {
    color: var(--red-deep);
    margin-left: 2px;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 0.8rem 1rem;
    background: var(--light);
    border: 1.5px solid var(--surface-alt);
    border-radius: 10px;
    font-size: 0.9rem;
    font-family: var(--font-body);
    color: var(--dark);
    transition: border-color var(--t-base), background var(--t-base), box-shadow var(--t-base);
    outline: none;
    -webkit-appearance: none;
    appearance: none;
}

.form-group select {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%236B7C8E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.9rem center;
    background-size: 1em;
    padding-right: 2.5rem;
    cursor: pointer;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: var(--muted);
    font-size: 0.88rem;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: var(--blue-mid);
    background: var(--white);
    box-shadow: 0 0 0 3px rgba(90,157,184,.12);
}

.form-group textarea {
    resize: vertical;
    min-height: 130px;
    line-height: 1.6;
}

.form-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding-top: 0.5rem;
}

.form-note {
    font-size: 0.76rem;
    color: var(--muted);
    line-height: 1.5;
}

.form-note i { color: var(--green-deep); margin-right: 3px; }

.submit-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.55rem;
    padding: 0.85rem 2rem;
    background: linear-gradient(135deg, var(--blue-deep), var(--green-deep));
    color: var(--white);
    border: none;
    border-radius: 50px;
    font-family: var(--font-body);
    font-size: 0.9rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(90,157,184,.35);
    transition: transform var(--t-base), box-shadow var(--t-base);
    white-space: nowrap;
    flex-shrink: 0;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(90,157,184,.45);
}

/* ── Map Section ── */
.map-section {
    margin-top: 1.5rem;
    border-radius: 20px;
    overflow: hidden;
    border: 1.5px solid var(--surface-alt);
    box-shadow: var(--shadow-sm);
}

.map-section iframe {
    width: 100%;
    height: 320px;
    border: none;
    display: block;
}

/* ═══════════════════════════════════════════════
   FAQ SECTION
═══════════════════════════════════════════════ */
.faq-section {
    background: var(--dark);
    position: relative;
    overflow: hidden;
    padding: 6rem 2.5rem;
    margin-top: 0;
}

.faq-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 50% 60% at 0% 50%,   rgba(168,216,234,.06) 0%, transparent 55%),
        radial-gradient(ellipse 50% 60% at 100% 50%,  rgba(184,224,210,.05) 0%, transparent 55%);
    pointer-events: none;
}

.faq-section::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

.faq-inner {
    max-width: 1360px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.faq-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 2rem;
    margin-bottom: 3.5rem;
}

.faq-head-left { flex: 1; }

.faq-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.faq-eyebrow-badge {
    background: rgba(168,216,234,.1);
    color: var(--blue);
    border: 1px solid rgba(168,216,234,.2);
    border-radius: 50px;
    padding: 0.22rem 0.78rem;
    font-size: 0.71rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
}

.faq-head h2 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.02em;
    line-height: 1.1;
}

.faq-head h2 span {
    background: linear-gradient(135deg, var(--blue-muted), var(--green-deep));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.faq-head-right {
    max-width: 240px;
    font-size: 0.9rem;
    color: rgba(255,255,255,.38);
    line-height: 1.75;
    flex-shrink: 0;
    text-align: right;
}

/* FAQ items */
.faq-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.85rem;
    align-items: start;
}

.faq-item {
    background: rgba(255,255,255,.04);
    border: 1.5px solid rgba(255,255,255,.08);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: border-color var(--t-base), background var(--t-base), box-shadow var(--t-base);
    animation: ct-fade-up .55s cubic-bezier(0,0,.2,1) backwards;
}

.faq-item:nth-child(1) { animation-delay: .06s; }
.faq-item:nth-child(2) { animation-delay: .10s; }
.faq-item:nth-child(3) { animation-delay: .14s; }
.faq-item:nth-child(4) { animation-delay: .18s; }
.faq-item:nth-child(5) { animation-delay: .22s; }
.faq-item:nth-child(6) { animation-delay: .26s; }

.faq-item:hover {
    border-color: rgba(168,216,234,.2);
    background: rgba(168,216,234,.04);
}

.faq-item.active {
    border-color: var(--blue-deep);
    background: rgba(168,216,234,.06);
    box-shadow: 0 8px 28px rgba(90,157,184,.15);
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    padding: 1.3rem 1.5rem;
    font-family: var(--font-display);
    font-size: 0.97rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1.35;
}

.faq-icon {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.1);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,.4);
    font-size: 0.7rem;
    flex-shrink: 0;
    transition: all var(--t-base);
}

.faq-item.active .faq-icon {
    background: var(--blue-deep);
    border-color: var(--blue-deep);
    color: var(--white);
    transform: rotate(180deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s cubic-bezier(0,0,.2,1);
}

.faq-answer-inner {
    padding: 0 1.5rem 1.4rem;
    font-size: 0.87rem;
    color: rgba(255,255,255,.45);
    line-height: 1.8;
    border-top: 1px solid rgba(255,255,255,.06);
    padding-top: 1rem;
}

.faq-item.active .faq-answer { max-height: 300px; }

/* ═══════════════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════════════ */
@media (max-width: 1100px) {
    .faq-list { grid-template-columns: 1fr; }
}

@media (max-width: 900px) {
    .contact-grid { grid-template-columns: 1fr; }
    .contact-info-card { position: static; }
}

@media (max-width: 768px) {
    .contact-hero { min-height: auto; padding: 0 1.25rem 3.5rem; }
    .contact-hero-inner { flex-direction: column; align-items: flex-start; gap: 1.5rem; padding-top: 6rem; }
    .hero-right { max-width: 100%; text-align: left; }
    .hero-stats { justify-content: flex-start; }
    .hero-deco-word { display: none; }

    .contact-container { padding: 2.5rem 1.25rem 4rem; }

    .form-row { grid-template-columns: 1fr; gap: 0; }
    .form-footer { flex-direction: column; align-items: flex-start; }
    .submit-btn { width: 100%; justify-content: center; }

    .faq-section { padding: 4rem 1.25rem; }
    .faq-head { flex-direction: column; align-items: flex-start; }
    .faq-head-right { max-width: 100%; text-align: left; }
    .faq-list { grid-template-columns: 1fr; }
}

@media (max-width: 480px) {
    .social-grid { grid-template-columns: 1fr 1fr; }
}
</style>
@endsection

@section('content')

{{-- ══════════════════════ HERO ══════════════════════ --}}
<section class="contact-hero">
    <div class="hero-deco-word" aria-hidden="true">Kontak</div>

    <div class="contact-hero-inner">
        <div class="hero-left">
            <div class="hero-eyebrow-row">
                <div class="hero-line"></div>
                <span class="hero-eyebrow-badge">Hubungi Kami</span>
            </div>
            <h1>
                Kami Siap
                <span>Membantu Anda</span>
            </h1>
        </div>

        <div class="hero-right">
            <p>Punya pertanyaan atau proyek dekorasi? Tim kami siap mendampingi dari konsep hingga karya jadi.</p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <strong>&lt;24j</strong>
                    <span>Waktu Respons</span>
                </div>
                <div class="hero-stat">
                    <strong>Gratis</strong>
                    <span>Konsultasi</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════ MAIN CONTENT ══════════════════════ --}}
<div class="contact-container">

    <div class="ct-section-intro">
        <div class="ct-eyebrow">Informasi & Formulir</div>
        <h2 class="ct-heading">Hubungi tim kami, <span>kami akan segera merespons</span></h2>
    </div>

    <div class="contact-grid">

        {{-- ─── INFO CARD ─── --}}
        <div class="contact-info-card">

            <div class="info-card-header">
                <div class="info-card-header-icon">
                    <i class="fas fa-address-card"></i>
                </div>
                <div>
                    <h2>Informasi Kontak</h2>
                    <p>Temukan kami di sini</p>
                </div>
            </div>

            <div class="info-items">
                <div class="info-item">
                    <div class="info-item-icon"><i class="fas fa-phone"></i></div>
                    <div class="info-item-body">
                        <h3>Telepon</h3>
                        <p><a href="tel:+6285731112023">+62 857-3111-2023</a></p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-item-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-item-body">
                        <h3>Email</h3>
                        <p><a href="mailto:infohalloeo@gmail.com">infohalloeo@gmail.com</a></p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-item-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-item-body">
                        <h3>Alamat</h3>
                        <p>Ruko Grand Galaxy City<br>Jl Cordova 2 Blok RGC2 No 2<br>Bekasi, Indonesia</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-item-icon"><i class="fas fa-clock"></i></div>
                    <div class="info-item-body">
                        <h3>Jam Operasional</h3>
                        <p>Senin – Jumat: 08:00 – 17:00<br>Sabtu: 09:00 – 15:00<br>Minggu & Libur: Tutup</p>
                    </div>
                </div>
            </div>

            <div class="social-section">
                <div class="social-section-label">Temukan kami di</div>
                <div class="social-grid">
                    <a href="https://wa.me/6285731112023" class="social-btn whatsapp" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="https://tiktok.com/@halloeo_official" class="social-btn tiktok" target="_blank" rel="noopener">
                        <i class="fab fa-tiktok"></i> TikTok
                    </a>
                    <a href="https://instagram.com/halloeo_official/" class="social-btn instagram" target="_blank" rel="noopener">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="https://facebook.com/share/1AoDq8dKsG/" class="social-btn facebook" target="_blank" rel="noopener">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                </div>
            </div>

            {{-- Map inside info card --}}
            <div class="map-section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.86819005232752!2d106.97461806805339!3d-6.278053500000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f548e76cbda1%3A0x408e01708eaeca8d!2sMAXIMUS%20Pictures!5e0!3m2!1sid!2sid!4v1772553458773!5m2!1sid!2sid"
                    loading="eager"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi HalloEO"
                ></iframe>
            </div>

        </div>

        {{-- ─── FORM CARD ─── --}}
        <div class="contact-form-card">

            <div class="form-card-header">
                <div class="form-card-header-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <div>
                    <h2>Kirim Pesan</h2>
                    <p>Isi form di bawah, kami akan merespons dalam 24 jam</p>
                </div>
            </div>

            <form class="contact-form" action="#" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nama Lengkap <span class="req">*</span></label>
                        <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon <span class="req">*</span></label>
                        <input type="tel" id="phone" name="phone" required placeholder="08xx xxxx xxxx">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email <span class="req">*</span></label>
                        <input type="email" id="email" name="email" required placeholder="nama@email.com">
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan yang Dibutuhkan <span class="req">*</span></label>
                        <select id="service" name="service" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <input type="text" id="subject" name="subject" placeholder="Subjek pesan Anda">
                </div>

                <div class="form-group">
                    <label for="message">Pesan <span class="req">*</span></label>
                    <textarea id="message" name="message" required placeholder="Ceritakan detail proyek Anda — ukuran, tema, tanggal acara, dll."></textarea>
                </div>

                <div class="form-footer">
                    <p class="form-note">
                        <i class="fas fa-lock"></i>
                        Data Anda aman dan tidak akan dibagikan ke pihak ketiga.
                    </p>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

{{-- ══════════════════════ FAQ ══════════════════════ --}}
<section class="faq-section">
    <div class="faq-inner">

        <div class="faq-head">
            <div class="faq-head-left">
                <div class="faq-eyebrow">
                    <div class="hero-line"></div>
                    <span class="faq-eyebrow-badge">FAQ</span>
                </div>
                <h2>
                    Pertanyaan yang
                    <span>sering diajukan</span>
                </h2>
            </div>
            <div class="faq-head-right">
                Tidak menemukan jawaban? Hubungi kami langsung via WhatsApp.
            </div>
        </div>

        <div class="faq-list">

            <div class="faq-item">
                <div class="faq-question">
                    <span>Berapa lama waktu pengerjaan produk?</span>
                    <div class="faq-icon"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Waktu pengerjaan bervariasi tergantung kompleksitas dan ukuran produk. Untuk produk standar biasanya 3–7 hari kerja. Untuk proyek besar atau custom, kami akan memberikan estimasi waktu setelah konsultasi.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah bisa custom design sendiri?</span>
                    <div class="faq-icon"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Tentu saja! Kami menerima custom design sesuai keinginan Anda. Tim desainer kami siap membantu mewujudkan ide kreatif Anda menjadi kenyataan. Konsultasikan ide Anda langsung dengan kami.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah ada minimum order?</span>
                    <div class="faq-icon"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Tidak ada minimum order untuk sebagian besar produk kami. Kami melayani pesanan mulai dari 1 unit hingga dalam jumlah besar. Hubungi kami untuk informasi harga dan ketersediaan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana sistem pembayaran?</span>
                    <div class="faq-icon"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Kami menerima transfer bank, e-wallet, dan untuk order besar tersedia sistem DP 50% di muka dengan pelunasan sebelum pengiriman. Detail pembayaran dijelaskan setelah konfirmasi pesanan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah melayani pengiriman ke luar kota?</span>
                    <div class="faq-icon"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Ya, kami melayani pengiriman ke seluruh Indonesia. Produk dikemas dengan packaging khusus agar tiba dalam kondisi sempurna. Biaya pengiriman disesuaikan dengan jarak dan ukuran produk.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah ada garansi untuk produk?</span>
                    <div class="faq-icon"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Kami memberikan garansi untuk cacat produksi. Jika ada kerusakan saat pengiriman atau cacat produksi, kami akan melakukan penggantian atau perbaikan. Syarat garansi dijelaskan saat pemesanan.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── FAQ Accordion ──
    document.querySelectorAll('.faq-item').forEach(item => {
        item.querySelector('.faq-question').addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('active'));
            if (!isActive) item.classList.add('active');
        });
    });

    // ── Form submit ──
    const form = document.querySelector('.contact-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = form.querySelector('.submit-btn');
            btn.innerHTML = '<i class="fas fa-check"></i> Pesan Terkirim!';
            btn.style.background = 'linear-gradient(135deg, var(--green-deep), var(--green))';
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Pesan';
                btn.style.background = '';
                form.reset();
            }, 3000);
        });
    }

});
</script>
@endsection