@extends('layout')

@section('title', 'HalloEO-Dekorasi & Maskot Styrofoam Profesional')
@section('description', 'HalloEO menyediakan jasa dekorasi styrofoam, maskot custom, properti event, dan dekorasi promosi untuk acara perusahaan, ulang tahun, pameran, dan kebutuhan kreatif di Bekasi, Jakarta, dan sekitarnya.')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   HOME PAGE — HalloEO
   Studio Craft · Clean · Professional
═══════════════════════════════════════════════ */

:root {
    --ink:                #1C1F1B;
    --ink-soft:            #3A3E37;
    --paper:               #FAF9F6;
    --paper-alt:           #F1EFE9;
    --line:                #E1DDD3;
    --muted:               #767A70;
    --accent:              #E0542C;
    --accent-dark:         #B8401E;
    --accent-tint:         #FBEAE3;
    --white:               #FFFFFF;

    --shadow-sm:           0 1px 2px rgba(28,31,27,.05), 0 1px 1px rgba(28,31,27,.04);
    --shadow-md:           0 8px 24px rgba(28,31,27,.08);
    --shadow-lg:           0 24px 56px rgba(28,31,27,.12);

    --r-sm:                6px;
    --r-md:                10px;
    --r-lg:                14px;
    --r-full:              999px;

    --font-display:        'Fraunces', 'Playfair Display', Georgia, serif;
    --font-body:           'Inter', system-ui, -apple-system, sans-serif;

    --t:                   200ms cubic-bezier(.4,0,.2,1);
    --t-slow:              340ms cubic-bezier(.4,0,.2,1);

    --container:           1180px;
}

/* ── Shared section scaffolding ── */
.section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 0.04em;
    color: var(--accent-dark);
    margin-bottom: 0.9rem;
}

.section-eyebrow::before {
    content: '';
    width: 16px;
    height: 1.5px;
    background: var(--accent);
}

.section-title {
    margin-bottom: clamp(2.5rem, 4vw, 3.25rem);
}

.section-title.center {
    text-align: center;
}

.section-title.center .section-eyebrow {
    justify-content: center;
}

.section-title.center .section-eyebrow::before {
    display: none;
}

.section-title h2 {
    font-family: var(--font-display);
    font-size: clamp(1.85rem, 3.4vw, 2.6rem);
    font-weight: 600;
    color: var(--ink);
    line-height: 1.18;
    letter-spacing: -0.01em;
    margin-bottom: 0.6rem;
}

.section-title p {
    font-size: 1rem;
    color: var(--muted);
    max-width: 480px;
    line-height: 1.7;
}

.section-title.center p {
    margin: 0 auto;
}

.section-wrap {
    max-width: var(--container);
    margin: 0 auto;
}

/* ══════════════════════════════════════════
   HERO
══════════════════════════════════════════ */
.hero-home {
    position: relative;
    background: var(--paper);
    padding: clamp(96px, 12vw, 132px) clamp(1.5rem, 5vw, 2.5rem) clamp(64px, 8vw, 88px);
    border-bottom: 1px solid var(--line);
}

.hero-container {
    max-width: var(--container);
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    gap: clamp(40px, 6vw, 76px);
    align-items: center;
}

.hero-copy {
    max-width: 560px;
}

.hero-copy h1 {
    margin: 0;
    font-family: var(--font-display);
    font-size: clamp(2.6rem, 5vw, 3.85rem);
    font-weight: 600;
    line-height: 1.08;
    letter-spacing: -0.02em;
    color: var(--ink);
}

.hero-copy h1 em {
    font-style: italic;
    color: var(--accent-dark);
}

.hero-copy p {
    margin: 1.5rem 0 0;
    max-width: 480px;
    color: var(--ink-soft);
    font-size: 1.05rem;
    line-height: 1.75;
}

.hero-actions {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    margin-top: 2.25rem;
    flex-wrap: wrap;
}

