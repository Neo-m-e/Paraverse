document.addEventListener('DOMContentLoaded', function () {
  var table = $('#lost-item-table').DataTable({
    pageLength: 10,
    order: [],
    columnDefs: [{ orderable: false, targets: 4 }]
  });

  document.getElementById('lost-item-search').addEventListener('input', function () {
    table.search(this.value).draw();
  });

  document.querySelectorAll('.delete-row').forEach(function (button) {
    button.addEventListener('click', function () {
      table.row(button.closest('tr')).remove().draw();
    });
  });

  document.getElementById('lost-item-export').addEventListener('click', function () {
    window.print();
  });
});
