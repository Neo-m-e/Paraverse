$(function () {
  [
    { id: 'gco_service_type_table', title: 'GCO Service Type Report' },
    { id: 'gco_year_level_table', title: 'GCO Year Level Report' },
    { id: 'gco_term_table', title: 'GCO Term Report' },
    { id: 'gco_school_year_table', title: 'GCO School Year Report' },
    { id: 'gco_program_table', title: 'GCO Program Report' },
    { id: 'gco_specialist_table', title: 'GCO Specialist Report' },
    { id: 'gco_student_table', title: 'GCO Student Evaluation Report', filterable: true, paginated: true },
    { id: 'gco_classification_table', title: 'GCO Student Classification per Program Report' },
    { id: 'gco_attendance_ccsma_table', title: 'GCO CCSMA Event Attendance Report', filterable: true },
    { id: 'gco_attendance_coe_table', title: 'GCO COE Event Attendance Report', filterable: true }
  ].forEach(function (report) {
    const datatable = $('#' + report.id).DataTable({
      paging: Boolean(report.paginated),
      searching: Boolean(report.filterable),
      info: Boolean(report.paginated),
      lengthChange: Boolean(report.paginated),
      pageLength: 10,
      dom: report.paginated ? 't<"d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4 mt-5"lip>' : 't',
      order: []
    });

    new $.fn.dataTable.Buttons(datatable, {
      buttons: [
        {
          extend: 'csvHtml5',
          title: report.title
        }
      ]
    }).container().appendTo($('#' + report.id + '_buttons'));
  });

  const studentTable = $('#gco_student_table').DataTable();
  $('#gco_student_program_filter').on('change', function () {
    studentTable.column(2).search(this.value).draw();
  });

  const attendanceTables = [
    $('#gco_attendance_ccsma_table').DataTable(),
    $('#gco_attendance_coe_table').DataTable()
  ];
  $('#gco_attendance_event_filter').on('change', function () {
    const eventName = this.value;
    $('#gco_attendance_selected_event').text(eventName);
    attendanceTables.forEach(function (table) {
      table.column(0).search(eventName).draw();
    });
  }).trigger('change');

  document.querySelectorAll('.gco-table-export').forEach(function (button) {
    button.addEventListener('click', function () {
      const tableId = button.getAttribute('data-table');
      const exportButton = document.querySelector('#' + tableId + '_buttons .buttons-csv');

      if (exportButton) {
        exportButton.click();
      }
    });
  });
});