.hero-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    padding: 0 1.7rem;
    border-radius: var(--r-sm);
    font-family: var(--font-body);
    font-size: 0.95rem;
    font-weight: 600;
    text-decoration: none;
    transition: transform var(--t), box-shadow var(--t), background var(--t), border-color var(--t);
}

.hero-btn-primary {
    color: var(--white);
    background: var(--ink);
}

.hero-btn-primary:hover {
    background: var(--accent-dark);
    color: var(--white);
    text-decoration: none;
}

.hero-btn-outline {
    color: var(--ink);
    background: transparent;
    border: 1.5px solid var(--line);
}

.hero-btn-outline:hover {
    border-color: var(--ink);
    color: var(--ink);
    text-decoration: none;
}

.hero-stats {
    display: flex;
    gap: clamp(1.5rem, 4vw, 2.75rem);
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid var(--line);
}

.hero-stats div strong {
    display: block;
    font-family: var(--font-display);
    font-size: 1.85rem;
    font-weight: 600;
    color: var(--ink);
    line-height: 1;
}

.hero-stats div span {
    display: block;
    margin-top: 0.4rem;
    color: var(--muted);
    font-size: 0.82rem;
    font-weight: 500;
    line-height: 1.3;
}

.hero-visual {
    position: relative;
}

.hero-image-frame {
    position: relative;
    border-radius: var(--r-lg);
    overflow: hidden;
    aspect-ratio: 4 / 5;
    box-shadow: var(--shadow-lg);
}

.hero-image-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.hero-tag {
    position: absolute;
    left: 1.25rem;
    bottom: 1.25rem;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.7rem 1.1rem;
    border-radius: var(--r-md);
    background: rgba(250, 249, 246, 0.94);
    backdrop-filter: blur(8px);
    box-shadow: var(--shadow-md);
}

.hero-tag-swatch {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--accent);
    flex-shrink: 0;
}

.hero-tag span {
    display: block;
    font-size: 0.84rem;
    font-weight: 600;
    color: var(--ink);
    line-height: 1.3;
}

.hero-tag small {
    display: block;
    font-size: 0.72rem;
    color: var(--muted);
    font-weight: 500;
}

/* ══════════════════════════════════════════
   FEATURES
══════════════════════════════════════════ */
.features {
    padding: clamp(4.5rem, 7vw, 6rem) clamp(1.5rem, 5vw, 2.5rem);
    background: var(--white);
}

.features-grid {
    max-width: var(--container);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    border: 1px solid var(--line);
    border-radius: var(--r-lg);
    overflow: hidden;
}

.feature-card {
    background: var(--white);
    padding: 2.25rem 1.85rem;
    border-right: 1px solid var(--line);
    transition: background var(--t-slow);
}

.feature-card:last-child {
    border-right: none;
}

.feature-card:hover {
    background: var(--paper);
}

.feature-num {
    font-family: var(--font-display);
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--accent);
    margin-bottom: 1.4rem;
    display: block;
}

.feature-card h3 {
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 0.6rem;
    line-height: 1.3;
}

.feature-card p {
    color: var(--muted);
    font-size: 0.91rem;
    line-height: 1.7;
}

/* ══════════════════════════════════════════
   PORTFOLIO
══════════════════════════════════════════ */
.portfolio-section {
    padding: clamp(4.5rem, 7vw, 6rem) clamp(1.5rem, 5vw, 2.5rem);
    background: var(--paper);
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
}

.portfolio-header-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 2rem;
    flex-wrap: wrap;
}

.portfolio-grid {
    max-width: var(--container);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.portfolio-card {
    background: var(--white);
    border: 1px solid var(--line);
    border-radius: var(--r-md);
    overflow: hidden;
    transition: border-color var(--t), box-shadow var(--t-slow), transform var(--t-slow);
    display: flex;
    flex-direction: column;
    cursor: pointer;
}

.portfolio-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--line);
}

