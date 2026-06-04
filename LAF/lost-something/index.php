<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');

$META_TITLE = "I Lost Something · Lost and Found";
$META_DESC  = "File a report for a lost item in FEU Tech.";

$reporter_name = 'Roel M. Tan';
$categories = [
  ''            => 'Select a category',
  'bags'        => 'Bags',
  'accessories' => 'Accessories',
  'academic'    => 'Academic',
  'essentials'  => 'Personal Essentials',
  'electronics' => 'Electronics',
  'id-cards'    => 'ID / Cards',
  'clothing'    => 'Clothing',
  'others'      => 'Others',
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
  <span id="reporter-name" style="display:none;"><?= htmlspecialchars($reporter_name) ?></span>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div id="kt_app_content" class="flex-column-fluid">
                <?php include('index-inc-lost-something.php'); ?>
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
