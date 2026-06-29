<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

DIRECT_ACCESS_BLOCKED();

header('Content-Type: application/json');

if (!empty($identification)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
}
?>