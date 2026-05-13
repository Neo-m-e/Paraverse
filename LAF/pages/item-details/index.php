<?php
define('MBG', TRUE);
include('../../functions-new.php');
//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Item Details · Lost and Found";
$item_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

/* Simulated item lookup by ID — in production replace with DB query */
$all_items = [
  1 => ['id'=>1,'name'=>'Goojodoq (Handfan)','category'=>'Accessories','icon'=>'💨','image_url'=>'','date_found'=>'May 3, 2026','time_found'=>'10:00 AM','floor'=>'2nd Floor, Lobby','currently_at'=>'Discipline Unit · 15th Floor, Room 1501','surrendered_by'=>'Jenny B. Calot','claimed_by'=>'—','released_by'=>'—','received_by'=>'—','status'=>'Unclaimed'],
  2 => ['id'=>2,'name'=>'Umbrella','category'=>'Personal Essentials','icon'=>'☂️','image_url'=>'','date_found'=>'May 2, 2026','time_found'=>'2:00 PM','floor'=>'4th Floor, Study Area','currently_at'=>'Discipline Unit · 15th Floor, Room 1501','surrendered_by'=>'Marco R. Santos','claimed_by'=>'—','released_by'=>'—','received_by'=>'—','status'=>'Unclaimed'],
  3 => ['id'=>3,'name'=>'Calculator','category'=>'Academic','icon'=>'🧮','image_url'=>'','date_found'=>'May 4, 2026','time_found'=>'8:30 AM','floor'=>'6th Floor, Room 605','currently_at'=>'Discipline Unit · 15th Floor, Room 1501','surrendered_by'=>'Kristin V. Dy','claimed_by'=>'—','released_by'=>'—','received_by'=>'—','status'=>'Unclaimed'],
  4 => ['id'=>4,'name'=>'Blue Backpack','category'=>'Bags','icon'=>'🎒','image_url'=>'','date_found'=>'May 1, 2026','time_found'=>'12:30 PM','floor'=>'14th Floor, Library','currently_at'=>'Discipline Unit · 15th Floor, Room 1501','surrendered_by'=>'Marco R. Santos','claimed_by'=>'Jenny B. Calot','released_by'=>'Yvette G. Supnet','received_by'=>'Yvette G. Supnet','status'=>'Unclaimed'],
];

