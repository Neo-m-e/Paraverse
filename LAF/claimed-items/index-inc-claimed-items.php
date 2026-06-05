<?php
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
    <div class="laf-card-body pt-6">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($items as $item):
          $cat_key = strtolower($item['category'] ?? '');
          $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
          $cat_class = $cat_css_map[$cat_key] ?? 'cat-others';
        ?>
        <div class="col">
          <div class="laf-claimed-card laf-card-clickable <?= $cat_class ?>"
               onclick="window.location.href='../item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">
            <div class="claimed-icon-wrap">
              <i class="<?= $iconClass ?>" style="font-size: 1.4rem;"></i>
            </div>
            <div class="flex-grow-1">
              <div class="d-flex align-items-center gap-2 mb-1">
                <span class="claimed-name fs-6 fw-bold text-gray-800"><?= htmlspecialchars($item['name']) ?></span>
                <span class="badge-laf-claimed">Claimed</span>
              </div>
              <div class="claimed-meta text-muted fs-7">📂 <?= htmlspecialchars($item['category']) ?></div>
              <div class="claimed-meta text-muted fs-7">📍 <?= htmlspecialchars($item['floor']) ?></div>
              <div class="claimed-meta text-muted fs-7">👤 Claimed By: <?= htmlspecialchars($item['claimed_by']) ?></div>
              <div class="claimed-meta text-muted fs-7">📅 <?= htmlspecialchars($item['date_claimed']) ?></div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
