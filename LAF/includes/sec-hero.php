<?php
$user_name          = 'Catalina';
$user_fullname      = 'Catalina Smith';
$user_role          = 'Student · BSITBA';
$user_avatar        = 'assets/images/catalina.webp';
$user_initials      = 'CS';
$items_reported     = 8;
$successful_returns = 8;
$profile_url        = '/profile/';
?>

<div class="row g-4 mb-6 mt-4">

  <!-- Hero Banner -->
  <div class="col-lg-9">
    <div class="laf-hero h-100 d-flex flex-column justify-content-center p-10 position-relative">
      <!-- Decorative Floating Background Icons -->
      <i class="bi bi-search laf-hero-floating-icon" style="top: 20px; right: 140px; font-size: 5.5rem; transform: rotate(-15deg); color: #4a56a5; opacity: 0.08;"></i>
      <i class="bi bi-key laf-hero-floating-icon" style="bottom: 15px; right: 30px; font-size: 8rem; transform: rotate(25deg); color: #f64e60; opacity: 0.07;"></i>
      <i class="bi bi-briefcase laf-hero-floating-icon" style="top: 40%; right: 260px; font-size: 6.5rem; transform: rotate(12deg); color: #ffa800; opacity: 0.08;"></i>
      <i class="bi bi-phone laf-hero-floating-icon" style="top: 15px; right: 30px; font-size: 4.5rem; transform: rotate(-10deg); color: #17c653; opacity: 0.08;"></i>

      <div style="position: relative; z-index: 1;">
        <div class="laf-hero-badge fs-8 fw-bold mb-4" style="background: #ebe9ff; color: #4a56a5;">FEU TECH · LOST AND FOUND SYSTEM</div>
        <h1 class="display-5 fw-bold mb-2" style="color: #4a56a5;">Welcome back, <?= htmlspecialchars($user_name) ?>! 👋</h1>
        <p class="fs-4 text-gray-700 mb-8" style="max-width: 75%;">Recover your belongings, help a fellow Tamaraw, and keep the campus organized.</p>
      </div>

      <div class="laf-hero-actions d-flex gap-3 flex-wrap" style="position: relative; z-index: 1;">
        <button class="btn btn-outline btn-outline-danger fw-bold py-2.5 px-5 fs-8 text-uppercase" id="btn-i-lost-something"><i class="bi bi-search me-2"></i> I LOST SOMETHING</button>
        <button class="btn btn-outline btn-outline-success fw-bold py-2.5 px-5 fs-8 text-uppercase" id="btn-i-found-something"><i class="bi bi-check-circle me-2"></i> I FOUND SOMETHING</button>
      </div>
    </div>
  </div>
  
  <!-- Profile Card -->
  <div class="col-lg-3">
    <div class="laf-profile-card shadow-sm border border-gray-200 bg-white">
      <!-- Avatar -->
      <img src="<?= htmlspecialchars($user_avatar) ?>" class="avatar-ring lozad rounded-circle" alt="avatar">

      <!-- User Details -->
      <div class="user-info mb-4">
        <div class="name fs-6 fw-bold text-gray-900 mb-1"><?= htmlspecialchars($user_fullname) ?></div>
        <div class="role fs-8 text-muted"><?= htmlspecialchars($user_role) ?></div>
      </div>

      <!-- Stats -->
      <div class="laf-stat-row px-4 w-100 d-flex gap-3 mb-4">
        <div class="laf-stat-box flex-grow-1 p-3 bg-light rounded text-center">
          <div class="stat-num fs-2 fw-bold text-primary"><?= (int)$items_reported ?></div>
          <div class="stat-lbl fs-8 text-muted">Items<br>Reported</div>
        </div>
        <div class="laf-stat-box flex-grow-1 p-3 bg-light rounded text-center">
          <div class="stat-num fs-2 fw-bold text-primary"><?= (int)$successful_returns ?></div>
          <div class="stat-lbl fs-8 text-muted">Successful<br>Returns</div>
        </div>
      </div>

      <!-- Button -->
      <a href="<?= htmlspecialchars($profile_url) ?>" class="btn-view-full-profile mt-auto fw-bold" onclick="KTApp.showPageLoading()">View full Profile</a>
    </div>
  </div>

</div>