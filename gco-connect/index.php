<?php
define('MBG', TRUE);

// Base URL for this app (works when run from /gco-connect/index.php)
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$GCO_BASE = (substr(rtrim($uri, '/'), -9) === 'index.php' ? dirname($uri) . '/' : rtrim($uri, '/') . '/');
if ($GCO_BASE === '/' || $GCO_BASE === '') {
  $GCO_BASE = '/';
}

include(__DIR__ . '/functions-new.php');

$META_TITLE = "GCO Connect – Student Counseling & Support";
$META_DESC = "Professional counseling services for students. Connect with licensed therapists and the Guidance and Counseling Office.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <!-- Metronic local assets (fontawesome icons + brand overrides) -->
  <link rel="stylesheet" href="<?php echo htmlspecialchars($GCO_BASE); ?>assets/css/fontawesome.css" type="text/css" />
  <link rel="stylesheet"
    href="<?php echo htmlspecialchars($GCO_BASE); ?>assets/css/gco-design.css?v=<?php echo time(); ?>"
    type="text/css" />

  <!-- Swiper CSS (no local bundle — CDN only) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-page-loading-enabled="true"
  data-kt-app-page-loading="on" class="app-default">
  <!-- Page Loader -->
  <?php include(__DIR__ . "/partials/_page-loader.php"); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include(__DIR__ . "/partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">
                <div id="kt_app_content" class="flex-column-fluid">
                  <?php
include(__DIR__ . "/pages/index-inc-hero-gco.php");
include(__DIR__ . "/pages/index-inc-services-gco.php");
include(__DIR__ . "/pages/index-inc-how-it-works-gco.php");
include(__DIR__ . "/pages/index-inc-team-gco.php");
include(__DIR__ . "/pages/index-inc-psychological-gco.php");
include(__DIR__ . "/pages/index-inc-purpose-gco.php");
include(__DIR__ . "/pages/index-inc-special-programs-gco.php");
include(__DIR__ . "/pages/index-inc-faq-gco.php");
include(__DIR__ . "/pages/index-inc-cta-gco.php");
?>
                </div>
              </div>
            </main>
          </div>
          <?php
$base = isset($GCO_BASE) ? $GCO_BASE : '';
$assets_base = (isset($GCO_BASE) ? $GCO_BASE . 'assets' : 'assets');
include(__DIR__ . "/partials/_footer.php");
?>
        </div>
      </div>
    </div>
  </div>
  <?php include(__DIR__ . "/partials/_scrolltop.php"); ?>
  <!-- Metronic Core JS -->
  <script src="<?php echo htmlspecialchars($GCO_BASE); ?>assets/plugins/global/plugins.bundle.js"></script>
  <script src="<?php echo htmlspecialchars($GCO_BASE); ?>assets/js/scripts.bundle.v2.01.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    // Remove global theme enforcement that overrides GCO custom styles
    window.addEventListener("DOMContentLoaded", () => {
      document.documentElement.removeAttribute("data-bs-theme");
      // Double-check after other scripts might have set it
      setTimeout(() => document.documentElement.removeAttribute("data-bs-theme"), 100);
    });
  </script>
</body>

</html>