@extends('layout')

@section('title', 'HalloEO - Dekorasi & Maskot Styrofoam Profesional')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   HOME PAGE — HalloEO
   Refined Pastel · Soft Luxury · Production-Grade
═══════════════════════════════════════════════ */

:root {
    --blue:               #A8D8EA;
    --blue-light:         #D4EDF6;
    --blue-deep:          #4A8FAB;
    --blue-mid:           #6BAEC8;
    --green:              #B8E0D2;
    --green-light:        #D8F0E8;
    --green-deep:         #4A9A82;
    --rose:               #F2C4C4;
    --rose-deep:          #C06060;
    --gold:               #E8C97A;
    --dark:               #1A2530;
    --dark-mid:           #2C3E50;
    --muted:              #64788A;
    --surface:            #F7F9FB;
    --surface-alt:        #EEF3F7;
    --white:              #FFFFFF;

    --grad-cool:          linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    --grad-deep:          linear-gradient(135deg, var(--blue-deep) 0%, var(--green-deep) 100%);
    --grad-hero:          linear-gradient(160deg, rgba(26,37,48,.82) 0%, rgba(26,37,48,.60) 100%);

    --shadow-sm:          0 2px 8px rgba(26,37,48,.07), 0 1px 3px rgba(26,37,48,.05);
    --shadow-md:          0 6px 20px rgba(26,37,48,.09), 0 2px 6px rgba(26,37,48,.06);
    --shadow-lg:          0 16px 48px rgba(26,37,48,.12), 0 4px 14px rgba(26,37,48,.08);
    --shadow-xl:          0 32px 80px rgba(26,37,48,.16);
    --glow-blue:          0 8px 28px rgba(74,143,171,.30);
    --glow-green:         0 8px 28px rgba(74,154,130,.28);

    --r-md:               16px;
    --r-lg:               24px;
    --r-xl:               36px;
    --r-full:             9999px;

    --font-display:       'Playfair Display', 'Playfair Display-Fallback', Georgia, serif;
    --font-body:          'Outfit', system-ui, sans-serif;
    --t-base:             280ms cubic-bezier(.4,0,.2,1);
    --t-slow:             420ms cubic-bezier(.4,0,.2,1);
}

/* ── Section shared ── */
.section-eyebrow {
    display: inline-block;
    font-size: 0.73rem;
    font-weight: 700;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    color: var(--blue-deep);
    background: var(--blue-light);
    padding: 0.35rem 1rem;
    border-radius: var(--r-full);
    margin-bottom: 0.85rem;
}

.section-title {
    text-align: center;
    margin-bottom: 3.5rem;
}

.section-title h2 {
    font-family: var(--font-display);
    font-size: clamp(1.9rem, 4vw, 2.9rem);
    font-weight: 700;
    color: var(--dark);
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin-bottom: 0.65rem;
}

.section-title p {
    font-size: 1.05rem;
    color: var(--muted);
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ══════════════════════════════════════════
   HERO
══════════════════════════════════════════ */
.hero {
    min-height: 92vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        var(--grad-hero),
        url('{{ asset("images/bg-home.jpeg") }}') center / cover no-repeat;
    position: relative;
    overflow: hidden;
}

.hero::before,
.hero::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.hero::before {
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(168,216,234,.13) 0%, transparent 70%);
    top: -260px; right: -200px;
    animation: hero-pulse 10s ease-in-out infinite;
}

.hero::after {
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(184,224,210,.10) 0%, transparent 70%);
    bottom: -180px; left: -150px;
    animation: hero-pulse 14s ease-in-out infinite reverse;
}

@keyframes hero-pulse {
    0%, 100% { transform: scale(1); opacity: .6; }
    50%       { transform: scale(1.2); opacity: .3; }
}

.hero-content {
    max-width: 1360px;
    width: 100%;
    margin: 0 auto;
    padding: 2rem 2.5rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: center;
    position: relative;
    z-index: 1;
}

/* Hero eyebrow */
.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 0.11em;
    text-transform: uppercase;
    color: var(--blue);
    background: rgba(168,216,234,.15);
    border: 1px solid rgba(168,216,234,.3);
    padding: 0.45rem 1.1rem;
    border-radius: var(--r-full);
    margin-bottom: 1.25rem;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) both;
}

