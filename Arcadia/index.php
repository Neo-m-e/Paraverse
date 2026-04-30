<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Arcadia";
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
                <!--edit here-->
                <?php include("sections/hero section.php"); ?>
                <?php include("sections/how it works.php"); ?>
                <?php include("sections/flow.php"); ?>
                <?php include("sections/explore badges.php"); ?>
                <?php include("sections/claimable.php"); ?>
                <?php include("sections/level.php"); ?>
                <?php include("sections/leaderboard.php"); ?>
                <?php include("sections/faq.php"); ?>
                <?php include("sections/cta.php"); ?>
                </div>
              </div>
            </main>
          </div>
          <?php include("partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("partials/_scrolltop.php"); ?>
</body>

</html>