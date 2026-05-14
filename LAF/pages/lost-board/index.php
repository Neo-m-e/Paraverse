<?php
define('MBG', TRUE);
include('../../functions-new.php');
$META_TITLE = "Lost Items Board · Lost and Found";

$items = [
  ['id' => 101, 'name' => 'Black Backpack', 'category' => 'Bags', 'category_class' => 'badge-bags', 'icon' => '🎒', 'floor' => '14th Floor, Library', 'date' => 'May 3, 2026', 'time' => '2:30 PM', 'status' => 'not-found', 'description' => 'Adidas bag, yellow duck keychain, initials "R.T." written inside. Black straps, minor scuff on the front pocket.'],
  ['id' => 102, 'name' => 'Casio Calculator (FX-991)', 'category' => 'Academic', 'category_class' => 'badge-academic', 'icon' => '🧮', 'floor' => '6th Floor, Room 605', 'date' => 'May 2, 2026', 'time' => '10:00 PM', 'status' => 'not-found', 'description' => 'Has protective case, sticker of a mushroom on the back.'],
  ['id' => 103, 'name' => 'Blue Water Bottle', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'icon' => '🍶', 'floor' => '5th Floor, Study Area', 'date' => 'May 4, 2026', 'time' => '6:30 AM', 'status' => 'not-found', 'description' => 'Hydro Flask, blue, dented on bottom-left, has a FEU Tech sticker.'],
  ['id' => 104, 'name' => 'AirPods (2nd Gen)', 'category' => 'Electronics', 'category_class' => 'badge-electronics', 'icon' => '🎧', 'floor' => '2nd Floor, Student Plaza', 'date' => 'May 1, 2026', 'time' => '12:30 PM', 'status' => 'not-found', 'description' => 'White case with a small crack on the hinge, black dot drawn on the lid.'],
  ['id' => 105, 'name' => 'Umbrella', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'icon' => '☂️', 'floor' => '8th Floor, Corridor', 'date' => 'Apr 30, 2026', 'time' => '4:00 PM', 'status' => 'not-found', 'description' => 'Navy blue collapsible umbrella, has a small tag with name "J. Reyes" written.'],
  ['id' => 106, 'name' => 'Student ID', 'category' => 'Others', 'category_class' => 'badge-others', 'icon' => '🪪', 'floor' => 'Ground Floor, Entrance', 'date' => 'Apr 28, 2026', 'time' => '8:00 AM', 'status' => 'not-found', 'description' => 'FEU Tech ID, photo visible, name partially visible. Laminated card.'],
];

$categories = ['All Categories', 'Academic', 'Electronics', 'Bags', 'Accessories', 'Clothing', 'Wallets', 'Documents', 'Personal Essentials', 'Others'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/css/lost-and-found.css" rel="stylesheet">
  <link href="../../assets/css/sec-lost-board.css" rel="stylesheet">
  <link href="../../assets/css/sec-modals.css" rel="stylesheet">
  <style>
  </style>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include('../../partials/_page-loader.php'); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include('../../partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">

                <div class="d-flex align-items-center gap-3 mb-4 mt-5">
                  <a href="../../index.php" class="btn-go-back"><i class="bi bi-arrow-left"></i></a>
                  <h2 class="mb-0 fw-bold" style="font-size:1.5rem;">🔍 Lost Items Board</h2>
                  <span class="badge-count" id="board-count"><?= count($items) ?> items</span>
                </div>

                <!-- Search + category + Metronic filter row -->
                <div class="mb-4">
                  <div class="laf-search-wrap">
                    <select id="search-category">
                      <?php foreach ($categories as $cat): ?>
                        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="laf-search-divider"></div>
                    <input type="text" id="search-input" placeholder="Search by name, location..." autocomplete="off">
                    <button class="laf-search-btn" type="button" aria-label="Search">🔍</button>
                  </div>
                </div>

                <!-- Grid -->
                <div class="laf-grid laf-grid-4" id="items-grid">
                  <?php foreach ($items as $item): ?>
                    <div class="laf-lost-card laf-card-clickable"
                      data-name="<?= strtolower(htmlspecialchars($item['name'])) ?>"
                      data-floor="<?= strtolower(htmlspecialchars($item['floor'])) ?>"
                      data-category="<?= htmlspecialchars($item['category']) ?>"
                      onclick="window.location.href='../lost-item-details/index.php?id=<?= (int)$item['id'] ?>'">

                      <!-- Category badge -->
                      <div class="mb-2">
                        <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>">
                          <?= htmlspecialchars($item['category']) ?>
                        </span>
                      </div>

                      <div class="lost-icon-wrap"><?= $item['icon'] ?></div>
                      <div class="lost-title"><?= htmlspecialchars($item['name']) ?></div>
                      <div class="lost-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
                      <div class="lost-meta">📅 <?= htmlspecialchars($item['date']) ?> &nbsp;🕐 <?= htmlspecialchars($item['time']) ?></div>
                      <div class="lost-desc"><?= htmlspecialchars($item['description']) ?></div>

                      <button class="btn-i-found" data-item-id="<?= (int)$item['id'] ?>"
                        onclick="event.stopPropagation();">I Found This! 🙋</button>
                    </div>
                  <?php endforeach; ?>
                </div>

                <!-- If no item found -->
                <div id="board-empty-state" style="display:none;text-align:center;padding:48px 0;">
                  <div style="font-size:3rem;margin-bottom:12px;">🔍</div>
                  <p class="text-muted">No items match your search.</p>
                </div>

              </div>
            </main>
          </div>
          <?php include('../../partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include('../../partials/_scrolltop.php'); ?>
  <?php include('../../partials/_modals.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/lost-and-found.js"></script>
  <script>
    function applyBoardFilters() {
      var search = document.getElementById('search-input').value.toLowerCase().trim();
      var cat = document.getElementById('search-category').value;
      var allCat = cat === 'All Categories';
      var cards = document.querySelectorAll('#items-grid .laf-lost-card');
      var visible = 0;

      cards.forEach(function(card) {
        var nameMatch = !search || card.dataset.name.includes(search) || card.dataset.floor.includes(search);
        var catMatch = allCat || card.dataset.category === cat;
        var show = nameMatch && catMatch;
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });

      document.getElementById('board-count').textContent = visible + ' item' + (visible !== 1 ? 's' : '');
      document.getElementById('board-empty-state').style.display = visible === 0 ? '' : 'none';
    }

    document.getElementById('search-input').addEventListener('input', applyBoardFilters);
    document.getElementById('search-category').addEventListener('change', applyBoardFilters);
    document.querySelector('.laf-search-btn').addEventListener('click', applyBoardFilters);
  </script>
</body>

</html>