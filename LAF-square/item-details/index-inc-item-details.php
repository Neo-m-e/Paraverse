<?php
if (!isset($item)) {
  $item = [
    'id' => 0,
    'name' => 'Unknown Item',
    'category' => 'others',
    'date_found' => '—',
    'time_found' => '—',
    'floor' => '—',
    'currently_at' => '—',
    'surrendered_by' => '—',
    'claimed_by' => '—',
    'released_by' => '—',
    'received_by' => '—',
    'status' => 'Unclaimed',
    'image_url' => ''
  ];
} else {
  if (!isset($item['date_found']) && isset($item['date'])) {
    $item['date_found'] = $item['date'];
  }
  if (!isset($item['time_found']) && isset($item['time'])) {
    $item['time_found'] = $item['time'];
  }
  if (!isset($item['image_url']) && isset($item['image'])) {
    $item['image_url'] = $item['image'];
  }
}

$categoryIcons = [
  'electronics'         => 'bi bi-laptop',
  'clothing'            => 'bi bi-shirt',
  'accessories'         => 'bi bi-watch',
  'documents'           => 'bi bi-file-earmark-text',
  'keys'                => 'bi bi-key',
  'bags'         => 'bi bi-briefcase',
  'wallet'       => 'bi bi-wallet2',
  'wallets'      => 'bi bi-wallet2',
  'jewelry'      => 'bi bi-gem',
  'books'        => 'bi bi-book',
  'academic'            => 'bi bi-mortarboard',
  'personal essentials' => 'bi bi-bag-plus',
  'essentials'          => 'bi bi-bag-plus',
  'id / cards'          => 'bi bi-person-badge',
  'id-cards'            => 'bi bi-person-badge',
  'others'              => 'bi bi-tag',
  'default'      => 'bi bi-tag',
];
$cat_key = strtolower($item['category'] ?? '');
$iconClass = $categoryIcons[$cat_key] ?? $categoryIcons['default'];

if ($is_unclaimed) {
  include('index-inc-item-unclaimed-view.php');
} else {
  include('index-inc-item-claimed-view.php');
}
?>
