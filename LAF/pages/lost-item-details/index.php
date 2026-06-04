<?php
define('MBG', TRUE);
include('../../functions-new.php');
//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Lost Item Details · Lost and Found";
$item_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$all_items = [
  101 => ['id'=>101,'name'=>'Black Backpack','category'=>'Bags','icon'=>'🎒','image_url'=>'','date_last_seen'=>'May 3, 2026','time_last_seen'=>'2:30 PM','floor'=>'14th Floor, Library','lost_by'=>'Marco R. Santos','course'=>'BSITBA – 2nd Year','description'=>'Adidas bag, has a small keychain of a yellow duck attached to the zipper, initials "R.T." written inside with marker. Black straps, minor scuff on the front pocket.','additional_context'=>'I was at the study tables near the window during a group session'],
  102 => ['id'=>102,'name'=>'Casio Calculator (FX-991)','category'=>'Academic','icon'=>'🧮','image_url'=>'','date_last_seen'=>'May 2, 2026','time_last_seen'=>'10:00 PM','floor'=>'6th Floor, Room 605','lost_by'=>'Dana P. Reyes','course'=>'BSCS – 3rd Year','description'=>'Has protective case, sticker of a mushroom on the back.','additional_context'=>''],
  103 => ['id'=>103,'name'=>'Blue Water Bottle','category'=>'Personal Essentials','icon'=>'🍶','image_url'=>'','date_last_seen'=>'May 4, 2026','time_last_seen'=>'6:30 AM','floor'=>'5th Floor, Study Area','lost_by'=>'Kristin V. Dy','course'=>'BST – 2nd Year','description'=>'Hydro Flask, blue, dented on bottom-left, has a FEU Tech sticker.','additional_context'=>''],
  104 => ['id'=>104,'name'=>'AirPods (2nd Gen)','category'=>'Electronics','icon'=>'🎧','image_url'=>'','date_last_seen'=>'May 1, 2026','time_last_seen'=>'12:30 PM','floor'=>'2nd Floor, Student Plaza','lost_by'=>'Roel M. Tan','course'=>'BSECE – 4th Year','description'=>'White case with a small crack on the hinge, black dot drawn on the lid.','additional_context'=>''],
];

$item = isset($all_items[$item_id]) ? $all_items[$item_id] : $all_items[101];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/css/lost-and-found.css" rel="stylesheet">
  <link href="../../assets/css/sec-modals.css" rel="stylesheet">
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

                <div class="row g-5 align-items-start mt-4 mb-8">

                  <!-- LEFT PANEL -->
                  <div class="col-lg-5">
                    <a href="javascript:history.back()" class="btn-go-back mb-4 d-inline-flex">
                      <i class="bi bi-arrow-left me-1"></i> Not the item I found, go back
                    </a>
                    <div class="laf-detail-panel-lost">
                      <div class="laf-detail-image-wrap mb-3" style="background:#fff0ee;">
                        <?php if (!empty($item['image_url'])): ?>
                          <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="max-height:160px;border-radius:10px;object-fit:contain;">
                        <?php else: ?>
                          <span style="font-size:5rem;"><?= $item['icon'] ?></span>
                        <?php endif; ?>
                      </div>
                      <div class="laf-detail-category laf-detail-category-lost mb-4">
                        Category: <?= htmlspecialchars($item['category']) ?>
                      </div>
                      <button class="btn-i-found-detail mb-3" id="btn-i-found-detail">I Found This! 🙋</button>
                      <div class="laf-privacy-block">
                        <span>🛡️</span>
                        <span><strong>Privacy Protected:</strong> The photo, exact contact info, and pickup coordinates are only revealed to the <em>verified owner</em> after passing a security check.</span>
                      </div>
                    </div>
                  </div>

                  <!-- RIGHT PANEL -->
                  <div class="col-lg-7">
                    <h2 class="fw-bold mb-4" style="font-size:1.6rem;">Lost Item Details 🔍</h2>

                    <div class="laf-info-block">
                      <div class="laf-info-grid">
                        <div>
                          <div class="info-label">📅 Date Last Seen</div>
                          <div class="info-value"><?= htmlspecialchars($item['date_last_seen']) ?></div>
                        </div>
                        <div>
                          <div class="info-label">🕐 Time Last Seen</div>
                          <div class="info-value"><?= htmlspecialchars($item['time_last_seen']) ?></div>
                        </div>
                      </div>
                      <div class="mt-3">
                        <div class="info-label">📍 Floor / Area Last Seen</div>
                        <div class="info-value"><?= htmlspecialchars($item['floor']) ?></div>
                      </div>
                    </div>

                    <div class="laf-info-block">
                      <div class="laf-info-grid">
                        <div>
                          <div class="info-label">👤 Lost By</div>
                          <div class="info-value"><?= htmlspecialchars($item['lost_by']) ?></div>
                        </div>
                        <div>
                          <div class="info-label">🎓 Course</div>
                          <div class="info-value"><?= htmlspecialchars($item['course']) ?></div>
                        </div>
                      </div>
                    </div>

                    <div class="laf-info-block">
                      <div class="info-label mb-2">Item Description</div>
                      <p class="mb-4" style="font-size:.88rem;color:var(--laf-text);"><?= htmlspecialchars($item['description']) ?></p>
                      <?php if (!empty($item['additional_context'])): ?>
                        <div class="info-label mb-2">Additional Context</div>
                        <blockquote class="border-start border-3 ps-4 mb-0" style="border-color:var(--laf-red) !important;">
                          <p class="mb-0 fst-italic" style="font-size:.88rem;color:var(--laf-text);"><?= htmlspecialchars($item['additional_context']) ?></p>
                        </blockquote>
                      <?php endif; ?>
                    </div>
                  </div>

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
</body>
</html>
