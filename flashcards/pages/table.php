<?php

$examRows = [
    [
        'exam_id' => 'EDITH-2601-3009-4138-57EC',
        'title' => 'GED0007 - Art Appreciation',
        'modules' => ['Painting', 'Photography', 'Music and Dance'],
        'items' => 15,
        'created' => 'September 08, 2026',
        'status' => 'Active',
        'status_class' => 'badge-light-success'
    ],
    [
        'exam_id' => 'EDITH-2602-1187-9924-3A6F',
        'title' => 'GED0027 - Mathematics in Modern World',
        'modules' => ['Logic', 'Problem Solving and Reasoning'],
        'items' => 10,
        'created' => 'September 08, 2026',
        'status' => 'Ongoing',
        'status_class' => 'badge-light-primary'
    ],
    [
        'exam_id' => 'EDITH-2603-6471-8565-B7D1',
        'title' => 'IT0083 - Game Design 1',
        'modules' => ['Sprite Effects', 'Input and Collisions', 'Save and Load'],
        'items' => 25,
        'created' => 'September 08, 2026',
        'status' => 'Upcoming',
        'status_class' => 'badge-light-warning'
    ],
    [
        'exam_id' => 'EDITH-2603-8820-8612-9E4A',
        'title' => 'IT0017 - Discrete Mathematics with Automata',
        'modules' => ['Mathematical Logic', 'Formal Proofs', 'Relations'],
        'items' => 12,
        'created' => 'September 08, 2026',
        'status' => 'Upcoming',
        'status_class' => 'badge-light-warning'
    ],
    [
        'exam_id' => 'EDITH-2604-1259-7741-3B8D',
        'title' => 'CCS0001 - Introduction to Computing',
        'modules' => ['Computer Fundamentals', 'Information Systems'],
        'items' => 20,
        'created' => 'September 08, 2026',
        'status' => 'Active',
        'status_class' => 'badge-light-success'
    ],
    [
        'exam_id' => 'EDITH-2604-2398-6512-4C7E',
        'title' => 'CCS0003 - Computer Programming 1',
        'modules' => ['Variables', 'Conditions', 'Loops'],
        'items' => 30,
        'created' => 'September 08, 2026',
        'status' => 'Active',
        'status_class' => 'badge-light-success'
    ],
    [
        'exam_id' => 'EDITH-2605-3417-5283-5D6F',
        'title' => 'CCS0005 - Computer Programming 2',
        'modules' => ['Functions', 'Arrays', 'Objects'],
        'items' => 25,
        'created' => 'September 08, 2026',
        'status' => 'Ongoing',
        'status_class' => 'badge-light-primary'
    ],
    [
        'exam_id' => 'EDITH-2605-4576-4394-6E5A',
        'title' => 'CCS0007 - Data Structures',
        'modules' => ['Linked Lists', 'Stacks', 'Queues'],
        'items' => 40,
        'created' => 'September 08, 2026',
        'status' => 'Ongoing',
        'status_class' => 'badge-light-primary'
    ],
    [
        'exam_id' => 'EDITH-2606-5634-3175-7F4B',
        'title' => 'CCS0101 - Web Design',
        'modules' => ['HTML', 'CSS', 'Bootstrap'],
        'items' => 20,
        'created' => 'September 08, 2026',
        'status' => 'Active',
        'status_class' => 'badge-light-success'
    ],
    [
        'exam_id' => 'EDITH-2606-6782-2956-8A3C',
        'title' => 'CCS0102 - Web Development',
        'modules' => ['JavaScript', 'PHP', 'MySQL'],
        'items' => 35,
        'created' => 'September 08, 2026',
        'status' => 'Upcoming',
        'status_class' => 'badge-light-warning'
    ],
    [
        'exam_id' => 'EDITH-2607-7841-1737-9B2D',
        'title' => 'GED0019 - Readings in Philippine History',
        'modules' => ['Primary Sources', 'Historical Analysis'],
        'items' => 15,
        'created' => 'September 08, 2026',
        'status' => 'Active',
        'status_class' => 'badge-light-success'
    ],
    [
        'exam_id' => 'EDITH-2607-8963-9518-1C4E',
        'title' => 'GED0009 - Ethics',
        'modules' => ['Moral Reasoning', 'Ethical Theories'],
        'items' => 20,
        'created' => 'September 08, 2026',
        'status' => 'Ongoing',
        'status_class' => 'badge-light-primary'
    ]
];

