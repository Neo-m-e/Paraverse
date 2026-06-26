<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . "/Discourse/functions-new.php");

DIRECT_ACCESS_BLOCKED();

header('Content-Type: application/json');

if (!empty($identification)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
}
?>