$item = isset($all_items[$item_id]) ? $all_items[$item_id] : $all_items[1];
$is_unclaimed = ($item['status'] === 'Unclaimed');
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
              <div class="app-container container-xxl" data-item-id="<?= (int)$item['id'] ?>">

                <div class="row g-5 align-items-start mt-4 mb-8">

                  <!-- LEFT PANEL -->
                  <div class="col-lg-5">
                    <a href="javascript:history.back()" class="btn-go-back mb-4 d-inline-flex">
                      <i class="bi bi-arrow-left me-1"></i> Not my item, go back
                    </a>
                    <div class="laf-detail-panel">
                      <div class="laf-detail-image-wrap mb-3">
                        <?php if (!empty($item['image_url'])): ?>
                          <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="max-height:160px;border-radius:10px;object-fit:contain;">
                        <?php else: ?>
                          <span style="font-size:5rem;"><?= $item['icon'] ?></span>
                        <?php endif; ?>
                      </div>
                      <div class="laf-detail-category">Category: <?= htmlspecialchars($item['category']) ?></div>

                      <?php if ($is_unclaimed): ?>
                        <button class="btn-this-is-mine mb-3" id="btn-this-is-mine">This is Mine — 🏢 How to Claim</button>
                      <?php else: ?>
                        <button class="btn-this-is-mine mb-3" disabled style="opacity:.5;cursor:not-allowed;">✅ Item Already Claimed</button>
                      <?php endif; ?>

                      <div class="laf-privacy-block">
                        <span>🛡️</span>
                        <span><strong>Privacy Protected:</strong> The photo, exact contact info, and pickup coordinates are only revealed to the <em>verified owner</em> after passing a security check.</span>
                      </div>
                    </div>
                  </div>

                  <!-- RIGHT PANEL -->
                  <div class="col-lg-7">
                    <h2 class="fw-bold mb-4" style="font-size:1.6rem;">Item Details 🔍</h2>

                    <!-- Date / Time / Floor -->
                    <div class="laf-info-block">
                      <div class="laf-info-grid">
                        <div>
                          <div class="info-label">📅 Date Found</div>
                          <div class="info-value d-flex align-items-center gap-2">
                            <span class="laf-field-value" id="val-date"><?= $is_unclaimed ? '●●●●●●●●' : htmlspecialchars($item['date_found']) ?></span>
                            <?php if ($is_unclaimed): ?>
                              <button class="btn-eye" data-target="val-date" data-field="date" data-real="<?= htmlspecialchars($item['date_found']) ?>" title="Toggle visibility">
                                <i class="bi bi-eye-slash"></i>
                              </button>
                            <?php endif; ?>
                          </div>
                        </div>
                        <div>
                          <div class="info-label">🕐 Time Found</div>
                          <div class="info-value d-flex align-items-center gap-2">
                            <span class="laf-field-value" id="val-time"><?= $is_unclaimed ? '●●:●●' : htmlspecialchars($item['time_found']) ?></span>
                            <?php if ($is_unclaimed): ?>
                              <button class="btn-eye" data-target="val-time" data-field="time" data-real="<?= htmlspecialchars($item['time_found']) ?>" title="Toggle visibility">
                                <i class="bi bi-eye-slash"></i>
                              </button>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                      <div class="mt-3">
                        <div class="info-label">📍 Floor / Area</div>
                        <div class="info-value d-flex align-items-center gap-2">
                          <span class="laf-field-value" id="val-floor"><?= $is_unclaimed ? '●●● ●●●●●, ●●●●●●●' : htmlspecialchars($item['floor']) ?></span>
                          <?php if ($is_unclaimed): ?>
                            <button class="btn-eye" data-target="val-floor" data-field="floor" data-real="<?= htmlspecialchars($item['floor']) ?>" title="Toggle visibility">
                              <i class="bi bi-eye-slash"></i>
                            </button>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <!-- Currently At -->
                    <div class="laf-info-block">
                      <div class="info-label">🏢 Item Is Currently At</div>
                      <div class="info-value">🏢 <?= htmlspecialchars($item['currently_at']) ?></div>
                    </div>

                    <!-- People -->
                    <div class="laf-info-block">
                      <div class="laf-info-grid mb-3">
                        <div>
                          <div class="info-label">👤 Surrendered By</div>
                          <div class="info-value d-flex align-items-center gap-2">
                            <span class="laf-field-value" id="val-surrendered"><?= $is_unclaimed ? '●●●●● ●. ●●●●●●' : htmlspecialchars($item['surrendered_by']) ?></span>
                            <?php if ($is_unclaimed): ?>
                              <button class="btn-eye" data-target="val-surrendered" data-field="surrendered_by" data-real="<?= htmlspecialchars($item['surrendered_by']) ?>" title="Toggle visibility">
                                <i class="bi bi-eye-slash"></i>
                              </button>
                            <?php endif; ?>
                          </div>
                        </div>
                        <div>
                          <div class="info-label">👤 Claimed By</div>
                          <div class="info-value"><?= htmlspecialchars($item['claimed_by']) ?></div>
                        </div>
                      </div>
                      <div class="laf-info-grid">
                        <div>
                          <div class="info-label">👤 Released By</div>
                          <div class="info-value"><?= htmlspecialchars($item['released_by']) ?></div>
                        </div>
                        <div>
                          <div class="info-label">👤 Received By</div>
                          <div class="info-value"><?= htmlspecialchars($item['received_by']) ?></div>
                        </div>
                      </div>
                    </div>

                    <?php if ($is_unclaimed): ?>
                      <div class="laf-privacy-notice-box">
                        <i class="bi bi-eye-slash me-2"></i>
                        Some details are hidden to protect privacy. Click the <strong>👁️</strong> eye icons to reveal them.
                      </div>
                    <?php endif; ?>
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