.hero-text h1 {
    font-family: var(--font-display);
    font-size: clamp(2.4rem, 5.5vw, 4rem);
    font-weight: 800;
    color: var(--white);
    line-height: 1.14;
    letter-spacing: -0.025em;
    margin-bottom: 1.4rem;
    text-shadow: 0 2px 24px rgba(0,0,0,.22);
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .1s both;
}

.hero-text h1 em {
    font-style: normal;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-text > p {
    font-size: 1.12rem;
    color: rgba(255,255,255,.85);
    line-height: 1.8;
    margin-bottom: 2rem;
    max-width: 460px;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .2s both;
}

/* Stats */
.hero-stats {
    display: flex;
    align-items: center;
    gap: 2rem;
    margin-bottom: 2.25rem;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .3s both;
}

.hero-stat { display: flex; flex-direction: column; gap: 0.1rem; }

.hero-stat strong {
    font-family: var(--font-display);
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
}

.hero-stat span {
    font-size: 0.76rem;
    color: rgba(255,255,255,.5);
    letter-spacing: 0.04em;
}

.hero-stat-divider {
    width: 1px;
    height: 36px;
    background: rgba(255,255,255,.15);
}

/* Buttons */
.hero-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .4s both;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.85rem 2rem;
    border-radius: var(--r-full);
    text-decoration: none;
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 1rem;
    border: none;
    cursor: pointer;
    transition: transform var(--t-base), box-shadow var(--t-base), background var(--t-base);
    white-space: nowrap;
}

.btn-primary {
    background: var(--white);
    color: var(--blue-deep);
    box-shadow: 0 4px 20px rgba(0,0,0,.18);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 32px rgba(0,0,0,.22);
    color: var(--blue-deep);
    text-decoration: none;
}

.btn-outline {
    background: rgba(255,255,255,.08);
    color: var(--white);
    border: 1.5px solid rgba(255,255,255,.4);
    backdrop-filter: blur(8px);
}

.btn-outline:hover {
    background: rgba(255,255,255,.18);
    border-color: rgba(255,255,255,.7);
    transform: translateY(-3px);
    color: var(--white);
    text-decoration: none;
}

/* Hero image */
.hero-image {
    position: relative;
    animation: fade-left .9s cubic-bezier(0,0,.2,1) .15s both;
}

.hero-image-container {
    position: relative;
    width: 100%;
    height: 460px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-image-container::before {
    content: '';
    position: absolute;
    width: 72%; height: 72%;
    background: radial-gradient(circle, rgba(168,216,234,.22) 0%, transparent 65%);
    border-radius: 50%;
    filter: blur(20px);
}

.floating-img {
    width: 86%; height: 86%;
    object-fit: contain;
    filter: drop-shadow(0 24px 48px rgba(0,0,0,.22));
    animation: float-y 7s ease-in-out infinite;
    position: relative;
    z-index: 1;
}

@keyframes float-y {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-18px); }
}

