@extends('layout')

@section('title', 'Tentang Kami - HalloEO')

@section('styles')
<style>
/* ────────────────────────────────────────────────
   HERO, Full-bleed image with overlaid text
   ──────────────────────────────────────────────── */
.about-hero {
    height: 90vh;
    min-height: 580px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
}

.about-hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 30%;
    transform-origin: center;
    animation: subtle-zoom 16s ease-out forwards;
    will-change: transform;
}

@keyframes subtle-zoom {
    from { transform: scale(1.07); }
    to   { transform: scale(1.00); }
}

/* Multi-layer gradient: subtle top vignette + strong bottom */
.about-hero-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg,
            rgba(26,37,48,.55) 0%,
            rgba(26,37,48,.10) 35%,
            rgba(26,37,48,.10) 55%,
            rgba(26,37,48,.82) 85%,
            rgba(26,37,48,.97) 100%
        );
}

/* 3-colour top accent */
.about-hero::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
    z-index: 10;
}

.about-hero-content {
    position: relative;
    z-index: 5;
    width: 100%;
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 2.5rem 4.5rem;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 3rem;
}

.hero-left { max-width: 640px; }

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.25rem;
    animation: fade-up .65s cubic-bezier(0,0,.2,1) both;
}

.hero-eyebrow-line {
    width: 32px; height: 2px;
    background: linear-gradient(90deg, var(--blue), var(--green));
    border-radius: 2px;
    flex-shrink: 0;
}

.about-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(3rem, 7vw, 6rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.035em;
    line-height: 1.05;
    margin: 0;
    animation: fade-up .75s cubic-bezier(0,0,.2,1) .08s both;
}

.about-hero h1 em {
    font-style: normal;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Right side: two-line descriptor */
.hero-right {
    flex-shrink: 0;
    max-width: 300px;
    padding-bottom: 0.4rem;
    animation: fade-up .75s cubic-bezier(0,0,.2,1) .18s both;
}

.hero-right p {
    font-size: 1rem;
    color: rgba(255,255,255,.5);
    line-height: 1.8;
    border-left: 2px solid rgba(168,216,234,.35);
    padding-left: 1.2rem;
}

@keyframes fade-up {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0);   }
}

/* ────────────────────────────────────────────────
   STATS, Large typographic numbers
   ──────────────────────────────────────────────── */
.stats-band {
    background: var(--dark);
    padding: 0 2.5rem;
    position: relative;
    overflow: hidden;
}

.stats-band::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 70% 120% at 50% 50%, rgba(168,216,234,.05) 0%, transparent 65%);
    pointer-events: none;
}

.stats-band-inner {
    max-width: 1360px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-top: 1px solid rgba(255,255,255,.06);
}

.stat-item {
    padding: 3.5rem 2rem 3rem;
    border-right: 1px solid rgba(255,255,255,.06);
    position: relative;
    overflow: hidden;
    transition: background var(--t-base);
}

.stat-item:last-child { border-right: none; }
.stat-item:hover { background: rgba(168,216,234,.04); }

/* Faint hover line at top */
.stat-item::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform var(--t-slow);
}

.stat-item:hover::before { transform: scaleX(1); }

.stat-number {
    display: block;
    font-family: var(--font-display);
    font-size: clamp(3rem, 5vw, 4.5rem);
    font-weight: 800;
    letter-spacing: -0.04em;
    line-height: 1;
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-label {
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    color: rgba(255,255,255,.35);
}

.stat-desc {
    font-size: 0.82rem;
    color: rgba(255,255,255,.2);
    margin-top: 0.35rem;
    line-height: 1.5;
}

/* ────────────────────────────────────────────────
   STORY, Two-column narrative
   ──────────────────────────────────────────────── */
.story-section {
    max-width: 1360px;
    margin: 0 auto;
    padding: 8rem 2.5rem;
}

.story-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6rem;
    align-items: center;
}

.story-grid + .story-grid { margin-top: 8rem; }
.story-grid.flip { direction: rtl; }
.story-grid.flip > * { direction: ltr; }

