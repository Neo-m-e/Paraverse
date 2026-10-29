<?php
define('MBG', TRUE);
$functionsFile = $_SERVER['DOCUMENT_ROOT'] . '/functions-new.php';
if (!file_exists($functionsFile)) $functionsFile = __DIR__ . '/functions-new.php';
include($functionsFile);

$META_TITLE = 'FEU Tech Lost and Found';
require_once __DIR__ . '/includes/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php HEAD_ESSENTIALS(); ?></head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on" data-kt-app-layout="light-header" class="app-default">
  <?php include(__DIR__ . '/includes/_page-loader.php'); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include(__DIR__ . '/includes/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <main class="d-flex flex-column flex-column-fluid">
            <?php include(__DIR__ . '/includes/index-inc-hero.php'); ?>
            <?php include(__DIR__ . '/includes/index-inc-how-to-turn-in.php'); ?>
            <?php include(__DIR__ . '/includes/index-inc-recently-surrendered.php'); ?>
            <?php include(__DIR__ . '/includes/index-inc-getting-started.php'); ?>
            <?php include(__DIR__ . '/includes/index-inc-built.php'); ?>
            <?php include(__DIR__ . '/includes/index-inc-cta.php'); ?>
          </main>
          <?php include(__DIR__ . '/includes/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include(__DIR__ . '/includes/_scrolltop.php'); ?>
</body>
</html>
