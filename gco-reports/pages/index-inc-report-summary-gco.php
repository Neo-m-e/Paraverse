<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-5 mb-10">
  <div>
    <div class="text-danger fw-bold fs-8 text-uppercase mb-2">Guidance Counselor Office</div>
    <h1 class="text-gray-900 fw-bold mb-2">Appointment Reports</h1>
    <div class="text-muted fw-semibold">
      Review appointment activity by service, specialist, student group, term, and school year.
    </div>
  </div>

  <div class="d-flex gap-3">
    <?php if ($reportPage === 'graphs'): ?>
      <a href="?report=tabular" class="btn btn-sm btn-light-primary">Tabular Reports</a>
    <?php else: ?>
      <a href="?report=graphs" class="btn btn-sm btn-light-primary">Graph Reports</a>
    <?php endif; ?>
    <button type="button" class="btn btn-sm btn-light" id="gco_print_report">
      <i class="ki-duotone ki-printer fs-4"></i>
      Print
    </button>
    <button type="button" class="btn btn-sm btn-danger" id="gco_export_report">
      <i class="ki-duotone ki-exit-up fs-4"></i>
      Export Report
    </button>
  </div>
</div>

<div class="row g-5 g-xl-8 mb-10">
  <div class="col-sm-6 col-xl-3">
    <div class="card card-bordered h-100">
      <div class="card-body">
        <div class="text-muted fw-semibold mb-2">Total Appointments</div>
        <div class="fs-2hx fw-bold text-gray-900"><?= htmlspecialchars((string) $reportSummary['total'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="text-success fw-semibold fs-7"><?= htmlspecialchars($reportSummary['change'], ENT_QUOTES, 'UTF-8') ?> from previous term</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card card-bordered h-100">
      <div class="card-body">
        <div class="text-muted fw-semibold mb-2">Face to Face</div>
        <div class="fs-2hx fw-bold text-gray-900"><?= htmlspecialchars((string) $reportSummary['face_to_face'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="text-muted fw-semibold fs-7"><?= htmlspecialchars(number_format(($reportSummary['face_to_face'] / $reportSummary['total']) * 100, 1), ENT_QUOTES, 'UTF-8') ?>% of total</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card card-bordered h-100">
      <div class="card-body">
        <div class="text-muted fw-semibold mb-2">Online</div>
        <div class="fs-2hx fw-bold text-gray-900"><?= htmlspecialchars((string) $reportSummary['online'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="text-muted fw-semibold fs-7"><?= htmlspecialchars(number_format(($reportSummary['online'] / $reportSummary['total']) * 100, 1), ENT_QUOTES, 'UTF-8') ?>% of total</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card card-bordered h-100">
      <div class="card-body">
        <div class="text-muted fw-semibold mb-2">Upcoming Appointments</div>
        <div class="fs-2hx fw-bold text-gray-900"><?= htmlspecialchars((string) $reportSummary['upcoming'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="text-muted fw-semibold fs-7">Within the next 7 days</div>
      </div>
    </div>
  </div>
</div>
