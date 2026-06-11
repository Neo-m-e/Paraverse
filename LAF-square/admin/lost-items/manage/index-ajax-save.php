<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');
DIRECT_ACCESS_BLOCKED();

$id = htmlspecialchars($_POST['id'] ?? '', ENT_QUOTES, 'UTF-8');
$item_name = htmlspecialchars($_POST['item_name'] ?? '', ENT_QUOTES, 'UTF-8');
$category = htmlspecialchars($_POST['category'] ?? '', ENT_QUOTES, 'UTF-8');

if (empty($item_name) || empty($category)) {
  header('Content-Type: application/json');
  echo json_encode(['status' => 'error', 'message' => 'Item Name and Category are required.']);
  exit;
}

// In mock data context, we simulate successful save
header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'message' => 'Item details saved successfully.']);
exit;
