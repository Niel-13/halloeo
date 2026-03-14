@extends('layout')

@section('title', 'Layanan Kami - HalloEO')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   SERVICES PAGE — HalloEO
   Consistent with Portfolio · Editorial · Soft Luxury
═══════════════════════════════════════════════ */

/* ── Hero ── */
.services-hero {
    min-height: 52vh;
    display: flex;
    align-items: flex-end;
    padding: 0 2.5rem 5rem;
    background: var(--green-deep);
    position: relative;
    overflow: hidden;
}

.services-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 55% 80% at 5%  20%, rgba(168,216,234,.14) 0%, transparent 55%),
        radial-gradient(ellipse 45% 70% at 95% 80%, rgba(184,224,210,.11) 0%, transparent 55%),
        radial-gradient(ellipse 60% 60% at 50% 110%, rgba(216,138,138,.07) 0%, transparent 50%);
    pointer-events: none;
    animation: sv-mesh-drift 18s ease-in-out infinite alternate;
}

@keyframes sv-mesh-drift {
    from { opacity: .7; transform: scale(1); }
    to   { opacity: 1;  transform: scale(1.04); }
}

/* Top accent line — identical to portfolio */
.services-hero::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

/* Decorative word in background */
.hero-deco-word {
    position: absolute;
    right: 2.5rem;
    top: 50%;
    transform: translateY(-52%);
    font-family: var(--font-display);
    font-size: clamp(8rem, 18vw, 16rem);
    font-weight: 900;
    line-height: 1;
    color: rgba(168,216,234,.07);
    pointer-events: none;
    user-select: none;
    letter-spacing: -0.04em;
    white-space: nowrap;
}

.services-hero-inner {
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
    animation: sv-fade-up .7s cubic-bezier(0,0,.2,1) both;
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

.services-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.8rem, 6.5vw, 5.5rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.03em;
    line-height: 1.08;
    margin-bottom: 1.5rem;
    animation: sv-fade-up .8s cubic-bezier(0,0,.2,1) .08s both;
}

.services-hero h1 span {
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
    animation: sv-fade-up .8s cubic-bezier(0,0,.2,1) .18s both;
    padding-bottom: 0.5rem;
}

.hero-right p {
    font-size: 1rem;
    color: rgba(255,255,255,.55);
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

@keyframes sv-fade-up {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Services Container ── */
.services-container {
    max-width: 1360px;
    margin: 0 auto;
    padding: 4rem 2.5rem 6rem;
}

.section-intro {
    margin-bottom: 2.5rem;
}

.section-intro-eyebrow {
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

.section-intro-eyebrow::before {
    content: '';
    width: 20px; height: 2px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
    border-radius: 2px;
    flex-shrink: 0;
}

.section-intro h2 {
    font-family: var(--font-display);
    font-size: clamp(1.7rem, 3vw, 2.4rem);
    font-weight: 800;
    color: var(--dark);
    letter-spacing: -0.02em;
    line-height: 1.15;
}

.section-intro h2 span { color: var(--blue-deep); }

/* ── Services Grid ── */
.services-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 1.5rem;
    align-items: start;
}

/* Default: 4 columns = span 4 */
.service-card { grid-column: span 4; }

/* 1st and 5th card span wider — same rhythm as portfolio */
.service-card:first-child  { grid-column: span 8; }
.service-card:nth-child(5) { grid-column: span 8; }

.service-card {
    background: var(--white);
    border-radius: 20px;
    overflow: hidden;
    border: 1.5px solid var(--surface-alt);
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    transition: transform var(--t-slow), box-shadow var(--t-slow), border-color var(--t-base);
    animation: sv-fade-up .55s cubic-bezier(0,0,.2,1) backwards;
}

.service-card:nth-child(1) { animation-delay: .04s; }
.service-card:nth-child(2) { animation-delay: .08s; }
.service-card:nth-child(3) { animation-delay: .12s; }
.service-card:nth-child(4) { animation-delay: .16s; }
.service-card:nth-child(5) { animation-delay: .20s; }
.service-card:nth-child(6) { animation-delay: .24s; }

.service-card:hover {
    transform: translateY(-7px);
    box-shadow: var(--shadow-lg);
    border-color: var(--blue-light);
}

/* ── Card Image ── */
.service-image-wrap {
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 2;
}

.service-card:first-child .service-image-wrap,
.service-card:nth-child(5) .service-image-wrap {
    aspect-ratio: 16 / 7;
}

.service-image {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .6s cubic-bezier(.4,0,.2,1);
}

.service-card:hover .service-image { transform: scale(1.06); }

/* Image overlay */
.service-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(170deg, transparent 35%, rgba(26,37,48,.7) 100%);
    opacity: 0;
    transition: opacity var(--t-base);
    display: flex;
    align-items: flex-end;
    padding: 1.4rem;
}

.service-card:hover .service-overlay { opacity: 1; }

.overlay-icon {
    width: 48px; height: 48px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.3);
    backdrop-filter: blur(8px);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.3rem;
    transform: translateY(8px);
    transition: transform var(--t-base);
}