.portfolio-img-wrap {
    overflow: hidden;
    aspect-ratio: 4 / 3;
    background: var(--paper-alt);
}

.portfolio-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.portfolio-card:hover .portfolio-img { transform: scale(1.04); }

.portfolio-info {
    padding: 1.5rem;
    flex: 1;
}

.portfolio-category {
    display: inline-block;
    color: var(--accent-dark);
    font-size: 0.74rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    margin-bottom: 0.6rem;
}

.portfolio-info h3 {
    font-family: var(--font-display);
    font-size: 1.18rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 0.45rem;
    line-height: 1.3;
}

.portfolio-info p {
    color: var(--muted);
    font-size: 0.89rem;
    line-height: 1.65;
}

.portfolio-cta {
    text-align: center;
    margin-top: 2.75rem;
}

.btn-outline-dark {
    display: inline-flex;
    align-items: center;
    gap: 0.55rem;
    padding: 0.85rem 1.85rem;
    border: 1.5px solid var(--ink);
    border-radius: var(--r-sm);
    color: var(--ink);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.94rem;
    text-decoration: none;
    transition: background var(--t), color var(--t);
}

.btn-outline-dark:hover {
    background: var(--ink);
    color: var(--white);
    text-decoration: none;
}

/* ══════════════════════════════════════════
   GALLERY
══════════════════════════════════════════ */
.gallery-section {
    padding: clamp(4.5rem, 7vw, 6rem) 0;
    background: var(--white);
    overflow: hidden;
}

.gallery-section .section-wrap {
    padding: 0 clamp(1.5rem, 5vw, 2.5rem);
}

.gallery-wrapper {
    position: relative;
    max-width: var(--container);
    margin: 0 auto;
    padding: 0 clamp(1.5rem, 5vw, 2.5rem);
}

