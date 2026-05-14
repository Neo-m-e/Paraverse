<?php
define('MBG', TRUE);
include('../../functions-new.php');

$META_TITLE = "Admin · Lost Items · Lost and Found";

$categories = [
  ''            => 'All Categories',
  'bags'        => 'Bags',
  'accessories' => 'Accessories',
  'academic'    => 'Academic',
  'essentials'  => 'Personal Essentials',
  'electronics' => 'Electronics',
  'id-cards'    => 'ID / Cards',
  'clothing'    => 'Clothing',
  'others'      => 'Others',
];

// sample data
$items = [
  [
    'item_id'        => 'ITM-2604-0720-2320',
    'item_name'      => 'Black Adidas Backpack',
    'category'       => 'bags',
    'description'    => 'Black bag with yellow duck keychain.',
    'location'       => '11th Floor · Study Area',
    'surrendered_by' => 'Maria Santos',
    'received_by'    => 'Engr. Roel Tan',
    'released_by'    => '',
    'claimed_by'     => '',
    'photo'          => '',
    'status'         => 'unclaimed',
    'posted_at'      => '2024-06-20 09:14',
  ],
  [
    'item_id'        => 'ITM-2604-0720-2319',
    'item_name'      => 'iPhone 13 (Black)',
    'category'       => 'electronics',
    'description'    => 'Black iPhone 13, cracked lower-left corner.',
    'location'       => '14th Floor · Library',
    'surrendered_by' => 'John Cruz',
    'received_by'    => 'Ms. Ana Reyes',
    'released_by'    => 'Ms. Ana Reyes',
    'claimed_by'     => 'Denise Alvaran',
    'photo'          => '',
    'status'         => 'claimed',
    'posted_at'      => '2024-06-18 14:30',
  ],
  [
    'item_id'        => 'ITM-2604-0720-2318',
    'item_name'      => 'FEU Tech Student ID',
    'category'       => 'id-cards',
    'description'    => 'Student ID, laminated, female student.',
    'location'       => '8th Floor · Canteen',
    'surrendered_by' => 'Carlo Reyes',
    'received_by'    => 'Engr. Roel Tan',
    'released_by'    => '',
    'claimed_by'     => '',
    'photo'          => '',
    'status'         => 'unclaimed',
    'posted_at'      => '2024-06-15 11:00',
  ],
];

