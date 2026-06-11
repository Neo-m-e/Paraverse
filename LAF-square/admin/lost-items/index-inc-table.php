<div class="d-flex align-items-center mb-6 mt-4">
  <a href="../../index.php" class="btn-go-back me-3" onclick="KTApp.showPageLoading()"><i class="bi bi-arrow-left"></i></a>
  <div>
    <h2 class="mb-0 fw-bold fs-3 text-gray-900">Admin · Lost Items</h2>
    <p class="mb-0 text-muted fs-7">Manage all surrendered lost items</p>
  </div>
</div>

<div class="card card-flush shadow-sm">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <div class="d-flex align-items-center position-relative my-1">
        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
          <span class="path1"></span><span class="path2"></span>
        </i>
        <input type="text" datatable-filter="search"
          class="form-control form-control-solid w-250px ps-12"
          placeholder="Search">
      </div>
    </div>
    
    <div class="card-toolbar d-flex align-items-center gap-3">
      <!-- Export -->
      <button class="btn btn-light-primary fw-bold" id="admin-export-btn">
        <i class="ki-duotone ki-download fs-2 me-1"><span class="path1"></span><span class="path2"></span></i> Export
      </button>

      <!-- Add Record -->
      <a href="manage/" class="btn btn-primary" onclick="KTApp.showPageLoading()">
        <i class="ki-duotone ki-plus fs-2"><span class="path1"></span><span class="path2"></span></i>
        Add Item
      </a>
    </div>
  </div>

  <div class="card-body pt-0 table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5 w-100" id="EdITH-TABLE">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th style="width:40px;"><input type="checkbox" class="form-check-input" id="admin-check-all"></th>
          <th class="min-w-200px">Item Details</th>
          <th class="min-w-180px">Transactions</th>
          <th class="min-w-100px">Status</th>
          <th class="text-end min-w-120px">Actions</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="adminDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-400px">
    <div class="modal-content" style="border-radius:16px;border:none;">
      <div class="modal-body text-center p-5">
        <div style="font-size:2.5rem;margin-bottom:12px;">🗑️</div>
        <h5 class="fw-bold mb-2">Delete Item?</h5>
        <p class="text-muted mb-4" style="font-size:.88rem;">Item <strong id="admin-delete-id-label"></strong> will be permanently removed.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button class="btn btn-secondary py-2 px-5" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-danger py-2 px-5" onclick="adminDoDelete()">Yes, Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="adminCancelModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-400px">
    <div class="modal-content" style="border-radius:16px;border:none;">
      <div class="modal-body text-center p-5">
        <div style="font-size:2.5rem;margin-bottom:12px;">⚠️</div>
        <h5 class="fw-bold mb-2">Cancel Item Listing?</h5>
        <p class="text-muted mb-4" style="font-size:.88rem;">Item <strong id="admin-cancel-id-label"></strong> will be marked as cancelled.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button class="btn btn-secondary py-2 px-5" data-bs-dismiss="modal">Keep It</button>
          <button class="btn btn-warning py-2 px-5" onclick="adminDoCancel()">Yes, Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
  var MBGDATATABLE = $('#EdITH-TABLE').DataTable({
    order: [[1, 'desc']],
    searchDelay: 500,
    responsive: true,
    processing: true,
    serverSide: true,
    searching: true,
    ajax: { url: 'index-ajax-fetch.php', type: 'GET' },
    columns: [
      { data: 0, orderable: false, searchable: false },
      { data: 1, searchable: true },
      { data: 2, searchable: true },
      { data: 3, searchable: true },
      { data: 4, orderable: false, searchable: false }
    ],
    columnDefs: [
      { targets: 0, render: (d,t,row) => `<input type="checkbox" class="form-check-input row-check" value="${row[0]}">` },
      { targets: 1, width: '40%', render: (d,t,row) => row[1] },
      { targets: 2, width: '30%', render: (d,t,row) => row[2] },
      { targets: 3, width: '15%', render: (d,t,row) => row[3] },
      { targets: 4, width: '15%', className: 'text-end', render: (d,t,row) => row[4] }
    ]
  });

  let searchTimeout;
  $('[datatable-filter="search"]').keyup(function () {
    clearTimeout(searchTimeout);
    const val = $(this).val();
    searchTimeout = setTimeout(() => MBGDATATABLE.search(val).draw(), 500);
  });

  MBGDATATABLE.on('draw', () => {
    KTMenu.createInstances();
    $('html, body').animate({ scrollTop: 0 }, 600);
  });

  $('#EdITH-TABLE').on('click', '.menu-delete', function () {
    const id = $(this).attr('id');
    adminConfirmDelete(id);
  });

  $('#EdITH-TABLE').on('click', '.menu-cancel', function () {
    const id = $(this).attr('id');
    adminConfirmCancel(id);
  });

  document.getElementById('admin-check-all').addEventListener('change', function() {
    document.querySelectorAll('.row-check').forEach(function(cb) {
      cb.checked = this.checked;
    }, this);
  });

  document.getElementById('admin-export-btn').addEventListener('click', function() {
    window.location.href = 'index-ajax-fetch.php?export=csv';
  });
});

var pendingDeleteId = null;

function adminConfirmDelete(id) {
  pendingDeleteId = id;
  document.getElementById('admin-delete-id-label').textContent = id;
  bootstrap.Modal.getOrCreateInstance(document.getElementById('adminDeleteModal')).show();
}

function adminDoDelete() {
  const fd = new FormData();
  fd.append('id', pendingDeleteId);
  fd.append('table', 'lost_items');
  $.ajax({
    type: 'POST', url: 'index-ajax-delete.php',
    data: fd, contentType: false, cache: false, processData: false,
    success: res => {
      $('#EdITH-TABLE').DataTable().ajax.reload();
      bootstrap.Modal.getInstance(document.getElementById('adminDeleteModal')).hide();
      toastr.success(res.message || 'Record deleted successfully.');
    },
    error: () => {
      toastr.error('Request failed.');
    }
  });
}

var pendingCancelId = null;

function adminConfirmCancel(id) {
  pendingCancelId = id;
  document.getElementById('admin-cancel-id-label').textContent = id;
  bootstrap.Modal.getOrCreateInstance(document.getElementById('adminCancelModal')).show();
}

function adminDoCancel() {
  toastr.warning('Listing cancelled for ' + pendingCancelId);
  bootstrap.Modal.getInstance(document.getElementById('adminCancelModal')).hide();
}
</script>
