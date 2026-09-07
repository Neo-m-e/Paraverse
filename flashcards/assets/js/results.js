"use strict";

document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById("student-results-search");

    var studentRows = Array.prototype.slice.call(
        document.querySelectorAll("[data-student-result-row]")
    );

    var emptyRow = document.getElementById("student-results-empty");
    var countLabel = document.getElementById("student-results-count");

    if (!searchInput || studentRows.length === 0) {
        return;
    }

    searchInput.addEventListener("input", function () {
        var keyword = searchInput.value
            .trim()
            .toLowerCase();

        var visibleCount = 0;

        studentRows.forEach(function (row) {
            var rowContent = row.textContent.toLowerCase();
            var isMatched = rowContent.includes(keyword);

            row.classList.toggle("d-none", !isMatched);

            if (isMatched) {
                visibleCount++;
            }
        });

        emptyRow.classList.toggle(
            "d-none",
            visibleCount !== 0
        );

        countLabel.textContent =
            "Showing " +
            visibleCount +
            " of " +
            studentRows.length +
            " results";
    });
});