@keyframes fade-up {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

@keyframes fade-left {
    from { opacity: 0; transform: translateX(28px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* ══════════════════════════════════════════
   FEATURES
══════════════════════════════════════════ */
.features {
    padding: 7rem 2rem;
    background: var(--white);
}

.features-grid {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.feature-card {
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    padding: 2.5rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: transform var(--t-slow), box-shadow var(--t-slow), border-color var(--t-base);
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: var(--grad-cool);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform var(--t-slow);
    border-radius: var(--r-xl) var(--r-xl) 0 0;
}

.feature-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(168,216,234,.1), transparent 70%);
    opacity: 0;
    transition: opacity var(--t-slow);
    pointer-events: none;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
    border-color: var(--blue-light);
}

.feature-card:hover::before { transform: scaleX(1); }
.feature-card:hover::after  { opacity: 1; }

.feature-icon-wrap {
    width: 70px; height: 70px;
    background: var(--blue-light);
    border-radius: var(--r-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    transition: background var(--t-base), transform var(--t-slow);
}

.feature-card:hover .feature-icon-wrap {
    background: var(--grad-cool);
    transform: scale(1.1) rotate(-4deg);
}

.feature-icon {
    font-size: 1.9rem;
    color: var(--blue-deep);
    transition: color var(--t-base);
    display: block;
}

.feature-card:hover .feature-icon { color: var(--white); }

.feature-card h3 {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.7rem;
    line-height: 1.3;
}

.feature-card p {
    color: var(--muted);
    font-size: 0.93rem;
    line-height: 1.75;
}

/* ══════════════════════════════════════════
   PORTFOLIO
══════════════════════════════════════════ */
.portfolio-section {
    padding: 7rem 2rem;
    background: var(--surface);
}

.portfolio-grid {
    max-width: 1360px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.75rem;
}

.portfolio-card {
    background: var(--white);
    border-radius: var(--r-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: transform var(--t-slow), box-shadow var(--t-slow);
    display: flex;
    flex-direction: column;
    cursor: pointer;
}

.portfolio-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

.portfolio-img-wrap {
    overflow: hidden;
    aspect-ratio: 4 / 3;
}

.portfolio-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.portfolio-card:hover .portfolio-img { transform: scale(1.07); }

.portfolio-info { padding: 1.75rem; flex: 1; }

.portfolio-category {
    display: inline-block;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.28rem 0.85rem;
    border-radius: var(--r-full);
    font-size: 0.76rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 0.85rem;
}

.portfolio-info h3 {
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.portfolio-info p {
    color: var(--muted);
    font-size: 0.91rem;
    line-height: 1.65;
}

.portfolio-cta {
    text-align: center;
    margin-top: 3rem;
}

.btn-grad {
    background: var(--grad-deep);
    color: var(--white) !important;
    box-shadow: var(--glow-blue);
}

.btn-grad:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 36px rgba(74,143,171,.4);
    opacity: .92;
}

/* ══════════════════════════════════════════
   GALLERY
══════════════════════════════════════════ */
.gallery-section {
    padding: 7rem 0;
    background: var(--white);
    overflow: hidden;
}

.gallery-section .section-title { padding: 0 2rem; }

.gallery-wrapper {
    position: relative;
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 3.5rem;
}

.gallery-grid {
    display: flex;
    gap: 1.25rem;
    padding: 0.75rem 0 1.75rem;
    overflow-x: auto;
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    scrollbar-width: none;
    align-items: center;
}

.gallery-grid::-webkit-scrollbar { display: none; }

.gallery-item {
    flex: 0 0 268px;
    width: 268px;
    height: 268px;
    border-radius: var(--r-lg);
    overflow: hidden;
    cursor: pointer;
    box-shadow: var(--shadow-md);
    position: relative;
    transition: transform var(--t-base), box-shadow var(--t-base);
}

.gallery-item:hover {
    transform: scale(1.04);
    box-shadow: var(--shadow-lg);
}

.gallery-item img,
.gallery-item video {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.gallery-item:hover img,
.gallery-item:hover video { transform: scale(1.08); }

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(26,37,48,.6) 0%, transparent 60%);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--t-base);
}

.gallery-item:hover .gallery-overlay { opacity: 1; }

.play-icon {
    font-size: 2.8rem;
    color: var(--white);
    filter: drop-shadow(0 2px 10px rgba(0,0,0,.35));
}

.gallery-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-58%);
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    color: var(--dark-mid);
    width: 48px; height: 48px;
    border-radius: 50%;
    font-size: 1.05rem;
    cursor: pointer;
    box-shadow: var(--shadow-md);
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all var(--t-base);
}

.gallery-btn:hover {
    background: var(--grad-cool);
    border-color: transparent;
    color: var(--white);
    box-shadow: var(--glow-blue);
    transform: translateY(-58%) scale(1.08);
}

.prev-btn { left: 0; }
.next-btn { right: 0; }

/* ══════════════════════════════════════════
   LIGHTBOX
══════════════════════════════════════════ */
.lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(10,14,18,.92);
    align-items: center;
    justify-content: center;
    padding: 2rem;
    backdrop-filter: blur(6px);
}

.lightbox.active {
    display: flex;
    animation: fade-in .25s ease both;
}

@keyframes fade-in {
    from { opacity: 0; }
    to   { opacity: 1; }
}

