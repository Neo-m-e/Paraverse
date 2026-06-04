<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');
DIRECT_ACCESS_BLOCKED();

$categories = [
  'bags'        => 'Bags',
  'accessories' => 'Accessories',
  'academic'    => 'Academic',
  'essentials'  => 'Personal Essentials',
  'electronics' => 'Electronics',
  'id-cards'    => 'ID / Cards',
  'clothing'    => 'Clothing',
  'others'      => 'Others',
];

$cat_badge_class = [
  'bags'        => 'badge-bags',
  'accessories' => 'badge-accessories',
  'academic'    => 'badge-academic',
  'electronics' => 'badge-electronics',
  'essentials'  => 'badge-essentials',
  'id-cards'    => 'badge-essentials',
  'clothing'    => 'badge-essentials',
  'others'      => 'badge-essentials',
];

$items = [
  [
    'item_id'        => 'ITM-2604-0720-2320',
    'item_name'      => 'Black Adidas Backpack',
    'category'       => 'bags',
    'description'    => 'Black bag with yellow duck keychain.',
    'location'       => '11th Floor · Study Area',
    'surrendered_by' => 'Maria Santos',
    'received_by'    => 'Engr. Roel Tan',
    'released_by'    => '',
    'claimed_by'     => '',
    'photo'          => '',
    'status'         => 'unclaimed',
    'posted_at'      => '2024-06-20 09:14',
  ],
  [
    'item_id'        => 'ITM-2604-0720-2319',
    'item_name'      => 'iPhone 13 (Black)',
    'category'       => 'electronics',
    'description' => 'Black iPhone 13, cracked lower-left corner.',
    'location'       => '14th Floor · Library',
    'surrendered_by' => 'John Cruz',
    'received_by'    => 'Ms. Ana Reyes',
    'released_by'    => 'Ms. Ana Reyes',
    'claimed_by'     => 'Denise Alvaran',
    'photo'          => '',
    'status'         => 'claimed',
    'posted_at'      => '2024-06-18 14:30',
  ],
  [
    'item_id'        => 'ITM-2604-0720-2318',
    'item_name'      => 'FEU Tech Student ID',
    'category'       => 'id-cards',
    'description'    => 'Student ID, laminated, female student.',
    'location'       => '8th Floor · Canteen',
    'surrendered_by' => 'Carlo Reyes',
    'received_by'    => 'Engr. Roel Tan',
    'released_by'    => '',
    'claimed_by'     => '',
    'photo'          => '',
    'status'         => 'unclaimed',
    'posted_at'      => '2024-06-15 11:00',
  ],
];

// Handle CSV Export
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=lost-items-export.csv');
  $output = fopen('php://output', 'w');
  fputcsv($output, ['Item ID', 'Item Name', 'Category', 'Location', 'Status', 'Date Posted']);
  foreach ($items as $item) {
    fputcsv($output, [
      $item['item_id'],
      $item['item_name'],
      $categories[$item['category']] ?? $item['category'],
      $item['location'],
      ucfirst($item['status']),
      $item['posted_at']
    ]);
  }
  fclose($output);
  exit;
}

// DataTables input
$draw = intval($_GET['draw'] ?? 1);
$start = intval($_GET['start'] ?? 0);
$length = intval($_GET['length'] ?? 10);
$searchValue = $_GET['search']['value'] ?? '';

// Filter list
$filteredItems = [];
foreach ($items as $item) {
  if (empty($searchValue)) {
    $filteredItems[] = $item;
  } else {
    $search = strtolower($searchValue);
    if (
      strpos(strtolower($item['item_id']), $search) !== false ||
      strpos(strtolower($item['item_name']), $search) !== false ||
      strpos(strtolower($item['location']), $search) !== false ||
      strpos(strtolower($item['surrendered_by']), $search) !== false
    ) {
      $filteredItems[] = $item;
    }
  }
}

$recordsTotal = count($items);
$recordsFiltered = count($filteredItems);

