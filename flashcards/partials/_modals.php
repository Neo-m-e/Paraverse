<div
    class="modal fade"
    id="kt_modal_create_exam"
    tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mw-1000px">
        <form
            id="kt_create_exam_form"
            class="modal-content"
            method="post"
            action="#">
            <div class="modal-header">
                <div>
                    <h2 class="fw-bold text-gray-900 mb-1">
                        Create New Exam
                    </h2>

                    <div class="text-gray-500 fw-semibold fs-7">
                        Configure modules, question types, and access
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-light">
                        EDITH-2601-3009-4138-57EC
                    </span>

                    <button
                        type="button"
                        class="btn btn-icon btn-sm btn-active-icon-primary"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </button>
                </div>
            </div>
            <div class="modal-body scroll-y py-8 px-lg-10">

                <div class="row g-5 mb-8">
                    <div class="col-lg-4">
                        <label
                            for="kt_exam_title"
                            class="form-label fw-bold fs-7">
                            Exam Title
                        </label>

                        <select
                            id="kt_exam_title"
                            name="exam_title"
                            class="form-select form-select-solid"
                            data-control="select2"
                            data-hide-search="true"
                            data-dropdown-parent="#kt_modal_create_exam"
                            data-placeholder="Select a course">
                            <option></option>
                            <option value="GED0007">
                                GED0007 - Art Appreciation
                            </option>
                            <option value="GED0027">
                                GED0027 - Mathematics in Modern World
                            </option>
                            <option value="IT0083">
                                IT0083 - Game Design 1
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label
                            for="kt_exam_date_range"
                            class="form-label fw-bold fs-7">
                            Exam Date
                        </label>

                        <div class="position-relative">
                            <i class="ki-duotone ki-calendar fs-3 position-absolute top-50 translate-middle-y ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>

                            <input
                                type="text"
                                id="kt_exam_date_range"
                                name="exam_date_range"
                                class="form-control form-control-solid ps-12"
                                placeholder="Select date range"
                                autocomplete="off">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label
                            for="kt_exam_time_limit"
                            class="form-label fw-bold fs-7">
                            Time Limit (mins)
                        </label>

                        <div class="position-relative">
                            <i class="ki-duotone ki-time fs-3 position-absolute top-50 translate-middle-y ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>

                            <input
                                type="number"
                                id="kt_exam_time_limit"
                                name="time_limit"
                                class="form-control form-control-solid ps-12"
                                value="60"
                                min="1">
                        </div>
                    </div>
                </div>
                <div class="mb-8">
                    <label class="form-label fw-bold fs-7">
                        Modules
                    </label>

                    <div class="row align-items-stretch g-5">

                        <div class="col-lg-5">
                            <div class="card card-bordered h-100">
                                <div class="card-header min-h-50px">
                                    <div class="card-title">
                                        <h3 class="card-label fw-bold fs-6">
                                            JAVA
                                        </h3>
                                    </div>

                                    <div class="card-toolbar">
                                        <span
                                            id="kt_available_module_count"
                                            class="badge badge-light-primary">
                                            4 available
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div
                                        id="kt_available_modules"
                                        class="row row-cols-1 g-3 min-h-200px draggable-zone">
                                        <div class="col draggable">
                                            <div class="card bg-light">
                                                <div class="card-body d-flex align-items-center justify-content-between p-4">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-category fs-3 text-danger me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>

                                                        <span class="text-gray-900 fw-semibold fs-7">
                                                            Subject and Content in Art
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle"
                                                        aria-label="Drag Subject and Content in Art">
                                                        <i class="bi bi-grip-vertical fs-3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col draggable">
                                            <div class="card bg-light">
                                                <div class="card-body d-flex align-items-center justify-content-between p-4">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-category fs-3 text-warning me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>

                                                        <span class="text-gray-900 fw-semibold fs-7">
                                                            Painting
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle"
                                                        aria-label="Drag Painting">
                                                        <i class="bi bi-grip-vertical fs-3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col draggable">
                                            <div class="card bg-light">
                                                <div class="card-body d-flex align-items-center justify-content-between p-4">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-category fs-3 text-primary me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>

                                                        <span class="text-gray-900 fw-semibold fs-7">
                                                            Photography
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle"
                                                        aria-label="Drag Photography">
                                                        <i class="bi bi-grip-vertical fs-3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col draggable">
                                            <div class="card bg-light">
                                                <div class="card-body d-flex align-items-center justify-content-between p-4">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-category fs-3 text-success me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>

                                                        <span class="text-gray-900 fw-semibold fs-7">
                                                            Music and Dance
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle"
                                                        aria-label="Drag Music and Dance">
                                                        <i class="bi bi-grip-vertical fs-3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex flex-column align-items-center justify-content-center">
                            <span class="btn btn-icon btn-circle btn-light-primary mb-3">
                                <i class="bi bi-shuffle fs-2"></i>
                            </span>

                            <span class="text-gray-500 fw-semibold fs-8 text-center">
                                Drag and drop
                            </span>
                        </div>
                        <div class="col-lg-5">
                            <div class="card card-bordered border-primary border-dashed h-100">
                                <div class="card-header min-h-50px">
                                    <div class="card-title">
                                        <h3 class="card-label fw-bold fs-6 text-primary">
                                            Included in Exam
                                        </h3>
                                    </div>

                                    <div class="card-toolbar">
                                        <span
                                            id="kt_selected_module_count"
                                            class="badge badge-light-primary">
                                            1 selected
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div
                                        id="kt_included_modules"
                                        class="row row-cols-1 g-3 min-h-200px draggable-zone">
                                        <div class="col draggable">
                                            <div class="card bg-light">
                                                <div class="card-body d-flex align-items-center justify-content-between p-4">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-category fs-3 text-success me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>

                                                        <span class="text-gray-900 fw-semibold fs-7">
                                                            Sculpture
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle"
                                                        aria-label="Drag Sculpture">
                                                        <i class="bi bi-grip-vertical fs-3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mb-8">
                    <label class="form-label fw-bold fs-7">
                        Question Types
                    </label>

                    <div class="row g-5">
                        <div class="col-md-4">
                            <input
                                type="checkbox"
                                class="btn-check"
                                id="kt_question_multiple_choice"
                                name="question_types[]"
                                value="multiple_choice"
                                checked>

                            <label
                                class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-column align-items-start w-100 h-100 p-5"
                                for="kt_question_multiple_choice">
                                <i class="ki-duotone ki-row-horizontal fs-2x text-primary mb-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>

                                <span class="text-gray-900 fw-bold fs-6 mb-1">
                                    Multiple Choice
                                </span>

                                <span class="text-gray-500 fw-semibold fs-8">
                                    Students pick from 4 options
                                </span>
                            </label>
                        </div>

                        <div class="col-md-4">
                            <input
                                type="checkbox"
                                class="btn-check"
                                id="kt_question_identification"
                                name="question_types[]"
                                value="identification">

                            <label
                                class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-column align-items-start w-100 h-100 p-5"
                                for="kt_question_identification">
                                <i class="ki-duotone ki-text fs-2x text-gray-500 mb-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>

                                <span class="text-gray-900 fw-bold fs-6 mb-1">
                                    Identification
                                </span>

                                <span class="text-gray-500 fw-semibold fs-8">
                                    Students type a short answer
                                </span>
                            </label>
                        </div>

                        <div class="col-md-4">
                            <input
                                type="checkbox"
                                class="btn-check"
                                id="kt_question_true_false"
                                name="question_types[]"
                                value="true_false">

                            <label
                                class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-column align-items-start w-100 h-100 p-5"
                                for="kt_question_true_false">
                                <i class="ki-duotone ki-toggle-on fs-2x text-gray-500 mb-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>

                                <span class="text-gray-900 fw-bold fs-6 mb-1">
                                    True or False
                                </span>

                                <span class="text-gray-500 fw-semibold fs-8">
                                    Students choose true or false
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label fw-bold fs-7">
                        Assign To
                    </label>

                    <div class="d-flex flex-column flex-md-row gap-3 mb-5">
                        <select
                            id="kt_student_search"
                            class="form-select form-select-solid flex-grow-1"
                            data-control="select2"
                            data-placeholder="Search and select students"
                            data-dropdown-parent="#kt_modal_create_exam"
                            multiple>
                            <option></option>

                            <option
                                value="202210292"
                                data-name="Ana Marie Villanueva"
                                data-course="BSITBA"
                                data-course-name="Bachelor of Science in Information Technology with specialization in Business Analytics"
                                data-email="avillanueva@fit.edu.ph">
                                Ana Marie Villanueva
                            </option>

                            <option
                                value="202210293"
                                data-name="Carlo Bautista"
                                data-course="BSITBA"
                                data-course-name="Bachelor of Science in Information Technology with specialization in Business Analytics"
                                data-email="cbautista@fit.edu.ph">
                                Carlo Bautista
                            </option>

                            <option
                                value="202210294"
                                data-name="Denise Ramos"
                                data-course="BSITBA"
                                data-course-name="Bachelor of Science in Information Technology with specialization in Business Analytics"
                                data-email="dramos@fit.edu.ph">
                                Denise Ramos
                            </option>

                            <option
                                value="202210295"
                                data-name="Miguel Torres"
                                data-course="BSITAGD"
                                data-course-name="Bachelor of Science in Information Technology with specialization in Animation and Game Development"
                                data-email="mtorres@fit.edu.ph">
                                Miguel Torres
                            </option>

                            <option
                                value="202210296"
                                data-name="Sophia Del Rosario"
                                data-course="BSCS"
                                data-course-name="Bachelor of Science in Computer Science"
                                data-email="sdelrosario@fit.edu.ph">
                                Sophia Del Rosario
                            </option>

                            <option
                                value="202210297"
                                data-name="Josh Manuel"
                                data-course="BSITWMA"
                                data-course-name="Bachelor of Science in Information Technology with specialization in Web and Mobile Application"
                                data-email="jmanuel@fit.edu.ph">
                                Josh Manuel
                            </option>
                        </select>

                        <input
                            type="file"
                            id="kt_import_students_file"
                            class="d-none"
                            accept=".csv">

                        <button
                            type="button"
                            id="kt_import_students_button"
                            class="btn btn-primary text-nowrap">
                            <i class="ki-duotone ki-file-up fs-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>

                            Import Students
                        </button>
                    </div>

                    <div
                        id="kt_assigned_students_empty"
                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-5">
                        <i class="ki-duotone ki-information-5 fs-2x text-primary me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>

                        <div class="text-gray-700 fw-semibold fs-7">
                            Search students or import a CSV file.
                        </div>
                    </div>

                    <div
                        id="kt_assigned_students"
                        class="d-flex flex-column gap-3"></div>
                </div>

            </div>

            <div class="modal-footer justify-content-between">
                <div class="text-gray-500 fw-semibold fs-8">
                    <span id="kt_footer_module_count">
                        1 module selected
                    </span>

                    <span> • </span>

                    <span id="kt_footer_question_count">
                        1 question type
                    </span>
                </div>

                <div>
                    <button
                        type="button"
                        class="btn btn-light me-3"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Create Exam
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div
    class="modal fade"
    id="kt_modal_similar_card"
    tabindex="-1"
    aria-labelledby="kt_modal_similar_card_label"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="d-flex align-items-center bg-light-warning border-bottom border-warning rounded-top p-4">

                <i class="ki-duotone ki-information-5 fs-2 text-warning me-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>

                <div class="d-flex flex-column flex-grow-1">
                    <span
                        id="kt_modal_similar_card_label"
                        class="text-gray-900 fw-bold fs-7">
                        Similar Card Found
                    </span>

                    <span class="text-gray-600 fw-semibold fs-8">
                        Compare your draft with the existing card before saving.
                    </span>
                </div>

                <span class="badge badge-warning rounded-pill px-5 py-2 me-3">
                    81% Match
                </span>

                <button
                    type="button"
                    class="btn btn-sm btn-icon btn-active-light-warning"
                    data-bs-dismiss="modal"
                    aria-label="Close">

                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>

            </div>

            <div class="modal-body p-0">

                <div class="table-responsive">
                    <table class="table table-row-bordered align-middle gy-4 gs-5 mb-0">

                        <thead>
                            <tr class="fw-bold text-gray-500 fs-8 text-uppercase bg-light">

                                <th class="min-w-125px">
                                    Field
                                </th>

                                <th class="min-w-300px">
                                    <div class="d-flex align-items-center">

                                        <i class="ki-duotone ki-folder fs-3 text-primary me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>

                                        <span class="text-primary">
                                            Your Draft
                                        </span>

                                    </div>
                                </th>

                                <th class="min-w-300px">
                                    <div class="d-flex align-items-center">

                                        <i class="ki-duotone ki-folder fs-3 text-success me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>

                                        <span class="text-success">
                                            Existing
                                        </span>

                                    </div>
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                    <span class="text-gray-900 fw-bold fs-8">
                                        Course Details
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-start">

                                        <i class="ki-duotone ki-book-open fs-3 text-primary me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>

                                        <div class="d-flex flex-column">

                                            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">

                                                <span class="badge badge-light-primary">
                                                    IT0017
                                                </span>

                                                <span class="text-gray-900 fw-semibold fs-8">
                                                    Discrete Mathematics
                                                </span>

                                            </div>

                                            <div class="d-flex flex-wrap align-items-center gap-2">

                                                <span class="text-gray-500 fw-semibold fs-8">
                                                    Modules:
                                                </span>

                                                <span class="badge badge-light">
                                                    Mathematical Logic
                                                </span>

                                                <span class="badge badge-light">
                                                    Relations
                                                </span>

                                            </div>

                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-start">

                                        <i class="ki-duotone ki-book-open fs-3 text-success me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>

                                        <div class="d-flex flex-column">

                                            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">

                                                <span class="badge badge-light-primary">
                                                    IT0017
                                                </span>

                                                <span class="text-gray-900 fw-semibold fs-8">
                                                    Discrete Mathematics
                                                </span>

                                            </div>

                                            <div class="d-flex flex-wrap align-items-center gap-2">

                                                <span class="text-gray-500 fw-semibold fs-8">
                                                    Modules:
                                                </span>

                                                <span class="badge badge-light">
                                                    Mathematical Logic
                                                </span>

                                                <span class="badge badge-light">
                                                    Relations
                                                </span>

                                            </div>

                                        </div>

                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <span class="text-gray-900 fw-bold fs-8">
                                        Question
                                    </span>
                                </td>

                                <td>
                                    <div class="text-gray-800 fw-semibold fs-8">
                                        Which

                                        <span class="badge badge-light-success">
                                            three properties
                                        </span>

                                        must a

                                        <span class="badge badge-light-warning">
                                            relation
                                        </span>

                                        satisfy to be classified as an

                                        <span class="badge badge-light-primary">
                                            equivalence relation
                                        </span>?
                                    </div>
                                </td>
                                <td>
                                    <div class="text-gray-800 fw-semibold fs-8">
                                        A

                                        <span class="badge badge-light-warning">
                                            relation
                                        </span>

                                        on a set must satisfy which

                                        <span class="badge badge-light-success">
                                            three properties
                                        </span>

                                        to qualify as an

                                        <span class="badge badge-light-primary">
                                            equivalence relation
                                        </span>?
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <span class="text-gray-900 fw-bold fs-8">
                                        Answer / Choices
                                    </span>
                                </td>
                                <td>
                                    <div class="text-gray-800 fw-semibold fs-8">

                                        <span class="badge badge-light-info">
                                            Reflexivity
                                        </span>,

                                        <span class="badge badge-light-danger">
                                            symmetry
                                        </span>

                                        and

                                        <span class="badge badge-light-success">
                                            transitivity
                                        </span>.

                                    </div>
                                </td>

                                <td>
                                    <div class="text-gray-800 fw-semibold fs-8">

                                        <span class="badge badge-light-info">
                                            Reflexive
                                        </span>,

                                        <span class="badge badge-light-danger">
                                            symmetric
                                        </span>

                                        and

                                        <span class="badge badge-light-success">
                                            transitive
                                        </span>

                                        properties.

                                    </div>
                                </td>

                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            <div class="modal-footer justify-content-between py-4">

                <div class="text-gray-500 fw-semibold fs-8">
                    Source card:

                    <span class="text-gray-700">
                        EDITH-2601-3009-4138-57EC
                    </span>
                </div>

                <div class="d-flex gap-3">

                    <a
                        href="#discard-draft"
                        class="btn btn-sm btn-light">

                        <i class="ki-duotone ki-cross fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>

                        Discard Draft
                    </a>

                    <a
                        href="#save-anyway"
                        class="btn btn-sm btn-primary">

                        <i class="ki-duotone ki-save-2 fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>

                        Save Anyway
                    </a>

                </div>

            </div>

        </div>
    </div>
</div>
