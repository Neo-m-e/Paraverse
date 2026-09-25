<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = 'GCO Connect - Appointment Reports';

require_once __DIR__ . '/pages/index-data-gco.php';

$reportPage = $_GET['report'] ?? 'tabular';
$reportPage = $reportPage === 'graphs' ? 'graphs' : 'tabular';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <?php if ($reportPage === 'tabular'): ?>
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
    <style>
      .bg-gco-orange { background-color: #ff4621 !important; }
      .bg-gco-pink { background-color: #e04987 !important; }
      .bg-gco-green { background-color: #78b89a !important; }
    </style>
  <?php endif; ?>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include __DIR__ . '/partials/_page-loader.php'; ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include __DIR__ . '/partials/_header.php'; ?>

      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl py-10">
                <?php include __DIR__ . '/pages/index-inc-report-summary-gco.php'; ?>

                <?php if ($reportPage === 'graphs'): ?>
                  <?php include __DIR__ . '/pages/index-inc-graph-report-gco.php'; ?>
                <?php else: ?>
                  <?php include __DIR__ . '/pages/index-inc-tabular-report-gco.php'; ?>
                <?php endif; ?>
              </div>
            </main>
          </div>

          <?php include __DIR__ . '/partials/_footer.php'; ?>

          <?php if ($reportPage === 'graphs'): ?>
            <?php include __DIR__ . '/pages/index-inc-graph-report-scripts-gco.php'; ?>
          <?php else: ?>
            <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
            <?php include __DIR__ . '/pages/index-inc-tabular-report-scripts-gco.php'; ?>
          <?php endif; ?>
          <?php include __DIR__ . '/pages/index-inc-report-actions-scripts-gco.php'; ?>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/_scrolltop.php'; ?>
</body>

</html>
