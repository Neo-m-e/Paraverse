<?php

$reportSummary = [
    'total' => 486,
    'face_to_face' => 298,
    'online' => 188,
    'upcoming' => 12,
    'change' => '12.4%',
];

$serviceTypes = [
    ['name' => 'Interview', 'total' => 115, 'face_to_face' => 73, 'online' => 42],
    ['name' => 'Psychological Test Administration', 'total' => 92, 'face_to_face' => 64, 'online' => 28],
    ['name' => 'Consultation', 'total' => 129, 'face_to_face' => 78, 'online' => 51],
    ['name' => 'Counseling', 'total' => 150, 'face_to_face' => 83, 'online' => 67],
];

$yearLevels = [
    ['name' => '1st Year', 'total' => 120, 'face_to_face' => 78, 'online' => 42],
    ['name' => '2nd Year', 'total' => 138, 'face_to_face' => 82, 'online' => 56],
    ['name' => '3rd Year', 'total' => 121, 'face_to_face' => 73, 'online' => 48],
    ['name' => '4th Year', 'total' => 107, 'face_to_face' => 65, 'online' => 42],
];

$terms = [
    ['name' => 'First Term', 'total' => 486, 'face_to_face' => 298, 'online' => 188],
    ['name' => 'Second Term', 'total' => 315, 'face_to_face' => 195, 'online' => 120],
    ['name' => 'Third Term', 'total' => 216, 'face_to_face' => 134, 'online' => 82],
];

$schoolYears = [
    ['name' => '2024-2025', 'total' => 341, 'face_to_face' => 212, 'online' => 129],
    ['name' => '2025-2026', 'total' => 410, 'face_to_face' => 251, 'online' => 159],
    ['name' => '2026-2027', 'total' => 436, 'face_to_face' => 268, 'online' => 168],
];

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
    ['name' => 'Marietta M. Bengat', 'role' => 'Director', 'total' => 76, 'face_to_face' => 45, 'online' => 31],
    ['name' => 'Rochie G. Borje', 'role' => 'Guidance Counselor', 'total' => 92, 'face_to_face' => 58, 'online' => 34],
    ['name' => 'Vilma R. Colinco', 'role' => 'Guidance Counselor', 'total' => 84, 'face_to_face' => 52, 'online' => 32],
    ['name' => 'Charlene Marie A. Arabajo', 'role' => 'Guidance Counselor', 'total' => 79, 'face_to_face' => 49, 'online' => 30],
    ['name' => 'Paula Trisha D. Balcera', 'role' => 'Guidance Counselor', 'total' => 88, 'face_to_face' => 55, 'online' => 33],
    ['name' => 'Moira Ashley C. Roy', 'role' => 'Psychometrician', 'total' => 67, 'face_to_face' => 39, 'online' => 28],
];

$currentSchoolYear = 'SY 2026-2027';
$totalTermAppointments = array_sum(array_column($terms, 'total'));
