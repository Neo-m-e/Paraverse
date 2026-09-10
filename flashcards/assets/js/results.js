"use strict";

$(document).ready(function () {
    var resultsTableElement = $(
        "#kt_student_results_datatable"
    );

    if (!resultsTableElement.length) {
        return;
    }

    var studentResultsDataTable;

    if (
        $.fn.DataTable.isDataTable(
            "#kt_student_results_datatable"
        )
    ) {
        studentResultsDataTable =
            resultsTableElement.DataTable();
    } else {
        studentResultsDataTable =
            resultsTableElement.DataTable();
    }

    $("#kt_student_results_datatable_filter")
        .addClass("d-none");

    $("#kt_student_results_datatable_search").on(
        "keyup",
        function () {
            studentResultsDataTable
                .search(this.value)
                .draw();
        }
    );
});