$status_badge = [
  'claimed'   => ['label' => 'Claimed',   'class' => 'badge-found'],
  'unclaimed' => ['label' => 'Unclaimed', 'class' => 'badge-not-found'],
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
    /* Status preview badge inside modal */
    #admin-edit-status-preview {
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
                    <h2 class="mb-0 fw-bold" style="font-size:1.4rem;">Admin · Lost Items</h2>
                    <p class="mb-0 text-muted" style="font-size:.82rem;">Manage all surrendered lost items</p>
                  </div>
                </div>
                <div class="card border-0 shadow-sm mb-8" style="border-radius:14px;overflow:hidden;">

                  <!-- card-header: title + search + Metronic filter -->
                  <div class="card-header border-bottom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 py-4 px-5">
                    <div>
                      <span class="fw-bold fs-5">All Surrendered Items</span>
                      <span class="badge bg-light text-dark ms-2 fw-semibold" style="font-size:.78rem;">
                        <?= count($items) ?> records
                      </span>
                    </div>

                    <div class="d-flex align-items-center gap-2 flex-wrap">

                      <!-- Search -->
                      <div class="input-group" style="width:210px;">
                        <span class="input-group-text bg-light border-end-0 border-secondary-subtle">
                          <i class="bi bi-search text-muted" style="font-size:.82rem;"></i>
                        </span>
                        <input type="text" id="admin-search"
                          class="form-control border-start-0 border-secondary-subtle bg-light"
                          placeholder="Search item or ID…" style="font-size:.84rem;">
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

                            <!-- Category -->
                            <div class="mb-10">
                              <label class="form-label fw-semibold">Category:</label>
                              <select id="admin-filter-cat" class="form-select form-select-solid">
                                <?php foreach ($categories as $v => $l): ?>
                                  <option value="<?= $v ?>"><?= $l ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            <!-- Status -->
                            <div class="mb-10">
                              <label class="form-label fw-semibold">Status:</label>
                              <div class="d-flex gap-4">
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                  <input class="form-check-input admin-filter-status" type="checkbox" value="claimed">
                                  <span class="form-check-label">Claimed</span>
                                </label>
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                  <input class="form-check-input admin-filter-status" type="checkbox" value="unclaimed">
                                  <span class="form-check-label">Unclaimed</span>
                                </label>
                              </div>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-end">
                              <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                data-kt-menu-dismiss="true" id="admin-filter-reset">Reset</button>
                              <button type="submit" class="btn btn-sm btn-primary"
                                data-kt-menu-dismiss="true" id="admin-filter-apply">Apply</button>
                            </div>

                          </div>
                        </div>
                      </div>
                      <!-- end Metronic Filter -->

                      <!-- Export -->
                      <button class="btn btn-sm btn-light-primary fw-bold border" id="admin-export-btn">
                        <i class="bi bi-download me-1"></i> Export
                      </button>

                      <!-- Add Item -->
                      <a href="add-item/index.php" class="laf-create-btn">
                        <i class="bi bi-plus-lg"></i> Add Item
                      </a>

                    </div>
                  </div>

                  <!-- card-body: table only -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped gy-7 gs-7 mb-0" id="admin-table">
                        <thead>
                          <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th class="ps-5" style="width:44px;">
                              <input type="checkbox" class="form-check-input" id="admin-check-all">
                            </th>
                            <th>Item Details</th>
                            <th>Transactions</th>
                            <th>Status</th>
                            <th class="pe-5 text-end">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($items as $idx => $item):
                            $s  = $status_badge[$item['status']] ?? ['label' => ucfirst($item['status']), 'class' => 'badge-pending'];
                            $cc = $cat_badge_class[$item['category']] ?? 'badge-essentials';
                            $numeric_id = $idx + 1;
                          ?>
                            <tr data-item-id="<?= htmlspecialchars($item['item_id']) ?>"
                              data-numeric-id="<?= $numeric_id ?>"
                              data-status="<?= htmlspecialchars($item['status']) ?>"
                              data-cat="<?= htmlspecialchars($item['category']) ?>"
                              data-name="<?= strtolower(htmlspecialchars($item['item_name'])) ?>"
                              data-search-id="<?= strtolower(htmlspecialchars($item['item_id'])) ?>">

                              <td class="ps-5"><input type="checkbox" class="form-check-input row-check"></td>

                              <!-- Item Details (clickable → item-details page) -->
                              <td style="min-width:230px;cursor:pointer;"
                                onclick="window.location.href='../../pages/item-details/index.php?id=<?= $numeric_id ?>'">
                                <div class="cell-id"><?= htmlspecialchars($item['item_id']) ?></div>
                                <div class="cell-name" style="color:var(--laf-purple);"><?= htmlspecialchars($item['item_name']) ?></div>
                                <div class="cell-cat mt-1">
                                  <span class="badge-laf-cat <?= $cc ?>">
                                    <?= htmlspecialchars($categories[$item['category']] ?? $item['category']) ?>
                                  </span>
                                </div>
                                <div style="font-size:.73rem;color:var(--laf-muted);margin-top:4px;">
                                  <i class="bi bi-geo-alt-fill" style="font-size:.68rem;"></i>
                                  <?= htmlspecialchars($item['location']) ?>
                                </div>
                              </td>

                              <!-- Transactions -->
                              <td style="min-width:200px;">
                                <div class="laf-transaction-cell">
                                  <div class="tx-label">Surrendered by</div>
                                  <div class="tx-value"><?= $item['surrendered_by'] ? htmlspecialchars($item['surrendered_by']) : '<span style="color:var(--laf-muted)">—</span>' ?></div>
                                  <div class="tx-label mt-2">Received by</div>
                                  <div class="tx-value"><?= $item['received_by'] ? htmlspecialchars($item['received_by']) : '<span style="color:var(--laf-muted)">—</span>' ?></div>
                                  <?php if ($item['status'] === 'claimed'): ?>
                                    <div class="tx-label mt-2">Claimed by</div>
                                    <div class="tx-value"><?= $item['claimed_by'] ? htmlspecialchars($item['claimed_by']) : '<span style="color:var(--laf-muted)">—</span>' ?></div>
                                  <?php endif; ?>
                                </div>
                              </td>

                              <!-- Status — JS updates this badge after edit -->
                              <td style="min-width:120px;">
                                <span class="item-status-badge <?= $s['class'] ?>"><?= $s['label'] ?></span>
                                <div style="font-size:.7rem;color:var(--laf-muted);margin-top:4px;">
                                  <?= htmlspecialchars($item['posted_at']) ?>
                                </div>
                              </td>

                              <!-- Actions -->
                              <td class="pe-5 text-end" style="min-width:140px;">
                                <div class="d-flex flex-column align-items-end gap-2">
                                  <a href="edit/index.php?id=<?= urlencode($item['item_id']) ?>"
                                    class="btn-tbl btn-tbl-edit">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                  </a>
                                  <button class="btn-tbl btn-tbl-delete"
                                    onclick="adminConfirmDelete('<?= htmlspecialchars($item['item_id']) ?>')">
                                    <i class="bi bi-trash3-fill"></i> Delete
                                  </button>
                                  <?php if ($item['status'] === 'unclaimed'): ?>
                                    <button class="btn-tbl btn-tbl-cancel"
                                      onclick="adminConfirmCancel('<?= htmlspecialchars($item['item_id']) ?>')">
                                      <i class="bi bi-x-circle-fill"></i> Cancel
                                    </button>
                                  <?php endif; ?>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                      <div class="laf-empty-state py-5" id="admin-empty-state" style="display:none;">
                        <div class="empty-icon">📦</div>
                        <p>No items match your filters.</p>
                      </div>
                    </div>
                  </div>
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

  <!-- Delete -->
  <div class="modal fade" id="adminDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
      <div class="modal-content" style="border-radius:16px;border:none;">
        <div class="modal-body text-center p-5">
          <div style="font-size:2.5rem;margin-bottom:12px;">🗑️</div>
          <h5 class="fw-bold mb-2">Delete Item?</h5>
          <p class="text-muted mb-4" style="font-size:.88rem;">Item <strong id="admin-delete-id-label"></strong> will be permanently removed.</p>
          <div class="d-flex gap-2 justify-content-center">
            <button class="btn-tbl btn-tbl-cancel" data-bs-dismiss="modal">Cancel</button>
            <button class="btn-tbl btn-tbl-delete" onclick="adminDoDelete()">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cancel  -->
  <div class="modal fade" id="adminCancelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
      <div class="modal-content" style="border-radius:16px;border:none;">
        <div class="modal-body text-center p-5">
          <div style="font-size:2.5rem;margin-bottom:12px;">⚠️</div>
          <h5 class="fw-bold mb-2">Cancel Item Listing?</h5>
          <p class="text-muted mb-4" style="font-size:.88rem;">Item <strong id="admin-cancel-id-label"></strong> will be marked as cancelled.</p>
          <div class="d-flex gap-2 justify-content-center">
            <button class="btn-tbl btn-tbl-edit" data-bs-dismiss="modal">Keep It</button>
            <button class="btn-tbl btn-tbl-cancel" onclick="adminDoCancel()">Yes, Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/lost-and-found.js"></script>
  <script>
    document.getElementById('admin-export-btn').addEventListener('click', function() {
      var headers = ['Item ID', 'Item Name', 'Category', 'Status'];
      var rows = Array.from(document.querySelectorAll('#admin-table tbody tr'))
        .filter(function(r) {
          return r.style.display !== 'none';
        })
        .map(function(r) {
          return [
            '"' + (r.dataset.itemId || '') + '"',
            '"' + (r.dataset.name || '') + '"',
            '"' + (r.dataset.cat || '') + '"',
            '"' + (r.dataset.status || '') + '"',
          ].join(',');
        });
      var csv = [headers.join(',')].concat(rows).join('\n');
      var blob = new Blob([csv], {
        type: 'text/csv'
      });
      var url = URL.createObjectURL(blob);
      var a = document.createElement('a');
      a.href = url;
      a.download = 'lost-items-export.csv';
      a.click();
      URL.revokeObjectURL(url);
    });

    function applyAdminFilters() {
      var search = document.getElementById('admin-search').value.toLowerCase().trim();
      var cat = document.getElementById('admin-filter-cat').value;
      var checked = Array.from(document.querySelectorAll('.admin-filter-status:checked'))
        .map(function(cb) {
          return cb.value;
        });
      var rows = document.querySelectorAll('#admin-table tbody tr');
      var visible = 0;
      rows.forEach(function(row) {
        var catOk = !cat || row.dataset.cat === cat;
        var statusOk = checked.length === 0 || checked.includes(row.dataset.status);
        var searchOk = !search || row.dataset.name.includes(search) || row.dataset.searchId.includes(search);
        var show = catOk && statusOk && searchOk;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      document.getElementById('admin-empty-state').style.display = visible === 0 ? '' : 'none';
    }

    document.getElementById('admin-filter-apply').addEventListener('click', function() {
      applyAdminFilters();
    });
    document.getElementById('admin-filter-reset').addEventListener('click', function() {
      document.getElementById('admin-filter-cat').value = '';
      document.querySelectorAll('.admin-filter-status').forEach(function(cb) {
        cb.checked = false;
      });
      applyAdminFilters();
    });
    document.getElementById('admin-search').addEventListener('input', applyAdminFilters);

    document.getElementById('admin-check-all').addEventListener('change', function() {
      document.querySelectorAll('.row-check').forEach(function(cb) {
        cb.checked = this.checked;
      }, this);
    });

    var pendingDeleteId = null;

    function adminConfirmDelete(id) {
      pendingDeleteId = id;
      document.getElementById('admin-delete-id-label').textContent = id;
      bootstrap.Modal.getOrCreateInstance(document.getElementById('adminDeleteModal')).show();
    }

    function adminDoDelete() {
      // TODO: DELETE to backend
      var row = document.querySelector('#admin-table tbody tr[data-item-id="' + CSS.escape(pendingDeleteId) + '"]');
      if (row) row.remove();
      bootstrap.Modal.getInstance(document.getElementById('adminDeleteModal')).hide();
      applyAdminFilters();
    }

    var pendingCancelId = null;

    function adminConfirmCancel(id) {
      pendingCancelId = id;
      document.getElementById('admin-cancel-id-label').textContent = id;
      bootstrap.Modal.getOrCreateInstance(document.getElementById('adminCancelModal')).show();
    }

    function adminDoCancel() {
      alert('CANCEL ' + pendingCancelId + ' — connect to your backend to persist.');
      bootstrap.Modal.getInstance(document.getElementById('adminCancelModal')).hide();
    }
  </script>
</body>

</html>