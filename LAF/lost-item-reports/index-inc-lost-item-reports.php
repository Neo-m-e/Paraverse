<div class="app-container container-xxl pt-8 pb-10">

  <!-- Page header -->
  <div class="d-flex align-items-center gap-3 mb-6 mt-4">
    <a href="../index.php" class="btn-go-back" onclick="KTApp.showPageLoading()"><i class="bi bi-arrow-left"></i></a>
    <div>
      <h2 class="mb-0 fw-bold fs-3 text-gray-900">My Lost Item Reports</h2>
      <p class="mb-0 text-muted fs-7">Viewing reports filed under <?= htmlspecialchars($user_id) ?></p>
    </div>
  </div>

  <!-- Card -->
  <div class="card border-0 shadow-sm mb-8" style="border-radius:14px;overflow:hidden;">

    <!-- card-header: title + search + Metronic filter -->
    <div class="card-header border-bottom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 py-4 px-5">
      <div>
        <span class="fw-bold fs-5 text-gray-800">All Reports</span>
        <span class="badge bg-light text-dark ms-2 fw-semibold" style="font-size:.78rem;">
          <?= count($reports) ?> record(s)
        </span>
      </div>

      <div class="d-flex align-items-center gap-2 flex-wrap">

        <!-- Search -->
        <div class="input-group" style="width:210px;">
          <span class="input-group-text bg-light border-end-0 border-secondary-subtle">
            <i class="bi bi-search text-muted" style="font-size:.82rem;"></i>
          </span>
          <input type="text" id="laf-search"
                 class="form-control border-start-0 border-secondary-subtle bg-light fs-7"
                 placeholder="Search by name or ID…">
        </div>

        <!-- Metronic Filter -->
        <div class="m-0">
          <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold"
             data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <i class="bi bi-funnel fs-6 text-muted me-1"></i>Filter
          </a>
          <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
            <div class="px-7 py-5">
              <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
            </div>
            <div class="separator border-gray-200"></div>
            <div class="px-7 py-5">

              <!-- Status -->
              <div class="mb-10">
                <label class="form-label fw-semibold fs-7">Status:</label>
                <div class="d-flex flex-column gap-3">
                  <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input laf-filter-status" type="checkbox" value="found">
                    <span class="form-check-label">Found</span>
                  </label>
                  <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input laf-filter-status" type="checkbox" value="not-found">
                    <span class="form-check-label">Not Found</span>
                  </label>
                  <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input laf-filter-status" type="checkbox" value="pending">
                    <span class="form-check-label">Pending</span>
                  </label>
                </div>
              </div>

              <!-- Actions -->
              <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                        data-kt-menu-dismiss="true" id="laf-filter-reset">Reset</button>
                <button type="submit" class="btn btn-sm btn-primary"
                        data-kt-menu-dismiss="true" id="laf-filter-apply">Apply</button>
              </div>

            </div>
          </div>
        </div>
        <!-- end Metronic Filter -->

      </div>
    </div><!-- /card-header -->

    <!-- card-body: table only -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped gy-7 gs-7 mb-0 align-middle" id="reports-table">
          <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
              <th class="ps-5" style="width:44px;">
                <input type="checkbox" class="form-check-input" id="user-check-all">
              </th>
              <th>Item Details</th>
              <th>Status</th>
              <th class="pe-5 text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($reports as $r):
              $s  = $status_labels[$r['status']] ?? ['label' => ucfirst($r['status']), 'class' => 'badge-pending'];
              $cc = $cat_badge_class[$r['category']] ?? 'badge-essentials';
            ?>
            <tr data-report-id="<?= htmlspecialchars($r['report_id']) ?>"
                data-status="<?= htmlspecialchars($r['status']) ?>"
                data-name="<?= strtolower(htmlspecialchars($r['item_name'])) ?>"
                data-search-id="<?= strtolower(htmlspecialchars($r['report_id'])) ?>">

              <td class="ps-5"><input type="checkbox" class="form-check-input row-check"></td>

              <!-- Item Details -->
              <td style="min-width:230px;">
                <div class="cell-id fs-8 fw-bold font-monospace text-primary mb-1"><?= htmlspecialchars($r['report_id']) ?></div>
                <div class="cell-name fs-6 fw-bold text-gray-800 mb-1"><?= htmlspecialchars($r['item_name']) ?></div>
                <div class="cell-cat mt-1">
                  <span class="badge-laf-cat <?= $cc ?>">
                    <?= htmlspecialchars($category_labels[$r['category']] ?? $r['category']) ?>
                  </span>
                </div>
                <div class="fs-8 text-muted mt-2">
                  <i class="bi bi-geo-alt-fill fs-8 me-1"></i>
                  <?= htmlspecialchars($r['location']) ?>
                </div>
                <div class="fs-8 text-muted mt-1">
                  <i class="bi bi-calendar3 fs-8 me-1"></i>
                  Filed: <?= htmlspecialchars($r['date_filed']) ?>
                </div>
              </td>

              <!-- Status -->
              <td style="min-width:110px;">
                <span class="report-status-badge <?= $s['class'] ?>"><?= $s['label'] ?></span>
              </td>

              <!-- Actions -->
              <td class="pe-5 text-end" style="min-width:140px;">
                <div class="d-flex flex-column align-items-end gap-2">
                  <button class="btn-tbl btn-tbl-edit fs-8 py-2 px-3"
                          onclick="lafOpenEditModal(<?= htmlspecialchars(json_encode($r)) ?>)">
                    <i class="bi bi-pencil-fill"></i> Edit
                  </button>
                  <button class="btn-tbl btn-tbl-delete fs-8 py-2 px-3"
                          onclick="lafConfirmDelete('<?= htmlspecialchars($r['report_id']) ?>')">
                    <i class="bi bi-trash3-fill"></i> Delete
                  </button>
                  <button class="btn-tbl btn-tbl-cancel fs-8 py-2 px-3"
                          onclick="lafConfirmCancel('<?= htmlspecialchars($r['report_id']) ?>')">
                    <i class="bi bi-x-circle-fill"></i> Cancel
                  </button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div class="laf-empty-state py-5" id="empty-state" style="display:none;">
          <div class="empty-icon">📋</div>
          <p>No reports match your filters.</p>
        </div>
      </div>
    </div><!-- /card-body -->
  </div><!-- /card -->

