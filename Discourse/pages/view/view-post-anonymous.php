<?php
/* Refactored: custom CSS → Bootstrap/Metronic utilities */
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "What if FEU had a no-grade-penalty mental health leave policy?";
$META_DESC  = "An anonymous post from FEU Tech Discourse community.";
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

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_page-loader.php'); ?>

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_header.php'); ?>

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
                        <span class="text-white opacity-75 fs-8 fw-bold text-uppercase ls-1">Viewing Anonymous Post</span>
                      </div>
                      <h1 class="text-white fs-2 fw-bolder mb-1">What if FEU had a no-grade-penalty mental health leave policy?</h1>
                      <p class="text-white opacity-65 fs-7 mb-0">
                        <span class="me-1">Ideas · Student Welfare</span>·
                        <span class="mx-1">Anonymous</span>·
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
                            <span class="badge badge-light-success rounded-pill px-4 py-2 fs-8">Ideas</span>
                            <span class="badge badge-light-primary rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-heart me-1"></i>Student Welfare
                            </span>
                            <span class="badge badge-light-dark rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-incognito me-1"></i>ANONYMOUS
                            </span>
                          </div>

                          <!-- Anonymous banner -->
                          <div class="d-flex align-items-start gap-3 bg-light-success rounded-3 p-4 mb-4">
                            <i class="bi bi-shield-check-fill text-success fs-5 mt-1 flex-shrink-0"></i>
                            <span class="fs-7 text-gray-700">
                              <strong>This post was shared anonymously.</strong> The author's identity is completely hidden from all readers, including moderators.
                              <a href="#" class="text-success fw-semibold">Respect their privacy.</a>
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
                            <img src="/Discourse/assets/images/anonymous.png" alt="Anonymous" class="h-40px w-40px rounded-circle" />
                            <div class="d-flex flex-column">
                              <span class="fs-6 fw-bold text-gray-600">Anonymous</span>
                              <span class="text-muted fs-8"><i class="bi bi-clock me-1 fs-8"></i>4h ago</span>
                            </div>
                          </div>

                          <!-- Title -->
                          <h2 class="fs-3 fw-bold text-gray-800 mb-4">
                            [Anonymous] What if FEU had a no-grade-penalty mental health leave policy?
                          </h2>
                        </div>

                        <!-- Post Body -->
                        <div class="card-body pt-0 px-5">
                          <p class="fs-6 text-gray-700 mb-3">
                            Just thinking — a lot of students I know failed a whole semester because they were dealing with severe anxiety during midterms. The university had no mechanism to help them — just a "consult your prof" suggestion.
                          </p>
                          <p class="fs-6 text-gray-700 mb-4">
                            This isn't about gaming the system. It's about recognizing that mental health crises are medical events and should be treated as such. Student council, if you're reading this — this is worth fighting for.
                          </p>
                        </div>

                        <!-- Actions Row -->
                        <div class="card-body pt-0 px-5 pb-0">
                          <div class="d-flex justify-content-between align-items-center border-top border-bottom py-3">
                            <div class="d-flex flex-wrap gap-1">
                              <button class="btn btn-sm btn-light-success fw-semibold">
                                <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">187</span>
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-hand-thumbs-down"></i> Dislike
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-chat"></i> 2 Comments
                              </button>
                              <button class="btn btn-sm">
                                <i class="bi bi-share"></i> Share
                              </button>
                              <button class="btn btn-sm text-success">
                                <i class="bi bi-bookmark-fill"></i> Saved
                              </button>
                            </div>
                          </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="card-body px-5 py-5">
                          <h6 class="fs-6 fw-bold text-gray-800 mb-4">
                            Comments <span class="text-muted fw-normal fs-7">2</span>
                          </h6>

                          <!-- Comment 1 -->
                          <div class="d-flex gap-3 mb-4">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Ravi Joshi" class="h-35px w-35px rounded-circle flex-shrink-0" />
                            <div class="bg-light rounded-3 p-4 flex-grow-1">
                              <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="fs-7 fw-bold text-gray-800">Ravi Joshi</span>
                                <span class="text-muted fs-8">30m ago</span>
                                <span class="ms-auto text-muted fs-8">
                                  <i class="bi bi-hand-thumbs-up-fill me-1"></i>10
                                </span>
                              </div>
                              <p class="fs-7 text-gray-700 mb-2">This is so needed. The number of people I know who failed a sem because of mental health is alarming.</p>
                              <button class="btn btn-sm p-0 text-muted fs-8">
                                <i class="bi bi-reply me-1"></i>Reply
                              </button>
                            </div>
                          </div>

                          <!-- Comment 2 -->
                          <div class="d-flex gap-3 mb-4">
                            <img src="/Discourse/assets/images/anonymous.png" alt="Anonymous" class="h-35px w-35px rounded-circle flex-shrink-0" />
                            <div class="bg-light rounded-3 p-4 flex-grow-1">
                              <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="fs-7 fw-bold text-gray-800">Anonymous</span>
                                <span class="text-muted fs-8">30m ago</span>
                                <span class="ms-auto text-muted fs-8">
                                  <i class="bi bi-hand-thumbs-up-fill me-1"></i>6
                                </span>
                              </div>
                              <p class="fs-7 text-gray-700 mb-2">Student council should push for this. I'd sign that petition immediately.</p>
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

                      <!-- Anonymous Identity Card -->
                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5 text-center">
                          <div class="d-flex align-items-center justify-content-center bg-light-success rounded-circle mx-auto mb-4" style="width:56px;height:56px;">
                            <i class="bi bi-shield-lock-fill text-success fs-3"></i>
                          </div>
                          <h6 class="fs-5 fw-bold text-gray-800 mb-2">Identity Protected</h6>
                          <p class="fs-7 text-gray-600 mb-4">
                            This post was shared anonymously. The author's identity is not visible to anyone.
                          </p>
                          <ul class="list-unstyled text-start d-flex flex-column gap-2">
                            <li class="d-flex align-items-center gap-2 fs-7 text-gray-700">
                              <i class="bi bi-check-circle-fill text-success fs-7"></i> Identity hidden from all users
                            </li>
                            <li class="d-flex align-items-center gap-2 fs-7 text-gray-700">
                              <i class="bi bi-check-circle-fill text-success fs-7"></i> Hidden from moderators
                            </li>
                            <li class="d-flex align-items-center gap-2 fs-7 text-gray-700">
                              <i class="bi bi-check-circle-fill text-success fs-7"></i> No profile link to author shown
                            </li>
                          </ul>
                        </div>
                      </div>

                      <!-- Related Posts -->
                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-header border-0 bg-light py-4">
                          <h6 class="card-title mb-0 fw-bold fs-6">Related Posts</h6>
                        </div>
                        <div class="card-body p-0">
                          <a href="#" class="d-flex align-items-start gap-3 p-4 border-bottom text-decoration-none text-hover-primary">
                            <span class="badge badge-light-success rounded-pill px-3 py-2 fs-8 flex-shrink-0">#76</span>
                            <div>
                              <div class="fs-7 fw-semibold text-gray-800 mb-1">CS curriculum changes — honest discussion</div>
                              <div class="text-muted fs-8">Ideas · 2d ago</div>
                            </div>
                          </a>
                          <a href="#" class="d-flex align-items-start gap-3 p-4 text-decoration-none text-hover-primary">
                            <span class="badge badge-light-success rounded-pill px-3 py-2 fs-8 flex-shrink-0">#54</span>
                            <div>
                              <div class="fs-7 fw-semibold text-gray-800 mb-1">Is "third culture" identity the dominant student experience?</div>
                              <div class="text-muted fs-8">FEU · 1w ago</div>
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

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_scrolltop.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/discourse/partials/_discourse-modals.php'); ?>
  <script src="/Discourse/assets/plugins/global/plugins.bundle.js"></script>
  <script src="/Discourse/assets/js/scripts.bundle.js"></script>
  <script src="/Discourse/assets/js/dashboard.js"></script>
</body>

</html>