function tableEscape($value)
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<div class="app-container container-xxl py-10 py-lg-15">

    <div class="mb-10">
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

    <div class="card card-bordered">

        <div class="card-header border-0 pt-6">

            <div class="card-title">
                <div class="d-flex align-items-center position-relative">

                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>

                    <input
                        id="kt_exam_datatable_search"
                        type="text"
                        class="form-control form-control-solid w-250px ps-12"
                        placeholder="Search exams">

                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex flex-wrap gap-3">

                    <a
                        href="/flashcards/import/"
                        class="btn btn-sm btn-primary"
                        onclick="KTApp.showPageLoading()">

                        <i class="ki-duotone ki-file-up fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>

                        Import Cards
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_exam">

                        <i class="ki-duotone ki-plus-square fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>

                        Create Exam
                    </button>

                    <a
                        href="/flashcards/create/"
                        class="btn btn-sm btn-primary"
                        onclick="KTApp.showPageLoading()">

                        <i class="ki-duotone ki-plus fs-4"></i>

                        Create Flashcards
                    </a>

                </div>
            </div>
        </div>

        <div class="card-body pt-0">

            <div class="table-responsive">
                <table
                    id="kt_exam_datatable"
                    class="table table-row-bordered gy-5 align-middle w-100">
                    <thead>
                        <tr class="fw-semibold fs-6 text-muted">

                            <th>
                                Exam ID
                            </th>

                            <th>
                                Title &amp; Modules
                            </th>

                            <th>
                                Created
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-end">
                                Actions
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($examRows as $exam): ?>

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <span class="text-gray-600 fw-semibold fs-7"> <?= tableEscape($exam['exam_id']) ?>
                                        </span>

                                        <button
                                            type="button"
                                            class="btn btn-icon btn-sm btn-light-primary w-25px h-25px ms-2"
                                            data-action="copy-exam-id"
                                            data-exam-id="<?= tableEscape($exam['exam_id']) ?>"
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
                                        <?= tableEscape($exam['title']) ?>
                                    </div>

                                    <div class="d-flex flex-wrap gap-2">

                                        <?php foreach ($exam['modules'] as $module): ?>

                                            <span class="badge badge-light text-gray-600 fw-semibold fs-8">
                                                <?= tableEscape($module) ?>
                                            </span>

                                        <?php endforeach; ?>

                                    </div>
                                </td>

                                <td>
                                    <div class="text-gray-700 fw-semibold fs-7">
                                        <?= (int) $exam['items'] ?> items
                                    </div>

                                    <div class="text-gray-500 fs-8">
                                        <?= tableEscape($exam['created']) ?>
                                    </div>
                                </td>

                                <td>
                                    <span class="badge <?= tableEscape($exam['status_class']) ?>">
                                        <?= tableEscape($exam['status']) ?>
                                    </span>
                                </td>

                                <td class="text-end">
                                    <a
                                        href="/flashcards/pages/results.php?exam_id=<?= urlencode($exam['exam_id']) ?>"
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

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <div class="d-flex justify-content-end mt-5">

        <a
            href="#kt_modal_similar_card"
            class="btn btn-sm btn-light-primary"
            data-bs-toggle="modal">

            <i class="ki-duotone ki-magnifier fs-5">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>

            Check Similar Cards
        </a>

    </div>
    <script src="/flashcards/assets/js/flashcards.js"></script>
</div>