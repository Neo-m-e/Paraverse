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
    <h2 class="mb-0 fw-bold fs-3 text-gray-900">🔍 Lost Items Board</h2>
    <span class="badge-count" id="board-count"><?= count($items) ?> items</span>
  </div>

  <div class="mb-6">
    <div class="laf-search-wrap shadow-sm">
      <select id="search-category" class="fs-7 fw-bold text-gray-700">
        <?php foreach ($categories as $cat): ?>
          <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
        <?php endforeach; ?>
      </select>
      <div class="laf-search-divider"></div>
      <input type="text" id="search-input" placeholder="Search by name, location..." class="fs-7 text-gray-800" autocomplete="off">
      <button class="laf-search-btn" type="button" aria-label="Search">🔍</button>
    </div>
  </div>

  <!-- Horizontal grid: 1 col mobile, 2 col md+ -->
  <div class="row row-cols-1 row-cols-md-2 g-3" id="items-grid">
    <?php foreach ($items as $item):
      $cat_key   = strtolower($item['category'] ?? '');
      $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
      $cat_class = $cat_css_map[$cat_key] ?? 'cat-others';
      $desc = $item['description'] ?? '';
      if (strlen($desc) > 90) $desc = substr($desc, 0, 90) . '...';
    ?>
      <div class="col laf-h-col">
        <div class="laf-h-card laf-card-clickable <?= $cat_class ?>"
          data-name="<?= strtolower(htmlspecialchars($item['name'])) ?>"
          data-floor="<?= strtolower(htmlspecialchars($item['floor'])) ?>"
          data-category="<?= htmlspecialchars($item['category']) ?>"
          onclick="window.location.href='../lost-item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">

          <!-- Image / icon area -->
          <div class="h-img-wrap">
            <?php if (!empty($item['image'])): ?>
              <img class="card-photo" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <?php else: ?>
              <i class="<?= $iconClass ?>"></i>
            <?php endif; ?>
            <div class="h-img-fade"></div>
          </div>

          <!-- Card body -->
          <div class="h-card-body">
            <div>
              <div class="h-badges">
                <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>"><?= htmlspecialchars($item['category']) ?></span>
              </div>
              <div class="h-item-name"><?= htmlspecialchars($item['name']) ?></div>
              <div class="h-item-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
              <div class="h-item-meta">📅 <?= htmlspecialchars($item['date']) ?> &nbsp;🕐 <?= htmlspecialchars($item['time']) ?></div>
              <?php if ($desc): ?>
                <div class="h-item-desc"><?= nl2br(htmlspecialchars($desc)) ?></div>
              <?php endif; ?>
            </div>
            <button class="btn-i-found mt-2" data-item-id="<?= (int)$item['id'] ?>" onclick="event.stopPropagation();">I Found This! 🙋</button>
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
      var card = col.querySelector('.laf-h-card');
      var nameMatch = !search || card.dataset.name.includes(search) || card.dataset.floor.includes(search);
      var catMatch = allCat || card.dataset.category === cat;
      var show = nameMatch && catMatch;
      col.style.display = show ? '' : 'none';
      if (show) visible++;
    });

    document.getElementById('board-count').textContent = visible + ' item' + (visible !== 1 ? 's' : '');
    document.getElementById('board-empty-state').style.display = visible === 0 ? '' : 'none';
  }

  document.getElementById('search-input').addEventListener('input', applyBoardFilters);
  document.getElementById('search-category').addEventListener('change', applyBoardFilters);
  document.querySelector('.laf-search-btn').addEventListener('click', applyBoardFilters);
</script>
