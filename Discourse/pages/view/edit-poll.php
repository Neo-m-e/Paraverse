<?php
/* Refactored: custom CSS → Bootstrap/Metronic utilities */
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);
// $SQL = "SELECT * FROM polls WHERE slug = ?";

$META_TITLE = "Edit Poll";
$META_DESC  = "Edit your existing poll.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/Discourse/assets/css/dashboard.css" rel="stylesheet">
  <style>
    /* ── Toggle switch: no Bootstrap equivalent for custom range slider ── */
    .dc-toggle {
      position: relative;
      width: 40px;
      height: 22px;
      flex-shrink: 0;
    }

    .dc-toggle input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .dc-toggle-slider {
      position: absolute;
      inset: 0;
      background: #e4e6ef;
      border-radius: 22px;
      cursor: pointer;
      transition: background .2s;
    }

    .dc-toggle-slider:before {
      content: '';
      position: absolute;
      width: 16px;
      height: 16px;
      background: #fff;
      border-radius: 50%;
      top: 3px;
      left: 3px;
      transition: transform .2s;
      box-shadow: 0 1px 4px rgba(0, 0, 0, .15);
    }

    .dc-toggle input:checked+.dc-toggle-slider {
      background: #2D6A4F;
    }

    .dc-toggle input:checked+.dc-toggle-slider:before {
      transform: translateX(18px);
    }
  </style>
</head>