.lightbox-content-wrapper {
    position: relative;
    max-width: 860px;
    width: 100%;
    display: flex;
    justify-content: center;
    animation: scale-in .3s cubic-bezier(0,0,.2,1) both;
}

@keyframes scale-in {
    from { opacity: 0; transform: scale(.96); }
    to   { opacity: 1; transform: scale(1); }
}

.lightbox-content-wrapper img,
.lightbox-content-wrapper video {
    max-width: 100%;
    max-height: 82vh;
    border-radius: var(--r-lg);
    box-shadow: var(--shadow-xl);
    display: block;
}

.lightbox-close {
    position: absolute;
    top: -44px; right: 0;
    color: rgba(255,255,255,.7);
    font-size: 2rem;
    cursor: pointer;
    width: 36px; height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: color var(--t-base), background var(--t-base);
}

.lightbox-close:hover {
    color: var(--white);
    background: rgba(255,255,255,.1);
}

/* ══════════════════════════════════════════
   TESTIMONIALS
══════════════════════════════════════════ */
.testimonials {
    padding: 7rem 0;
    background: var(--surface);
    overflow: hidden;
}

.testimonials .section-title { padding: 0 2rem; }

.testimonials-scroll-wrapper {
    display: flex;
    gap: 1.5rem;
    padding: 1rem 2rem 2.5rem;
    overflow-x: auto;
    -ms-overflow-style: none;
    scrollbar-width: none;
    scroll-snap-type: x mandatory;
}

.testimonials-scroll-wrapper::-webkit-scrollbar { display: none; }

.testimonial-card {
    flex: 0 0 340px;
    scroll-snap-align: start;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    padding: 2rem;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    gap: 0.85rem;
    transition: transform var(--t-slow), box-shadow var(--t-slow);
    position: relative;
}

.testimonial-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
}

.testimonial-card::before {
    content: '\201C';
    position: absolute;
    top: 1rem; right: 1.5rem;
    font-size: 5rem;
    line-height: 1;
    font-family: var(--font-display);
    color: var(--blue-light);
    pointer-events: none;
    user-select: none;
}

.testimonial-header {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.testimonial-avatar {
    width: 50px; height: 50px;
    flex-shrink: 0;
    border-radius: 50%;
    background: var(--grad-cool);
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 1.2rem;
    box-shadow: var(--glow-blue);
}

.testimonial-info h4 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.15rem;
}

.testimonial-info p {
    font-size: 0.82rem;
    color: var(--muted);
    margin: 0;
}

.stars {
    color: #F5A623;
    font-size: 0.88rem;
    letter-spacing: 0.04em;
}

.testimonial-message {
    color: var(--dark-mid);
    font-size: 0.93rem;
    line-height: 1.75;
    opacity: 0.85;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
    margin: 0;
}

.read-more-toggle { display: none; }

.read-more-label {
    font-size: 0.83rem;
    font-weight: 600;
    color: var(--blue-deep);
    cursor: pointer;
    display: inline-block;
    transition: color var(--t-base);
    align-self: flex-start;
}

.read-more-label::after { content: 'Baca selengkapnya →'; }
.read-more-label:hover { color: var(--green-deep); }
.read-more-toggle:checked ~ .testimonial-message { -webkit-line-clamp: unset; }
.read-more-toggle:checked ~ .read-more-label::after { content: '← Tutup'; }

/* ══════════════════════════════════════════
   TESTIMONIAL FORM
══════════════════════════════════════════ */
.testimonial-form-section {
    padding: 7rem 2rem;
    background: var(--white);
}

.form-container {
    max-width: 760px;
    margin: 0 auto;
    background: var(--surface);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    padding: 3rem;
    box-shadow: var(--shadow-md);
}

.form-group { margin-bottom: 1.75rem; }

.form-group label {
    display: block;
    color: var(--dark);
    font-weight: 600;
    font-size: 0.91rem;
    margin-bottom: 0.55rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 0.88rem 1.2rem;
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-md);
    font-size: 0.96rem;
    font-family: var(--font-body);
    background: var(--white);
    color: var(--dark);
    outline: none;
    transition: border-color var(--t-base), box-shadow var(--t-base);
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--blue-mid);
    box-shadow: 0 0 0 4px rgba(107,174,200,.14);
}

.form-group textarea {
    resize: vertical;
    min-height: 140px;
}