.service-card:hover .overlay-icon { transform: translateY(0); }

/* ── Card Body ── */
.service-body {
    padding: 1.4rem 1.5rem 1.6rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0.45rem;
}

/* Color accent tag — cycles blue / green / red */
.service-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.22rem 0.78rem;
    border-radius: 50px;
    font-size: 0.71rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    align-self: flex-start;
}

.service-card:nth-child(3n+1) .service-tag { background: var(--blue-light);  color: var(--blue-deep); }
.service-card:nth-child(3n+2) .service-tag { background: rgba(184,224,210,.35); color: var(--green-deep); }
.service-card:nth-child(3n)   .service-tag { background: rgba(216,138,138,.15); color: var(--red-deep); }

.service-title {
    font-family: var(--font-display);
    font-size: 1.18rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.3;
    margin: 0;
    transition: color var(--t-base);
}

.service-card:hover .service-title { color: var(--blue-deep); }

.service-desc {
    color: var(--muted);
    font-size: 0.88rem;
    line-height: 1.65;
    flex-grow: 1;
    margin: 0;
}

/* Features list */
.service-features {
    list-style: none;
    padding: 0;
    margin: 0.2rem 0 0;
    display: flex;
    flex-direction: column;
}

.service-feature {
    display: flex;
    align-items: center;
    gap: 0.55rem;
    font-size: 0.83rem;
    color: var(--dark-mid);
    padding: 0.42rem 0;
    border-bottom: 1px solid var(--surface-alt);
}

.service-feature:last-child { border-bottom: none; }

.feature-check {
    width: 18px; height: 18px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.55rem;
    color: var(--white);
    flex-shrink: 0;
}

.service-card:nth-child(3n+1) .feature-check { background: var(--blue-deep); }
.service-card:nth-child(3n+2) .feature-check { background: var(--green-deep); }
.service-card:nth-child(3n)   .feature-check { background: var(--red-deep); }

/* Card footer */
.service-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 0.85rem;
    border-top: 1px solid var(--surface-alt);
    margin-top: 0.2rem;
}

.service-footer-meta {
    font-size: 0.78rem;
    color: var(--muted);
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.service-footer-meta i { color: var(--blue-mid); }

.service-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.45rem 1.05rem;
    border-radius: 50px;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    color: var(--white);
    transition: transform var(--t-base), box-shadow var(--t-base);
    flex-shrink: 0;
}

.service-card:nth-child(3n+1) .service-cta { background: linear-gradient(135deg, var(--blue-deep), var(--blue));  box-shadow: 0 4px 12px rgba(90,157,184,.3); }
.service-card:nth-child(3n+2) .service-cta { background: linear-gradient(135deg, var(--green-deep), var(--green)); box-shadow: 0 4px 12px rgba(95,163,142,.3); }
.service-card:nth-child(3n)   .service-cta { background: linear-gradient(135deg, var(--red-deep), var(--red-pastel)); box-shadow: 0 4px 12px rgba(184,92,92,.3); }

.service-cta:hover { transform: translateY(-2px) translateX(2px); }
.service-cta i { font-size: 0.75rem; }

/* ── Empty state ── */
.sv-empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 6rem 2rem;
}

.sv-empty-icon {
    width: 88px; height: 88px;
    background: var(--blue-light);
    border-radius: 24px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1.5rem;
}

.sv-empty-icon i { font-size: 2.3rem; color: var(--blue-deep); }

.sv-empty-state h3 {
    font-family: var(--font-display);
    font-size: 1.5rem; font-weight: 700;
    color: var(--dark); margin-bottom: 0.5rem;
}

.sv-empty-state p {
    color: var(--muted); font-size: 0.92rem;
    max-width: 320px; margin: 0 auto; line-height: 1.7;
}

