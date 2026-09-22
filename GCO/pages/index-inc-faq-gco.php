<?php /** @var array $gcoData */ ?>

<section class="py-20 overflow-hidden position-relative z-index-0">
  <!-- Background Gradient Blobs -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden z-index-0 pe-none">
    <!-- Top right blob -->
    <div class="position-absolute bg-primary rounded-circle"
      style="width: 40vw; height: 40vw; top: 5%; right: 5%; opacity: 0.06; filter: blur(70px);">
    </div>
    <!-- Bottom left blob -->
    <div class="position-absolute bg-danger rounded-circle"
      style="width: 35vw; height: 35vw; bottom: 10%; left: 5%; opacity: 0.06; filter: blur(70px);">
    </div>
  </div>
  <!-- Uneven background design icons -->
  <img src="<?php echo htmlspecialchars($gcoData['paths']['assets'] ?? 'assets'); ?>/img/bg-assets/flower.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; left: 5%; opacity: 0.4; pointer-events: none; width: 220px; transform: rotate(15deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($gcoData['paths']['assets'] ?? 'assets'); ?>/img/bg-assets/happy-face.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; right: 5%; opacity: 0.4; pointer-events: none; width: 240px; transform: rotate(-20deg); z-index: 0;"
    alt="">
  <div class="container-xxl position-relative z-index-1">

    <div class="text-center mb-15">
      <span class="badge badge-light-primary fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">FAQ</span>
      <h2 class="fw-bolder fs-2x mb-4 text-gray-600">Frequently Asked Questions</h2>
      <p class="text-gray-600 fs-5 mw-500px mx-auto">Find answers to common questions about our counseling services</p>
    </div>

    <div class="accordion accordion-icon-toggle mw-900px mx-auto" id="kt_accordion_faq">
      <?php foreach ($gcoData['faqs'] as $i => $faq): ?>
      <div class="accordion-item mb-5 bg-white border border-gray-200 rounded-2 shadow-none">
        <h2 class="accordion-header" id="kt_accordion_faq_header_<?= $i ?>">
          <button
            class="accordion-button fs-5 fw-bold text-gray-600 p-6 <?= $i === 0 ? '' : 'collapsed' ?>"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#kt_accordion_faq_body_<?= $i ?>"
            aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>"
            aria-controls="kt_accordion_faq_body_<?= $i ?>">
            <?= htmlspecialchars($faq['q']) ?>
          </button>
        </h2>
        <div
          id="kt_accordion_faq_body_<?= $i ?>"
          class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>"
          aria-labelledby="kt_accordion_faq_header_<?= $i ?>"
          data-bs-parent="#kt_accordion_faq">
          <div class="accordion-body text-gray-600 fs-6 px-6 pb-6 pt-0 lh-lg">
            <?= htmlspecialchars($faq['a']) ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
