<?php

/**
 * Section: Search Bar + Recently Surrendered Items
 * Dashboard — Lost and Found System
 */

$surrendered_items = [
  ['id' => 1, 'name' => 'Goojodoq (Handfan)', 'category' => 'Accessories', 'category_class' => 'badge-accessories', 'cat_key' => 'cat-accessories', 'icon' => '💨', 'floor' => '2nd Floor, Lobby', 'time' => '10:00 AM', 'surrendered_by' => 'Jenny B. Calot', 'status' => 'Unclaimed'],
  ['id' => 2, 'name' => 'Umbrella', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'cat_key' => 'cat-essentials', 'icon' => '☂️', 'floor' => '4th Floor, Study Area', 'time' => '2:00 PM', 'surrendered_by' => 'Marco R. Santos', 'status' => 'Unclaimed'],
  ['id' => 3, 'name' => 'Calculator', 'category' => 'Academic', 'category_class' => 'badge-academic', 'cat_key' => 'cat-academic', 'icon' => '🧮', 'floor' => '6th Floor, Room 605', 'time' => '8:30 AM', 'surrendered_by' => 'Kristin V. Dy', 'status' => 'Unclaimed'],
  ['id' => 4, 'name' => 'Blue Backpack', 'category' => 'Bags', 'category_class' => 'badge-bags', 'cat_key' => 'cat-bags', 'icon' => '🎒', 'floor' => '14th Floor, Library', 'time' => '12:30 PM', 'surrendered_by' => 'Marco R. Santos', 'status' => 'Unclaimed'],
];

$categories = ['All Categories', 'Academic', 'Electronics', 'Bags', 'Accessories','Clothing','Wallets','Documents','Personal Essentials', 'Others'];
?>

<!-- Recently Surrendered Items -->
<div class="laf-card">
  <div class="laf-card-header">
    <div>
      <h3 class="laf-section-title">Recently Surrendered Items</h3>
      <p class="laf-section-sub">Below are recently surrendered items that have not yet been claimed</p>
    </div>
    <a href="/LAF/pages/surrendered/index.php" class="laf-view-all">View All</a>
  </div>

  <!-- Search Bar inside card -->
  <div class="laf-search-wrap">
    <select id="search-category">
      <?php foreach ($categories as $cat): ?>
        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
      <?php endforeach; ?>
    </select>
    <div class="laf-search-divider"></div>
    <input type="text" id="search-input" placeholder="Search items by name" autocomplete="off">
    <button class="laf-search-btn" type="button" aria-label="Search">🔍</button>
  </div>

  <div class="laf-card-body">
    <div class="laf-grid laf-grid-4">
      <?php foreach ($surrendered_items as $item): ?>
        <div class="laf-item-card laf-card-clickable <?= htmlspecialchars($item['cat_key']) ?>"
          data-item-id="<?= (int)$item['id'] ?>"
          onclick="window.location.href='/LAF/pages/item-details/index.php?id=<?= (int)$item['id'] ?>'">
          <div class="item-card-top">
            <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>"><?= htmlspecialchars($item['category']) ?></span>
            <span class="badge-laf-unclaimed"><?= htmlspecialchars($item['status']) ?></span>
          </div>
          <div class="item-icon-wrap"><?= $item['icon'] ?></div>
          <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
          <div class="item-meta dash-floor" data-real="<?= htmlspecialchars($item['floor']) ?>">📍 ●●● ●●●●●</div>
          <div class="item-meta dash-time" data-real="<?= htmlspecialchars($item['time']) ?>">🕐 ●●:●●</div>
          <div class="item-meta dash-by" data-real="<?= htmlspecialchars($item['surrendered_by']) ?>" style="margin-bottom:12px;">👤 ●●● ●●●●●●</div>
          <button class="btn-how-to-claim" data-item-id="<?= (int)$item['id'] ?>" onclick="event.stopPropagation();">🏢 How to Claim</button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>