.form-group .form-error {
    display: block;
    color: var(--rose-deep);
    font-size: 0.85rem;
    margin-top: 0.4rem;
}

/* Star rating — reversed order trick */
.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 0.3rem;
}

.rating-input input[type="radio"] { display: none; }

.rating-input label {
    font-size: 2.1rem;
    color: var(--surface-alt);
    cursor: pointer;
    transition: color var(--t-base), transform var(--t-base);
    margin: 0;
    font-weight: normal;
    user-select: none;
}

.rating-input label:hover,
.rating-input label:hover ~ label,
.rating-input input[type="radio"]:checked ~ label {
    color: #F5A623;
    transform: scale(1.18);
}

.btn-submit {
    width: 100%;
    padding: 1.1rem;
    background: var(--grad-deep);
    color: var(--white);
    border: none;
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-size: 1.05rem;
    font-weight: 700;
    cursor: pointer;
    letter-spacing: 0.02em;
    box-shadow: var(--glow-blue);
    transition: opacity var(--t-base), transform var(--t-base), box-shadow var(--t-base);
}

.btn-submit:hover {
    opacity: .9;
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(74,143,171,.38);
}

.alert-success {
    padding: 1rem 1.4rem;
    border-radius: var(--r-md);
    margin-bottom: 1.5rem;
    background: var(--green-light);
    border: 1px solid var(--green);
    color: var(--green-deep);
    font-weight: 500;
    font-size: 0.93rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* ══════════════════════════════════════════
   CTA SECTION
══════════════════════════════════════════ */
.cta-section {
    padding: 7rem 2rem;
    background: var(--blue-deep);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 70% 80% at 20% 50%, rgba(168,216,234,.07) 0%, transparent 60%),
        radial-gradient(ellipse 60% 70% at 80% 50%, rgba(184,224,210,.06) 0%, transparent 60%);
    pointer-events: none;
}

.cta-section h2 {
    font-family: var(--font-display);
    font-size: clamp(1.9rem, 4vw, 3.1rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.025em;
    margin-bottom: 1.1rem;
    position: relative;
}

.cta-section > p {
    font-size: 1.1rem;
    color: rgba(255,255,255,.85);
    margin-bottom: 2.5rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.75;
    position: relative;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
}

.btn-cta-primary {
    padding: 0.95rem 2.5rem;
    background: var(--grad-cool);
    color: var(--dark);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 700;
    font-size: 1.02rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--glow-blue);
    transition: transform var(--t-base), box-shadow var(--t-base);
}

.btn-cta-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 16px 40px rgba(74,143,171,.45);
    color: var(--blue-muted);
    text-decoration: none;
}

.btn-cta-outline {
    padding: 0.95rem 2.5rem;
    background: transparent;
    color: rgba(255,255,255,.75);
    border: 1.5px solid rgba(255,255,255,.2);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 1.02rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--t-base);
}

.btn-cta-outline:hover {
    border-color: rgba(255,255,255,.5);
    color: var(--white);
    background: rgba(255,255,255,.06);
    transform: translateY(-3px);
    text-decoration: none;
}

/* ══════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════ */
@media (max-width: 1100px) {
    .features-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
    .features, .portfolio-section,
    .testimonial-form-section, .cta-section { padding: 4rem 1.25rem; }
    .gallery-section, .testimonials { padding: 4rem 0; }

    .section-title { margin-bottom: 2rem; }

    /* Hero */
    .hero { min-height: auto; padding: 6rem 0 3.5rem; }
    .hero-content { grid-template-columns: 1fr; text-align: center; gap: 2rem; padding: 0 1.25rem; }
    .hero-text > p { margin-left: auto; margin-right: auto; }
    .hero-stats { justify-content: center; }
    .hero-buttons { justify-content: center; }
    .hero-buttons .btn { flex: 1; min-width: 140px; }
    .hero-image { order: -1; }
    .hero-image-container { height: 260px; }

    /* Features */
    .features-grid { grid-template-columns: 1fr; gap: 1.1rem; }
    .feature-card { padding: 1.75rem 1.4rem; border-radius: var(--r-lg); }

    /* Portfolio */
    .portfolio-grid { grid-template-columns: 1fr; }

    /* Gallery */
    .gallery-wrapper { padding: 0 1.25rem; }
    .gallery-btn { display: none; }
    .gallery-item { flex: 0 0 230px; width: 230px; height: 230px; }

    /* Testimonials */
    .testimonials-scroll-wrapper { padding: 0.75rem 1.25rem 2rem; }
    .testimonial-card { flex: 0 0 82vw; max-width: 300px; padding: 1.5rem; }

    /* Form */
    .form-container { padding: 1.75rem; border-radius: var(--r-lg); }
    .rating-input label { font-size: 1.75rem; }

    /* CTA */
    .cta-section > p { margin-bottom: 2rem; }
    .cta-buttons { flex-direction: column; align-items: center; }
    .btn-cta-primary, .btn-cta-outline { width: 100%; max-width: 300px; justify-content: center; }
}

