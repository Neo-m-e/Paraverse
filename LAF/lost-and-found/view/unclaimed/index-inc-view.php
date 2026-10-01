<a href="../../" class="btn btn-sm btn-light mb-6"><i class="bi bi-arrow-left me-2"></i>Back to items</a>

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
    <h1 class="text-gray-900 fw-bold fs-2x mb-6"><?= htmlspecialchars($item['name']) ?></h1>
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
