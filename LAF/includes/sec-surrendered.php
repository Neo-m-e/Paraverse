<?php
$all_unclaimed = array_filter(LAF_GET_SURRENDERED_ITEMS(), function($item) {
  return strtolower($item['status'] ?? '') === 'unclaimed';
});
$surrendered_items = array_slice($all_unclaimed, 0, 4, true);

$categories = ['All Categories', 'Academic', 'Electronics', 'Bags', 'Accessories','Clothing','Wallets','Documents','Personal Essentials', 'Others'];

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
?>

<!-- Recently Surrendered Items -->
<div class="laf-card shadow-sm border border-gray-200">
  <div class="laf-card-header bg-white border-0 d-flex justify-content-between align-items-start py-5 px-6">
    <div>
      <h3 class="laf-section-title fs-3 fw-bold text-gray-900 mb-1">Recently Surrendered Items</h3>
      <p class="laf-section-sub fs-7 text-muted">Below are recently surrendered items that have not yet been claimed</p>
    </div>
    <a href="/LAF/unclaimed-items/index.php" class="laf-view-all fs-7 fw-semibold text-primary text-hover-primary" onclick="KTApp.showPageLoading()">View All</a>
  </div>

  <!-- Search Bar inside card -->
  <div class="laf-search-wrap border border-gray-300 rounded p-2 mb-4 mx-6">
    <select id="search-category" class="fs-7 fw-bold text-gray-700">
      <?php foreach ($categories as $cat): ?>
        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
      <?php endforeach; ?>
    </select>
    <div class="laf-search-divider"></div>
    <input type="text" id="search-input" placeholder="Search items by name" class="fs-7 text-gray-800" autocomplete="off">
    <button class="laf-search-btn" type="button" aria-label="Search">🔍</button>
  </div>

  <div class="laf-card-body px-6 pb-6">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php foreach ($surrendered_items as $item):
        $cat_key = strtolower($item['category'] ?? '');
        $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
      ?>
        <div class="col">
          <div class="laf-item-card laf-card-clickable <?= htmlspecialchars($item['cat_key']) ?>"
            data-item-id="<?= (int)$item['id'] ?>"
            onclick="window.location.href='/LAF/item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">
            <div class="item-card-top d-flex justify-content-between align-items-center mb-3">
              <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>"><?= htmlspecialchars($item['category']) ?></span>
              <span class="badge-laf-unclaimed"><?= htmlspecialchars($item['status']) ?></span>
            </div>
            
            <div class="item-icon-wrap w-100 d-flex align-items-center justify-content-center mb-3">
              <?php if (!empty($item['image'])): ?>
                <img class="lozad rounded object-fit-cover w-50px h-50px" data-src="<?= htmlspecialchars($item['image']) ?>">
              <?php else: ?>
                <i class="<?= $iconClass ?> text-primary" style="font-size: 2.8rem;"></i>
              <?php endif; ?>
            </div>
            
            <div class="item-name fs-6 fw-bold text-gray-900 mb-1"><?= htmlspecialchars($item['name']) ?></div>
            <div class="item-meta dash-floor fs-8 text-muted" data-real="📍<?= htmlspecialchars($item['floor']) ?>">📍 ●●● ●●●●●</div>
            <div class="item-meta dash-time fs-8 text-muted" data-real="🕐 <?= htmlspecialchars($item['time']) ?>">🕐 ●●:●●</div>
            <div class="item-meta dash-by fs-8 text-muted mb-3" data-real="👤 <?= htmlspecialchars($item['surrendered_by']) ?>">👤 ●●● ●●●●●●</div>
            <button class="btn-how-to-claim mt-auto" data-item-id="<?= (int)$item['id'] ?>" onclick="event.stopPropagation();">🏢 How to Claim</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>