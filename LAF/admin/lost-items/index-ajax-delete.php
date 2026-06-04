<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');
DIRECT_ACCESS_BLOCKED();

$id = htmlspecialchars($_POST['id'] ?? '', ENT_QUOTES, 'UTF-8');
$tableKey = htmlspecialchars($_POST['table'] ?? '', ENT_QUOTES, 'UTF-8');

if (empty($id) || empty($tableKey)) {
  header('Content-Type: application/json');
  echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
  exit;
}

// In mock data context, we just return success
header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'message' => 'Record ' . $id . ' deleted successfully.']);
exit;
