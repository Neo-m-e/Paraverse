<div class="mb-5">
  <h2 class="text-gray-900 fw-bold mb-0">Graph Reports</h2>
</div>

<?php
$chartData = [
  'serviceTypes' => $serviceTypes,
  'specialists' => $specialists,
  'yearLevels' => $yearLevels,
  'terms' => $terms,
  'schoolYears' => $schoolYears,
  'programs' => $programs,
  'totalTermAppointments' => $totalTermAppointments,
];
?>

<script type="application/json" id="gco_report_data">
  <?= jsonForHtml($chartData) ?>
</script>

<div class="row g-5 g-xl-8">
  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header"><h3 class="card-title">Appointment Service Type</h3></div>
      <div class="card-body"><div id="gco_service_type_chart" class="h-350px"></div></div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header"><h3 class="card-title">Appointments per Specialist</h3></div>
      <div class="card-body"><div id="gco_specialist_chart" class="h-350px"></div></div>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-bordered">
      <div class="card-header"><h3 class="card-title">Appointments per Year Level</h3></div>
      <div class="card-body">
        <div class="row g-5">
          <?php foreach ($yearLevels as $index => $level): ?>
            <div class="col-sm-6 col-xl-3">
              <div class="text-center px-3">
                <div class="position-relative h-150px">
                  <div id="gco_year_level_chart_<?= safe($index) ?>" class="h-150px"></div>
                  <div class="gco-chart-center position-absolute top-50 start-50 translate-middle fw-bold text-gray-900 fs-6 pe-none"><?= number_format($level['total']) ?></div>
                </div>
                <div class="fw-bold text-gray-900"><?= safe($level['name']) ?></div>
                <div class="d-flex justify-content-center flex-wrap gap-4 mt-2 fs-7">
                  <span class="text-muted"><span class="bullet bullet-dot year-level-primary-<?= $index ?> me-1"></span>Face to Face <span class="fw-bold text-gray-900"><?= number_format($level['face_to_face']) ?></span></span>
                  <span class="text-muted"><span class="bullet bullet-dot year-level-secondary-<?= $index ?> me-1"></span>Online <span class="fw-bold text-gray-900"><?= number_format($level['online']) ?></span></span>
                </div>
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
        <div class="card-body">
          <div class="row align-items-center g-5">
            <div class="col-sm-5">
              <div class="position-relative h-250px">
                <div id="gco_term_chart" class="h-250px"></div>
                <div class="gco-chart-center position-absolute top-50 start-50 translate-middle text-center pe-none">
                  <div class="fw-bold text-gray-900 fs-2"><?= number_format($totalTermAppointments) ?></div>
                  <div class="text-muted fs-8">Total</div>
                </div>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="row g-4">
                <?php foreach ($terms as $index => $term): ?>
                  <div class="col-6">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                      <div class="d-flex align-items-center gap-2"><span class="bullet bullet-dot h-8px w-8px <?= safe(['bg-gco-orange', 'bg-gco-pink', 'bg-gco-purple'][$index]) ?>"></span><span class="text-muted fs-7"><?= safe($term['name']) ?></span></div>
                      <span class="fw-bold text-gray-900"><?= number_format($term['total']) ?></span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header"><h3 class="card-title">Appointments per School Year</h3></div>
        <div class="card-body">
          <div class="row align-items-center g-5">
            <div class="col-sm-5"><div id="gco_school_year_chart" class="h-250px"></div></div>
            <div class="col-sm-7">
              <div class="row g-4">
                <?php foreach ($schoolYears as $index => $schoolYear): ?>
                  <div class="col-6">
                    <div class="card card-bordered border-start border-3 h-100 <?= safe(['border-gco-orange', 'border-gco-pink', 'border-gco-purple'][$index]) ?>">
                      <div class="card-body py-4 px-5"><span class="text-muted fs-7"><?= safe($schoolYear['name']) ?></span><div class="fs-2 fw-bold text-gray-900"><?= number_format($schoolYear['total']) ?></div></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header"><h3 class="card-title">Appointments per Program</h3></div>
      <div class="card-body"><div id="gco_program_chart" class="h-800px"></div></div>
    </div>
  </div>
</div>
