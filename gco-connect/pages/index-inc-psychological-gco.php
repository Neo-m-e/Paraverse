<section class="bg-gco py-20">
  <div class="container-xxl">

    <div class="text-center mb-15">
      <span
        class="badge bg-white bg-opacity-20 text-white border border-white border-opacity-25 fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">PSYCHOLOGICAL
        TESTS</span>
      <h2 class="text-white fw-bolder fs-2x mb-4"><span class="text-white opacity-75">Available</span> Assessment Tools
      </h2>
      <p class="text-white opacity-75 fs-5 mw-500px mx-auto">Comprehensive testing services to support your <u>personal
          growth</u></p>

    </div>

    <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
      <?php foreach ($tests as $t): ?>
      <div class="col">
        <div class="card bg-white bg-opacity-10 border border-white border-opacity-25 h-100 hover-elevate-up">
          <div class="card-body p-6">
            <div class="d-flex align-items-start gap-4">
              <div class="symbol symbol-40px flex-shrink-0">
                <span class="symbol-label bg-white bg-opacity-10">
                  <i class="ki-duotone <?= $t['icon']?> fs-2 text-white">
                    <?php for ($p = 1; $p <= $t['paths']; $p++): ?><span class="path<?= $p?>"></span>
                    <?php
  endfor; ?>
                  </i>
                </span>
              </div>
              <div>
                <h4 class="text-white fw-semibold fs-6 mb-2 lh-sm">
                  <?= htmlspecialchars($t['name'])?>
                </h4>
                <p class="text-white opacity-75 mb-0" style="font-size: 13px !important;">
                  <?= htmlspecialchars($t['desc'])?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
endforeach; ?>
    </div>

  </div>
</section>
