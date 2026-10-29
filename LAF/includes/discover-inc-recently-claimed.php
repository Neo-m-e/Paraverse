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
      <div class="col-md-4"><a href="<?= $LAF_BASE_URL ?>/all-claimed/?id=<?= urlencode($item['id']) ?>" class="card card-bordered h-100 text-gray-800 text-hover-primary"><div class="card-body d-flex align-items-center">
        <div class="symbol symbol-75px me-4"><img src="<?= htmlspecialchars($item['image']) ?>" class="object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>"></div>
        <div><span class="badge badge-light-success mb-2">Claimed</span><div class="fw-bold text-gray-900 mb-1"><?= htmlspecialchars($item['name']) ?></div><div class="text-muted fs-8"><?= htmlspecialchars($item['floor']) ?></div></div>
      </div></a></div>
    <?php endforeach; ?>
  </div></div>
</section>