/* ═══════════════════════════════════════════════
   PROCESS SECTION
═══════════════════════════════════════════════ */
.process-section {
    background: var(--green-deep);
    position: relative;
    overflow: hidden;
    padding: 6rem 2.5rem;
}

.process-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 50% 60% at 0% 50%,   rgba(168,216,234,.07) 0%, transparent 55%),
        radial-gradient(ellipse 50% 60% at 100% 50%,  rgba(184,224,210,.06) 0%, transparent 55%);
    pointer-events: none;
}

/* Same top accent as hero */
.process-section::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

.process-inner {
    max-width: 1360px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.process-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 2rem;
    margin-bottom: 4rem;
}

.process-head-left { flex: 1; }

.process-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.process-eyebrow .hero-line {
    background: linear-gradient(90deg, var(--blue), var(--green));
}

.process-eyebrow-badge {
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

.process-head h2 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.02em;
    line-height: 1.1;
}

.process-head h2 span {
    background: linear-gradient(135deg, var(--blue-muted), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.process-head-right {
    max-width: 260px;
    font-size: 0.92rem;
    color: var(--white);
    line-height: 1.75;
    flex-shrink: 0;
    text-align: right;
}

/* Steps */
.process-steps {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 1rem;
    position: relative;
}

/* Connecting line */
.process-steps::before {
    content: '';
    position: absolute;
    top: 35px;
    left: calc(10% + 35px);
    right: calc(10% + 35px);
    height: 1px;
    background: linear-gradient(90deg,
        transparent,
        rgba(168,216,234,.15) 15%,
        rgba(168,216,234,.15) 85%,
        transparent
    );
}

.process-step {
    text-align: center;
    padding: 0 0.5rem;
    position: relative;
    z-index: 1;
    animation: sv-fade-up .6s cubic-bezier(0,0,.2,1) backwards;
}

.process-step:nth-child(1) { animation-delay: .1s; }
.process-step:nth-child(2) { animation-delay: .18s; }
.process-step:nth-child(3) { animation-delay: .26s; }
.process-step:nth-child(4) { animation-delay: .34s; }
.process-step:nth-child(5) { animation-delay: .42s; }

.step-num {
    width: 70px; height: 70px;
    margin: 0 auto 1.4rem;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display);
    font-size: 1.6rem;
    font-weight: 800;
    color: rgba(255,255,255,.35);
    background: rgba(255,255,255,.05);
    border: 1.5px solid rgba(255,255,255,.09);
    transition: all var(--t-base);
}

.process-step:nth-child(1):hover .step-num,
.process-step:nth-child(3):hover .step-num { background: var(--blue-deep);  border-color: var(--blue-deep);  color: var(--white); box-shadow: 0 8px 24px rgba(90,157,184,.4); }
.process-step:nth-child(2):hover .step-num,
.process-step:nth-child(4):hover .step-num { background: var(--green); border-color: var(--green); color: var(--white); box-shadow: 0 8px 24px rgba(95,163,142,.4); }
.process-step:nth-child(5):hover .step-num { background: var(--red-deep);   border-color: var(--red-deep);  color: var(--white); box-shadow: 0 8px 24px rgba(184,92,92,.4); }

.step-title {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 0.45rem;
}

.step-desc {
    font-size: 0.8rem;
    color: var(--white);
    line-height: 1.7;
}

/* ═══════════════════════════════════════════════
   CTA SECTION
═══════════════════════════════════════════════ */
.sv-cta-section {
    padding: 6rem 2.5rem;
    background: var(--light);
}

.sv-cta-inner {
    max-width: 1360px;
    margin: 0 auto;
}

.sv-cta-card {
    background: var(--dark);
    border-radius: 28px;
    padding: 5rem 4rem;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3rem;
    box-shadow: var(--shadow-xl);
}

/* Top accent bar */
.sv-cta-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

/* Background glow */
.sv-cta-card::after {
    content: '';
    position: absolute;
    width: 500px; height: 500px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(168,216,234,.06), transparent 65%);
    top: 50%; left: 30%;
    transform: translate(-50%, -50%);
    pointer-events: none;
}

.cta-text { position: relative; z-index: 1; }

.cta-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.cta-eyebrow-badge {
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

.sv-cta-card h2 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 3.5vw, 3rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.02em;
    line-height: 1.12;
    margin-bottom: 1rem;
}

