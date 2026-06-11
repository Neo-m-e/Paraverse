<?php
$date_claimed = $item['date_claimed'] ?? '—';
?>
<div class="app-container container-xxl pt-8 pb-10" data-item-id="<?= (int)$item['id'] ?>">

  <div class="row g-5 align-items-start mt-4 mb-8">

    <!-- LEFT PANEL -->
    <div class="col-lg-5">
      <a href="javascript:history.back()" class="btn-go-back mb-4 d-inline-flex align-items-center" onclick="KTApp.showPageLoading()">
        <i class="bi bi-arrow-left me-1"></i> Go back
      </a>
      
      <div class="laf-detail-panel p-6 border border-success-subtle bg-light-success rounded-3">
        <div class="laf-detail-image-wrap mb-4 w-100 d-flex align-items-center justify-content-center bg-white">
          <?php if (!empty($item['image_url'])): ?>
            <img class="lozad rounded object-fit-contain" style="max-height:160px;" data-src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
          <?php else: ?>
            <i class="<?= $iconClass ?> text-success" style="font-size: 5rem;"></i>
          <?php endif; ?>
        </div>
        <div class="laf-detail-category mb-4 fs-7 fw-bold text-uppercase text-success">Category: <?= htmlspecialchars($item['category']) ?></div>

        <div class="alert bg-white border border-success-subtle d-flex flex-column align-items-center text-center p-5 rounded-3 mb-0 shadow-sm">
          <div class="fs-1 mb-2">✅</div>
          <h5 class="fw-bold text-success mb-1">Claimed &amp; Resolved</h5>
          <p class="fs-8 text-gray-600 mb-0">This item was returned to its verified owner on <strong><?= htmlspecialchars($date_claimed) ?></strong>.</p>
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
        <div class="laf-info-grid row">
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

      <!-- Claim & Handover Info -->
      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <h5 class="fw-bold text-gray-800 mb-4 fs-6">🤝 Claim &amp; Handover Log</h5>
        <div class="laf-info-grid row mb-3">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Surrendered By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['surrendered_by']) ?></div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Claimed By (Owner)</div>
            <div class="info-value fs-6 text-gray-800 fw-bold text-success"><?= htmlspecialchars($item['claimed_by']) ?></div>
          </div>
        </div>
        <div class="laf-info-grid row border-top pt-3">
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
