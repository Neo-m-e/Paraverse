<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "What if FEU had a no-grade-penalty mental health leave policy?";
$META_DESC  = "An anonymous post from FEU Tech Discourse community.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/discourse/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/discourse/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/discourse/assets/css/dashboard.css" rel="stylesheet" type="text/css" />
  <link href="/discourse/assets/css/sec-sidebar.css" rel="stylesheet" type="text/css" />
  <link href="/discourse/assets/css/view-post.css" rel="stylesheet" type="text/css" />
  <link href="/discourse/assets/css/sec-modals.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_app_body"
  data-kt-app-page-loading-enabled="false"
  data-kt-app-page-loading="off"
  data-kt-app-layout="light-header"
  data-kt-app-header-fixed="true"
  data-kt-app-header-fixed-mobile="true"
  class="app-default">

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_header.php'); ?>

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
                        <i class="bi bi-eye-fill"></i> VIEWING ANONYMOUS POST
                      </div>
                      <h1 class="vp-page-hero-title">What if FEU had a no-grade-penalty mental health leave policy?</h1>
                      <p class="vp-page-hero-meta mt-2 mb-0">
                        <span class="me-1">Ideas · Student Welfare</span>·
                        <span class="mx-1">Anonymous</span>·
                        <span class="mx-1">4h ago</span>
                      </p>
                    </div>
                    <a href="/discourse/index.php" class="vp-back-btn flex-shrink-0">
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
                            <a href="#" class="vp-tag-community">Ideas</a>
                            <a href="#" class="vp-tag-category"><i class="bi bi-heart me-1"></i>Student Welfare</a>
                            <a href="#" class="vp-tag-special"><i class="bi bi-incognito me-1"></i>ANONYMOUS</a>
                          </div>

                          <!-- Anonymous banner -->
                          <div class="vp-anon-banner mb-3">
                            <i class="bi bi-shield-check-fill"></i>
                            <span>
                              <strong>This post was shared anonymously.</strong> The author's identity is completely hidden from all readers, including moderators.
                              <a href="#" style="color:var(--dc-primary);font-weight:600;">Respect their privacy.</a>
                            </span>
                          </div>

                          <h2 class="vp-post-title-main">
                            [Anonymous] What if FEU had a no-grade-penalty mental health leave policy?
                          </h2>
                          <div class="vp-post-author-row">
                            <img src="/Discourse/assets/images/anonymous.png" alt="Anonymous" class="vp-author-avatar" />
                            <span class="vp-author-name" style="color:#5e6278;cursor:default;">Anonymous</span>
                            <span class="ms-1" style="font-size:11.05px;color:#a1a5b7;">·</span>
                            <span class="vp-author-meta">4h ago</span>
                          </div>
                        </div>

                        <!-- Body -->
                        <div class="vp-post-body">
                          <div class="vp-post-content">
                            <p>
                              Just thinking — a lot of students I know failed a whole semester because they were dealing with severe anxiety during midterms. The university had no mechanism to help them — just a "consult your prof" suggestion.
                            </p>
                            <p>
                              This isn't about gaming the system. It's about recognizing that mental health crises are medical events and should be treated as such. Student council, if you're reading this — this is worth fighting for.
                            </p>
                          </div>
                        </div>

                        <!-- Actions -->
                        <div class="vp-post-actions-row">
                          <div class="vp-actions-left">
                            <button class="vp-action-btn vp-active-vote">
                              <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">187</span>
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
                              <i class="bi bi-bookmark-fill" style="color:var(--dc-primary);"></i> Saved
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
                            <img src="/Discourse/assets/images/catalina.webp" alt="Ravi Joshi" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Ravi Joshi</span>
                                <span class="vp-comment-time">30 ago</span>
                                <span class="vp-comment-score ms-auto"><i class="bi bi-hand-thumbs-up-fill"></i> 10</span>
                              </div>
                              <p class="vp-comment-text">This is so needed. The number of people I know who failed a sem because of mental health is alarming.</p>
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
                              <p class="vp-comment-text">Student council should push for this. I'd sign that petition immediately.</p>
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

                      <!-- Anonymous Identity Card (replaces author card for anon posts) -->
                      <div class="vp-anon-card">
                        <div class="vp-anon-shield-icon">
                          <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <div class="vp-anon-card-title">Identity Protected</div>
                        <p class="vp-anon-card-desc">
                          This post was shared anonymously. The author's identity is not visible to anyone.
                        </p>
                        <ul class="vp-anon-feature-list">
                          <li><i class="bi bi-check-circle-fill"></i> Identity hidden from all users</li>
                          <li><i class="bi bi-check-circle-fill"></i> Hidden from moderators</li>
                          <li><i class="bi bi-check-circle-fill"></i> No profile link to author shown</li>
                        </ul>
                      </div>

                      <!-- Related Posts -->
                      <div class="vp-related-card">
                        <div class="vp-related-card-title">Related Posts</div>
                        <div class="vp-related-list">
                          <a href="#" class="vp-related-item">
                            <span class="vp-related-rank">#76</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">CS curriculum changes — honest discussion</div>
                              <div class="vp-related-meta">Ideas · 2d ago</div>
                            </div>
                          </a>
                          <a href="#" class="vp-related-item">
                            <span class="vp-related-rank">#54</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">Is "third culture" identity the dominant student experience?</div>
                              <div class="vp-related-meta">FEU · 1w ago</div>
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
                          <li><span class="vp-rule-num">4.</span> Do not attempt to identify anonymous posters</li>
                          <li><span class="vp-rule-num">5.</span> Verify information before sharing</li>
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

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_scrolltop.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_discourse-modals.php'); ?>
  <script src="/Discourse/assets/plugins/global/plugins.bundle.js"></script>
  <script src="/Discourse/assets/js/scripts.bundle.js"></script>
  <script src="/Discourse/assets/js/dashboard.js"></script>
</body>

</html>