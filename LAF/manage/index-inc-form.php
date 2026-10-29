<div class="d-flex align-items-center mb-8">
  <a href="<?= $LAF_BASE_URL ?>/discover.php" class="btn btn-sm btn-icon btn-light me-4"><i class="bi bi-arrow-left"></i></a>
  <div>
    <h1 class="text-gray-900 fw-bold fs-2 mb-1">I Lost Something</h1>
    <span class="text-muted fs-7">Provide as much information as possible to help identify your item.</span>
  </div>
</div>

<form id="lost-item-form">
  <div class="row g-8">
    <div class="col-lg-5">
      <div class="card card-bordered h-100">
        <div class="card-header"><h2 class="card-title fs-4">Item Photo</h2></div>
        <div class="card-body">
          <label class="form-label">Photo of Item</label>
          <div class="border border-2 border-dashed border-gray-300 rounded text-center p-10">
            <i class="ki-duotone ki-file-up fs-3x text-primary mb-3"><span class="path1"></span><span class="path2"></span></i>
            <div class="fw-semibold text-gray-700 mb-2">Choose a clear item photo</div>
            <div class="text-muted fs-8 mb-5">JPG, PNG, or WEBP</div>
            <input type="file" name="item_photo" class="form-control form-control-solid" accept="image/*">
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="card card-bordered h-100">
        <div class="card-header"><h2 class="card-title fs-4">Item Details</h2></div>
        <div class="card-body">
          <div class="mb-6">
            <label class="form-label required">Item Name</label>
            <input type="text" name="item_name" class="form-control form-control-solid" placeholder="Example: Black Backpack" required>
          </div>
          <div class="mb-6">
            <label class="form-label required">Category</label>
            <select name="category" class="form-select form-select-solid" required>
              <option value="">Select category</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-6">
            <label class="form-label required">Description</label>
            <textarea name="description" class="form-control form-control-solid" rows="4" placeholder="Brand, color, marks, or other identifying details" required></textarea>
          </div>
          <div>
            <label class="form-label">Additional Context</label>
            <textarea name="context" class="form-control form-control-solid" rows="3" placeholder="Where you last remember using the item"></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card card-bordered">
        <div class="card-header">
          <h2 class="card-title fs-4">
            <i class="ki-duotone ki-geolocation fs-2 text-primary me-3"><span class="path1"></span><span class="path2"></span></i>
            Last Known Location
          </h2>
        </div>
        <div class="card-body">
          <div class="row g-6">
            <div class="col-md-4">
              <label class="form-label required">Floor</label>
              <select id="laf-floor" name="floor" class="form-select form-select-solid" required>
                <option value="">Select floor</option>
                <option>1st Floor</option>
                <option>2nd Floor</option>
                <option>3rd Floor</option>
                <option>4th Floor</option>
                <option>5th Floor</option>
                <option>6th Floor</option>
                <option>7th Floor</option>
                <option>8th Floor</option>
                <option>9th Floor</option>
                <option>10th Floor</option>
                <option>11th Floor</option>
                <option>12th Floor</option>
                <option>14th Floor</option>
                <option>15th Floor</option>
                <option>16th Floor</option>
                <option>17th Floor</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label required">Place / Area</label>
              <select id="laf-place" name="place" class="form-select form-select-solid" disabled required>
                <option value="">Select floor first</option>
              </select>
            </div>
            <div id="laf-room-field" class="col-md-4 d-none">
              <label class="form-label required">Room</label>
              <select id="laf-room" name="room" class="form-select form-select-solid" disabled>
                <option value="">Select room</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label required">Date Last Seen</label>
              <input type="date" name="date_last_seen" class="form-control form-control-solid" required>
            </div>
            <div class="col-md-6">
              <label class="form-label required">Time Last Seen</label>
              <input type="time" name="time_last_seen" class="form-control form-control-solid" required>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-3 mt-8">
    <a href="<?= $LAF_BASE_URL ?>/discover.php" class="btn btn-light">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit Lost Item Report</button>
  </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const FEUTech_placeOptions = {
    '1st Floor': ['Parking', 'TAMbayan'],
    '2nd Floor': ['Student Plaza'],
    '3rd Floor': ['Pool', 'Gym', 'Comfort Room'],
    '4th Floor': ['Study Area', 'Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '5th Floor': ['Study Area', 'Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '6th Floor': ['Study Area', 'Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '7th Floor': ['Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '8th Floor': ['Canteen', 'Associate Lounge'],
    '9th Floor': ['Study Area', 'Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '10th Floor': ['Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '11th Floor': ['Room', 'Comfort Room', 'Hallway', 'Stairs', 'Study Area', 'Student Lounge'],
    '12th Floor': ['Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '14th Floor': ['Library', 'Discussion Room', 'Mathematics Resource Center (MRC)', 'English Resource Center (ERC)', 'Comfort Room', 'Hallway', 'Stairs'],
    '15th Floor': ['Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '16th Floor': ['Room', 'Comfort Room', 'Hallway', 'Stairs'],
    '17th Floor': []
  };

  const FEUTech_roomRanges = {
    '4th Floor': [401, 412],
    '5th Floor': [501, 511],
    '6th Floor': [601, 612],
    '7th Floor': [701, 713],
    '9th Floor': [901, 912],
    '10th Floor': [1001, 1013],
    '11th Floor': [1101, 1112],
    '12th Floor': [1201, 1212],
    '15th Floor': [1501, 1511],
    '16th Floor': [1601, 1611]
  };

  var floor = document.getElementById('laf-floor');
  var place = document.getElementById('laf-place');
  var roomField = document.getElementById('laf-room-field');
  var room = document.getElementById('laf-room');

  function resetRoom() {
    room.innerHTML = '<option value="">Select room</option>';
    room.disabled = true;
    room.required = false;
    roomField.classList.add('d-none');
  }

  floor.addEventListener('change', function () {
    var places = FEUTech_placeOptions[floor.value] || [];
    place.innerHTML = '<option value="">Select place / area</option>';
    places.forEach(function (option) {
      var item = document.createElement('option');
      item.value = option;
      item.textContent = option;
      place.appendChild(item);
    });
    place.disabled = places.length === 0;
    resetRoom();
  });

  place.addEventListener('change', function () {
    resetRoom();
    if (place.value !== 'Room' || !FEUTech_roomRanges[floor.value]) return;

    var range = FEUTech_roomRanges[floor.value];
    for (var number = range[0]; number <= range[1]; number++) {
      var option = document.createElement('option');
      option.value = number;
      option.textContent = 'Room ' + number;
      room.appendChild(option);
    }
    room.disabled = false;
    room.required = true;
    roomField.classList.remove('d-none');
  });
});
</script>

