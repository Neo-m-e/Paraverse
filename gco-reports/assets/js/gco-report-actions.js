['gco_print_report', 'gco_export_report'].forEach(function (id) {
  const button = document.getElementById(id);

  if (button) {
    button.addEventListener('click', function () {
      window.print();
    });
  }
});
