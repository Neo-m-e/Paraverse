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
            <div class="position-relative h-125px overflow-hidden">
              <img src="<?= htmlspecialchars($item['image']) ?>" class="w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>">
              <div class="position-absolute top-0 start-0 w-100 h-100 bg-<?= $color ?> opacity-25"></div>
            </div>
            <div class="card-body p-4">
              <span class="badge badge-light-<?= $color ?> mb-3"><?= htmlspecialchars($item['category']) ?></span>
              <div class="fw-bold text-gray-900 fs-7 mb-2"><?= htmlspecialchars($item['name']) ?></div>
              <div class="d-flex align-items-center gap-2">
                <span class="discover-protected-field" data-item-id="<?= htmlspecialchars($item['id']) ?>" data-field="date" data-value="<?= htmlspecialchars($item['date']) ?>"></span>
                <span class="discover-protected-field" data-item-id="<?= htmlspecialchars($item['id']) ?>" data-field="time" data-value="<?= htmlspecialchars($item['time']) ?>"></span>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.discover-protected-field').forEach(function (field) {
    var key = 'laf-visibility-' + field.dataset.itemId + '-' + field.dataset.field;
    if (localStorage.getItem(key) === 'visible') {
      field.textContent = field.dataset.value;
      field.className = 'discover-protected-field text-muted fs-9';
    } else {
      var width = field.dataset.field === 'date' ? 'w-75px' : 'w-50px';
      field.textContent = '';
      field.className = 'discover-protected-field d-inline-block ' + width + ' h-10px bg-gray-300 rounded';
    }
  });
});
</script>
