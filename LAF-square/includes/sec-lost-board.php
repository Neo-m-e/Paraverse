<?php
$lost_items = array_slice(LAF_GET_LOST_ITEMS(), 0, 4, true);

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
<div class="laf-card shadow-sm border border-gray-200">

  <!-- How to Report Section -->
  <div class="laf-hiw-container">
    <p class="laf-hiw-label mb-4 text-orange">🔍 HOW TO REPORT A LOST ITEM</p>
    <div class="row g-4">
      <div class="col-md-4 text-center">
        <div class="laf-hiw-step">
          <div class="hiw-num">1</div>
          <div class="hiw-content">
            <h6 class="fw-bold mb-1">Click "I Lost Something"</h6>
            <p class="text-muted fs-8">Fill in the item name, category, last known location, and a detailed description with unique identifiers.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <div class="laf-hiw-step">
          <div class="hiw-num">2</div>
          <div class="hiw-content">
            <h6 class="fw-bold mb-1">Your Report Goes Live</h6>
            <p class="text-muted fs-8">Your lost item appears in the "Lost Items" board below. Campus staff, students, and finders can see your report and match it.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <div class="laf-hiw-step">
          <div class="hiw-num">3</div>
          <div class="hiw-content">
            <h6 class="fw-bold mb-1">Get Notified When Found</h6>
            <p class="text-muted fs-8">If someone found your item, they click "I Found This!" to see how to surrender it.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Lost Items Board Header -->
  <div class="laf-card-header bg-white border-0 d-flex justify-content-between align-items-start py-5 px-6">
    <div>
      <h3 class="laf-section-title fs-3 fw-bold text-gray-900 mb-1">🔍 Lost Items Board</h3>
      <p class="laf-section-sub fs-7 text-muted">Did you find one of these? Tap "I Found This!" to help return it</p>
    </div>
    <a href="/LAF/lost-board/index.php" class="laf-view-all fs-7 fw-semibold text-primary text-hover-primary" onclick="KTApp.showPageLoading()">View All</a>
  </div>

  <!-- Lost Items Grid -->
  <div class="laf-card-body px-6 pb-6">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php foreach ($lost_items as $item):
        $cat_key = strtolower($item['category'] ?? '');
        $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
        $cat_class = $cat_css_map[$cat_key] ?? 'cat-others';
      ?>
        <div class="col">
          <div class="laf-lost-card laf-card-clickable <?= $cat_class ?>"
            onclick="window.location.href='/LAF/lost-item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">

            <div class="item-icon-wrap w-100">
              <div class="item-card-badges">
                <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>"><?= htmlspecialchars($item['category']) ?></span>
              </div>
              <?php if (!empty($item['image'])): ?>
                <img class="card-photo" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
              <?php else: ?>
                <i class="<?= $iconClass ?>"></i>
              <?php endif; ?>
              <div class="item-card-overlay"></div>
            </div>

            <div class="item-card-body">
              <div class="lost-title fs-6 fw-bold text-gray-900 mb-1"><?= htmlspecialchars($item['name']) ?></div>
              <div class="lost-meta fs-8 text-muted">📍 <?= htmlspecialchars($item['floor']) ?></div>
              <div class="lost-meta fs-8 text-muted mb-2">📅 <?= htmlspecialchars($item['date']) ?> &nbsp;🕐 <?= htmlspecialchars($item['time']) ?></div>
              <div class="lost-desc fs-7 text-gray-700 mb-3 flex-grow-1">
                <?php
                  $desc = $item['description'] ?? '';
                  if (strlen($desc) > 100) $desc = substr($desc, 0, 100) . '...';
                  echo nl2br(htmlspecialchars($desc));
                ?>
              </div>
              <button class="btn-i-found mt-auto" data-item-id="<?= (int)$item['id'] ?>" onclick="event.stopPropagation();">I Found This! 🙋</button>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>
