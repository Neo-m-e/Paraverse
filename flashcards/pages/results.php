<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = 'Student Results';
$META_DESC = 'View exam scores and student performance.';

$exams = [
    'EDITH-2601-3009-4138-57EC' => [
        'title' => 'GED0007 - Art Appreciation',
        'items' => 15,
        'time_limit' => 60,
        'results' => [
            [
                'name' => 'Ana Marie Villanueva',
                'student_no' => '202210292',
                'course' => 'BSITBA',
                'email' => 'avillanueva@fit.edu.ph',
                'date_taken' => '2026-03-14',
                'score' => 14
            ],
            [
                'name' => 'Carlo Bautista',
                'student_no' => '202210184',
                'course' => 'BSITBA',
                'email' => 'cbautista@fit.edu.ph',
                'date_taken' => '2026-03-14',
                'score' => 11
            ],
            [
                'name' => 'Denise Ramos',
                'student_no' => '202210298',
                'course' => 'BSITBA',
                'email' => 'dramos@fit.edu.ph',
                'date_taken' => '2026-03-15',
                'score' => 15
            ],
            [
                'name' => 'Miguel Torres',
                'student_no' => '202210315',
                'course' => 'BSCS',
                'email' => 'mtorres@fit.edu.ph',
                'date_taken' => '2026-03-15',
                'score' => 10
            ],
            [
                'name' => 'Sophia Del Rosario',
                'student_no' => '202210327',
                'course' => 'BSITWMA',
                'email' => 'sdelrosario@fit.edu.ph',
                'date_taken' => '2026-03-15',
                'score' => 8
            ],
            [
                'name' => 'Josh Manuel',
                'student_no' => '202210341',
                'course' => 'BSCS',
                'email' => 'jmanuel@fit.edu.ph',
                'date_taken' => '2026-03-16',
                'score' => 12
            ]
        ]
    ],

    'EDITH-2602-1187-9924-3A6F' => [
        'title' => 'GED0027 - Mathematics in Modern World',
        'items' => 10,
        'time_limit' => 45,
        'results' => [
            [
                'name' => 'Ana Marie Villanueva',
                'student_no' => '202210292',
                'course' => 'BSITBA',
                'email' => 'avillanueva@fit.edu.ph',
                'date_taken' => '2026-03-18',
                'score' => 8
            ],
            [
                'name' => 'Carlo Bautista',
                'student_no' => '202210184',
                'course' => 'BSITBA',
                'email' => 'cbautista@fit.edu.ph',
                'date_taken' => '2026-03-18',
                'score' => 10
            ],
            [
                'name' => 'Denise Ramos',
                'student_no' => '202210298',
                'course' => 'BSITBA',
                'email' => 'dramos@fit.edu.ph',
                'date_taken' => '2026-03-19',
                'score' => 9
            ],
            [
                'name' => 'Miguel Torres',
                'student_no' => '202210315',
                'course' => 'BSCS',
                'email' => 'mtorres@fit.edu.ph',
                'date_taken' => '2026-03-19',
                'score' => 6
            ],
            [
                'name' => 'Sophia Del Rosario',
                'student_no' => '202210327',
                'course' => 'BSITWMA',
                'email' => 'sdelrosario@fit.edu.ph',
                'date_taken' => '2026-03-20',
                'score' => 7
            ]
        ]
    ],

    'EDITH-2603-6471-8565-B7D1' => [
        'title' => 'IT0083 - Game Design 1',
        'items' => 25,
        'time_limit' => 90,
        'results' => [
            [
                'name' => 'Carlo Bautista',
                'student_no' => '202210184',
                'course' => 'BSITBA',
                'email' => 'cbautista@fit.edu.ph',
                'date_taken' => '2026-04-02',
                'score' => 19
            ],
            [
                'name' => 'Denise Ramos',
                'student_no' => '202210298',
                'course' => 'BSITBA',
                'email' => 'dramos@fit.edu.ph',
                'date_taken' => '2026-04-02',
                'score' => 23
            ],
            [
                'name' => 'Miguel Torres',
                'student_no' => '202210315',
                'course' => 'BSCS',
                'email' => 'mtorres@fit.edu.ph',
                'date_taken' => '2026-04-03',
                'score' => 21
            ],
            [
                'name' => 'Josh Manuel',
                'student_no' => '202210341',
                'course' => 'BSCS',
                'email' => 'jmanuel@fit.edu.ph',
                'date_taken' => '2026-04-03',
                'score' => 17
            ]
        ]
    ],

    'EDITH-2603-8820-8612-9E4A' => [
        'title' => 'IT0017 - Discrete Mathematics with Automata',
        'items' => 12,
        'time_limit' => 60,
        'results' => [
            [
                'name' => 'Ana Marie Villanueva',
                'student_no' => '202210292',
                'course' => 'BSITBA',
                'email' => 'avillanueva@fit.edu.ph',
                'date_taken' => '2026-03-25',
                'score' => 7
            ],
            [
                'name' => 'Denise Ramos',
                'student_no' => '202210298',
                'course' => 'BSITBA',
                'email' => 'dramos@fit.edu.ph',
                'date_taken' => '2026-03-25',
                'score' => 11
            ],
            [
                'name' => 'Sophia Del Rosario',
                'student_no' => '202210327',
                'course' => 'BSITWMA',
                'email' => 'sdelrosario@fit.edu.ph',
                'date_taken' => '2026-03-26',
                'score' => 9
            ],
            [
                'name' => 'Josh Manuel',
                'student_no' => '202210341',
                'course' => 'BSCS',
                'email' => 'jmanuel@fit.edu.ph',
                'date_taken' => '2026-03-26',
                'score' => 8
            ]
        ]
    ]
];

