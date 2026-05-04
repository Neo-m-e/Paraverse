<?php /* includes/cta-banner.php */ ?>
<style>
    :root {
        --arc-cta-grad: linear-gradient(135deg, #f59e0b 0%, #FB923C 50%, #E05A00 100%);
        --arc-white-alpha: rgba(255, 255, 255, 0.85);
        --arc-branding-orange: #E8521A;
    }

    .cta-section {
        background: var(--arc-cta-grad);
        position: relative;
        overflow: hidden;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
    }

    /* ── FLOATING SHAPES (NO MOUSE TRACKING) ── */
    .cta-overlay-shapes {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 1;
    }

    .cta-overlay-shapes svg {
        position: absolute;
        opacity: 0.12;
        fill: none;
        stroke: #ffffff;
    }

    /* Diverse Animations para hindi sabay-sabay gumalaw */
    @keyframes floatSlow {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(-20px, 15px) rotate(5deg); }
    }
    @keyframes floatFast {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(25px, -20px) rotate(-10deg); }
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.12; }
        50% { transform: scale(1.1); opacity: 0.2; }
    }

    /* Positioning and Animation Assignments */
    .v1 { top: -5%; left: -2%; width: 320px; animation: floatSlow 12s infinite ease-in-out; }
    .v2 { bottom: -10%; right: -2%; width: 380px; animation: floatSlow 15s infinite ease-in-out reverse; }
    .v3 { top: 15%; left: 10%; width: 100px; animation: floatFast 8s infinite ease-in-out; }
    .v4 { bottom: 15%; left: 18%; width: 70px; fill: #fff !important; opacity: 0.08 !important; animation: pulse 6s infinite; }
    .v5 { top: 20%; right: 15%; width: 55px; animation: floatFast 7s infinite ease-in-out 1s; }
    .v6 { bottom: 25%; right: 28%; width: 90px; stroke-width: 2; animation: floatSlow 10s infinite; }
    .v7 { top: 45%; left: 8%; width: 35px; fill: #fff !important; animation: pulse 5s infinite 2s; }
    .v8 { top: 12%; right: 42%; width: 25px; opacity: 0.2 !important; animation: floatFast 9s infinite; }
    .v9 { bottom: 8%; left: 40%; width: 65px; animation: floatSlow 11s infinite 0.5s; }
    /* Extra shapes na hiningi mo beh */
    .v10 { top: 60%; right: 10%; width: 110px; animation: floatSlow 14s infinite; }
    .v11 { bottom: 30%; left: 5%; width: 45px; stroke-width: 3; animation: floatFast 6s infinite; }
    .v12 { top: 5%; left: 45%; width: 40px; fill: #fff !important; opacity: 0.05 !important; }

    /* Typography & Layout */
    .cta-title {
        font-size: clamp(2.25rem, 5vw, 3.5rem);
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .cta-desc {
        color: var(--arc-white-alpha);
        font-size: 1.1rem;
        max-width: 580px;
        margin: 0 auto;
    }

    /* Buttons */
    .btn-arc-white {
        background-color: #ffffff;
        color: var(--arc-branding-orange) !important;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    .btn-arc-white:hover {
        background-color: #f8f9fa;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px -5px rgba(0,0,0,0.15);
    }
    .btn-arc-outline {
        background: transparent;
        color: #ffffff !important;
        border: 2px solid #ffffff;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    .btn-arc-outline:hover {
        background: #ffffff;
        color: var(--arc-branding-orange) !important;
        transform: translateY(-3px);
    }
</style>

<section class="cta-section py-20">
    <div class="cta-overlay-shapes">
        <!-- 12 Shapes na beh, puno na 'yan! -->
        <svg class="v1" viewBox="0 0 100 100"><circle cx="50" cy="50" r="48" stroke-width="1.5"/></svg>
        <svg class="v2" viewBox="0 0 100 100"><circle cx="50" cy="50" r="48" stroke-width="1.5"/></svg>
        <svg class="v3" viewBox="0 0 100 100"><rect x="10" y="10" width="80" height="80" rx="15" stroke-width="3"/></svg>
        <svg class="v4" viewBox="0 0 100 100"><path d="M50 15 L85 80 L15 80 Z"/></svg>
        <svg class="v5" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" stroke-width="4"/></svg>
        <svg class="v6" viewBox="0 0 100 100"><rect x="20" y="20" width="60" height="60" rx="8" stroke-width="3" transform="rotate(45 50 50)"/></svg>
        <svg class="v7" viewBox="0 0 100 100"><circle cx="50" cy="50" r="30" stroke-width="6"/></svg>
        <svg class="v8" viewBox="0 0 100 100"><rect x="30" y="30" width="40" height="40" rx="4" stroke-width="8"/></svg>
        <svg class="v9" viewBox="0 0 100 100"><path d="M50 20 L80 75 L20 75 Z" stroke-width="2.5"/></svg>
        <svg class="v10" viewBox="0 0 100 100"><circle cx="50" cy="50" r="45" stroke-dasharray="5,5" stroke-width="2"/></svg>
        <svg class="v11" viewBox="0 0 100 100"><rect x="10" y="10" width="80" height="80" rx="10" stroke-width="3"/></svg>
        <svg class="v12" viewBox="0 0 100 100"><path d="M50 10 L90 90 L10 90 Z"/></svg>
    </div>

    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="text-white opacity-75 text-uppercase fw-bold ls-2 fs-8 mb-4 d-block">Ready To Level Up?</span>
            <h2 class="cta-title text-white fw-bolder mb-6">
                Claim. Level Up.<br class="d-none d-md-block">
                Redeem. Dominate.
            </h2>
            <p class="cta-desc mb-10 fw-medium">
                Join hundreds of FEU Tech students already transforming their academic journey into an adventure.
            </p>
            <div class="d-flex justify-content-center gap-4 flex-wrap">
                <a href="register.php" class="btn btn-arc-white px-10 py-4">Join Arcadia Now 🎮</a>
                <a href="badges.php" class="btn btn-arc-outline px-10 py-4">Explore Badges <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

