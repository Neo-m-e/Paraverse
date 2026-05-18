<?php /* ============================================================
   SECTION: HERO
   FILE: sections/hero.php
   ✅ SAFE TO EDIT — only this file
   ============================================================ */ ?>

<!-- AOS Library (loaded once here, used by all sections) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="assets/css/hero.css">

<section class="laf-hero" id="laf-hero">
  <div class="laf-hero-inner">
    <div class="row align-items-center g-8">

      <!-- Left: Text -->
      <div class="col-12 col-lg-6" data-aos="fade-right" data-aos-duration="700">
        <h1>
          Lost Something?<br>
          <span class="accent">We'll Find It.</span><br>
          Together.
        </h1>
        <p class="hero-desc mt-5 mb-8">
          Join the campus-wide movement to help students and staff quickly locate, report, and recover lost belongings. Our intelligent platform connects finders with owners in record time.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="#" class="laf-btn-primary">
            Start Your Journey <i class="bi bi-arrow-right"></i>
          </a>
          <a href="#laf-getting-started" class="laf-btn-outline scroll-laf">
            See How It Works
          </a>
        </div>
      </div>

      <!-- Right: 3D Image Placeholder -->
      <div class="col-12 col-lg-6 d-flex justify-content-center mt-6 mt-lg-0"
           data-aos="fade-left" data-aos-duration="700" data-aos-delay="150">
        <!--
        ╔══════════════════════════════════════════╗
        ║  3D IMAGE PLACEHOLDER                    ║
        ║  Replace this div with your 3D asset     ║
        ╚══════════════════════════════════════════╝
        -->
        <div class="hero-3d-placeholder">
          <i class="bi bi-box-seam" style="font-size:5rem; opacity:0.22; color:var(--laf-primary);"></i>
          <span class="mt-3" style="opacity:0.40;">[ 3D Image — replace this div ]</span>
        </div>
        <!-- END 3D PLACEHOLDER -->
      </div>

    </div>
  </div>
</section>

<script src="/assets/js/hero.js"></script>
