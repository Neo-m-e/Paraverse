<?php
$lost_items = [
  ['id' => 101, 'name' => 'Black Backpack', 'category' => 'Bags', 'category_class' => 'badge-bags', 'icon' => '🎒', 'floor' => '14th Floor, Library', 'date' => 'May 3, 2026', 'time' => '2:30 PM', 'status' => 'not-found', 'description' => 'Adidas bag, has a small keychain of a yellow duck attached to the zipper, initials "R.T." written inside with marker. Black straps, minor scuff on the front pocket.'],
  ['id' => 102, 'name' => 'Casio Calculator (FX-991)', 'category' => 'Academic', 'category_class' => 'badge-academic', 'icon' => '🧮', 'floor' => '6th Floor, Room 605', 'date' => 'May 2, 2026', 'time' => '10:00 PM', 'status' => 'not-found', 'description' => 'Has protective case, sticker of a mushroom on the back.'],
  ['id' => 103, 'name' => 'Blue Water Bottle', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'icon' => '🍶', 'floor' => '5th Floor, Study Area', 'date' => 'May 4, 2026', 'time' => '6:30 AM', 'status' => 'found', 'description' => 'Hydro Flask, blue, dented on bottom-left, has a FEU Tech sticker.'],
  ['id' => 104, 'name' => 'AirPods (2nd Gen)', 'category' => 'Electronics', 'category_class' => 'badge-electronics', 'icon' => '🎧', 'floor' => '2nd Floor, Student Plaza', 'date' => 'May 1, 2026', 'time' => '12:30 PM', 'status' => 'not-found', 'description' => 'White case with a small crack on the hinge, black dot drawn on the lid.'],
];

// Map status to badge class + label
$status_map = [
  'found'     => ['class' => 'badge-found',     'label' => '✅ Found'],
  'not-found' => ['class' => 'badge-not-found', 'label' => '🔍 Not Found'],
];
?>
<!-- Single Card wrapping both How to Report + Lost Items Board -->
<div class="laf-card">

  <!-- 1. How to Report Section -->
  <div class="laf-hiw-container">
    <p class="laf-hiw-label">🔍 HOW TO REPORT A LOST ITEM</p>
    <div class="laf-hiw-steps">
      <div class="laf-hiw-step">
        <div class="hiw-num">1</div>
        <div class="hiw-content">
          <h6>Click "I Lost Something"</h6>
          <p>Fill in the item name, category, last known location, and a detailed description with unique identifiers.</p>
        </div>
      </div>
      <div class="laf-hiw-step">
        <div class="hiw-num">2</div>
        <div class="hiw-content">
          <h6>Your Report Goes Live</h6>
          <p>Your lost item appears in the "Lost Items" board below. Campus staff, students, and finders can see your report and match it.</p>
        </div>
      </div>
      <div class="laf-hiw-step">
        <div class="hiw-num">3</div>
        <div class="hiw-content">
          <h6>Get Notified When Found</h6>
          <p>If someone found your item, they click "I Found This!" to see how to surrender it.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Lost Items Board Header -->
  <div class="laf-card-header">
    <div>
      <h3 class="laf-section-title">🔍 Lost Items Board</h3>
      <p class="laf-section-sub">Did you find one of these? Tap "I Found This!" to help return it</p>
    </div>
    <a href="/LAF/pages/lost-board/index.php" class="laf-view-all">View All</a>
  </div>

  <!-- Lost Items Grid -->
  <div class="laf-card-body">
    <div class="laf-grid laf-grid-4">
      <?php foreach ($lost_items as $item):
        $st = $status_map[$item['status']] ?? ['class' => 'badge-pending', 'label' => ucfirst($item['status'])];
      ?>
        <div class="laf-lost-card laf-card-clickable"
          onclick="window.location.href='/LAF/pages/lost-item-details/index.php?id=<?= (int)$item['id'] ?>'">

          <!-- Category + Status on one row -->
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
            <span class="badge-laf-cat <?= htmlspecialchars($item['category_class']) ?>">
              <?= htmlspecialchars($item['category']) ?>
            </span>
            <span class="<?= $st['class'] ?>" style="font-size:.72rem;">
              <?= $st['label'] ?>
            </span>
          </div>

          <div class="lost-icon-wrap"><?= $item['icon'] ?></div>
          <div class="lost-title"><?= htmlspecialchars($item['name']) ?></div>
          <div class="lost-meta">📍 <?= htmlspecialchars($item['floor']) ?></div>
          <div class="lost-meta">📅 <?= htmlspecialchars($item['date']) ?> &nbsp;🕐 <?= htmlspecialchars($item['time']) ?></div>
          <div class="lost-desc"><?= htmlspecialchars($item['description']) ?></div>

          <?php if ($item['status'] !== 'found'): ?>
            <button class="btn-i-found" data-item-id="<?= (int)$item['id'] ?>"
              onclick="event.stopPropagation();">I Found This! 🙋</button>
          <?php else: ?>
            <div class="mt-auto pt-2" style="font-size:.78rem;color:var(--laf-muted);text-align:center;">
              Item has been found
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>