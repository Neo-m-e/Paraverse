['gco_print_report', 'gco_export_report'].forEach(function (id) {
  const button = document.getElementById(id);

  if (button) {
    button.addEventListener('click', function () {
      window.print();
    });
  }
});

const filterDataElement = document.getElementById('gco_filter_data');

if (filterDataElement) {
  const filterData = JSON.parse(filterDataElement.textContent);

  function termRows(termCode) {
    return filterData.termData[termCode].map(function (item) {
      const faceToFace = Math.round(item[1] * 0.62);
      return { name: item[0], total: item[1], face_to_face: faceToFace, online: item[1] - faceToFace };
    });
  }

  function schoolYearRows(schoolYear) {
    return filterData.schoolYearData[schoolYear].map(function (total, index) {
      const faceToFace = Math.round(total * 0.62);
      return { name: filterData.schoolYearMonths[index], total: total, face_to_face: faceToFace, online: total - faceToFace };
    });
  }

  function updateSummary(rows, schoolYear) {
    const total = rows.reduce(function (sum, row) { return sum + row.total; }, 0);
    const faceToFace = rows.reduce(function (sum, row) { return sum + row.face_to_face; }, 0);
    const online = total - faceToFace;
    const pending = { '2024-2025': 10, '2025-2026': 11, '2026-2027': 12 }[schoolYear];
    const change = { '2024-2025': '8.1%', '2025-2026': '10.3%', '2026-2027': '12.4%' }[schoolYear];

    $('#gco_summary_value_0').text(total.toLocaleString());
    $('#gco_summary_value_1').text(faceToFace.toLocaleString());
    $('#gco_summary_value_2').text(online.toLocaleString());
    $('#gco_summary_value_3').text(pending);
    $('#gco_summary_note_0').text(change + ' from previous term');
    $('#gco_summary_note_1').text(((faceToFace / total) * 100).toFixed(1) + '% of total');
    $('#gco_summary_note_2').text(((online / total) * 100).toFixed(1) + '% of total');
  }

  $('#gco_school_year_filter').on('change', function () {
    const url = new URL(window.location.href);
    url.searchParams.set('sy', this.value);
    url.searchParams.delete('term');
    window.location.href = url.toString();
  });

  $('#gco_term_filter').on('change', function () {
    const schoolYear = $('#gco_school_year_filter').val();
    const rows = termRows(this.value);
    updateSummary(rows, schoolYear);
    document.dispatchEvent(new CustomEvent('gco:termChanged', { detail: { term: this.value, rows: rows } }));
  });
}
