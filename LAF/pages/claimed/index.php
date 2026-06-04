<?php
define('MBG', TRUE);
include('../../functions-new.php');
$META_TITLE = "Claimed Items · Lost and Found";

$items = [
  ['id'=>4,'name'=>'Blue Backpack','icon'=>'🎒','category'=>'Bags','floor'=>'14th Floor, Library','claimed_by'=>'Jenny B. Calot','date_claimed'=>'May 5, 2026'],
  ['id'=>5,'name'=>'Keys','icon'=>'🔑','category'=>'Personal Essentials','floor'=>'1st Floor, Parking','claimed_by'=>'Kristin V. Dy','date_claimed'=>'May 4, 2026'],
  ['id'=>6,'name'=>'Eyeglasses','icon'=>'🕶️','category'=>'Accessories','floor'=>'3rd Floor, Library','claimed_by'=>'Roel M. Tan','date_claimed'=>'May 3, 2026'],
  ['id'=>7,'name'=>'Smartphone','icon'=>'📱','category'=>'Electronics','floor'=>'5th Floor, Study Area','claimed_by'=>'Dana P. Reyes','date_claimed'=>'May 2, 2026'],
  ['id'=>8,'name'=>'Notebook','icon'=>'📓','category'=>'Academic','floor'=>'9th Floor, Classroom','claimed_by'=>'Marco R. Santos','date_claimed'=>'May 1, 2026'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/css/lost-and-found.css" rel="stylesheet">
  <link href="../../assets/css/sec-users-claimed.css" rel="stylesheet">
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

                <div class="d-flex align-items-center gap-3 mb-4 mt-5">
                  <a href="../../index.php" class="btn-go-back"><i class="bi bi-arrow-left"></i></a>
                  <h2 class="mb-0 fw-bold" style="font-size:1.5rem;">Recently Claimed Items ✅</h2>
                  <span class="badge-count"><?= count($items) ?> items</span>
                </div>

                <div class="laf-card">
                  <div class="laf-card-body">
                    <div class="laf-grid laf-grid-3">
                      <?php foreach ($items as $item): ?>
                      <div class="laf-claimed-card">
                        <div class="claimed-icon-wrap"><?= $item['icon'] ?></div>
                        <div style="flex:1;">
                          <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                            <span class="claimed-name"><?= htmlspecialchars($item['name']) ?></span>
                            <span class="badge-laf-claimed">Claimed</span>
                          </div>
                          <div class="claimed-meta">📂 <?= htmlspecialchars($item['category']) ?></div>
                          <div class="claimed-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
                          <div class="claimed-meta">👤 Claimed By: <?= htmlspecialchars($item['claimed_by']) ?></div>
                          <div class="claimed-meta">📅 <?= htmlspecialchars($item['date_claimed']) ?></div>
                        </div>
                      </div>
                      <?php endforeach; ?>
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
  <script src="../../assets/js/sec-users-claimed.js"></script>
</body>
</html>
