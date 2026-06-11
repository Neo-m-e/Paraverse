<?php
$categoryIcons = [
  'electronics'         => 'bi bi-laptop',
  'clothing'            => 'bi bi-shirt',
  'accessories'         => 'bi bi-watch',
  'documents'           => 'bi bi-file-earmark-text',
  'keys'                => 'bi bi-key',
  'bags'                => 'bi bi-briefcase',
  'wallet'              => 'bi bi-wallet2',
  'wallets'             => 'bi bi-wallet2',
  'jewelry'             => 'bi bi-gem',
  'books'               => 'bi bi-book',
  'academic'            => 'bi bi-mortarboard',
  'personal essentials' => 'bi bi-bag-plus',
  'essentials'          => 'bi bi-bag-plus',
  'id / cards'          => 'bi bi-person-badge',
  'id-cards'            => 'bi bi-person-badge',
  'others'              => 'bi bi-tag',
  'default'             => 'bi bi-tag',
];

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
?>
<div class="app-container container-xxl pt-8 pb-10">

  <div class="d-flex align-items-center gap-3 mb-6 mt-4">
    <a href="../index.php" class="btn-go-back" onclick="KTApp.showPageLoading()"><i class="bi bi-arrow-left"></i></a>
    <h2 class="mb-0 fw-bold fs-3 text-gray-900">Recently Claimed Items ✅</h2>
    <span class="badge-count"><?= count($items) ?> items</span>
  </div>

  <div class="laf-card">
    <div class="laf-card-body pt-6 px-6 pb-6">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        <?php foreach ($items as $item):
          $cat_key   = strtolower($item['category'] ?? '');
          $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
          $cat_class = $cat_css_map[$cat_key] ?? 'cat-others';
        ?>
          <div class="col laf-h-col">
            <div class="laf-h-card laf-h-card--mini laf-card-clickable <?= $cat_class ?>"
                 onclick="window.location.href='../item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">
              <div class="h-img-wrap">
                <?php if (!empty($item['image'])): ?>
                  <img class="lozad" style="width:100%;height:100%;object-fit:cover;mix-blend-mode:multiply;filter:contrast(1.03);" data-src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                <?php else: ?>
                  <i class="<?= $iconClass ?>"></i>
                <?php endif; ?>
                <div class="h-img-fade"></div>
              </div>
              <div class="h-card-body">
                <div class="h-badges">
                  <span class="badge-laf-claimed">Claimed</span>
                </div>
                <div class="h-item-name"><?= htmlspecialchars($item['name']) ?></div>
                <div class="h-item-meta">📂 <?= htmlspecialchars($item['category']) ?></div>
                <div class="h-item-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
                <div class="h-item-meta">👤 <?= htmlspecialchars($item['claimed_by']) ?></div>
                <div class="h-item-meta">📅 <?= htmlspecialchars($item['date_claimed']) ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
