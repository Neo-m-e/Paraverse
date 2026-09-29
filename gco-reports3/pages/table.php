<div class="mb-5">
  <h2 class="text-gray-900 fw-bold mb-0">Tabular Reports</h2>
</div>

<div class="row g-5 g-xl-8">
  <div class="col-xl-6">
    <div class="d-flex flex-column gap-8">
      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Service Type</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-primary"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_service_type_table">Export</button>
            <div id="gco_service_type_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_service_type_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Service Type</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></thead>
              <tbody>
                <?php foreach ($serviceTypes as $service): ?>
                  <tr><td><?= safe($service['name']) ?></td><td class="fw-bold"><?= safe($service['total']) ?></td><td class="fw-bold"><?= safe($service['face_to_face']) ?></td><td class="fw-bold"><?= safe($service['online']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot class="d-none"><tr><th>Service Type</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Appointments per Year Level</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-primary"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_year_level_table">Export</button>
            <div id="gco_year_level_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_year_level_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Year Level</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></thead>
              <tbody>
                <?php foreach ($yearLevels as $level): ?>
                  <tr><td><?= safe($level['name']) ?></td><td class="fw-bold"><?= safe($level['total']) ?></td><td class="fw-bold"><?= safe($level['face_to_face']) ?></td><td class="fw-bold"><?= safe($level['online']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot class="d-none"><tr><th>Year Level</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Appointments per Term</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-primary"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_term_table">Export</button>
            <div id="gco_term_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_term_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Term</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></thead>
              <tbody>
                <?php foreach ($terms as $term): ?>
                  <tr><td><?= safe($term['name']) ?></td><td class="fw-bold"><?= safe($term['total']) ?></td><td class="fw-bold"><?= safe($term['face_to_face']) ?></td><td class="fw-bold"><?= safe($term['online']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot class="d-none"><tr><th>Term</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Appointments per School Year</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-primary"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_school_year_table">Export</button>
            <div id="gco_school_year_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_school_year_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>School Year</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></thead>
              <tbody>
                <?php foreach ($schoolYears as $year): ?>
                  <tr><td><?= safe($year['name']) ?></td><td class="fw-bold"><?= safe($year['total']) ?></td><td class="fw-bold"><?= safe($year['face_to_face']) ?></td><td class="fw-bold"><?= safe($year['online']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot class="d-none"><tr><th>School Year</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card card-bordered h-100">
      <div class="card-header">
        <h3 class="card-title">Appointments per Program</h3>
        <div class="card-toolbar gap-3">
          <span class="badge badge-light-primary"><?= safe($currentSchoolYear) ?></span>
          <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_program_table">Export</button>
          <div id="gco_program_table_buttons" class="d-none"></div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table id="gco_program_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
            <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Program</th><th>Student Distribution</th><th>Total Students</th></tr></thead>
            <tbody>
              <?php foreach ($programs as $program): ?>
                <?php
                $faceToFacePercent = (int) round(($program['face_to_face'] / $program['students']) * 100);
                $onlinePercent = (int) round(($program['online'] / $program['students']) * 100);
                $notBookedPercent = 100 - $faceToFacePercent - $onlinePercent;
                ?>
                <tr>
                  <td><?= safe($program['name']) ?></td>
                  <td>
                    <div class="d-flex w-100 h-15px rounded overflow-hidden mb-3">
                      <div class="bg-gco-orange d-flex align-items-center justify-content-center fs-9 fw-bold text-white" style="width: <?= safe($faceToFacePercent) ?>%">
                        <?= safe($faceToFacePercent) ?>%
                      </div>
                      <div class="bg-gco-pink d-flex align-items-center justify-content-center fs-9 fw-bold text-white" style="width: <?= safe($onlinePercent) ?>%">
                        <?= safe($onlinePercent) ?>%
                      </div>
                      <div class="bg-gco-green d-flex align-items-center justify-content-center fs-9 fw-bold text-white" style="width: <?= safe($notBookedPercent) ?>%">
                        <?= safe($notBookedPercent) ?>%
                      </div>
                    </div>
                    <div class="d-flex flex-wrap gap-3 fs-8 fw-semibold text-muted">
                      <span><span class="bullet bullet-dot bg-gco-orange me-1"></span><?= safe($program['face_to_face']) ?> F2F</span>
                      <span><span class="bullet bullet-dot bg-gco-pink me-1"></span><?= safe($program['online']) ?> Online</span>
                      <span><span class="bullet bullet-dot bg-gco-green me-1"></span><?= safe($program['not_booked']) ?> Not Booked</span>
                    </div>
                  </td>
                  <td><span class="fw-bold text-gray-900"><?= safe($program['students']) ?></span> <span class="text-muted">Students</span></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot class="d-none"><tr><th>Program</th><th>Student Distribution</th><th>Total Students</th></tr></tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-bordered">
      <div class="card-header">
        <h3 class="card-title">Specialist</h3>
        <div class="card-toolbar gap-3">
          <span class="badge badge-light-primary"><?= safe($currentSchoolYear) ?></span>
          <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_specialist_table">Export</button>
          <div id="gco_specialist_table_buttons" class="d-none"></div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="gco_specialist_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
            <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Specialist</th><th>Role</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></thead>
            <tbody>
              <?php foreach ($specialists as $specialist): ?>
                <tr><td><?= safe($specialist['name']) ?></td><td><?= safe($specialist['role']) ?></td><td class="fw-bold"><?= safe($specialist['total']) ?></td><td class="fw-bold"><?= safe($specialist['face_to_face']) ?></td><td class="fw-bold"><?= safe($specialist['online']) ?></td></tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot class="d-none"><tr><th>Specialist</th><th>Role</th><th>Total</th><th>Face to Face</th><th>Online</th></tr></tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
