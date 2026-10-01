<div class="row g-5 mb-8">
  <div class="col-lg-9">
    <div class="card card-bordered h-100">
      <div class="card-body d-flex flex-column justify-content-center py-10 px-7 px-lg-10">
        <span class="badge badge-light-primary align-self-start mb-4">FEU TECH · LOST AND FOUND SYSTEM</span>
        <h1 class="text-gray-900 fw-bold fs-2x mb-3">Welcome back, Catalina!</h1>
        <p class="text-gray-600 fs-6 mb-6">Recover your belongings, help a fellow Tamaraw, and keep the campus organized.</p>
        <div class="d-flex flex-wrap gap-3">
          <a href="<?= $LAF_BASE_URL ?>/manage/" class="btn btn-light-danger"><i class="bi bi-search me-2"></i>I Lost Something</a>
          <button type="button" class="btn btn-light-success" data-bs-toggle="modal" data-bs-target="#modalHowToSurrender"><i class="bi bi-check-circle me-2"></i>I Found Something</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card card-bordered h-100">
      <div class="card-body text-center d-flex flex-column align-items-center">
        <div class="symbol symbol-75px symbol-circle mb-4"><img src="<?= $LAF_BASE_URL ?>/assets/images/catalina.webp" alt="Catalina Smith"></div>
        <div class="fw-bold text-gray-900">Catalina Smith</div>
        <div class="text-muted fs-8 mb-5">Student · BSITBA</div>
        <div class="row g-3 w-100 mb-5">
          <div class="col-6"><div class="bg-light rounded p-3"><div class="fs-3 fw-bold text-primary">8</div><div class="text-muted fs-9">Items Reported</div></div></div>
          <div class="col-6"><div class="bg-light rounded p-3"><div class="fs-3 fw-bold text-success">8</div><div class="text-muted fs-9">Successful Returns</div></div></div>
        </div>
        <button type="button" class="btn btn-sm btn-primary w-100 mt-auto">View Full Profile</button>
      </div>
    </div>
  </div>
</div>

