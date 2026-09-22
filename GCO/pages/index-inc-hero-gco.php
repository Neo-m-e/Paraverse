<?php
$assetsBase = isset($GCO_BASE) ? $GCO_BASE . 'assets' : 'assets';
?>
<section class="bg-gco overflow-hidden position-relative" style="z-index: 0;">

  <!-- Background Gradient Blobs & Decorative Circles -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden" style="z-index: 0; pointer-events: none;">
    <!-- Top right blob -->
    <div class="position-absolute bg-primary rounded-circle blur-3 justify-content-center align-items-center"
      style="width: 30vw; height: 30vw; top: -5vw; right: -15vw; opacity: 0.1; filter: blur(60px); mix-blend-mode: multiply;">
    </div>
    <!-- Bottom left blob -->
    <div class="position-absolute bg-danger rounded-circle blur-3"
      style="width: 25vw; height: 25vw; bottom: 0; left: -10vw; opacity: 0.1; filter: blur(60px); mix-blend-mode: multiply;">
    </div>

    <!-- Decorative translucent circles -->
    <span class="position-absolute rounded-circle" style="width: 150px; height: 150px; top: 10%; left: -2%; background: rgba(255,255,255,0.08);"></span>
    <span class="position-absolute rounded-circle" style="width: 200px; height: 200px; bottom: 5%; right: -5%; background: rgba(255,255,255,0.08);"></span>
    <span class="position-absolute rounded-circle d-none d-lg-block" style="width: 80px; height: 80px; top: 40%; right: 10%; background: rgba(255,255,255,0.05);"></span>
  </div>

  <div class="container-xxl pt-20 pb-20 pb-lg-20 position-relative" style="z-index: 1;">
    <div class="row align-items-center gy-10">

      <!-- Text content -->
      <div class="col-lg-6 pe-lg-10">
        <span
          class="badge bg-white bg-opacity-20 text-white border border-white border-opacity-25 fs-8 ls-2 text-uppercase fw-bolder py-3 px-5 mb-6 rounded-1">
          Student Counseling &amp; Support
        </span>
        <h1 class="fw-bolder fs-3x fs-lg-4x lh-sm mb-6">
          <span class="opacity-75">Your Mental Health</span><br>
          <span>Matters</span>
        </h1>
        <p class="opacity-75 fs-4 mb-10 mw-500px">
          The Guidance and Counseling Office (GCO) supports students’ emotional, social, and psychological well-being
          through innovative programs and services. It provides a safe and confidential space where students can openly
          discuss personal, academic, or career concerns.
        </p>
        <div class="d-flex flex-wrap gap-4 mb-10">
          <a href="#services" class="btn bg-white gco-btn-primary d-inline-flex align-items-center gap-2
                    rounded-1 px-8 py-4 fw-bolder fs-6
                    text-decoration-none shadow-sm btn-hover-scale">
            <i class="ki-duotone ki-calendar-2 fs-4 text-white">
              <span class="path1"></span><span class="path2"></span>
              <span class="path3"></span><span class="path4"></span><span class="path5"></span>
            </i>
            Schedule a Session
          </a>
          <a href="#how-it-works" class="btn btn-outline-light d-inline-flex align-items-center gap-2 rounded-1 px-8 py-4
                    fw-bolder fs-6 text-decoration-none btn-hover-scale">
            Learn More
          </a>
        </div>

        <div
          class="d-inline-flex align-items-center gap-4 bg-white bg-opacity-10 border border-white border-opacity-25 rounded-1 px-6 py-3 shadow-sm mt-2"
          style="backdrop-filter: blur(8px);">
          <div class="d-flex gap-2">
            <div class="symbol symbol-40px symbol-circle">
              <span class="symbol-label bg-primary text-white fw-bold fs-7">1K+</span>
            </div>
            <div class="symbol symbol-40px symbol-circle">
              <span class="symbol-label bg-light-danger text-danger">
                <i class="ki-duotone ki-heart fs-5"><span class="path1"></span><span class="path2"></span></i>
              </span>
            </div>
          </div>
          <div>
            <div class="fw-bolder fs-6 lh-1 mb-1">Join 1000+ students</div>
            <div class="opacity-75 fw-semibold fs-8">already taking care of their mental health</div>
          </div>
        </div>
      </div>

      <!-- Hero Animation -->
      <div class="col-lg-6 position-relative d-flex justify-content-end align-items-end mt-10 mt-lg-0 overflow-visible align-self-stretch" style="min-height: 400px;">
        <style>
          .hero-lottie-asset {
            width: 900px;
            height: 900px;
            position: absolute;
            right: -210px;
            bottom: -263px; /* Hits the very end on large screens */
            pointer-events: none;
            z-index: 0;
          }

          @media (max-width: 1400px) {
            .hero-lottie-asset {
              width: 800px;
              height: 800px;
              right: -180px;
              bottom: -230px;
            }
          }

          @media (max-width: 1200px) {
            .hero-lottie-asset {
              width: 700px;
              height: 700px;
              right: -150px;
              bottom: -200px;
            }
          }

          @media (max-width: 991px) {
            .hero-lottie-asset {
              position: relative;
              width: 100%;
              max-width: 450px;
              height: auto;
              right: 0;
              bottom: 0;
              margin: 30px auto -120px auto; /* Extreme negative margin to hit the transition edge */
              display: block;
            }
            .min-h-600px { min-height: auto !important; }
          }
        </style>
        <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.3/dist/dotlottie-wc.js" type="module"></script>
        <dotlottie-wc src="https://lottie.host/84aa7bc7-fe43-496a-ad74-34609f4dbaca/cJSnR5USDS.lottie"
          class="hero-lottie-asset" 
          autoplay loop></dotlottie-wc>
      </div>

    </div>
  </div>
</section>