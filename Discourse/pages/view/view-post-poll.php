<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "Poll: How do you actually study for finals? Be honest.";
$META_DESC  = "A poll from FEU Tech Discourse community.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/Discourse/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/dashboard.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/sec-sidebar.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/view-post.css" rel="stylesheet" type="text/css" />
    <link href="/discourse/assets/css/sec-modals.css" rel="stylesheet" type="text/css" />
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

              <!-- HERO -->
              <div class="vp-page-hero">
                <div class="vp-page-hero-glow"></div>
                <div class="app-container container-xxl position-relative">
                  <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                    <div>
                      <div class="vp-viewing-notice-text mb-2">
                        <i class="bi bi-eye-fill"></i> VIEWING POST
                      </div>
                      <h1 class="vp-page-hero-title">
                        <span style="color:#F5A623; margin-right:6px;">📊</span>
                        How do you actually study for finals? Be honest.
                      </h1>
                      <p class="vp-page-hero-meta mt-2 mb-0">
                        <span class="me-1">FEU · Academic Life</span>·
                        <span class="mx-1">Posted by Marco Torres</span>·
                        <span class="mx-1">4h ago · 442 votes</span>
                      </p>
                    </div>
                    <a href="/Discourse/index.php" class="vp-back-btn flex-shrink-0">
                      <i class="bi bi-arrow-left"></i> Back to Feed
                    </a>
                  </div>
                </div>
              </div>

              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl py-0">
                  <div class="vp-layout">

                    <!-- LEFT: Post -->
                    <div class="vp-main-col">
                      <div class="vp-post-card mb-4">

                        <!-- Header -->
                        <div class="vp-post-header">
                          <div class="vp-post-tags">
                            <a href="#" class="vp-tag-community">FEU</a>
                            <a href="#" class="vp-tag-category"><i class="bi bi-journal-text me-1"></i>Academic Life</a>
                            <a href="#" class="vp-tag-special"><i class="bi bi-bar-chart-fill me-1"></i>POLL</a>
                          </div>
                          <h2 class="vp-post-title-main">
                            📊 Poll: How do you actually study for finals? Be honest.
                          </h2>
                          <div class="vp-post-author-row">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Marco Torres" class="vp-author-avatar" />
                            <a href="#" class="vp-author-name">Marco Torres</a>
                            <span class="ms-1" style="font-size:11.05px;color:#a1a5b7;">·</span>
                            <span class="vp-author-meta">4h ago</span>
                          </div>
                        </div>

                        <!-- Body -->
                        <div class="vp-post-body">
                          <div class="vp-post-content">
                            <p>Curious how my fellow FEU Tech students survive finals season. Drop your honest answer below 👇</p>
                          </div>

                          <!-- Poll -->
                          <div class="vp-poll-wrap">
                            <div class="vp-poll-title">Choose your study strategy:</div>

                            <div class="vp-poll-option">
                              <span class="vp-poll-label">Start early, study consistently</span>
                              <div class="vp-poll-bar-wrap">
                                <div class="vp-poll-bar" style="width: 8%;"></div>
                              </div>
                              <span class="vp-poll-pct">8%</span>
                            </div>
                            <div class="vp-poll-option">
                              <span class="vp-poll-label">Cram the night before</span>
                              <div class="vp-poll-bar-wrap">
                                <div class="vp-poll-bar" style="width: 26%;"></div>
                              </div>
                              <span class="vp-poll-pct">26%</span>
                            </div>
                            <div class="vp-poll-option">
                              <span class="vp-poll-label">Rely on group chats and past papers</span>
                              <div class="vp-poll-bar-wrap">
                                <div class="vp-poll-bar" style="width: 20%;"></div>
                              </div>
                              <span class="vp-poll-pct">20%</span>
                            </div>
                            <div class="vp-poll-option">
                              <span class="vp-poll-label">Pray and submit anyway</span>
                              <div class="vp-poll-bar-wrap">
                                <div class="vp-poll-bar vp-poll-leader" style="width: 46%;"></div>
                              </div>
                              <span class="vp-poll-pct" style="color:#b45309;">46%</span>
                            </div>

                            <p class="vp-poll-meta"><i class="bi bi-people-fill me-1"></i>442 votes · 3 days left · <a href="#" style="color:var(--dc-primary);font-weight:600;font-size:11.05px;">Feu-voted</a></p>
                          </div>
                        </div>

                        <!-- Actions -->
                        <div class="vp-post-actions-row">
                          <div class="vp-actions-left">
                            <button class="vp-action-btn vp-active-vote">
                              <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">441</span>
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-hand-thumbs-down"></i> Dislike
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-chat"></i> 2 Comments
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-share"></i> Share
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-bookmark"></i> Save
                            </button>
                          </div>
                          <button class="vp-report-btn" data-bs-toggle="modal" data-bs-target="#modalReportPost">
                            <i class="bi bi-flag me-1"></i> Report
                          </button>
                        </div>

                        <!-- Comments -->
                        <div class="vp-comments-section">
                          <h6 class="vp-comments-title">Comments <span class="text-muted fw-normal fs-7">2</span></h6>

                          <div class="vp-comment">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Sofia Karin" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Sofia Karin</span>
                                <span class="vp-comment-time">30 ago</span>
                                <span class="vp-comment-score ms-auto"><i class="bi bi-hand-thumbs-up-fill"></i> 10</span>
                              </div>
                              <p class="vp-comment-text">The last option is way too relatable lmao.</p>
                              <div class="vp-comment-actions">
                                <button class="vp-comment-action-btn"><i class="bi bi-reply me-1"></i>Reply</button>
                              </div>
                            </div>
                          </div>

                          <div class="vp-comment">
                            <img src="/Discourse/assets/images/anonymous.png" alt="Anonymous" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Anonymous</span>
                                <span class="vp-comment-time">30 ago</span>
                                <span class="vp-comment-score ms-auto"><i class="bi bi-hand-thumbs-up-fill"></i> 6</span>
                              </div>
                              <p class="vp-comment-text">Group chats are the actual syllabus honestly.</p>
                              <div class="vp-comment-actions">
                                <button class="vp-comment-action-btn"><i class="bi bi-reply me-1"></i>Reply</button>
                              </div>
                            </div>
                          </div>

                          <div class="vp-comment-input-wrap mt-3">
                            <img src="/Discourse/assets/images/catalina.webp" alt="You" class="vp-comment-avatar" />
                            <textarea class="vp-comment-input" rows="2" placeholder="Write a comment…"></textarea>
                            <button class="vp-comment-post-btn">
                              <i class="bi bi-send-fill"></i> Post
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end LEFT -->

                    <!-- RIGHT: Sidebar -->
                    <div class="vp-sidebar-col">

                      <!-- About Author -->
                      <div class="vp-author-card">
                        <div class="vp-author-card-header">About the Author</div>
                        <div class="vp-author-card-profile">
                          <img src="/Discourse /assets/images/catalina.webp" alt="Marco Torres" class="vp-author-card-avatar" />
                          <div>
                            <a href="#" class="vp-author-card-name">Marco Torres</a>
                            <span class="vp-author-card-role d-block">1302/2047 · Computer Engineering</span>
                          </div>
                        </div>
                        <div class="vp-author-stats">
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">22</span>
                            <span class="vp-author-stat-label">Posts</span>
                          </div>
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">876</span>
                            <span class="vp-author-stat-label">Followers</span>
                          </div>
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">64</span>
                            <span class="vp-author-stat-label">Following</span>
                          </div>
                        </div>
                        <a href="#" class="vp-follow-btn mt-1">
                          <i class="bi bi-person-plus-fill me-1"></i> Follow
                        </a>
                      </div>

                      <!-- More Polls -->
                      <div class="vp-more-polls-card">
                        <div class="vp-more-polls-title">More Polls</div>
                        <a href="#" class="vp-poll-link-item">
                          <span class="vp-poll-link-rank">#21</span>
                          <div class="vp-related-info">
                            <div class="vp-related-title">What's the hardest part of the CS program?</div>
                            <div class="vp-related-meta">FEU · 4h ago · 80 pts</div>
                          </div>
                        </a>
                        <a href="#" class="vp-poll-link-item">
                          <span class="vp-poll-link-rank">#21</span>
                          <div class="vp-related-info">
                            <div class="vp-related-title">Best FEU canteen stall, definitive</div>
                            <div class="vp-related-meta">FEU · 3d ago · 105 votes</div>
                          </div>
                        </a>
                      </div>

                      <!-- Poll Stats -->
                      <div class="vp-poll-stats-card">
                        <div class="vp-poll-stats-title">Poll Stats</div>
                        <div class="vp-poll-stat-row">
                          <span class="vp-poll-stat-label">Total votes</span>
                          <span class="vp-poll-stat-val">442</span>
                        </div>
                        <div class="vp-poll-stat-row">
                          <span class="vp-poll-stat-label">Time remaining</span>
                          <span class="vp-poll-stat-val vp-time">3 days</span>
                        </div>
                        <div class="vp-poll-stat-row">
                          <span class="vp-poll-stat-label">Start early…</span>
                          <span class="vp-poll-stat-val">28 votes</span>
                        </div>
                        <div class="vp-poll-stat-row">
                          <span class="vp-poll-stat-label">Cram the night before</span>
                          <span class="vp-poll-stat-val">104 votes</span>
                        </div>
                        <div class="vp-poll-stat-row">
                          <span class="vp-poll-stat-label">Group chats & papers</span>
                          <span class="vp-poll-stat-val">87 votes</span>
                        </div>
                        <div class="vp-poll-stat-row">
                          <span class="vp-poll-stat-label">Pray and submit</span>
                          <span class="vp-poll-stat-val vp-green">222</span>
                        </div>
                      </div>

                      <!-- Community Rules -->
                      <div class="vp-rules-card">
                        <div class="vp-rules-card-title">Community Rules</div>
                        <ul class="vp-rules-list">
                          <li><span class="vp-rule-num">1.</span> Be respectful and constructive</li>
                          <li><span class="vp-rule-num">2.</span> No personal attacks or harassment</li>
                          <li><span class="vp-rule-num">3.</span> Keep posts relevant to the topic</li>
                          <li><span class="vp-rule-num">4.</span> Verify information before sharing</li>
                        </ul>
                      </div>

                    </div>
                    <!-- end RIGHT -->

                  </div>
                </div>
              </div>

            </main>
          </div>

          <!-- Footer -->
                          <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_footer.php'); ?>


        </div>
      </div>
    </div>
  </div>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_scrolltop.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_discourse-modals.php'); ?>
  <script src="/Discourse/assets/plugins/global/plugins.bundle.js"></script>
  <script src="/Discourse/assets/js/scripts.bundle.js"></script>
  <script src="/Discourse/assets/js/dashboard.js"></script>
</body>
</html>
