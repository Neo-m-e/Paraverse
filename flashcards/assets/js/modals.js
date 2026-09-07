$(document).ready(function () {
    if (window.createExamModalInitialized) {
        return;
    }

    window.createExamModalInitialized = true;

    const modal = document.getElementById(
        'kt_modal_create_exam'
    );

    if (!modal) {
        return;
    }

    /*
     * STUDENT DATA
     * Same students used in results.php
     */
    const students = [
        {
            studentNumber: '202210292',
            name: 'Ana Marie Villanueva',
            course: 'BSITBA',
            courseName: 'Bachelor of Science in Information Technology with specialization in Business Analytics',
            email: 'avillanueva@fit.edu.ph'
        },
        {
            studentNumber: '202210293',
            name: 'Carlo Bautista',
            course: 'BSITBA',
            courseName: 'Bachelor of Science in Information Technology with specialization in Business Analytics',
            email: 'cbautista@fit.edu.ph'
        },
        {
            studentNumber: '202210294',
            name: 'Denise Ramos',
            course: 'BSITBA',
            courseName: 'Bachelor of Science in Information Technology with specialization in Business Analytics',
            email: 'dramos@fit.edu.ph'
        },
        {
            studentNumber: '202210295',
            name: 'Miguel Torres',
            course: 'BSITAGD',
            courseName: 'Bachelor of Science in Information Technology with specialization in Animation and Game Development',
            email: 'mtorres@fit.edu.ph'
        },
        {
            studentNumber: '202210296',
            name: 'Sophia Del Rosario',
            course: 'BSCS',
            courseName: 'Bachelor of Science in Computer Science',
            email: 'sdelrosario@fit.edu.ph'
        },
        {
            studentNumber: '202210297',
            name: 'Josh Manuel',
            course: 'BSITWMA',
            courseName: 'Bachelor of Science in Information Technology with specialization in Web and Mobile Application',
            email: 'jmanuel@fit.edu.ph'
        }
    ];

    const assignedStudentIds = new Set();

    /*
     * HELPERS
     */
    function escapeHtml(value) {
        return $('<div>')
            .text(String(value))
            .html();
    }

    function getInitials(name) {
        return String(name)
            .split(' ')
            .filter(function (word) {
                return word.length > 0;
            })
            .slice(0, 2)
            .map(function (word) {
                return word.charAt(0).toUpperCase();
            })
            .join('');
    }

    function getStudentByNumber(studentNumber) {
        return students.find(function (student) {
            return (
                student.studentNumber ===
                String(studentNumber)
            );
        });
    }

    /*
     * METRONIC DATE RANGE PICKER
     */
    $('#kt_exam_date_range').daterangepicker({
        startDate: moment('09-07-26', 'MM-DD-YY'),
        endDate: moment('09-10-26', 'MM-DD-YY'),
        autoApply: true,
        showDropdowns: true,
        parentEl: '#kt_modal_create_exam',
        locale: {
            format: 'MM-DD-YY',
            separator: ' - ',
            applyLabel: 'Apply',
            cancelLabel: 'Cancel'
        }
    });

    /*
     * METRONIC TOOLTIPS
     */
    $('[data-bs-toggle="tooltip"]').each(function () {
        bootstrap.Tooltip.getOrCreateInstance(this);
    });

    /*
     * MODULE COUNTERS
     */
    function updateModuleCounts() {
        const availableCount = document.querySelectorAll(
            '#kt_available_modules .draggable'
        ).length;

        const selectedCount = document.querySelectorAll(
            '#kt_included_modules .draggable'
        ).length;

        $('#kt_available_module_count').text(
            availableCount + ' available'
        );

        $('#kt_selected_module_count').text(
            selectedCount + ' selected'
        );

        $('#kt_footer_module_count').text(
            selectedCount +
            (
                selectedCount === 1
                    ? ' module selected'
                    : ' modules selected'
            )
        );
    }

    /*
     * SHOPIFY DRAGGABLE / METRONIC SORTABLE
     */
    let moduleSortable = null;

    $('#kt_modal_create_exam').on(
        'shown.bs.modal',
        function () {
            if (moduleSortable !== null) {
                return;
            }

            const containers = document.querySelectorAll(
                '#kt_modal_create_exam .draggable-zone'
            );

            if (containers.length < 2) {
                console.error(
                    'At least two draggable zones are required.'
                );

                toastr.error(
                    'Module drop zones were not found.'
                );

                return;
            }

            if (
                typeof Draggable === 'undefined' ||
                typeof Draggable.Sortable === 'undefined'
            ) {
                console.error(
                    'Shopify Draggable is not loaded.'
                );

                toastr.error(
                    'Drag and drop library is not loaded.'
                );

                return;
            }

            moduleSortable = new Draggable.Sortable(
                containers,
                {
                    draggable: '.draggable',
                    handle: '.draggable-handle',
                    mirror: {
                        appendTo: modal,
                        constrainDimensions: true
                    }
                }
            );

            moduleSortable.on(
                'sortable:stop',
                function () {
                    setTimeout(function () {
                        updateModuleCounts();
                    }, 100);
                }
            );

            updateModuleCounts();
        }
    );

    /*
     * QUESTION TYPE COUNTER
     */
    function updateQuestionCount() {
        const questionCount = $(
            '[name="question_types[]"]:checked'
        ).length;

        $('#kt_footer_question_count').text(
            questionCount +
            (
                questionCount === 1
                    ? ' question type'
                    : ' question types'
            )
        );
    }

    $('[name="question_types[]"]').on(
        'change',
        function () {
            updateQuestionCount();
        }
    );

    /*
     * METRONIC SELECT2 STUDENT SEARCH
     */
    const studentSearch = $('#kt_student_search');

    function formatStudentOption(studentOption) {
        if (!studentOption.id) {
            return studentOption.text;
        }

        const student = getStudentByNumber(
            studentOption.id
        );

        if (!student) {
            return studentOption.text;
        }

        const result = $('<div>')
            .addClass('d-flex align-items-center py-2');

        const symbol = $('<div>')
            .addClass(
                'symbol symbol-40px symbol-circle me-4'
            );

        const initials = $('<span>')
            .addClass(
                'symbol-label bg-light-primary text-primary fw-bold'
            )
            .text(getInitials(student.name));

        const information = $('<div>');

        const name = $('<div>')
            .addClass(
                'text-gray-900 fw-bold fs-7'
            )
            .text(student.name);

        const course = $('<div>')
            .addClass(
                'text-gray-500 fw-semibold fs-8'
            )
            .text(
                student.course +
                ' - ' +
                student.courseName
            );

        symbol.append(initials);
        information.append(name, course);
        result.append(symbol, information);

        return result;
    }

    function formatStudentSelection(studentOption) {
        if (!studentOption.id) {
            return studentOption.text;
        }

        const student = getStudentByNumber(
            studentOption.id
        );

        return student
            ? student.name
            : studentOption.text;
    }

    students.forEach(function (student) {
        const existingOption = studentSearch.find(
            'option[value="' +
            student.studentNumber +
            '"]'
        );

        if (existingOption.length > 0) {
            return;
        }

        const option = new Option(
            student.name,
            student.studentNumber,
            false,
            false
        );

        studentSearch.append(option);
    });
    if (
        studentSearch.hasClass(
            'select2-hidden-accessible'
        )
    ) {
        studentSearch.select2('destroy');
    }

    studentSearch.select2({
        dropdownParent: $('#kt_modal_create_exam'),
        placeholder: 'Search and select students',
        closeOnSelect: true,
        width: '100%',
        templateResult: formatStudentOption,
        templateSelection: formatStudentSelection
    });

    /*
     * ASSIGNED STUDENT CARDS
     */
    function updateAssignedStudentsState() {
        if (assignedStudentIds.size === 0) {
            $('#kt_assigned_students_empty')
                .removeClass('d-none');
        } else {
            $('#kt_assigned_students_empty')
                .addClass('d-none');
        }
    }

    function addStudentCard(student) {
        if (!student) {
            return;
        }

        if (
            assignedStudentIds.has(
                student.studentNumber
            )
        ) {
            return;
        }

        assignedStudentIds.add(
            student.studentNumber
        );

        const studentNumber = escapeHtml(
            student.studentNumber
        );

        const studentName = escapeHtml(
            student.name
        );

        const studentCourse = escapeHtml(
            student.course
        );

        const studentEmail = escapeHtml(
            student.email
        );

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
                ${studentNumber} | ${studentCourse} | ${studentEmail}
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

        $('#kt_assigned_students').append(
            studentCard
        );

        updateAssignedStudentsState();
    }

    function removeStudent(studentNumber) {
        const normalizedStudentNumber =
            String(studentNumber);

        assignedStudentIds.delete(
            normalizedStudentNumber
        );

        $(
            '[data-assigned-student="' +
            normalizedStudentNumber +
            '"]'
        ).remove();

        const selectedValues =
            studentSearch.val() || [];

        const updatedValues =
            selectedValues.filter(function (value) {
                return (
                    String(value) !==
                    normalizedStudentNumber
                );
            });

        studentSearch
            .val(updatedValues)
            .trigger('change.select2');

        updateAssignedStudentsState();
    }

    /*
     * Selecting a student creates a card.
     */
    studentSearch.on(
        'select2:select',
        function (event) {
            const student = getStudentByNumber(
                event.params.data.id
            );

            addStudentCard(student);
            studentSearch.select2('close');
            setTimeout(function () {
                $('.select2-search__field').val('');
            }, 0);
        }
    );

    /*
     * Unselecting a student removes the card.
     */
    studentSearch.on(
        'select2:unselect',
        function (event) {
            removeStudent(
                event.params.data.id
            );
        }
    );

    /*
     * Remove button on student card.
     */
    $(document).on(
        'click',
        '[data-action="remove-student"]',
        function () {
            const studentNumber = String(
                $(this).data('student-id')
            );

            removeStudent(studentNumber);

            toastr.success(
                'Student removed.'
            );
        }
    );

    /*
     * IMPORT STUDENTS FROM CSV
     */
    $('#kt_import_students_button').on(
        'click',
        function () {
            $('#kt_import_students_file')
                .trigger('click');
        }
    );

    $('#kt_import_students_file').on(
        'change',
        function () {
            const input = this;
            const file = input.files[0];

            if (!file) {
                return;
            }

            if (
                !file.name
                    .toLowerCase()
                    .endsWith('.csv')
            ) {
                toastr.error(
                    'Please select a CSV file.'
                );

                input.value = '';

                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                const contents = String(
                    event.target.result
                );

                const rows = contents
                    .split(/\r?\n/)
                    .filter(function (row) {
                        return row.trim() !== '';
                    });

                if (rows.length <= 1) {
                    toastr.error(
                        'The CSV file has no student records.'
                    );

                    input.value = '';

                    return;
                }

                let importedCount = 0;

                rows
                    .slice(1)
                    .forEach(function (row) {
                        const columns = row.split(',');

                        if (columns.length < 4) {
                            return;
                        }

                        const importedStudent = {
                            studentNumber:
                                columns[0].trim(),

                            name:
                                columns[1].trim(),

                            course:
                                columns[2].trim(),

                            courseName:
                                columns[2].trim(),

                            email:
                                columns[3].trim()
                        };

                        if (
                            !importedStudent.studentNumber ||
                            !importedStudent.name ||
                            !importedStudent.course ||
                            !importedStudent.email
                        ) {
                            return;
                        }

                        let existingStudent =
                            getStudentByNumber(
                                importedStudent.studentNumber
                            );

                        if (!existingStudent) {
                            students.push(importedStudent);

                            existingStudent =
                                importedStudent;

                            const option = new Option(
                                importedStudent.name,
                                importedStudent.studentNumber,
                                false,
                                false
                            );

                            studentSearch.append(option);
                        }

                        if (
                            assignedStudentIds.has(
                                existingStudent.studentNumber
                            )
                        ) {
                            return;
                        }

                        addStudentCard(
                            existingStudent
                        );

                        importedCount++;
                    });

                /*
                 * Select imported students in Select2.
                 */
                studentSearch
                    .val(
                        Array.from(
                            assignedStudentIds
                        )
                    )
                    .trigger('change.select2');

                if (importedCount === 0) {
                    toastr.error(
                        'No new students were imported.'
                    );
                } else {
                    toastr.success(
                        importedCount +
                        (
                            importedCount === 1
                                ? ' student imported.'
                                : ' students imported.'
                        )
                    );
                }

                input.value = '';
            };

            reader.onerror = function () {
                toastr.error(
                    'Unable to read the CSV file.'
                );

                input.value = '';
            };

            reader.readAsText(file);
        }
    );

    /*
     * CREATE EXAM FORM VALIDATION
     */
    $('#kt_create_exam_form').on(
        'submit',
        function (event) {
            event.preventDefault();

            const examTitle =
                $('#kt_exam_title').val();

            const selectedModules =
                document.querySelectorAll(
                    '#kt_included_modules .draggable'
                ).length;

            const selectedQuestions = $(
                '[name="question_types[]"]:checked'
            ).length;

            if (!examTitle) {
                toastr.error(
                    'Select an exam title.'
                );

                return;
            }

            if (selectedModules === 0) {
                toastr.error(
                    'Select at least one module.'
                );

                return;
            }

            if (selectedQuestions === 0) {
                toastr.error(
                    'Select at least one question type.'
                );

                return;
            }

            if (assignedStudentIds.size === 0) {
                toastr.error(
                    'Assign or import at least one student.'
                );

                return;
            }

            toastr.success(
                'Exam configuration is ready.'
            );
        }
    );

    /*
     * Initial component states
     */
    updateModuleCounts();
    updateQuestionCount();
    updateAssignedStudentsState();
});
/* check similar */
"use strict";

