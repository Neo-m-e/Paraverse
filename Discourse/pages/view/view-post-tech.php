<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "The silent revolution in edge AI — why on-device inference is changing everything";
$META_DESC  = "A post from FEU Tech Discourse community.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php HEAD_ESSENTIALS(); ?>
  <!--begin::Global Stylesheets Bundle (Metronic/Bootstrap)-->
  <link href="/Discourse/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Stylesheets Bundle-->
  <!--begin::Discourse CSS-->
  <link href="/Discourse/assets/css/dashboard.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/sec-sidebar.css" rel="stylesheet" type="text/css" />
  <link href="/Discourse/assets/css/view-post.css" rel="stylesheet" type="text/css" />
    <link href="/discourse/assets/css/sec-modals.css" rel="stylesheet" type="text/css" />
  <!--end::Discourse CSS-->
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

      <!--begin::Header-->
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_header.php'); ?>
      <!--end::Header-->

      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>

              <!-- ── VIEWING POST NOTICE + HERO ──────────────────── -->
              <div class="vp-page-hero">
                <div class="vp-page-hero-glow"></div>
                <div class="app-container container-xxl position-relative">
                  <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                    <div>
                      <div class="vp-viewing-notice-text mb-2">
                        <i class="bi bi-eye-fill"></i> VIEWING POST
                      </div>
                      <h1 class="vp-page-hero-title">The silent revolution in edge AI</h1>
                      <p class="vp-page-hero-meta mt-2 mb-0">
                        <span class="me-1">Technology</span>·
                        <span class="mx-1">Posted by Ravi Joshi</span>·
                        <span class="mx-1">8h ago</span>
                      </p>
                    </div>
                    <a href="/Discourse/index.php" class="vp-back-btn flex-shrink-0">
                      <i class="bi bi-arrow-left"></i> Back to Feed
                    </a>
                  </div>
                </div>
              </div>
              <!-- ── END HERO ───────────────────────────────────────── -->

              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl py-0">

                  <!-- ── 2-COLUMN LAYOUT ──────────────────────────────── -->
                  <div class="vp-layout">

                    <!-- ── LEFT: Main Post ──────────────────────────────── -->
                    <div class="vp-main-col">

                      <!-- Post Card -->
                      <div class="vp-post-card mb-4">

                        <!-- Post Header -->
                        <div class="vp-post-header">
                          <div class="vp-post-tags">
                            <a href="#" class="vp-tag-community">FEUTech</a>
                            <a href="#" class="vp-tag-category"><i class="bi bi-cpu me-1"></i>Technology</a>
                          </div>
                          <h2 class="vp-post-title-main">
                            The silent revolution in edge AI — why on-device inference is changing everything
                          </h2>
                          <div class="vp-post-author-row">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Ravi Joshi" class="vp-author-avatar" />
                            <a href="#" class="vp-author-name">Ravi Joshi</a>
                            <span class="ms-1" style="font-size:11.05px; color:#a1a5b7;">·</span>
                            <span class="vp-author-meta">8h ago</span>
                          </div>
                        </div>

                        <!-- Post Body -->
                        <div class="vp-post-body">
                          <div class="vp-post-content">
                            <p>
                              A decade optimizing for server-side compute, but the thermal envelope of modern SoCs has quietly crossed a threshold nobody was paying attention to. Here's why 2025 is the last year data centers dominate AI inference at scale.
                            </p>
                            <p>
                              The numbers are staggering — a modern mobile chip can now run 7B parameter models at 30+ tokens/sec. That's not impressive, that's transformative.
                            </p>
                            <p>
                              Think about what this means: zero latency, full privacy, no internet dependency. The paradigm shift is already underway in every device you own.
                            </p>
                          </div>
                        </div>

                        <!-- Post Actions -->
                        <div class="vp-post-actions-row">
                          <div class="vp-actions-left">
                            <button class="vp-action-btn vp-active-vote">
                              <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">214</span>
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

                        <!-- Comments Section -->
                        <div class="vp-comments-section">
                          <h6 class="vp-comments-title">Comments <span class="text-muted fw-normal fs-7">3</span></h6>

                          <!-- Comment 1 -->
                          <div class="vp-comment">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Sofia Karin" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Sofia Karin</span>
                                <span class="vp-comment-time">30 ago</span>
                                <span class="vp-comment-score ms-auto">
                                  <i class="bi bi-hand-thumbs-up-fill"></i> 10
                                </span>
                              </div>
                              <p class="vp-comment-text">Really insightful take! The latency improvements alone justify the switch.</p>
                              <div class="vp-comment-actions">
                                <button class="vp-comment-action-btn"><i class="bi bi-reply me-1"></i>Reply</button>
                              </div>
                            </div>
                          </div>

                          <!-- Comment 2 -->
                          <div class="vp-comment">
                            <img src="/Discourse/assets/images/anonymous.png" alt="Anonymous" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Anonymous</span>
                                <span class="vp-comment-time">1h ago</span>
                                <span class="vp-comment-score ms-auto">
                                  <i class="bi bi-hand-thumbs-up-fill"></i> 6
                                </span>
                              </div>
                              <p class="vp-comment-text">What about power consumption on mobile devices though? Battery drain is still a real concern for everyday users.</p>
                              <div class="vp-comment-actions">
                                <button class="vp-comment-action-btn"><i class="bi bi-reply me-1"></i>Reply</button>
                              </div>
                            </div>
                          </div>

                          <!-- Comment 3 -->
                          <div class="vp-comment">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Marco Torres" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Marco Torres</span>
                                <span class="vp-comment-time">11h ago</span>
                                <span class="vp-comment-score ms-auto">
                                  <i class="bi bi-hand-thumbs-up-fill"></i> 1
                                </span>
                              </div>
                              <p class="vp-comment-text">The TPU integration in Apple Silicon is basically proof of concept already.</p>
                              <div class="vp-comment-actions">
                                <button class="vp-comment-action-btn"><i class="bi bi-reply me-1"></i>Reply</button>
                              </div>
                            </div>
                          </div>

                          <!-- Comment Input -->
                          <div class="vp-comment-input-wrap mt-3">
                            <img src="/Discourse/assets/images/catalina.webp" alt="You" class="vp-comment-avatar" />
                            <textarea class="vp-comment-input" rows="2" placeholder="Write a comment…"></textarea>
                            <button class="vp-comment-post-btn">
                              <i class="bi bi-send-fill"></i> Post
                            </button>
                          </div>
                        </div>
                      </div>
                      <!-- end Post Card -->

                    </div>
                    <!-- end LEFT -->

                    <!-- ── RIGHT: Sidebar ──────────────────────────────── -->
                    <div class="vp-sidebar-col">

                      <!-- About the Author -->
                      <div class="vp-author-card">
                        <div class="vp-author-card-header">About the Author</div>
                        <div class="vp-author-card-profile">
                          <img src="/Discourse/assets/images/catalina.webp" alt="Ravi Joshi" class="vp-author-card-avatar" />
                          <div>
                            <a href="#" class="vp-author-card-name">Ravi Joshi</a>
                            <span class="vp-author-card-role d-block">1302/2047 · Computer Engineering</span>
                          </div>
                        </div>
                        <div class="vp-author-stats">
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">48</span>
                            <span class="vp-author-stat-label">Posts</span>
                          </div>
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">1.2k</span>
                            <span class="vp-author-stat-label">Followers</span>
                          </div>
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">132</span>
                            <span class="vp-author-stat-label">Following</span>
                          </div>
                        </div>
                        <a href="#" class="vp-follow-btn mt-1">
                          <i class="bi bi-person-plus-fill me-1"></i> Follow
                        </a>
                      </div>

                      <!-- Related Posts -->
                      <div class="vp-related-card">
                        <div class="vp-related-card-title">Related Posts</div>
                        <div class="vp-related-list">
                          <a href="#" class="vp-related-item">
                            <span class="vp-related-rank">#98</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">Is Qualcomm finally catching up to Apple Silicon on benchmarks?</div>
                              <div class="vp-related-meta">Technology · 4d ago</div>
                            </div>
                          </a>
                          <a href="#" class="vp-related-item">
                            <span class="vp-related-rank">#72</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">How local LLMs will reshape app development in the next 5 years</div>
                              <div class="vp-related-meta">Technology · 1w ago</div>
                            </div>
                          </a>
                          <a href="#" class="vp-related-item">
                            <span class="vp-related-rank">#64</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">Anyone also discussed with the new Pis 3 Mini benchmarks?</div>
                              <div class="vp-related-meta">FEUTech · 2d ago</div>
                            </div>
                          </a>
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
                  <!-- end vp-layout -->

                </div>
              </div>

            </main>
          </div>

          <!-- ── PAGE FOOTER ─────────────────────────────────────── -->
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_footer.php'); ?>

          <!-- ── END FOOTER ─────────────────────────────────────── -->

        </div>
      </div>
    </div>
  </div>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_scrolltop.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_discourse-modals.php'); ?>

  <!--begin::Global Javascript Bundle (Metronic/Bootstrap)-->
  <script src="/Discourse/assets/plugins/global/plugins.bundle.js"></script>
  <script src="/Discourse/assets/js/scripts.bundle.js"></script>
  <!--end::Global Javascript Bundle-->
  <script src="/Discourse/assets/js/dashboard.js"></script>
</body>
</html>