.gallery-grid {
    display: flex;
    gap: 1rem;
    padding: 0.25rem 0 0.5rem;
    overflow-x: auto;
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.gallery-grid::-webkit-scrollbar {
    display: none;
}

.gallery-item {
    flex: 0 0 250px;
    width: 250px;
    height: 250px;
    border-radius: var(--r-md);
    overflow: hidden;
    cursor: pointer;
    border: 1px solid var(--line);
    position: relative;
    transition: border-color var(--t);
}

.gallery-item:hover {
    border-color: var(--ink);
}

.gallery-item img,
.gallery-item video {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.gallery-item:hover img,
.gallery-item:hover video {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: rgba(28,31,27,.28);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--t);
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.play-icon {
    font-size: 2.2rem;
    color: var(--white);
}

.gallery-controls {
    display: flex;
    justify-content: flex-end;
    gap: 0.6rem;
    max-width: var(--container);
    margin: 0 auto 1.25rem;
    padding: 0 clamp(1.5rem, 5vw, 2.5rem);
}

.gallery-btn {
    background: var(--white);
    border: 1.5px solid var(--line);
    color: var(--ink-soft);
    width: 42px; height: 42px;
    border-radius: 50%;
    font-size: 0.95rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all var(--t);
}

.gallery-btn:hover {
    background: var(--ink);
    border-color: var(--ink);
    color: var(--white);
}

/* ══════════════════════════════════════════
   LIGHTBOX
══════════════════════════════════════════ */
.lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(16,18,15,.92);
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.lightbox.active {
    display: flex;
    animation: fade-in .2s ease both;
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
}

.lightbox-content-wrapper img,
.lightbox-content-wrapper video {
    max-width: 100%;
    max-height: 82vh;
    border-radius: var(--r-md);
    display: block;
}

.lightbox-close {
    position: absolute;
    top: -44px; right: 0;
    color: rgba(255,255,255,.7);
    font-size: 1.8rem;
    cursor: pointer;
    width: 36px; height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color var(--t);
}

.lightbox-close:hover {
    color: var(--white);
}

/* ══════════════════════════════════════════
   TESTIMONIALS
══════════════════════════════════════════ */
.testimonials {
    padding: clamp(4.5rem, 7vw, 6rem) 0;
    background: var(--paper);
    border-top: 1px solid var(--line);
    overflow: hidden;
}

.testimonials .section-wrap {
    padding: 0 clamp(1.5rem, 5vw, 2.5rem);
}

.testimonials-scroll-wrapper {
    display: flex;
    gap: 1.25rem;
    padding: 0.25rem clamp(1.5rem, 5vw, 2.5rem) 0.5rem;
    overflow-x: auto;
    -ms-overflow-style: none;
    scrollbar-width: none;
    scroll-snap-type: x mandatory;
}

.testimonials-scroll-wrapper::-webkit-scrollbar {
    display: none;
}

.testimonial-card {
    flex: 0 0 320px;
    scroll-snap-align: start;
    background: var(--white);
    border: 1px solid var(--line);
    border-radius: var(--r-md);
    padding: 1.85rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.testimonial-header {
    display: flex;
    align-items: center;
    gap: 0.85rem;
}

.testimonial-avatar {
    width: 42px; height: 42px;
    flex-shrink: 0;
    border-radius: 50%;
    background: var(--ink);
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-display);
    font-weight: 600;
    font-size: 1rem;
}

.testimonial-info h4 {
    font-family: var(--font-body);
    font-size: 0.96rem;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 0.1rem;
}

.testimonial-info p {
    font-size: 0.79rem;
    color: var(--muted);
    margin: 0;
}

.stars {
    color: var(--accent);
    font-size: 0.8rem;
    letter-spacing: 0.04em;
}

.testimonial-message {
    color: var(--ink-soft);
    font-size: 0.91rem;
    line-height: 1.7;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
    margin: 0;
}

.read-more-toggle {
    display: none;
}

.read-more-label {
    font-size: 0.81rem;
    font-weight: 600;
    color: var(--accent-dark);
    cursor: pointer;
    display: inline-block;
    align-self: flex-start;
}

.read-more-label::after {
    content: 'Baca selengkapnya →';
}

.read-more-toggle:checked ~ .testimonial-message {
    -webkit-line-clamp: unset;
}

.read-more-toggle:checked ~ .read-more-label::after {
    content: '← Tutup';
}

/* ══════════════════════════════════════════
   TESTIMONIAL FORM
══════════════════════════════════════════ */
.testimonial-form-section {
    padding: clamp(4.5rem, 7vw, 6rem) clamp(1.5rem, 5vw, 2.5rem);
    background: var(--white);
}

.form-container {
    max-width: 680px;
    margin: 0 auto;
    background: var(--paper);
    border: 1px solid var(--line);
    border-radius: var(--r-lg);
    padding: 2.75rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    color: var(--ink);
    font-weight: 600;
    font-size: 0.88rem;
    margin-bottom: 0.5rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 1.5px solid var(--line);
    border-radius: var(--r-sm);
    font-size: 0.95rem;
    font-family: var(--font-body);
    background: var(--white);
    color: var(--ink);
    outline: none;
    transition: border-color var(--t);
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--ink);
}

.form-group textarea {
    resize: vertical;
    min-height: 130px;
}

.form-group .form-error {
    display: block;
    color: var(--accent-dark);
    font-size: 0.83rem;
    margin-top: 0.4rem;
}

.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 0.25rem;
}

.rating-input input[type="radio"] {
    display: none;
}

.rating-input label {
    font-size: 1.8rem;
    color: var(--line);
    cursor: pointer;
    transition: color var(--t);
    margin: 0;
    font-weight: normal;
    user-select: none;
}

.rating-input label:hover,
.rating-input label:hover ~ label,
.rating-input input[type="radio"]:checked ~ label {
    color: var(--accent);
}

