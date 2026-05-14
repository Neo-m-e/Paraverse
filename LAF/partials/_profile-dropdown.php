<?php
// Sample user data 
$user_name   = 'Catalina Smith';
$user_id     = 'T202210292';
$user_avatar = '/LAF/assets/images/catalina.webp';
?>
<div id="laf-profile-trigger" style="position:relative;display:inline-block;">
  <img src="<?= htmlspecialchars($user_avatar) ?>"
    id="laf-avatar-btn"
    class="rounded-circle"
    style="width:40px;height:40px;object-fit:cover;cursor:pointer;border:2px solid #e9e9ef;display:block;"
    alt="user" />
</div>

<!-- Dropdown -->
<div id="laf-profile-dropdown" style="
  display:none;
  position:fixed;
  min-width:220px;
  background:#fff;
  border:1px solid #e9e9ef;
  border-radius:16px;
  box-shadow:0 8px 32px rgba(30,30,45,.15),0 2px 8px rgba(108,99,255,.08);
  z-index:99999;
  overflow:hidden;
  opacity:0;
  transform:translateY(-6px);
  transition:opacity .18s ease,transform .18s ease;
">
  <div style="padding:14px 16px 12px;border-bottom:1px solid #e9e9ef;display:flex;align-items:center;gap:12px;">
    <img src="<?= htmlspecialchars($user_avatar) ?>" alt="avatar"
      style="width:42px;height:42px;border-radius:50%;object-fit:cover;border:2px solid #ebe9ff;">
    <div>
      <div style="font-weight:700;font-size:.92rem;color:#1e1e2d;line-height:1.2;"><?= htmlspecialchars($user_name) ?></div>
      <div style="font-size:.75rem;color:#a1a5b7;margin-top:2px;"><?= htmlspecialchars($user_id) ?></div>
    </div>
  </div>
  <div style="padding:6px 0;">
    <a href="/" style="display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:.88rem;font-weight:600;color:#1e1e2d;text-decoration:none;transition:background .13s;" class="laf-dd-item">
      <i class="bi bi-grid-3x3-gap-fill" style="color:#a1a5b7;font-size:1rem;width:18px;"></i> Portal
    </a>
    <a href="/account-settings" style="display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:.88rem;font-weight:600;color:#1e1e2d;text-decoration:none;" class="laf-dd-item">
      <i class="bi bi-gear-fill" style="color:#a1a5b7;font-size:1rem;width:18px;"></i> Account Settings
    </a>
    <a href="/LAF/pages/lost-item-reports/index.php" style="display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:.88rem;font-weight:600;color:#1e1e2d;text-decoration:none;" class="laf-dd-item">
      <i class="bi bi-clipboard2-check-fill" style="color:#a1a5b7;font-size:1rem;width:18px;"></i> Lost Item Reports
    </a>
    <div style="height:1px;background:#e9e9ef;margin:4px 0;"></div>
    <a href="/sign-out" style="display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:.88rem;font-weight:600;color:#f64e60;text-decoration:none;" class="laf-dd-item-danger">
      <i class="bi bi-box-arrow-right" style="font-size:1rem;width:18px;"></i> Sign Out
    </a>
  </div>
</div>

<style>
  .laf-dd-item:hover {
    background: #ebe9ff !important;
    color: #6c63ff !important;
  }

  .laf-dd-item:hover i {
    color: #6c63ff !important;
  }

  .laf-dd-item-danger:hover {
    background: #ffe2e5 !important;
  }
</style>

<script>
  (function() {
    var btn = document.getElementById('laf-avatar-btn');
    var dropdown = document.getElementById('laf-profile-dropdown');
    if (!btn || !dropdown) return;

    // Move dropdown to <body> so it escapes header's overflow/stacking context
    document.body.appendChild(dropdown);

    function positionDropdown() {
      var rect = btn.getBoundingClientRect();
      dropdown.style.top = (rect.bottom + 8) + 'px';
      dropdown.style.left = (rect.right - 220) + 'px'; // align right edge
    }

    function openDropdown() {
      positionDropdown();
      dropdown.style.display = 'block';
      // Force reflow before animating
      dropdown.getBoundingClientRect();
      dropdown.style.opacity = '1';
      dropdown.style.transform = 'translateY(0)';
    }

    function closeDropdown() {
      dropdown.style.opacity = '0';
      dropdown.style.transform = 'translateY(-6px)';
      setTimeout(function() {
        dropdown.style.display = 'none';
      }, 180);
    }

    var isOpen = false;

    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      isOpen = !isOpen;
      isOpen ? openDropdown() : closeDropdown();
    });

    document.addEventListener('click', function(e) {
      if (isOpen && !dropdown.contains(e.target) && e.target !== btn) {
        isOpen = false;
        closeDropdown();
      }
    });

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && isOpen) {
        isOpen = false;
        closeDropdown();
      }
    });

    // Reposition on scroll/resize
    window.addEventListener('resize', function() {
      if (isOpen) positionDropdown();
    });
    window.addEventListener('scroll', function() {
      if (isOpen) positionDropdown();
    }, true);
  })();
</script>