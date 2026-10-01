<?php
$adminRows = [];

foreach ($surrenderedItems as $item) {
  $adminRows[] = [
    'id' => 'LAF-' . str_pad($item['id'], 4, '0', STR_PAD_LEFT),
    'name' => $item['name'],
    'category' => $item['category'],
    'location' => $item['floor'],
    'surrendered_by' => $item['surrendered_by'],
    'claimed_by' => $item['claimed_by'],
    'status' => $item['status']
  ];
}

$adminRows[] = ['id' => 'LAF-0012', 'name' => 'Scientific Calculator', 'category' => 'Academic', 'location' => '6th Floor, Room 605', 'surrendered_by' => 'Carlo Reyes', 'claimed_by' => '', 'status' => 'For Donation'];
?>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-4 mb-8">
  <div>
    <a href="<?= $LAF_BASE_URL ?>/" class="btn btn-sm btn-light mb-4"><i class="bi bi-arrow-left me-2"></i>Public Site</a>
    <h1 class="text-gray-900 fw-bold fs-2 mb-1">Lost and Found Items</h1>
    <span class="text-muted fs-7">Manage surrendered items and their current status.</span>
  </div>
  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#itemFormModal">
    <i class="ki-duotone ki-plus fs-4"></i>Add Item
  </button>
</div>

<div class="card card-bordered">
  <div class="card-header border-0 pt-6">
    <div class="card-title">
      <div class="d-flex align-items-center position-relative">
        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>
        <input id="lost-item-search" type="text" class="form-control form-control-solid w-250px ps-12" placeholder="Search items">
      </div>
    </div>
    <div class="card-toolbar">
      <button type="button" id="lost-item-export" class="btn btn-sm btn-light-primary"><i class="ki-duotone ki-exit-up fs-5"></i>Export</button>
    </div>
  </div>

  <div class="card-body pt-0">
    <div class="table-responsive">
      <table id="lost-item-table" class="table table-row-bordered gy-5 align-middle w-100">
        <thead>
          <tr class="fw-semibold fs-7 text-muted text-uppercase">
            <th>Item ID</th>
            <th>Item Details</th>
            <th>Surrendered / Claimed By</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($adminRows as $row): ?>
            <?php
            $statusClass = 'badge-light-warning';
            if ($row['status'] === 'Claimed') $statusClass = 'badge-light-success';
            if ($row['status'] === 'For Donation') $statusClass = 'badge-light-info';
            ?>
            <tr>
              <td class="text-gray-600 fw-semibold"><?= htmlspecialchars($row['id']) ?></td>
              <td>
                <div class="text-gray-900 fw-bold mb-1"><?= htmlspecialchars($row['name']) ?></div>
                <div class="text-muted fs-8"><?= htmlspecialchars($row['category']) ?> · <?= htmlspecialchars($row['location']) ?></div>
              </td>
              <td>
                <div class="text-gray-700 fs-7">Surrendered: <?= htmlspecialchars($row['surrendered_by']) ?></div>
                <div class="text-muted fs-8">Claimed: <?= $row['claimed_by'] !== '' ? htmlspecialchars($row['claimed_by']) : '—' ?></div>
              </td>
              <td><span class="badge <?= $statusClass ?>"><?= htmlspecialchars($row['status']) ?></span></td>
              <td class="text-end">
                <button type="button" class="btn btn-sm btn-light-primary me-2" data-bs-toggle="modal" data-bs-target="#itemFormModal">Edit</button>
                <button type="button" class="btn btn-sm btn-light-danger delete-row">Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="itemFormModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
      <div class="modal-header"><h2 class="fw-bold">Item Information</h2><button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></button></div>
      <div class="modal-body">
        <div class="row g-5">
          <div class="col-md-7"><label class="form-label required">Item Name</label><input class="form-control form-control-solid" type="text"></div>
          <div class="col-md-5"><label class="form-label required">Status</label><select class="form-select form-select-solid"><option>Unclaimed</option><option>Claimed</option><option>For Donation</option></select></div>
          <div class="col-12"><label class="form-label required">Location</label><input class="form-control form-control-solid" type="text"></div>
        </div>
      </div>
      <div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button></div>
    </div>
  </div>
</div>
