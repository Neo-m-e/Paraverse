<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Lost and Found · FEU Tech";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <script src="/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/lost-and-found.css" rel="stylesheet">
  <link href="assets/css/sec-hero.css" rel="stylesheet">
  <link href="assets/css/sec-surrendered.css" rel="stylesheet">
  <link href="assets/css/sec-lost-board.css" rel="stylesheet">
  <link href="assets/css/sec-users-claimed.css" rel="stylesheet">
  <link href="assets/css/sec-modals.css" rel="stylesheet">
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
                <!--edit here-->
                <?php include("sections/sec-hero.php"); ?>
                <?php include("sections/sec-surrendered.php"); ?>
                <?php include("sections/sec-lost-board.php"); ?>
                <?php include("sections/sec-users-claimed.php"); ?>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/lost-and-found.js"></script>
  <script src="assets/js/sec-hero.js"></script>
  <script src="assets/js/sec-surrendered.js"></script>
  <script src="assets/js/sec-lost-board.js"></script>
  <script src="assets/js/sec-users-claimed.js"></script>
</body>

</html>