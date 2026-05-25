<!-- ============================================================
     DISCOURSE — Modals & Dropdowns Partial
     File: partials/_discourse-modals.php
     CSS:  assets/css/sec-modals.css
     JS:   assets/js/sec-modals.js

     Includes:
       1. Notifications Dropdown  (bell icon in navbar)
       2. Profile Dropdown        (avatar in navbar)
       3. Report Post Modal       (Report button on post card)
============================================================ -->


<!-- ══════════════════════════════════════════════════════════
     1. NOTIFICATIONS DROPDOWN
     Trigger: bell icon in navbar — add these attrs to bell btn:
       data-bs-toggle="dropdown"
       data-bs-target="#discourseNotifDropdown"
══════════════════════════════════════════════════════════ -->
<div class="discourse-notif-dropdown dropdown-menu p-0" id="discourseNotifDropdown" aria-labelledby="discourseNotifBell">
  <div class="discourse-notif-header">
    <span class="discourse-notif-title">Notifications</span>
    <button class="discourse-notif-mark-all" id="discourse-mark-all-read">Mark all read</button>
  </div>
  <div class="discourse-notif-list">

    <!-- Unread notification -->
    <div class="discourse-notif-item discourse-notif-unread">
      <span class="discourse-notif-dot"></span>
      <div class="discourse-notif-body">
        <p class="discourse-notif-text">
          <strong>Miguel Reyes</strong> upvoted your post "Best AI tools for BSCS students"
        </p>
        <span class="discourse-notif-time">2 minutes ago</span>
      </div>
    </div>

    <!-- Unread notification -->
    <div class="discourse-notif-item discourse-notif-unread">
      <span class="discourse-notif-dot"></span>
      <div class="discourse-notif-body">
        <p class="discourse-notif-text">
          <strong>Anonymous</strong> replied to your comment in "Which IDE do you use for Java?"
        </p>
        <span class="discourse-notif-time">18 minutes ago</span>
      </div>
    </div>

    <!-- Unread notification -->
    <div class="discourse-notif-item discourse-notif-unread">
      <span class="discourse-notif-dot"></span>
      <div class="discourse-notif-body">
        <p class="discourse-notif-text">
          <strong>Aika Tan</strong> started following you
        </p>
        <span class="discourse-notif-time">1 hour ago</span>
      </div>
    </div>

    <!-- Read notification -->
    <div class="discourse-notif-item">
      <span class="discourse-notif-dot discourse-notif-dot-read"></span>
      <div class="discourse-notif-body">
        <p class="discourse-notif-text">
          Your post "Rust in 2025" reached 50 upvotes 🎉
        </p>
        <span class="discourse-notif-time">Yesterday</span>
      </div>
    </div>

    <!-- Read notification -->
    <div class="discourse-notif-item">
      <span class="discourse-notif-dot discourse-notif-dot-read"></span>
      <div class="discourse-notif-body">
        <p class="discourse-notif-text">
          <strong>Juan Santos</strong> commented on "FEU enrollment tips"
        </p>
        <span class="discourse-notif-time">2 days ago</span>
      </div>
    </div>

  </div>
</div>


<!-- ══════════════════════════════════════════════════════════
     2. PROFILE DROPDOWN
     Trigger: user avatar in navbar — add these attrs to avatar:
       data-bs-toggle="dropdown"
       data-bs-target="#discourseProfileDropdown"
