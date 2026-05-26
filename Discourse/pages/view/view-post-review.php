<?php
/* Refactored: custom CSS → Bootstrap/Metronic utilities */
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "FEU Tech library study rooms — honest review";
$META_DESC  = "A review post from FEU Tech Discourse community.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/Discourse/assets/css/dashboard.css" rel="stylesheet" type="text/css" />
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
              <div style="background: linear-gradient(135deg, #0b3220 0%, #1a5c38 60%, #2D6A4F 100%); padding: 28px 0 22px;">
                <div class="app-container container-xxl position-relative">
                  <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                    <div>
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-eye-fill text-white opacity-75 fs-7"></i>
                        <span class="text-white opacity-75 fs-8 fw-bold text-uppercase ls-1">Viewing Post</span>
                      </div>
                      <h1 class="text-white fs-2 fw-bolder mb-1">FEU Tech library study rooms — honest review</h1>
                      <p class="text-white opacity-65 fs-7 mb-0">
                        <span class="me-1">FEU · Campus Life</span>·
                        <span class="mx-1">Posted by Catalina Smith</span>·
                        <span class="mx-1">4h ago</span>
                      </p>
                    </div>
                    <a href="/discourse/index.php" class="btn btn-sm btn-light fw-bold flex-shrink-0 mt-2">
                      <i class="bi bi-arrow-left me-1"></i> Back to Feed
                    </a>
                  </div>
                </div>
              </div>

              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl py-5">
                  <div class="row g-5 align-items-start">

                    <!-- LEFT: Post -->
                    <div class="col-lg-8">
                      <div class="card border-0 shadow mb-5">

                        <!-- Post Header -->
                        <div class="card-body pb-0 pt-5 px-5">

                          <!-- Tags row -->
                          <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="badge badge-light-success rounded-pill px-4 py-2 fs-8">FEU</span>
                            <span class="badge badge-light-primary rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-building me-1"></i>Campus Life
                            </span>
                            <span class="badge badge-light-warning rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-star-fill me-1"></i>REVIEW
                            </span>
                            <span class="badge badge-light-info rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-person-check-fill me-1"></i>Your Post
                            </span>
                          </div>

                          <!-- Community badge + Report -->
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-light-success rounded-pill px-5 py-2 fs-8">FEUTech</span>
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalReportPost">
                              <i class="bi bi-flag me-1"></i> Report
                            </button>
                          </div>

                          <!-- Author row -->
                          <div class="d-flex gap-3 align-items-center mb-4">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Catalina Smith" class="h-40px w-40px rounded-circle" />
                            <div class="d-flex flex-column">
                              <a href="#" class="fs-6 fw-bold text-gray-800 text-hover-primary">Catalina Smith</a>
                              <span class="text-muted fs-8"><i class="bi bi-clock me-1 fs-8"></i>4h ago</span>
                            </div>
                          </div>

                          <!-- Title -->
                          <h2 class="fs-3 fw-bold text-gray-800 mb-4">
                            Review: FEU Tech library study rooms — worth booking or just use the hallway?
                          </h2>
                        </div>

                        <!-- Post Body -->
                        <div class="card-body pt-0 px-5">
                          <p class="fs-6 text-gray-700 mb-4">
                            Finally tried booking one of the new study rooms in the library. Honest review: the booking system is clunky, the AC is questionable, but the soundproofing is actually great. Worth it for group study if you plan ahead.
                          </p>

                          <!-- Post Image -->
                          <div class="rounded-3 overflow-hidden mb-4">
                            <img src="https://www.feu.edu.ph/wp-content/uploads/2023/06/thumbnail__a3-1.jpg"
                              alt="Library Study Room"
                              class="w-100"
                              style="height:200px;object-fit:cover;filter:brightness(0.85) saturate(0.9);" />
                          </div>

                          <p class="fs-6 text-gray-700 mb-4">
                            Not ideal for solo cramming though — the chairs are surprisingly uncomfortable for long sessions.
                          </p>
                        </div>

                        <!-- Actions Row -->
                        <div class="card-body pt-0 px-5 pb-0">
                          <div class="d-flex justify-content-between align-items-center border-top border-bottom py-3">
                            <div class="d-flex flex-wrap gap-1">
                              <button class="btn btn-sm btn-light-success fw-semibold">
                                <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">44</span>
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-hand-thumbs-down"></i> Dislike
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-chat"></i> 1 Comment
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-share"></i> Share
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-bookmark"></i> Save
                              </button>
                              <a href="/discourse/pages/view/edit-post.php" class="btn btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                              </a>
                            </div>
                          </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="card-body px-5 py-5">
                          <h6 class="fs-6 fw-bold text-gray-800 mb-4">
                            Comments <span class="text-muted fw-normal fs-7">3</span>
                          </h6>

                          <!-- Comment 1 -->
                          <div class="d-flex gap-3 mb-4">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Sofia Karin" class="h-35px w-35px rounded-circle flex-shrink-0" />
                            <div class="bg-light rounded-3 p-4 flex-grow-1">
                              <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="fs-7 fw-bold text-gray-800">Sofia Karin</span>
                                <span class="text-muted fs-8">1h ago</span>
                                <span class="ms-auto text-muted fs-8">
                                  <i class="bi bi-hand-thumbs-up-fill me-1"></i>10
                                </span>
                              </div>
                              <p class="fs-7 text-gray-700 mb-2">The booking system needs a serious UX overhaul. I gave up twice before figuring it out.</p>
                              <button class="btn btn-sm p-0 text-muted fs-8">
                                <i class="bi bi-reply me-1"></i>Reply
                              </button>
                            </div>
                          </div>

                          <!-- Comment Input -->
                          <div class="d-flex gap-3 mt-4">
                            <img src="/Discourse/assets/images/catalina.webp" alt="You" class="h-35px w-35px rounded-circle flex-shrink-0" />
                            <div class="flex-grow-1 d-flex flex-column gap-2">
                              <textarea class="form-control form-control-solid" rows="2" placeholder="Write a comment…"></textarea>
                              <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-success fw-bold">
                                  <i class="bi bi-send-fill me-1"></i> Post
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- end LEFT -->

                    <!-- RIGHT: Sidebar -->
                    <div class="col-lg-4">

                      <!-- Author Card -->
                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-header border-0 bg-light py-4">
                          <h6 class="card-title mb-0 fw-bold fs-6">Author</h6>
                        </div>
                        <div class="card-body p-5">
                          <div class="d-flex align-items-center gap-3 mb-5">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Catalina Smith" class="h-50px w-50px rounded-circle" />
                            <div>
                              <a href="#" class="fs-6 fw-bold text-gray-800 text-hover-primary d-block">Catalina Smith</a>
                              <span class="text-muted fs-8 d-block">1302/2047 · Computer Science</span>
                            </div>
                          </div>
                          <div class="d-flex justify-content-around text-center mb-5">
                            <div>
                              <div class="fs-5 fw-bold text-gray-800">3</div>
                              <div class="text-muted fs-8">Posts</div>
                            </div>
                            <div>
                              <div class="fs-5 fw-bold text-gray-800">304</div>
                              <div class="text-muted fs-8">Followers</div>
                            </div>
                            <div>
                              <div class="fs-5 fw-bold text-gray-800">7</div>
                              <div class="text-muted fs-8">Following</div>
                            </div>
                          </div>
                          <a href="#" class="btn btn-sm btn-light-success w-100 fw-bold">
                            <i class="bi bi-person-plus-fill me-1"></i> Follow
                          </a>
                        </div>
                      </div>

                      <!-- Related Posts -->
                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-header border-0 bg-light py-4">
                          <h6 class="card-title mb-0 fw-bold fs-6">Related Posts</h6>
                        </div>
                        <div class="card-body p-0">
                          <a href="#" class="d-flex align-items-start gap-3 p-4 border-bottom text-decoration-none text-hover-primary">
                            <span class="badge badge-light-success rounded-pill px-3 py-2 fs-8 flex-shrink-0">#169</span>
                            <div>
                              <div class="fs-7 fw-semibold text-gray-800 mb-1">Pro tips for surviving enrollment season at FEU Tech</div>
                              <div class="text-muted fs-8">FEU · 4d ago</div>
                            </div>
                          </a>
                          <a href="#" class="d-flex align-items-start gap-3 p-4 text-decoration-none text-hover-primary">
                            <span class="badge badge-light-success rounded-pill px-3 py-2 fs-8 flex-shrink-0">#127</span>
                            <div>
                              <div class="fs-7 fw-semibold text-gray-800 mb-1">What if FEU had a no-grade-penalty mental health leave policy?</div>
                              <div class="text-muted fs-8">Student Welfare · 1w ago</div>
                            </div>
                          </a>
                        </div>
                      </div>

                      <!-- Community Rules -->
                     <div class="card border border-success bg-light-success">
                        <div class="card-body p-5">
                          <p class="fs-6 fw-bold text-success mb-3">Community Rules</p>
                          <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span>Be respectful and constructive</li>
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span>No personal attacks or harassment</li>
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span>Keep posts relevant to FEU Tech</li>
                            <li class="d-flex align-items-start gap-2 fs-7 text-success"><span class="fw-bold flex-shrink-0">✓</span>Verify information before sharing</li>
                          </ul>
                        </div>
                      </div>

                    </div>
                    <!-- end RIGHT -->

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