document.addEventListener("DOMContentLoaded", function () {
    var modalElement = document.getElementById(
        "kt_modal_similar_card"
    );

    var saveButton = document.getElementById(
        "kt_save_merged_card"
    );

    if (!modalElement || !saveButton) {
        return;
    }

    var questionChoices = document.querySelectorAll(
        'input[name="question_source"]'
    );

    var answerChoices = document.querySelectorAll(
        'input[name="answer_source"]'
    );

    var mergedQuestionInput = document.getElementById(
        "kt_merged_question"
    );

    var mergedAnswerInput = document.getElementById(
        "kt_merged_answer"
    );

    var questionSourceInput = document.getElementById(
        "kt_question_source"
    );

    var answerSourceInput = document.getElementById(
        "kt_answer_source"
    );

    function getSelectedQuestion() {
        return document.querySelector(
            'input[name="question_source"]:checked'
        );
    }

    function getSelectedAnswer() {
        return document.querySelector(
            'input[name="answer_source"]:checked'
        );
    }

    function updateSelectedCells(fieldName) {
        var choices = document.querySelectorAll(
            'input[name="' + fieldName + '"]'
        );

        choices.forEach(function (choice) {
            var cell = choice.closest(
                "[data-card-choice-cell]"
            );

            if (!cell) {
                return;
            }

            cell.classList.toggle(
                "bg-light-success",
                choice.checked
            );

            var text = cell.querySelector(
                ".text-gray-600, .text-gray-800, .text-gray-900"
            );

            if (text) {
                text.classList.toggle(
                    "text-gray-900",
                    choice.checked
                );

                text.classList.toggle(
                    "text-gray-600",
                    !choice.checked
                );
            }
        });
    }

    function updateMergedValues() {
        var selectedQuestion =
            getSelectedQuestion();

        var selectedAnswer =
            getSelectedAnswer();

        if (selectedQuestion) {
            mergedQuestionInput.value =
                selectedQuestion.dataset.content;

            questionSourceInput.value =
                selectedQuestion.value;
        }

        if (selectedAnswer) {
            mergedAnswerInput.value =
                selectedAnswer.dataset.content;

            answerSourceInput.value =
                selectedAnswer.value;
        }

        updateSelectedCells(
            "question_source"
        );

        updateSelectedCells(
            "answer_source"
        );
    }

    questionChoices.forEach(function (choice) {
        choice.addEventListener(
            "change",
            updateMergedValues
        );
    });

    answerChoices.forEach(function (choice) {
        choice.addEventListener(
            "change",
            updateMergedValues
        );
    });

    saveButton.addEventListener("click", function () {
        var selectedQuestion =
            getSelectedQuestion();

        var selectedAnswer =
            getSelectedAnswer();

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
            var modalInstance =
                bootstrap.Modal.getOrCreateInstance(
                    modalElement
                );

            saveButton.removeAttribute(
                "data-kt-indicator"
            );

            saveButton.disabled = false;

            modalInstance.hide();

            toastr.success(
                "Merged flashcard saved."
            );
        }, 500);
    });

    modalElement.addEventListener(
        "shown.bs.modal",
        updateMergedValues
    );

    updateMergedValues();
});