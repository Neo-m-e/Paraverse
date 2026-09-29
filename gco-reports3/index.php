<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = 'GCO Connect - Appointment Reports';

require_once __DIR__ . '/pages/data.php';

$reportPage = $_GET['report'] ?? 'tabular';
$reportPage = $reportPage === 'graphs' ? 'graphs' : 'tabular';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/gco-reports/assets/css/gco-reports.css?v=6" rel="stylesheet" type="text/css">
  <?php if ($reportPage === 'tabular'): ?>
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-5 mb-10">
                  <div>
                    <div class="text-danger fw-bold fs-8 text-uppercase mb-2">Guidance Counselor Office</div>
                    <h1 class="text-gray-900 fw-bold mb-2">Appointment Reports</h1>
                    <div class="text-muted fw-semibold">Review appointment activity by service, specialist, student group, term, and school year.</div>
                  </div>
                  <div class="d-flex gap-3">
                    <?php if ($reportPage === 'graphs'): ?>
                      <a href="?report=tabular" class="btn btn-sm btn-light-primary">Tabular Reports</a>
                    <?php else: ?>
                      <a href="?report=graphs" class="btn btn-sm btn-light-primary">Graph Reports</a>
                    <?php endif; ?>
                    <button type="button" class="btn btn-sm btn-light" id="gco_print_report"><i class="ki-duotone ki-printer fs-4"></i>Print</button>
                    <button type="button" class="btn btn-sm btn-danger" id="gco_export_report"><i class="ki-duotone ki-exit-up fs-4"></i>Export Report</button>
                  </div>
                </div>

                <div class="row g-5 g-xl-8 mb-10">
                  <?php
                  $summaryCards = [
                    ['label' => 'Total Appointments', 'value' => $reportSummary['total'], 'note' => $reportSummary['change'] . ' from previous term', 'note_class' => 'text-success', 'border_class' => 'border-gco-dark'],
                    ['label' => 'Face to Face', 'value' => $reportSummary['face_to_face'], 'note' => number_format(($reportSummary['face_to_face'] / $reportSummary['total']) * 100, 1) . '% of total', 'note_class' => 'text-muted', 'border_class' => 'border-gco-orange'],
                    ['label' => 'Online', 'value' => $reportSummary['online'], 'note' => number_format(($reportSummary['online'] / $reportSummary['total']) * 100, 1) . '% of total', 'note_class' => 'text-muted', 'border_class' => 'border-gco-pink'],
                    ['label' => 'Upcoming Appointments', 'value' => $reportSummary['upcoming'], 'note' => 'Within the next 7 days', 'note_class' => 'text-muted', 'border_class' => 'border-gco-purple'],
                  ];
                  foreach ($summaryCards as $card):
                  ?>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card card-bordered border-start border-3 <?= safe($card['border_class']) ?> h-100">
                        <div class="card-body">
                          <div class="text-muted fw-semibold mb-2"><?= safe($card['label']) ?></div>
                          <div class="fs-2hx fw-bold text-gray-900"><?= safe($card['value']) ?></div>
                          <div class="<?= safe($card['note_class']) ?> fw-semibold fs-7"><?= safe($card['note']) ?></div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>

                <?php if ($reportPage === 'graphs'): ?>
                  <?php include __DIR__ . '/pages/graph.php'; ?>
                <?php else: ?>
                  <?php include __DIR__ . '/pages/table.php'; ?>
                <?php endif; ?>
              </div>
            </main>
          </div>

          <?php include __DIR__ . '/partials/_footer.php'; ?>

          <?php if ($reportPage === 'graphs'): ?>
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
            <script src="/gco-reports/assets/js/gco-graphs.js?v=6"></script>
          <?php else: ?>
            <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
            <script src="/gco-reports/assets/js/gco-tabular.js"></script>
          <?php endif; ?>
          <script src="/gco-reports/assets/js/gco-report-actions.js"></script>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/_scrolltop.php'; ?>
</body>

</html>
