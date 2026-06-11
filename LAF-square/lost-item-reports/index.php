<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');

$META_TITLE = "Lost Item Reports · Lost and Found";
$META_DESC  = "View and manage your filed lost item reports in FEU Tech.";

// Mock logged-in user
$user_name = 'Catalina Smith';
$user_id   = 'T202210292';

$reports = [
  [
    'report_id'   => 'RPT-2604-0001',
    'item_name'   => 'Black Adidas Backpack',
    'category'    => 'bags',
    'description' => 'Black bag with yellow duck keychain, 15" laptop compartment.',
    'location'    => '11th Floor · Study Area',
    'date_filed'  => '2024-06-20',
    'status'      => 'not-found',
  ],
  [
    'report_id'   => 'RPT-2604-0002',
    'item_name'   => 'iPhone 13 (Black)',
    'category'    => 'electronics',
    'description' => 'Black iPhone 13, cracked lower-left corner.',
    'location'    => '14th Floor · Library',
    'date_filed'  => '2024-06-18',
    'status'      => 'found',
  ],
  [
    'report_id'   => 'RPT-2604-0003',
    'item_name'   => 'FEU Tech ID',
    'category'    => 'id-cards',
    'description' => 'Student ID, laminated.',
    'location'    => '8th Floor · Canteen',
    'date_filed'  => '2024-06-15',
    'status'      => 'not-found',
  ],
];

$status_labels = [
  'found'     => ['label' => 'Found',     'class' => 'badge-found'],
  'not-found' => ['label' => 'Not Found', 'class' => 'badge-not-found'],
  'pending'   => ['label' => 'Pending',   'class' => 'badge-pending'],
];

$category_labels = [
  'bags'        => 'Bags',
  'accessories' => 'Accessories',
  'academic'    => 'Academic',
  'essentials'  => 'Personal Essentials',
  'electronics' => 'Electronics',
  'id-cards'    => 'ID / Cards',
  'clothing'    => 'Clothing',
  'others'      => 'Others',
];

$cat_badge_class = [
  'bags'        => 'badge-bags',
  'accessories' => 'badge-accessories',
  'academic'    => 'badge-academic',
  'electronics' => 'badge-electronics',
  'essentials'  => 'badge-essentials',
  'id-cards'    => 'badge-essentials',
  'clothing'    => 'badge-essentials',
  'others'      => 'badge-essentials',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="../assets/css/lost-and-found.css" rel="stylesheet">
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" data-kt-app-header-fixed="true"
  data-kt-app-header-fixed-mobile="true" class="app-default">
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_page-loader.php'); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div id="kt_app_content" class="flex-column-fluid">
                <?php include('index-inc-lost-item-reports.php'); ?>
              </div>
            </main>
          </div>
          <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_scrolltop.php'); ?>
  <script src="../assets/js/lost-and-found.js"></script>
</body>
</html>
