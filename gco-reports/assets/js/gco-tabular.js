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

  const purposeDataElement = document.getElementById('gco_appointment_purpose_data');
  if (purposeDataElement) {
    const purposeData = JSON.parse(purposeDataElement.textContent);
    const serviceTypeTable = $('#gco_service_type_table').DataTable();

    $('#gco_service_type_filter').on('change', function () {
      const serviceType = this.value;
      const rows = serviceType === 'all'
        ? purposeData.serviceTypes
        : purposeData.purposes[serviceType];

      serviceTypeTable.clear().rows.add(rows.map(function (row) {
        return [row.name, row.face_to_face, row.online, row.total];
      })).draw();
    });
  }

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

  const termTable = $('#gco_term_table').DataTable();
  const schoolYearTable = $('#gco_school_year_table').DataTable();

  function replaceReportRows(table, rows) {
    table.clear();
    table.rows.add(rows.map(function (row) {
      return [row.name, row.face_to_face, row.online, row.total];
    }));
    table.draw();

    const totals = rows.reduce(function (result, row) {
      result.total += row.total;
      result.faceToFace += row.face_to_face;
      result.online += row.online;
      return result;
    }, { total: 0, faceToFace: 0, online: 0 });
    $(table.table().footer()).find('th').eq(1).text(totals.faceToFace);
    $(table.table().footer()).find('th').eq(2).text(totals.online);
    $(table.table().footer()).find('th').eq(3).text(totals.total);
  }

  document.addEventListener('gco:termChanged', function (event) {
    replaceReportRows(termTable, event.detail.rows);
  });

  document.addEventListener('gco:schoolYearChanged', function (event) {
    replaceReportRows(schoolYearTable, event.detail.rows);
  });

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
