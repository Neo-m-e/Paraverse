"use strict";

$(document).ready(function () {
    var examTableElement = $("#kt_exam_datatable");

    if (examTableElement.length) {
        var examDataTable =
            $.fn.DataTable.isDataTable(
                "#kt_exam_datatable"
            )
                ? examTableElement.DataTable()
                : examTableElement.DataTable();

        $("#kt_exam_datatable_filter")
            .addClass("d-none");

        $("#kt_exam_datatable_search").on(
            "keyup",
            function () {
                examDataTable
                    .search(this.value)
                    .draw();
            }
        );

        examDataTable.on(
            "draw",
            function () {
                initializeExamTooltips();
            }
        );
    }

    function initializeExamTooltips() {
        document
            .querySelectorAll(
                '[data-bs-toggle="tooltip"]'
            )
            .forEach(function (element) {
                bootstrap.Tooltip.getOrCreateInstance(
                    element
                );
            });
    }

    initializeExamTooltips();

    $(document).on(
        "click",
        '[data-action="copy-exam-id"]',
        function () {
            var examId = String(
                $(this).data("exam-id")
            );

            if (!navigator.clipboard) {
                toastr.error(
                    "Copying is not supported by this browser."
                );

                return;
            }

            navigator.clipboard
                .writeText(examId)
                .then(function () {
                    toastr.success(
                        "Exam ID copied."
                    );
                })
                .catch(function () {
                    toastr.error(
                        "Unable to copy the Exam ID."
                    );
                });
        }
    );
});