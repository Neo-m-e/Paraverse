<footer>
  <div class="app-container container-xxl">
    <div class="row align-items-start justify-content-between pt-10">
      <div class="col-lg-5 my-5">
        <a href="<?= $LAF_BASE_URL ?>/" class="d-flex align-items-center mb-5" onclick="KTApp.showPageLoading()">
          <img src="<?= $LAF_BASE_URL ?>/assets/images/LAF-logo.svg" class="h-35px me-2" alt="Lost and Found">
        </a>
        <p class="text-gray-700 fs-2">Just Tap to Track; You may find it in the App!</p>
        <p class="text-gray-600 fs-4 mb-0">
          Lost &amp; Found is a lookup platform that helps students, teachers, and staff recover lost items within school premises. Easily track and claim belongings to stay organized and save time.
        </p>
      </div>
      <div class="col-lg-4 my-5">
        <div class="d-flex mb-5">
          <a href="https://feualabang.edu.ph/" target="_blank" class="me-1"><img class="h-50px lozad" data-src="/assets/img/logo/feu-alabang.webp" alt="FEU Alabang"></a>
          <a href="https://feudiliman.edu.ph/" target="_blank" class="me-1"><img class="h-50px lozad" data-src="/assets/img/logo/feu-diliman.webp" alt="FEU Diliman"></a>
          <a href="https://feutech.edu.ph/" target="_blank"><img class="h-50px lozad" data-src="/assets/img/logo/feu-tech.webp" alt="FEU Tech"></a>
        </div>
        <div class="d-flex">
          <a href="/" onclick="KTApp.showPageLoading()"><img data-src="/assets/img/logo.png" class="h-35px lozad me-4" alt="EITH"></a>
          <p class="fs-lg mb-0">
            <span class="d-block text-gray-600">Proudly made with <span class="text-danger">❤️</span> by the</span>
            <a href="/" class="fw-bold text-dark text-active-primary">Educational Innovation and Technology Hub</a>
          </p>
        </div>
        <a href="https://www.facebook.com/edith.feutech" target="_blank" class="btn btn-sm btn-facebook mt-5"><i class="fab fa-facebook-f fs-4"></i> Like us on Facebook</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="text-gray-600 mt-8 pt-8 border-top">© <?= date('Y') ?> <strong>Educational Innovation and Technology Hub</strong>. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>

<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.v2.01.js"></script>
