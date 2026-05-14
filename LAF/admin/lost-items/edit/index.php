<?php
define('MBG', TRUE);
include('../../../functions-new.php');

$META_TITLE = "Edit Item · Admin · Lost and Found";

// Get item ID from URL
$item_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

// Mock — replace with DB fetch using $item_id
$item = [
  'item_id'        => $item_id ?: 'ITM-2604-0720-2320',
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/css/lost-and-found.css" rel="stylesheet">
  <link href="../../../assets/css/sec-modals.css" rel="stylesheet">
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include('../../../partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include('../../../partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">

                <!-- Back + title -->
                <div class="d-flex align-items-center gap-3 mb-5 mt-5">
                  <a href="../index.php" class="btn-go-back"><i class="bi bi-arrow-left"></i></a>
                  <div>
                    <h2 class="mb-0 fw-bold" style="font-size:1.4rem;">Edit Item</h2>
                    <p class="mb-0" style="font-size:.78rem;color:var(--laf-muted);">
                      ID: <span style="font-family:monospace;color:var(--laf-purple);"><?= $item['item_id'] ?></span>
                    </p>
                  </div>
                </div>

                <div class="row g-4 mb-8">

                  <!-- LEFT -->
                  <div class="col-lg-5">

                    <!-- Photo -->
                    <div class="laf-form-card mb-4">
                      <div class="laf-form-section-title">📷 Item Photo</div>
                      <div class="laf-upload-zone" id="upload-zone"
                           onclick="document.getElementById('item-photo').click()"
                           style="cursor:pointer;">
                        <img id="upload-preview" src="<?= htmlspecialchars($item['photo']) ?>"
                             alt="" style="<?= $item['photo'] ? '' : 'display:none;' ?>max-height:150px;border-radius:8px;margin-bottom:8px;">
                        <div id="upload-icon" class="upload-icon" <?= $item['photo'] ? 'style="display:none;"' : '' ?>>🖼️</div>
                        <div id="upload-label">
                          <?php if ($item['photo']): ?>
                            <span class="text-primary fw-semibold">Change photo</span>
                          <?php else: ?>
                            <span class="text-primary fw-semibold">Click to upload</span> or drag &amp; drop<br>
                            <span style="font-size:.78rem;color:var(--laf-muted);">PNG, JPG, WEBP · up to 10 MB</span>
                          <?php endif; ?>
                        </div>
                        <input type="file" id="item-photo" name="item_photo"
                               accept="image/*" style="display:none;"
                               onchange="previewPhoto(this)">
                      </div>
                    </div>

                    <!-- Status -->
                    <div class="laf-form-card mb-4">
                      <div class="laf-form-section-title">🏷️ Status</div>
                      <div class="d-flex gap-3">
                        <label class="d-flex align-items-center gap-2" style="cursor:pointer;font-size:.9rem;font-weight:600;">
                          <input type="radio" name="status" value="unclaimed" class="form-check-input"
                                 <?= $item['status'] === 'unclaimed' ? 'checked' : '' ?>>
                          <span class="badge-not-found">Unclaimed</span>
                        </label>
                        <label class="d-flex align-items-center gap-2" style="cursor:pointer;font-size:.9rem;font-weight:600;">
                          <input type="radio" name="status" value="claimed" class="form-check-input"
                                 <?= $item['status'] === 'claimed' ? 'checked' : '' ?>>
                          <span class="badge-found">Claimed</span>
                        </label>
                      </div>
                    </div>

                    <!-- Location -->
                    <div class="laf-form-card">
                      <div class="laf-form-section-title">📍 Last Known Location</div>
                      <div class="row g-2">
                        <div class="col" id="loc-floor-wrap">
                          <select id="loc-floor" name="loc_floor" class="form-select laf-input">
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
                      <input type="hidden" id="item-location" name="last_known_location"
                             value="<?= htmlspecialchars($item['location']) ?>">
                      <p class="mt-2 mb-0" style="font-size:.75rem;color:var(--laf-muted);">
                        Current: <strong><?= htmlspecialchars($item['location']) ?></strong>
                      </p>
                    </div>

                  </div>

                  <!-- RIGHT -->
                  <div class="col-lg-7">

                    <!-- Item Details -->
                    <div class="laf-form-card mb-4">
                      <div class="laf-form-section-title">🏷️ Item Details</div>
                      <div class="mb-3">
                        <label class="form-label laf-label">Item Name <span class="req">*</span></label>
                        <input type="text" id="item-name" name="item_name"
                               class="form-control laf-input"
                               value="<?= htmlspecialchars($item['item_name']) ?>" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label laf-label">Category <span class="req">*</span></label>
                        <select id="item-category" name="category" class="form-select laf-input" required>
                          <?php foreach ($categories as $val => $label): ?>
                            <option value="<?= $val ?>" <?= $item['category'] === $val ? 'selected' : '' ?>>
                              <?= $label ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-0">
                        <label class="form-label laf-label">Description</label>
                        <textarea id="item-description" name="description"
                                  class="form-control laf-input" rows="3"><?= htmlspecialchars($item['description']) ?></textarea>
                      </div>
                    </div>

                    <!-- Personnel -->
                    <div class="laf-form-card">
                      <div class="laf-form-section-title">👤 Personnel</div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label laf-label">Surrendered By <span class="req">*</span></label>
                          <input type="text" name="surrendered_by" class="form-control laf-input"
                                 value="<?= htmlspecialchars($item['surrendered_by']) ?>" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label laf-label">Received By <span class="req">*</span></label>
                          <input type="text" name="received_by" class="form-control laf-input"
                                 value="<?= htmlspecialchars($item['received_by']) ?>" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label laf-label">Released By</label>
                          <input type="text" name="released_by" class="form-control laf-input"
                                 value="<?= htmlspecialchars($item['released_by']) ?>">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label laf-label">Claimed By</label>
                          <input type="text" name="claimed_by" class="form-control laf-input"
                                 value="<?= htmlspecialchars($item['claimed_by']) ?>">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!-- Actions -->
                <div class="d-flex align-items-center justify-content-between gap-4 mb-8 flex-wrap">
                  <a href="../index.php" class="btn-tbl btn-tbl-cancel" style="padding:10px 20px;font-size:.88rem;">
                    <i class="bi bi-x-lg me-1"></i> Discard Changes
                  </a>
                  <button type="button" class="btn-laf-submit" onclick="saveItem()">
                    <i class="bi bi-floppy-fill me-1"></i> Save Changes
                  </button>
                </div>

              </div>
            </main>
          </div>
          <?php include('../../../partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include('../../../partials/_scrolltop.php'); ?>

  <!-- Save Success Toast -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index:9999;">
    <div id="saveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body fw-semibold">
          <i class="bi bi-check-circle-fill me-2"></i> Item saved successfully.
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/js/lost-and-found.js"></script>
  <script>
  // ── Photo preview
  function previewPhoto(input) {
    if (!input.files[0]) return;
    var reader = new FileReader();
    reader.onload = function(e) {
      var preview = document.getElementById('upload-preview');
      preview.src = e.target.result;
      preview.style.display = '';
      document.getElementById('upload-icon').style.display = 'none';
      document.getElementById('upload-label').innerHTML =
        '<span class="text-primary fw-semibold">Change photo</span>';
    };
    reader.readAsDataURL(input.files[0]);
  }

  // Drag & drop
  var zone = document.getElementById('upload-zone');
  zone.addEventListener('dragover',  function(e) { e.preventDefault(); zone.style.borderColor = 'var(--laf-purple)'; });
  zone.addEventListener('dragleave', function()  { zone.style.borderColor = ''; });
  zone.addEventListener('drop', function(e) {
    e.preventDefault(); zone.style.borderColor = '';
    var files = e.dataTransfer.files;
    if (files.length) {
      document.getElementById('item-photo').files = files;
      previewPhoto(document.getElementById('item-photo'));
    }
  });

  // ── Location cascade
  document.addEventListener('DOMContentLoaded', function () {
    var floorSel  = document.getElementById('loc-floor');
    var areaWrap  = document.getElementById('loc-area-wrap');
    var areaSel   = document.getElementById('loc-area');
    var roomWrap  = document.getElementById('loc-room-wrap');
    var roomSel   = document.getElementById('loc-room');
    var locHidden = document.getElementById('item-location');

    if (typeof FEUTech_placeOptions !== 'undefined') {
      Object.keys(FEUTech_placeOptions).forEach(function(floor) {
        var opt = document.createElement('option');
        opt.value = floor; opt.textContent = floor;
        floorSel.appendChild(opt);
      });
    }

    function updateHidden() {
      var parts = [floorSel.value];
      if (areaSel.value) parts.push(areaSel.value);
      if (roomSel.value)  parts.push(roomSel.value);
      locHidden.value = parts.filter(Boolean).join(' · ');
    }

    floorSel.addEventListener('change', function () {
      var floor = floorSel.value;
      areaSel.innerHTML = '<option value="">Select Area</option>';
      roomSel.innerHTML  = '<option value="">Select Room</option>';
      roomWrap.style.display = 'none';
      if (floor && FEUTech_placeOptions[floor] && FEUTech_placeOptions[floor].length) {
        FEUTech_placeOptions[floor].forEach(function(area) {
          var o = document.createElement('option'); o.value = area; o.textContent = area;
          areaSel.appendChild(o);
        });
        areaWrap.style.display = '';
      } else {
        areaWrap.style.display = 'none';
      }
      updateHidden();
    });

    areaSel.addEventListener('change', function () {
      var floor = floorSel.value;
      roomSel.innerHTML = '<option value="">Select Room</option>';
      if (areaSel.value === 'Room' && FEUTech_roomRanges && FEUTech_roomRanges[floor]) {
        var r = FEUTech_roomRanges[floor];
        for (var n = r[0]; n <= r[1]; n++) {
          var o = document.createElement('option'); o.value = n; o.textContent = 'Room ' + n;
          roomSel.appendChild(o);
        }
        roomWrap.style.display = '';
      } else {
        roomWrap.style.display = 'none';
      }
      updateHidden();
    });

    roomSel.addEventListener('change', updateHidden);
  });

  // ── Save
  function saveItem() {
    var name = document.getElementById('item-name').value.trim();
    var cat  = document.getElementById('item-category').value;
    if (!name || !cat) {
      alert('Item Name and Category are required.');
      return;
    }
    // TODO: POST to your save/update endpoint with item_id + form fields
    // e.g. fetch('../ajax-update.php', { method:'POST', body: new FormData(...) })
    var toast = new bootstrap.Toast(document.getElementById('saveToast'), { delay: 3000 });
    toast.show();
  }
  </script>
</body>
</html>
