<!-- Back + title -->
<div class="d-flex align-items-center justify-content-between mb-6 mt-4">
  <div class="d-flex align-items-center gap-3">
    <a href="../" class="btn-go-back" onclick="KTApp.showPageLoading()"><i class="bi bi-arrow-left"></i></a>
    <div>
      <h2 class="mb-0 fw-bold fs-3 text-gray-900"><?= !empty($item['item_id']) ? 'Edit Item' : 'Add Surrendered Item' ?></h2>
      <p class="mb-0 text-muted fs-7">
        <?= !empty($item['item_id']) ? 'ID: <span class="font-monospace text-primary">' . htmlspecialchars($item['item_id']) . '</span>' : 'Record a newly surrendered lost item' ?>
      </p>
    </div>
  </div>
</div>

<style>
  .image-input-placeholder { background-image: url('/assets/media/svg/files/blank-image.svg'); }
</style>

<form id="edith_form" class="d-flex flex-column flex-lg-row" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= htmlspecialchars($item['item_id']) ?>" />

  <!-- Sidebar (image/status/location) -->
  <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    
    <!-- Thumbnail Card -->
    <div class="card card-flush py-4">
      <div class="card-header">
        <div class="card-title"><h2>Photo</h2></div>
      </div>
      <div class="card-body text-center pt-0">
        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
          data-kt-image-input="true">
          <div class="image-input-wrapper w-150px h-150px"
            <?php if (!empty($item['photo'])): ?>
              style="background-image:url('<?= htmlspecialchars($item['photo']) ?>');"
            <?php endif; ?>
          ></div>
          <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
            <input type="file" name="photo" accept=".png,.jpg,.jpeg" />
            <input type="hidden" name="photo_remove" />
          </label>
          <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
          </span>
          <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove">
            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
          </span>
        </div>
        <div class="text-muted fs-8">Accepted: *.png, *.jpg, *.jpeg</div>
      </div>
    </div>

    <!-- Status Card -->
    <div class="card card-flush py-4">
      <div class="card-header">
        <div class="card-title"><h2>Status</h2></div>
      </div>
      <div class="card-body pt-0">
        <select name="status" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select status">
          <option value="unclaimed" <?= $item['status'] === 'unclaimed' ? 'selected' : '' ?>>Unclaimed</option>
          <option value="claimed" <?= $item['status'] === 'claimed' ? 'selected' : '' ?>>Claimed</option>
        </select>
      </div>
    </div>

    <!-- Location Card -->
    <div class="card card-flush py-4">
      <div class="card-header">
        <div class="card-title"><h2>📍 Location</h2></div>
      </div>
      <div class="card-body pt-0">
        <div class="d-flex flex-column gap-4">
          <div id="loc-floor-wrap">
            <label class="form-label fs-8 fw-bold text-gray-700">Floor</label>
            <select id="loc-floor" name="loc_floor" class="form-select form-select-solid" required>
              <option value="">Select Floor</option>
            </select>
          </div>
          <div id="loc-area-wrap" style="display:none;">
            <label class="form-label fs-8 fw-bold text-gray-700">Area</label>
            <select id="loc-area" name="loc_area" class="form-select form-select-solid">
              <option value="">Select Area</option>
            </select>
          </div>
          <div id="loc-room-wrap" style="display:none;">
            <label class="form-label fs-8 fw-bold text-gray-700">Room</label>
            <select id="loc-room" name="loc_room" class="form-select form-select-solid">
              <option value="">Select Room</option>
            </select>
          </div>
        </div>
        <input type="hidden" id="item-location" name="last_known_location" value="<?= htmlspecialchars($item['location']) ?>">
        <?php if (!empty($item['location'])): ?>
          <p class="mt-3 mb-0 fs-8 text-muted">
            Current: <strong><?= htmlspecialchars($item['location']) ?></strong>
          </p>
        <?php endif; ?>
      </div>
    </div>

  </div>

  <!-- Main Content (general/personnel) -->
  <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    
    <!-- General Card -->
    <div class="card card-flush py-4">
      <div class="card-header">
        <div class="card-title"><h2>General</h2></div>
      </div>
      <div class="card-body pt-0">
        <div class="mb-4">
          <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Item Name <span class="text-danger">*</span></label>
          <input type="text" name="item_name" class="form-control form-control-solid fs-7" placeholder="e.g. Black Backpack" value="<?= htmlspecialchars($item['item_name']) ?>" required>
        </div>
        <div class="mb-4">
          <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Category <span class="text-danger">*</span></label>
          <select name="category" class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="true" data-placeholder="Select category" required>
            <option></option>
            <?php foreach ($categories as $val => $label): ?>
              <option value="<?= htmlspecialchars($val) ?>" <?= $item['category'] === $val ? 'selected' : '' ?>><?= htmlspecialchars($label) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-0">
          <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Description</label>
          <textarea name="description" class="form-control form-control-solid fs-7" rows="4" placeholder="Color, brand, distinguishing marks…"><?= htmlspecialchars($item['description']) ?></textarea>
        </div>
      </div>
    </div>

    <!-- Personnel Card -->
    <div class="card card-flush py-4">
      <div class="card-header">
        <div class="card-title"><h2>👤 Personnel</h2></div>
      </div>
      <div class="card-body pt-0">
        <div class="row g-4">
          <div class="col-md-6">
            <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Surrendered By <span class="text-danger">*</span></label>
            <input type="text" name="surrendered_by" class="form-control form-control-solid fs-7" placeholder="Finder's name" value="<?= htmlspecialchars($item['surrendered_by']) ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Received By <span class="text-danger">*</span></label>
            <input type="text" name="received_by" class="form-control form-control-solid fs-7" placeholder="Staff name" value="<?= htmlspecialchars($item['received_by']) ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Released By</label>
            <input type="text" name="released_by" class="form-control form-control-solid fs-7" placeholder="Releasing staff" value="<?= htmlspecialchars($item['released_by']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label laf-label fs-8 fw-semibold text-gray-700">Claimed By</label>
            <input type="text" name="claimed_by" class="form-control form-control-solid fs-7" placeholder="Owner's name" value="<?= htmlspecialchars($item['claimed_by']) ?>">
          </div>
        </div>
      </div>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-end">
      <a href="../" class="btn btn-secondary me-3" onclick="KTApp.showPageLoading()">Cancel</a>
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>

  </div>
