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
                <!--paste here middle body to have something there // to see type localhost/sample/-->
                <?php include("pages/view/index-section-hero.php"); ?>
                <div class="row g-5 g-xxl-8">
                  <div class="col-xl-8">
                    <?php
                    include("pages/view/profile-section-bio.php");
                    include("pages/view/profile-section-skills.php");
                    include("pages/view/profile-section-experience.php");
                    include("pages/view/profile-section-education.php");
                    include("pages/view/profile-section-awards.php");
                    include("pages/view/profile-section-certs.php");
                    include("pages/view/profile-section-seminars.php");
                    include("pages/view/profile-section-orgs.php");
                    ?>
                  </div>
                  <div class="col-xl-4">
                    <?php
                    include("pages/view/sidebar-public-url.php");
                    include("pages/view/sidebar-social-links.php");
                    include("pages/view/sidebar-suggestions.php");
                    include("pages/view/sidebar-ads.php");
                    ?>
                  </div>

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