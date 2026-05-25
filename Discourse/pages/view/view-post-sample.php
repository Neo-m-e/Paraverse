<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "Lorem ipsum dolor sit amet, consectetur adipiscing elit";
$META_DESC  = "A post from FEU Tech Discourse community.";
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

                            <div class="vp-page-hero">
                                <div class="vp-page-hero-glow"></div>
                                <div class="app-container container-xxl position-relative">
                                    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <div>
                                            <div class="vp-viewing-notice-text mb-2">
                                                <i class="bi bi-eye-fill"></i> VIEWING POST
                                            </div>
                                            <h1 class="vp-page-hero-title">Lorem ipsum dolor sit amet</h1>
                                            <p class="vp-page-hero-meta mt-2 mb-0">
                                                <span class="me-1">Consectetur</span>·
                                                <span class="mx-1">Posted by John Doe</span>·
                                                <span class="mx-1">3h ago</span>
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

                                        <div class="vp-main-col">

                                            <div class="vp-post-card mb-4">

                                                <div class="vp-post-header">
                                                    <div class="vp-post-tags">
                                                        <a href="#" class="vp-tag-community">LoremIpsum</a>
                                                        <a href="#" class="vp-tag-category"><i class="bi bi-cpu me-1"></i>Consectetur</a>
                                                    </div>
                                                    <h2 class="vp-post-title-main">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit — sed do eiusmod tempor
                                                    </h2>
                                                    <div class="vp-post-author-row">
                                                        <img src="/Discourse/assets/images/catalina.webp" alt="John Doe" class="vp-author-avatar" />
                                                        <a href="#" class="vp-author-name">John Doe</a>
                                                        <span class="ms-1" style="font-size:11.05px; color:#a1a5b7;">·</span>
                                                        <span class="vp-author-meta">3h ago</span>
                                                    </div>
                                                </div>

                                                <div class="vp-post-body">
                                                    <div class="vp-post-content">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                        </p>
                                                        <p>
                                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                        <p>
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="vp-post-actions-row">
                                                    <div class="vp-actions-left">
                                                        <button class="vp-action-btn vp-active-vote">
                                                            <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">42</span>
                                                        </button>
                                                        <button class="vp-action-btn">
                                                            <i class="bi bi-hand-thumbs-down"></i> Dislike
                                                        </button>
                                                        <button class="vp-action-btn">
                                                            <i class="bi bi-chat"></i> 3 Comments
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

                                                <div class="vp-comments-section">
                                                    <h6 class="vp-comments-title">Comments <span class="text-muted fw-normal fs-7">3</span></h6>

                                                    <div class="vp-comment">
                                                        <img src="/Discourse/assets/images/catalina.webp" alt="Jane Doe" class="vp-comment-avatar" />
                                                        <div class="vp-comment-bubble">
                                                            <div class="vp-comment-author-row">
                                                                <span class="vp-comment-author">Jane Doe</span>
                                                                <span class="vp-comment-time">2h ago</span>
                                                                <span class="vp-comment-score ms-auto">
                                                                    <i class="bi bi-hand-thumbs-up-fill"></i> 12
                                                                </span>
                                                            </div>
                                                            <p class="vp-comment-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
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
                                                                <span class="vp-comment-time">1h ago</span>
                                                                <span class="vp-comment-score ms-auto">
                                                                    <i class="bi bi-hand-thumbs-up-fill"></i> 5
                                                                </span>
                                                            </div>
                                                            <p class="vp-comment-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                            <div class="vp-comment-actions">
                                                                <button class="vp-comment-action-btn"><i class="bi bi-reply me-1"></i>Reply</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="vp-comment">
                                                        <img src="/Discourse/assets/images/catalina.webp" alt="Smith Doe" class="vp-comment-avatar" />
                                                        <div class="vp-comment-bubble">
                                                            <div class="vp-comment-author-row">
                                                                <span class="vp-comment-author">Smith Doe</span>
                                                                <span class="vp-comment-time">30m ago</span>
                                                                <span class="vp-comment-score ms-auto">
                                                                    <i class="bi bi-hand-thumbs-up-fill"></i> 0
                                                                </span>
                                                            </div>
                                                            <p class="vp-comment-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
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
                                        <div class="vp-sidebar-col">

                                            <div class="vp-author-card">
                                                <div class="vp-author-card-header">About the Author</div>
                                                <div class="vp-author-card-profile">
                                                    <img src="/Discourse/assets/images/catalina.webp" alt="John Doe" class="vp-author-card-avatar" />
                                                    <div>
                                                        <a href="#" class="vp-author-card-name">John Doe</a>
                                                        <span class="vp-author-card-role d-block">1000/2000 · Lorem Ipsum Dolor</span>
                                                    </div>
                                                </div>
                                                <div class="vp-author-stats">
                                                    <div class="vp-author-stat">
                                                        <span class="vp-author-stat-value">25</span>
                                                        <span class="vp-author-stat-label">Posts</span>
                                                    </div>
                                                    <div class="vp-author-stat">
                                                        <span class="vp-author-stat-value">500</span>
                                                        <span class="vp-author-stat-label">Followers</span>
                                                    </div>
                                                    <div class="vp-author-stat">
                                                        <span class="vp-author-stat-value">100</span>
                                                        <span class="vp-author-stat-label">Following</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="vp-follow-btn mt-1">
                                                    <i class="bi bi-person-plus-fill me-1"></i> Follow
                                                </a>
                                            </div>

                                            <div class="vp-related-card">
                                                <div class="vp-related-card-title">Related Posts</div>
                                                <div class="vp-related-list">
                                                    <a href="#" class="vp-related-item">
                                                        <span class="vp-related-rank">#01</span>
                                                        <div class="vp-related-info">
                                                            <div class="vp-related-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</div>
                                                            <div class="vp-related-meta">Consectetur · 4d ago</div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="vp-related-item">
                                                        <span class="vp-related-rank">#02</span>
                                                        <div class="vp-related-info">
                                                            <div class="vp-related-title">Sed do eiusmod tempor incididunt ut labore et dolore?</div>
                                                            <div class="vp-related-meta">Consectetur · 1w ago</div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="vp-related-item">
                                                        <span class="vp-related-rank">#03</span>
                                                        <div class="vp-related-info">
                                                            <div class="vp-related-title">Ut enim ad minim veniam, quis nostrud exercitation?</div>
                                                            <div class="vp-related-meta">LoremIpsum · 2d ago</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="vp-rules-card">
                                                <div class="vp-rules-card-title">Community Rules</div>
                                                <ul class="vp-rules-list">
                                                    <li><span class="vp-rule-num">1.</span> Lorem ipsum dolor sit amet</li>
                                                    <li><span class="vp-rule-num">2.</span> Consectetur adipiscing elit</li>
                                                    <li><span class="vp-rule-num">3.</span> Sed do eiusmod tempor incididunt</li>
                                                    <li><span class="vp-rule-num">4.</span> Ut labore et dolore magna aliqua</li>
                                                </ul>
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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Discourse/partials/_discourse-modals.php'); ?>

    <script src="/Discourse/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/Discourse/assets/js/scripts.bundle.js"></script>
    <script src="/Discourse/assets/js/dashboard.js"></script>
</body>

</html>