<?php
$cat_css_map = [
  'accessories'         => 'cat-accessories',
  'bags'                => 'cat-bags',
  'academic'            => 'cat-academic',
  'personal essentials' => 'cat-essentials',
  'essentials'          => 'cat-essentials',
  'electronics'         => 'cat-electronics',
  'clothing'            => 'cat-clothing',
  'wallet'              => 'cat-wallets',
  'wallets'             => 'cat-wallets',
  'documents'           => 'cat-documents',
  'others'              => 'cat-others',
];
$cat_class = $cat_css_map[strtolower($item['category'] ?? '')] ?? 'cat-others';
?>
<div class="app-container container-xxl pt-8 pb-10" data-item-id="<?= (int)$item['id'] ?>">
  <div class="row g-5 align-items-start mt-4 mb-8">

    <!-- LEFT PANEL -->
    <div class="col-lg-5">
      <a href="javascript:history.back()" class="btn-go-back mb-4 d-inline-flex align-items-center" onclick="KTApp.showPageLoading()">
        <i class="bi bi-arrow-left me-1"></i> Not my item, go back
      </a>

      <!-- Card-style image panel matching the grid cards -->
      <div class="laf-detail-card <?= $cat_class ?> rounded-3 overflow-hidden border border-gray-200 shadow-sm mb-4">
        <div class="laf-detail-img-area">
          <?php if (!empty($item['image_url'])): ?>
            <img class="lozad" style="width:100%;height:100%;object-fit:cover;mix-blend-mode:multiply;filter:contrast(1.03);" data-src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
          <?php else: ?>
            <i class="<?= $iconClass ?>"></i>
          <?php endif; ?>
          <div class="laf-detail-img-fade"></div>
        </div>
        <div class="p-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge-laf-cat <?= htmlspecialchars($item['category_class'] ?? '') ?>"><?= htmlspecialchars($item['category']) ?></span>
            <span class="badge-laf-unclaimed">Unclaimed</span>
          </div>
          <button class="btn btn-primary w-100 mb-3 fw-bold py-3 fs-6" id="btn-this-is-mine">This is Mine — 🏢 How to Claim</button>
          <div class="laf-privacy-block p-3 border border-secondary-subtle bg-light rounded-3 d-flex align-items-start gap-2">
            <span class="fs-5">🛡️</span>
            <span class="fs-8 text-gray-700"><strong>Privacy Protected:</strong> Exact contact info and pickup coordinates are only revealed to the <em>verified owner</em> after a security check.</span>
          </div>
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
              <span class="laf-field-value fs-6 text-gray-800" id="val-date">●●●●●●●●</span>
              <button class="btn-eye" data-target="val-date" data-field="date" data-real="<?= htmlspecialchars($item['date_found']) ?>" title="Toggle visibility"><i class="bi bi-eye-slash"></i></button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🕐 Time Found</div>
            <div class="info-value d-flex align-items-center gap-2">
              <span class="laf-field-value fs-6 text-gray-800" id="val-time">●●:●●</span>
              <button class="btn-eye" data-target="val-time" data-field="time" data-real="<?= htmlspecialchars($item['time_found']) ?>" title="Toggle visibility"><i class="bi bi-eye-slash"></i></button>
            </div>
          </div>
        </div>
        <div class="mt-4 border-top pt-3">
          <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📍 Floor / Area</div>
          <div class="info-value d-flex align-items-center gap-2">
            <span class="laf-field-value fs-6 text-gray-800" id="val-floor">●●● ●●●●●, ●●●●●●●</span>
            <button class="btn-eye" data-target="val-floor" data-field="floor" data-real="<?= htmlspecialchars($item['floor']) ?>" title="Toggle visibility"><i class="bi bi-eye-slash"></i></button>
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
        <div class="row mb-3">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Surrendered By</div>
            <div class="info-value d-flex align-items-center gap-2">
              <span class="laf-field-value fs-6 text-gray-800" id="val-surrendered">●●●●● ●. ●●●●●●</span>
              <button class="btn-eye" data-target="val-surrendered" data-field="surrendered_by" data-real="<?= htmlspecialchars($item['surrendered_by']) ?>" title="Toggle visibility"><i class="bi bi-eye-slash"></i></button>
            </div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Claimed By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['claimed_by']) ?></div>
          </div>
        </div>
        <div class="row border-top pt-3">
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

      <div class="laf-privacy-notice-box d-flex align-items-center p-4 border border-primary-subtle bg-light-primary rounded-3 text-primary">
        <i class="bi bi-eye-slash fs-4 me-3"></i>
        <span class="fs-7 fw-semibold">Some details are hidden to protect privacy. Click the <strong>👁️</strong> eye icons to reveal them.</span>
      </div>
    </div>

  </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
