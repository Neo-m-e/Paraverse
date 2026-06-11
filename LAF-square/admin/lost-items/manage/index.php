<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/LAF/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$item_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

// Mock details (Add vs Edit)
if (!empty($item_id)) {
  $META_TITLE = "Edit Item · Admin · Lost and Found";
  $META_DESC  = "Edit details of a surrendered item.";
  
  // Mock fetch
  $item = [
    'item_id'        => $item_id,
    'item_name'      => 'Black Adidas Backpack',
    'category'       => 'bags',
    'description'    => 'Black bag with yellow duck keychain, 15" laptop compartment.',
    'location'       => '11th Floor · Study Area',
    'surrendered_by' => 'Maria Santos',
    'received_by'    => 'Engr. Roel Tan',
    'released_by'    => '',
    'claimed_by'     => '',
    'photo'          => '',
    'status'         => 'unclaimed',
  ];
} else {
  $META_TITLE = "Add Surrendered Item · Admin · Lost and Found";
  $META_DESC  = "Record a newly surrendered lost item.";
  
  $item = [
    'item_id'        => '',
    'item_name'      => '',
    'category'       => '',
    'description'    => '',
    'location'       => '',
    'surrendered_by' => '',
    'received_by'    => '',
    'released_by'    => '',
    'claimed_by'     => '',
    'photo'          => '',
    'status'         => 'unclaimed',
  ];
}

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="../../../assets/css/lost-and-found.css" rel="stylesheet">
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" data-kt-app-header-fixed="true"
  data-kt-app-header-fixed-mobile="true" class="app-default">
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_page-loader.php'); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div id="kt_app_content" class="app-content flex-column-fluid pt-8 pb-10">
                <div id="kt_app_content_container" class="app-container container-xxl">
                  <?php include('index-inc-form.php'); ?>
                </div>
              </div>
            </main>
          </div>
          <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_scrolltop.php'); ?>
</body>
</html>
