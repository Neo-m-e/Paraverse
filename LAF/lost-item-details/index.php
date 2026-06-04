<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');

$META_TITLE = "Lost Item Details · Lost and Found";
$META_DESC  = "View details of reported lost items in FEU Tech.";

$item_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$all_items = LAF_GET_LOST_ITEMS();

$item = isset($all_items[$item_id]) ? $all_items[$item_id] : $all_items[101];
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
                <?php include('index-inc-lost-item-details.php'); ?>
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
