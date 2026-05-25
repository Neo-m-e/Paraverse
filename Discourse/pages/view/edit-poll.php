<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

// $SQL = "SELECT * FROM polls WHERE slug = ?";
// ... fetch poll record ...

$META_TITLE = "Edit Poll";
$META_DESC = "Edit your existing poll.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <style>
    /* ── Shared tokens ────────────────────────────────────── */
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
      min-height: 80px;
      resize: vertical;
    }

    .dc-select {
      appearance: none;
      -webkit-appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%235e6278' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      padding-right: 38px;
      cursor: pointer;
    }

    .dc-field {
      margin-bottom: 18px;
    }

    .dc-field:last-child {
      margin-bottom: 0;
    }

    /* ── Poll Options ──────────────────────────────────────── */
    .dc-poll-options-label {
      font-size: 11.5px;
      font-weight: 700;
      color: #5e6278;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .dc-poll-options-label span {
      font-size: 11px;
      color: #a1a5b7;
      font-weight: 500;
      text-transform: none;
      letter-spacing: 0;
    }

    .dc-poll-option-row {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      background: #f5f6fa;
      border: 1.5px solid #e4e6ef;
      border-radius: 10px;
      margin-bottom: 8px;
      transition: border-color 0.15s;
    }

    .dc-poll-option-row:focus-within {
      border-color: #2D6A4F;
      background: #f0faf5;
    }

    .dc-poll-option-drag {
      color: #b5b5c3;
      cursor: grab;
      font-size: 16px;
      flex-shrink: 0;
    }

    .dc-poll-option-input {
      flex: 1;
      border: none;
      background: transparent;
      font-size: 13.5px;
      color: #1a1a2e;
      outline: none;
      font-family: inherit;
    }

    .dc-poll-option-input::placeholder {
      color: #b5b5c3;
    }

    .dc-poll-option-votes {
      font-size: 11.5px;
      font-weight: 600;
      color: #a1a5b7;
      min-width: 40px;
      text-align: right;
    }

    .dc-poll-option-del {
      background: none;
      border: none;
      color: #b5b5c3;
      cursor: pointer;
      padding: 3px 5px;
      border-radius: 5px;
      font-size: 12px;
      transition: all 0.14s;
      flex-shrink: 0;
    }

    .dc-poll-option-del:hover {
      background: #fee;
      color: #c62828;
    }

    /* Winning option highlight */
    .dc-poll-option-row.dc-leading {
      border-color: #2D6A4F;
      background: #f0faf5;
    }

    /* ── Add option button ─────────────────────────────────── */
    .dc-add-option-btn {
      background: none;
      border: 1.5px dashed #a5d6a7;
      border-radius: 10px;
      padding: 9px 16px;
      font-size: 13px;
      font-weight: 600;
      color: #2D6A4F;
      cursor: pointer;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      transition: all 0.15s;
    }

    .dc-add-option-btn:hover {
      background: #e8f5e9;
      border-style: solid;
    }

    /* ── Poll notice (read-only votes warning) ─────────────── */
    .dc-poll-notice {
      background: #fff8e1;
      border: 1px solid #ffe082;
      border-radius: 10px;
      padding: 11px 16px;
      font-size: 12px;
      color: #795548;
      display: flex;
      align-items: flex-start;
      gap: 8px;
      margin-top: 14px;
    }

    .dc-poll-notice i {
      color: #f5a623;
      flex-shrink: 0;
      margin-top: 1px;
    }

    /* ── Duration row ──────────────────────────────────────── */
    .dc-row-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    @media (max-width: 600px) {
      .dc-row-2 {
        grid-template-columns: 1fr;
      }
    }

    /* ── Toggle switch ─────────────────────────────────────── */
    .dc-toggle-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 14px;
      background: #f9fafb;
      border: 1.5px solid #e4e6ef;
      border-radius: 8px;
    }

    .dc-toggle-label {
      font-size: 13px;
      font-weight: 600;
      color: #1a1a2e;
    }

    .dc-toggle-sub {
      font-size: 11.5px;
      color: #a1a5b7;
      display: block;
    }

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
      transition: background 0.2s;
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
      transition: transform 0.2s;
      box-shadow: 0 1px 4px rgba(0,0,0,0.15);
    }

    .dc-toggle input:checked + .dc-toggle-slider {
      background: #2D6A4F;
    }

    .dc-toggle input:checked + .dc-toggle-slider:before {
      transform: translateX(18px);
    }

    /* ── Save/Cancel/Delete (same as edit-post) ────────────── */
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

    /* ── Poll Stats Card ───────────────────────────────────── */
    .dc-poll-stats {
      background: #f9fafb;
      border: 1px solid #e4e6ef;
      border-radius: 12px;
      padding: 16px 18px;
      margin-bottom: 16px;
    }

    .dc-poll-stats h6 {
      font-size: 11.5px;
      font-weight: 700;
      color: #5e6278;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      margin-bottom: 12px;
    }

    .dc-stat-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 0;
      border-bottom: 1px dashed #e4e6ef;
      font-size: 12.5px;
    }

    .dc-stat-row:last-child {
      border-bottom: none;
    }

    .dc-stat-label {
      color: #7e8299;
    }

    .dc-stat-val {
      font-weight: 700;
      color: #1a1a2e;
    }

    .dc-stat-val.text-success {
      color: #2D6A4F !important;
    }

    /* ── Rules / Guidelines ────────────────────────────────── */
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

    /* ── History Card ──────────────────────────────────────── */
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
                      <span class="label-badge">Editing Poll</span>
                      <h2>Edit Poll</h2>
                      <p>Update your poll question, options, or settings.</p>
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

                    <!-- LEFT: Poll Edit Form -->
                    <div>
                      <div class="dc-card">
                        <div class="dc-card-header">
                          <div class="dc-card-icon">
                            <i class="ki-duotone ki-chart-simple fs-5"><span class="path1"></span><span class="path2"></span></i>
                          </div>
                          <h5>Edit Poll</h5>
                        </div>
                        <div class="dc-card-body">

                          <!-- Poll Question / Title -->
                          <div class="dc-field">
                            <label class="dc-label">Poll Question / Title <span style="color:#e53935;">*</span></label>
                            <input type="text" class="dc-input" id="poll_title"
                              value="What's the hardest part of the CS program at FEU Tech?">
                          </div>

                          <!-- Context -->
                          <div class="dc-field">
                            <label class="dc-label">Context</label>
                            <textarea class="dc-input dc-textarea" id="poll_context" style="min-height:70px;">Been talking to a lot of classmates lately and everyone seems to struggle with different things. Curious what the community thinks — drop your vote below!</textarea>
                          </div>

                          <!-- Current Vote Results -->
                          <div class="dc-field">
                            <div class="dc-poll-options-label">
                              Current Vote Results
                              <span>Votes shown are locked — options cannot be deleted</span>
                            </div>

                            <div class="dc-poll-option-row" id="opt-0">
                              <span class="dc-poll-option-drag">⠿</span>
                              <input class="dc-poll-option-input" type="text" value="Math subjects (Calculus, Discrete Math)">
                              <span class="dc-poll-option-votes text-muted">41 votes</span>
                              <button class="dc-poll-option-del" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div class="dc-poll-option-row" id="opt-1">
                              <span class="dc-poll-option-drag">⠿</span>
                              <input class="dc-poll-option-input" type="text" value="Programming fundamentals in 1st year">
                              <span class="dc-poll-option-votes text-muted">28 votes</span>
                              <button class="dc-poll-option-del" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div class="dc-poll-option-row dc-leading" id="opt-2">
                              <span class="dc-poll-option-drag">⠿</span>
                              <input class="dc-poll-option-input" type="text" value="Thesis / capstone requirements">
                              <span class="dc-poll-option-votes" style="color:#2D6A4F; font-weight:700;">89 votes</span>
                              <button class="dc-poll-option-del" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <div class="dc-poll-option-row" id="opt-3">
                              <span class="dc-poll-option-drag">⠿</span>
                              <input class="dc-poll-option-input" type="text" value="Balancing acads with org life">
                              <span class="dc-poll-option-votes text-muted">47 votes</span>
                              <button class="dc-poll-option-del" title="Remove option" disabled style="opacity:0.35;cursor:not-allowed;">
                                <i class="ki-duotone ki-cross fs-6"><span class="path1"></span><span class="path2"></span></i>
                              </button>
                            </div>

                            <!-- Add new option -->
                            <div id="new-options-wrap"></div>
                            <button class="dc-add-option-btn" onclick="addPollOption()" type="button">
                              <i class="ki-duotone ki-plus fs-5"><span class="path1"></span><span class="path2"></span></i>
                              Add another option
                            </button>

                            <div class="dc-poll-notice">
                              <i class="ki-duotone ki-information-2 fs-5"><span class="path1"></span><span class="path2"></span></i>
                              <span>You can <strong>rename poll options</strong> and add new ones. Existing vote counts are preserved. You cannot remove an option that already has votes cast for it.</span>
                            </div>
                          </div>

                          <!-- Poll Duration + Multiple Votes -->
                          <div class="dc-field">
                            <div class="dc-row-2">
                              <div>
                                <label class="dc-label">Poll Duration</label>
                                <select class="dc-select" id="poll_duration">
                                  <option>1 day</option>
                                  <option>3 days</option>
                                  <option selected>5 days</option>
                                  <option>7 days</option>
                                  <option>14 days</option>
                                  <option>30 days</option>
                                  <option>No limit</option>
                                </select>
                                <small class="text-muted d-block mt-1" style="font-size:11px;">Time remaining when you save</small>
                              </div>
                              <div>
                                <label class="dc-label">Allow Multiple Votes</label>
                                <div class="dc-toggle-row">
                                  <div>
                                    <span class="dc-toggle-label">Single choice</span>
                                    <span class="dc-toggle-sub">Allow only one vote</span>
                                  </div>
                                  <label class="dc-toggle">
                                    <input type="checkbox" id="multi_vote">
                                    <span class="dc-toggle-slider"></span>
                                  </label>
                                </div>
                              </div>
                            </div>
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

                    <!-- RIGHT: Save + Poll Stats + Danger + Guidelines + Rules -->
                    <div>

                      <!-- Save Card -->
                      <div class="dc-card mb-5">
                        <div class="dc-card-body">
                          <p class="text-gray-600 fs-6 mb-4">Your edits will be visible to everyone in the community.</p>
                          <button class="dc-save-btn" onclick="savePoll()">
                            <i class="ki-duotone ki-check fs-5"><span class="path1"></span><span class="path2"></span></i>
                            Save Changes
                          </button>
                          <button class="dc-cancel-btn" onclick="history.back()">Cancel</button>
                        </div>
                      </div>

                      <!-- Poll Stats -->
                      <div class="dc-poll-stats">
                        <h6><i class="ki-duotone ki-chart-simple fs-5 me-1"><span class="path1"></span><span class="path2"></span></i> Poll State</h6>
                        <div class="dc-stat-row">
                          <span class="dc-stat-label">Total votes</span>
                          <span class="dc-stat-val">225</span>
                        </div>
                        <div class="dc-stat-row">
                          <span class="dc-stat-label">Options</span>
                          <span class="dc-stat-val">4</span>
                        </div>
                        <div class="dc-stat-row">
                          <span class="dc-stat-label">Leading option</span>
                          <span class="dc-stat-val text-success">Thesis/Capstone</span>
                        </div>
                        <div class="dc-stat-row">
                          <span class="dc-stat-label">Time left</span>
                          <span class="dc-stat-val">2 days left</span>
                        </div>
                      </div>

                      <!-- Danger Zone -->
                      <div class="dc-danger-card mb-5">
                        <h6>
                          <i class="ki-duotone ki-warning-2 fs-5"><span class="path1"></span><span class="path2"></span></i>
                          Danger Zone
                        </h6>
                        <p>Permanently remove this post and all its contents. This cannot be undone.</p>
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
                            <li style="color:#5e6278;">Keep your <strong>title</strong> clear and informative for better discoverability</li>
                            <li style="color:#5e6278;">For polls, only option labels can be changed; votes already cast remain valid</li>
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
    let newOptionCount = 0;

    function addPollOption() {
      newOptionCount++;
      const wrap = document.getElementById('new-options-wrap');
      const row = document.createElement('div');
      row.className = 'dc-poll-option-row';
      row.id = 'new-opt-' + newOptionCount;
      row.innerHTML = `
        <span class="dc-poll-option-drag">⠿</span>
        <input class="dc-poll-option-input" type="text" placeholder="New option ${newOptionCount}...">
        <span class="dc-poll-option-votes" style="font-size:11px;color:#b5b5c3;">0 votes</span>
        <button class="dc-poll-option-del" title="Remove option" onclick="removeOption('new-opt-${newOptionCount}')" type="button">
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
        document.getElementById('poll_title').style.borderColor = '#e53935';
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
