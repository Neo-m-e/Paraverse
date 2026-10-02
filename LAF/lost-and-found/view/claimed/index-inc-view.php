<?php if (!$isDetailView): ?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-4 mb-7">
  <div>
    <a href="../../" class="btn btn-sm btn-light mb-4"><i class="bi bi-arrow-left me-2"></i>Back</a>
    <h1 class="text-gray-900 fw-bold fs-2 mb-1">Recently Claimed Items</h1>
    <span class="text-muted fs-7"><?= count($claimedItems) ?> successfully returned items</span>
  </div>
  <div class="position-relative w-300px">
    <i class="ki-duotone ki-magnifier fs-3 position-absolute top-50 translate-middle-y ms-4"><span class="path1"></span><span class="path2"></span></i>
    <input id="item-search" type="text" class="form-control form-control-solid ps-12" placeholder="Search items">
  </div>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5">
  <?php foreach ($claimedItems as $row): ?>
  <div class="col item-row" data-search="<?= strtolower(htmlspecialchars($row['name'] . ' ' . $row['category'] . ' ' . $row['floor'])) ?>">
    <a href="?id=<?= urlencode($row['id']) ?>" class="card card-bordered hover-elevate-up h-100 text-gray-800 text-hover-primary overflow-hidden">
      <div class="h-175px position-relative">
        <img src="<?= htmlspecialchars($row['image']) ?>" class="w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($row['name']) ?>">
        <span class="badge badge-success position-absolute top-0 end-0 m-4">Claimed</span>
      </div>
      <div class="card-body p-5">
        <div class="fw-bold fs-4 mb-2"><?= htmlspecialchars($row['name']) ?></div>
        <div class="text-muted fs-7 mb-1"><i class="bi bi-tag me-2"></i><?= htmlspecialchars($row['category']) ?></div>
        <div class="text-muted fs-7"><i class="bi bi-person-check me-2"></i><?= htmlspecialchars($row['claimed_by']) ?></div>
      </div>
    </a>
  </div>
  <?php endforeach; ?>
</div>
<script>
document.getElementById('item-search').addEventListener('input', function () {
  var search = this.value.toLowerCase();
  document.querySelectorAll('.item-row').forEach(function (item) {
    item.classList.toggle('d-none', !item.dataset.search.includes(search));
  });
});
</script>
<?php else: ?>

<a href="./" class="btn btn-sm btn-light mb-6"><i class="bi bi-arrow-left me-2"></i>Back to Claimed Items</a>
<div class="row g-7">
  <div class="col-lg-5">
    <div class="card card-bordered overflow-hidden">
      <img src="<?= htmlspecialchars($item['image']) ?>" class="w-100 h-350px object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>">
      <div class="card-body">
        <span class="badge badge-light-success mb-4">Claimed</span>
        <div class="notice d-flex bg-light-success rounded border border-success border-dashed p-5">
          <i class="ki-duotone ki-check-circle fs-2x text-success me-4"><span class="path1"></span><span class="path2"></span></i>
          <span class="text-gray-700 fs-7">This item has already been returned to its verified owner.</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <h1 class="text-gray-900 fw-bold fs-2x mb-2"><?= htmlspecialchars($item['name']) ?></h1>
    <div class="text-muted fs-7 fw-semibold mb-6">Item ID: <?= htmlspecialchars($item['id']) ?></div>
    <div class="card card-bordered">
      <div class="card-header"><h2 class="card-title fs-4">Claim Details</h2></div>
      <div class="card-body">
        <div class="row g-6">
          <div class="col-md-6"><div class="text-muted fs-8 fw-bold text-uppercase mb-2">Category</div><div class="fw-semibold"><?= htmlspecialchars($item['category']) ?></div></div>
          <div class="col-md-6"><div class="text-muted fs-8 fw-bold text-uppercase mb-2">Found At</div><div class="fw-semibold"><?= htmlspecialchars($item['floor']) ?></div></div>
          <div class="col-md-6"><div class="text-muted fs-8 fw-bold text-uppercase mb-2">Claimed By</div><div class="fw-semibold"><?= htmlspecialchars($item['claimed_by']) ?></div></div>
          <div class="col-md-6"><div class="text-muted fs-8 fw-bold text-uppercase mb-2">Received By</div><div class="fw-semibold"><?= htmlspecialchars($item['received_by']) ?></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
