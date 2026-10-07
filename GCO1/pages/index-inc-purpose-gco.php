<?php /** @var array $gcoData */ ?>

<section class="py-20 overflow-hidden position-relative z-index-0">
  <!-- Background Gradient Blobs -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden z-index-0 pe-none">
    <div class="position-absolute bg-warning rounded-circle blur-3"
      style="width: 50vw; height: 50vw; top: -10vw; left: -25vw; opacity: 0.15; filter: blur(80px); mix-blend-mode: multiply;">
    </div>
    <div class="position-absolute bg-danger rounded-circle blur-3"
      style="width: 40vw; height: 40vw; bottom: -5vw; right: -15vw; opacity: 0.15; filter: blur(80px); mix-blend-mode: multiply;">
    </div>
  </div>
  <!-- Uneven background design icons -->
  <img src="<?php echo htmlspecialchars($gcoData['paths']['assets'] ?? 'assets'); ?>/img/bg-assets/human-brain.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; left: 2%; opacity: 0.4; pointer-events: none; width: 280px; transform: rotate(-15deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($gcoData['paths']['assets'] ?? 'assets'); ?>/img/bg-assets/flowers.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; right: 5%; opacity: 0.4; pointer-events: none; width: 240px; transform: rotate(10deg); z-index: 0;"
    alt="">
  <div class="container-xxl pt-10 pb-0 position-relative z-index-1">

    <div class="text-center mb-15">
      <span class="badge badge-light-primary fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">Purpose of
        Appointment</span>
      <h2 class="fw-bolder fs-2x mb-4 text-gray-600">Find the Help You Need!</h2>
      <p class="text-gray-600 fs-5 mw-600px mx-auto">
        Select your purpose and get the <span class="text-primary fw-semibold">support you deserve</span>&mdash;quick,
        easy, and just for you!
      </p>
    </div>

    <!--
      CSS-only tab switcher — no Bootstrap JS needed.
      Hidden radio inputs drive visibility via :checked ~ sibling selectors
      defined in gco-design.css (.purpose-tab-*).
    -->
    <div class="mx-auto">

      <!-- 1. Radio controls (must come first as siblings of nav + panes) -->
      <?php foreach ($gcoData['categories'] as $i => $cat): ?>
      <input type="radio" id="purpose-tab-<?= $i?>" name="purpose-tab" class="visually-hidden" <?= $i === 0 ? 'checked'
    : '' ?>>
      <?php
endforeach; ?>

      <!-- 2. Tab navigation labels — short 'tab' titles keep all three on one row -->
      <div class="purpose-tab-nav d-flex flex-nowrap gap-3 justify-content-center mb-8">
        <?php foreach ($gcoData['categories'] as $i => $cat): ?>
        <label for="purpose-tab-<?= $i?>"
          class="purpose-tab-label btn btn-outline-primary fw-semibold rounded-pill px-5 py-3 cursor-pointer text-nowrap">
          <i class="ki-duotone <?= $cat['icon']?> fs-5 me-2">
            <?php for ($p = 1; $p <= $cat['paths']; $p++): ?><span class="path<?= $p?>"></span>
            <?php
  endfor; ?>
          </i>
          <?= htmlspecialchars($cat['tab'] ?? $cat['title'])?>
          <span class="badge badge-light-primary ms-2 fs-9">
            <?= $cat['count']?>
          </span>
        </label>
        <?php
endforeach; ?>
      </div>

      <!-- 3. Content panes — wrapped so min-height prevents section resize on tab switch -->
      <div class="purpose-panes-wrapper">
        <?php foreach ($gcoData['categories'] as $i => $cat): ?>
        <div class="purpose-tab-pane" data-pane="<?= $i?>">
          <div class="card card-bordered overflow-hidden">

            <!-- Card header -->
            <div
              class="card-header bg-<?= $cat['color']?> py-6 border-0 d-flex align-items-center justify-content-center gap-4">
              <div class="symbol symbol-45px">
                <span class="symbol-label bg-white bg-opacity-20">
                  <i class="ki-duotone <?= $cat['icon']?> fs-2x text-white">
                    <?php for ($p = 1; $p <= $cat['paths']; $p++): ?><span class="path<?= $p?>"></span>
                    <?php
  endfor; ?>
                  </i>
                </span>
              </div>
              <div>
                <h3 class="text-white fw-bolder fs-3 mb-1">
                  <?= htmlspecialchars($cat['title'])?>
                </h3>
                <span class="badge badge-light text-gray-700 fs-9">
                  <?= $cat['count']?> options
                </span>
              </div>
            </div>

            <!-- Card body -->
            <div class="card-body bg-light-<?= $cat['color']?> p-8">
              <?php if (count($cat['items']) > 5):
    $chunks = array_chunk($cat['items'], (int)ceil(count($cat['items']) / 2));
?>
              <div class="row g-4">
                <?php foreach ($chunks as $col): ?>
                <div class="col-md-6">
                  <?php foreach ($col as $item):
        $num = array_search($item, $cat['items']) + 1;
?>
                  <div class="card card-bordered mb-3">
                    <div class="card-body py-4 px-5 d-flex align-items-start gap-3">
                      <div class="symbol symbol-35px flex-shrink-0">
                        <span class="symbol-label bg-<?= $cat['color']?> text-white fw-bold fs-8">
                          <?= $num?>
                        </span>
                      </div>
                      <div>
                        <div class="fw-semibold fs-7 mb-1">
                          <?= htmlspecialchars($item['title'])?>
                        </div>
                        <div class="text-gray-500 fs-8">
                          <?= htmlspecialchars($item['desc'])?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
      endforeach; ?>
                </div>
                <?php
    endforeach; ?>
              </div>
              <?php
  else: ?>
              <?php foreach ($cat['items'] as $idx => $item): ?>
              <div class="card card-bordered mb-3">
                <div class="card-body py-4 px-5 d-flex align-items-start gap-4">
                  <div class="symbol symbol-40px flex-shrink-0">
                    <span class="symbol-label bg-<?= $cat['color']?> text-white fw-bolder fs-6">
                      <?= $idx + 1?>
                    </span>
                  </div>
                  <div>
                    <div class="fw-semibold fs-5 mb-1">
                      <?= htmlspecialchars($item['title'])?>
                    </div>
                    <div class="text-gray-500 fs-7">
                      <?= htmlspecialchars($item['desc'])?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
    endforeach; ?>
              <?php
  endif; ?>
            </div>

          </div>
        </div>
        <?php
endforeach; ?>
      </div><!-- /purpose-panes-wrapper -->

    </div><!-- /mw-900px -->

  </div>
</section>
