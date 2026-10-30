<?php
$claimedItems = array_values(array_filter($surrenderedItems, function ($item) {
  return $item['status'] === 'Claimed';
}));
?>
<section class="card card-bordered mb-8">
  <div class="card-header">
    <div class="card-title d-flex flex-column align-items-start"><h2 class="fs-3 fw-bold text-gray-900 mb-1">Recently Claimed Items</h2><span class="text-muted fs-7">Recently returned items from the Lost and Found</span></div>
    <div class="card-toolbar"><a href="<?= $LAF_BASE_URL ?>/all-claimed/" class="btn btn-sm btn-light-primary">View All</a></div>
  </div>
  <div class="card-body"><div class="row g-5">
    <?php foreach ($claimedItems as $item): ?>
      <?php $color = $categoryColors[$item['category']] ?? 'success'; ?>
      <div class="col-md-4">
        <a href="<?= $LAF_BASE_URL ?>/all-claimed/?id=<?= urlencode($item['id']) ?>" class="card card-bordered h-100 overflow-hidden text-gray-800 text-hover-primary">
          <div class="card-body p-0 d-flex">
            <div class="position-relative w-100px h-125px flex-shrink-0 overflow-hidden">
              <img src="<?= htmlspecialchars($item['image']) ?>" class="w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>">
              <div class="position-absolute top-0 start-0 w-100 h-100 bg-<?= $color ?> opacity-25"></div>
            </div>
            <div class="p-4">
              <span class="badge badge-light-success mb-2">Claimed</span>
              <div class="fw-bold text-<?= $color ?> mb-2"><?= htmlspecialchars($item['name']) ?></div>
              <div class="text-muted fs-8 mb-1"><i class="bi bi-geo-alt me-1"></i><?= htmlspecialchars($item['floor']) ?></div>
              <div class="text-muted fs-8"><i class="bi bi-person-check me-1"></i><?= htmlspecialchars($item['claimed_by']) ?></div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div></div>
</section>