</div>

<!-- ════ Edit Modal ════ -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered mw-650px">
    <div class="modal-content" style="border-radius:16px;border:none;">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="font-size:1.1rem;">
          <i class="bi bi-pencil-fill me-2" style="color:var(--laf-purple);"></i>Edit Report
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-4">
        <input type="hidden" id="edit-report-id">
        <div class="row g-4">
          <div class="col-md-6">
            <label class="laf-label fs-8 fw-semibold text-uppercase text-gray-700">Item Name <span class="req text-danger">*</span></label>
            <input type="text" id="edit-item-name" class="form-control laf-input fs-7" placeholder="e.g. Black Backpack">
          </div>
          <div class="col-md-6">
            <label class="laf-label fs-8 fw-semibold text-uppercase text-gray-700">Category</label>
            <select id="edit-category" class="form-select laf-input fs-7">
              <?php foreach ($category_labels as $val => $lbl): ?>
                <option value="<?= $val ?>"><?= $lbl ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-12">
            <label class="laf-label fs-8 fw-semibold text-uppercase text-gray-700">Description</label>
            <textarea id="edit-description" class="form-control laf-input fs-7" rows="3"></textarea>
          </div>
          <div class="col-md-8">
            <label class="laf-label fs-8 fw-semibold text-uppercase text-gray-700">Last Known Location</label>
            <input type="text" id="edit-location" class="form-control laf-input fs-7" placeholder="e.g. 11th Floor · Study Area">
          </div>
          <div class="col-md-4">
            <label class="laf-label fs-8 fw-semibold text-uppercase text-gray-700">Status <span class="req text-danger">*</span></label>
            <select id="edit-status" class="form-select laf-input fs-7"
                    onchange="lafPreviewStatus(this.value)">
              <option value="not-found">Not Found</option>
              <option value="found">Found</option>
              <option value="pending">Pending</option>
            </select>
            <!-- Live preview badge -->
            <span id="edit-status-preview" class="badge-not-found mt-2">Not Found</span>
          </div>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-secondary py-3 px-6 me-2" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary py-3 px-6" onclick="lafSaveEdit()">
          <i class="bi bi-floppy-fill me-1"></i> Save Changes
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-450px">
    <div class="modal-content" style="border-radius:16px;border:none;">
      <div class="modal-body text-center p-5">
        <div style="font-size:2.5rem;margin-bottom:12px;">🗑️</div>
        <h5 class="fw-bold mb-2 fs-4 text-gray-900">Delete Report?</h5>
        <p class="text-muted mb-4 fs-7">Report <strong id="delete-report-id-label" class="text-primary font-monospace"></strong> will be permanently removed.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button class="btn btn-secondary py-2 px-5" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-danger py-2 px-5" onclick="lafDoDelete()">Yes, Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-450px">
    <div class="modal-content" style="border-radius:16px;border:none;">
      <div class="modal-body text-center p-5">
        <div style="font-size:2.5rem;margin-bottom:12px;">⚠️</div>
        <h5 class="fw-bold mb-2 fs-4 text-gray-900">Cancel Report?</h5>
        <p class="text-muted mb-4 fs-7">Report <strong id="cancel-report-id-label" class="text-primary font-monospace"></strong> will be marked as cancelled.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button class="btn btn-secondary py-2 px-5" data-bs-dismiss="modal">Keep It</button>
          <button class="btn btn-warning py-2 px-5" onclick="lafDoCancel()">Yes, Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Save Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index:9999;">
  <div id="lafSaveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body fw-semibold">
        <i class="bi bi-check-circle-fill me-2"></i> Report updated successfully.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/LAF/partials/_modals.php'); ?>

