<?php
if (!isset($item)) {
  $item = [
    'id' => 0,
    'name' => 'Unknown Item',
    'category' => 'others',
    'date_found' => '—',
    'time_found' => '—',
    'floor' => '—',
    'currently_at' => '—',
    'surrendered_by' => '—',
    'claimed_by' => '—',
    'released_by' => '—',
    'received_by' => '—',
    'status' => 'Unclaimed',
    'image_url' => ''
  ];
}

$categoryIcons = [
  'electronics'         => 'bi bi-laptop',
  'clothing'            => 'bi bi-shirt',
  'accessories'         => 'bi bi-watch',
  'documents'           => 'bi bi-file-earmark-text',
  'keys'                => 'bi bi-key',
  'bags'         => 'bi bi-briefcase',
  'wallet'       => 'bi bi-wallet2',
  'wallets'      => 'bi bi-wallet2',
  'jewelry'      => 'bi bi-gem',
  'books'        => 'bi bi-book',
  'academic'            => 'bi bi-mortarboard',
  'personal essentials' => 'bi bi-bag-plus',
  'essentials'          => 'bi bi-bag-plus',
  'id / cards'          => 'bi bi-person-badge',
  'id-cards'            => 'bi bi-person-badge',
  'others'              => 'bi bi-tag',
  'default'      => 'bi bi-tag',
];
$cat_key = strtolower($item['category'] ?? '');
$iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
?>
<div class="app-container container-xxl pt-8 pb-10" data-item-id="<?= (int)$item['id'] ?>">

  <div class="row g-5 align-items-start mt-4 mb-8">

    <!-- LEFT PANEL -->
    <div class="col-lg-5">
      <a href="javascript:history.back()" class="btn-go-back mb-4 d-inline-flex align-items-center" onclick="KTApp.showPageLoading()">
        <i class="bi bi-arrow-left me-1"></i> Not my item, go back
      </a>
      
      <div class="laf-detail-panel p-6">
        <div class="laf-detail-image-wrap mb-4 w-100 d-flex align-items-center justify-content-center">
          <?php if (!empty($item['image_url'])): ?>
            <img class="lozad rounded object-fit-contain" style="max-height:160px;" data-src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
          <?php else: ?>
            <i class="<?= $iconClass ?> text-primary" style="font-size: 5rem;"></i>
          <?php endif; ?>
        </div>
        <div class="laf-detail-category mb-4 fs-7 fw-bold text-uppercase">Category: <?= htmlspecialchars($item['category']) ?></div>

        <?php if ($is_unclaimed): ?>
          <button class="btn btn-primary w-100 mb-4 fw-bold py-3 fs-6" id="btn-this-is-mine">This is Mine — 🏢 How to Claim</button>
        <?php else: ?>
          <button class="btn btn-secondary w-100 mb-4 fw-bold py-3 fs-6" disabled style="opacity:.5;cursor:not-allowed;">
            <i class="bi bi-check-circle-fill me-1"></i> Item Already Claimed
          </button>
        <?php endif; ?>

        <div class="laf-privacy-block p-4 border border-secondary-subtle bg-white rounded-3 d-flex align-items-start gap-3">
          <span class="fs-4">🛡️</span>
          <span class="fs-8 text-gray-700"><strong>Privacy Protected:</strong> The photo, exact contact info, and pickup coordinates are only revealed to the <em>verified owner</em> after passing a security check.</span>
        </div>
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="col-lg-7">
      <h2 class="fw-bold mb-4 fs-1 text-gray-900"><?= htmlspecialchars($item['name']) ?> 🔍</h2>

      <!-- Date / Time / Floor -->
      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <div class="laf-info-grid row">
          <div class="col-md-6 mb-3 mb-md-0">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📅 Date Found</div>
            <div class="info-value d-flex align-items-center gap-2">
              <span class="laf-field-value fs-6 text-gray-800" id="val-date"><?= $is_unclaimed ? '●●●●●●●●' : htmlspecialchars($item['date_found']) ?></span>
              <?php if ($is_unclaimed): ?>
                <button class="btn-eye" data-target="val-date" data-field="date" data-real="<?= htmlspecialchars($item['date_found']) ?>" title="Toggle visibility">
                  <i class="bi bi-eye-slash"></i>
                </button>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🕐 Time Found</div>
            <div class="info-value d-flex align-items-center gap-2">
              <span class="laf-field-value fs-6 text-gray-800" id="val-time"><?= $is_unclaimed ? '●●:●●' : htmlspecialchars($item['time_found']) ?></span>
              <?php if ($is_unclaimed): ?>
                <button class="btn-eye" data-target="val-time" data-field="time" data-real="<?= htmlspecialchars($item['time_found']) ?>" title="Toggle visibility">
                  <i class="bi bi-eye-slash"></i>
                </button>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="mt-4 border-top pt-3">
          <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📍 Floor / Area</div>
          <div class="info-value d-flex align-items-center gap-2">
            <span class="laf-field-value fs-6 text-gray-800" id="val-floor"><?= $is_unclaimed ? '●●● ●●●●●, ●●●●●●●' : htmlspecialchars($item['floor']) ?></span>
            <?php if ($is_unclaimed): ?>
              <button class="btn-eye" data-target="val-floor" data-field="floor" data-real="<?= htmlspecialchars($item['floor']) ?>" title="Toggle visibility">
                <i class="bi bi-eye-slash"></i>
              </button>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Currently At -->
      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🏢 Item Is Currently At</div>
        <div class="info-value fs-6 text-gray-800">🏢 <?= htmlspecialchars($item['currently_at']) ?></div>
      </div>

      <!-- People -->
      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <div class="laf-info-grid row mb-3">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Surrendered By</div>
            <div class="info-value d-flex align-items-center gap-2">
              <span class="laf-field-value fs-6 text-gray-800" id="val-surrendered"><?= $is_unclaimed ? '●●●●● ●. ●●●●●●' : htmlspecialchars($item['surrendered_by']) ?></span>
              <?php if ($is_unclaimed): ?>
                <button class="btn-eye" data-target="val-surrendered" data-field="surrendered_by" data-real="<?= htmlspecialchars($item['surrendered_by']) ?>" title="Toggle visibility">
                  <i class="bi bi-eye-slash"></i>
                </button>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Claimed By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['claimed_by']) ?></div>
          </div>
        </div>
        <div class="laf-info-grid row border-top pt-3">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Released By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['released_by']) ?></div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Received By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['received_by']) ?></div>
          </div>
        </div>
      </div>

      <?php if ($is_unclaimed): ?>
        <div class="laf-privacy-notice-box d-flex align-items-center p-4 border border-primary-subtle bg-light-primary rounded-3 text-primary">
          <i class="bi bi-eye-slash fs-4 me-3"></i>
          <span class="fs-7 fw-semibold">Some details are hidden to protect privacy. Click the <strong>👁️</strong> eye icons to reveal them.</span>
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
