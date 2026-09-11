"use strict";

$(document).ready(function () {
    var resultsTable = $("#kt_student_results_datatable");

    if (resultsTable.length === 0) {
        return;
    }

    var resultsDataTable = resultsTable.DataTable();

    $("#kt_student_results_datatable_filter").addClass("d-none");

    $("#kt_student_results_datatable_search").on("keyup", function () {
        resultsDataTable.search(this.value).draw();
    });
});