@media (max-width: 480px) {
    .hero-stats { flex-direction: column; align-items: center; gap: 1rem; }
    .hero-stat-divider { display: none; }
}
</style>
@endsection

@section('content')

{{-- ══ HERO ══ --}}
<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <span class="hero-eyebrow">
                <i class="fas fa-certificate"></i> Spesialis Styrofoam Indonesia
            </span>
            <h1>Wujudkan Dekorasi <em>Impian</em> Anda!</h1>
            <p>HalloEO adalah spesialis pembuatan dekorasi dan maskot dari styrofoam yang profesional, kreatif, dan berkualitas tinggi untuk berbagai kebutuhan event Anda.</p>
            <div class="hero-buttons">
                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">
                    <i class="fas fa-images"></i> Lihat Portofolio
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline">
                    <i class="fas fa-phone"></i> Hubungi Kami
                </a>
            </div>
        </div>

        <div class="hero-image">
            <div class="hero-image-container">
                <svg class="floating-img" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#A8D8EA;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#B8E0D2;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <rect x="50" y="100" width="120" height="200" rx="20" fill="url(#grad1)" opacity="0.8"/>
                    <circle cx="230" cy="150" r="80" fill="#D88A8A" opacity="0.7"/>
                    <polygon points="280,250 350,300 280,350 210,300" fill="#A8D8EA" opacity="0.6"/>
                    <rect x="100" y="50" width="80" height="80" rx="40" fill="#B8E0D2" opacity="0.5"/>
                </svg>
            </div>
        </div>
    </div>
</section>

{{-- ══ FEATURES ══ --}}
<section class="features">
    <div class="section-title">
        <span class="section-eyebrow">Keunggulan Kami</span>
        <h2>Mengapa Memilih HalloEO?</h2>
        <p>Keunggulan layanan kami untuk mewujudkan dekorasi impian Anda</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fas fa-lightbulb feature-icon"></i>
            </div>
            <h3>Desain Kreatif</h3>
            <p>Tim desainer berpengalaman kami siap mewujudkan setiap ide menjadi karya nyata yang memukau.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fas fa-star feature-icon"></i>
            </div>
            <h3>Kualitas Premium</h3>
            <p>Menggunakan material styrofoam berkualitas tinggi dengan finishing yang rapi dan tahan lama.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fas fa-clock feature-icon"></i>
            </div>
            <h3>Pengerjaan Cepat</h3>
            <p>Komitmen menyelesaikan pesanan tepat waktu tanpa mengorbankan kualitas hasil akhir.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fas fa-hand-holding-usd feature-icon"></i>
            </div>
            <h3>Harga Kompetitif</h3>
            <p>Harga transparan dan bersaing untuk setiap ukuran proyek, dari kecil hingga besar.</p>
        </div>
    </div>
</section>