.btn-submit {
    width: 100%;
    padding: 1rem;
    background: var(--ink);
    color: var(--white);
    border: none;
    border-radius: var(--r-sm);
    font-family: var(--font-body);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background var(--t);
}

.btn-submit:hover {
    background: var(--accent-dark);
}

.alert-success {
    padding: 0.9rem 1.2rem;
    border-radius: var(--r-sm);
    margin-bottom: 1.5rem;
    background: var(--accent-tint);
    border: 1px solid var(--accent);
    color: var(--accent-dark);
    font-weight: 500;
    font-size: 0.91rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* ══════════════════════════════════════════
   CTA SECTION
══════════════════════════════════════════ */
.cta-section {
    padding: clamp(4.5rem, 7vw, 6rem) clamp(1.5rem, 5vw, 2.5rem);
    background: var(--ink);
    text-align: center;
}

.cta-section h2 {
    font-family: var(--font-display);
    font-size: clamp(1.85rem, 3.6vw, 2.7rem);
    font-weight: 600;
    color: var(--white);
    letter-spacing: -0.01em;
    margin-bottom: 0.9rem;
}

.cta-section > p {
    font-size: 1.05rem;
    color: rgba(255,255,255,.68);
    margin-bottom: 2rem;
    max-width: 460px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.7;
}

.cta-buttons {
    display: flex;
    gap: 0.85rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-cta-primary {
    padding: 0.95rem 2.1rem;
    background: var(--accent);
    color: var(--white);
    border-radius: var(--r-sm);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.97rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: background var(--t);
}

.btn-cta-primary:hover {
    background: var(--accent-dark);
    color: var(--white);
    text-decoration: none;
}

.btn-cta-outline {
    padding: 0.95rem 2.1rem;
    background: transparent;
    color: rgba(255,255,255,.85);
    border: 1.5px solid rgba(255,255,255,.25);
    border-radius: var(--r-sm);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.97rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--t);
}

.btn-cta-outline:hover {
    border-color: rgba(255,255,255,.6);
    color: var(--white);
    text-decoration: none;
}

/* ══════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════ */
@media (max-width: 1100px) {
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .feature-card {
        border-bottom: 1px solid var(--line);
    }

    .feature-card:nth-child(2n) {
        border-right: none;
    }

    .feature-card:nth-last-child(-n+2) {
        border-bottom: none;
    }

    .hero-container {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .hero-visual {
        max-width: 420px;
    }
}

@media (max-width: 768px) {
    .features,
    .portfolio-section,
    .testimonial-form-section,
    .cta-section {
        padding: 3.5rem 1.25rem;
    }

    .gallery-section,
    .testimonials {
        padding: 3.5rem 0;
    }

    .section-title {
        margin-bottom: 2.25rem;
    }

    .hero-home {
        padding: 88px 1.25rem 52px;
    }

    .hero-copy h1 {
        font-size: clamp(2.3rem, 9vw, 3rem);
    }

    .hero-stats {
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .hero-visual {
        max-width: 320px;
        margin: 0 auto;
    }

    .features-grid {
        grid-template-columns: 1fr;
        border-radius: var(--r-md);
    }

    .feature-card {
        border-right: none !important;
        border-bottom: 1px solid var(--line);
    }

    .feature-card:last-child {
        border-bottom: none;
    }

    .portfolio-grid {
        grid-template-columns: 1fr;
    }

    .gallery-controls {
        display: none;
    }

    .gallery-item {
        flex: 0 0 210px;
        width: 210px;
        height: 210px;
    }

    .testimonial-card {
        flex: 0 0 82vw;
        max-width: 290px;
        padding: 1.5rem;
    }

    .form-container {
        padding: 1.75rem;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn-cta-primary,
    .btn-cta-outline {
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .hero-actions {
        align-items: stretch;
    }

    .hero-btn {
        width: 100%;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem 1rem;
    }
}
</style>
@endsection

@push('preload')
{{-- FIX: Preload hero image → LCP lebih cepat --}}
<link rel="preload" as="image" href="{{ asset('images/bg-home-1080.webp') }}" type="image/webp" fetchpriority="high">

{{-- Font untuk desain baru: pastikan tersedia meski belum didaftarkan di layout utama --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;1,9..144,500;1,9..144,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush


@section('content')
{{-- ══ HERO ══ --}}
<section class="hero-home" id="home">
    <div class="hero-container">
        <div class="hero-copy">
            <h1>
                Dekorasi custom yang membuat acara <em>lebih berkesan</em>
            </h1>

            <p>
                HalloEO membantu mewujudkan dekorasi event, maskot styrofoam,
                display produk, dan kebutuhan visual brand dengan desain yang
                rapi, kreatif, dan profesional.
            </p>

            <div class="hero-actions">
                <a href="#portfolio" class="hero-btn hero-btn-primary">
                    Lihat Portofolio
                </a>

                <a href="#kontak" class="hero-btn hero-btn-outline">
                    Konsultasi Sekarang
                </a>
            </div>

            <div class="hero-stats">
                <div>
                    <strong>2008</strong>
                    <span>Berpengalaman sejak</span>
                </div>
                <div>
                    <strong>15+</strong>
                    <span>Tahun melayani klien</span>
                </div>
                <div>
                    <strong>Custom</strong>
                    <span>Desain & maskot</span>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-image-frame">
                <img
                    src="{{ asset('images/bg-home-1080.webp') }}"
                    alt="Contoh dekorasi styrofoam HalloEO"
                    fetchpriority="high"
                    decoding="async">

                <div class="hero-tag">
                    <span class="hero-tag-swatch"></span>
                    <span>
                        Maskot & Display
                        <small>Custom · Bekasi & Jakarta</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══ FEATURES ══ --}}
<section class="features">
    <div class="section-title center">
        <span class="section-eyebrow">Keunggulan Kami</span>
        <h2>Mengapa memilih HalloEO?</h2>
        <p>Empat alasan klien terus kembali bekerja sama dengan kami.</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <span class="feature-num">01</span>
            <h3>Desain Kreatif</h3>
            <p>Tim desainer berpengalaman kami siap mewujudkan setiap ide menjadi karya nyata yang memukau.</p>
        </div>
        <div class="feature-card">
            <span class="feature-num">02</span>
            <h3>Kualitas Premium</h3>
            <p>Menggunakan material styrofoam berkualitas tinggi dengan finishing yang rapi dan tahan lama.</p>
        </div>
        <div class="feature-card">
            <span class="feature-num">03</span>
            <h3>Pengerjaan Cepat</h3>
            <p>Komitmen menyelesaikan pesanan tepat waktu tanpa mengorbankan kualitas hasil akhir.</p>
        </div>
        <div class="feature-card">
            <span class="feature-num">04</span>
            <h3>Harga Kompetitif</h3>
            <p>Harga transparan dan bersaing untuk setiap ukuran proyek, dari kecil hingga besar.</p>
        </div>
    </div>
</section>

{{-- ══ PORTFOLIO ══ --}}
<section class="portfolio-section" id="portfolio">
    <div class="section-wrap">
        <div class="section-title center">
            <span class="section-eyebrow">Karya Terbaik</span>
            <h2>Portofolio kami</h2>
            <p>Lihat hasil karya terbaik yang telah kami kerjakan untuk berbagai klien di Jakarta, Bekasi, dan sekitarnya.</p>
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
                        loading="lazy"
                        decoding="async"
                        onerror="this.onerror=null;this.src='{{ asset('images/placeholder-portfolio.svg') }}'"
                    >
                </div>
                <div class="portfolio-info">
                    <span class="portfolio-category">{{ ucfirst($portfolio->category) }}</span>
                    <h3>{{ $portfolio->title }}</h3>
                    <p>{{ Str::limit($portfolio->description, 100) }}</p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        <div class="portfolio-cta">
            <a href="{{ route('portfolio.index') }}" class="btn-outline-dark">
                Lihat Semua Portofolio <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ══ GALLERY ══ --}}
<section class="gallery-section">
    <div class="section-wrap">
        <div class="section-title">
            <span class="section-eyebrow">Behind The Scenes</span>
            <h2>Galeri HalloEO</h2>
            <p>Momen dan proses kreatif di balik layar HalloEO.</p>
        </div>
    </div>

    <div class="gallery-controls">
        <button class="gallery-btn" onclick="slideGallery(-1)" aria-label="Sebelumnya">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="gallery-btn" onclick="slideGallery(1)" aria-label="Berikutnya">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <div class="gallery-wrapper">
        <div class="gallery-grid" id="galleryGrid">
            @forelse($galleries ?? [] as $index => $gallery)
                <div class="gallery-item" onclick="openLightbox('{{ asset($gallery->file_path) }}', '{{ $gallery->type }}')">
                    @if($gallery->type == 'video')
                        <video src="{{ asset($gallery->file_path) }}" muted loop playsinline></video>
                        <div class="gallery-overlay">
                            <i class="fas fa-play-circle play-icon"></i>
                        </div>
                    @else
                        {{-- FIX: hanya 2 gambar pertama eager, sisanya lazy --}}
                        <img src="{{ asset($gallery->file_path) }}"
                             alt="Galeri HalloEO"
                             loading="{{ $index < 2 ? 'eager' : 'lazy' }}"
                             decoding="async"
                             width="400" height="300">
                        <div class="gallery-overlay">
                            <i class="fas fa-expand play-icon" style="font-size:1.7rem;"></i>
                        </div>
                    @endif
                </div>
            @empty
                <div style="text-align:center; width:100%; padding:2rem; color:var(--muted);">
                    Galeri masih kosong.
                </div>
            @endforelse
        </div>
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
    <div class="section-wrap">
        <div class="section-title">
            <span class="section-eyebrow">Ulasan Klien</span>
            <h2>Kata mereka tentang kami</h2>
            <p>Testimoni dari klien yang puas dengan layanan HalloEO.</p>
        </div>
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
    <div class="section-title center">
        <span class="section-eyebrow">Bagikan Pengalaman</span>
        <h2>Berikan testimoni Anda</h2>
        <p>Ceritakan pengalaman Anda menggunakan layanan HalloEO.</p>
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
                <label for="name">Nama Lengkap <span style="color:var(--accent-dark)">*</span></label>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda" value="{{ old('name') }}">
                @error('name')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="company">Perusahaan / Instansi <span style="color:var(--muted);font-weight:400">(Opsional)</span></label>
                <input type="text" id="company" name="company" placeholder="Nama perusahaan Anda" value="{{ old('company') }}">
            </div>

            <div class="form-group">
                <label>Rating <span style="color:var(--accent-dark)">*</span></label>
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
                <label for="message">Testimoni Anda <span style="color:var(--accent-dark)">*</span></label>
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
<section class="cta-section" id="kontak">
    <h2>Siap mewujudkan proyek Anda?</h2>
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

        const cardW = 320 + 20; // width + gap
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
        document.getElementById('galleryGrid').scrollBy({ left: dir * 270, behavior: 'smooth' });
    };

    /* ── Lightbox ── */
    const lightbox   = document.getElementById('lightbox');
    const lbContainer = document.getElementById('lightbox-container');

    window.openLightbox = function (src, type) {
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
        lbContainer.innerHTML = type === 'video'
            ? `<video src="${src}" controls autoplay style="width:100%;max-height:82vh;border-radius:10px;"></video>`
            : `<img src="${src}" style="width:100%;max-height:82vh;border-radius:10px;object-fit:contain;" alt="Galeri">`;
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