<script>
  ['gco_print_report', 'gco_export_report'].forEach(function (id) {
    document.getElementById(id).addEventListener('click', function () {
      window.print();
    });
  });
</script>
