<?php
/**
 * Section: Featured Users + Recently Claimed Items
 * Dashboard — Lost and Found System
 */

$featured_users = [
  ['id'=>1,'name'=>'Jenny B. Calot','initials'=>'JC','course'=>'BSCS · 3rd Year','surrendered'=>4,'color'=>'#6c63ff','profile_url'=>'/profile/?id=1'],
  ['id'=>2,'name'=>'Kristin V. Dy','initials'=>'KD','course'=>'BST · 2nd Year','surrendered'=>3,'color'=>'#17c653','profile_url'=>'/profile/?id=2'],
  ['id'=>3,'name'=>'Marco R. Santos','initials'=>'MR','course'=>'BSECE · 4th Year','surrendered'=>2,'color'=>'#ffa800','profile_url'=>'/profile/?id=3'],
];

$claimed_items = [
  ['id'=>1,'name'=>'Keys','icon'=>'🔑','floor'=>'1st Floor, Parking','claimed_by'=>'Kristin V. Dy'],
  ['id'=>2,'name'=>'Eyeglasses','icon'=>'🕶️','floor'=>'3rd Floor, Library','claimed_by'=>'Roel M. Tan'],
  ['id'=>3,'name'=>'Smartphone','icon'=>'📱','floor'=>'5th Floor, Study Area','claimed_by'=>'Dana P. Reyes'],
];
?>

<!-- Featured Users -->
<div class="laf-card">
  <div class="laf-card-header">
    <div>
      <h3 class="laf-section-title">Featured Users 🏅</h3>
      <p class="laf-section-sub">Top individuals helping our lost and found</p>
    </div>
  </div>
  <div class="laf-card-body">
    <div class="laf-grid laf-grid-3">
      <?php foreach ($featured_users as $user): ?>
      <div class="laf-user-card">
        <div class="user-avatar" style="background:<?= htmlspecialchars($user['color']) ?>22; color:<?= htmlspecialchars($user['color']) ?>;">
          <?= htmlspecialchars($user['initials']) ?>
        </div>
        <div class="user-name"><?= htmlspecialchars($user['name']) ?></div>
        <div class="user-meta"><?= htmlspecialchars($user['course']) ?></div>
        <div class="user-surr">Surrendered <strong><?= (int)$user['surrendered'] ?></strong> items</div>
        <a href="<?= htmlspecialchars($user['profile_url']) ?>" class="btn-view-profile">View Profile</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Recently Claimed Items -->
<div class="laf-card">
  <div class="laf-card-header">
    <div>
      <h3 class="laf-section-title">Recently Claimed Items ✅</h3>
      <p class="laf-section-sub">Below are recently claimed items from the Lost and Found</p>
    </div>
    <a href="pages/claimed/index.php" class="laf-view-all">View All</a>
  </div>
  <div class="laf-card-body">
    <div class="laf-grid laf-grid-3">
      <?php foreach ($claimed_items as $item): ?>
      <div class="laf-claimed-card">
        <div class="claimed-icon-wrap"><?= $item['icon'] ?></div>
        <div style="flex:1;">
          <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
            <span class="claimed-name"><?= htmlspecialchars($item['name']) ?></span>
            <span class="badge-laf-claimed">Claimed</span>
          </div>
          <div class="claimed-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
          <div class="claimed-meta">👤 Claimed By: <?= htmlspecialchars($item['claimed_by']) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>