<div class="card card-bordered mb-8">
  <div class="card-header">
    <div class="card-title d-flex flex-column align-items-start">
      <h2 class="fs-3 fw-bold text-gray-900 mb-1">Recently Surrendered Items</h2>
      <span class="text-muted fs-7">Below are recently surrendered items that have not yet been claimed</span>
    </div>
    <div class="card-toolbar">
      <a href="<?= $LAF_BASE_URL ?>/view/unclaimed/" class="btn btn-sm btn-light-primary">View All</a>
    </div>
  </div>

  <div class="card-body">
    <div class="d-flex gap-3 mb-6">
      <select id="item-category" class="form-select form-select-solid w-250px">
        <option value="all">All Categories</option>
        <option value="Accessories">Accessories</option>
        <option value="Personal Essentials">Personal Essentials</option>
        <option value="Academic">Academic</option>
        <option value="Bags">Bags</option>
      </select>
      <div class="position-relative flex-grow-1">
        <i class="ki-duotone ki-magnifier fs-3 position-absolute top-50 translate-middle-y ms-4"><span class="path1"></span><span class="path2"></span></i>
        <input id="item-search" type="text" class="form-control form-control-solid ps-12" placeholder="Search items by name">
      </div>
    </div>

    <div id="item-list" class="d-flex flex-column gap-4">
      <?php foreach (array_slice($surrenderedItems, 0, 4) as $item): ?>
        <div class="card card-bordered item-row" data-name="<?= strtolower(htmlspecialchars($item['name'])) ?>" data-category="<?= htmlspecialchars($item['category']) ?>">
          <div class="card-body p-0 d-flex flex-column flex-md-row overflow-hidden">
            <img src="<?= htmlspecialchars($item['image']) ?>" class="w-150px h-175px object-fit-cover flex-shrink-0" alt="<?= htmlspecialchars($item['name']) ?>">
            <div class="p-5 flex-grow-1 d-flex flex-column">
              <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge badge-light-primary"><?= htmlspecialchars($item['category']) ?></span>
                <span class="badge badge-light-warning"><?= htmlspecialchars($item['status']) ?></span>
              </div>
              <a href="<?= $LAF_BASE_URL ?>/view/unclaimed/?id=<?= (int) $item['id'] ?>" class="text-gray-900 text-hover-primary fw-bold fs-5 mb-3"><?= htmlspecialchars($item['name']) ?></a>

              <div class="text-muted fs-7 mb-2 d-flex align-items-center gap-2">
                <i class="bi bi-geo-alt"></i>
                <?php if ((int) $item['id'] === 1): ?>
                  <span><?= htmlspecialchars($item['floor']) ?></span>
                <?php else: ?>
                  <span class="d-inline-block w-100px h-10px bg-gray-300 rounded"></span>
                <?php endif; ?>
              </div>
              <div class="text-muted fs-7 mb-2 d-flex align-items-center gap-2">
                <i class="bi bi-clock"></i>
                <?php if ((int) $item['id'] === 1): ?>
                  <span><?= htmlspecialchars($item['time']) ?></span>
                <?php else: ?>
                  <span class="d-inline-block w-75px h-10px bg-gray-300 rounded"></span>
                <?php endif; ?>
              </div>
              <div class="text-muted fs-7 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-person"></i>
                <?php if ((int) $item['id'] === 1): ?>
                  <span><?= htmlspecialchars($item['surrendered_by']) ?></span>
                <?php else: ?>
                  <span class="d-inline-block w-125px h-10px bg-gray-300 rounded"></span>
                <?php endif; ?>
              </div>
              <button type="button" class="btn btn-sm btn-light-primary w-100 mt-auto" data-bs-toggle="modal" data-bs-target="#modalHowToClaim">How to Claim</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="card card-bordered mb-8">
  <div class="card-body border-bottom p-7">
    <span class="badge badge-light-warning mb-6">HOW TO REPORT A LOST ITEM</span>
    <div class="row g-6">
      <?php
      $reportSteps = [
        ['Click “I Lost Something”', 'Fill in the item name, category, last known location, and identifying details.'],
        ['Your Report Goes Live', 'Your item appears on the Lost Items Board so the campus community can help.'],
        ['Get Notified When Found', 'A finder can choose “I Found This” and follow the surrender instructions.']
      ];
      foreach ($reportSteps as $index => $step):
      ?>
        <div class="col-md-4 text-center">
          <div class="symbol symbol-40px symbol-circle mb-3">
            <span class="symbol-label bg-primary text-white fw-bold"><?= $index + 1 ?></span>
          </div>
          <div class="fw-bold text-gray-900 mb-1"><?= htmlspecialchars($step[0]) ?></div>
          <div class="text-muted fs-8"><?= htmlspecialchars($step[1]) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="card-header">
    <div class="card-title d-flex flex-column align-items-start">
      <h2 class="fs-3 fw-bold text-gray-900 mb-1">Lost Items Board</h2>
      <span class="text-muted fs-7">Did you find one of these? Tap “I Found This” to help return it.</span>
    </div>
    <div class="card-toolbar">
      <a href="<?= $LAF_BASE_URL ?>/view/" class="btn btn-sm btn-light-primary">View All</a>
    </div>
  </div>

  <div class="card-body pt-2">
    <div class="d-flex flex-column gap-4">
      <?php foreach ($lostItems as $item): ?>
        <div class="card card-bordered overflow-hidden">
          <div class="card-body p-0 d-flex flex-column flex-md-row">
            <img src="<?= htmlspecialchars($item['image']) ?>" class="w-150px h-175px object-fit-cover flex-shrink-0" alt="<?= htmlspecialchars($item['name']) ?>">
            <div class="p-5 flex-grow-1 d-flex flex-column">
              <span class="badge badge-light-success align-self-start mb-3"><?= htmlspecialchars($item['category']) ?></span>
              <a href="<?= $LAF_BASE_URL ?>/view/?id=<?= (int) $item['id'] ?>" class="text-gray-900 text-hover-primary fw-bold fs-5 mb-2">
                <?= htmlspecialchars($item['name']) ?>
              </a>
              <div class="text-muted fs-7 mb-2"><i class="bi bi-geo-alt me-2"></i><?= htmlspecialchars($item['floor']) ?></div>
              <div class="text-muted fs-7 mb-2"><i class="bi bi-calendar3 me-2"></i><?= htmlspecialchars($item['date']) ?> · <?= htmlspecialchars($item['time']) ?></div>
              <div class="text-gray-600 fs-8 mb-4"><?= htmlspecialchars($item['description']) ?></div>
              <button type="button" class="btn btn-sm btn-light-success w-100 mt-auto" data-bs-toggle="modal" data-bs-target="#modalHowToSurrender">I Found This!</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php