<body id="kt_app_body"
  data-kt-app-page-loading-enabled="true"
  data-kt-app-page-loading="on"
  data-kt-app-layout="light-header"
  data-kt-app-header-fixed="true"
  data-kt-app-header-fixed-mobile="true"
  class="app-default">

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

      <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_header.php'); ?>

      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>

              <div style="background: linear-gradient(135deg, #0b3220 0%, #1a5c38 60%, #2D6A4F 100%); padding: 30px 0;">
                <div class="app-container container-xxl">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <div class="d-flex align-items-center gap-2 mb-1">
                        <i class="bi bi-pencil-square text-white opacity-75 fs-6"></i>
                        <span class="text-white opacity-75 fs-8 fw-bold text-uppercase ls-1">Editing Poll</span>
                      </div>
                      <h2 class="text-white fs-2 fw-bolder mb-1">Edit Poll</h2>
                      <p class="text-white opacity-65 fs-6 mb-0">Update your poll question, options, or settings.</p>
                    </div>
                    <div>
                      <a href="javascript:history.back();" class="btn btn-sm btn-light fw-bold">
                        <i class="bi bi-arrow-left me-1"></i> Back
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl">
                  <div class="row g-5 align-items-start py-5">

                    <div class="col-lg-8">
                      <div class="card border-0 shadow-sm">

                        <div class="card-header border-0 bg-light py-4">
                          <div class="d-flex align-items-center gap-3 w-100">
                            <div class="bg-light-success rounded-2 p-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                              <i class="bi bi-bar-chart text-success fs-6"></i>
                            </div>
                            <h5 class="card-title mb-0 fw-bold fs-6">Edit Poll</h5>
                          </div>
                        </div>

                        <div class="card-body p-5">

                          <div class="mb-5">
                            <label class="form-label text-uppercase fw-bold text-gray-600 fs-8">
                              Poll Question / Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" id="poll_title"
                              value="What's the hardest part of the CS program at FEU Tech?">
                          </div>

                          <div class="mb-5">
                            <label class="form-label text-uppercase fw-bold text-gray-600 fs-8">Context</label>
                            <textarea class="form-control form-control-solid" id="poll_context" style="min-height:70px;">Been talking to a lot of classmates lately and everyone seems to struggle with different things. Curious what the community thinks — drop your vote below!</textarea>
                          </div>

                          <div class="mb-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                              <span class="text-uppercase fw-bold text-gray-600 fs-8">Current Vote Results</span>
                              <span class="fs-8 text-muted">Votes shown are locked — options cannot be deleted</span>
                            </div>

                            <div class="d-flex align-items-center gap-2 p-3 bg-light border rounded-3 mb-2" id="opt-0">
                              <span class="text-muted fs-6" style="cursor:grab;">⠿</span>
                              <input type="text" class="form-control form-control-solid flex-grow-1" value="Math subjects (Calculus, Discrete Math)">
                              <span class="text-muted fs-8 fw-semibold text-nowrap">41 votes</span>
                              <button class="btn btn-sm btn-icon btn-light" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div class="d-flex align-items-center gap-2 p-3 bg-light border rounded-3 mb-2" id="opt-1">
                              <span class="text-muted fs-6" style="cursor:grab;">⠿</span>
                              <input type="text" class="form-control form-control-solid flex-grow-1" value="Programming fundamentals in 1st year">
                              <span class="text-muted fs-8 fw-semibold text-nowrap">28 votes</span>
                              <button class="btn btn-sm btn-icon btn-light" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div class="d-flex align-items-center gap-2 p-3 bg-light border rounded-3 mb-2" id="opt-2">
                              <span class="text-muted fs-6" style="cursor:grab;">⠿</span>
                              <input type="text" class="form-control form-control-solid flex-grow-1" value="Thesis / capstone requirements">
                              <span class="text-muted fs-8 fw-semibold text-nowrap">89 votes</span>
                              <button class="btn btn-sm btn-icon btn-light" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div class="d-flex align-items-center gap-2 p-3 bg-light border rounded-3 mb-2" id="opt-3">
                              <span class="text-muted fs-6" style="cursor:grab;">⠿</span>
                              <input type="text" class="form-control form-control-solid flex-grow-1" value="Balancing acads with org life">
                              <span class="text-muted fs-8 fw-semibold text-nowrap">47 votes</span>
                              <button class="btn btn-sm btn-icon btn-light" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div id="new-options-wrap"></div>

                            <button class="btn btn-light-success w-100 fw-bold border border-dashed border-success mt-2" onclick="addPollOption()" type="button">
                              <i class="ki-duotone ki-plus fs-5 me-1"><span class="path1"></span><span class="path2"></span></i>
                              Add another option
                            </button>

                            <div class="alert alert-warning d-flex align-items-start gap-2 mt-4 mb-0">
                              <i class="bi bi-info-circle-fill text-warning flex-shrink-0 mt-1"></i>
                              <span class="fs-7">You can <strong>rename poll options</strong> and add new ones. Existing vote counts are preserved. You cannot remove an option that already has votes cast for it.</span>
                            </div>
                          </div>

                          <div class="mb-5">
                            <div class="row g-4">
                              <div class="col-sm-6">
                                <label class="form-label text-uppercase fw-bold text-gray-600 fs-8">Poll Duration</label>
                                <select class="form-select form-select-solid" id="poll_duration">
                                  <option>1 day</option>
                                  <option>3 days</option>
                                  <option selected>5 days</option>
                                  <option>7 days</option>
                                  <option>14 days</option>
                                  <option>30 days</option>
                                  <option>No limit</option>
                                </select>
                                <small class="text-muted d-block mt-1 fs-8">Time remaining when you save</small>
                              </div>
                              <div class="col-sm-6">
                                <label class="form-label text-uppercase fw-bold text-gray-600 fs-8">Allow Multiple Votes</label>
                                <div class="d-flex align-items-center justify-content-between p-3 bg-light border rounded-3">
                                  <div>
                                    <span class="fs-6 fw-semibold text-gray-800 d-block">Single choice</span>
                                    <span class="fs-8 text-muted">Allow only one vote</span>
                                  </div>
                                  <label class="dc-toggle mb-0">
                                    <input type="checkbox" id="multi_vote">
                                    <span class="dc-toggle-slider"></span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="mt-5">
                            <div class="p-1">
                              <h6 class="text-uppercase fw-bold text-gray-600 fs-8 mb-4 d-flex align-items-center gap-2">
                                <i class="bi bi-clock text-gray-600"></i> Edit History
                              </h6>

                              <div class="d-flex align-items-center gap-3 py-2">
                                <span class="rounded-circle bg-success flex-shrink-0" style="width: 8px; height: 8px; display: inline-block;"></span>
                                <div>
                                  <span class="fw-bold text-gray-900 fs-7">New</span>
                                  <span class="text-muted fs-8"> — current version being edited</span>
                                </div>
                              </div>

                              <div class="d-flex align-items-center gap-3 py-2">
                                <span class="rounded-circle bg-gray-400 flex-shrink-0" style="width: 8px; height: 8px; display: inline-block; background-color: #a1a5b7 !important;"></span>
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

                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5">
                          <p class="fs-6 text-gray-600 mb-5">Your edits will be visible to everyone in the community.</p>
                          <button class="btn btn-success w-100 fw-bold" onclick="savePoll()">
                            <i class="bi bi-check-lg me-1"></i> Save Changes
                          </button>
                          <button class="btn btn-light w-100 fw-bold mt-3" onclick="history.back()">Cancel</button>
                        </div>
                      </div>

                      <div class="card border-0 bg-light mb-5">
                        <div class="card-body p-5">
                          <h6 class="text-uppercase fw-bold text-gray-600 fs-8 mb-4 d-flex align-items-center gap-2">
                            <i class="bi bi-bar-chart text-gray-600"></i> Poll State
                          </h6>
                          <div class="d-flex justify-content-between align-items-center py-3 border-bottom border-gray-200">
                            <span class="fs-7 text-muted">Total votes</span>
                            <span class="fs-7 fw-bold text-gray-800">225</span>
                          </div>
                          <div class="d-flex justify-content-between align-items-center py-3 border-bottom border-gray-200">
                            <span class="fs-7 text-muted">Options</span>
                            <span class="fs-7 fw-bold text-gray-800">4</span>
                          </div>
                          <div class="d-flex justify-content-between align-items-center py-3 border-bottom border-gray-200">
                            <span class="fs-7 text-muted">Leading option</span>
                            <span class="fs-7 fw-bold text-gray-800">Thesis/Capstone</span>
                          </div>
                          <div class="d-flex justify-content-between align-items-center py-3">
                            <span class="fs-7 text-muted">Time left</span>
                            <span class="fs-7 fw-bold text-gray-800">2 days left</span>
                          </div>
                        </div>
                      </div>

                      <div class="card border border-danger mb-5" style="background:#fff5f5;">
                        <div class="card-body p-5">
                          <h6 class="text-uppercase fw-bold text-danger fs-8 mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill"></i> Danger Zone
                          </h6>
                          <p class="fs-7 text-muted mb-4">Permanently remove this post and all its contents. This cannot be undone.</p>
                          <button class="btn btn-light-danger w-100 fw-bold" onclick="confirmDelete()">
                            <i class="bi bi-trash me-1"></i> Delete Post
                          </button>
                        </div>
                      </div>

                      <div class="card border-0 shadow-sm mb-5">
  <div class="card-header border-0 bg-light py-4 ps-7">
    <div class="d-flex align-items-center gap-3 w-100">
      <div class="bg-light-success rounded-2 p-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
        <i class="bi bi-info-circle text-success fs-6"></i>
      </div>
      <h5 class="card-title mb-0 fw-bold fs-6">Edit Guidelines</h5>
    </div>
  </div>
  <div class="card-body p-5">
    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
      <li class="d-flex align-items-start gap-2 fs-7 text-gray-600"><span class="fw-bold flex-shrink-0 text-success">✓</span><span>Keep your <strong>title</strong> clear and informative for better discoverability</span></li>
      <li class="d-flex align-items-start gap-2 fs-7 text-gray-600"><span class="fw-bold flex-shrink-0 text-success">✓</span><span>Substantial edits may be <strong>flagged</strong> to show the post was modified</span></li>
      <li class="d-flex align-items-start gap-2 fs-7 text-gray-600"><span class="fw-bold flex-shrink-0 text-success">✓</span><span>You can <strong>delete</strong> a post from the danger zone if needed</span></li>
      <li class="d-flex align-items-start gap-2 fs-7 text-gray-600"><span class="fw-bold flex-shrink-0 text-success">✓</span><span>For polls, only option labels can be changed; votes already cast remain valid</span></li>
    </ul>
  </div>
