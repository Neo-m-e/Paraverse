"use strict";

$(document).ready(function () {
    var examTableElement = $("#kt_exam_datatable");

    if (examTableElement.length === 0) {
        return;
    }

    var examDataTable = examTableElement.DataTable();

    $("#kt_exam_datatable_filter").addClass("d-none");

    $("#kt_exam_datatable_search").on("keyup", function () {
        examDataTable.search(this.value).draw();
    });

    var initializeExamTooltips = function () {
        var tooltipElements = document.querySelectorAll(
            '[data-bs-toggle="tooltip"]'
        );

        tooltipElements.forEach(function (tooltipElement) {
            bootstrap.Tooltip.getOrCreateInstance(tooltipElement);
        });
    };

    initializeExamTooltips();

    examDataTable.on("draw", function () {
        initializeExamTooltips();
    });

    $(document).on(
        "click",
        '[data-action="copy-exam-id"]',
        function () {
            var examId = String($(this).data("exam-id"));

            if (!navigator.clipboard) {
                toastr.error(
                    "Copying is not supported by this browser."
                );

                return;
            }

            navigator.clipboard
                .writeText(examId)
                .then(function () {
                    toastr.success("Exam ID copied.");
                })
                .catch(function () {
                    toastr.error(
                        "Unable to copy the Exam ID."
                    );
                });
        }
    );
});