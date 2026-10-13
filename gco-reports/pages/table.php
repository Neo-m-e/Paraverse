<?php
require_once __DIR__ . '/data.php';
$reportPage = 'tabular';
?>

<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
<link href="/gco-reports/assets/css/gco-reports.css?v=8" rel="stylesheet" type="text/css">

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-5 mb-10">
  <div>
    <div class="text-danger fw-bold fs-8 text-uppercase mb-2">Guidance Counselor Office</div>
    <h1 class="text-gray-900 fw-bold mb-2">Appointment Reports</h1>
    <div class="text-muted fw-semibold">Review appointment activity by service, specialist, student group, term, and school year.</div>
  </div>

  <div class="d-flex flex-wrap justify-content-end align-items-end gap-3">
    <?php if ($reportPage === 'graphs'): ?>
      <a href="?report=tabular&amp;sy=<?= safe($selectedSchoolYear) ?>&amp;term=<?= safe($selectedTerm) ?>" class="btn btn-sm btn-light-primary">Tabular Reports</a>
    <?php else: ?>
      <a href="?report=graphs&amp;sy=<?= safe($selectedSchoolYear) ?>&amp;term=<?= safe($selectedTerm) ?>" class="btn btn-sm btn-light-primary">Graph Reports</a>
    <?php endif; ?>
    <button type="button" class="btn btn-sm btn-light" id="gco_print_report">Print</button>
    <button type="button" class="btn btn-sm btn-danger" id="gco_export_report">Export Report</button>
  </div>
</div>

<?php
$summaryCards = [
  ['label' => 'Total Appointments', 'value' => $reportSummary['total'], 'note' => $reportSummary['change'] . ' from previous term', 'note_class' => 'text-success', 'border_class' => 'border-gco-dark'],
  ['label' => 'Face to Face', 'value' => $reportSummary['face_to_face'], 'note' => number_format(($reportSummary['face_to_face'] / $reportSummary['total']) * 100, 1) . '% of total', 'note_class' => 'text-muted', 'border_class' => 'border-gco-orange'],
  ['label' => 'Online', 'value' => $reportSummary['online'], 'note' => number_format(($reportSummary['online'] / $reportSummary['total']) * 100, 1) . '% of total', 'note_class' => 'text-muted', 'border_class' => 'border-gco-pink'],
  ['label' => 'Pending Appointments', 'value' => $reportSummary['pending'], 'note' => 'Awaiting confirmation or completion', 'note_class' => 'text-muted', 'border_class' => 'border-gco-purple'],
];
?>

<div class="row g-5 g-xl-8 mb-10">
  <?php foreach ($summaryCards as $card): ?>
    <div class="col-sm-6 col-xl-3">
      <div class="card card-bordered border-start border-3 <?= safe($card['border_class']) ?> h-100">
        <div class="card-body">
          <div class="text-muted fw-semibold mb-2"><?= safe($card['label']) ?></div>
          <div id="gco_summary_value_<?= safe(array_search($card, $summaryCards, true)) ?>" class="fs-2hx fw-bold text-gray-900"><?= safe($card['value']) ?></div>
          <div id="gco_summary_note_<?= safe(array_search($card, $summaryCards, true)) ?>" class="<?= safe($card['note_class']) ?> fw-semibold fs-7"><?= safe($card['note']) ?></div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<div class="d-flex justify-content-between align-items-end mb-5">
  <h2 class="text-gray-900 fw-bold mb-0">Tabular Reports</h2>
  <div class="ms-auto d-flex flex-column align-items-end">
    <label for="gco_school_year_filter" class="form-label fs-8 fw-semibold text-muted mb-1">School Year</label>
    <select id="gco_school_year_filter" class="form-select form-select-sm w-150px gco-report-filter" data-control="select2" aria-label="Select school year"><?php foreach ($schoolYearOptions as $schoolYear): ?><option value="<?= safe($schoolYear) ?>" <?= $schoolYear === $selectedSchoolYear ? 'selected' : '' ?>>SY <?= safe($schoolYear) ?></option><?php endforeach; ?></select>
  </div>
</div>

<script type="application/json" id="gco_filter_data"><?= jsonForHtml($filterData) ?></script>
<script type="application/json" id="gco_appointment_purpose_data"><?= jsonForHtml(['serviceTypes' => $serviceTypes, 'purposes' => $appointmentPurposes]) ?></script>

