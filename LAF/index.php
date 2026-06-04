<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Lost and Found · FEU Tech";
$META_DESC = "Official Lost and Found portal of FEU Tech.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="assets/css/lost-and-found.css" rel="stylesheet">
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include("partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include("partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">
                <?php include("includes/sec-hero.php"); ?>
                <?php include("includes/sec-surrendered.php"); ?>
                <?php include("includes/sec-lost-board.php"); ?>
                <?php include("includes/sec-users-claimed.php"); ?>
                <?php include("partials/_modals.php"); ?>
              </div>
            </main>
          </div>
          <?php include("partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("partials/_scrolltop.php"); ?>
  <script src="assets/js/lost-and-found.js"></script>
</body>

</html>