/* Block label */
.block-label {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.71rem;
    font-weight: 700;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 1.1rem;
}

.block-label::before {
    content: '';
    width: 24px; height: 2px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
    border-radius: 2px;
    flex-shrink: 0;
}

.story-text h2 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 3.5vw, 2.9rem);
    font-weight: 700;
    color: var(--dark);
    letter-spacing: -0.025em;
    line-height: 1.2;
    margin-bottom: 1.5rem;
}

.story-text p {
    font-size: 1rem;
    line-height: 1.92;
    color: var(--muted);
    margin-bottom: 1.2rem;
}

.story-text p:last-child { margin-bottom: 0; }

/* Mission list */
.mission-list {
    list-style: none;
    padding: 0; margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.9rem;
    margin-top: 0.5rem;
}

.mission-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.85rem;
    font-size: 0.97rem;
    color: var(--dark-mid);
    line-height: 1.55;
}

.mission-tick {
    width: 20px; height: 20px;
    background: rgba(74,154,130,.12);
    border: 1.5px solid rgba(74,154,130,.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
}

.mission-tick i { font-size: 0.6rem; color: var(--green-deep); }

/* Image frame */
.story-visual { position: relative; }

.story-img-frame {
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    aspect-ratio: 5 / 4;
    background: var(--surface-alt);
}

.story-img-frame img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .7s cubic-bezier(.4,0,.2,1);
}

.story-img-frame:hover img { transform: scale(1.05); }

/* Floating badge */
.float-badge {
    position: absolute;
    background: rgba(26,37,48,.9);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 16px;
    padding: 1rem 1.4rem;
    color: var(--white);
    line-height: 1.35;
    z-index: 2;
    box-shadow: var(--shadow-lg);
}

.float-badge.bottom-left  { bottom: 1.75rem; left: -1.5rem; }
.float-badge.bottom-right { bottom: 1.75rem; right: -1.5rem; }

.float-badge strong {
    display: block;
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--blue), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.1;
    margin-bottom: 0.1rem;
}

.float-badge span { font-size: 0.78rem; color: rgba(255,255,255,.45); letter-spacing: 0.04em; }

/* ────────────────────────────────────────────────
   VALUES, Horizontal cards with icon left
   ──────────────────────────────────────────────── */
.values-section {
    background: var(--dark);
    padding: 8rem 2.5rem;
    position: relative;
    overflow: hidden;
}

.values-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 60% 80% at 5%  30%, rgba(168,216,234,.07) 0%, transparent 55%),
        radial-gradient(ellipse 50% 70% at 95% 70%, rgba(184,224,210,.06) 0%, transparent 55%);
    pointer-events: none;
}

.values-section::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

.values-inner {
    max-width: 1360px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.values-header {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: end;
    margin-bottom: 4rem;
}

.values-header-title h2 {
    font-family: var(--font-display);
    font-size: clamp(2.2rem, 4vw, 3.2rem);
    font-weight: 700;
    color: var(--white);
    letter-spacing: -0.03em;
    line-height: 1.15;
    margin: 0;
}

.values-header-title h2 em {
    font-style: normal;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.values-header-desc p {
    font-size: 1rem;
    color: rgba(255,255,255,.45);
    line-height: 1.8;
}

/* 2 × 2 grid */
.values-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}

.value-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: var(--r-xl);
    padding: 2.25rem 2.5rem;
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    transition: background var(--t-base), border-color var(--t-base), transform var(--t-slow);
    position: relative;
    overflow: hidden;
}

.value-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(168,216,234,.06) 0%, transparent 60%);
    opacity: 0;
    transition: opacity var(--t-base);
}

.value-card:hover {
    background: rgba(255,255,255,.07);
    border-color: rgba(168,216,234,.2);
    transform: translateY(-5px);
}

.value-card:hover::before { opacity: 1; }

.value-icon-box {
    width: 52px; height: 52px;
    background: rgba(168,216,234,.1);
    border: 1px solid rgba(168,216,234,.2);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: background var(--t-base), border-color var(--t-base), transform var(--t-slow);
}

