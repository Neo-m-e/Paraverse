<?php
$landingCategories = [
  ['🎒', 'Bags'], ['📚', 'Academic'], ['💻', 'Electronics'], ['📄', 'Documents'],
  ['🧴', 'Personal Essentials'], ['🎀', 'Accessories'], ['👕', 'Clothing'], ['👛', 'Wallets'], ['🪪', 'Others']
];

$landingItems = [
  ['🥤', 'Personal Essentials', 'Blue Tumbler', 'December 09, 2025 · 9:30 AM', 'primary'],
  ['🎧', 'Electronics', 'Wireless Headphones', 'April 19, 2025 · 10:15 AM', 'warning'],
  ['📓', 'Academic', 'Spiral Notebook', 'June 30, 2025 · 2:45 PM', 'success'],
  ['👜', 'Bags', 'Brown Leather Bag', 'January 18, 2025 · 11:00 AM', 'info'],
  ['✏️', 'Personal Essentials', 'Pencil Case', 'May 17, 2026 · 3:20 PM', 'danger'],
  ['🔑', 'Others', 'Key with Lanyard', 'August 01, 2025 · 8:50 AM', 'primary']
];
?>

<section id="laf-recently-surrendered" class="bg-light py-15 py-lg-20">
  <div class="app-container container-xxl">
    <div class="text-center mb-10">
      <span class="badge badge-light-primary mb-3">JUST DROPPED OFF</span>
      <h2 class="text-gray-900 fw-bolder fst-italic fs-2x">Recently Surrendered</h2>
      <p class="text-muted fs-6 mt-3">These items are currently waiting to be claimed. Log in to see your lost and found items.</p>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-10">
      <?php foreach ($landingCategories as $category): ?>
        <span class="btn btn-sm btn-light-primary rounded-pill"><?= $category[0] ?> <?= htmlspecialchars($category[1]) ?></span>
      <?php endforeach; ?>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-xl-6 g-4 mb-10">
      <?php foreach ($landingItems as $item): ?>
        <div class="col">
          <div class="card card-bordered hover-elevate-up h-100 overflow-hidden">
            <div class="h-125px bg-light-<?= $item[4] ?> d-flex align-items-center justify-content-center fs-3x"><?= $item[0] ?></div>
            <div class="card-body p-4">
              <span class="badge badge-light-<?= $item[4] ?> mb-3"><?= htmlspecialchars($item[1]) ?></span>
              <div class="fw-bold text-gray-900 fs-6 mb-2"><?= htmlspecialchars($item[2]) ?></div>
              <div class="text-muted fs-8"><?= htmlspecialchars($item[3]) ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center">
      <a href="<?= $LAF_BASE_URL ?>/all-unclaimed/" class="btn btn-light-primary">
        View All Items <i class="ki-duotone ki-right fs-3 ms-2"><span class="path1"></span><span class="path2"></span></i>
      </a>
    </div>
  </div>
</section>
