<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

// $SQL = "SELECT * FROM posts WHERE slug = ?";
// ... fetch post record ...

$META_TITLE = "Edit Post";
$META_DESC = "Edit your existing post.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <style>
    /* ── Shared tokens (same as create-post) ─────────────────── */
    body {
      background: #f5f6fa !important;
    }

    .discourse-create-hero {
      background: linear-gradient(135deg, #0b3220 0%, #1a5c38 60%, #2D6A4F 100%);
      padding: 28px 0 22px;
    }

    .discourse-create-hero .back-btn {
      background: rgba(255, 255, 255, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.22);
      color: #fff;
      border-radius: 8px;
      padding: 7px 18px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.18s;
    }

    .discourse-create-hero .back-btn:hover {
      background: rgba(255, 255, 255, 0.22);
      color: #fff;
    }

    .discourse-create-hero .label-badge {
      background: rgba(245, 166, 35, 0.18);
      color: #f5a623;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      border-radius: 6px;
      padding: 3px 10px;
      margin-bottom: 6px;
      display: inline-block;
    }

    .discourse-create-hero h2 {
      color: #fff;
      font-size: 28px;
      font-weight: 800;
      margin-bottom: 2px;
    }

    .discourse-create-hero p {
      color: rgba(255, 255, 255, 0.65);
      font-size: 13.5px;
      margin-bottom: 0;
    }

    .discourse-create-layout {
      display: grid;
      grid-template-columns: 1fr 300px;
      gap: 1.4rem;
      padding: 2rem 0 3rem;
      align-items: start;
    }

    @media (max-width: 992px) {
      .discourse-create-layout {
        grid-template-columns: 1fr;
      }
    }

    .dc-card {
      background: #fff;
      border-radius: 14px;
      border: 1px solid #e4e6ef;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
      overflow: hidden;
    }

    .dc-card-header {
      background: #f9fafb;
      border-bottom: 1px solid #e4e6ef;
      padding: 14px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .dc-card-header .dc-card-icon {
      width: 32px;
      height: 32px;
      background: #e8f5e9;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #2D6A4F;
      font-size: 14px;
    }

    .dc-card-header h5 {
      font-size: 14px;
      font-weight: 700;
      color: #1a1a2e;
      margin: 0;
    }

    .dc-card-body {
      padding: 22px 22px 18px;
    }

    .dc-label {
      font-size: 11.5px;
      font-weight: 700;
      color: #5e6278;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 6px;
      display: block;
    }

    .dc-input,
    .dc-select,
    .dc-textarea {
      width: 100%;
      border: 1.5px solid #e4e6ef;
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 13.5px;
      color: #1a1a2e;
      background: #f9fafb;
      transition: border-color 0.18s, box-shadow 0.18s;
      outline: none;
      font-family: inherit;
    }

    .dc-input:focus,
    .dc-select:focus,
    .dc-textarea:focus {
      border-color: #2D6A4F;
      box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
      background: #fff;
    }

    .dc-input::placeholder,
    .dc-textarea::placeholder {
      color: #b5b5c3;
    }

    .dc-textarea {
      min-height: 140px;
      resize: vertical;
    }

    .dc-toolbar {
      display: flex;
      align-items: center;
      gap: 4px;
      padding: 8px 10px;
      background: #f9fafb;
      border: 1.5px solid #e4e6ef;
      border-bottom: none;
      border-radius: 8px 8px 0 0;
    }

    .dc-toolbar-btn {
      background: none;
      border: 1px solid transparent;
      border-radius: 5px;
      padding: 5px 9px;
      font-size: 12px;
      font-weight: 700;
      color: #5e6278;
      cursor: pointer;
      transition: all 0.15s;
    }

    .dc-toolbar-btn:hover {
      background: #e8f5e9;
      border-color: #c8e6c9;
      color: #2D6A4F;
    }

    .dc-toolbar-sep {
      width: 1px;
      height: 18px;
      background: #e4e6ef;
      margin: 0 4px;
    }

    .dc-body-textarea {
      border-top-left-radius: 0 !important;
      border-top-right-radius: 0 !important;
    }

    .dc-field {
      margin-bottom: 18px;
    }

    .dc-field:last-child {
      margin-bottom: 0;
    }

    /* ── Save / Cancel buttons ─────────────────────────────── */
    .dc-save-btn {
      width: 100%;
      background: linear-gradient(135deg, #2D6A4F 0%, #1a5c38 100%);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 13px 20px;
      font-size: 14px;
      font-weight: 700;
      cursor: pointer;
      transition: opacity 0.18s, transform 0.15s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .dc-save-btn:hover {
      opacity: 0.92;
      transform: translateY(-1px);
    }

    .dc-cancel-btn {
      width: 100%;
      background: #f5f6fa;
      color: #5e6278;
      border: 1.5px solid #e4e6ef;
      border-radius: 10px;
      padding: 10px 20px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.15s;
      margin-top: 8px;
    }

    .dc-cancel-btn:hover {
      background: #fffde7;
      border-color: #ffe082;
      color: #795548;
    }

    /* ── Danger zone ───────────────────────────────────────── */
    .dc-danger-card {
      background: #fff5f5;
      border: 1.5px solid #ffcdd2;
      border-radius: 12px;
      padding: 16px 18px;
    }

    .dc-danger-card h6 {
      font-size: 11.5px;
      font-weight: 700;
      color: #c62828;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .dc-danger-card p {
      font-size: 12px;
      color: #7e8299;
      margin-bottom: 12px;
    }

    .dc-delete-btn {
      width: 100%;
      background: #fff;
      color: #c62828;
      border: 1.5px solid #ef9a9a;
      border-radius: 8px;
      padding: 9px 16px;
      font-size: 12.5px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.15s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .dc-delete-btn:hover {
      background: #c62828;
      color: #fff;
      border-color: #c62828;
    }

    /* ── Edit notice banner ────────────────────────────────── */
    .dc-edit-notice {
      background: linear-gradient(90deg, #fff8e1 0%, #fffde7 100%);
      border: 1px solid #ffe082;
      border-radius: 10px;
      padding: 11px 16px;
      font-size: 12.5px;
      color: #795548;
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 18px;
    }

    .dc-edit-notice i {
      color: #f5a623;
      flex-shrink: 0;
    }

    /* ── Edit History ──────────────────────────────────────── */
    .dc-history-card {
      background: #f9fafb;
      border: 1px solid #e4e6ef;
      border-radius: 12px;
      padding: 14px 18px;
    }

    .dc-history-card h6 {
      font-size: 12px;
      font-weight: 700;
      color: #5e6278;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .dc-history-item {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      font-size: 12px;
      color: #5e6278;
      padding: 5px 0;
      border-bottom: 1px dashed #e4e6ef;
    }

    .dc-history-item:last-child {
      border-bottom: none;
    }

    .dc-history-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #2D6A4F;
      flex-shrink: 0;
      margin-top: 4px;
    }

    .dc-history-dot.dc-dot-gray {
      background: #a1a5b7;
    }

    /* ── Post image preview ────────────────────────────────── */
    .dc-image-preview {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
      max-height: 200px;
      margin-top: 10px;
      border: 1px solid #e4e6ef;
    }

    /* ── Guidelines card ───────────────────────────────────── */
    .dc-rules-card {
      background: linear-gradient(135deg, #f0faf5 0%, #e8f5e9 100%);
      border: 1px solid #c8e6c9;
      border-radius: 12px;
      padding: 16px 18px;
    }

    .dc-rules-card h6 {
      font-size: 11.5px;
      font-weight: 700;
      color: #1a5c38;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      margin-bottom: 10px;
    }

    .dc-rules-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .dc-rules-list li {
      font-size: 12px;
      color: #2D6A4F;
      padding: 3px 0;
      display: flex;
      align-items: flex-start;
      gap: 6px;
    }

    .dc-rules-list li::before {
      content: '✓';
      font-weight: 700;
      flex-shrink: 0;
      margin-top: 1px;
    }
  </style>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
  class="app-default">

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

      <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_header.php'); ?>

      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>

              <!-- Hero Banner -->
              <div class="discourse-create-hero">
                <div class="app-container container-xxl">
                  <div class="d-flex align-items-start justify-content-between">
                    <div>
                      <span class="label-badge">Editing Post</span>
                      <h2>Edit Post</h2>
                      <p>Make changes to your existing post.</p>
                    </div>
                    <a href="javascript:history.back();" class="back-btn mt-2">
                      <i class="ki-duotone ki-arrow-left fs-5 me-1"><span class="path1"></span><span class="path2"></span></i> Back
                    </a>
                  </div>
                </div>
              </div>

              <!-- Main Content -->
              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl">
                  <div class="discourse-create-layout">

                    <!-- LEFT: Edit Form -->
                    <div>
                      <div class="dc-card">
                        <div class="dc-card-header">
                          <div class="dc-card-icon">
                            <i class="ki-duotone ki-pencil fs-5"><span class="path1"></span><span class="path2"></span></i>
                          </div>
                          <h5>Edit Post Content</h5>
                        </div>
                        <div class="dc-card-body">

                          <!-- Edit Notice -->
                          <div class="dc-edit-notice">
                            <i class="ki-duotone ki-information-2 fs-5"><span class="path1"></span><span class="path2"></span></i>
                            Editing a post will mark it as <strong>edited</strong> with a timestamp visible to all readers. Significant changes to meaning are discouraged.
                          </div>

                          <!-- Title -->
                          <div class="dc-field">
                            <label class="dc-label">Title <span style="color:#e53935;">*</span></label>
                            <input type="text" class="dc-input" id="edit_title"
                              value="Anyone else struggling with the new CS curriculum changes? Honest discussion.">
                          </div>

                          <!-- Body -->
                          <div class="dc-field">
                            <label class="dc-label">Body <span class="text-muted fw-normal" style="text-transform:none; letter-spacing:0; font-size:11px;">— optional</span></label>
                            <div class="dc-toolbar">
                              <button class="dc-toolbar-btn" title="Bold"><b>B</b></button>
                              <button class="dc-toolbar-btn" title="Italic"><i>I</i></button>
                              <button class="dc-toolbar-btn" title="Strikethrough"><s>S</s></button>
                              <button class="dc-toolbar-btn" title="Quote">
                                <i class="ki-duotone ki-message-text fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>
                            <textarea class="dc-input dc-textarea dc-body-textarea" id="edit_body">The shift from Java to Python in first year intro courses has been both good and confusing. Some profs haven't updated their slides at all — they literally just changed variable names. Starting this thread to collect experiences and hopefully get some clarity from others who've gone through it.</textarea>

                            <!-- Attached Image Preview -->
                            <img src="https://picsum.photos/seed/campus/800/300" alt="Attached image" class="dc-image-preview">
                          </div>

                          <!-- Edit History -->
                          <div class="dc-field mt-4">
                            <div class="dc-history-card">
                              <h6><i class="ki-duotone ki-time fs-5"><span class="path1"></span><span class="path2"></span></i> Edit History</h6>
                              <div class="dc-history-item">
                                <div class="dc-history-dot"></div>
                                <div>
                                  <span class="fw-semibold text-dark" style="font-size:12px;">New</span>
                                  <span class="text-muted" style="font-size:11.5px;"> — current version being edited</span>
                                </div>
                              </div>
                              <div class="dc-history-item">
                                <div class="dc-history-dot dc-dot-gray"></div>
                                <div>
                                  <span class="fw-semibold text-muted" style="font-size:12px;">Original</span>
                                  <span class="text-muted" style="font-size:11.5px;"> — published version</span>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- RIGHT: Save + Danger + Guidelines -->
                    <div>

                      <!-- Save Card -->
                      <div class="dc-card mb-5">
                        <div class="dc-card-body">
                          <p class="text-gray-600 fs-6 mb-4">Your edits will be visible to everyone in the community.</p>
                          <button class="dc-save-btn" onclick="savePost()">
                            <i class="ki-duotone ki-check fs-5"><span class="path1"></span><span class="path2"></span></i>
                            Save Changes
                          </button>
                          <button class="dc-cancel-btn" onclick="history.back()">Cancel</button>
                        </div>
                      </div>

                      <!-- Danger Zone -->
                      <div class="dc-danger-card mb-5">
                        <h6>
                          <i class="ki-duotone ki-warning-2 fs-5"><span class="path1"></span><span class="path2"></span></i>
                          Danger Zone
                        </h6>
                        <p>Permanently remove this post and all its comments. This cannot be undone.</p>
                        <button class="dc-delete-btn" onclick="confirmDelete()">
                          <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span></i>
                          Delete Post
                        </button>
                      </div>

                      <!-- Edit Guidelines -->
                      <div class="dc-card mb-5">
                        <div class="dc-card-header">
                          <div class="dc-card-icon">
                            <i class="ki-duotone ki-information fs-5"><span class="path1"></span><span class="path2"></span></i>
                          </div>
                          <h5>Edit Guidelines</h5>
                        </div>
                        <div class="dc-card-body pt-3 pb-3">
                          <ul class="dc-rules-list" style="color:#5e6278;">
                            <li style="color:#5e6278;">Keep your <strong>title</strong> clear and informative for better discoverability</li>
                            <li style="color:#5e6278;">Substantial edits may be <strong>flagged</strong> to show the post was modified</li>
                            <li style="color:#5e6278;">You can <strong>delete</strong> a post from the danger zone if needed</li>
                          </ul>
                        </div>
                      </div>

                      <!-- Community Rules -->
                      <div class="dc-rules-card">
                        <h6><i class="ki-duotone ki-shield-tick fs-5 me-1"><span class="path1"></span><span class="path2"></span></i> Community Rules</h6>
                        <ul class="dc-rules-list">
                          <li>Be respectful and constructive</li>
                          <li>No personal attacks or harassment</li>
                          <li>Keep posts relevant to FEU Tech</li>
                          <li>Verify information before sharing</li>
                        </ul>
                      </div>

                    </div>

                  </div><!-- /.discourse-create-layout -->
                </div>
              </div>

            </main>
          </div>
          <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_scrolltop.php'); ?>

  <link rel="stylesheet" href="/Discourse/assets/css/dashboard.css">
  <link rel="stylesheet" href="/Discourse/assets/css/sec-posts.css">

  <script>
    function savePost() {
      const title = document.getElementById('edit_title').value.trim();
      if (!title) {
        document.getElementById('edit_title').style.borderColor = '#e53935';
        document.getElementById('edit_title').focus();
        return;
      }
      KTApp && KTApp.showPageLoading();
      // TODO: AJAX save
    }

    function confirmDelete() {
      if (confirm('Are you sure you want to permanently delete this post? This cannot be undone.')) {
        KTApp && KTApp.showPageLoading();
        // TODO: AJAX delete
      }
    }
  </script>

</body>
</html>
