<?php
define('MBG', TRUE);
$functionsFile = $_SERVER['DOCUMENT_ROOT'] . '/functions-new.php';
if (!file_exists($functionsFile)) $functionsFile = dirname(__DIR__, 2) . '/functions-new.php';
include($functionsFile);

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = 'Discipline Unit · Lost and Found';
require_once __DIR__ . '/../../lost-and-found/includes/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on" data-kt-app-layout="light-header" class="app-default">
  <?php include(__DIR__ . '/../../lost-and-found/includes/_page-loader.php'); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include(__DIR__ . '/../../lost-and-found/includes/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main><div class="app-container container-xxl py-10"><?php include('index-inc-table.php'); ?></div></main>
          </div>
          <?php include(__DIR__ . '/../../lost-and-found/includes/_footer.php'); ?>
          <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
          <script src="<?= $LAF_ADMIN_URL ?>/assets/js/lost-and-found-table.js"></script>
        </div>
      </div>
    </div>
  </div>
  <?php include(__DIR__ . '/../../lost-and-found/includes/_scrolltop.php'); ?>
</body>
</html>