.value-card:hover .value-icon-box {
    background: var(--grad-cool);
    border-color: transparent;
    transform: rotate(-8deg) scale(1.05);
}

.value-icon-box i {
    font-size: 1.25rem;
    color: var(--blue);
    transition: color var(--t-base);
}

.value-card:hover .value-icon-box i { color: var(--white); }

.value-body h3 {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.value-body p {
    font-size: 0.91rem;
    color: rgba(255,255,255,.4);
    line-height: 1.72;
    margin: 0;
}

/* ────────────────────────────────────────────────
   TEAM, Portrait cards with warm feel
   ──────────────────────────────────────────────── */
.team-section {
    max-width: 1360px;
    margin: 0 auto;
    padding: 8rem 2.5rem;
}

.team-header {
    display: grid;
    grid-template-columns: 1fr auto;
    align-items: end;
    gap: 2rem;
    margin-bottom: 3.5rem;
}

.team-header h2 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 3.5vw, 2.8rem);
    font-weight: 700;
    color: var(--dark);
    letter-spacing: -0.025em;
    line-height: 1.2;
    margin: 0;
}

.team-header p {
    font-size: 0.93rem;
    color: var(--muted);
    max-width: 300px;
    line-height: 1.7;
    text-align: right;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.team-card {
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: transform var(--t-slow), box-shadow var(--t-slow), border-color var(--t-base);
}

.team-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--blue-light);
}

.team-card-top {
    padding: 2.5rem 1.5rem 1.75rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    background: var(--surface);
    border-bottom: 1px solid var(--surface-alt);
}

/* Subtle gradient wash */
.team-card-top::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 55%;
    background: linear-gradient(180deg, var(--blue-light) 0%, transparent 100%);
    opacity: .45;
}

.team-avatar {
    position: relative;
    z-index: 1;
    width: 80px; height: 80px;
    background: var(--grad-cool);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 700;
    color: var(--white);
    border: 3px solid var(--white);
    box-shadow: var(--glow-blue);
    margin-bottom: 1.1rem;
    transition: transform var(--t-base), box-shadow var(--t-base);
}

.team-card:hover .team-avatar {
    transform: scale(1.1);
    box-shadow: 0 10px 28px rgba(74,143,171,.4);
}

.team-name {
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.3;
    text-align: center;
    position: relative;
    z-index: 1;
}

.team-card-bottom { padding: 1.1rem 1.5rem; }

.team-role {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.28rem 0.9rem;
    border-radius: var(--r-full);
    font-size: 0.73rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
}

/* ────────────────────────────────────────────────
   CTA, Dark with warm copy
   ──────────────────────────────────────────────── */
.about-cta {
    margin: 0 2.5rem 5rem;
    border-radius: 28px;
    background: var(--dark);
    padding: 5rem 3rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.about-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 70% 80% at 15% 50%, rgba(168,216,234,.09) 0%, transparent 55%),
        radial-gradient(ellipse 60% 70% at 85% 50%, rgba(184,224,210,.08) 0%, transparent 55%);
    pointer-events: none;
}

.about-cta::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
    border-radius: 28px 28px 0 0;
}

.about-cta-inner { position: relative; max-width: 560px; margin: 0 auto; }

.about-cta h2 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.025em;
    margin-bottom: 1rem;
    line-height: 1.18;
}

