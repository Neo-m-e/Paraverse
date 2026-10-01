<a href="../" class="btn btn-sm btn-light mb-6"><i class="bi bi-arrow-left me-2"></i>Not the item I found, go back</a>

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
    <h1 class="text-gray-900 fw-bold fs-2x mb-6"><?= htmlspecialchars($item['name']) ?> <i class="bi bi-search text-primary fs-2"></i></h1>

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

