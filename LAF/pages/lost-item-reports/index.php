<?php
define('MBG', TRUE);
include('../../functions-new.php');
//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Lost Item Reports · Lost and Found";

// Mock logged-in user
$user_name = 'Catalina Smith';
$user_id   = 'T202210292';

// Mock data — replace with DB query filtered by $user_id
$reports = [
  [
    'report_id'   => 'RPT-2604-0001',
    'item_name'   => 'Black Adidas Backpack',
    'category'    => 'bags',
    'description' => 'Black bag with yellow duck keychain, 15" laptop compartment.',
    'location'    => '11th Floor · Study Area',
    'date_filed'  => '2024-06-20',
    'status'      => 'not-found',
  ],
  [
    'report_id'   => 'RPT-2604-0002',
    'item_name'   => 'iPhone 13 (Black)',
    'category'    => 'electronics',
    'description' => 'Black iPhone 13, cracked lower-left corner.',
    'location'    => '14th Floor · Library',
    'date_filed'  => '2024-06-18',
    'status'      => 'found',
  ],
  [
    'report_id'   => 'RPT-2604-0003',
    'item_name'   => 'FEU Tech ID',
    'category'    => 'id-cards',
    'description' => 'Student ID, laminated.',
    'location'    => '8th Floor · Canteen',
    'date_filed'  => '2024-06-15',
    'status'      => 'not-found',
  ],
];

$status_labels = [
  'found'     => ['label' => 'Found',     'class' => 'badge-found'],
  'not-found' => ['label' => 'Not Found', 'class' => 'badge-not-found'],
  'pending'   => ['label' => 'Pending',   'class' => 'badge-pending'],
];

$category_labels = [
  'bags'        => 'Bags',
  'accessories' => 'Accessories',
  'academic'    => 'Academic',
  'essentials'  => 'Personal Essentials',
  'electronics' => 'Electronics',
  'id-cards'    => 'ID / Cards',
  'clothing'    => 'Clothing',
  'others'      => 'Others',
];

$cat_badge_class = [
  'bags'        => 'badge-bags',
  'accessories' => 'badge-accessories',
  'academic'    => 'badge-academic',
  'electronics' => 'badge-electronics',
  'essentials'  => 'badge-essentials',
  'id-cards'    => 'badge-essentials',
  'clothing'    => 'badge-essentials',
  'others'      => 'badge-essentials',
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
  <style>
    #edit-status-preview {
      display: inline-block;
      margin-top: 6px;
      min-width: 80px;
      text-align: center;
    }
  </style>