.about-cta h2 em {
    font-style: normal;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-cta p {
    font-size: 1.02rem;
    color: rgba(255,255,255,.5);
    line-height: 1.8;
    margin-bottom: 2.5rem;
}

.cta-row {
    display: flex;
    gap: 0.9rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-solid {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.9rem 2.2rem;
    background: var(--grad-cool);
    color: var(--white);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 700;
    font-size: 0.97rem;
    text-decoration: none;
    box-shadow: var(--glow-blue);
    transition: transform var(--t-base), box-shadow var(--t-base), opacity var(--t-base);
}

.btn-solid:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 36px rgba(74,143,171,.42);
    opacity: .91;
    color: var(--white);
    text-decoration: none;
}

.btn-outline-white {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.9rem 2.2rem;
    background: transparent;
    color: rgba(255,255,255,.65);
    border: 1.5px solid rgba(255,255,255,.18);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.97rem;
    text-decoration: none;
    transition: all var(--t-base);
}

.btn-outline-white:hover {
    border-color: rgba(255,255,255,.45);
    color: var(--white);
    background: rgba(255,255,255,.07);
    transform: translateY(-3px);
    text-decoration: none;
}

/* ────────────────────────────────────────────────
   RESPONSIVE
   ──────────────────────────────────────────────── */
@media (max-width: 1100px) {
    .values-grid { grid-template-columns: 1fr; }
    .team-grid   { grid-template-columns: repeat(2, 1fr); }
    .float-badge.bottom-left  { left: 1rem; }
    .float-badge.bottom-right { right: 1rem; }
}

@media (max-width: 768px) {
    /* Hero */
    .about-hero { height: 75vh; }
    .about-hero-content { flex-direction: column; align-items: flex-start; gap: 1.25rem; padding: 0 1.5rem 3rem; }
    .hero-right { max-width: 100%; }
    .hero-right p { font-size: 0.93rem; }

    /* Stats */
    .stats-band { padding: 0 1.5rem; }
    .stats-band-inner { grid-template-columns: repeat(2, 1fr); }
    .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,.06); }
    .stat-item:nth-child(odd)  { border-right: 1px solid rgba(255,255,255,.06); }
    .stat-item:nth-child(3),
    .stat-item:nth-child(4)    { border-bottom: none; }

    /* Story */
    .story-section { padding: 5rem 1.5rem; }
    .story-grid     { grid-template-columns: 1fr; gap: 2.5rem; }
    .story-grid.flip { direction: ltr; }
    .story-grid + .story-grid { margin-top: 4rem; }
    .float-badge    { display: none; }

    /* Values */
    .values-section { padding: 5rem 1.5rem; }
    .values-header  { grid-template-columns: 1fr; gap: 1.25rem; }
    .value-card     { padding: 1.75rem; }

    /* Team */
    .team-section { padding: 5rem 1.5rem; }
    .team-header  { grid-template-columns: 1fr; }
    .team-header p { display: none; }
    .team-grid    { grid-template-columns: 1fr 1fr; }

    /* CTA */
    .about-cta { margin: 0 1.25rem 4rem; padding: 3.5rem 1.75rem; }
    .cta-row   { flex-direction: column; align-items: center; }
    .btn-solid, .btn-outline-white { width: 100%; max-width: 280px; justify-content: center; }
}

@media (max-width: 480px) {
    .about-hero h1 { font-size: 2.6rem; }
    .team-grid { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- ════════════════ HERO ════════════════ --}}
<section class="about-hero">
    <img
        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=1600&q=80"
        alt="Tim HalloEO"
        class="about-hero-bg"
    >
    <div class="about-hero-overlay"></div>

    <div class="about-hero-content">
        <div class="hero-left">
            <div class="hero-eyebrow">
                <div class="hero-eyebrow-line"></div>
                <span class="section-eyebrow"
                      style="background:rgba(168,216,234,.12);color:var(--blue);border:1px solid rgba(168,216,234,.25);border-radius: 50px; rounded:var(--r-full); padding:0.25rem 0.9rem; font-size:0.75rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase;">
                    Tentang HalloEO
                </span>
            </div>
            <h1>Dibuat dengan<br><em>Tangan & Hati</em></h1>
        </div>

        <div class="hero-right">
            <p>Partner terpercaya dalam dekorasi styrofoam premium dari ide awal sampai karya jadi, kami hadir di setiap langkahnya.</p>
        </div>
    </div>
</section>

