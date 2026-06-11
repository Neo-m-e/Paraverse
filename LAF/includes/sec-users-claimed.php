<?php
$featured_users = [
  ['id'=>1,'name'=>'Jenny B. Calot','initials'=>'JC','course'=>'BSCS · 3rd Year','surrendered'=>4,'color'=>'#6c63ff','profile_url'=>'/profile/?id=1'],
  ['id'=>2,'name'=>'Kristin V. Dy','initials'=>'KD','course'=>'BST · 2nd Year','surrendered'=>3,'color'=>'#17c653','profile_url'=>'/profile/?id=2'],
  ['id'=>3,'name'=>'Marco R. Santos','initials'=>'MR','course'=>'BSECE · 4th Year','surrendered'=>2,'color'=>'#ffa800','profile_url'=>'/profile/?id=3'],
];

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

$claimed_items = array_slice(array_values(LAF_GET_CLAIMED_ITEMS()), 0, 3);
?>

<!-- Featured Users -->
<div class="laf-card shadow-sm border border-gray-200">
  <div class="laf-card-header bg-white border-0 py-5 px-6">
    <div>
      <h3 class="laf-section-title fs-3 fw-bold text-gray-900 mb-1">Featured Users 🏅</h3>
      <p class="laf-section-sub fs-7 text-muted">Top individuals helping our lost and found</p>
    </div>
  </div>
  <div class="laf-card-body px-6 pb-6">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($featured_users as $user): ?>
        <div class="col">
          <div class="laf-user-card border rounded-3 p-5 text-center bg-white h-100 d-flex flex-column align-items-center">
            <div class="user-avatar rounded-circle d-flex align-items-center justify-content-center mb-3" style="width:56px; height:56px; background:<?= htmlspecialchars($user['color']) ?>22; color:<?= htmlspecialchars($user['color']) ?>;">
              <?= htmlspecialchars($user['initials']) ?>
            </div>
            <div class="user-name fs-6 fw-bold text-gray-900 mb-1"><?= htmlspecialchars($user['name']) ?></div>
            <div class="user-meta fs-8 text-muted mb-2"><?= htmlspecialchars($user['course']) ?></div>
            <div class="user-surr fs-7 text-gray-700 mb-4 flex-grow-1">Surrendered <strong><?= (int)$user['surrendered'] ?></strong> items</div>
            <a href="<?= htmlspecialchars($user['profile_url']) ?>" class="btn-view-profile mt-auto w-100" onclick="KTApp.showPageLoading()">View Profile</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Recently Claimed Items -->
<div class="laf-card shadow-sm border border-gray-200">
  <div class="laf-card-header bg-white border-0 d-flex justify-content-between align-items-start py-5 px-6">
    <div>
      <h3 class="laf-section-title fs-3 fw-bold text-gray-900 mb-1">Recently Claimed Items ✅</h3>
      <p class="laf-section-sub fs-7 text-muted">Below are recently claimed items from the Lost and Found</p>
    </div>
    <a href="/LAF/claimed-items/index.php" class="laf-view-all fs-7 fw-semibold text-primary text-hover-primary" onclick="KTApp.showPageLoading()">View All</a>
  </div>
  <div class="laf-card-body px-6 pb-6">
    <div class="row row-cols-1 row-cols-md-3 g-3">
      <?php foreach ($claimed_items as $item):
        $cat_key   = strtolower($item['category'] ?? '');
        $iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];
        $cat_class = $cat_css_map[$cat_key] ?? 'cat-others';
      ?>
        <div class="col laf-h-col">
          <div class="laf-h-card laf-h-card--mini laf-card-clickable <?= $cat_class ?>"
               onclick="window.location.href='/LAF/item-details/index.php?id=<?= (int)$item['id'] ?>'; KTApp.showPageLoading();">
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
              <div class="h-item-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
              <div class="h-item-meta">👤 <?= htmlspecialchars($item['claimed_by']) ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
