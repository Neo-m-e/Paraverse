<?php
if (!defined('MBG')) define('MBG', TRUE);
include_once($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$post = [
  'id'        => $post_id > 0 ? $post_id : 1,
  'title'     => 'The silent revolution in edge AI — why on-device inference is changing everything',
  'body'      => 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat.',
  'image_url' => '',
];

$META_TITLE = "Edit Post - " . htmlspecialchars($post['title']);

/* Initials */
$name_parts = explode(' ', $ACCOUNT['display_name'] ?? 'Yourself');
$initials = '';
foreach ($name_parts as $part) {
    $initials .= strtoupper(substr($part, 0, 1));
}
$initials = substr($initials, 0, 2);
if (empty($initials)) {
    $initials = 'Y';
}
?>

<head>
  <title><?php echo $META_TITLE; ?></title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/x-icon" href="/Discourse/assets/img/favicon.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

  <!-- Metronic Core CSS -->
  <link rel="stylesheet" href="/Discourse/assets/plugins/global/plugins.bundle.css">
  <link rel="stylesheet" href="/Discourse/assets/css/style.keenicons.css">
  <link rel="stylesheet" href="/Discourse/assets/css/style.bundle.v2.full.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="/Discourse/assets/css/sec-modals.css?v=1.0.1" rel="stylesheet">

  <!-- jQuery -->
  <script src="/Discourse/assets/js/jquery.js"></script>

  <link href="/Discourse/assets/css/discourse-css/create-post.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/dc-editor.css" rel="stylesheet">
</head>

<body id="kt_app_body"
  data-kt-app-page-loading-enabled="true"
  data-kt-app-page-loading="on"
  data-kt-app-layout="light-header"
  class="app-default">

  <?php include(dirname(__DIR__) . '/partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

      <?php include(dirname(__DIR__) . '/partials/_header.php'); ?>

      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>

              <!-- Banner -->
              <div class="page-banner w-100 py-10 mb-8">
                <div class="app-container container-xxl d-flex align-items-center justify-content-between">
                  <div>
                    <span class="text-yellow fw-bold fs-8 text-uppercase tracking-wider mb-1 d-block">EDITING POST</span>
                    <h1 class="text-white fw-bolder fs-2tx mb-2">Edit Post</h1>
                    <p class="text-white text-opacity-75 fs-7 mb-0">Make changes to your existing post</p>
                  </div>
                  <button class="btn btn-sm btn-outline btn-outline-white text-white border-white border-opacity-25 px-6" onclick="window.location.href='/Discourse/index.php'">Back</button>
                </div>
              </div>

              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl pb-10">
                  <form id="editPostForm" action="/Discourse/posts/index-ajax-update-post.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <input type="hidden" name="body" id="body-hidden">
                    <input type="hidden" name="remove_image" id="remove-image-hidden" value="0">
                    <div class="row g-6">

                      <div class="col-lg-8">
                        <div class="card border border-gray-300 shadow-none rounded-2">

                          <div class="card-body p-8">

                            <div class="d-flex align-items-center justify-content-between mb-8">
                              <div class="d-flex align-items-center gap-3">
                                <div id="community-preview-icon" class="w-25px h-25px bg-light-success rounded d-flex align-items-center justify-content-center" style="background-color: rgba(23, 198, 83, 0.12) !important; color: #17c653 !important;">
                                  <i class="bi bi-pencil-fill fs-7" style="color: #17c653 !important;"></i>
                                </div>
                                <h3 class="fw-bolder text-dark fs-4 m-0">Post Content</h3>
                              </div>
                              <div id="identity-badge" class="d-flex align-items-center gap-2 bg-light-success px-4 py-2 rounded" style="background-color: rgba(23, 198, 83, 0.12) !important; border: 1px solid rgba(23, 198, 83, 0.2) !important;">
                                <div id="identity-avatar" class="w-15px h-15px bg-success rounded-circle text-white d-flex align-items-center justify-content-center fs-9" style="background-color: #17c653 !important; color: #fff !important;"><?php echo htmlspecialchars($initials); ?></div>
                                <span id="identity-text" class="text-success fw-bold fs-8" style="color: #17c653 !important;">Posting as <?php echo htmlspecialchars($ACCOUNT['display_name'] ?? 'yourself'); ?></span>
                              </div>
                            </div>

                            <div class="alert alert-warning d-flex align-items-center gap-2 mb-5">
                              <i class="bi bi-exclamation-triangle-fill text-warning flex-shrink-0"></i>
                              <span class="fs-7">Editing a post will mark it as <strong>edited</strong> with a timestamp visible to all readers. Significant changes to meaning are discouraged.</span>
                            </div>

                            <div class="mb-5">
                              <label class="form-label text-uppercase fw-bold text-gray-600 fs-8">
                                Title <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control form-control-solid" id="edit_title" name="title"
                                value="<?php echo htmlspecialchars($post['title']); ?>" required>
                            </div>

                            <div class="mb-5">
                              <label class="form-label text-uppercase fw-bold text-gray-600 fs-8">
                                Body <span class="text-muted fw-normal fs-8" style="text-transform:none;letter-spacing:0;">— optional</span>
                              </label>
                              <div class="dc-toolbar" id="edit-toolbar">
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Bold" onclick="fmt('bold')"><b>B</b></button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" title="Italic" onclick="fmt('italic')">
                                  <i style="font-style:italic;color:#3a5c45;">I</i>
                                </button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Strikethrough" onclick="fmt('strikeThrough')"><s>S</s></button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Superscript" onclick="fmt('superscript')">x<sup>2</sup></button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Paragraph" onclick="fmt('formatBlock','p')">¶T</button>
                                <span class="dc-tb-sep"></span>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Ordered List" onclick="insertList('ol')">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <path d="M4 6h1v4" />
                                    <path d="M4 10h2" />
                                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1" />
                                  </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Unordered List" onclick="insertList('ul')">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <circle cx="4" cy="6" r="1.5" fill="currentColor" />
                                    <circle cx="4" cy="12" r="1.5" fill="currentColor" />
                                    <circle cx="4" cy="18" r="1.5" fill="currentColor" />
                                  </svg>
                                </button>
                                <span class="dc-tb-sep"></span>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Inline Code" onclick="insertInlineCode()">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="16 18 22 12 16 6" />
                                    <polyline points="8 6 2 12 8 18" />
                                  </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Blockquote" onclick="fmt('formatBlock','blockquote')">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1zm12 0c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                                  </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Code Block" onclick="insertCodeBlock()">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="16 18 22 12 16 6" />
                                    <polyline points="8 6 2 12 8 18" />
                                    <line x1="12" y1="3" x2="12" y2="21" stroke-width="1.5" />
                                  </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Spoiler" onclick="insertSpoiler()">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                                    <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                  </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-icon btn-light-success" style="background-color:#e8ede9;color:#3a5c45;" title="Insert Table" onclick="insertTable()">
                                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <line x1="3" y1="9" x2="21" y2="9" />
                                    <line x1="3" y1="15" x2="21" y2="15" />
                                    <line x1="9" y1="3" x2="9" y2="21" />
                                    <line x1="15" y1="3" x2="15" y2="21" />
                                  </svg>
                                </button>
                                <a class="dc-tb-switch" href="#" onclick="toggleMarkdown(event)">Switch to Markdown</a>
                              </div>

                              <div id="edit_body_editor" class="dc-editor-area" contenteditable="true"
                                data-placeholder="Body text (optional)"
                                style="height:300px !important;overflow-y:auto !important;border-bottom:1.5px solid #e4e6ef !important;border-radius:0 0 8px 8px !important;"><?php echo $post['body']; ?></div>
                            </div>
                            <div class="mt-5">
                              <div class="p-1">
                                <h6 class="text-uppercase fw-bold text-gray-600 fs-8 mb-4 d-flex align-items-center gap-2">
                                  <i class="bi bi-clock text-gray-600"></i> Edit History
                                </h6>

                                <div class="d-flex align-items-center gap-3 py-2">
                                  <span class="rounded-circle flex-shrink-0" style="width:8px;height:8px;display:inline-block;background-color:#3a5c45;"></span>
                                  <div>
                                    <span class="fw-bold text-gray-900 fs-7">New</span>
                                    <span class="text-muted fs-8"> — current version being edited</span>
                                  </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 py-2">
                                  <span class="rounded-circle bg-gray-400 flex-shrink-0" style="width: 8px; height: 8px;"></span>
                                  <div>
                                    <span class="fw-bold text-gray-600 fs-7">Original</span>
                                    <span class="text-muted fs-8"> — published version</span>
                                  </div>
                                </div>

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">

                        <div class="card card-publish mb-6 shadow-none">
                          <div class="card-body p-6">
                            <h5 class="fw-bolder text-dark mb-3 fs-5">Publish Edits</h5>
                            <p class="text-muted fs-8 mb-6">Your edits will be visible to everyone in the community.</p>
                            <button class="btn w-100 btn-green mb-3 fw-bold" onclick="savePost()">
                              <i class="bi bi-send me-1"></i> Save Changes
                            </button>
                            <button class="btn w-100 btn-light bg-white border border-gray-300 text-dark fw-bold" onclick="history.back()">Cancel</button>
                          </div>
                        </div>

                        <div class="card border border-danger mb-6 shadow-none" style="background:#fff5f5; border-radius: 8px;">
                          <div class="card-body p-6">
                            <h6 class="text-uppercase fw-bold text-danger fs-8 mb-3 d-flex align-items-center gap-2">
                              <i class="bi bi-exclamation-triangle-fill"></i> Danger Zone
                            </h6>
                            <p class="fs-8 text-muted mb-4">Permanently remove this post and all its comments. This cannot be undone.</p>
                            <button class="btn btn-light-danger w-100 fw-bold fs-8" onclick="confirmDelete()">
                              <i class="bi bi-trash me-1"></i> Delete Post
                            </button>
                          </div>
                        </div>

                        <div class="card rules-card shadow-none">
                          <div class="card-body p-6">
                            <h5 class="fw-bolder text-dark mb-4 fs-6">Edit Guidelines</h5>
                            <div class="d-flex flex-column gap-3">
                              <div class="d-flex align-items-center gap-2">
                                <i class="ki-duotone ki-check fs-8"><span class="path1"></span><span class="path2"></span></i>
                                <span class="text-dark fs-8">Keep your <strong>title</strong> clear and informative</span>
                              </div>
                              <div class="d-flex align-items-center gap-2">
                                <i class="ki-duotone ki-check fs-8"><span class="path1"></span><span class="path2"></span></i>
                                <span class="text-dark fs-8">Substantial edits will be marked as edited</span>
                              </div>
                              <div class="d-flex align-items-center gap-2">
                                <i class="ki-duotone ki-check fs-8"><span class="path1"></span><span class="path2"></span></i>
                                <span class="text-dark fs-8">Verify information before updating</span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </form>
                </div>
              </div>

            </main>
          </div>
          <?php include(dirname(__DIR__) . '/partials/_footer.php'); ?>
        </div>
      </div>
    </div>
  </div>

  <?php include(dirname(__DIR__) . '/partials/_scrolltop.php'); ?>




  <script>
    window.DC_EDITOR_ID = 'edit_body_editor';
  </script>
  <script src="/Discourse/assets/js/dc-editor.js"></script>
  <script>
    window.savePost = function() {
      var titleInput = document.getElementById('edit_title');
      if (!titleInput || !titleInput.value.trim()) {
        alert('Please enter a post title.');
        if (titleInput) titleInput.focus();
        return;
      }

      // Sync editor contents to hidden textarea
      var editor = document.getElementById('edit_body_editor');
      var bodyHidden = document.getElementById('body-hidden');
      if (editor && bodyHidden) {
        bodyHidden.value = typeof window.getEditorHtml === 'function' ? window.getEditorHtml() : editor.innerHTML;
      }

      if (typeof KTApp !== 'undefined') KTApp.showPageLoading();
      document.getElementById('editPostForm').submit();
    };



    window.confirmDelete = function() {
      var postId = <?php echo $post['id']; ?>;
      if (confirm('Are you sure you want to permanently delete this post? This cannot be undone.')) {
        if (typeof KTApp !== 'undefined') KTApp.showPageLoading();
        $.ajax({
          url: '/Discourse/posts/index-ajax-delete-post.php',
          method: 'POST',
          data: {
            id: postId
          },
          dataType: 'json',
          success: function(res) {
            if (res.status === 'success') {
              alert(res.message);
              window.location.href = '/Discourse/index.php';
            } else {
              if (typeof KTApp !== 'undefined') KTApp.hidePageLoading();
              alert(res.message || 'Failed to delete post.');
            }
          },
          error: function() {
            if (typeof KTApp !== 'undefined') KTApp.hidePageLoading();
            alert('Error communicating with database.');
          }
        });
      }
    };
  </script>
</body>