{{-- ════════════════ STATS ════════════════ --}}
<div class="stats-band">
    <div class="stats-band-inner">
        <div class="stat-item">
            <span class="stat-number">500+</span>
            <span class="stat-label">Proyek Selesai</span>
            <p class="stat-desc">Dari event kecil hingga pameran nasional</p>
        </div>
        <div class="stat-item">
            <span class="stat-number">350+</span>
            <span class="stat-label">Klien Puas</span>
            <p class="stat-desc">Bisnis, institusi, dan individu</p>
        </div>
        <div class="stat-item">
            <span class="stat-number">15+</span>
            <span class="stat-label">Tahun Pengalaman</span>
            <p class="stat-desc">Berdiri sejak 2008 di Bekasi</p>
        </div>
        <div class="stat-item">
            <span class="stat-number">100%</span>
            <span class="stat-label">Kepuasan Klien</span>
            <p class="stat-desc">Revisi sampai Anda puas</p>
        </div>
    </div>
</div>

{{-- ════════════════ STORY ════════════════ --}}
<div class="story-section">

    {{-- Perjalanan --}}
    <div class="story-grid">
        <div class="story-text">
            <div class="block-label">Perjalanan Kami</div>
            <h2>Dimulai dari Bengkel Kecil di Bekasi</h2>
            <p>HalloEO lahir di tahun 2008 dari satu keyakinan sederhana: setiap acara berhak tampil berkesan, tanpa harus memilih antara kualitas dan harga.</p>
            <p>Lebih dari 15 tahun kemudian, kepercayaan ratusan klien, dari perusahaan Fortune 500, institusi pemerintah, hingga pasangan yang merayakan hari paling spesial dalam hidup mereka, menjadi bukti nyata komitmen kami.</p>
            <p>Setiap karya yang lahir dari tangan kami membawa cerita. Kami bangga telah menjadi bagian dari ribuan momen tak terlupakan di seluruh Indonesia.</p>
        </div>

        <div class="story-visual">
            <div class="story-img-frame">
                <img
                    src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=900&q=80"
                    alt="Perjalanan HalloEO"
                    loading="eager"
                >
            </div>
            <div class="float-badge bottom-left">
                <strong>2008</strong>
                <span>Tahun Berdiri</span>
            </div>
        </div>
    </div>

    {{-- Visi Misi --}}
    <div class="story-grid flip">
        <div class="story-visual">
            <div class="story-img-frame">
                <img
                    src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=900&q=80"
                    alt="Visi Misi HalloEO"
                    loading="eager"
                >
            </div>
            <div class="float-badge bottom-right">
                <strong>#1</strong>
                <span>Di Hati Klien</span>
            </div>
        </div>

        <div class="story-text">
            <div class="block-label">Visi & Misi</div>
            <h2>Terdepan dalam Kreasi, Tulus dalam Pelayanan</h2>
            <p>Visi kami adalah menjadi studio dekorasi styrofoam paling dipercaya di Indonesia, bukan hanya karena kualitas karya, tapi karena pengalaman bekerja sama yang menyenangkan dan bebas drama.</p>

            <ul class="mission-list">
                <li>
                    <span class="mission-tick"><i class="fas fa-check"></i></span>
                    Solusi dekorasi kreatif dan berkualitas tinggi untuk setiap kebutuhan
                </li>
                <li>
                    <span class="mission-tick"><i class="fas fa-check"></i></span>
                    Material premium dengan harga transparan dan kompetitif
                </li>
                <li>
                    <span class="mission-tick"><i class="fas fa-check"></i></span>
                    Pelayanan responsif, dari konsultasi awal sampai pengiriman akhir
                </li>
                <li>
                    <span class="mission-tick"><i class="fas fa-check"></i></span>
                    Inovasi berkelanjutan mengikuti tren dan kebutuhan klien
                </li>
                <li>
                    <span class="mission-tick"><i class="fas fa-check"></i></span>
                    Hubungan jangka panjang berbasis kepercayaan, bukan sekadar transaksi
                </li>
            </ul>
        </div>
    </div>

</div>

