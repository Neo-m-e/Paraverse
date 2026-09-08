<div class="app-container container-xxl py-10 py-lg-15">

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-7 mb-10">

        <div>
            <h1 class="text-gray-900 fw-bold fs-2 mb-3">
                My library
            </h1>

            <p class="text-gray-600 fw-normal fs-7 mb-5">
                Manage your flashcards, follow your progress, and check your practice and exam performance.
            </p>

            <div class="overflow-auto">
                <ul class="nav nav-pills flex-nowrap d-inline-flex bg-gray-200 rounded p-1">

                    <li class="nav-item">
                        <a
                            href="/flashcards/"
                            class="nav-link text-nowrap text-gray-600 fw-semibold px-5 py-3"
                            onclick="KTApp.showPageLoading()">
                            Flashcards
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="/flashcards/learning-progress/"
                            class="nav-link text-nowrap text-gray-600 fw-semibold px-5 py-3"
                            onclick="KTApp.showPageLoading()">
                            Learning Progress
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="/flashcards/practice-test/"
                            class="nav-link text-nowrap text-gray-600 fw-semibold px-5 py-3"
                            onclick="KTApp.showPageLoading()">
                            Practice Test
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="/flashcards/exams/"
                            class="nav-link active bg-white text-gray-900 shadow-sm text-nowrap fw-semibold px-5 py-3"
                            aria-current="page">
                            Exam Results
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="d-flex flex-wrap gap-3">
            <a
                href="/flashcards/import/"
                class="btn btn-sm btn-primary"
                onclick="KTApp.showPageLoading()">

                Import

                <i class="ki-duotone ki-file-down fs-5 ms-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </a>

            <button
                type="button"
                class="btn btn-sm btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#kt_modal_create_exam">

                Create Exam

                <i class="ki-duotone ki-plus-square fs-5 ms-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
            </button>

            <a
                href="/flashcards/create/"
                class="btn btn-sm btn-primary"
                onclick="KTApp.showPageLoading()">

                Create Flashcards

                <i class="ki-duotone ki-plus-square fs-5 ms-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
            </a>
        </div>
    </div>

    <div class="card card-flush shadow-none">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-4 mb-0">

                    <thead>
                        <tr class="fw-bold text-gray-500 fs-8 text-uppercase bg-light">
                            <th class="ps-6 min-w-250px">Exam ID</th>
                            <th class="min-w-350px">Title &amp; Modules</th>
                            <th class="min-w-150px">Created</th>
                            <th class="min-w-125px">Status</th>
                            <th class="pe-6 min-w-200px text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="ps-6">
                                <div class="d-flex align-items-center">
                                    <span class="text-gray-600 fw-semibold fs-7 text-nowrap">
                                        EDITH-2601-3009-4138-57EC
                                    </span>

                                    <button
                                        type="button"
                                        class="btn btn-icon btn-sm btn-light-primary w-25px h-25px ms-2"
                                        data-action="copy-exam-id"
                                        data-exam-id="EDITH-2601-3009-4138-57EC"
                                        data-bs-toggle="tooltip"
                                        title="Copy exam ID">
                                        <i class="ki-duotone ki-copy fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-900 fw-bold fs-6 mb-2">
                                    GED0007 - Art Appreciation
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Painting
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Photography
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Music and Dance
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-700 fw-semibold fs-7">15 items</div>
                                <div class="text-gray-500 fs-8">Created 2026-03-12</div>
                            </td>

                            <td>
                                <span class="badge badge-light-success">Active</span>
                            </td>

                            <td class="pe-6 text-end">
                                <a
                                    href="/flashcards/pages/results.php?exam_id=EDITH-2601-3009-4138-57EC"
                                    class="btn btn-sm btn-light-primary text-nowrap"
                                    onclick="KTApp.showPageLoading()">
                                    <i class="ki-duotone ki-eye fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>

                                    View Student Results
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-6">
                                <div class="d-flex align-items-center">
                                    <span class="text-gray-600 fw-semibold fs-7 text-nowrap">
                                        EDITH-2602-1187-9924-3A6F
                                    </span>

                                    <button
                                        type="button"
                                        class="btn btn-icon btn-sm btn-light-primary w-25px h-25px ms-2"
                                        data-action="copy-exam-id"
                                        data-exam-id="EDITH-2602-1187-9924-3A6F"
                                        data-bs-toggle="tooltip"
                                        title="Copy exam ID">
                                        <i class="ki-duotone ki-copy fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-900 fw-bold fs-6 mb-2">
                                    GED0027 - Mathematics in Modern World
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Logic
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Problem Solving and Reasoning
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-700 fw-semibold fs-7">10 items</div>
                                <div class="text-gray-500 fs-8">Created 2026-03-18</div>
                            </td>

                            <td>
                                <span class="badge badge-light-primary">Ongoing</span>
                            </td>

                            <td class="pe-6 text-end">
                                <a
                                    href="/flashcards/pages/results.php?exam_id=EDITH-2602-1187-9924-3A6F"
                                    class="btn btn-sm btn-light-primary text-nowrap"
                                    onclick="KTApp.showPageLoading()">
                                    <i class="ki-duotone ki-eye fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>

                                    View Student Results
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-6">
                                <div class="d-flex align-items-center">
                                    <span class="text-gray-600 fw-semibold fs-7 text-nowrap">
                                        EDITH-2603-6471-8565-B7D1
                                    </span>

                                    <button
                                        type="button"
                                        class="btn btn-icon btn-sm btn-light-primary w-25px h-25px ms-2"
                                        data-action="copy-exam-id"
                                        data-exam-id="EDITH-2603-6471-8565-B7D1"
                                        data-bs-toggle="tooltip"
                                        title="Copy exam ID">
                                        <i class="ki-duotone ki-copy fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-900 fw-bold fs-6 mb-2">
                                    IT0083 - Game Design 1
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Font 2D and Sprite Effects
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Input and Collisions
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Save and Load
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-700 fw-semibold fs-7">25 items</div>
                                <div class="text-gray-500 fs-8">Created 2026-04-02</div>
                            </td>

                            <td>
                                <span class="badge badge-light-warning">Upcoming</span>
                            </td>

                            <td class="pe-6 text-end">
                                <a
                                    href="/flashcards/pages/results.php?exam_id=EDITH-2603-6471-8565-B7D1"
                                    class="btn btn-sm btn-light-primary text-nowrap"
                                    onclick="KTApp.showPageLoading()">
                                    <i class="ki-duotone ki-eye fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>

                                    View Student Results
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-6">
                                <div class="d-flex align-items-center">
                                    <span class="text-gray-600 fw-semibold fs-7 text-nowrap">
                                        EDITH-2603-8820-8612-9E4A
                                    </span>

                                    <button
                                        type="button"
                                        class="btn btn-icon btn-sm btn-light-primary w-25px h-25px ms-2"
                                        data-action="copy-exam-id"
                                        data-exam-id="EDITH-2603-8820-8612-9E4A"
                                        data-bs-toggle="tooltip"
                                        title="Copy exam ID">
                                        <i class="ki-duotone ki-copy fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-900 fw-bold fs-6 mb-2">
                                    IT0017 - Discrete Mathematics with Automata
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Mathematical Logic
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Formal Proofs
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Set Theory
                                    </span>

                                    <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                        Relations
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="text-gray-700 fw-semibold fs-7">12 items</div>
                                <div class="text-gray-500 fs-8">Created 2026-03-25</div>
                            </td>

                            <td>
                                <span class="badge badge-light-warning">Upcoming</span>
                            </td>

                            <td class="pe-6 text-end">
                                <a
                                    href="/flashcards/pages/results.php?exam_id=EDITH-2603-8820-8612-9E4A"
                                    class="btn btn-sm btn-light-primary text-nowrap"
                                    onclick="KTApp.showPageLoading()">
                                    <i class="ki-duotone ki-eye fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>

                                    View Student Results
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-flush shadow-none">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-4 mb-0">
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-5">
        <button
            type="button"
            class="btn btn-sm btn-light-primary"
            data-bs-toggle="modal"
            data-bs-target="#kt_modal_similar_card">

            <i class="ki-duotone ki-magnifier fs-5">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>

            Check Similar Cards
        </button>
    </div>

    <script src="/flashcards/assets/js/flashcards.js"></script>
</div>