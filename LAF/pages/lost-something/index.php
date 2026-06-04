<?php
define('MBG', TRUE);
include('../../functions-new.php');
//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "I Lost Something · Lost and Found";
$reporter_name = 'Roel M. Tan';
$categories = [
  ''            => 'Select a category',
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/css/lost-and-found.css" rel="stylesheet">
  <link href="../../assets/css/sec-modals.css" rel="stylesheet">
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include('../../partials/_page-loader.php'); ?>
  <span id="reporter-name" style="display:none;"><?= htmlspecialchars($reporter_name) ?></span>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include('../../partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">

                <div class="d-flex align-items-center gap-3 mb-5 mt-5">
                  <a href="../../index.php" class="btn-go-back"><i class="bi bi-arrow-left"></i></a>
                  <h2 class="mb-0 fw-bold" style="font-size:1.6rem;">🔍 I Lost Something</h2>
                </div>

                <div class="row g-4">
                  <!-- LEFT -->
                  <div class="col-lg-6">
                    <div class="laf-form-card mb-4">
                      <div class="laf-form-section-title">📷 Photo of Item</div>
                      <div class="laf-upload-zone" id="upload-zone">
                        <img id="upload-preview" src="" alt="" style="display:none;max-height:140px;border-radius:8px;margin-bottom:8px;">
                        <div id="upload-icon" class="upload-icon">🖼️</div>
                        <div>
                          <span id="upload-label">
                            <a href="#" class="text-primary fw-semibold" onclick="document.getElementById('item-photo').click(); return false;">Click to upload</a> or drag &amp; drop
                          </span>
                          <div class="text-muted mt-1" style="font-size:.78rem;">PNG, JPG, WEBP · up to 10 MB each</div>
                        </div>
                        <input type="file" id="item-photo" name="item_photo" accept="image/*" style="display:none;">
                      </div>
                    </div>
                    <div class="laf-form-card">
                      <div class="laf-form-section-title">📍 When &amp; Where</div>
                      <div class="mb-4">
  <label class="form-label laf-label">Last Known Location <span class="req">*</span></label>
  <div class="row g-2">
  <div class="col" id="loc-floor-wrap">
    <select id="loc-floor" name="loc_floor" class="form-select laf-input" required>
      <option value="">Select Floor</option>
    </select>
  </div>
  <div class="col" id="loc-area-wrap" style="display:none;">
    <select id="loc-area" name="loc_area" class="form-select laf-input">
      <option value="">Select Area</option>
    </select>
  </div>
  <div class="col" id="loc-room-wrap" style="display:none;">
    <select id="loc-room" name="loc_room" class="form-select laf-input">
      <option value="">Select Room</option>
    </select>
  </div>
</div>
<input type="hidden" id="item-location" name="last_known_location">
  <input type="hidden" id="item-location" name="last_known_location">
</div>
                      <div class="row g-3">
                        <div class="col-7">
                          <label for="item-date" class="form-label laf-label">Date Last Seen <span class="req">*</span></label>
                          <input type="date" id="item-date" name="date_last_seen" class="form-control laf-input" required>
                        </div>
                        <div class="col-5">
                          <label for="item-time" class="form-label laf-label">Approx. Time <span class="req">*</span></label>
                          <input type="time" id="item-time" name="approx_time" class="form-control laf-input" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- RIGHT -->
                  <div class="col-lg-6">
                    <div class="laf-form-card">
                      <div class="laf-form-section-title">🏷️ Item Details</div>
                      <div class="mb-4">
                        <label for="item-name" class="form-label laf-label">Item Name <span class="req">*</span></label>
                        <input type="text" id="item-name" name="item_name" class="form-control laf-input" placeholder="e.g. Black Backpack" required>
                      </div>
                      <div class="mb-4">
                        <label for="item-category" class="form-label laf-label">Category <span class="req">*</span></label>
                        <select id="item-category" name="category" class="form-select laf-input" required>
                          <?php foreach ($categories as $val => $label): ?>
                            <option value="<?= htmlspecialchars($val) ?>"><?= htmlspecialchars($label) ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-4">
                        <label for="item-description" class="form-label laf-label">Description</label>
                        <textarea id="item-description" name="description" class="form-control laf-input" rows="3" placeholder="e.g. Adidas bag, yellow duck keychain..."></textarea>
                      </div>
                      <div class="mb-2">
                        <label for="item-context" class="form-label laf-label">Additional Context</label>
                        <textarea id="item-context" name="additional_context" class="form-control laf-input" rows="3" placeholder="e.g. I was at the study tables..."></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between gap-4 mt-4 mb-8 flex-wrap">
                  <div class="laf-privacy-note flex-grow-1" style="max-width:580px;">
                    <span class="lock-icon">🔒</span>
                    <span>Your photo, exact contact info, and pickup coordinates are only revealed to the verified owner after passing a security check.</span>
                  </div>
                  <button type="button" id="btn-view-summary" class="btn-laf-submit">View Details Summary</button>
                </div>

              </div>
            </main>
          </div>
          <?php include('../../partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include('../../partials/_scrolltop.php'); ?>
  <?php include('../../partials/_modals.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/lost-and-found.js"></script>
</body>
</html>
