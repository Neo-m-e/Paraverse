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

<div class="laf-grid laf-grid-hero" style="margin-bottom:28px; margin-top:20px;">

  <!-- Hero Banner -->
  <div class="laf-hero">
    <div class="laf-hero-badge">
      FEU TECH · LOST AND FOUND SYSTEM</div>
    <h1>Welcome back,<br><?= htmlspecialchars($user_name) ?>! 👋</h1>
    <p style="font-size: 1.1rem; max-width: 600px;">Recover your belongings, help a fellow Tamaraw, and keep the campus organized.</p>

    <div class="laf-hero-actions">
      <button class="btn-laf-lost" id="btn-i-lost-something">🔍 I LOST SOMETHING</button>
      <button class="btn-laf-found" id="btn-i-found-something">✅ I FOUND SOMETHING</button>
    </div>
  </div>
  <!-- Profile Card -->
  <div class="laf-profile-card">
    <!-- Avatar -->
    <img src="<?= htmlspecialchars($user_avatar) ?>" class="avatar-ring">

    <!-- User Details -->
    <div class="user-info">
      <div class="name"><?= htmlspecialchars($user_fullname) ?></div>
      <div class="role"><?= htmlspecialchars($user_role) ?></div>
    </div>

    <!-- Stats -->
    <div class="laf-stat-row">
      <div class="laf-stat-box">
        <div class="stat-num"><?= (int)$items_reported ?></div>
        <div class="stat-lbl">Items<br>Reported</div>
      </div>
      <div class="laf-stat-box">
        <div class="stat-num"><?= (int)$successful_returns ?></div>
        <div class="stat-lbl">Successful<br>Returns</div>
      </div>
    </div>

    <!-- Button -->
    <a href="<?= htmlspecialchars($profile_url) ?>" class="btn-view-full-profile">View full Profile</a>
  </div>

</div>