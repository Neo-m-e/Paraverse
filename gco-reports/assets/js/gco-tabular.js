$(function () {
  [
    { id: 'gco_service_type_table', title: 'GCO Service Type Report' },
    { id: 'gco_year_level_table', title: 'GCO Year Level Report' },
    { id: 'gco_term_table', title: 'GCO Term Report' },
    { id: 'gco_school_year_table', title: 'GCO School Year Report' },
    { id: 'gco_program_table', title: 'GCO Program Report' },
    { id: 'gco_specialist_table', title: 'GCO Specialist Report' }
  ].forEach(function (report) {
    const datatable = $('#' + report.id).DataTable({
      paging: false,
      searching: false,
      info: false,
      lengthChange: false,
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
