<?php
$date_claimed = $item['date_claimed'] ?? '—';
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
        <i class="bi bi-arrow-left me-1"></i> Go back
      </a>

      <!-- Card-style image panel — same structure, green tint overlay for claimed -->
      <div class="laf-detail-card <?= $cat_class ?> rounded-3 overflow-hidden border border-success-subtle shadow-sm mb-4">
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
            <span class="badge-laf-claimed">Claimed</span>
          </div>
          <div class="d-flex flex-column align-items-center text-center p-4 bg-light rounded-3 border border-success-subtle">
            <div class="fs-2 mb-1">✅</div>
            <div class="fw-bold text-success fs-6 mb-1">Claimed &amp; Resolved</div>
            <div class="fs-8 text-gray-600">Returned to its verified owner on <strong><?= htmlspecialchars($date_claimed) ?></strong>.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="col-lg-7">
      <div class="d-flex align-items-center gap-3 mb-4">
        <h2 class="fw-bold mb-0 fs-1 text-gray-900"><?= htmlspecialchars($item['name']) ?></h2>
        <span class="badge badge-light-success fs-7 fw-bold px-3 py-2">CLAIMED</span>
      </div>

      <!-- Found Details -->
      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <h5 class="fw-bold text-gray-800 mb-4 fs-6">📅 Original Found Details</h5>
        <div class="row">
          <div class="col-md-6 mb-3 mb-md-0">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📅 Date Found</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['date_found']) ?></div>
          </div>
          <div class="col-md-6">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🕐 Time Found</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['time_found']) ?></div>
          </div>
        </div>
        <div class="mt-4 border-top pt-3">
          <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📍 Found At Floor / Area</div>
          <div class="info-value fs-6 text-gray-800">📍 <?= htmlspecialchars($item['floor']) ?></div>
        </div>
      </div>

      <!-- Claim & Handover Log -->
      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <h5 class="fw-bold text-gray-800 mb-4 fs-6">🤝 Claim &amp; Handover Log</h5>
        <div class="row mb-3">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Surrendered By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['surrendered_by']) ?></div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Claimed By (Owner)</div>
            <div class="info-value fs-6 fw-bold text-success"><?= htmlspecialchars($item['claimed_by']) ?></div>
          </div>
        </div>
        <div class="row border-top pt-3">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Released By (Staff)</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['released_by']) ?></div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Received By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['received_by']) ?></div>
          </div>
        </div>
      </div>

      <!-- Handover Location -->
      <div class="laf-info-block p-5 border rounded-3 bg-white">
        <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🏢 Handover Location</div>
        <div class="info-value fs-6 text-gray-800">🏢 <?= htmlspecialchars($item['currently_at']) ?></div>
      </div>
    </div>

  </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