// Slice array for pagination
$slicedItems = array_slice($filteredItems, $start, $length);

$data = [];
foreach ($slicedItems as $item) {
  $cc = $cat_badge_class[$item['category']] ?? 'badge-essentials';
  $statusClass = $item['status'] === 'claimed' ? 'badge-found' : 'badge-not-found';
  $statusLabel = $item['status'] === 'claimed' ? 'Claimed' : 'Unclaimed';

  // Details Column
  $detailsHtml = '
    <div class="cell-id fs-8 fw-bold font-monospace text-primary mb-1">' . htmlspecialchars($item['item_id']) . '</div>
    <div class="cell-name fs-6 fw-bold text-gray-800 mb-1" style="color:var(--laf-purple);">' . htmlspecialchars($item['item_name']) . '</div>
    <div class="cell-cat mt-1">
      <span class="badge-laf-cat ' . $cc . '">' . htmlspecialchars($categories[$item['category']] ?? $item['category']) . '</span>
    </div>
    <div style="font-size:.73rem;color:var(--laf-muted);margin-top:4px;">
      <i class="bi bi-geo-alt-fill" style="font-size:.68rem;"></i> ' . htmlspecialchars($item['location']) . '
    </div>
  ';

  // Transactions Column
  $transHtml = '
    <div class="laf-transaction-cell">
      <div class="tx-label text-muted fs-8">Surrendered by</div>
      <div class="tx-value fs-7">' . ($item['surrendered_by'] ? htmlspecialchars($item['surrendered_by']) : '<span class="text-muted">—</span>') . '</div>
      <div class="tx-label mt-2 text-muted fs-8">Received by</div>
      <div class="tx-value fs-7">' . ($item['received_by'] ? htmlspecialchars($item['received_by']) : '<span class="text-muted">—</span>') . '</div>';
  if ($item['status'] === 'claimed') {
    $transHtml .= '
      <div class="tx-label mt-2 text-muted fs-8">Claimed by</div>
      <div class="tx-value fs-7">' . ($item['claimed_by'] ? htmlspecialchars($item['claimed_by']) : '<span class="text-muted">—</span>') . '</div>';
  }
  $transHtml .= '</div>';

  // Status Column
  $statusHtml = '
    <span class="item-status-badge ' . $statusClass . '">' . $statusLabel . '</span>
    <div style="font-size:.7rem;color:var(--laf-muted);margin-top:4px;">' . htmlspecialchars($item['posted_at']) . '</div>
  ';

  // Actions Column
  $actionsHtml = '
    <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center py-2 px-3"
      data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
      Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
    </a>
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-150px py-3" data-kt-menu="true">
      <div class="menu-item px-3">
        <a href="manage/?id=' . urlencode($item['item_id']) . '" class="menu-link px-3" onclick="KTApp.showPageLoading()">
          <i class="bi bi-pencil-square me-2"></i>Edit
        </a>
      </div>';
  if ($item['status'] === 'unclaimed') {
    $actionsHtml .= '
      <div class="menu-item px-3">
        <a href="javascript:void(0)" class="menu-link px-3 menu-cancel" id="' . htmlspecialchars($item['item_id']) . '">
          <i class="bi bi-x-circle me-2"></i>Cancel
        </a>
      </div>';
  }
  $actionsHtml .= '
      <div class="menu-item px-3">
        <a href="javascript:void(0)" class="menu-link px-3 menu-delete" id="' . htmlspecialchars($item['item_id']) . '">
          <i class="bi bi-trash me-2"></i>Delete
        </a>
      </div>
    </div>
  ';

  $data[] = [
    $item['item_id'],
    $detailsHtml,
    $transHtml,
    $statusHtml,
    $actionsHtml
  ];
}

header('Content-Type: application/json');
echo json_encode([
  "draw" => $draw,
  "recordsTotal" => $recordsTotal,
  "recordsFiltered" => $recordsFiltered,
  "data" => $data
]);
exit;
