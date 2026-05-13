<?php
define('MBG', TRUE);
include('../../functions-new.php');
$META_TITLE = "All Surrendered Items · Lost and Found";

$items = [
  ['id'=>1,'name'=>'Goojodoq (Handfan)','category'=>'Accessories','category_class'=>'badge-accessories','cat_key'=>'cat-accessories','icon'=>'💨','floor'=>'2nd Floor, Lobby','date'=>'May 3, 2026','time'=>'10:00 AM','status'=>'Unclaimed'],
  ['id'=>2,'name'=>'Umbrella','category'=>'Personal Essentials','category_class'=>'badge-essentials','cat_key'=>'cat-essentials','icon'=>'☂️','floor'=>'4th Floor, Study Area','date'=>'May 2, 2026','time'=>'2:00 PM','status'=>'Unclaimed'],
  ['id'=>3,'name'=>'Calculator','category'=>'Academic','category_class'=>'badge-academic','cat_key'=>'cat-academic','icon'=>'🧮','floor'=>'6th Floor, Room 605','date'=>'May 4, 2026','time'=>'8:30 AM','status'=>'Unclaimed'],
  ['id'=>4,'name'=>'Blue Backpack','category'=>'Bags','category_class'=>'badge-bags','cat_key'=>'cat-bags','icon'=>'🎒','floor'=>'14th Floor, Library','date'=>'May 1, 2026','time'=>'12:30 PM','status'=>'Unclaimed'],
  ['id'=>5,'name'=>'Keys','category'=>'Personal Essentials','category_class'=>'badge-essentials','cat_key'=>'cat-essentials','icon'=>'🔑','floor'=>'1st Floor, Parking','date'=>'Apr 30, 2026','time'=>'9:00 AM','status'=>'Unclaimed'],
  ['id'=>6,'name'=>'Eyeglasses','category'=>'Accessories','category_class'=>'badge-accessories','cat_key'=>'cat-accessories','icon'=>'🕶️','floor'=>'3rd Floor, Library','date'=>'Apr 28, 2026','time'=>'3:00 PM','status'=>'Unclaimed'],
  ['id'=>7,'name'=>'Smartphone','category'=>'Electronics','category_class'=>'badge-electronics','cat_key'=>'cat-electronics','icon'=>'📱','floor'=>'5th Floor, Study Area','date'=>'Apr 27, 2026','time'=>'11:00 AM','status'=>'Unclaimed'],
  ['id'=>8,'name'=>'Water Bottle','category'=>'Personal Essentials','category_class'=>'badge-essentials','cat_key'=>'cat-essentials','icon'=>'🍶','floor'=>'7th Floor, Canteen','date'=>'Apr 26, 2026','time'=>'12:00 PM','status'=>'Unclaimed'],
  ['id'=>9,'name'=>'Papers','category'=>'Documents','category_class'=>'badge-documents','cat_key'=>'cat-documents','icon'=>'📑','floor'=>'7th Floor, Canteen','date'=>'Apr 26, 2026','time'=>'12:00 PM','status'=>'Unclaimed'],
  ['id'=>10,'name'=>'wallet','category'=>'Wallets','category_class'=>'badge-wallets','cat_key'=>'cat-wallets','icon'=>'👛','floor'=>'7th Floor, Canteen','date'=>'Apr 26, 2026','time'=>'12:00 PM','status'=>'Unclaimed'],
  ['id'=>11,'name'=>'Water Bottle','category'=>'Personal Essentials','category_class'=>'badge-essentials','cat_key'=>'cat-essentials','icon'=>'🍶','floor'=>'7th Floor, Canteen','date'=>'Apr 26, 2026','time'=>'12:00 PM','status'=>'Unclaimed'],

];
$categories = ['All Categories', 'Academic', 'Electronics', 'Bags', 'Accessories','Clothing','Wallets','Documents','Personal Essentials', 'Others'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/css/lost-and-found.css" rel="stylesheet">
  <link href="../../assets/css/sec-surrendered.css" rel="stylesheet">
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
                  <h2 class="mb-0 fw-bold" style="font-size:1.5rem;">All Surrendered Items</h2>
                  <span class="badge-count"><?= count($items) ?> items</span>
                </div>

                <!-- Search -->
                <div class="laf-search-wrap">
                  <select id="search-category">
                    <?php foreach ($categories as $cat): ?>
                      <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="laf-search-divider"></div>
                  <input type="text" id="search-input" placeholder="Search items by name, location..." autocomplete="off">
                  <button class="laf-search-btn" type="button" aria-label="Search">🔍</button>
                </div>

                <div class="laf-grid laf-grid-4" id="items-grid">
                  <?php foreach ($items as $item): ?>
                  <div class="laf-item-card laf-card-clickable <?= htmlspecialchars($item['cat_key']) ?>" onclick="window.location.href='../item-details/index.php?id=<?= (int)$item['id'] ?>'">
                    <div class="item-card-top">
                      <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>"><?= htmlspecialchars($item['category']) ?></span>
                      <span class="badge-laf-unclaimed <?= $item['status']==='Claimed' ? 'badge-laf-claimed-sm' : '' ?>"><?= htmlspecialchars($item['status']) ?></span>
                    </div>
                    <div class="item-icon-wrap"><?= $item['icon'] ?></div>
                    <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
                    <div class="item-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
                    <div class="item-meta">📅 <?= htmlspecialchars($item['date']) ?> &nbsp;🕐 <?= htmlspecialchars($item['time']) ?></div>
                    <button class="btn-how-to-claim mt-2" onclick="event.stopPropagation();">🏢 How to Claim</button>
                  </div>
                  <?php endforeach; ?>
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
  <script src="../../assets/js/sec-surrendered.js"></script>
</body>
</html>