{{-- ════════════════ VALUES ════════════════ --}}
<section class="values-section">
    <div class="values-inner">

        <div class="values-header">
            <div class="values-header-title">
                <div class="block-label" style="color:rgba(255,255,255,.3);">Nilai Kami</div>
                <h2>Prinsip yang Kami Pegang<br><em>Setiap Hari</em></h2>
            </div>
            <div class="values-header-desc">
                <p>Bukan sekadar tulisan di dinding kantor, ini adalah standar yang kami terapkan dalam setiap detail pengerjaan proyek Anda.</p>
            </div>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon-box"><i class="fas fa-heart"></i></div>
                <div class="value-body">
                    <h3>Passion</h3>
                    <p>Kami mencintai setiap karya yang kami buat, dan rasa cinta itu terasa dalam setiap sentuhan detail hasilnya.</p>
                </div>
            </div>
            <div class="value-card">
                <div class="value-icon-box"><i class="fas fa-medal"></i></div>
                <div class="value-body">
                    <h3>Quality</h3>
                    <p>Kualitas bukan pilihan, itu adalah standar minimum kami. Setiap karya harus layak untuk dipajang dan dibanggakan.</p>
                </div>
            </div>
            <div class="value-card">
                <div class="value-icon-box"><i class="fas fa-handshake"></i></div>
                <div class="value-body">
                    <h3>Trust</h3>
                    <p>Kepercayaan dibangun dari konsistensi, bukan janji. Kami berbicara melalui hasil kerja, bukan kata-kata.</p>
                </div>
            </div>
            <div class="value-card">
                <div class="value-icon-box"><i class="fas fa-rocket"></i></div>
                <div class="value-body">
                    <h3>Innovation</h3>
                    <p>Industri dekorasi terus berkembang. Kami memastikan Anda selalu mendapat yang paling relevan, bukan yang sudah usang.</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ════════════════ TEAM ════════════════ --}}
<section class="team-section">

    <div class="team-header">
        <div>
            <div class="block-label">Tim Kami</div>
            <h2>Orang-orang di Balik Karya</h2>
        </div>
        <p>Profesional berpengalaman yang berdedikasi mewujudkan setiap visi klien menjadi kenyataan nyata.</p>
    </div>

    <div class="team-grid">
        <div class="team-card">
            <div class="team-card-top">
                <div class="team-avatar">B</div>
                <div class="team-name">Budi Santoso</div>
            </div>
            <div class="team-card-bottom">
                <span class="team-role"><i class="fas fa-crown"></i> Founder & CEO</span>
            </div>
        </div>

        <div class="team-card">
            <div class="team-card-top">
                <div class="team-avatar">A</div>
                <div class="team-name">Ani Wijaya</div>
            </div>
            <div class="team-card-bottom">
                <span class="team-role"><i class="fas fa-palette"></i> Creative Director</span>
            </div>
        </div>

        <div class="team-card">
            <div class="team-card-top">
                <div class="team-avatar">D</div>
                <div class="team-name">Dedi Kurniawan</div>
            </div>
            <div class="team-card-bottom">
                <span class="team-role"><i class="fas fa-cogs"></i> Production Manager</span>
            </div>
        </div>

        <div class="team-card">
            <div class="team-card-top">
                <div class="team-avatar">S</div>
                <div class="team-name">Siti Rahayu</div>
            </div>
            <div class="team-card-bottom">
                <span class="team-role"><i class="fas fa-comments"></i> Customer Relations</span>
            </div>
        </div>
    </div>

</section>

{{-- ════════════════ CTA ════════════════ --}}
<div class="about-cta">
    <div class="about-cta-inner">
        <h2>Mari Kita Buat<br><em>Sesuatu Bersama</em></h2>
        <p>Ceritakan proyek Anda kepada kami. Konsultasi pertama selalu gratis, dan kami selalu senang mendengarkan ide, sekecil apapun.</p>
        <div class="cta-row">
            <a href="{{ route('contact') }}" class="btn-solid">
                <i class="fas fa-comments"></i> Mulai Konsultasi
            </a>
            <a href="{{ route('portfolio.index') }}" class="btn-outline-white">
                <i class="fas fa-images"></i> Lihat Karya Kami
            </a>
        </div>
    </div>
</div>

@endsection