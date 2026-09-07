<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Welcome to Edith";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <script src="/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
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
                <?php include("pages/table.php"); ?>
                <?php include("partials/_modals.php"); ?>
              </div>
            </main>
          </div>
          <?php include("partials/_footer.php"); ?>
          <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.1.3/build/umd/index.min.js"></script><!-- ung drag and drop -->
          <script src="/flashcards/assets/js/modals.js"></script>
        </div>
      </div>
    </div>
  </div>
  <?php include("partials/_scrolltop.php"); ?>
</body>
</html>