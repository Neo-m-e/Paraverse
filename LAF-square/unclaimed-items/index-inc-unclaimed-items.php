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
?>
<div class="app-container container-xxl pt-8 pb-10">

  <div class="d-flex align-items-center gap-3 mb-6 mt-4">
    <a href="../index.php" class="btn-go-back" onclick="KTApp.showPageLoading()"><i class="bi bi-arrow-left"></i></a>
    <h2 class="mb-0 fw-bold fs-3 text-gray-900">All Unclaimed Items</h2>
    <span class="badge-count"><?= count($items) ?> items</span>
  </div>

  <!-- Search -->
  <div class="mb-6">
    <div class="laf-search-wrap shadow-sm">
      <select id="search-category" class="fs-7 fw-bold text-gray-700">
        <?php foreach ($categories as $cat): ?>
          <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
        <?php endforeach; ?>
      </select>
      <div class="laf-search-divider"></div>
      <input type="text" id="search-input" placeholder="Search items by name..." class="fs-7 text-gray-800" autocomplete="off">
      <button class="laf-search-btn" type="button" aria-label="Search">🔍</button>
    </div>
  </div>

  <!-- Grid -->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="items-grid">
    <?php foreach ($items as $item):
      $cat_key = strtolower($item['category'] ?? '');
      $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
    ?>
      <div class="col">
        <div class="laf-item-card laf-card-clickable <?= htmlspecialchars($item['cat_key']) ?>"
          data-item-id="<?= (int)$item['id'] ?>"
          data-name="<?= strtolower(htmlspecialchars($item['name'])) ?>"
          data-floor="<?= strtolower(htmlspecialchars($item['floor'])) ?>"
          data-category="<?= htmlspecialchars($item['category']) ?>"
          onclick="window.location.href='../item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">

          <div class="item-icon-wrap w-100">
            <div class="item-card-badges">
              <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>"><?= htmlspecialchars($item['category']) ?></span>
              <span class="badge-laf-unclaimed <?= $item['status'] === 'Claimed' ? 'badge-laf-claimed-sm' : '' ?>"><?= htmlspecialchars($item['status']) ?></span>
            </div>
            <?php if (!empty($item['image'])): ?>
              <img class="card-photo" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <?php else: ?>
              <i class="<?= $iconClass ?>"></i>
            <?php endif; ?>
            <div class="item-card-overlay"></div>
          </div>

          <div class="item-card-body">
            <div class="item-name fs-6 fw-bold text-gray-900 mb-1"><?= htmlspecialchars($item['name']) ?></div>
            <div class="item-meta dash-floor fs-8 text-muted" data-real="📍<?= htmlspecialchars($item['floor']) ?>">📍 ●●● ●●●●●</div>
            <div class="item-meta dash-date fs-8 text-muted" data-real="📅 <?= htmlspecialchars($item['date']) ?>">📅 ●●● ●●, ●●●●</div>
            <div class="item-meta dash-time fs-8 text-muted" data-real="🕐 <?= htmlspecialchars($item['time']) ?>">🕐 ●●:●●</div>
            <button class="btn-how-to-claim mt-3" onclick="event.stopPropagation();">🏢 How to Claim</button>
          </div>

        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div id="board-empty-state" style="display:none;text-align:center;padding:48px 0;">
    <div style="font-size:3rem;margin-bottom:12px;">🔍</div>
    <p class="text-muted fs-6">No items match your search.</p>
  </div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>

<script>
  function applyBoardFilters() {
    var search = document.getElementById('search-input').value.toLowerCase().trim();
    var cat = document.getElementById('search-category').value;
    var allCat = cat === 'All Categories';
    var cards = document.querySelectorAll('#items-grid .col');
    var visible = 0;

    cards.forEach(function(col) {
      var card = col.querySelector('.laf-item-card');
      var nameMatch = !search || card.dataset.name.includes(search) || card.dataset.floor.includes(search);
      var catMatch = allCat || card.dataset.category === cat;
      var show = nameMatch && catMatch;
      col.style.display = show ? '' : 'none';
      if (show) visible++;
    });

    document.getElementById('board-empty-state').style.display = visible === 0 ? '' : 'none';
  }

  document.getElementById('search-input').addEventListener('input', applyBoardFilters);
  document.getElementById('search-category').addEventListener('change', applyBoardFilters);
  document.querySelector('.laf-search-btn').addEventListener('click', applyBoardFilters);
</script>