.sv-cta-card h2 span {
    background: linear-gradient(135deg, var(--blue-muted), var(--green-deep));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.sv-cta-card p {
    font-size: 0.97rem;
    color: rgba(255,255,255,.45);
    line-height: 1.8;
    max-width: 480px;
}

.cta-actions {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    gap: 0.85rem;
    flex-shrink: 0;
}

.cta-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 2rem;
    background: linear-gradient(135deg, var(--blue-deep), var(--green-deep));
    color: var(--white);
    text-decoration: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.92rem;
    letter-spacing: 0.02em;
    box-shadow: 0 8px 28px rgba(90,157,184,.4);
    transition: transform var(--t-base), box-shadow var(--t-base);
    white-space: nowrap;
}

.cta-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 36px rgba(90,157,184,.5);
}

.cta-btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 2rem;
    background: rgba(255,255,255,.06);
    border: 1.5px solid rgba(255,255,255,.12);
    color: rgba(255,255,255,.65);
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.92rem;
    transition: background var(--t-base), border-color var(--t-base), color var(--t-base);
    white-space: nowrap;
}

.cta-btn-ghost:hover {
    background: rgba(255,255,255,.1);
    border-color: rgba(255,255,255,.25);
    color: var(--white);
}

/* ═══════════════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════════════ */
@media (max-width: 1100px) {
    .service-card             { grid-column: span 6; }
    .service-card:first-child,
    .service-card:nth-child(5){ grid-column: span 12; }

    .process-steps { grid-template-columns: repeat(3, 1fr); }
    .process-steps::before { display: none; }
}

@media (max-width: 768px) {
    .services-hero { min-height: auto; padding: 0 1.25rem 3.5rem; }
    .services-hero-inner { flex-direction: column; align-items: flex-start; gap: 1.5rem; padding-top: 6rem; }
    .hero-right { max-width: 100%; text-align: left; }
    .hero-stats { justify-content: flex-start; }
    .hero-deco-word { display: none; }

    .services-container { padding: 2.5rem 1.25rem 4rem; }

    .services-grid { grid-template-columns: 1fr; }
    .service-card,
    .service-card:first-child,
    .service-card:nth-child(5) { grid-column: span 1; }
    .service-card:first-child .service-image-wrap,
    .service-card:nth-child(5) .service-image-wrap { aspect-ratio: 3 / 2; }

    .process-section { padding: 4rem 1.25rem; }
    .process-head { flex-direction: column; align-items: flex-start; }
    .process-head-right { max-width: 100%; text-align: left; }
    .process-steps { grid-template-columns: 1fr 1fr; row-gap: 2.5rem; }

    .sv-cta-section { padding: 4rem 1.25rem; }
    .sv-cta-card { flex-direction: column; padding: 3rem 1.75rem; }
    .cta-actions { width: 100%; }
    .cta-btn-primary, .cta-btn-ghost { justify-content: center; }
}

@media (max-width: 480px) {
    .process-steps { grid-template-columns: 1fr; }
}
</style>
@endsection


@section('content')

{{-- ══════════════════════ HERO ══════════════════════ --}}
<section class="services-hero">
    <div class="hero-deco-word" aria-hidden="true">Layanan</div>

    <div class="services-hero-inner">
        <div class="hero-left">
            <div class="hero-eyebrow-row">
                <div class="hero-line"></div>
                <span class="hero-eyebrow-badge">Solusi Dekorasi Kami</span>
            </div>
            <h1>
                Wujudkan Setiap
                <span>Momen Spesial</span>
            </h1>
        </div>

        <div class="hero-right">
            <p>Dekorasi &amp; maskot styrofoam berkualitas tinggi yang dikerjakan penuh dedikasi — dari konsep hingga pengiriman.</p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <strong>{{ $services->count() }}+</strong>
                    <span>Jenis Layanan</span>
                </div>
                <div class="hero-stat">
                    <strong>100%</strong>
                    <span>Kepuasan Klien</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════ SERVICES GRID ══════════════════════ --}}
