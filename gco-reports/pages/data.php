<?php

// Use safe() whenever showing PHP data inside HTML.
// It keeps the page safe and makes the templates easier to read.
function safe($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Converts PHP arrays into JSON that is safe to place inside HTML.
function jsonForHtml($data)
{
    return json_encode(
        $data,
        JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
    );
}

$reportSummary = [
    'total' => 486,
    'face_to_face' => 298,
    'online' => 188,
    'pending' => 12,
    'change' => '12.4%',
];

$schoolYearOptions = ['2024-2025', '2025-2026', '2026-2027'];
$selectedSchoolYear = $_GET['sy'] ?? '2026-2027';
if (!in_array($selectedSchoolYear, $schoolYearOptions, true)) {
    $selectedSchoolYear = '2026-2027';
}

$termOptions = [
    '2024-2025' => ['1TSY2425', '2TSY2425', '3TSY2425'],
    '2025-2026' => ['1TSY2526', '2TSY2526', '3TSY2526'],
    '2026-2027' => ['1TSY2627', '2TSY2627', '3TSY2627'],
];
$selectedTerm = $_GET['term'] ?? $termOptions[$selectedSchoolYear][0];
if (!in_array($selectedTerm, $termOptions[$selectedSchoolYear], true)) {
    $selectedTerm = $termOptions[$selectedSchoolYear][0];
}

$termData = [
    '1TSY2425' => [['September', 88], ['October', 104], ['November', 101], ['December', 98]],
    '2TSY2425' => [['January', 96], ['February', 102], ['March', 119], ['April', 111]],
    '3TSY2425' => [['May', 69], ['June', 74], ['July', 81], ['August', 78]],
    '1TSY2526' => [['September', 101], ['October', 113], ['November', 122], ['December', 111]],
    '2TSY2526' => [['January', 108], ['February', 110], ['March', 126], ['April', 119]],
    '3TSY2526' => [['May', 77], ['June', 82], ['July', 91], ['August', 85]],
    '1TSY2627' => [['September', 110], ['October', 125], ['November', 132], ['December', 119]],
    '2TSY2627' => [['January', 118], ['February', 121], ['March', 139], ['April', 134]],
    '3TSY2627' => [['May', 83], ['June', 89], ['July', 96], ['August', 90]],
];

$schoolYearData = [
    '2024-2025' => [88, 104, 101, 98, 96, 102, 119, 111, 69, 74, 81, 78],
    '2025-2026' => [101, 113, 122, 111, 108, 110, 126, 119, 77, 82, 91, 85],
    '2026-2027' => [110, 125, 132, 119, 118, 121, 139, 134, 83, 89, 96, 90],
];

$serviceTypes = [
    ['name' => 'Interview', 'total' => 115, 'face_to_face' => 73, 'online' => 42],
    ['name' => 'Psychological Test Administration', 'total' => 92, 'face_to_face' => 64, 'online' => 28],
    ['name' => 'Consultation', 'total' => 129, 'face_to_face' => 78, 'online' => 51],
    ['name' => 'Counseling', 'total' => 150, 'face_to_face' => 83, 'online' => 67],
];

$appointmentPurposes = [
    'Interview' => [
        ['name' => 'Student Leader Interview', 'count' => 28],
        ['name' => 'Request for Recommendation', 'count' => 22],
        ['name' => 'Kumustahan Session or Student Routine Interview', 'count' => 31],
        ['name' => 'Student Routine Interview and Test Results Discussion', 'count' => 24],
        ['name' => 'Others', 'count' => 10],
    ],
    'Psychological Test Administration' => [
        ['name' => 'Referred by Counselor', 'count' => 38],
        ['name' => 'Invitation from GCO Activity', 'count' => 41],
        ['name' => 'Others', 'count' => 13],
    ],
    'Consultation' => [
        ['name' => 'Mental Health Support', 'count' => 24],
        ['name' => 'Social Adjustment', 'count' => 13],
        ['name' => 'Peer Relationships', 'count' => 12],
        ['name' => 'Family Dynamics', 'count' => 14],
        ['name' => 'Relationship Development', 'count' => 11],
        ['name' => 'Academic Support', 'count' => 18],
        ['name' => 'Bereavement', 'count' => 7],
        ['name' => 'Occupational Problems', 'count' => 8],
        ['name' => 'Legal Problems', 'count' => 4],
        ['name' => 'Consultation and Test Results Discussion', 'count' => 13],
        ['name' => 'Others', 'count' => 5],
    ],
    'Counseling' => [
        ['name' => 'Mental Health Support', 'count' => 31],
        ['name' => 'Social Adjustment', 'count' => 15],
        ['name' => 'Peer Relationships', 'count' => 14],
        ['name' => 'Family Dynamics', 'count' => 17],
        ['name' => 'Relationship Development', 'count' => 13],
        ['name' => 'Academic Support', 'count' => 20],
        ['name' => 'Bereavement', 'count' => 8],
        ['name' => 'Occupational Problems', 'count' => 9],
        ['name' => 'Legal Problems', 'count' => 5],
        ['name' => 'Counseling and Test Results Discussion', 'count' => 12],
        ['name' => 'Others', 'count' => 6],
    ],
];

$yearLevels = [
    ['name' => '1st Year', 'total' => 120, 'face_to_face' => 78, 'online' => 42],
    ['name' => '2nd Year', 'total' => 138, 'face_to_face' => 82, 'online' => 56],
    ['name' => '3rd Year', 'total' => 121, 'face_to_face' => 73, 'online' => 48],
    ['name' => '4th Year', 'total' => 107, 'face_to_face' => 65, 'online' => 42],
];

$terms = [];
foreach ($termData[$selectedTerm] as [$month, $total]) {
    $faceToFace = (int) round($total * 0.62);
    $terms[] = ['name' => $month, 'total' => $total, 'face_to_face' => $faceToFace, 'online' => $total - $faceToFace];
}

$schoolYears = [];
$schoolYearMonths = ['September', 'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August'];
foreach ($schoolYearData[$selectedSchoolYear] as $index => $total) {
    $faceToFace = (int) round($total * 0.62);
    $schoolYears[] = ['name' => $schoolYearMonths[$index], 'total' => $total, 'face_to_face' => $faceToFace, 'online' => $total - $faceToFace];
}

$programs = [
    ['name' => 'BSITDA', 'face_to_face' => 26, 'online' => 16, 'not_booked' => 126, 'students' => 168],
    ['name' => 'BSITAGD', 'face_to_face' => 23, 'online' => 14, 'not_booked' => 106, 'students' => 143],
    ['name' => 'BSITSMBA', 'face_to_face' => 19, 'online' => 12, 'not_booked' => 126, 'students' => 157],
    ['name' => 'BSITBA', 'face_to_face' => 18, 'online' => 11, 'not_booked' => 103, 'students' => 132],
    ['name' => 'BSITWMA', 'face_to_face' => 17, 'online' => 11, 'not_booked' => 121, 'students' => 149],
    ['name' => 'BSCSSE', 'face_to_face' => 22, 'online' => 14, 'not_booked' => 140, 'students' => 176],
    ['name' => 'BSCSDS', 'face_to_face' => 20, 'online' => 12, 'not_booked' => 129, 'students' => 161],
    ['name' => 'BSCpE', 'face_to_face' => 17, 'online' => 10, 'not_booked' => 111, 'students' => 138],
    ['name' => 'BSME', 'face_to_face' => 15, 'online' => 10, 'not_booked' => 99, 'students' => 124],
    ['name' => 'BSEE', 'face_to_face' => 15, 'online' => 9, 'not_booked' => 95, 'students' => 119],
    ['name' => 'BSCE', 'face_to_face' => 16, 'online' => 10, 'not_booked' => 128, 'students' => 154],
    ['name' => 'BSECE', 'face_to_face' => 13, 'online' => 8, 'not_booked' => 106, 'students' => 127],
    ['name' => 'BMA', 'face_to_face' => 12, 'online' => 7, 'not_booked' => 93, 'students' => 112],
    ['name' => 'BSEMCDA', 'face_to_face' => 14, 'online' => 9, 'not_booked' => 113, 'students' => 136],
    ['name' => 'BSBAFMBA', 'face_to_face' => 2, 'online' => 1, 'not_booked' => 142, 'students' => 145],
    ['name' => 'BSBAMMMD', 'face_to_face' => 13, 'online' => 9, 'not_booked' => 99, 'students' => 121],
    ['name' => 'BSBAOSM', 'face_to_face' => 11, 'online' => 7, 'not_booked' => 90, 'students' => 108],
    ['name' => 'BSA', 'face_to_face' => 9, 'online' => 7, 'not_booked' => 85, 'students' => 101],
];

$specialists = [
    ['name' => 'Marietta M. Bengat', 'role' => 'Director', 'total' => 76, 'face_to_face' => 45, 'online' => 31, 'rating' => 4.8],
    ['name' => 'Rochile G. Borje', 'role' => 'Guidance Counselor', 'total' => 92, 'face_to_face' => 58, 'online' => 34, 'rating' => 4.7],
    ['name' => 'Vilma R. Colinco', 'role' => 'Guidance Counselor', 'total' => 84, 'face_to_face' => 52, 'online' => 32, 'rating' => 4.6],
    ['name' => 'Charlene Marie A. Arabejo', 'role' => 'Guidance Counselor', 'total' => 79, 'face_to_face' => 49, 'online' => 30, 'rating' => 4.8],
    ['name' => 'Paula Trisha D. Balcera', 'role' => 'Guidance Counselor', 'total' => 88, 'face_to_face' => 55, 'online' => 33, 'rating' => 4.7],
    ['name' => 'Moira Ashley C. Roy', 'role' => 'Psychometrician', 'total' => 67, 'face_to_face' => 39, 'online' => 28, 'rating' => 4.5],
];

$overallEvaluation = ['rating' => 4.7];

$students = [
    ['sn' => '202610001', 'name' => 'Gideon V. Morales', 'program' => 'BSITDA', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610002', 'name' => 'Jem Chaela Beatrix J. Gonzaga', 'program' => 'BSITAGD', 'college' => 'CCSMA', 'classification' => 'Special Case'],
    ['sn' => '202610003', 'name' => 'Marielle Jyla M. Francisco', 'program' => 'BSITSMBA', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610004', 'name' => 'Samantha Rose A. Villablanca', 'program' => 'BSITBA', 'college' => 'CCSMA', 'classification' => 'Special Case'],
    ['sn' => '202610005', 'name' => 'Leinna Sophia B. Malay', 'program' => 'BSCSSE', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610006', 'name' => 'Avril Jewel T. Alejo', 'program' => 'BSCpE', 'college' => 'COE', 'classification' => 'Special Case'],
    ['sn' => '202610007', 'name' => 'Vedaant Vig', 'program' => 'BSME', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610008', 'name' => 'Celina Mae R. Espinola', 'program' => 'BSEE', 'college' => 'COE', 'classification' => 'Special Case'],
    ['sn' => '202610009', 'name' => 'Casey Gabrielle D. Aquino', 'program' => 'BSCE', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610010', 'name' => 'Jose Ynno Raphael P. Geronimo', 'program' => 'BSECE', 'college' => 'COE', 'classification' => 'Special Case'],
    ['sn' => '202610011', 'name' => 'Charles Joaquin S. Ordoñez', 'program' => 'BSITDA', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610012', 'name' => 'Nathaniel M. Umali', 'program' => 'BSITDA', 'college' => 'CCSMA', 'classification' => 'Special Case'],
    ['sn' => '202610013', 'name' => 'Miguel I. Ishikawa', 'program' => 'BSITAGD', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610014', 'name' => 'Hanny Grace A. Araña', 'program' => 'BSITAGD', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610015', 'name' => 'Akhyxia Shanne Z. Juanillo', 'program' => 'BSITSMBA', 'college' => 'CCSMA', 'classification' => 'Special Case'],
    ['sn' => '202610016', 'name' => 'Venice Mae V. Payna', 'program' => 'BSITSMBA', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610017', 'name' => 'Joshua Miguel T. Gadon', 'program' => 'BSITBA', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610018', 'name' => 'Jherome Eiymher E. Padilla', 'program' => 'BSITBA', 'college' => 'CCSMA', 'classification' => 'Special Case'],
    ['sn' => '202610019', 'name' => 'Reese Lauren C. Chan', 'program' => 'BSCSSE', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610020', 'name' => 'Justin Emmanuel J. Janda', 'program' => 'BSCSSE', 'college' => 'CCSMA', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610021', 'name' => 'Gabriel Felix Victor B. Burgos', 'program' => 'BSCpE', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610022', 'name' => 'Mikhael Nicolai D. Competente', 'program' => 'BSCpE', 'college' => 'COE', 'classification' => 'Special Case'],
    ['sn' => '202610023', 'name' => 'Chis C. Adea', 'program' => 'BSME', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610024', 'name' => 'Jury S. Cabornay', 'program' => 'BSME', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610025', 'name' => 'Oracle M. Subaan', 'program' => 'BSEE', 'college' => 'COE', 'classification' => 'Special Case'],
    ['sn' => '202610026', 'name' => 'Felicity Mae T. Molina', 'program' => 'BSEE', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610027', 'name' => 'Denisse Yanna V. Gonzales', 'program' => 'BSCE', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610028', 'name' => 'Lance Gerard R. Lopez', 'program' => 'BSCE', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
    ['sn' => '202610029', 'name' => 'Joshua Angelo A. Centro', 'program' => 'BSECE', 'college' => 'COE', 'classification' => 'Special Case'],
    ['sn' => '202610030', 'name' => 'Aaron Dale C. Verceles', 'program' => 'BSECE', 'college' => 'COE', 'classification' => 'Candidate for Special Case'],
];

$studentPrograms = array_values(array_unique(array_column($students, 'program')));
sort($studentPrograms);

$specialCaseSummary = [];
foreach ($students as $student) {
    $program = $student['program'];
    if (!isset($specialCaseSummary[$program])) {
        $specialCaseSummary[$program] = ['name' => $program, 'candidate' => 0, 'special_case' => 0];
    }
    $key = $student['classification'] === 'Special Case' ? 'special_case' : 'candidate';
    $specialCaseSummary[$program][$key]++;
}
$specialCaseSummary = array_values($specialCaseSummary);

$programAttendance = [
    ['college' => 'CCSMA', 'program' => 'BSITDA', 'attendees' => 126],
    ['college' => 'CCSMA', 'program' => 'BSITAGD', 'attendees' => 108],
    ['college' => 'CCSMA', 'program' => 'BSITSMBA', 'attendees' => 119],
    ['college' => 'CCSMA', 'program' => 'BSITBA', 'attendees' => 97],
    ['college' => 'CCSMA', 'program' => 'BSITWMA', 'attendees' => 112],
    ['college' => 'CCSMA', 'program' => 'BSCSSE', 'attendees' => 131],
    ['college' => 'CCSMA', 'program' => 'BSCSDS', 'attendees' => 121],
    ['college' => 'CCSMA', 'program' => 'BMA', 'attendees' => 86],
    ['college' => 'CCSMA', 'program' => 'BSEMCDA', 'attendees' => 103],
    ['college' => 'COE', 'program' => 'BSCpE', 'attendees' => 105],
    ['college' => 'COE', 'program' => 'BSME', 'attendees' => 92],
    ['college' => 'COE', 'program' => 'BSEE', 'attendees' => 88],
    ['college' => 'COE', 'program' => 'BSCE', 'attendees' => 117],
    ['college' => 'COE', 'program' => 'BSECE', 'attendees' => 94],
];

$eventNames = [
    'Understanding Your Leadership Strengths: A Student Leadership Practices Survey',
    'Mental Health and Well-being Program: Mental Health Celebration',
    'FEU TECH - CTRL + ALT + Relax: Pause, Breathe, Reboot',
    'TALK. LISTEN. CONNECT. A Tamaraw Suicide Prevention Awareness Campaign',
    'Keep Moving Forward with GCO',
    'Career Development Activity: G.A.B.A.Y. Series Level 1: Charting Your Career Path',
    'The Core of our Core Values',
    'GCO Faculty Orientation',
    'Act III: The Supporting Cast - A Pride Month Talk About Being an Ally',
    'Act I: Pride on Screen - A Film Showing Activity for Pride Month',
    'Act II: Colors of Pride - A Pride-themed Art for Wellness Activity',
    'MENTally Strong, MENTally Fit Tamaraws!',
    'KUMUSTAHAN: Group and Student Routine Interview',
    'GCO R.A.D.A.R.: College Adjustment Testing',
    'GCO R.A.D.A.R.: IQ and EQ Testing',
    'GCO R.A.D.A.R.: Study Attitudes and Methods Testing',
    'iTamaraws: CTRL + ALT + RELAX',
    'C.O.P.E. 2.0 Activity: Charting Oneself towards Personal Enthusiasm',
    "Strong Her, Stronger Minds: Women's Month Celebration 2026",
    'ValenTAMS: Self-Love Corner',
    'Mental Health Month Celebration: Turning Awareness into Action for Mental Health',
    'Mental Health Month Celebration: Kumustahan',
    'Mental Health Month Celebration: Art for Wellness!',
    'Be the Calm: The Role of Psychological First Aid in Crisis Response',
    'Mental Health Month Celebration: Busking for Wellness!',
    'Respect, Power, and Love: Understanding Gender and Identity',
    'Psychological Testing Activity for Freshman Students',
    'Psychological Testing Activity for Returning Students',
    'Psychological Testing Activity: Workplace Skills Survey',
    'Career Navigation Group Discussion',
    'Career Navigation with Kumustahan Session',
    'C.O.P.E. Activity: Charting Oneself towards Personal Empowerment',
    'Psychological Testing Activity for Transferee Students',
    'Unlocking Potential: The Art of Self-management (Scholars Edition)',
    'ALL R.I.S.E: Recognizing Individual Self Efficacy',
    'The CORE of our Core Values: A Recollection Activity',
    'Nurturing Mental Health and Well-Being',
    'Day 5 of Lusog Isip Serve 2024: PAKIKILAHOK - Laying Down the Bricks for Tomorrow’s Tamaraws',
    'Day 4 of Lusog Isip Serve 2024: PAGTATAGUYOD - A Mental Health Panel Discussion',
    'Day 3 of Lusog Isip Serve 2024: PAKIKILALA - Where Do I Fit in a Workplace?',
    'Day 2 of Lusog Isip Serve 2024: Muni-muni - A Mental Health Podcast',
    'Day 1 of Lusog Isip Serve 2024: PAGKAUNAWA - The Basics of Mental Health',
    'Kumustahan Session with iTamaraws',
    'Freshmen Psychological Testing Program',
    'Unlocking Potential: The Art of Self-management (Elite Scholars Edition)',
];

$eventAttendance = [];
foreach ($programAttendance as $index => $attendance) {
    foreach ($eventNames as $eventIndex => $eventName) {
        $eventAttendance[] = [
            'event' => $eventName,
            'college' => $attendance['college'],
            'program' => $attendance['program'],
            'attendees' => max(20, (int) round($attendance['attendees'] * (0.24 + (($eventIndex + $index) % 5) * 0.03))),
        ];
    }
}

$schoolYearFactor = ['2024-2025' => 0.82, '2025-2026' => 0.91, '2026-2027' => 1.0][$selectedSchoolYear];
$reportSummary['total'] = array_sum(array_column($terms, 'total'));
$reportSummary['face_to_face'] = array_sum(array_column($terms, 'face_to_face'));
$reportSummary['online'] = array_sum(array_column($terms, 'online'));
$reportSummary['pending'] = max(1, (int) round(12 * $schoolYearFactor));
$reportSummary['change'] = ['2024-2025' => '8.1%', '2025-2026' => '10.3%', '2026-2027' => '12.4%'][$selectedSchoolYear];

$reportCollections = [&$serviceTypes, &$yearLevels];
foreach ($reportCollections as &$reportRows) {
    foreach ($reportRows as &$reportRow) {
        foreach (['total', 'face_to_face', 'online'] as $field) {
            $reportRow[$field] = (int) round($reportRow[$field] * $schoolYearFactor);
        }
    }
}
unset($reportCollections, $reportRows, $reportRow);

foreach ($specialists as &$specialist) {
    foreach (['total', 'face_to_face', 'online'] as $field) {
        $specialist[$field] = (int) round($specialist[$field] * $schoolYearFactor);
    }
}
unset($specialist);

foreach ($appointmentPurposes as &$purposeRows) {
    foreach ($purposeRows as &$purposeRow) {
        $purposeRow['total'] = (int) round($purposeRow['count'] * $schoolYearFactor);
        $purposeRow['face_to_face'] = (int) round($purposeRow['total'] * 0.62);
        $purposeRow['online'] = $purposeRow['total'] - $purposeRow['face_to_face'];
        unset($purposeRow['count']);
    }
}
unset($purposeRows, $purposeRow);

foreach ($programs as &$program) {
    foreach (['face_to_face', 'online', 'not_booked', 'students'] as $field) {
        $program[$field] = (int) round($program[$field] * $schoolYearFactor);
    }
}
unset($program);

$currentSchoolYear = 'SY ' . $selectedSchoolYear;
$currentTerm = $selectedTerm;
$totalTermAppointments = array_sum(array_column($terms, 'total'));
$totalSchoolYearAppointments = array_sum(array_column($schoolYears, 'total'));

$filterData = [
    'termOptions' => $termOptions,
    'termData' => $termData,
    'schoolYearData' => $schoolYearData,
    'schoolYearMonths' => $schoolYearMonths,
];
