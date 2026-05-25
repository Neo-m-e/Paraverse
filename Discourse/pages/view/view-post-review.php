<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "FEU Tech library study rooms — honest review";
$META_DESC  = "A review post from FEU Tech Discourse community.";
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
  data-kt-app-page-loading-enabled="false"
  data-kt-app-page-loading="off"
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
                      <h1 class="vp-page-hero-title">FEU Tech library study rooms — honest review</h1>
                      <p class="vp-page-hero-meta mt-2 mb-0">
                        <span class="me-1">FEU · Campus Life</span>·
                        <span class="mx-1">Posted by Catalina Smith</span>·
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
                            <a href="#" class="vp-tag-community">FEU</a>
                            <a href="#" class="vp-tag-category"><i class="bi bi-building me-1"></i>Campus Life</a>
                            <a href="#" class="vp-tag-special"><i class="bi bi-star-fill me-1"></i>REVIEW</a>
                            <span class="vp-your-post-badge"><i class="bi bi-person-check-fill me-1"></i>Your Post</span>
                          </div>
                          <h2 class="vp-post-title-main">
                            Review: FEU Tech library study rooms — worth booking or just use the hallway?
                          </h2>
                          <div class="vp-post-author-row">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Catalina Smith" class="vp-author-avatar" />
                            <a href="#" class="vp-author-name">Catalina Smith</a>
                            <span class="ms-1" style="font-size:11.05px;color:#a1a5b7;">·</span>
                            <span class="vp-author-meta">4h ago</span>
                          </div>
                        </div>

                        <!-- Body -->
                        <div class="vp-post-body">
                          <div class="vp-post-content">
                            <p>Finally tried booking one of the new study rooms in the library. Honest review: the booking system is clunky, the AC is questionable, but the soundproofing is actually great. Worth it for group study if you plan ahead.</p>
                          </div>

                          <!-- Post Image -->
                          <div class="vp-post-image-wrap">
                            <img src="https://picsum.photos/seed/campus/800/300" alt="Library Study Room" style="height:200px;object-fit:cover;width:100%;filter:brightness(0.85) saturate(0.9);" />
                          </div>

                          <div class="vp-post-content">
                            <p>Not ideal for solo cramming though — the chairs are surprisingly uncomfortable for long sessions.</p>
                          </div>
                        </div>

                        <!-- Actions -->
                        <div class="vp-post-actions-row">
                          <div class="vp-actions-left">
                            <button class="vp-action-btn vp-active-vote">
                              <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">44</span>
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-hand-thumbs-down"></i> Dislike
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-chat"></i> 1 Comment
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-share"></i> Share
                            </button>
                            <button class="vp-action-btn">
                              <i class="bi bi-bookmark"></i> Save
                            </button>
                            <a href="/discourse/pages/view/edit-post.php" class="vp-action-btn">
                              <i class="bi bi-pencil"></i> Edit
                            </a>
                          </div>
                          <button class="vp-report-btn" data-bs-toggle="modal" data-bs-target="#modalReportPost">
                            <i class="bi bi-flag me-1"></i> Report
                          </button>
                        </div>

                        <!-- Comments -->
                        <div class="vp-comments-section">
                          <h6 class="vp-comments-title">Comments <span class="text-muted fw-normal fs-7">3</span></h6>

                          <div class="vp-comment">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Sofia Karin" class="vp-comment-avatar" />
                            <div class="vp-comment-bubble">
                              <div class="vp-comment-author-row">
                                <span class="vp-comment-author">Sofia Karin</span>
                                <span class="vp-comment-time">1h ago</span>
                                <span class="vp-comment-score ms-auto"><i class="bi bi-hand-thumbs-up-fill"></i> 10</span>
                              </div>
                              <p class="vp-comment-text">The booking system needs a serious UX overhaul. I gave up twice before figuring it out.</p>
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

                      <!-- Author Card -->
                      <div class="vp-author-card">
                        <div class="vp-author-card-header">Author</div>
                        <div class="vp-author-card-profile">
                          <img src="/Discourse/assets/images/catalina.webp" alt="Catalina Smith" class="vp-author-card-avatar" />
                          <div>
                            <a href="#" class="vp-author-card-name">Catalina Smith</a>
                            <span class="vp-author-card-role d-block">1302/2047 · Computer Science</span>
                          </div>
                        </div>
                        <div class="vp-author-stats">
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">3</span>
                            <span class="vp-author-stat-label">Posts</span>
                          </div>
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">304</span>
                            <span class="vp-author-stat-label">Followers</span>
                          </div>
                          <div class="vp-author-stat">
                            <span class="vp-author-stat-value">7</span>
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
                            <span class="vp-related-rank">#169</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">Pro tips for surviving enrollment season at FEU Tech</div>
                              <div class="vp-related-meta">FEU · 4d ago</div>
                            </div>
                          </a>
                          <a href="#" class="vp-related-item">
                            <span class="vp-related-rank">#127</span>
                            <div class="vp-related-info">
                              <div class="vp-related-title">What if FEU had a no-grade-penalty mental health leave policy?</div>
                              <div class="vp-related-meta">Student Welfare · 1w ago</div>
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
