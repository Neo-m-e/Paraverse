"use strict";

$(document).ready(function () {
    const modal = document.getElementById("kt_modal_create_exam");

    if (!modal) {
        return;
    }

    /*
     * Custom application data:
     * Read the students already rendered by PHP in the Select2 options.
     */
    const studentSearch = $("#kt_student_search");

    const students = Array.from(
        modal.querySelectorAll("#kt_student_search option[value]")
    ).map(function (option) {
        return {
            studentNumber: String(option.value),
            name: String(
                option.dataset.name || option.textContent
            ).trim(),
            course: String(option.dataset.course || ""),
            email: String(option.dataset.email || "")
        };
    });

    const assignedStudentIds = new Set();

    function escapeHtml(value) {
        return $("<div>").text(String(value)).html();
    }

    function getInitials(name) {
        return String(name)
            .split(" ")
            .filter(function (word) {
                return word.length > 0;
            })
            .slice(0, 2)
            .map(function (word) {
                return word.charAt(0).toUpperCase();
            })
            .join("");
    }

    function getStudentByNumber(studentNumber) {
        return students.find(function (student) {
            return student.studentNumber === String(studentNumber);
        });
    }

    /*
     * Official Metronic Date Range Picker initialization.
     */
    const examDateRange = $("#kt_exam_date_range");

    if (examDateRange.length) {
        examDateRange.daterangepicker({
            startDate: moment("09-07-26", "MM-DD-YY"),
            endDate: moment("09-10-26", "MM-DD-YY"),
            autoApply: true,
            showDropdowns: true,
            parentEl: "#kt_modal_create_exam",
            locale: {
                format: "MM-DD-YY",
                separator: " - ",
                applyLabel: "Apply",
                cancelLabel: "Cancel"
            }
        });
    }

    /*
     * Official Bootstrap/Metronic tooltip initialization.
     */
    modal
        .querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach(function (element) {
            bootstrap.Tooltip.getOrCreateInstance(element);
        });

    function updateModuleCounts() {
        const availableCount = modal.querySelectorAll(
            "#kt_available_modules .draggable"
        ).length;

        const selectedCount = modal.querySelectorAll(
            "#kt_included_modules .draggable"
        ).length;

        $("#kt_available_module_count").text(
            availableCount + " available"
        );

        $("#kt_selected_module_count").text(
            selectedCount + " selected"
        );

        $("#kt_footer_module_count").text(
            selectedCount +
            (selectedCount === 1
                ? " module selected"
                : " modules selected")
        );
    }

    /*
     * Official Metronic Draggable initialization.
     */
    let moduleSortable = null;

    $(modal).on("shown.bs.modal", function () {
        if (moduleSortable !== null) {
            return;
        }

        const containers = modal.querySelectorAll(".draggable-zone");

        if (containers.length < 2) {
            toastr.error("Module drop zones were not found.");
            return;
        }

        if (
            typeof Draggable === "undefined" ||
            typeof Draggable.Sortable === "undefined"
        ) {
            toastr.error("Drag and drop library is not loaded.");
            return;
        }

        moduleSortable = new Draggable.Sortable(containers, {
            draggable: ".draggable",
            handle: ".draggable-handle",
            mirror: {
                appendTo: modal,
                constrainDimensions: true
            }
        });

        moduleSortable.on("sortable:stop", function () {
            setTimeout(updateModuleCounts, 100);
        });

        updateModuleCounts();
    });

    function updateQuestionCount() {
        const questionCount = $(
            '[name="question_types[]"]:checked'
        ).length;

        $("#kt_footer_question_count").text(
            questionCount +
            (questionCount === 1
                ? " question type"
                : " question types")
        );
    }

    $('[name="question_types[]"]').on(
        "change",
        updateQuestionCount
    );

    function updateAssignedStudentsState() {
        $("#kt_assigned_students_empty").toggleClass(
            "d-none",
            assignedStudentIds.size > 0
        );
    }

    function addStudentCard(student) {
        if (
            !student ||
            assignedStudentIds.has(student.studentNumber)
        ) {
            return;
        }

        assignedStudentIds.add(student.studentNumber);

        const studentNumber = escapeHtml(student.studentNumber);
        const studentName = escapeHtml(student.name);
        const studentCourse = escapeHtml(student.course);
        const studentEmail = escapeHtml(student.email);
        const studentInitials = escapeHtml(
            getInitials(student.name)
        );

        const studentCard = `
            <div
                class="card card-bordered"
                data-assigned-student="${studentNumber}"
            >
                <div class="card-body d-flex align-items-center justify-content-between p-5">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-50px symbol-circle me-5">
                            <span class="symbol-label bg-light-primary text-primary fw-bold">
                                ${studentInitials}
                            </span>
                        </div>

                        <div>
                            <div class="text-gray-900 fw-bold fs-6 mb-1">
                                ${studentName}
                            </div>

                            <div class="text-gray-500 fw-semibold fs-8">
                                ${studentNumber} |
                                ${studentCourse} |
                                ${studentEmail}
                            </div>
                        </div>
                    </div>

                    <button
                        type="button"
                        class="btn btn-icon btn-sm btn-light-danger"
                        data-action="remove-student"
                        data-student-id="${studentNumber}"
                        title="Remove student"
                    >
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </button>
                </div>
            </div>
        `;

        $("#kt_assigned_students").append(studentCard);
        updateAssignedStudentsState();
    }

    function removeStudent(studentNumber) {
        const normalizedStudentNumber = String(studentNumber);

        assignedStudentIds.delete(normalizedStudentNumber);

        $(
            '[data-assigned-student="' +
            normalizedStudentNumber +
            '"]'
        ).remove();

        const selectedValues = studentSearch.val() || [];

        const updatedValues = selectedValues.filter(
            function (value) {
                return (
                    String(value) !== normalizedStudentNumber
                );
            }
        );

        studentSearch
            .val(updatedValues)
            .trigger("change.select2");

        updateAssignedStudentsState();
    }

    /*
     * Select2 is initialized automatically through
     * data-control="select2" in the modal PHP.
     */
    studentSearch.on("select2:select", function (event) {
        const student = getStudentByNumber(
            event.params.data.id
        );

        addStudentCard(student);
        studentSearch.select2("close");
    });

    studentSearch.on("select2:unselect", function (event) {
        removeStudent(event.params.data.id);
    });

    $(modal).on(
        "click",
        '[data-action="remove-student"]',
        function () {
            removeStudent($(this).data("student-id"));
            toastr.success("Student removed.");
        }
    );

    $("#kt_import_students_button").on(
        "click",
        function () {
            $("#kt_import_students_file").trigger("click");
        }
    );

    $("#kt_import_students_file").on(
        "change",
        function () {
            const input = this;
            const file = input.files[0];

            if (!file) {
                return;
            }

            if (!file.name.toLowerCase().endsWith(".csv")) {
                toastr.error("Please select a CSV file.");
                input.value = "";
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                const rows = String(event.target.result)
                    .split(/\r?\n/)
                    .filter(function (row) {
                        return row.trim() !== "";
                    });

                if (rows.length <= 1) {
                    toastr.error(
                        "The CSV file has no student records."
                    );

                    input.value = "";
                    return;
                }

                let importedCount = 0;

                rows.slice(1).forEach(function (row) {
                    const columns = row.split(",");

                    if (columns.length < 4) {
                        return;
                    }

                    const importedStudent = {
                        studentNumber: columns[0].trim(),
                        name: columns[1].trim(),
                        course: columns[2].trim(),
                        email: columns[3].trim()
                    };

                    if (
                        !importedStudent.studentNumber ||
                        !importedStudent.name ||
                        !importedStudent.course ||
                        !importedStudent.email
                    ) {
                        return;
                    }

                    let student = getStudentByNumber(
                        importedStudent.studentNumber
                    );

                    if (!student) {
                        students.push(importedStudent);
                        student = importedStudent;

                        const option = new Option(
                            importedStudent.name,
                            importedStudent.studentNumber,
                            false,
                            false
                        );

                        option.dataset.name =
                            importedStudent.name;

                        option.dataset.course =
                            importedStudent.course;

                        option.dataset.email =
                            importedStudent.email;

                        studentSearch.append(option);
                    }

                    if (
                        assignedStudentIds.has(
                            student.studentNumber
                        )
                    ) {
                        return;
                    }

                    addStudentCard(student);
                    importedCount++;
                });

                studentSearch
                    .val(Array.from(assignedStudentIds))
                    .trigger("change.select2");

                if (importedCount === 0) {
                    toastr.error(
                        "No new students were imported."
                    );
                } else {
                    toastr.success(
                        importedCount +
                        (importedCount === 1
                            ? " student imported."
                            : " students imported.")
                    );
                }

                input.value = "";
            };

            reader.onerror = function () {
                toastr.error(
                    "Unable to read the CSV file."
                );

                input.value = "";
            };

            reader.readAsText(file);
        }
    );

    $("#kt_create_exam_form").on(
        "submit",
        function (event) {
            event.preventDefault();

            const examTitle = $("#kt_exam_title").val();

            const selectedModules =
                modal.querySelectorAll(
                    "#kt_included_modules .draggable"
                ).length;

            const selectedQuestions = $(
                '[name="question_types[]"]:checked'
            ).length;

            if (!examTitle) {
                toastr.error("Select an exam title.");
                return;
            }

            if (selectedModules === 0) {
                toastr.error(
                    "Select at least one module."
                );

                return;
            }

            if (selectedQuestions === 0) {
                toastr.error(
                    "Select at least one question type."
                );

                return;
            }

            if (assignedStudentIds.size === 0) {
                toastr.error(
                    "Assign or import at least one student."
                );

                return;
            }

            toastr.success(
                "Exam configuration is ready."
            );
        }
    );

    updateModuleCounts();
    updateQuestionCount();
    updateAssignedStudentsState();
});

