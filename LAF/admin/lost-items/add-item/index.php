<?php
define('MBG', TRUE);
include('../../../functions-new.php');

$META_TITLE = "Add Surrendered Item · Admin · Lost and Found";

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
                    <h2 class="mb-0 fw-bold" style="font-size:1.4rem;">Add Surrendered Item</h2>
                    <p class="mb-0 text-muted" style="font-size:.82rem;">Record a newly surrendered lost item</p>
                  </div>
                </div>

                <div class="row g-4 mb-8">
                  <!-- LEFT col -->
                  <div class="col-lg-5">

                    <!-- Photo -->
                    <div class="laf-form-card mb-4">
                      <div class="laf-form-section-title">📷 Item Photo</div>
                      <div class="laf-upload-zone" id="upload-zone"
                        onclick="document.getElementById('item-photo').click()"
                        style="cursor:pointer;">
                        <img id="upload-preview" src="" alt=""
                          style="display:none;max-height:150px;border-radius:8px;margin-bottom:8px;">
                        <div id="upload-icon" class="upload-icon">🖼️</div>
                        <div id="upload-label">
                          <span class="text-primary fw-semibold">Click to upload</span> or drag &amp; drop<br>
                          <span style="font-size:.78rem;color:var(--laf-muted);">PNG, JPG, WEBP · up to 10 MB</span>
                        </div>
                        <input type="file" id="item-photo" name="item_photo"
                          accept="image/*" style="display:none;"
                          onchange="previewPhoto(this)">
                      </div>
                    </div>

                    <!-- Location -->
                    <div class="laf-form-card">
                      <div class="laf-form-section-title">📍 Last Known Location</div>
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
                    </div>
                  </div>

                  <!-- RIGHT col -->
                  <div class="col-lg-7">

                    <!-- Item details -->
                    <div class="laf-form-card mb-4">
                      <div class="laf-form-section-title">🏷️ Item Details</div>
                      <div class="mb-3">
                        <label class="form-label laf-label">Item Name <span class="req">*</span></label>
                        <input type="text" id="item-name" name="item_name"
                          class="form-control laf-input" placeholder="e.g. Black Backpack" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label laf-label">Category <span class="req">*</span></label>
                        <select id="item-category" name="category" class="form-select laf-input" required>
                          <?php foreach ($categories as $val => $label): ?>
                            <option value="<?= htmlspecialchars($val) ?>"><?= htmlspecialchars($label) ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-0">
                        <label class="form-label laf-label">Description</label>
                        <textarea id="item-description" name="description"
                          class="form-control laf-input" rows="3"
                          placeholder="Color, brand, distinguishing marks…"></textarea>
                      </div>
                    </div>

                    <!-- Personnel -->
                    <div class="laf-form-card">
                      <div class="laf-form-section-title">👤 Personnel</div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label laf-label">Surrendered By <span class="req">*</span></label>
                          <input type="text" name="surrendered_by"
                            class="form-control laf-input" placeholder="Name of finder/surrenderer" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label laf-label">Received By <span class="req">*</span></label>
                          <input type="text" name="received_by"
                            class="form-control laf-input" placeholder="LAF staff who accepted" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label laf-label">Released By</label>
                          <input type="text" name="released_by"
                            class="form-control laf-input" placeholder="Staff who released item">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label laf-label">Claimed By</label>
                          <input type="text" name="claimed_by"
                            class="form-control laf-input" placeholder="Owner who claimed item">
                        </div>
                      </div>
                      <p class="mt-3 mb-0" style="font-size:.75rem;color:var(--laf-muted);">
                        <i class="bi bi-info-circle-fill me-1"></i>
                        Date &amp; time are recorded automatically when the item is posted.
                      </p>
                    </div>

                  </div>
                </div>

                <!-- Submit -->
                <div class="d-flex align-items-center justify-content-between gap-4 mb-8 flex-wrap">
                  <div class="laf-privacy-note flex-grow-1" style="max-width:560px;">
                    <span class="lock-icon">🔒</span>
                    <span>Item details are only visible to authorized LAF staff and the verified owner after a security check.</span>
                  </div>
                  <button type="button" id="btn-submit-item" class="btn-laf-submit"
                    onclick="submitItem()">
                    <i class="bi bi-box-seam me-1"></i> Post Item
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

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
      <div class="modal-content" style="border-radius:16px;border:none;">
        <div class="modal-body text-center p-5">
          <div style="font-size:2.5rem;margin-bottom:12px;">✅</div>
          <h5 class="fw-bold mb-2">Item Posted!</h5>
          <p class="text-muted mb-4" style="font-size:.88rem;">The surrendered item has been recorded successfully.</p>
          <div class="d-flex gap-2 justify-content-center">
            <a href="../index.php" class="btn-tbl btn-tbl-edit">Back to List</a>
            <button class="btn-laf-submit" onclick="location.reload()">Add Another</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/js/lost-and-found.js"></script>
  <script>
    // ── Photo preview
    function previewPhoto(input) {
      var file = input.files[0];
      if (!file) return;
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('upload-preview').src = e.target.result;
        document.getElementById('upload-preview').style.display = '';
        document.getElementById('upload-icon').style.display = 'none';
        document.getElementById('upload-label').innerHTML =
          '<span class="text-primary fw-semibold">Change photo</span>';
      };
      reader.readAsDataURL(file);
    }

    // Drag & drop
    var zone = document.getElementById('upload-zone');
    zone.addEventListener('dragover', function(e) {
      e.preventDefault();
      zone.style.borderColor = 'var(--laf-purple)';
    });
    zone.addEventListener('dragleave', function() {
      zone.style.borderColor = '';
    });
    zone.addEventListener('drop', function(e) {
      e.preventDefault();
      zone.style.borderColor = '';
      var files = e.dataTransfer.files;
      if (files.length) {
        document.getElementById('item-photo').files = files;
        previewPhoto(document.getElementById('item-photo'));
      }
    });

    // ── Location cascade 
    document.addEventListener('DOMContentLoaded', function() {
      var floorSel = document.getElementById('loc-floor');
      var areaWrap = document.getElementById('loc-area-wrap');
      var areasel = document.getElementById('loc-area');
      var roomWrap = document.getElementById('loc-room-wrap');
      var roomSel = document.getElementById('loc-room');
      var locHidden = document.getElementById('item-location');

      // Populate floors
      if (typeof FEUTech_placeOptions !== 'undefined') {
        Object.keys(FEUTech_placeOptions).forEach(function(floor) {
          var opt = document.createElement('option');
          opt.value = floor;
          opt.textContent = floor;
          floorSel.appendChild(opt);
        });
      }

      function updateHidden() {
        var parts = [floorSel.value];
        if (areasel.value) parts.push(areasel.value);
        if (roomSel.value) parts.push(roomSel.value);
        locHidden.value = parts.filter(Boolean).join(' · ');
      }

      floorSel.addEventListener('change', function() {
        var floor = floorSel.value;
        areasel.innerHTML = '<option value="">Select Area</option>';
        roomSel.innerHTML = '<option value="">Select Room</option>';
        roomWrap.style.display = 'none';
        if (floor && FEUTech_placeOptions[floor]) {
          FEUTech_placeOptions[floor].forEach(function(area) {
            var o = document.createElement('option');
            o.value = area;
            o.textContent = area;
            areasel.appendChild(o);
          });
          areaWrap.style.display = FEUTech_placeOptions[floor].length ? '' : 'none';
        } else {
          areaWrap.style.display = 'none';
        }
        updateHidden();
      });

      areasel.addEventListener('change', function() {
        var floor = floorSel.value;
        var area = areasel.value;
        roomSel.innerHTML = '<option value="">Select Room</option>';
        if (area === 'Room' && FEUTech_roomRanges && FEUTech_roomRanges[floor]) {
          var range = FEUTech_roomRanges[floor];
          for (var n = range[0]; n <= range[1]; n++) {
            var o = document.createElement('option');
            o.value = n;
            o.textContent = 'Room ' + n;
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

    // Submit
    function submitItem() {
      var name = document.getElementById('item-name').value.trim();
      var cat = document.getElementById('item-category').value;
      if (!name || !cat) {
        alert('Please fill in at least Item Name and Category.');
        return;
      }
      bootstrap.Modal.getOrCreateInstance(document.getElementById('successModal')).show();
    }
  </script>
</body>

</html>