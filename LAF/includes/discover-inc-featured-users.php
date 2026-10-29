<?php
$featuredUsers = [
  ['JC', 'Jenny B. Calot', 'BSCS · 3rd Year', 4, 'primary'],
  ['KD', 'Kristin V. Dy', 'BST · 2nd Year', 3, 'success'],
  ['MR', 'Marco R. Santos', 'BSECE · 4th Year', 2, 'warning']
];
?>
<section class="card card-bordered mb-8">
  <div class="card-header"><div class="card-title d-flex flex-column align-items-start"><h2 class="fs-3 fw-bold text-gray-900 mb-1">Featured Users</h2><span class="text-muted fs-7">Top individuals helping our Lost and Found community</span></div></div>
  <div class="card-body">
    <div class="row g-5">
      <?php foreach ($featuredUsers as $user): ?>
        <div class="col-md-4"><div class="card card-bordered h-100"><div class="card-body text-center">
          <div class="symbol symbol-60px symbol-circle mb-4"><span class="symbol-label bg-light-<?= $user[4] ?> text-<?= $user[4] ?> fw-bold fs-3"><?= htmlspecialchars($user[0]) ?></span></div>
          <div class="fw-bold text-gray-900 fs-5 mb-1"><?= htmlspecialchars($user[1]) ?></div>
          <div class="text-muted fs-8 mb-4"><?= htmlspecialchars($user[2]) ?></div>
          <span class="badge badge-light-primary">Surrendered <?= (int) $user[3] ?> items</span>
        </div></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