══════════════════════════════════════════════════════════ -->
<div class="discourse-profile-dropdown dropdown-menu p-0" id="discourseProfileDropdown" aria-labelledby="discourseProfileAvatar">

  <!-- Top: Avatar + User Info -->
  <div class="discourse-profile-top">
    <img src="assets/images/catalina.webp" alt="Catalina Smith" class="discourse-profile-avatar-lg" />
    <div class="discourse-profile-info">
      <span class="discourse-profile-name">Catalina Smith</span>
      <span class="discourse-profile-id">T202210292 · BS Information Technology</span>
      <span class="discourse-profile-verified">
        <i class="bi bi-shield-check me-1"></i> Verified Student
      </span>
    </div>
  </div>

  <!-- Stats Row -->
  <div class="discourse-profile-stats-row">
    <div class="discourse-profile-stat">
      <span class="discourse-profile-stat-val">304</span>
      <span class="discourse-profile-stat-label">KARMA</span>
    </div>
    <div class="discourse-profile-stat">
      <span class="discourse-profile-stat-val">3</span>
      <span class="discourse-profile-stat-label">POSTS</span>
    </div>
    <div class="discourse-profile-stat">
      <span class="discourse-profile-stat-val">7</span>
      <span class="discourse-profile-stat-label">COMMENTS</span>
    </div>
    <div class="discourse-profile-stat">
      <span class="discourse-profile-stat-val">1</span>
      <span class="discourse-profile-stat-label">SAVED</span>
    </div>
  </div>

  <!-- Account Links -->
  <div class="discourse-profile-section">
    <span class="discourse-profile-section-label">ACCOUNT</span>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-person me-2"></i> View My Profile
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-file-text me-2"></i> My Posts
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-chat-left-text me-2"></i> My Comments
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-hand-thumbs-up me-2"></i> Liked Posts
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-bookmark me-2"></i> Saved Posts
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-people me-2"></i> My Communities
    </a>
  </div>

  <!-- Settings Links -->
  <div class="discourse-profile-section">
    <span class="discourse-profile-section-label">SETTINGS</span>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-gear me-2"></i> Settings
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-shield-lock me-2"></i> Privacy and Security
    </a>
    <a href="#profile" class="discourse-profile-link">
      <i class="bi bi-grid-3x3-gap me-2"></i> Paraverse Portal
    </a>
  </div>

  <!-- Log Out -->
  <div class="discourse-profile-logout-wrap">
    <a href="#" class="discourse-profile-logout">
      <i class="bi bi-box-arrow-right me-2"></i> Log Out
    </a>
  </div>

</div>


<!-- ══════════════════════════════════════════════════════════
     3. REPORT POST MODAL
     Trigger: data-bs-toggle="modal" data-bs-target="#modalReportPost"
══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="modalReportPost" tabindex="-1" aria-labelledby="modalReportPostLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered discourse-report-dialog">
    <div class="modal-content discourse-report-content">

      <!-- Header -->
      <div class="modal-header discourse-report-header">
        <h5 class="modal-title discourse-report-title" id="modalReportPostLabel">
          <i class="bi bi-flag-fill text-danger me-2"></i> Report Post
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body discourse-report-body">
        <p class="discourse-report-subtitle">Why are you reporting this post? Select the best reason.</p>

        <div class="discourse-report-options" id="discourseReportOptions">

          <button class="discourse-report-option discourse-report-option-active" data-option="spam">
            <span class="discourse-report-option-icon discourse-report-icon-red"><i class="bi bi-x-circle-fill"></i></span>
            <span class="discourse-report-option-label">Content is spam or misleading</span>
          </button>

          <button class="discourse-report-option" data-option="irrelevant">
            <span class="discourse-report-option-icon discourse-report-icon-purple"><i class="bi bi-square-fill"></i></span>
            <span class="discourse-report-option-label">Not relevant to this community</span>
          </button>

          <button class="discourse-report-option" data-option="rules">
            <span class="discourse-report-option-icon discourse-report-icon-amber"><i class="bi bi-exclamation-triangle-fill"></i></span>
            <span class="discourse-report-option-label">Post violates community rules</span>
          </button>

          <button class="discourse-report-option" data-option="other">
            <span class="discourse-report-option-icon discourse-report-icon-gray"><i class="bi bi-three-dots"></i></span>
            <span class="discourse-report-option-label">Others</span>
          </button>

        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer discourse-report-footer">
        <button type="button" class="discourse-report-submit-btn" id="discourseReportSubmit">
          <i class="bi bi-send me-2"></i> Submit Report
        </button>
        <button type="button" class="discourse-report-cancel-btn" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
