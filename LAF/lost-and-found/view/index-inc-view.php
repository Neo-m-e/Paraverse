<?php if (!$isDetailView): ?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-4 mb-7">
  <div>
    <a href="../" class="btn btn-sm btn-light mb-4"><i class="bi bi-arrow-left me-2"></i>Back</a>
    <h1 class="text-gray-900 fw-bold fs-2 mb-1">Lost Items Board</h1>
    <span class="text-muted fs-7"><?= count($lostItems) ?> reported lost items</span>
  </div>
  <div class="position-relative w-300px">
    <i class="ki-duotone ki-magnifier fs-3 position-absolute top-50 translate-middle-y ms-4"><span class="path1"></span><span class="path2"></span></i>
    <input id="item-search" type="text" class="form-control form-control-solid ps-12" placeholder="Search items">
  </div>
</div>

<div id="items-list" class="row row-cols-1 row-cols-lg-2 g-5">
  <?php foreach ($lostItems as $row): ?>
  <div class="col item-row" data-search="<?= strtolower(htmlspecialchars($row['name'] . ' ' . $row['category'] . ' ' . $row['floor'])) ?>">
    <a href="?id=<?= urlencode($row['id']) ?>" class="card card-bordered hover-elevate-up h-100 text-gray-800 text-hover-primary">
      <div class="card-body d-flex align-items-center gap-5 p-5">
        <div class="symbol symbol-100px flex-shrink-0"><img src="<?= htmlspecialchars($row['image']) ?>" class="object-fit-cover" alt="<?= htmlspecialchars($row['name']) ?>"></div>
        <div class="flex-grow-1">
          <span class="badge badge-light-danger mb-3">Lost</span>
          <div class="fw-bold fs-4 mb-2"><?= htmlspecialchars($row['name']) ?></div>
          <div class="text-muted fs-7 mb-1"><i class="bi bi-tag me-2"></i><?= htmlspecialchars($row['category']) ?></div>
          <div class="text-muted fs-7"><i class="bi bi-geo-alt me-2"></i><?= htmlspecialchars($row['floor']) ?></div>
        </div>
        <i class="ki-duotone ki-right fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
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

<a href="./" class="btn btn-sm btn-light mb-6"><i class="bi bi-arrow-left me-2"></i>Back to Lost Items Board</a>

<div class="row g-7 align-items-start">
  <div class="col-lg-5">
    <div class="card card-bordered overflow-hidden">
      <img src="<?= htmlspecialchars($item['image']) ?>" class="w-100 h-350px object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>">
      <div class="card-body">
        <div class="d-flex gap-2 mb-5">
          <span class="badge badge-light-warning"><?= htmlspecialchars($item['category']) ?></span>
          <span class="badge badge-light-danger">Lost</span>
        </div>
        <button type="button" class="btn btn-success w-100 mb-5" data-bs-toggle="modal" data-bs-target="#modalHowToSurrender">I Found This!</button>
        <div class="notice d-flex bg-light rounded border border-dashed p-5">
          <i class="ki-duotone ki-shield-tick fs-2x text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
          <span class="text-gray-600 fs-7"><strong>Privacy Protected:</strong> Exact contact information and pickup details are only revealed after a security check.</span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <h1 class="text-gray-900 fw-bold fs-2x mb-2"><?= htmlspecialchars($item['name']) ?> <i class="bi bi-search text-primary fs-2"></i></h1>
    <div class="text-muted fs-7 fw-semibold mb-6">Item ID: <?= htmlspecialchars($item['id']) ?></div>

    <div class="card card-bordered mb-5">
      <div class="card-body">
        <div class="row g-6">
          <div class="col-md-6 border-end-md">
            <div class="text-muted text-uppercase fs-7 fw-bold mb-2"><i class="bi bi-calendar3 me-2"></i>Date Last Seen</div>
            <div class="text-gray-800 fw-bold fs-5"><?= htmlspecialchars($item['date']) ?></div>
          </div>
          <div class="col-md-6">
            <div class="text-muted text-uppercase fs-7 fw-bold mb-2"><i class="bi bi-clock me-2"></i>Time Last Seen</div>
            <div class="text-gray-800 fw-bold fs-5"><?= htmlspecialchars($item['time']) ?></div>
          </div>
          <div class="col-12 border-top pt-6">
            <div class="text-muted text-uppercase fs-7 fw-bold mb-2"><i class="bi bi-geo-alt me-2"></i>Floor / Area Last Seen</div>
            <div class="text-gray-800 fw-bold fs-5"><?= htmlspecialchars($item['floor']) ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-bordered mb-5">
      <div class="card-body">
        <div class="row g-6">
          <div class="col-md-6 border-end-md">
            <div class="text-muted text-uppercase fs-7 fw-bold mb-2"><i class="bi bi-person me-2"></i>Lost By</div>
            <div class="text-gray-800 fw-bold fs-5"><?= htmlspecialchars($item['lost_by']) ?></div>
          </div>
          <div class="col-md-6">
            <div class="text-muted text-uppercase fs-7 fw-bold mb-2"><i class="bi bi-mortarboard me-2"></i>Course</div>
            <div class="text-gray-800 fw-bold fs-5"><?= htmlspecialchars($item['course']) ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-bordered">
      <div class="card-body">
        <div class="text-muted text-uppercase fs-7 fw-bold mb-3">Item Description</div>
        <p class="text-gray-700 fs-5 mb-6"><?= htmlspecialchars($item['description']) ?></p>
        <?php if ($item['context'] !== ''): ?>
          <div class="text-muted text-uppercase fs-7 fw-bold mb-3">Additional Context</div>
          <div class="border-start border-3 border-primary ps-4 text-gray-700 fs-5 fst-italic"><?= htmlspecialchars($item['context']) ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php include(__DIR__ . '/../includes/_modals.php'); ?>
<?php endif; ?>
