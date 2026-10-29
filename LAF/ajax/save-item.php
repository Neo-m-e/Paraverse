<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['success' => false, 'message' => 'POST request required.']);
  exit;
}

echo json_encode([
  'success' => true,
  'message' => 'The item was saved successfully.'
]);