</div>
                      <div class="card border border-success bg-light-success">
                        <div class="card-body p-5">
                          <p class="fs-6 fw-bold text-success mb-3">Community Rules</p>
                          <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span><span>Be respectful and constructive</span></li>
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span><span>No personal attacks or harassment</span></li>
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span><span>Keep posts relevant to FEU Tech</span></li>
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span><span>Verify information before sharing</span></li>
                          </ul>
                        </div>
                      </div>

                    </div>
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

  <script>
    let newOptionCount = 0;

    function addPollOption() {
      newOptionCount++;
      const wrap = document.getElementById('new-options-wrap');
      const row = document.createElement('div');
      row.className = 'd-flex align-items-center gap-2 p-3 bg-light border rounded-3 mb-2';
      row.id = 'new-opt-' + newOptionCount;
      row.innerHTML = `
        <span class="text-muted fs-6" style="cursor:grab;">⠿</span>
        <input type="text" class="form-control form-control-solid flex-grow-1" placeholder="New option ${newOptionCount}...">
        <span class="text-muted fs-8 fw-semibold text-nowrap">0 votes</span>
        <button class="btn btn-sm btn-icon btn-light-danger" title="Remove option" onclick="removeOption('new-opt-${newOptionCount}')" type="button">
          <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
        </button>
      `;
      wrap.appendChild(row);
      row.querySelector('input').focus();
    }

    function removeOption(id) {
      const el = document.getElementById(id);
      if (el) el.remove();
    }

    function savePoll() {
      const title = document.getElementById('poll_title').value.trim();
      if (!title) {
        document.getElementById('poll_title').focus();
        return;
      }
      KTApp && KTApp.showPageLoading();
      // TODO: AJAX save
    }

    function confirmDelete() {
      if (confirm('Are you sure you want to permanently delete this poll? This cannot be undone.')) {
        KTApp && KTApp.showPageLoading();
        // TODO: AJAX delete
      }
    }
  </script>
</body>

</html>