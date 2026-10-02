<?php if (!$isDetailView): ?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-4 mb-7">
  <div>
    <a href="../../" class="btn btn-sm btn-light mb-4"><i class="bi bi-arrow-left me-2"></i>Back</a>
    <h1 class="text-gray-900 fw-bold fs-2 mb-1">All Unclaimed Items</h1>
    <span class="text-muted fs-7"><?= count($unclaimedItems) ?> items available for claiming</span>
  </div>
  <div class="position-relative w-300px">
    <i class="ki-duotone ki-magnifier fs-3 position-absolute top-50 translate-middle-y ms-4"><span class="path1"></span><span class="path2"></span></i>
    <input id="item-search" type="text" class="form-control form-control-solid ps-12" placeholder="Search items">
  </div>
</div>
<div class="row row-cols-1 row-cols-lg-2 g-5">
  <?php foreach ($unclaimedItems as $row): ?>
  <div class="col item-row" data-search="<?= strtolower(htmlspecialchars($row['name'] . ' ' . $row['category'] . ' ' . $row['floor'])) ?>">
    <a href="?id=<?= urlencode($row['id']) ?>" class="card card-bordered hover-elevate-up h-100 text-gray-800 text-hover-primary">
      <div class="card-body d-flex align-items-center gap-5 p-5">
        <div class="symbol symbol-100px flex-shrink-0"><img src="<?= htmlspecialchars($row['image']) ?>" class="object-fit-cover" alt="<?= htmlspecialchars($row['name']) ?>"></div>
        <div class="flex-grow-1">
          <span class="badge badge-light-warning mb-3">Unclaimed</span>
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

<a href="./" class="btn btn-sm btn-light mb-6"><i class="bi bi-arrow-left me-2"></i>Back to Unclaimed Items</a>

<div class="row g-7">
  <div class="col-lg-5">
    <div class="card card-bordered overflow-hidden">
      <img src="<?= htmlspecialchars($item['image']) ?>" class="w-100 h-350px object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>">
      <div class="card-body">
        <div class="d-flex gap-2 mb-5">
          <span class="badge badge-light-primary"><?= htmlspecialchars($item['category']) ?></span>
          <span class="badge badge-light-warning">Unclaimed</span>
        </div>
        <button type="button" class="btn btn-primary w-100 mb-5" data-bs-toggle="modal" data-bs-target="#modalHowToClaim">This Is Mine · How to Claim</button>
        <div class="notice d-flex bg-light-primary rounded border border-primary border-dashed p-5">
          <i class="ki-duotone ki-shield-tick fs-2x text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
          <span class="text-gray-700 fs-7"><strong>Privacy protected.</strong> Use the eye buttons to reveal details temporarily.</span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <h1 class="text-gray-900 fw-bold fs-2x mb-2"><?= htmlspecialchars($item['name']) ?></h1>
    <div class="text-muted fs-7 fw-semibold mb-6">Item ID: <?= htmlspecialchars($item['id']) ?></div>
    <div class="card card-bordered">
      <div class="card-header"><h2 class="card-title fs-4">Item Details</h2></div>
      <div class="card-body">
        <?php
        $fields = [
          ['Date Found', 'date', $item['date'], 'w-100px'],
          ['Time Found', 'time', $item['time'], 'w-75px'],
          ['Floor / Area', 'floor', $item['floor'], 'w-125px'],
          ['Surrendered By', 'surrendered', $item['surrendered_by'], 'w-150px']
        ];
        foreach ($fields as $field):
        ?>
          <div class="d-flex justify-content-between align-items-center border-bottom py-5">
            <div>
              <div class="text-muted text-uppercase fs-8 fw-bold mb-2"><?= htmlspecialchars($field[0]) ?></div>
              <span id="protected-<?= $field[1] ?>" class="protected-value d-inline-block <?= $field[3] ?> h-15px bg-gray-300 rounded" data-value="<?= htmlspecialchars($field[2]) ?>" data-placeholder-class="<?= $field[3] ?>"></span>
            </div>
            <button type="button" class="btn btn-sm btn-icon btn-light reveal-value" data-target="protected-<?= $field[1] ?>">
              <i class="bi bi-eye"></i>
            </button>
          </div>
        <?php endforeach; ?>
        <div class="pt-5">
          <div class="text-muted text-uppercase fs-8 fw-bold mb-2">Currently At</div>
          <div class="text-gray-800 fw-semibold">Discipline Unit · 15th Floor, Room 1501</div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(__DIR__ . '/../../includes/_modals.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.reveal-value').forEach(function (button) {
    button.addEventListener('click', function () {
      var value = document.getElementById(button.dataset.target);
      var hidden = value.classList.contains('bg-gray-300');

      if (hidden) {
        value.textContent = value.dataset.value;
        value.className = 'protected-value text-gray-800 fw-semibold';
        button.innerHTML = '<i class="bi bi-eye-slash"></i>';
      } else {
        var widthClass = value.dataset.placeholderClass;
        value.textContent = '';
        value.className = 'protected-value d-inline-block ' + widthClass + ' h-15px bg-gray-300 rounded';
        button.innerHTML = '<i class="bi bi-eye"></i>';
      }
    });
  });
});
</script>
<?php endif; ?>
