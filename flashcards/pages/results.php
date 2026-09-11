<?php

define('MBG', TRUE);

include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = 'Student Results';
$META_DESC = 'View exam scores and student performance.';

$students = [
    [
        'name' => 'Ana Marie Villanueva',
        'student_no' => '202210292',
        'course' => 'BSITBA',
        'email' => 'avillanueva@fit.edu.ph'
    ],
    [
        'name' => 'Carlo Bautista',
        'student_no' => '202210184',
        'course' => 'BSITBA',
        'email' => 'cbautista@fit.edu.ph'
    ],
    [
        'name' => 'Denise Ramos',
        'student_no' => '202210298',
        'course' => 'BSITBA',
        'email' => 'dramos@fit.edu.ph'
    ],
    [
        'name' => 'Miguel Torres',
        'student_no' => '202210315',
        'course' => 'BSCS',
        'email' => 'mtorres@fit.edu.ph'
    ],
    [
        'name' => 'Sophia Del Rosario',
        'student_no' => '202210327',
        'course' => 'BSITWMA',
        'email' => 'sdelrosario@fit.edu.ph'
    ],
    [
        'name' => 'Josh Manuel',
        'student_no' => '202210341',
        'course' => 'BSCS',
        'email' => 'jmanuel@fit.edu.ph'
    ],
    [
        'name' => 'Gabriel Tristan Olayon',
        'student_no' => '202210356',
        'course' => 'BSITAGD',
        'email' => 'golayon@fit.edu.ph'
    ],
    [
        'name' => 'Jehosaphat Figuera',
        'student_no' => '202210372',
        'course' => 'BSITWMA',
        'email' => 'jfiguera@fit.edu.ph'
    ],
    [
        'name' => 'Timothy Alec Gonda',
        'student_no' => '202210389',
        'course' => 'BSITAGD',
        'email' => 'tgonda@fit.edu.ph'
    ],
    [
        'name' => 'Vien Rykel Mendiola',
        'student_no' => '202210403',
        'course' => 'BSCS',
        'email' => 'vmendiola@fit.edu.ph'
    ],
    [
        'name' => 'Cristina Alarcon',
        'student_no' => '202210417',
        'course' => 'BSCE',
        'email' => 'calarcon@fit.edu.ph'
    ],
    [
        'name' => 'Maxeene Alyssa Gamas',
        'student_no' => '202210429',
        'course' => 'BSITBA',
        'email' => 'mgamas@fit.edu.ph'
    ]
];


$examDefinitions = [
    'EDITH-2601-3009-4138-57EC' => [
        'title' => 'GED0007 - Art Appreciation',
        'items' => 15,
        'time_limit' => 60,
        'status' => 'Completed',
        'scores' => [14, 11, 15, 10, 8, 12, 13, 9, 14, 11, 7, 12]
    ],

    'EDITH-2602-1187-9924-3A6F' => [
        'title' => 'GED0027 - Mathematics in Modern World',
        'items' => 10,
        'time_limit' => 45,
        'status' => 'In Progress',
        'scores' => [8, 10, 9, 6, 7, 8, 5, 9, 7, 10, 6, 8]
    ],

    'EDITH-2603-6471-8565-B7D1' => [
        'title' => 'IT0083 - Game Design 1',
        'items' => 25,
        'time_limit' => 90,
        'status' => 'Upcoming',
        'scores' => []
    ],

    'EDITH-2603-8820-8612-9E4A' => [
        'title' => 'IT0017 - Discrete Mathematics with Automata',
        'items' => 12,
        'time_limit' => 60,
        'status' => 'Upcoming',
        'scores' => []
    ],

    'EDITH-2604-1259-7741-3B8D' => [
        'title' => 'CCS0001 - Introduction to Computing',
        'items' => 20,
        'time_limit' => 60,
        'status' => 'Completed',
        'scores' => [17, 18, 19, 14, 16, 20, 15, 18, 13, 17, 16, 19]
    ],

    'EDITH-2604-2398-6512-4C7E' => [
        'title' => 'CCS0003 - Computer Programming 1',
        'items' => 30,
        'time_limit' => 90,
        'status' => 'Completed',
        'scores' => [25, 27, 29, 21, 24, 28, 23, 26, 20, 25, 22, 27]
    ],

    'EDITH-2605-3417-5283-5D6F' => [
        'title' => 'CCS0005 - Computer Programming 2',
        'items' => 25,
        'time_limit' => 90,
        'status' => 'In Progress',
        'scores' => [20, 22, 24, 17, 19, 23, 18, 21, 16, 20, 19, 22]
    ],

    'EDITH-2605-4576-4394-6E5A' => [
        'title' => 'CCS0007 - Data Structures',
        'items' => 40,
        'time_limit' => 120,
        'status' => 'In Progress',
        'scores' => [32, 35, 38, 27, 30, 36, 29, 34, 25, 33, 28, 37]
    ],

    'EDITH-2606-5634-3175-7F4B' => [
        'title' => 'CCS0101 - Web Design',
        'items' => 20,
        'time_limit' => 60,
        'status' => 'Completed',
        'scores' => [17, 19, 20, 14, 16, 18, 15, 19, 13, 17, 16, 18]
    ],

    'EDITH-2606-6782-2956-8A3C' => [
        'title' => 'CCS0102 - Web Development',
        'items' => 35,
        'time_limit' => 100,
        'status' => 'Cancelled',
        'scores' => []
    ],

    'EDITH-2607-7841-1737-9B2D' => [
        'title' => 'GED0019 - Readings in Philippine History',
        'items' => 15,
        'time_limit' => 60,
        'status' => 'Completed',
        'scores' => [12, 14, 15, 10, 11, 13, 9, 14, 8, 12, 10, 13]
    ],

    'EDITH-2607-8963-9518-1C4E' => [
        'title' => 'GED0009 - Ethics',
        'items' => 20,
        'time_limit' => 60,
        'status' => 'In Progress',
        'scores' => [16, 18, 19, 13, 15, 17, 14, 18, 12, 16, 15, 19]
    ]
];