{{-- ══ PORTFOLIO ══ --}}
<section class="portfolio-section">
    <div class="section-title">
        <span class="section-eyebrow">Karya Terbaik</span>
        <h2>Portofolio Kami</h2>
        <p>Lihat hasil karya terbaik yang telah kami kerjakan untuk berbagai klien</p>
    </div>
    <div class="portfolio-grid">
        @forelse($featuredPortfolios ?? [] as $portfolio)
        <div class="portfolio-card" onclick="window.location='{{ route('portfolio.show', $portfolio->id) }}'">
            <div class="portfolio-img-wrap">
                <img
                    src="{{ asset($portfolio->image_path) }}"
                    alt="{{ $portfolio->title }}"
                    class="portfolio-img"
                    width="400" height="300"
                    onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text=HalloEO'"
                >
            </div>
            <div class="portfolio-info">
                <span class="portfolio-category">{{ ucfirst($portfolio->category) }}</span>
                <h3>{{ $portfolio->title }}</h3>
                <p>{{ Str::limit($portfolio->description, 100) }}</p>
            </div>
        </div>
        @empty
        <div class="portfolio-card">
            <div class="portfolio-img-wrap">
                <img src="https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text=Dekorasi+Pernikahan" alt="Sample" class="portfolio-img" width="400" height="300">
            </div>
            <div class="portfolio-info">
                <span class="portfolio-category">Dekorasi</span>
                <h3>Dekorasi Pernikahan Elegant</h3>
                <p>Dekorasi pernikahan dengan tema elegant dan modern menggunakan styrofoam berkualitas premium.</p>
            </div>
        </div>
        @endforelse
    </div>
    <div class="portfolio-cta">
        <a href="{{ route('portfolio.index') }}" class="btn btn-grad">
            <i class="fas fa-arrow-right"></i> Lihat Semua Portofolio
        </a>
    </div>
</section>

{{-- ══ GALLERY ══ --}}
<section class="gallery-section">
    <div class="section-title">
        <span class="section-eyebrow">Behind The Scenes</span>
        <h2>Galeri HalloEO</h2>
        <p>Momen dan proses kreatif di balik layar HalloEO</p>
    </div>

    <div class="gallery-wrapper">
        <button class="gallery-btn prev-btn" onclick="slideGallery(-1)" aria-label="Sebelumnya">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="gallery-grid" id="galleryGrid">
            @forelse($galleries ?? [] as $gallery)
                <div class="gallery-item" onclick="openLightbox('{{ asset($gallery->file_path) }}', '{{ $gallery->type }}')">
                    @if($gallery->type == 'video')
                        <video src="{{ asset($gallery->file_path) }}" muted loop playsinline></video>
                        <div class="gallery-overlay">
                            <i class="fas fa-play-circle play-icon"></i>
                        </div>
                    @else
                        <img src="{{ asset($gallery->file_path) }}" alt="Galeri HalloEO" loading="lazy">
                        <div class="gallery-overlay">
                            <i class="fas fa-expand play-icon" style="font-size:2.2rem;"></i>
                        </div>
                    @endif
                </div>
            @empty
                <div style="text-align:center; width:100%; padding:2rem; color:var(--muted);">
                    Galeri masih kosong.
                </div>
            @endforelse
        </div>

        <button class="gallery-btn next-btn" onclick="slideGallery(1)" aria-label="Berikutnya">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section>

{{-- Lightbox --}}
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true">
    <div class="lightbox-content-wrapper">
        <span class="lightbox-close" onclick="closeLightbox()" aria-label="Tutup">&times;</span>
        <div id="lightbox-container"></div>
    </div>
</div>