$featuredUsers = [
  ['initials' => 'JC', 'name' => 'Jenny B. Calot', 'course' => 'BSCS · 3rd Year', 'count' => 4, 'color' => 'primary'],
  ['initials' => 'KD', 'name' => 'Kristin V. Dy', 'course' => 'BST · 2nd Year', 'count' => 3, 'color' => 'success'],
  ['initials' => 'MR', 'name' => 'Marco R. Santos', 'course' => 'BSECE · 4th Year', 'count' => 2, 'color' => 'warning']
];
$claimedItems = array_values(array_filter($surrenderedItems, function ($item) { return $item['status'] === 'Claimed'; }));
?>

<div class="card card-bordered mb-8">
  <div class="card-header">
    <div class="card-title d-flex flex-column align-items-start">
      <h2 class="fs-3 fw-bold text-gray-900 mb-1">Featured Users</h2>
      <span class="text-muted fs-7">Top individuals helping our Lost and Found community</span>
    </div>
  </div>
  <div class="card-body">
    <div class="row g-5">
      <?php foreach ($featuredUsers as $user): ?>
        <div class="col-md-4">
          <div class="card card-bordered h-100">
            <div class="card-body text-center d-flex flex-column align-items-center">
              <div class="symbol symbol-60px symbol-circle mb-4">
                <span class="symbol-label bg-light-<?= $user['color'] ?> text-<?= $user['color'] ?> fw-bold fs-3"><?= htmlspecialchars($user['initials']) ?></span>
              </div>
              <div class="fw-bold text-gray-900 fs-5 mb-1"><?= htmlspecialchars($user['name']) ?></div>
              <div class="text-muted fs-8 mb-4"><?= htmlspecialchars($user['course']) ?></div>
              <div class="text-gray-600 fs-7 mb-5">Surrendered <strong><?= (int) $user['count'] ?> items</strong></div>
              <button type="button" class="btn btn-sm btn-light-primary w-100 mt-auto">View Profile</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="card card-bordered mb-8">
  <div class="card-header">
    <div class="card-title d-flex flex-column align-items-start">
      <h2 class="fs-3 fw-bold text-gray-900 mb-1">Recently Claimed Items</h2>
      <span class="text-muted fs-7">Recently returned items from the Lost and Found</span>
    </div>
    <div class="card-toolbar">
      <a href="<?= $LAF_BASE_URL ?>/view/claimed/" class="btn btn-sm btn-light-primary">View All</a>
    </div>
  </div>
  <div class="card-body">
    <div class="row g-5">
      <?php foreach ($claimedItems as $item): ?>
        <div class="col-md-4">
          <a href="<?= $LAF_BASE_URL ?>/view/claimed/?id=<?= (int) $item['id'] ?>" class="card card-bordered h-100 text-gray-800 text-hover-primary overflow-hidden">
            <div class="card-body p-0 d-flex">
              <img src="<?= htmlspecialchars($item['image']) ?>" class="w-100px h-125px object-fit-cover flex-shrink-0" alt="<?= htmlspecialchars($item['name']) ?>">
              <div class="p-4">
                <span class="badge badge-light-success mb-2">Claimed</span>
                <div class="fw-bold mb-2"><?= htmlspecialchars($item['name']) ?></div>
                <div class="text-muted fs-8 mb-1"><i class="bi bi-geo-alt me-1"></i><?= htmlspecialchars($item['floor']) ?></div>
                <div class="text-muted fs-8"><i class="bi bi-person-check me-1"></i><?= htmlspecialchars($item['claimed_by']) ?></div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php include(__DIR__ . '/includes/_modals.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var search = document.getElementById('item-search');
  var category = document.getElementById('item-category');

  function filterItems() {
    var query = search.value.toLowerCase().trim();
    var selected = category.value;

    document.querySelectorAll('.item-row').forEach(function (row) {
      var matchesName = row.dataset.name.includes(query);
      var matchesCategory = selected === 'all' || row.dataset.category === selected;
      row.classList.toggle('d-none', !matchesName || !matchesCategory);
    });
  }

  search.addEventListener('input', filterItems);
  category.addEventListener('change', filterItems);
});
</script>
