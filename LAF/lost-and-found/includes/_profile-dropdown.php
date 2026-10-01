<?php
$user_name = 'Catalina Smith';
$user_id = 'T202210292';
$user_avatar = $LAF_BASE_URL . '/assets/images/catalina.webp';
?>

<div class="cursor-pointer symbol symbol-40px symbol-circle"
  data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
  data-kt-menu-attach="parent"
  data-kt-menu-placement="bottom-end">
  <img src="<?= htmlspecialchars($user_avatar) ?>" alt="<?= htmlspecialchars($user_name) ?>">
</div>

<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
  data-kt-menu="true">
  <div class="menu-item px-3">
    <div class="menu-content d-flex align-items-center px-3">
      <div class="symbol symbol-50px me-5">
        <img src="<?= htmlspecialchars($user_avatar) ?>" alt="<?= htmlspecialchars($user_name) ?>">
      </div>
      <div class="d-flex flex-column">
        <div class="fw-bold d-flex align-items-center fs-5"><?= htmlspecialchars($user_name) ?></div>
        <span class="fw-semibold text-muted fs-7"><?= htmlspecialchars($user_id) ?></span>
      </div>
    </div>
  </div>

  <div class="separator my-2"></div>

  <div class="menu-item px-5">
    <a href="/" class="menu-link px-5"><i class="bi bi-grid-3x3-gap me-3"></i>Portal</a>
  </div>
  <div class="menu-item px-5">
    <a href="/account-settings" class="menu-link px-5"><i class="bi bi-gear me-3"></i>Account Settings</a>
  </div>
  <div class="menu-item px-5">
    <a href="<?= $LAF_BASE_URL ?>/manage/" class="menu-link px-5"><i class="bi bi-clipboard-check me-3"></i>Report Lost Item</a>
  </div>

  <div class="separator my-2"></div>

  <div class="menu-item px-5">
    <a href="/sign-out" class="menu-link px-5 text-danger"><i class="bi bi-box-arrow-right me-3"></i>Sign Out</a>
  </div>
</div>
