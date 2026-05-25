<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
// IS_LOGGED_IN($_SERVER['REQUEST_URI']);
$META_TITLE = "Create a Post";
$META_DESC = "Share something with the Paraverse community.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <style>
    :root {
      --dc-green: #2D6A4F;
      --dc-green-dark: #1a5c38;
      --dc-green-deep: #0b3220;
      --dc-accent: #F5A623;
      --dc-bg: #f5f6fa;
      --dc-border: #e4e6ef;
      --dc-card-radius: 14px;
    }
    body { background: var(--dc-bg) !important; }

    /* ── Hero ── */
    .dc-hero {
      background: linear-gradient(135deg, var(--dc-green-deep) 0%, #1a5c38 60%, var(--dc-green) 100%);
      padding: 26px 0 20px;
    }
    .dc-hero .dc-badge {
      background: rgba(245,166,35,0.18); color: #f5a623;
      font-size: 11px; font-weight: 700; letter-spacing: .08em;
      text-transform: uppercase; border-radius: 6px;
      padding: 3px 10px; margin-bottom: 6px; display: inline-block;
    }
    .dc-hero h2 { color:#fff; font-size:28px; font-weight:800; margin-bottom:2px; }
    .dc-hero p  { color:rgba(255,255,255,.65); font-size:13.5px; margin:0; }
    .dc-back-btn {
      background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
      color:#fff; border-radius:8px; padding:7px 18px; font-size:13px; font-weight:600;
      text-decoration:none; transition:background .18s;
    }
    .dc-back-btn:hover { background:rgba(255,255,255,.22); color:#fff; }

    /* ── Layout ── */
    .dc-layout {
      display:grid; grid-template-columns:1fr 300px;
      gap:1.4rem; padding:2rem 0 3rem; align-items:start;
    }
    @media(max-width:992px){ .dc-layout{ grid-template-columns:1fr; } }

    /* ── Card ── */
    .dc-card {
      background:#fff; border-radius:var(--dc-card-radius);
      border:1px solid var(--dc-border);
      box-shadow:0 2px 12px rgba(0,0,0,.06); overflow:hidden;
    }
    .dc-card-hd {
      background:#f9fafb; border-bottom:1px solid var(--dc-border);
      padding:14px 20px; display:flex; align-items:center; gap:10px;
    }
    .dc-card-icon {
      width:32px; height:32px; background:#e8f5e9; border-radius:8px;
      display:flex; align-items:center; justify-content:center; color:var(--dc-green); font-size:14px;
    }
    .dc-card-hd h5 { font-size:14px; font-weight:700; color:#1a1a2e; margin:0; }
    .dc-card-bd { padding:22px 22px 20px; }

    /* ── Label ── */
    .dc-lbl {
      font-size:11.5px; font-weight:700; color:#5e6278;
      text-transform:uppercase; letter-spacing:.06em;
      margin-bottom:6px; display:block;
    }
    .dc-lbl-opt { font-size:11px; color:#a1a5b7; font-weight:400; text-transform:none; letter-spacing:0; margin-left:4px; }

    /* ── Inputs ── */
    .dc-input, .dc-select, .dc-textarea {
      width:100%; border:1.5px solid var(--dc-border); border-radius:8px;
      padding:10px 14px; font-size:13.5px; color:#1a1a2e;
      background:#f9fafb; transition:border-color .18s, box-shadow .18s;
      outline:none; font-family:inherit;
    }
    .dc-input:focus, .dc-select:focus, .dc-textarea:focus {
      border-color:var(--dc-green);
      box-shadow:0 0 0 3px rgba(45,106,79,.1); background:#fff;
    }
    .dc-input::placeholder, .dc-textarea::placeholder { color:#b5b5c3; }
    .dc-textarea { min-height:200px; resize:vertical; border-radius:0 0 8px 8px; border-top:none; }
    .dc-select {
      appearance:none; -webkit-appearance:none;
      background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%235e6278' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat:no-repeat; background-position:right 14px center; padding-right:38px; cursor:pointer;
    }

    /* ── Toolbar ── */
    .dc-toolbar {
      display:flex; align-items:center; gap:1px;
      padding:7px 10px; background:#f9fafb;
      border:1.5px solid var(--dc-border); border-bottom:1px solid var(--dc-border);
      border-radius:8px 8px 0 0; flex-wrap:wrap;
    }
    .dc-tb-btn {
      background:none; border:none; border-radius:5px;
      padding:5px 8px; font-size:13px; font-weight:700; color:#2D6A4F;
      cursor:pointer; transition:all .15s; display:inline-flex; align-items:center; justify-content:center;
      min-width:30px; line-height:1;
    }
    .dc-tb-btn:hover { background:#e8f5e9; }
    .dc-tb-btn.active { background:#d4edda; color:#1a5c38; }
    .dc-tb-sep { width:1px; height:20px; background:#dde; margin:0 4px; flex-shrink:0; }
    .dc-tb-switch {
      margin-left:auto; font-size:12px; color:var(--dc-green); font-weight:700;
      cursor:pointer; text-decoration:none; white-space:nowrap;
    }
    .dc-tb-switch:hover { text-decoration:underline; }

    /* editor area */
    .dc-editor-wrap { position:relative; }
    .dc-editor-area {
      width:100%; min-height:200px; padding:14px 16px;
      border:1.5px solid var(--dc-border); border-top:none; border-bottom:none;
      font-size:13.5px; color:#1a1a2e; background:#f9fafb;
      outline:none; font-family:inherit; line-height:1.7;
      overflow-y:auto;
    }
    .dc-editor-area:empty:before { content:attr(data-placeholder); color:#b5b5c3; }
    .dc-editor-area:focus { background:#fff; }

    /* ── Bottom media bar ── */
    .dc-media-bar {
      display:flex; gap:4px; flex-wrap:wrap;
      padding:8px 12px; background:#f9fafb;
      border:1.5px solid var(--dc-border); border-top:1px solid var(--dc-border);
      border-radius:0 0 8px 8px;
    }
    .dc-media-btn {
      background:none; border:1px solid var(--dc-border); border-radius:7px;
      padding:5px 13px; font-size:12px; color:#5e6278; font-weight:600;
      cursor:pointer; transition:all .15s;
      display:inline-flex; align-items:center; gap:5px;
    }
    .dc-media-btn:hover { background:#e8f5e9; border-color:#a5d6a7; color:var(--dc-green); }
    .dc-media-btn svg { flex-shrink:0; }

    /* ── Tag input ── */
    .dc-tag-wrap {
      display:flex; flex-wrap:wrap; align-items:center; gap:5px;
      border:1.5px solid var(--dc-border); border-radius:8px;
      padding:7px 12px; background:#f9fafb; min-height:42px;
      cursor:text; transition:border-color .18s, box-shadow .18s;
    }
    .dc-tag-wrap:focus-within {
      border-color:var(--dc-green); box-shadow:0 0 0 3px rgba(45,106,79,.1); background:#fff;
    }
    .dc-tag {
      display:inline-flex; align-items:center; background:#e8f5e9;
      color:#1a5c38; font-size:11.5px; font-weight:600;
      border-radius:20px; padding:3px 10px; gap:5px;
    }
    .dc-tag-x { background:none; border:none; padding:0; color:#7e8299; cursor:pointer; font-size:13px; line-height:1; }
    .dc-tag-input { flex:1; min-width:100px; border:none; outline:none; background:transparent; font-size:13px; color:#1a1a2e; }
    .dc-tag-input::placeholder { color:#b5b5c3; }

    /* ── Posting-as ── */
    .dc-posting-as {
      display:inline-flex; align-items:center; gap:7px;
      background:#e8f5e9; border:1px solid #a5d6a7; border-radius:20px;
      padding:5px 14px 5px 8px; font-size:12.5px; font-weight:600; color:var(--dc-green); cursor:pointer;
    }
    .dc-posting-as img { width:22px; height:22px; border-radius:50%; object-fit:cover; }

    .dc-field { margin-bottom:18px; }
    .dc-field:last-child { margin-bottom:0; }
    .dc-row-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
    @media(max-width:600px){ .dc-row-2{ grid-template-columns:1fr; } }

    /* ── SIDEBAR ── */
    /* Publish card */
    .dc-publish-card .dc-card-bd { padding:20px; }
    .dc-pub-title { font-size:16px; font-weight:700; color:#1a1a2e; margin-bottom:6px; }
    .dc-pub-desc { font-size:13px; color:#7e8299; margin-bottom:16px; line-height:1.55; }

    .dc-btn-publish {
      width:100%; background:var(--dc-green);
      color:#fff; border:none; border-radius:8px;
      padding:13px 20px; font-size:14px; font-weight:700;
      cursor:pointer; transition:background .18s, transform .15s;
      display:flex; align-items:center; justify-content:center; gap:8px;
    }
    .dc-btn-publish:hover { background:var(--dc-green-dark); transform:translateY(-1px); }

    .dc-btn-discard {
      width:100%; background:#fff; color:#1a1a2e;
      border:1.5px solid var(--dc-border); border-radius:8px;
      padding:11px 20px; font-size:14px; font-weight:700;
      cursor:pointer; transition:all .15s; margin-top:8px;
    }
    .dc-btn-discard:hover { border-color:#aaa; background:#f9fafb; }

    /* Tips card */
    .dc-tips-title { font-size:15px; font-weight:700; color:#1a1a2e; margin-bottom:14px; }
    .dc-tips-list { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:10px; }
    .dc-tips-list li { display:flex; align-items:flex-start; gap:10px; font-size:13px; color:#5e6278; line-height:1.5; }
    .dc-tip-arrow { color:var(--dc-accent); font-size:14px; flex-shrink:0; margin-top:1px; }

    /* Rules card */
    .dc-rules-card {
      background:#f0faf5; border:1px solid #c8e6c9;
      border-radius:12px; padding:18px 20px;
    }
    .dc-rules-title { font-size:15px; font-weight:700; color:var(--dc-green); margin-bottom:10px; }
    .dc-rules-list { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:5px; }
    .dc-rules-list li { font-size:13px; color:#2D6A4F; display:flex; align-items:flex-start; gap:7px; }
    .dc-rules-list li::before { content:'✓'; font-weight:700; flex-shrink:0; }

    /* ── Modals / overlays ── */
    .dc-modal-overlay {
      display:none; position:fixed; inset:0; background:rgba(0,0,0,.45);
      z-index:9999; align-items:center; justify-content:center;
    }
    .dc-modal-overlay.open { display:flex; }
    .dc-modal {
      background:#fff; border-radius:14px; padding:28px;
      width:90%; max-width:460px; box-shadow:0 8px 40px rgba(0,0,0,.18);
      position:relative; animation:dc-pop .18s ease;
    }
    @keyframes dc-pop { from{transform:scale(.93);opacity:0} to{transform:scale(1);opacity:1} }
    .dc-modal-close {
      position:absolute; top:14px; right:16px; background:none; border:none;
      font-size:20px; color:#aaa; cursor:pointer;
    }
    .dc-modal-close:hover { color:#333; }
    .dc-modal h4 { font-size:16px; font-weight:700; color:#1a1a2e; margin-bottom:8px; }
    .dc-modal p { font-size:13px; color:#7e8299; margin-bottom:18px; }
    .dc-modal-field { margin-bottom:14px; }
    .dc-modal-field label { font-size:11.5px; font-weight:700; color:#5e6278; text-transform:uppercase; letter-spacing:.05em; margin-bottom:5px; display:block; }
    .dc-modal input, .dc-modal select, .dc-modal textarea {
      width:100%; border:1.5px solid var(--dc-border); border-radius:8px;
      padding:9px 13px; font-size:13.5px; color:#1a1a2e; background:#f9fafb; outline:none; font-family:inherit;
    }
    .dc-modal input:focus, .dc-modal select:focus, .dc-modal textarea:focus {
      border-color:var(--dc-green); box-shadow:0 0 0 3px rgba(45,106,79,.1); background:#fff;
    }
    .dc-modal-btns { display:flex; gap:8px; justify-content:flex-end; margin-top:20px; }
    .dc-modal-cancel { background:#f5f6fa; border:1.5px solid var(--dc-border); color:#5e6278; border-radius:8px; padding:9px 18px; font-size:13px; font-weight:600; cursor:pointer; }
    .dc-modal-ok { background:var(--dc-green); color:#fff; border:none; border-radius:8px; padding:9px 22px; font-size:13px; font-weight:700; cursor:pointer; }
    .dc-modal-ok:hover { background:var(--dc-green-dark); }

    /* ── Poll builder inside editor ── */
    .dc-poll-builder {
      border:1.5px solid #c8e6c9; border-radius:10px;
      background:#f0faf5; padding:16px; margin:10px 0;
    }
    .dc-poll-builder-title { font-size:12px; font-weight:700; color:var(--dc-green); text-transform:uppercase; letter-spacing:.06em; margin-bottom:12px; display:flex; align-items:center; justify-content:space-between; }
    .dc-poll-opt-row { display:flex; align-items:center; gap:7px; margin-bottom:7px; }
    .dc-poll-opt-row input { flex:1; border:1.5px solid var(--dc-border); border-radius:7px; padding:7px 12px; font-size:13px; background:#fff; outline:none; font-family:inherit; }
    .dc-poll-opt-row input:focus { border-color:var(--dc-green); }
    .dc-poll-opt-del { background:none; border:none; color:#b5b5c3; font-size:16px; cursor:pointer; padding:2px 5px; border-radius:5px; }
    .dc-poll-opt-del:hover { color:#c62828; background:#fee; }
    .dc-poll-add { background:none; border:1.5px dashed #a5d6a7; border-radius:7px; padding:6px 14px; font-size:12.5px; font-weight:600; color:var(--dc-green); cursor:pointer; margin-top:4px; display:inline-flex; align-items:center; gap:5px; }
    .dc-poll-add:hover { background:#e8f5e9; }

    /* ── Link bar ── */
    .dc-link-bar { display:flex; gap:6px; margin:8px 0 2px; align-items:center; }
    .dc-link-bar input { flex:1; border:1.5px solid var(--dc-border); border-radius:7px; padding:7px 12px; font-size:13px; background:#fff; outline:none; font-family:inherit; }
    .dc-link-bar input:focus { border-color:var(--dc-green); }
    .dc-link-bar button { background:var(--dc-green); color:#fff; border:none; border-radius:7px; padding:7px 14px; font-size:12.5px; font-weight:700; cursor:pointer; }

    /* table grid preview */
    .dc-table-preview { border-collapse:collapse; width:100%; margin:8px 0; }
    .dc-table-preview td { border:1px solid var(--dc-border); padding:6px 10px; font-size:13px; min-width:60px; }
    .dc-table-preview td[contenteditable] { outline:none; }
    .dc-table-preview td[contenteditable]:focus { background:#f0faf5; }

    /* spoiler block */
    .dc-spoiler { background:#fff8e1; border:1.5px solid #ffe082; border-radius:8px; padding:10px 14px; margin:6px 0; position:relative; }
    .dc-spoiler-label { font-size:11px; font-weight:700; color:#795548; text-transform:uppercase; margin-bottom:5px; display:flex; align-items:center; gap:5px; }
    .dc-spoiler-content { font-size:13.5px; color:#1a1a2e; outline:none; min-height:30px; }
    .dc-spoiler-content:empty:before { content:'Hidden content here...'; color:#b5b5c3; }

    /* code block */
    .dc-code-block { background:#1e1e2e; color:#cdd6f4; border-radius:8px; padding:12px 16px; margin:6px 0; font-family:monospace; font-size:13px; outline:none; min-height:50px; white-space:pre; overflow-x:auto; }
    .dc-code-block:empty:before { content:'// Your code here...'; color:#6c7086; }

    /* list block */
    .dc-list-block { padding:6px 0; margin:4px 0; }
    .dc-list-block ul, .dc-list-block ol { padding-left:20px; margin:0; }
    .dc-list-block li { font-size:13.5px; color:#1a1a2e; line-height:1.7; outline:none; min-height:1em; }
    .dc-list-block li:empty:before { content:'List item...'; color:#b5b5c3; }

    /* image preview */
    .dc-img-inserted { max-width:100%; border-radius:8px; margin:8px 0; display:block; border:1px solid var(--dc-border); max-height:260px; object-fit:cover; }
    .dc-video-embed { width:100%; aspect-ratio:16/9; border-radius:8px; margin:8px 0; border:none; }
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

              <!-- Hero -->
              <div class="dc-hero">
                <div class="app-container container-xxl d-flex align-items-start justify-content-between">
                  <div>
                    <span class="dc-badge">New Post</span>
                    <h2>Create a Post</h2>
                    <p>Share something with the Paraverse community.</p>
                  </div>
                  <a href="/Discourse/" class="dc-back-btn mt-2" onclick="KTApp.showPageLoading()">
                    <i class="ki-duotone ki-arrow-left fs-5 me-1"><span class="path1"></span><span class="path2"></span></i> Back
                  </a>
                </div>
              </div>

              <!-- Content -->
              <div id="kt_app_content">
                <div class="app-container container-xxl">
                  <div class="dc-layout">

                    <!-- LEFT COLUMN -->
                    <div>
                      <div class="dc-card">
                        <div class="dc-card-hd">
                          <div class="dc-card-icon">
                            <i class="ki-duotone ki-message-edit fs-5"><span class="path1"></span><span class="path2"></span></i>
                          </div>
                          <h5>Post Content</h5>
                          <div class="ms-auto">
                            <div class="dropdown">
  <div class="dc-posting-as dropdown-toggle" id="identityDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
    <img id="display_identity_avatar" src="/Discourse/assets/images/avatars/300-1.jpg" alt="You"
         onerror="this.src='https://ui-avatars.com/api/?name=You&background=2D6A4F&color=fff&size=32'">
    <span id="display_identity_text">Posting as yourself</span>
    <i class="ki-duotone ki-down fs-7 ms-1"><span class="path1"></span><span class="path2"></span></i>
  </div>

  <ul class="dropdown-menu dropdown-menu-end menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" aria-labelledby="identityDropdown">
    <li>
      <a class="dropdown-item menu-link px-4 active" href="#" onclick="changeIdentity(event, 'Posting as yourself', '/Discourse/assets/images/avatars/300-1.jpg')">
        <span class="menu-icon"><i class="bi bi-person fs-5 me-2"></i></span>
        <span class="menu-title">Yourself</span>
      </a>
    </li>
    <li>
      <a class="dropdown-item menu-link px-4" href="#" onclick="changeIdentity(event, 'Posting anonymously', 'https://ui-avatars.com/api/?name=A&background=7e8299&color=fff&size=32')">
        <span class="menu-icon"><i class="bi bi-eye-slash fs-5 text-danger me-2"></i></span>
        <span class="menu-title text-danger">Anonymous</span>
      </a>
    </li>
  </ul>
</div>
                          </div>
                        </div>
                        <div class="dc-card-bd">

                          <!-- Title -->
                          <div class="dc-field">
                            <label class="dc-lbl">Title <span style="color:#e53935;">*</span></label>
                            <input type="text" class="dc-input" id="post_title" placeholder="What's on your mind? (Give it a good headline...)">
                          </div>

                          <!-- Community + Topic -->
                          <div class="dc-field dc-row-2">
                            <div>
                              <label class="dc-lbl">Community <span style="color:#e53935;">*</span></label>
                              <select class="dc-select">
                                <option value="">No community</option>
                                <option>CS Department</option>
                                <option>General</option>
                                <option>FEU Tech</option>
                              </select>
                            </div>
                            <div>
                              <label class="dc-lbl">Topic <span style="color:#e53935;">*</span></label>
                              <select class="dc-select">
                                <option value="">Select a topic...</option>
                                <option>Academics</option>
                                <option>Campus Life</option>
                                <option>Events</option>
                                <option>Help &amp; Support</option>
                              </select>
                            </div>
                          </div>

                          <!-- Tags -->
                          <div class="dc-field">
                            <label class="dc-lbl">Tags</label>
                            <div class="dc-tag-wrap" id="tag-wrap" onclick="document.getElementById('tag-input').focus()">
                              <input type="text" class="dc-tag-input" id="tag-input" placeholder="Type a tag and press Enter...">
                            </div>
                          </div>

                          <!-- Body editor -->
                          <div class="dc-field">
                            <label class="dc-lbl">Body <span class="dc-lbl-opt">— optional</span></label>

                            <!-- Toolbar -->
                            <div class="dc-toolbar" id="dc-toolbar">
                              <button class="dc-tb-btn" title="Bold" onclick="fmt('bold')"><b>B</b></button>
                              <button class="dc-tb-btn" title="Italic" onclick="fmt('italic')"><i style="font-style:italic">i</i></button>
                              <button class="dc-tb-btn" title="Strikethrough" onclick="fmt('strikeThrough')"><s>S</s></button>
                              <button class="dc-tb-btn" title="Superscript" onclick="fmt('superscript')" style="font-size:11px;">x<sup>2</sup></button>
                              <button class="dc-tb-btn" title="Paragraph" onclick="fmt('formatBlock','p')">¶T</button>
                              <span class="dc-tb-sep"></span>
                              <button class="dc-tb-btn" title="Insert Link" onclick="openModal('modal-link')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Insert Image" onclick="openModal('modal-image')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Embed Video" onclick="openModal('modal-video')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                              </button>
                              <span class="dc-tb-sep"></span>
                              <button class="dc-tb-btn" title="Ordered List" onclick="insertList('ol')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="9" y1="6" x2="20" y2="6"/><line x1="9" y1="12" x2="20" y2="12"/><line x1="9" y1="18" x2="20" y2="18"/><path d="M4 6h1v4"/><path d="M4 10h2"/><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Unordered List" onclick="insertList('ul')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="9" y1="6" x2="20" y2="6"/><line x1="9" y1="12" x2="20" y2="12"/><line x1="9" y1="18" x2="20" y2="18"/><circle cx="4" cy="6" r="1.5" fill="currentColor"/><circle cx="4" cy="12" r="1.5" fill="currentColor"/><circle cx="4" cy="18" r="1.5" fill="currentColor"/></svg>
                              </button>
                              <span class="dc-tb-sep"></span>
                              <button class="dc-tb-btn" title="Inline Code" onclick="fmt('insertHTML','<code style=&quot;background:#f0faf5;border-radius:4px;padding:1px 5px;font-family:monospace;font-size:12px;color:#1a5c38;&quot;>code</code>')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Blockquote" onclick="fmt('formatBlock','blockquote')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1zm12 0c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Code Block" onclick="insertCodeBlock()">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/><line x1="12" y1="3" x2="12" y2="21" stroke-width="1.5"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Spoiler" onclick="insertSpoiler()">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                              </button>
                              <button class="dc-tb-btn" title="Insert Table" onclick="insertTable()">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
                              </button>
                              <a class="dc-tb-switch" href="#" onclick="toggleMarkdown(event)">Switch to Markdown</a>
                            </div>

                            <!-- Editor -->
                            <div id="dc-editor" class="dc-editor-area" contenteditable="true"
                              data-placeholder="Body text (optional)"></div>

                            <!-- Media bar -->
                            <div class="dc-media-bar">
                              <button class="dc-media-btn" onclick="openModal('modal-link')">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Link
                              </button>
                              <button class="dc-media-btn" onclick="openModal('modal-image')">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                Image
                              </button>
                              <button class="dc-media-btn" onclick="openModal('modal-video')">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                Video
                              </button>
                              <button class="dc-media-btn" onclick="insertList('ul')">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="9" y1="6" x2="20" y2="6"/><line x1="9" y1="12" x2="20" y2="12"/><line x1="9" y1="18" x2="20" y2="18"/><circle cx="4" cy="6" r="1.5" fill="currentColor"/><circle cx="4" cy="12" r="1.5" fill="currentColor"/><circle cx="4" cy="18" r="1.5" fill="currentColor"/></svg>
                                List
                              </button>
                              <button class="dc-media-btn" onclick="insertSpoiler()">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                Spoiler
                              </button>
                              <button class="dc-media-btn" onclick="insertCodeBlock()">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                                Code
                              </button>
                              <button class="dc-media-btn" onclick="insertTable()">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
                                Table
                              </button>
                              <button class="dc-media-btn" onclick="insertPollBuilder()">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                                Poll
                              </button>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div><!-- /left -->

                    <!-- RIGHT / SIDEBAR -->
                    <div>

                      <!-- Publish -->
                      <div class="dc-card dc-publish-card mb-5">
                        <div class="dc-card-bd">
                          <p class="dc-pub-title">Publish</p>
                          <p class="dc-pub-desc">Ready to share? Your post will be visible to the entire Paraverse community.</p>
                          <button class="dc-btn-publish" onclick="submitPost()">Publish Post</button>
                          <button class="dc-btn-discard" onclick="discardPost()">Discard</button>
                        </div>
                      </div>

                      <!-- Posting Tips -->
                      <div class="dc-card mb-5">
                        <div class="dc-card-bd">
                          <p class="dc-tips-title">Posting Tips</p>
                          <ul class="dc-tips-list">
                            <li><span class="dc-tip-arrow">→</span><span>Use <strong>anonymous mode</strong> for sensitive topics — your identity stays hidden.</span></li>
                            <li><span class="dc-tip-arrow">→</span><span>A great <strong>title</strong> drives more engagement. Be specific!</span></li>
                            <li><span class="dc-tip-arrow">→</span><span>Click <strong>Poll</strong> in the toolbar to attach a poll to your post.</span></li>
                            <li><span class="dc-tip-arrow">→</span><span>Tag the right <strong>community</strong> for better reach and discoverability.</span></li>
                          </ul>
                        </div>
                      </div>

                      <!-- Community Rules -->
                      <div class="dc-rules-card">
                        <p class="dc-rules-title">Community Rules</p>
                        <ul class="dc-rules-list">
                          <li>Be respectful and constructive</li>
                          <li>No personal attacks or harassment</li>
                          <li>Keep posts relevant to FEU Tech</li>
                          <li>Verify information before sharing</li>
                        </ul>
                      </div>

                    </div><!-- /sidebar -->

                  </div>
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

  <!-- ── Modals ── -->

  <!-- Link Modal -->
  <div class="dc-modal-overlay" id="modal-link">
    <div class="dc-modal">
      <button class="dc-modal-close" onclick="closeModal('modal-link')">&times;</button>
      <h4>Insert Link</h4>
      <div class="dc-modal-field">
        <label>Display Text</label>
        <input type="text" id="link-text" placeholder="Link text...">
      </div>
      <div class="dc-modal-field">
        <label>URL</label>
        <input type="url" id="link-url" placeholder="https://...">
      </div>
      <div class="dc-modal-btns">
        <button class="dc-modal-cancel" onclick="closeModal('modal-link')">Cancel</button>
        <button class="dc-modal-ok" onclick="insertLink()">Insert Link</button>
      </div>
    </div>
  </div>

  <!-- Image Modal -->
  <div class="dc-modal-overlay" id="modal-image">
    <div class="dc-modal">
      <button class="dc-modal-close" onclick="closeModal('modal-image')">&times;</button>
      <h4>Insert Image</h4>
      <div class="dc-modal-field">
        <label>Image URL</label>
        <input type="url" id="img-url" placeholder="https://example.com/image.jpg">
      </div>
      <div class="dc-modal-field">
        <label>Alt Text <span style="font-weight:400;text-transform:none;color:#a1a5b7;font-size:11px;">optional</span></label>
        <input type="text" id="img-alt" placeholder="Describe the image...">
      </div>
      <p style="font-size:12px;color:#a1a5b7;margin:0 0 10px;">Or upload a file:</p>
      <input type="file" id="img-file" accept="image/*" style="font-size:13px;">
      <div class="dc-modal-btns">
        <button class="dc-modal-cancel" onclick="closeModal('modal-image')">Cancel</button>
        <button class="dc-modal-ok" onclick="insertImage()">Insert Image</button>
      </div>
    </div>
  </div>

  <!-- Video Modal -->
  <div class="dc-modal-overlay" id="modal-video">
    <div class="dc-modal">
      <button class="dc-modal-close" onclick="closeModal('modal-video')">&times;</button>
      <h4>Embed Video</h4>
      <p>Paste a YouTube or direct video URL below.</p>
      <div class="dc-modal-field">
        <label>Video URL</label>
        <input type="url" id="video-url" placeholder="https://youtube.com/watch?v=...">
      </div>
      <div class="dc-modal-btns">
        <button class="dc-modal-cancel" onclick="closeModal('modal-video')">Cancel</button>
        <button class="dc-modal-ok" onclick="insertVideo()">Embed Video</button>
      </div>
    </div>
  </div>

  <script>
    // ── Tag input ──
    const tagInput = document.getElementById('tag-input');
    const tagWrap  = document.getElementById('tag-wrap');
    const tags = [];
    tagInput.addEventListener('keydown', e => {
      if ((e.key==='Enter'||e.key===',') && tagInput.value.trim()) {
        e.preventDefault();
        const v = tagInput.value.trim().replace(/,/g,'');
        if (v && !tags.includes(v)) { tags.push(v); renderTags(); }
        tagInput.value='';
      }
      if (e.key==='Backspace' && !tagInput.value && tags.length) { tags.pop(); renderTags(); }
    });
    function renderTags() {
      tagWrap.querySelectorAll('.dc-tag').forEach(t=>t.remove());
      tags.forEach((tag,i) => {
        const t = document.createElement('span'); t.className='dc-tag';
        t.innerHTML = tag+'<button class="dc-tag-x" type="button">&times;</button>';
        t.querySelector('.dc-tag-x').onclick = () => { tags.splice(i,1); renderTags(); };
        tagWrap.insertBefore(t, tagInput);
      });
    }

    // ── Editor helpers ──
    const editor = document.getElementById('dc-editor');
    function fmt(cmd, val=null) {
      editor.focus();
      document.execCommand(cmd, false, val);
    }

    function insertAtCursor(html) {
      editor.focus();
      const sel = window.getSelection();
      if (!sel.rangeCount) return;
      const range = sel.getRangeAt(0);
      range.deleteContents();
      const div = document.createElement('div');
      div.innerHTML = html;
      const frag = document.createDocumentFragment();
      let lastNode;
      while(div.firstChild){ lastNode = div.firstChild; frag.appendChild(div.firstChild); }
      range.insertNode(frag);
      if (lastNode) { const r2=range.cloneRange(); r2.setStartAfter(lastNode); r2.collapse(true); sel.removeAllRanges(); sel.addRange(r2); }
    }

    function insertList(type) {
      editor.focus();
      document.execCommand(type==='ol'?'insertOrderedList':'insertUnorderedList', false, null);
    }

    function insertCodeBlock() {
      insertAtCursor('<div class="dc-code-block" contenteditable="true" spellcheck="false">// Your code here...</div><p><br></p>');
    }

    function insertSpoiler() {
      insertAtCursor('<div class="dc-spoiler"><div class="dc-spoiler-label">⚠ Spoiler — click to reveal</div><div class="dc-spoiler-content" contenteditable="true">Hidden content here...</div></div><p><br></p>');
    }

    function insertTable() {
      const html = `<table class="dc-table-preview"><thead><tr>
        <th contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;background:#f0faf5;font-size:13px;">Header 1</th>
        <th contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;background:#f0faf5;font-size:13px;">Header 2</th>
        <th contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;background:#f0faf5;font-size:13px;">Header 3</th>
      </tr></thead><tbody>
        <tr>
          <td contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;font-size:13px;">Cell</td>
          <td contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;font-size:13px;">Cell</td>
          <td contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;font-size:13px;">Cell</td>
        </tr>
        <tr>
          <td contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;font-size:13px;">Cell</td>
          <td contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;font-size:13px;">Cell</td>
          <td contenteditable="true" style="border:1px solid #e4e6ef;padding:6px 10px;font-size:13px;">Cell</td>
        </tr>
      </tbody></table><p><br></p>`;
      insertAtCursor(html);
    }

    let pollCount = 0;
    function insertPollBuilder() {
      pollCount++;
      const id = 'poll-'+pollCount;
      const html = `<div class="dc-poll-builder" id="${id}">
        <div class="dc-poll-builder-title">
          <span>📊 Poll Options</span>
          <button onclick="document.getElementById('${id}').remove()" style="background:none;border:none;color:#a1a5b7;cursor:pointer;font-size:13px;">Remove</button>
        </div>
        <div class="dc-poll-opts">
          <div class="dc-poll-opt-row"><span style="color:#b5b5c3;cursor:grab;">⠿</span><input type="text" placeholder="Option 1"><button class="dc-poll-opt-del" onclick="this.parentElement.remove()">×</button></div>
          <div class="dc-poll-opt-row"><span style="color:#b5b5c3;cursor:grab;">⠿</span><input type="text" placeholder="Option 2"><button class="dc-poll-opt-del" onclick="this.parentElement.remove()">×</button></div>
        </div>
        <button class="dc-poll-add" onclick="addPollOpt('${id}')">+ Add option</button>
      </div><p><br></p>`;
      insertAtCursor(html);
    }

    function addPollOpt(id) {
      const wrap = document.querySelector('#'+id+' .dc-poll-opts');
      const n = wrap.querySelectorAll('.dc-poll-opt-row').length+1;
      const row = document.createElement('div'); row.className='dc-poll-opt-row';
      row.innerHTML = `<span style="color:#b5b5c3;cursor:grab;">⠿</span><input type="text" placeholder="Option ${n}"><button class="dc-poll-opt-del" onclick="this.parentElement.remove()">×</button>`;
      wrap.appendChild(row);
    }

    // ── Markdown toggle ──
    let mdMode = false;
    function toggleMarkdown(e) {
      e.preventDefault();
      mdMode = !mdMode;
      if (mdMode) {
        const md = editor.innerHTML
          .replace(/<b>(.*?)<\/b>/gi,'**$1**')
          .replace(/<i>(.*?)<\/i>/gi,'_$1_')
          .replace(/<br\s*\/?>/gi,'\n')
          .replace(/<[^>]+>/g,'')
          .replace(/&amp;/g,'&').replace(/&lt;/g,'<').replace(/&gt;/g,'>');
        editor.contentEditable = 'false';
        editor.style.display='none';
        let ta = document.getElementById('md-textarea');
        if (!ta) {
          ta = document.createElement('textarea');
          ta.id='md-textarea';
          ta.className='dc-input dc-textarea';
          ta.style.borderTop='1.5px solid var(--dc-border)';
          ta.style.borderRadius='0 0 8px 8px';
          editor.parentNode.insertBefore(ta, editor.nextSibling);
        }
        ta.value = md; ta.style.display='block';
        e.target.textContent='Switch to Visual';
      } else {
        const ta = document.getElementById('md-textarea');
        if (ta) { editor.innerHTML = ta.value.replace(/\n/g,'<br>'); ta.style.display='none'; }
        editor.contentEditable='true'; editor.style.display='block';
        e.target.textContent='Switch to Markdown';
      }
    }

    // ── Modals ──
    function openModal(id) { document.getElementById(id).classList.add('open'); }
    function closeModal(id) { document.getElementById(id).classList.remove('open'); }
    document.querySelectorAll('.dc-modal-overlay').forEach(m => {
      m.addEventListener('click', e => { if(e.target===m) m.classList.remove('open'); });
    });

    function insertLink() {
      const txt = document.getElementById('link-text').value || document.getElementById('link-url').value;
      const url = document.getElementById('link-url').value;
      if (!url) return;
      insertAtCursor(`<a href="${url}" target="_blank" style="color:#2D6A4F;font-weight:600;">${txt}</a>`);
      closeModal('modal-link');
      document.getElementById('link-text').value='';
      document.getElementById('link-url').value='';
    }

    function insertImage() {
      const file = document.getElementById('img-file').files[0];
      const url  = document.getElementById('img-url').value;
      const alt  = document.getElementById('img-alt').value || 'Image';
      if (file) {
        const reader = new FileReader();
        reader.onload = e => { insertAtCursor(`<img src="${e.target.result}" alt="${alt}" class="dc-img-inserted">`); };
        reader.readAsDataURL(file);
      } else if (url) {
        insertAtCursor(`<img src="${url}" alt="${alt}" class="dc-img-inserted">`);
      }
      closeModal('modal-image');
      document.getElementById('img-url').value='';
      document.getElementById('img-alt').value='';
      document.getElementById('img-file').value='';
    }

    function insertVideo() {
      let url = document.getElementById('video-url').value.trim();
      if (!url) return;
      // Convert YouTube watch URL to embed
      const ytMatch = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]{11})/);
      if (ytMatch) url = `https://www.youtube.com/embed/${ytMatch[1]}`;
      insertAtCursor(`<iframe class="dc-video-embed" src="${url}" allowfullscreen></iframe><p><br></p>`);
      closeModal('modal-video');
      document.getElementById('video-url').value='';
    }

    // ── Submit / Discard ──
    function submitPost() {
      const title = document.getElementById('post_title').value.trim();
      if (!title) {
        document.getElementById('post_title').style.borderColor='#e53935';
        document.getElementById('post_title').focus();
        return;
      }
      typeof KTApp !== 'undefined' && KTApp.showPageLoading();
      // TODO: AJAX submit
    }
    function discardPost() {
      if (confirm('Discard this post? Your changes will be lost.')) window.history.back();
    }

    function changeIdentity(event, text, avatarUrl) {
    event.preventDefault(); // Para hindi tumalon ang page sa taas pagka-click

    // 1. Palitan ang text at avatar na nakikita sa screen
    document.getElementById('display_identity_text').innerText = text;
    document.getElementById('display_identity_avatar').src = avatarUrl;

    // 2. Alisin ang 'active' class sa lumang pinili, at ilagay sa bagong click
    const links = document.querySelectorAll('#identityDropdown + .dropdown-menu .dropdown-item');
    links.forEach(link => link.classList.remove('active'));
    
    event.currentTarget.classList.add('active');
}
  </script>
</body>
</html>