<a href="../../" class="btn btn-sm btn-light mb-6"><i class="bi bi-arrow-left me-2"></i>Back to items</a>
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
    <h1 class="text-gray-900 fw-bold fs-2x mb-6"><?= htmlspecialchars($item['name']) ?></h1>
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
