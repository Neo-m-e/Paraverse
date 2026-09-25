<div class="mb-5">
  <h2 class="text-gray-900 fw-bold mb-0">Graph Reports</h2>
</div>

<div class="row g-5 g-xl-8">
  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header"><h3 class="card-title">Appointment Service Type</h3></div>
      <div class="card-body"><div class="position-relative h-350px"><canvas id="gco_service_type_chart"></canvas></div></div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header"><h3 class="card-title">Appointments per Specialist</h3></div>
      <div class="card-body"><div class="position-relative h-350px"><canvas id="gco_specialist_chart"></canvas></div></div>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-bordered">
      <div class="card-header"><h3 class="card-title">Appointments per Year Level</h3></div>
      <div class="card-body">
        <div class="row g-5">
          <?php foreach ($yearLevels as $index => $level): ?>
            <div class="col-sm-6 col-xl-3">
              <div class="position-relative h-150px"><canvas id="gco_year_level_chart_<?= htmlspecialchars((string) $index, ENT_QUOTES, 'UTF-8') ?>"></canvas></div>
              <div class="text-center">
                <div class="fw-bold text-gray-900"><?= htmlspecialchars($level['name'], ENT_QUOTES, 'UTF-8') ?></div>
                <div class="text-muted fs-7"><?= htmlspecialchars(number_format(($level['total'] / $reportSummary['total']) * 100), ENT_QUOTES, 'UTF-8') ?>% of total</div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="d-flex flex-column gap-8">
      <div class="card card-bordered">
        <div class="card-header"><h3 class="card-title">Appointments per Term</h3></div>
        <div class="card-body"><div class="position-relative h-350px"><canvas id="gco_term_chart"></canvas></div></div>
      </div>

      <div class="card card-bordered">
        <div class="card-header"><h3 class="card-title">Appointments per School Year</h3></div>
        <div class="card-body"><div class="position-relative h-350px"><canvas id="gco_school_year_chart"></canvas></div></div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header"><h3 class="card-title">Appointments per Program</h3></div>
      <div class="card-body"><div class="position-relative h-800px"><canvas id="gco_program_chart"></canvas></div></div>
    </div>
  </div>
</div>