$examId = isset($_GET['exam_id'])
    ? trim((string) $_GET['exam_id'])
    : '';

$exam = $examDefinitions[$examId] ?? null;

if ($exam === null) {
    http_response_code(404);
    $META_TITLE = 'Exam Not Found';
}

function getStudentInitials($name)
{
    $words = preg_split(
        '/\s+/',
        trim((string) $name)
    );

    $initials = '';

    foreach (array_slice($words, 0, 2) as $word) {
        $initials .= substr($word, 0, 1);
    }

    return strtoupper($initials);
}

$results = [];
$totalTakers = 0;
$averageScore = 0;
$highestScore = 0;

$isUpcoming = (
    $exam !== null &&
    $exam['status'] === 'Upcoming'
);

if ($exam !== null && !$isUpcoming) {
    $resultStatuses = [
        'Completed',
        'Completed',
        'Pending',
        'Completed',
        'No Response',
        'Completed',
        'Pending',
        'Completed',
        'Completed',
        'No Response',
        'Completed',
        'Pending'
    ];

    foreach ($students as $index => $student) {
        if (!isset($exam['scores'][$index])) {
            continue;
        }

        $results[] = array_merge(
            $student,
            [
                'date_taken' => $resultStatuses[$index] === 'No Response'
                    ? null
                    : '2026-09-08',
                'score' => $resultStatuses[$index] === 'No Response'
                    ? null
                    : $exam['scores'][$index],
                'result_status' => $resultStatuses[$index]
            ]
        );
    }

    $percentages = [];

    foreach ($results as $result) {
        if ($result['result_status'] === 'No Response') {
            continue;
        }

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

    <link
        href="/assets/plugins/custom/datatables/datatables.bundle.css"
        rel="stylesheet"
        type="text/css">
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
                                                Exam Results
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

                                        <div class="alert bg-light-danger d-flex p-5">

                                            <i class="ki-duotone ki-information-5 fs-2hx text-danger me-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>

                                            <div class="d-flex flex-column">
                                                <h4 class="text-danger fw-bold mb-1">
                                                    Exam not found
                                                </h4>

                                                <span class="text-gray-700 fw-semibold">
                                                    The selected exam does not exist.
                                                </span>
                                            </div>

                                        </div>

                                    <?php else: ?>

                                        <div class="mb-7">

                                            <div class="d-flex flex-wrap align-items-center gap-3 mb-3">

                                                <h1 class="text-gray-900 fw-bold fs-2 mb-0">
                                                    <?= htmlspecialchars($exam['title'], ENT_QUOTES, 'UTF-8') ?>
                                                </h1>

                                                <?php
                                                switch ($exam['status']) {
                                                    case 'Completed':
                                                        $examStatusClass = 'badge-light-success';
                                                        break;
                                                    case 'In Progress':
                                                        $examStatusClass = 'badge-light-primary';
                                                        break;
                                                    case 'Cancelled':
                                                        $examStatusClass = 'badge-light-danger';
                                                        break;
                                                    case 'Upcoming':
                                                    default:
                                                        $examStatusClass = 'badge-light-warning';
                                                        break;
                                                }
                                                ?>

                                                <span class="badge <?= htmlspecialchars($examStatusClass, ENT_QUOTES, 'UTF-8') ?>">
                                                    <?= htmlspecialchars($exam['status'], ENT_QUOTES, 'UTF-8') ?>
                                                </span>

                                            </div>

                                            <div class="d-flex flex-wrap align-items-center gap-3 text-gray-500 fs-7">

                                                <span>
                                                    <?= htmlspecialchars($examId, ENT_QUOTES, 'UTF-8') ?>
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

                                        <?php if ($isUpcoming): ?>

                                            <div class="card card-bordered">
                                                <div class="card-body d-flex flex-column align-items-center justify-content-center text-center py-15">

                                                    <span class="symbol symbol-75px mb-5">
                                                        <span class="symbol-label bg-light-warning">

                                                            <i class="ki-duotone ki-time fs-2x text-warning">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>

                                                        </span>
                                                    </span>

                                                    <h3 class="text-gray-900 fw-bold mb-2">
                                                        Results not yet available
                                                    </h3>

                                                    <div class="text-gray-500 fw-semibold fs-7 mw-500px">
                                                        This exam is upcoming. Student results will appear here after the exam begins and students submit their answers.
                                                    </div>

                                                </div>
                                            </div>

                                        <?php else: ?>

                                            <div class="row g-5 mb-7">

                                                <div class="col-md-4">
                                                    <div class="card card-bordered h-100">
                                                        <div class="card-body py-5">

                                                            <div class="text-gray-500 fw-semibold fs-7 mb-1">
                                                                Average Score
                                                            </div>

                                                            <div class="text-gray-900 fw-bold fs-2">
                                                                <?= htmlspecialchars(number_format($averageScore, 1), ENT_QUOTES, 'UTF-8') ?>%
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

                                            <div class="card card-bordered">

                                                <div class="card-header border-0 pt-6">

                                                    <div class="card-title">
                                                        <div class="d-flex align-items-center position-relative">

                                                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>

                                                            <input
                                                                id="kt_student_results_datatable_search"
                                                                type="text"
                                                                class="form-control form-control-solid w-250px ps-12"
                                                                placeholder="Search students">

                                                        </div>
                                                    </div>

                                                    <div class="card-toolbar">
                                                        <div class="d-flex flex-wrap gap-3">

                                                            <a
                                                                href="#filter"
                                                                class="btn btn-sm btn-light-info">

                                                                <i class="ki-duotone ki-filter fs-3">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>

                                                                Filter
                                                            </a>

                                                            <a
                                                                href="#export"
                                                                class="btn btn-sm btn-light-primary">

                                                                <i class="ki-duotone ki-exit-up fs-3">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>

                                                                Export
                                                            </a>

                                                            <a
                                                                href="#add-record"
                                                                class="btn btn-sm btn-primary">

                                                                <i class="ki-duotone ki-plus fs-3"></i>

                                                                Add Record
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="card-body pt-0 pb-6">

                                                    <div class="table-responsive">
                                                        <table
                                                            id="kt_student_results_datatable"
                                                            class="table table-row-bordered gy-7 align-middle w-100">

                                                            <thead>
                                                                <tr class="fw-semibold fs-6 text-muted">

                                                                    <th class="ps-0">
                                                                        Student
                                                                    </th>

                                                                    <th class="text-nowrap">
                                                                        Date Taken
                                                                    </th>

                                                                    <th class="text-nowrap">
                                                                        Raw Score
                                                                    </th>

                                                                    <th>
                                                                        Score
                                                                    </th>

                                                                    <th class="text-nowrap">
                                                                        Status
                                                                    </th>

                                                                    <th>
                                                                        Actions
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

                                                                <?php foreach ($results as $index => $result): ?>

                                                                    <?php

                                                                    $hasResponse = $result['result_status'] !== 'No Response';
                                                                    $percentage = null;
                                                                    $scoreColor = 'muted';

                                                                    if ($hasResponse) {
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
                                                                    }

                                                                    $avatarColor = $avatarColors[$index % count($avatarColors)];

                                                                    switch ($result['result_status']) {
                                                                        case 'Completed':
                                                                            $resultStatusClass = 'badge-light-success';
                                                                            break;
                                                                        case 'Pending':
                                                                            $resultStatusClass = 'badge-light-warning';
                                                                            break;
                                                                        case 'No Response':
                                                                        default:
                                                                            $resultStatusClass = 'badge-light-danger';
                                                                            break;
                                                                    }

                                                                    ?>

                                                                    <tr>
                                                                        <td class="ps-0">
                                                                            <div class="d-flex align-items-center">

                                                                                <div class="symbol symbol-40px symbol-circle me-4">
                                                                                    <span class="symbol-label bg-light-<?= $avatarColor ?> text-<?= $avatarColor ?> fw-bold">

                                                                                        <?= htmlspecialchars(getStudentInitials($result['name']), ENT_QUOTES, 'UTF-8') ?>

                                                                                    </span>
                                                                                </div>

                                                                                <div>
                                                                                    <div class="text-gray-900 fw-bold fs-6 mb-1">
                                                                                        <?= htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8') ?>
                                                                                    </div>

                                                                                    <div class="text-gray-500 fw-semibold fs-7 text-nowrap">
                                                                                        <?= htmlspecialchars($result['student_no'], ENT_QUOTES, 'UTF-8') ?>
                                                                                        |
                                                                                        <?= htmlspecialchars($result['course'], ENT_QUOTES, 'UTF-8') ?>
                                                                                        |
                                                                                        <?= htmlspecialchars($result['email'], ENT_QUOTES, 'UTF-8') ?>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </td>

                                                                        <td
                                                                            data-order="<?= $hasResponse ? htmlspecialchars($result['date_taken'], ENT_QUOTES, 'UTF-8') : '' ?>"
                                                                            class="text-gray-600 fw-semibold text-nowrap">

                                                                            <?= $hasResponse ? date('F d, Y', strtotime($result['date_taken'])) : '&mdash;' ?>

                                                                        </td>

                                                                        <td
                                                                            data-order="<?= $hasResponse ? (int) $result['score'] : -1 ?>"
                                                                            class="text-gray-600 fw-semibold text-nowrap">

                                                                            <?= $hasResponse ? (int) $result['score'] . '/' . (int) $exam['items'] : '&mdash;' ?>

                                                                        </td>

                                                                        <td
                                                                            data-order="<?= $hasResponse ? $percentage : -1 ?>"
                                                                            class="text-start">

                                                                            <span class="text-<?= $scoreColor ?> fw-bold fs-6">
                                                                                <?= $hasResponse ? $percentage . '%' : '&mdash;' ?>
                                                                            </span>

                                                                        </td>

                                                                        <td>
                                                                            <span class="badge <?= htmlspecialchars($resultStatusClass, ENT_QUOTES, 'UTF-8') ?>">
                                                                                <?= htmlspecialchars($result['result_status'], ENT_QUOTES, 'UTF-8') ?>
                                                                            </span>
                                                                        </td>

                                                                        <td>
                                                                            <?php if ($hasResponse): ?>
                                                                                <a
                                                                                    href="/flashcards/pages/review.php?exam_id=<?= urlencode($examId) ?>&amp;student_no=<?= urlencode($result['student_no']) ?>"
                                                                                    class="btn btn-sm btn-light-primary text-nowrap"
                                                                                    onclick="KTApp.showPageLoading()">
                                                                                    <i class="ki-duotone ki-eye fs-5">
                                                                                        <span class="path1"></span>
                                                                                        <span class="path2"></span>
                                                                                        <span class="path3"></span>
                                                                                    </i>
                                                                                    Review Exam
                                                                                </a>
                                                                            <?php else: ?>
                                                                                <span class="text-muted">&mdash;</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                    </tr>

                                                                <?php endforeach; ?>

                                                            </tbody>

                                                        </table>
                                                    </div>

                                                </div>

                                            </div>

                                        <?php endif; ?>

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

    <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>

    <?php if ($exam !== null && !$isUpcoming): ?>
        <script src="/flashcards/assets/js/results.js"></script>
    <?php endif; ?>

</body>

</html>