<div class="row g-5 g-xl-8">
  <div class="col-xl-6">
    <div class="d-flex flex-column gap-8">
      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Service Type</h3>
          <div class="card-toolbar flex-nowrap ms-auto gap-3">
            <select id="gco_service_type_filter" class="form-select form-select-sm w-250px" data-control="select2" aria-label="Filter service type or appointment purpose">
              <option value="all">All</option>
              <?php foreach (array_keys($appointmentPurposes) as $serviceType): ?>
                <option value="<?= htmlspecialchars($serviceType, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($serviceType, ENT_QUOTES, 'UTF-8') ?></option>
              <?php endforeach; ?>
            </select>
            <span class="badge badge-light-secondary gco-school-year-badge"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_service_type_table">Export</button>
            <div id="gco_service_type_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_service_type_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Service Type</th><th>Face to Face</th><th>Online</th><th>Total</th></tr></thead>
              <tbody>
                <?php foreach ($serviceTypes as $service): ?>
                  <tr><td><?= safe($service['name']) ?></td><td class="fw-bold"><?= safe($service['face_to_face']) ?></td><td class="fw-bold"><?= safe($service['online']) ?></td><td class="fw-bold"><?= safe($service['total']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot class="d-none"><tr><th>Service Type</th><th>Face to Face</th><th>Online</th><th>Total</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Appointments per Term</h3>
          <div class="card-toolbar flex-nowrap ms-auto gap-3">
            <select id="gco_term_filter" class="form-select form-select-sm w-150px gco-report-filter" data-control="select2" aria-label="Select term"><?php foreach ($termOptions[$selectedSchoolYear] as $termOption): ?><option value="<?= safe($termOption) ?>" <?= $termOption === $selectedTerm ? 'selected' : '' ?>><?= safe($termOption) ?></option><?php endforeach; ?></select>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_term_table">Export</button>
            <div id="gco_term_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_term_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Month</th><th>Face to Face</th><th>Online</th><th>Total</th></tr></thead>
              <tbody>
                <?php foreach ($terms as $term): ?>
                  <tr><td><?= safe($term['name']) ?></td><td class="fw-bold"><?= safe($term['face_to_face']) ?></td><td class="fw-bold"><?= safe($term['online']) ?></td><td class="fw-bold"><?= safe($term['total']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot><tr class="fw-bold bg-light"><th>Total</th><th><?= safe(array_sum(array_column($terms, 'face_to_face'))) ?></th><th><?= safe(array_sum(array_column($terms, 'online'))) ?></th><th><?= safe($totalTermAppointments) ?></th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Appointments per School Year</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-secondary gco-school-year-badge"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_school_year_table">Export</button>
            <div id="gco_school_year_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_school_year_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Month</th><th>Face to Face</th><th>Online</th><th>Total</th></tr></thead>
              <tbody>
                <?php foreach ($schoolYears as $year): ?>
                  <tr><td><?= safe($year['name']) ?></td><td class="fw-bold"><?= safe($year['face_to_face']) ?></td><td class="fw-bold"><?= safe($year['online']) ?></td><td class="fw-bold"><?= safe($year['total']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot><tr class="fw-bold bg-light"><th>Total</th><th><?= safe(array_sum(array_column($schoolYears, 'face_to_face'))) ?></th><th><?= safe(array_sum(array_column($schoolYears, 'online'))) ?></th><th><?= safe($totalSchoolYearAppointments) ?></th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Specialist</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-secondary gco-school-year-badge"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_specialist_table">Export</button>
            <div id="gco_specialist_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_specialist_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Specialist</th><th>Number of Appointments</th><th>Rating</th></tr></thead>
              <tbody>
                <?php foreach ($specialists as $specialist): ?>
                  <tr><td><?= safe($specialist['name']) ?></td><td class="fw-bold"><?= safe($specialist['total']) ?></td><td><span class="d-inline-flex align-items-center gap-2 fw-bold text-nowrap"><span class="text-warning">★</span><?= safe(number_format($specialist['rating'], 1)) ?>/5</span></td></tr>
                <?php endforeach; ?>
                <tr class="fw-bold bg-light"><td>Overall GCO</td><td><?= safe(array_sum(array_column($specialists, 'total'))) ?></td><td><span class="d-inline-flex align-items-center gap-2 text-nowrap"><span class="text-warning">★</span><?= safe(number_format($overallEvaluation['rating'], 1)) ?>/5</span></td></tr>
              </tbody>
              <tfoot class="d-none"><tr><th>Specialist</th><th>Number of Appointments</th><th>Rating</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="d-flex flex-column gap-8">
      <div class="card card-bordered">
      <div class="card-header">
        <h3 class="card-title">Appointments per Program</h3>
        <div class="card-toolbar flex-nowrap ms-auto gap-3">
            <span class="badge badge-light-secondary gco-school-year-badge"><?= safe($currentSchoolYear) ?></span>
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

      <div class="card card-bordered">
        <div class="card-header">
          <h3 class="card-title">Appointments per Year Level</h3>
          <div class="card-toolbar gap-3">
            <span class="badge badge-light-secondary gco-school-year-badge"><?= safe($currentSchoolYear) ?></span>
            <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_year_level_table">Export</button>
            <div id="gco_year_level_table_buttons" class="d-none"></div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="gco_year_level_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
              <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Year Level</th><th>Face to Face</th><th>Online</th><th>Total</th></tr></thead>
              <tbody>
                <?php foreach ($yearLevels as $level): ?>
                  <tr><td><?= safe($level['name']) ?></td><td class="fw-bold"><?= safe($level['face_to_face']) ?></td><td class="fw-bold"><?= safe($level['online']) ?></td><td class="fw-bold"><?= safe($level['total']) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot class="d-none"><tr><th>Year Level</th><th>Face to Face</th><th>Online</th><th>Total</th></tr></tfoot>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="col-12">
    <div class="card card-bordered">
      <div class="card-header">
        <h3 class="card-title">Student Evaluation</h3>
        <div class="card-toolbar flex-nowrap ms-auto gap-3">
          <select id="gco_student_program_filter" class="form-select form-select-sm" data-control="select2" data-placeholder="All Programs">
            <option value="">All Programs</option>
            <?php foreach ($studentPrograms as $program): ?><option value="<?= safe($program) ?>"><?= safe($program) ?></option><?php endforeach; ?>
          </select>
          <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_student_table">Export</button>
          <div id="gco_student_table_buttons" class="d-none"></div>
        </div>
      </div>
      <div class="card-body p-7"><div class="table-responsive">
        <table id="gco_student_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
          <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Student Number</th><th>Student</th><th>Program</th><th>Classification</th></tr></thead>
          <tbody><?php foreach ($students as $student): ?><tr><td><?= safe($student['sn']) ?></td><td><?= safe($student['name']) ?></td><td><?= safe($student['program']) ?></td><td><span class="badge <?= $student['classification'] === 'Special Case' ? 'badge-light-danger' : 'badge-light-warning' ?>"><?= safe($student['classification']) ?></span></td></tr><?php endforeach; ?></tbody>
          <tfoot class="d-none"><tr><th>Student Number</th><th>Student</th><th>Program</th><th>Classification</th></tr></tfoot>
        </table>
      </div></div>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-bordered">
      <div class="card-header"><h3 class="card-title">Student Classification per Program</h3><div class="card-toolbar gap-3"><button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="gco_classification_table">Export</button><div id="gco_classification_table_buttons" class="d-none"></div></div></div>
      <div class="card-body p-0"><div class="table-responsive"><table id="gco_classification_table" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
        <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th>Program</th><th><span class="bullet bullet-dot bg-gco-orange me-2"></span>Candidates</th><th><span class="bullet bullet-dot bg-gco-pink me-2"></span>Special Cases</th></tr></thead>
        <tbody><?php foreach ($specialCaseSummary as $row): ?><tr><td><?= safe($row['name']) ?></td><td class="fw-bold"><?= safe($row['candidate']) ?></td><td class="fw-bold"><?= safe($row['special_case']) ?></td></tr><?php endforeach; ?></tbody>
        <tfoot class="d-none"><tr><th>Program</th><th>Candidates</th><th>Special Cases</th></tr></tfoot>
      </table></div></div>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-bordered">
      <div class="card-header"><div class="card-title flex-column align-items-start"><h3 class="fw-bold mb-2">Event Attendance</h3><span id="gco_attendance_selected_event" class="badge badge-light-primary text-start text-wrap lh-base"><?= safe($eventNames[0]) ?></span></div><div class="card-toolbar d-flex justify-content-end">
        <select id="gco_attendance_event_filter" class="form-select form-select-sm w-350px" data-control="select2" aria-label="Select event"><?php foreach ($eventNames as $eventName): ?><option value="<?= safe($eventName) ?>"><?= safe($eventName) ?></option><?php endforeach; ?></select>
      </div></div>
      <div class="card-body">
        <div class="row g-8">
          <?php foreach (['CCSMA', 'COE'] as $college): ?>
            <?php $tableId = 'gco_attendance_' . strtolower($college) . '_table'; ?>
            <div class="col-lg-6">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-gray-900 mb-0"><?= safe($college) ?></h4>
                <button type="button" class="btn btn-sm btn-light-danger gco-table-export" data-table="<?= safe($tableId) ?>">Export</button>
                <div id="<?= safe($tableId) ?>_buttons" class="d-none"></div>
              </div>
              <div class="table-responsive">
                <table id="<?= safe($tableId) ?>" class="table table-row-bordered gy-5 gs-7 w-100 mb-0">
                  <thead><tr class="fw-semibold fs-6 text-gray-500 bg-light"><th class="d-none">Event</th><th>Program</th><th>Attendees</th></tr></thead>
                  <tbody>
                    <?php foreach ($eventAttendance as $row): ?>
                      <?php if ($row['college'] === $college): ?>
                        <tr><td class="d-none"><?= safe($row['event']) ?></td><td><?= safe($row['program']) ?></td><td class="fw-bold"><?= safe($row['attendees']) ?></td></tr>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot class="d-none"><tr><th>Event</th><th>Program</th><th>Attendees</th></tr></tfoot>
                </table>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
<script src="/gco-reports/assets/js/gco-tabular.js?v=15" defer></script>
<script src="/gco-reports/assets/js/gco-report-actions.js?v=11" defer></script>
