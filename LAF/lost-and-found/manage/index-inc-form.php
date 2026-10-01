<div class="d-flex align-items-center mb-8">
  <a href="../" class="btn btn-sm btn-icon btn-light me-4"><i class="bi bi-arrow-left"></i></a>
  <div>
    <h1 class="text-gray-900 fw-bold fs-2 mb-1">I Lost Something</h1>
    <span class="text-muted fs-7">Provide as much information as possible to help identify your item.</span>
  </div>
</div>

<form id="lost-item-form">
  <div class="row g-8">
    <div class="col-lg-5">
      <div class="card card-bordered h-100">
        <div class="card-header"><h2 class="card-title fs-4">Photo and Location</h2></div>
        <div class="card-body">
          <label class="form-label">Photo of Item</label>
          <div class="border border-2 border-dashed border-gray-300 rounded text-center p-10 mb-7">
            <i class="ki-duotone ki-file-up fs-3x text-primary mb-3"><span class="path1"></span><span class="path2"></span></i>
            <div class="fw-semibold text-gray-700 mb-2">Choose a clear item photo</div>
            <input type="file" class="form-control form-control-solid" accept="image/*">
          </div>

          <div class="mb-6">
            <label class="form-label required">Last Known Location</label>
            <input type="text" class="form-control form-control-solid" placeholder="Example: 14th Floor, Library" required>
          </div>
          <div class="row g-5">
            <div class="col-md-7">
              <label class="form-label required">Date Last Seen</label>
              <input type="date" class="form-control form-control-solid" required>
            </div>
            <div class="col-md-5">
              <label class="form-label required">Time</label>
              <input type="time" class="form-control form-control-solid" required>
            </div>
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
            <input type="text" class="form-control form-control-solid" placeholder="Example: Black Backpack" required>
          </div>
          <div class="mb-6">
            <label class="form-label required">Category</label>
            <select class="form-select form-select-solid" required>
              <option value="">Select category</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-6">
            <label class="form-label required">Description</label>
            <textarea class="form-control form-control-solid" rows="5" placeholder="Brand, color, marks, or other identifying details" required></textarea>
          </div>
          <div>
            <label class="form-label">Additional Context</label>
            <textarea class="form-control form-control-solid" rows="4" placeholder="Where you last remember using the item"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-3 mt-8">
    <a href="../" class="btn btn-light">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit Lost Item Report</button>
  </div>
</form>