{{-- ══ TESTIMONIALS ══ --}}
<section class="testimonials">
    <div class="section-title">
        <span class="section-eyebrow">Ulasan Klien</span>
        <h2>Kata Mereka Tentang Kami</h2>
        <p>Testimoni dari klien yang puas dengan layanan HalloEO</p>
    </div>
    <div class="testimonials-scroll-wrapper" id="testimonialsWrapper">
        @forelse($testimonials as $index => $testimonial)
        <div class="testimonial-card">
            <div class="testimonial-header">
                <div class="testimonial-avatar">
                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                </div>
                <div class="testimonial-info">
                    <h4>{{ $testimonial->name }}</h4>
                    <p>{{ $testimonial->company ?? 'Klien HalloEO' }}</p>
                </div>
            </div>

            <div class="stars">
                @for($i = 0; $i < $testimonial->rating; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>

            <input type="checkbox" class="read-more-toggle" id="read-more-{{ $index }}">
            <p class="testimonial-message">{{ $testimonial->message }}</p>
            @if(strlen($testimonial->message) > 120)
                <label for="read-more-{{ $index }}" class="read-more-label"></label>
            @endif
        </div>
        @empty
        @endforelse
    </div>
</section>

{{-- ══ TESTIMONIAL FORM ══ --}}
<section class="testimonial-form-section">
    <div class="section-title">
        <span class="section-eyebrow">Bagikan Pengalaman</span>
        <h2>Berikan Testimoni Anda</h2>
        <p>Ceritakan pengalaman Anda menggunakan layanan HalloEO</p>
    </div>
    <div class="form-container">
        @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('testimonial.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap <span style="color:var(--rose-deep)">*</span></label>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda" value="{{ old('name') }}">
                @error('name')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="company">Perusahaan / Instansi <span style="color:var(--muted);font-weight:400">(Opsional)</span></label>
                <input type="text" id="company" name="company" placeholder="Nama perusahaan Anda" value="{{ old('company') }}">
            </div>

            <div class="form-group">
                <label>Rating <span style="color:var(--rose-deep)">*</span></label>
                <div class="rating-input">
                    <input type="radio" name="rating" id="star5" value="5" required>
                    <label for="star5"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star4" value="4">
                    <label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star3" value="3">
                    <label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star2" value="2">
                    <label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star1" value="1">
                    <label for="star1"><i class="fas fa-star"></i></label>
                </div>
                @error('rating')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="message">Testimoni Anda <span style="color:var(--rose-deep)">*</span></label>
                <textarea id="message" name="message" required placeholder="Ceritakan pengalaman Anda...">{{ old('message') }}</textarea>
                @error('message')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Kirim Testimoni
            </button>
        </form>
    </div>
</section>

{{-- ══ CTA ══ --}}
<section class="cta-section">
    <h2>Siap Mewujudkan Proyek Anda?</h2>
    <p>Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik!</p>
    <div class="cta-buttons">
        <a href="{{ route('contact') }}" class="btn-cta-primary">
            <i class="fas fa-comments"></i> Mulai Konsultasi
        </a>
        <a href="{{ route('portfolio.index') }}" class="btn-cta-outline">
            <i class="fas fa-images"></i> Lihat Portofolio
        </a>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ── Testimonial auto-scroll ── */
    const wrapper = document.getElementById('testimonialsWrapper');
    if (wrapper && wrapper.children.length) {
        const originals = Array.from(wrapper.children);
        originals.forEach(c => wrapper.appendChild(c.cloneNode(true)));

        const cardW = 340 + 24; // width + gap
        let timer;

        function scroll() {
            const half = wrapper.scrollWidth / 2;
            if (wrapper.scrollLeft >= half - cardW) {
                wrapper.style.scrollBehavior = 'auto';
                wrapper.scrollLeft = 0;
                setTimeout(() => {
                    wrapper.style.scrollBehavior = 'smooth';
                    wrapper.scrollBy({ left: cardW });
                }, 50);
            } else {
                wrapper.style.scrollBehavior = 'smooth';
                wrapper.scrollBy({ left: cardW });
            }
        }

        function start() { timer = setInterval(scroll, 3200); }
        function stop()  { clearInterval(timer); }

        start();
        wrapper.addEventListener('mouseenter', stop);
        wrapper.addEventListener('touchstart', stop, { passive: true });
        wrapper.addEventListener('mouseleave', start);
        wrapper.addEventListener('touchend',   start);
    }

    /* ── Gallery scroll ── */
    window.slideGallery = function (dir) {
        document.getElementById('galleryGrid').scrollBy({ left: dir * 300, behavior: 'smooth' });
    };

    /* ── Lightbox ── */
    const lightbox   = document.getElementById('lightbox');
    const lbContainer = document.getElementById('lightbox-container');

    window.openLightbox = function (src, type) {
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
        lbContainer.innerHTML = type === 'video'
            ? `<video src="${src}" controls autoplay style="width:100%;max-height:82vh;border-radius:16px;"></video>`
            : `<img src="${src}" style="width:100%;max-height:82vh;border-radius:16px;object-fit:contain;" alt="Galeri">`;
    };

    window.closeLightbox = function () {
        lightbox.classList.remove('active');
        lbContainer.innerHTML = '';
        document.body.style.overflow = '';
    };

    lightbox.addEventListener('click', e => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
    });
});
</script>
@endsection