</form>

<script src="../../../assets/js/lost-and-found.js"></script>
<script>
$(document).ready(function () {
  // ── Form Submit AJAX Pattern
  $('#edith_form').submit(function (e) {
    e.preventDefault();
    const btn = $(this).find('[type="submit"]');
    btn.prop('disabled', true).removeClass('btn-primary').addClass('btn-secondary');

    const fd = new FormData(this);

    $.ajax({
      url: 'index-ajax-save.php', method: 'POST',
      data: fd, dataType: 'json', processData: false, contentType: false,
      success: function (res) {
        if (res.status === 'success') {
          toastr.success(res.message);
          setTimeout(() => window.location.href = '../', 1000);
        } else {
          toastr.error(res.message || 'An error occurred.');
          btn.prop('disabled', false).removeClass('btn-secondary').addClass('btn-primary');
        }
      },
      error: () => {
        toastr.error('Request failed.');
        btn.prop('disabled', false).removeClass('btn-secondary').addClass('btn-primary');
      }
    });
  });

  // ── Location cascade
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
    if (areaWrap.style.display !== 'none' && areaSel.value) parts.push(areaSel.value);
    if (roomWrap.style.display !== 'none' && roomSel.value)  parts.push(roomSel.value);
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
        var o = document.createElement('option'); o.value = 'Room ' + n; o.textContent = 'Room ' + n;
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
</script>