<script>
// ══════════════════════════════════════
//  Metronic filter: Apply / Reset / Search
// ══════════════════════════════════════
function applyFilters() {
  var search  = document.getElementById('laf-search').value.toLowerCase().trim();
  var checked = Array.from(document.querySelectorAll('.laf-filter-status:checked'))
                      .map(function(cb){ return cb.value; });
  var rows    = document.querySelectorAll('#reports-table tbody tr');
  var visible = 0;
  rows.forEach(function(row) {
    var statusOk = checked.length === 0 || checked.includes(row.dataset.status);
    var searchOk = !search
                   || row.dataset.name.includes(search)
                   || row.dataset.searchId.includes(search);
    var show = statusOk && searchOk;
    row.style.display = show ? '' : 'none';
    if (show) visible++;
  });
  document.getElementById('empty-state').style.display = visible === 0 ? '' : 'none';
}

document.getElementById('laf-filter-apply').addEventListener('click', function() { applyFilters(); });
document.getElementById('laf-filter-reset').addEventListener('click', function() {
  document.querySelectorAll('.laf-filter-status').forEach(function(cb){ cb.checked = false; });
  applyFilters();
});
document.getElementById('laf-search').addEventListener('input', applyFilters);

// Select all
document.getElementById('user-check-all').addEventListener('change', function() {
  document.querySelectorAll('.row-check').forEach(function(cb){ cb.checked = this.checked; }, this);
});

// ══════════════════════════════════════
//  Edit Modal
// ══════════════════════════════════════
function lafOpenEditModal(report) {
  document.getElementById('edit-report-id').value   = report.report_id;
  document.getElementById('edit-item-name').value   = report.item_name;
  document.getElementById('edit-category').value    = report.category;
  document.getElementById('edit-description').value = report.description || '';
  document.getElementById('edit-location').value    = report.location    || '';
  document.getElementById('edit-status').value      = report.status;
  lafPreviewStatus(report.status);
  bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal')).show();
}

// Live badge preview inside modal
function lafPreviewStatus(val) {
  var el  = document.getElementById('edit-status-preview');
  var map = {
    'found':     ['badge-found',     'Found'],
    'not-found': ['badge-not-found', 'Not Found'],
    'pending':   ['badge-pending',   'Pending'],
  };
  var pair = map[val] || ['badge-pending', val];
  el.className   = pair[0] + ' mt-2';
  el.textContent = pair[1];
}

// ══════════════════════════════════════════════════════════
//  Save → REFLECT new status in the table row immediately
// ══════════════════════════════════════════════════════════
function lafSaveEdit() {
  var id        = document.getElementById('edit-report-id').value;
  var newStatus = document.getElementById('edit-status').value;
  var newName   = document.getElementById('edit-item-name').value.trim();
  if (!newName) { alert('Item Name is required.'); return; }

  // ── Find row and update badge + name immediately (reflective)
  var row = document.querySelector('#reports-table tbody tr[data-report-id="' + CSS.escape(id) + '"]');
  if (row) {
    row.dataset.status = newStatus;
    row.dataset.name   = newName.toLowerCase();

    var badge = row.querySelector('.report-status-badge');
    if (badge) {
      var labelMap = {
        'found':     ['badge-found',     'Found'],
        'not-found': ['badge-not-found', 'Not Found'],
        'pending':   ['badge-pending',   'Pending'],
      };
      var pair = labelMap[newStatus] || ['badge-pending', newStatus];
      badge.className   = 'report-status-badge ' + pair[0];
      badge.textContent = pair[1];
    }

    var nameEl = row.querySelector('.cell-name');
    if (nameEl) nameEl.textContent = newName;
  }

  bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
  new bootstrap.Toast(document.getElementById('lafSaveToast'), { delay: 3000 }).show();
}

// ══════════════════════════════════════
//  Delete
// ══════════════════════════════════════
var pendingDeleteId = null;
function lafConfirmDelete(id) {
  pendingDeleteId = id;
  document.getElementById('delete-report-id-label').textContent = id;
  bootstrap.Modal.getOrCreateInstance(document.getElementById('deleteModal')).show();
}
function lafDoDelete() {
  var row = document.querySelector('#reports-table tbody tr[data-report-id="' + CSS.escape(pendingDeleteId) + '"]');
  if (row) row.remove();
  bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
  applyFilters();
}

// ══════════════════════════════════════
//  Cancel
// ══════════════════════════════════════
var pendingCancelId = null;
function lafConfirmCancel(id) {
  pendingCancelId = id;
  document.getElementById('cancel-report-id-label').textContent = id;
  bootstrap.Modal.getOrCreateInstance(document.getElementById('cancelModal')).show();
}
function lafDoCancel() {
  toastr.warning('Listing cancelled for ' + pendingCancelId);
  bootstrap.Modal.getInstance(document.getElementById('cancelModal')).hide();
}
</script>