</head>
<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include('../../partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include('../../partials/_header.php'); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div class="app-container container-xxl">

                <!-- Page header -->
                <div class="d-flex align-items-center gap-3 mb-5 mt-5">
                  <a href="../../index.php" class="btn-go-back"><i class="bi bi-arrow-left"></i></a>
                  <div>
                    <h2 class="mb-0 fw-bold" style="font-size:1.4rem;">My Lost Item Reports</h2>
                    <p class="mb-0 text-muted" style="font-size:.82rem;">Viewing reports filed under <?= htmlspecialchars($user_id) ?></p>
                  </div>
                </div>

                <!-- ════════════════════════════════════════════
                     CARD — filter header is separate from table
                ═════════════════════════════════════════════ -->
                <div class="card border-0 shadow-sm mb-8" style="border-radius:14px;overflow:hidden;">

                  <!-- card-header: title + search + Metronic filter -->
                  <div class="card-header border-bottom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 py-4 px-5">
                    <div>
                      <span class="fw-bold fs-5">All Reports</span>
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
                               class="form-control border-start-0 border-secondary-subtle bg-light"
                               placeholder="Search by name or ID…"
                               style="font-size:.84rem;">
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
                              <label class="form-label fw-semibold">Status:</label>
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

                  <!-- card-body: table only, fully separated -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped gy-7 gs-7 mb-0" id="reports-table">
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
                              <div class="cell-id"><?= htmlspecialchars($r['report_id']) ?></div>
                              <div class="cell-name"><?= htmlspecialchars($r['item_name']) ?></div>
                              <div class="cell-cat mt-1">
                                <span class="badge-laf-cat <?= $cc ?>">
                                  <?= htmlspecialchars($category_labels[$r['category']] ?? $r['category']) ?>
                                </span>
                              </div>
                              <div style="font-size:.73rem;color:var(--laf-muted);margin-top:4px;">
                                <i class="bi bi-geo-alt-fill" style="font-size:.68rem;"></i>
                                <?= htmlspecialchars($r['location']) ?>
                              </div>
                              <div style="font-size:.72rem;color:var(--laf-muted);margin-top:2px;">
                                <i class="bi bi-calendar3" style="font-size:.68rem;"></i>
                                Filed: <?= htmlspecialchars($r['date_filed']) ?>
                              </div>
                            </td>

                            <!-- Status — JS updates this after edit -->
                            <td style="min-width:110px;">
                              <span class="report-status-badge <?= $s['class'] ?>"><?= $s['label'] ?></span>
                            </td>

                            <!-- Actions -->
                            <td class="pe-5 text-end" style="min-width:140px;">
                              <div class="d-flex flex-column align-items-end gap-2">
                                <button class="btn-tbl btn-tbl-edit"
                                        onclick="lafOpenEditModal(<?= htmlspecialchars(json_encode($r)) ?>)">
                                  <i class="bi bi-pencil-fill"></i> Edit
                                </button>
                                <button class="btn-tbl btn-tbl-delete"
                                        onclick="lafConfirmDelete('<?= htmlspecialchars($r['report_id']) ?>')">
                                  <i class="bi bi-trash3-fill"></i> Delete
                                </button>
                                <button class="btn-tbl btn-tbl-cancel"
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
            </main>
          </div>
          <?php include('../../partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include('../../partials/_scrolltop.php'); ?>

  <!-- ════ Edit Modal ════ -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius:16px;border:none;">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold" style="font-size:1.1rem;">
            <i class="bi bi-pencil-fill me-2" style="color:var(--laf-purple);"></i>Edit Report
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body pt-2">
          <input type="hidden" id="edit-report-id">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="laf-label">Item Name <span class="req">*</span></label>
              <input type="text" id="edit-item-name" class="form-control laf-input" placeholder="e.g. Black Backpack">
            </div>
            <div class="col-md-6">
              <label class="laf-label">Category</label>
              <select id="edit-category" class="form-select laf-input">
                <?php foreach ($category_labels as $val => $lbl): ?>
                  <option value="<?= $val ?>"><?= $lbl ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12">
              <label class="laf-label">Description</label>
              <textarea id="edit-description" class="form-control laf-input" rows="3"></textarea>
            </div>
            <div class="col-md-8">
              <label class="laf-label">Last Known Location</label>
              <input type="text" id="edit-location" class="form-control laf-input" placeholder="e.g. 11th Floor · Study Area">
            </div>
            <div class="col-md-4">
              <label class="laf-label">Status <span class="req">*</span></label>
              <select id="edit-status" class="form-select laf-input"
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
          <button type="button" class="btn-tbl btn-tbl-cancel" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn-laf-submit" onclick="lafSaveEdit()">
            <i class="bi bi-floppy-fill me-1"></i> Save Changes
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
      <div class="modal-content" style="border-radius:16px;border:none;">
        <div class="modal-body text-center p-5">
          <div style="font-size:2.5rem;margin-bottom:12px;">🗑️</div>
          <h5 class="fw-bold mb-2">Delete Report?</h5>
          <p class="text-muted mb-4" style="font-size:.88rem;">Report <strong id="delete-report-id-label"></strong> will be permanently removed.</p>
          <div class="d-flex gap-2 justify-content-center">
            <button class="btn-tbl btn-tbl-cancel" data-bs-dismiss="modal">Cancel</button>
            <button class="btn-tbl btn-tbl-delete" onclick="lafDoDelete()">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cancel Modal -->
  <div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
      <div class="modal-content" style="border-radius:16px;border:none;">
        <div class="modal-body text-center p-5">
          <div style="font-size:2.5rem;margin-bottom:12px;">⚠️</div>
          <h5 class="fw-bold mb-2">Cancel Report?</h5>
          <p class="text-muted mb-4" style="font-size:.88rem;">Report <strong id="cancel-report-id-label"></strong> will be marked as cancelled.</p>
          <div class="d-flex gap-2 justify-content-center">
            <button class="btn-tbl btn-tbl-edit" data-bs-dismiss="modal">Keep It</button>
            <button class="btn-tbl btn-tbl-cancel" onclick="lafDoCancel()">Yes, Cancel</button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/lost-and-found.js"></script>
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

    // TODO: POST to your update endpoint
    // fetch('ajax-update.php', { method:'POST', body: new FormData(...) });

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
    alert('CANCEL ' + pendingCancelId + ' — connect to your backend to persist.');
    bootstrap.Modal.getInstance(document.getElementById('cancelModal')).hide();
  }
  </script>
</body>
</html>