document.addEventListener(
    "DOMContentLoaded",
    function () {
        const modalElement = document.getElementById(
            "kt_modal_similar_card"
        );

        const saveButton = document.getElementById(
            "kt_save_merged_card"
        );

        if (!modalElement || !saveButton) {
            return;
        }

        const mergedQuestionInput =
            document.getElementById(
                "kt_merged_question"
            );

        const mergedAnswerInput =
            document.getElementById(
                "kt_merged_answer"
            );

        const questionSourceInput =
            document.getElementById(
                "kt_question_source"
            );

        const answerSourceInput =
            document.getElementById(
                "kt_answer_source"
            );

        function getSelectedChoice(fieldName) {
            return document.querySelector(
                'input[name="' +
                fieldName +
                '"]:checked'
            );
        }

        function updateSelectedCells(fieldName) {
            document
                .querySelectorAll(
                    'input[name="' + fieldName + '"]'
                )
                .forEach(function (choice) {
                    const cell = choice.closest(
                        "[data-card-choice-cell]"
                    );

                    if (!cell) {
                        return;
                    }

                    cell.classList.toggle(
                        "bg-light-success",
                        choice.checked
                    );
                });
        }

        function updateMergedValues() {
            const selectedQuestion =
                getSelectedChoice("question_source");

            const selectedAnswer =
                getSelectedChoice("answer_source");

            if (selectedQuestion) {
                mergedQuestionInput.value =
                    selectedQuestion.dataset.content || "";

                questionSourceInput.value =
                    selectedQuestion.value;
            }

            if (selectedAnswer) {
                mergedAnswerInput.value =
                    selectedAnswer.dataset.content || "";

                answerSourceInput.value =
                    selectedAnswer.value;
            }

            updateSelectedCells("question_source");
            updateSelectedCells("answer_source");
        }

        modalElement.addEventListener(
            "change",
            function (event) {
                if (
                    event.target.matches(
                        'input[name="question_source"], input[name="answer_source"]'
                    )
                ) {
                    updateMergedValues();
                }
            }
        );

        saveButton.addEventListener(
            "click",
            function () {
                const selectedQuestion =
                    getSelectedChoice(
                        "question_source"
                    );

                const selectedAnswer =
                    getSelectedChoice(
                        "answer_source"
                    );

                if (!selectedQuestion) {
                    toastr.error(
                        "Select the question you want to save."
                    );

                    return;
                }

                if (!selectedAnswer) {
                    toastr.error(
                        "Select the answer you want to save."
                    );

                    return;
                }

                updateMergedValues();

                saveButton.setAttribute(
                    "data-kt-indicator",
                    "on"
                );

                saveButton.disabled = true;

                setTimeout(function () {
                    bootstrap.Modal
                        .getOrCreateInstance(modalElement)
                        .hide();

                    saveButton.removeAttribute(
                        "data-kt-indicator"
                    );

                    saveButton.disabled = false;

                    toastr.success(
                        "Merged flashcard saved."
                    );
                }, 500);
            }
        );

        modalElement.addEventListener(
            "shown.bs.modal",
            updateMergedValues
        );

        updateMergedValues();
    }
);