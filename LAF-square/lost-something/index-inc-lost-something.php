<div class="app-container container-xxl pt-8 pb-10">

  <div class="d-flex align-items-center gap-3 mb-6 mt-4">
    <a href="../index.php" class="btn-go-back" onclick="KTApp.showPageLoading()"><i class="bi bi-arrow-left"></i></a>
    <h2 class="mb-0 fw-bold fs-3 text-gray-900">🔍 I Lost Something</h2>
  </div>

  <div class="row g-4">
    <!-- LEFT -->
    <div class="col-lg-6">
      <div class="laf-form-card mb-4 p-5 bg-white border rounded-3">
        <div class="laf-form-section-title fs-8 fw-bolder text-uppercase mb-4">📷 Photo of Item</div>
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
      
      <div class="laf-form-card p-5 bg-white border rounded-3">
        <div class="laf-form-section-title fs-8 fw-bolder text-uppercase mb-4">📍 When &amp; Where</div>
        <div class="mb-4">
          <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Last Known Location <span class="req text-danger">*</span></label>
          <div class="row g-2">
            <div class="col" id="loc-floor-wrap">
              <select id="loc-floor" name="loc_floor" class="form-select laf-input fs-7" required>
                <option value="">Select Floor</option>
              </select>
            </div>
            <div class="col" id="loc-area-wrap" style="display:none;">
              <select id="loc-area" name="loc_area" class="form-select laf-input fs-7">
                <option value="">Select Area</option>
              </select>
            </div>
            <div class="col" id="loc-room-wrap" style="display:none;">
              <select id="loc-room" name="loc_room" class="form-select laf-input fs-7">
                <option value="">Select Room</option>
              </select>
            </div>
          </div>
          <input type="hidden" id="item-location" name="last_known_location">
        </div>
        <div class="row g-3">
          <div class="col-7">
            <label for="item-date" class="form-label laf-label fs-8 fw-semibold text-gray-700">Date Last Seen <span class="req text-danger">*</span></label>
            <input type="date" id="item-date" name="date_last_seen" class="form-control laf-input fs-7" value="2026-06-04" required>
          </div>
          <div class="col-5">
            <label for="item-time" class="form-label laf-label fs-8 fw-semibold text-gray-700">Approx. Time <span class="req text-danger">*</span></label>
            <input type="time" id="item-time" name="approx_time" class="form-control laf-input fs-7" value="14:30" required>
          </div>
        </div>
      </div>
    </div>
    
    <!-- RIGHT -->
    <div class="col-lg-6">
      <div class="laf-form-card p-5 bg-white border rounded-3 h-100">
        <div class="laf-form-section-title fs-8 fw-bolder text-uppercase mb-4">🏷️ Item Details</div>
        <div class="mb-4">
          <label for="item-name" class="form-label laf-label fs-8 fw-semibold text-gray-700">Item Name <span class="req text-danger">*</span></label>
          <input type="text" id="item-name" name="item_name" class="form-control laf-input fs-7" placeholder="e.g. Black Backpack" value="Black Adidas Backpack" required>
        </div>
        <div class="mb-4">
          <label for="item-category" class="form-label laf-label fs-8 fw-semibold text-gray-700">Category <span class="req text-danger">*</span></label>
          <select id="item-category" name="category" class="form-select laf-input fs-7" required>
            <?php foreach ($categories as $val => $label): ?>
              <option value="<?= htmlspecialchars($val) ?>"><?= htmlspecialchars($label) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-4">
          <label for="item-description" class="form-label laf-label fs-8 fw-semibold text-gray-700">Description</label>
          <textarea id="item-description" name="description" class="form-control laf-input fs-7" rows="3" placeholder="e.g. Adidas bag, yellow duck keychain...">Black bag with yellow duck keychain, initials "R.T." written inside.</textarea>
        </div>
        <div class="mb-2">
          <label for="item-context" class="form-label laf-label fs-8 fw-semibold text-gray-700">Additional Context</label>
          <textarea id="item-context" name="additional_context" class="form-control laf-input fs-7" rows="3" placeholder="e.g. I was at the study tables...">I was at the study tables near the window on the 14th Floor Library.</textarea>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex align-items-center justify-content-between gap-4 mt-6 mb-8 flex-wrap">
    <div class="laf-privacy-note flex-grow-1 p-4 border rounded bg-light" style="max-width:580px;">
      <span class="lock-icon me-2">🔒</span>
      <span class="fs-8 text-gray-600">Your photo, exact contact info, and pickup coordinates are only revealed to the verified owner after passing a security check.</span>
    </div>
    <button type="button" id="btn-view-summary" class="btn btn-primary py-3 px-6 fw-bold">View Details Summary</button>
  </div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>