<div class="services-container">

    <div class="section-intro">
        <div class="section-intro-eyebrow">Apa yang kami tawarkan</div>
        <h2 class="sv-section-title">
            Semua kebutuhan dekorasi, <span>satu tempat</span>
        </h2>
    </div>

    <div class="services-grid">
        @forelse($services as $index => $service)
        <div class="service-card">

            <div class="service-image-wrap">
                <img
                    src="{{ asset($service->image_path) }}"
                    alt="{{ $service->title }}"
                    class="service-image"
                    loading="eager"
                    onerror="this.src='https://via.placeholder.com/800x533/A8D8EA/FFFFFF?text={{ urlencode($service->title) }}'"
                >
                <div class="service-overlay">
                    <div class="overlay-icon">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                </div>
            </div>

            <div class="service-body">
                <span class="service-tag">
                    <i class="{{ $service->icon }}"></i>
                    Layanan {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>
                <h3 class="service-title">{{ $service->title }}</h3>
                <p class="service-desc">{{ Str::limit($service->description, 110) }}</p>

                @if($service->features)
                @php
                    $features = array_filter(
                        explode("\n", str_replace("\r", "", $service->features)),
                        fn($f) => trim($f) !== ""
                    );
                @endphp
                <ul class="service-features">
                    @foreach(array_slice($features, 0, 4) as $feature)
                    <li class="service-feature">
                        <span class="feature-check"><i class="fas fa-check"></i></span>
                        {{ trim($feature) }}
                    </li>
                    @endforeach
                </ul>
                @endif

                <div class="service-footer">
                    <span class="service-footer-meta">
                        <i class="fas fa-tag"></i> Gratis Konsultasi
                    </span>
                    <a href="{{ route('contact') }}" class="service-cta">
                        Mulai <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
        @empty
        <div class="sv-empty-state">
            <div class="sv-empty-icon"><i class="fas fa-concierge-bell"></i></div>
            <h3>Belum Ada Layanan</h3>
            <p>Layanan belum tersedia saat ini. Silakan kembali lagi nanti!</p>
        </div>
        @endforelse
    </div>

</div>

{{-- ══════════════════════ PROCESS ══════════════════════ --}}
<section class="process-section">
    <div class="process-inner">

        <div class="process-head">
            <div class="process-head-left">
                <div class="process-eyebrow">
                    <div class="hero-line"></div>
                    <span class="process-eyebrow-badge">Cara Kerja Kami</span>
                </div>
                <h2>
                    Alur kerja mudah,
                    <span>hasil sempurna</span>
                </h2>
            </div>
            <div class="process-head-right">
                Lima langkah sederhana dari percakapan pertama hingga karya tiba di tangan Anda.
            </div>
        </div>

        <div class="process-steps">
            @php
            $steps = [
                ['n' => '1', 'title' => 'Konsultasi',     'desc' => 'Diskusikan ide & kebutuhan Anda bersama tim kami secara gratis'],
                ['n' => '2', 'title' => 'Desain & Quote', 'desc' => 'Konsep desain & penawaran harga yang detail dan transparan'],
                ['n' => '3', 'title' => 'Produksi',       'desc' => 'Tim ahli kami mengerjakan setiap detail dengan ketelitian tinggi'],
                ['n' => '4', 'title' => 'Finishing',      'desc' => 'Pengecatan & sentuhan akhir untuk hasil yang sempurna'],
                ['n' => '5', 'title' => 'Delivery',       'desc' => 'Pengiriman aman & tepat waktu langsung ke lokasi Anda'],
            ];
            @endphp
            @foreach($steps as $step)
            <div class="process-step">
                <div class="step-num">{{ $step['n'] }}</div>
                <h3 class="step-title">{{ $step['title'] }}</h3>
                <p class="step-desc">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ══════════════════════ CTA ══════════════════════ --}}
<section class="sv-cta-section">
    <div class="sv-cta-inner">
        <div class="sv-cta-card">

            <div class="cta-text">
                <div class="cta-eyebrow">
                    <div class="hero-line"></div>
                    <span class="cta-eyebrow-badge">Mulai Sekarang</span>
                </div>
                <h2>
                    Siap mewujudkan
                    <span>dekorasi impian Anda?</span>
                </h2>
                <p>Hubungi kami untuk konsultasi gratis dan dapatkan penawaran terbaik yang disesuaikan dengan kebutuhan dan anggaran Anda.</p>
            </div>

            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="cta-btn-primary">
                    <i class="fas fa-phone"></i> Hubungi Kami Sekarang
                </a>
                <a href="{{ route('portfolio.index') }}" class="cta-btn-ghost">
                    <i class="fas fa-images"></i> Lihat Portofolio Kami
                </a>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Scroll-triggered reveal for process steps (reuse portfolio pattern)
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.style.animationPlayState = 'running';
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.process-step').forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });
});
</script>
@endsection