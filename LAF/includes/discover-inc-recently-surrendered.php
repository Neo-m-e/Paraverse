<?php
$categoryColors = [
  'Accessories' => 'primary',
  'Academic' => 'success',
  'Bags' => 'warning',
  'Electronics' => 'info',
  'Personal Essentials' => 'danger'
];
$recentItems = array_slice($surrenderedItems, 0, 6);
?>
<section class="card card-bordered mb-8">
  <div class="card-header">
    <div class="card-title d-flex flex-column align-items-start">
      <h2 class="fs-3 fw-bold text-gray-900 mb-1">Recently Surrendered Items</h2>
      <span class="text-muted fs-7">Items currently waiting to be claimed</span>
    </div>
    <div class="card-toolbar"><a href="<?= $LAF_BASE_URL ?>/all-unclaimed/" class="btn btn-sm btn-light-primary">View All</a></div>
  </div>
  <div class="card-body">
    <div class="row row-cols-2 row-cols-md-3 row-cols-xl-6 g-4">
      <?php foreach ($recentItems as $item): ?>
        <?php $color = $categoryColors[$item['category']] ?? 'secondary'; ?>
        <?php $itemFolder = $item['status'] === 'Claimed' ? 'all-claimed' : 'all-unclaimed'; ?>
        <div class="col">
          <a href="<?= $LAF_BASE_URL ?>/<?= $itemFolder ?>/?id=<?= urlencode($item['id']) ?>" class="card card-bordered card-flush hover-elevate-up h-100 overflow-hidden text-gray-800 text-hover-primary">
            <div class="h-125px bg-light-<?= $color ?> d-flex align-items-center justify-content-center p-4">
              <div class="symbol symbol-100px">
                <img src="<?= htmlspecialchars($item['image']) ?>" class="object-fit-contain" alt="<?= htmlspecialchars($item['name']) ?>">
              </div>
            </div>
            <div class="card-body p-4">
              <span class="badge badge-light-<?= $color ?> mb-3"><?= htmlspecialchars($item['category']) ?></span>
              <div class="fw-bold text-gray-900 fs-7 mb-2"><?= htmlspecialchars($item['name']) ?></div>
              <div class="d-flex align-items-center gap-2">
                <span class="d-inline-block w-75px h-10px bg-gray-300 rounded"></span>
                <span class="d-inline-block w-50px h-10px bg-gray-300 rounded"></span>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