$examId = isset($_GET['exam_id'])
    ? trim($_GET['exam_id'])
    : '';

$exam = $exams[$examId] ?? null;

if ($exam === null) {
    http_response_code(404);
    $META_TITLE = 'Exam Not Found';
}

function resultEscape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function getStudentInitials($name)
{
    $words = preg_split('/\s+/', trim($name));
    $initials = '';

    foreach (array_slice($words, 0, 2) as $word) {
        $initials .= substr($word, 0, 1);
    }

    return strtoupper($initials);
}

$totalTakers = 0;
$averageScore = 0;
$highestScore = 0;

if ($exam !== null) {
    $percentages = [];

    foreach ($exam['results'] as $result) {
        $percentages[] = round(
            ($result['score'] / $exam['items']) * 100
        );
    }

    $totalTakers = count($percentages);

    if ($totalTakers > 0) {
        $averageScore = round(
            array_sum($percentages) / $totalTakers,
            1
        );

        $highestScore = max($percentages);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php HEAD_ESSENTIALS(); ?>
</head>

<body
    id="kt_app_body"
    data-kt-app-page-loading-enabled="true"
    data-kt-app-page-loading="on"
    data-kt-app-layout="light-header"
    data-kt-app-header-fixed="true"
    data-kt-app-header-fixed-mobile="true"
    class="app-default">

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/flashcards/partials/_page-loader.php'); ?>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/flashcards/partials/_header.php'); ?>

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                    <div class="d-flex flex-column flex-column-fluid">
                        <main>
                            <div id="kt_app_content" class="flex-column-fluid">
                                <div
                                    id="kt_app_content_container"
                                    class="app-container container-xxl py-8 py-lg-10">

                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-8">
                                        <li class="breadcrumb-item text-muted">
                                            <a
                                                href="/flashcards/"
                                                class="text-muted text-hover-primary"
                                                onclick="KTApp.showPageLoading()">
                                                Exams / Quiz
                                            </a>
                                        </li>

                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>

                                        <li class="breadcrumb-item text-gray-900">
                                            Student Results
                                        </li>
                                    </ul>

                                    <?php if ($exam === null): ?>

                                        <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5">
                                            <i class="ki-duotone ki-information-5 fs-2hx text-danger me-4 mb-5 mb-sm-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>

                                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                                <h4 class="fw-semibold">
                                                    Exam not found
                                                </h4>

                                                <span>
                                                    The selected exam ID does not exist.
                                                </span>
                                            </div>
                                        </div>

                                    <?php else: ?>

                                        <div class="mb-7">
                                            <h1 class="text-gray-900 fw-bold fs-2 mb-3">
                                                <?= resultEscape($exam['title']) ?>
                                            </h1>

                                            <div class="d-flex flex-wrap align-items-center gap-3 text-gray-500 fs-7">
                                                <span>
                                                    <?= resultEscape($examId) ?>
                                                </span>

                                                <span class="bullet bg-gray-400 w-4px h-4px"></span>

                                                <span>
                                                    <?= (int) $exam['items'] ?> Items
                                                </span>

                                                <span class="bullet bg-gray-400 w-4px h-4px"></span>

                                                <span>
                                                    <?= (int) $exam['time_limit'] ?> min Limit
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row g-5 mb-7">
                                            <div class="col-md-4">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-body py-5">
                                                        <div class="text-gray-500 fw-semibold fs-7 mb-1">
                                                            Average Score
                                                        </div>

                                                        <div class="text-gray-900 fw-bold fs-2">
                                                            <?= resultEscape(number_format($averageScore, 1)) ?>%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-body py-5">
                                                        <div class="text-gray-500 fw-semibold fs-7 mb-1">
                                                            Total Takers
                                                        </div>

                                                        <div class="text-gray-900 fw-bold fs-2">
                                                            <?= $totalTakers ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-body py-5">
                                                        <div class="text-gray-500 fw-semibold fs-7 mb-1">
                                                            Highest Score
                                                        </div>

                                                        <div class="text-gray-900 fw-bold fs-2">
                                                            <?= $highestScore ?>%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center position-relative mb-5">
                                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>

                                            <input
                                                id="student-results-search"
                                                type="text"
                                                class="form-control form-control-solid w-250px ps-12"
                                                placeholder="Search student name...">
                                        </div>

                                        <div class="card card-bordered">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table
                                                        id="student-results-table"
                                                        class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-4 mb-0">

                                                        <thead>
                                                            <tr class="fw-bold text-gray-500 fs-8 text-uppercase bg-light">
                                                                <th class="ps-6 min-w-300px">
                                                                    Student
                                                                </th>

                                                                <th class="min-w-150px">
                                                                    Date Taken
                                                                </th>

                                                                <th class="min-w-125px text-end">
                                                                    Raw Score
                                                                </th>

                                                                <th class="pe-6 min-w-100px text-end">
                                                                    Score
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php

                                                            $avatarColors = [
                                                                'success',
                                                                'primary',
                                                                'info',
                                                                'warning',
                                                                'danger'
                                                            ];

                                                            ?>

                                                            <?php foreach ($exam['results'] as $index => $result): ?>

                                                                <?php

                                                                $percentage = round(
                                                                    ($result['score'] / $exam['items']) * 100
                                                                );

                                                                if ($percentage >= 80) {
                                                                    $scoreColor = 'success';
                                                                } elseif ($percentage >= 70) {
                                                                    $scoreColor = 'warning';
                                                                } else {
                                                                    $scoreColor = 'danger';
                                                                }

                                                                $avatarColor = $avatarColors[$index % count($avatarColors)];

                                                                ?>

                                                                <tr data-student-result-row>
                                                                    <td class="ps-6">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="symbol symbol-35px symbol-circle me-4">
                                                                                <span
                                                                                    class="symbol-label bg-light-<?= $avatarColor ?> text-<?= $avatarColor ?> fw-bold">
                                                                                    <?= resultEscape(
                                                                                        getStudentInitials($result['name'])
                                                                                    ) ?>
                                                                                </span>
                                                                            </div>

                                                                            <div>
                                                                                <div class="text-gray-900 fw-semibold fs-7">
                                                                                    <?= resultEscape($result['name']) ?>
                                                                                </div>

                                                                                <div class="text-gray-500 fs-8">
                                                                                    <?= resultEscape($result['student_no']) ?>
                                                                                    |
                                                                                    <?= resultEscape($result['course']) ?>
                                                                                    |
                                                                                    <?= resultEscape($result['email']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-gray-600 fs-7">
                                                                        <?= resultEscape($result['date_taken']) ?>
                                                                    </td>

                                                                    <td class="text-end text-gray-600 fs-7">
                                                                        <?= (int) $result['score'] ?>/<?= (int) $exam['items'] ?>
                                                                    </td>

                                                                    <td class="pe-6 text-end">
                                                                        <span class="text-<?= $scoreColor ?> fw-bold fs-7">
                                                                            <?= $percentage ?>%
                                                                        </span>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>

                                                            <tr
                                                                id="student-results-empty"
                                                                class="d-none">

                                                                <td
                                                                    colspan="4"
                                                                    class="text-center text-gray-500 py-10">
                                                                    No matching students found.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-stack flex-wrap pt-7">
                                            <div
                                                id="student-results-count"
                                                class="text-gray-500 fs-7">

                                                Showing <?= $totalTakers ?> of
                                                <?= $totalTakers ?> results
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                </div>
                            </div>
                        </main>
                    </div>

                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/flashcards/partials/_footer.php'); ?>

                </div>
            </div>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/flashcards/partials/_scrolltop.php'); ?>

    <?php if ($exam !== null): ?>
        <script src="/flashcards/assets/js/results.js"></script>
    <?php endif; ?>

</body>

</html>