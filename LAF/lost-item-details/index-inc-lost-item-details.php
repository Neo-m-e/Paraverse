<?php
if (!isset($item)) {
  $item = [
    'id' => 0,
    'name' => 'Unknown Item',
    'category' => 'others',
    'date_last_seen' => '—',
    'time_last_seen' => '—',
    'floor' => '—',
    'lost_by' => '—',
    'course' => '—',
    'description' => 'No description provided.',
    'additional_context' => '',
    'image_url' => ''
  ];
} else {
  if (!isset($item['date_last_seen']) && isset($item['date'])) {
    $item['date_last_seen'] = $item['date'];
  }
  if (!isset($item['time_last_seen']) && isset($item['time'])) {
    $item['time_last_seen'] = $item['time'];
  }
  if (!isset($item['image_url']) && isset($item['image'])) {
    $item['image_url'] = $item['image'];
  }
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
<div class="app-container container-xxl pt-8 pb-10">

  <div class="row g-5 align-items-start mt-4 mb-8">

    <!-- LEFT PANEL -->
    <div class="col-lg-5">
      <a href="javascript:history.back()" class="btn-go-back mb-4 d-inline-flex align-items-center" onclick="KTApp.showPageLoading()">
        <i class="bi bi-arrow-left me-1"></i> Not the item I found, go back
      </a>
      
      <div class="laf-detail-panel-lost p-6 border border-danger-subtle bg-light-danger rounded-3">
        <div class="laf-detail-image-wrap mb-4 w-100 d-flex align-items-center justify-content-center bg-white">
          <?php if (!empty($item['image_url'])): ?>
            <img class="lozad rounded object-fit-contain" style="max-height:160px;" data-src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
          <?php else: ?>
            <i class="<?= $iconClass ?> text-danger" style="font-size: 5rem;"></i>
          <?php endif; ?>
        </div>
        
        <div class="laf-detail-category laf-detail-category-lost mb-4 fs-7 fw-bold text-uppercase">
          Category: <?= htmlspecialchars($item['category']) ?>
        </div>
        
        <button class="btn btn-success w-100 mb-4 fw-bold py-3 fs-6" id="btn-i-found-detail">I Found This! 🙋</button>
        
        <div class="laf-privacy-block p-4 border border-secondary-subtle bg-white rounded-3 d-flex align-items-start gap-3">
          <span class="fs-4">🛡️</span>
          <span class="fs-8 text-gray-700"><strong>Privacy Protected:</strong> The photo, exact contact info, and pickup coordinates are only revealed to the <em>verified owner</em> after passing a security check.</span>
        </div>
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="col-lg-7">
      <h2 class="fw-bold mb-4 fs-1 text-gray-900"><?= htmlspecialchars($item['name']) ?> 🔍</h2>

      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <div class="laf-info-grid row">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📅 Date Last Seen</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['date_last_seen']) ?></div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🕐 Time Last Seen</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['time_last_seen']) ?></div>
          </div>
        </div>
        <div class="mt-4 border-top pt-3">
          <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">📍 Floor / Area Last Seen</div>
          <div class="info-value fs-6 text-gray-800">📍 <?= htmlspecialchars($item['floor']) ?></div>
        </div>
      </div>

      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <div class="laf-info-grid row">
          <div class="col-md-6 mb-3 mb-md-0 border-end">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">👤 Lost By</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['lost_by']) ?></div>
          </div>
          <div class="col-md-6 ps-md-4">
            <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-1">🎓 Course</div>
            <div class="info-value fs-6 text-gray-800"><?= htmlspecialchars($item['course']) ?></div>
          </div>
        </div>
      </div>

      <div class="laf-info-block p-5 border rounded-3 bg-white mb-4">
        <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-2">Item Description</div>
        <p class="mb-4 fs-6 text-gray-800"><?= htmlspecialchars($item['description']) ?></p>
        <?php if (!empty($item['additional_context'])): ?>
          <div class="info-label text-muted fs-8 fw-semibold text-uppercase mb-2">Additional Context</div>
          <blockquote class="border-start border-danger border-3 ps-4 mb-0">
            <p class="mb-0 fst-italic fs-6 text-gray-800"><?= htmlspecialchars($item['additional_context']) ?></p>
          </blockquote>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
