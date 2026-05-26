<?php
/* Refactored: custom CSS → Bootstrap/Metronic utilities */
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "Poll: How do you actually study for finals? Be honest.";
$META_DESC  = "A poll from FEU Tech Discourse community.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/Discourse/assets/css/dashboard.css" rel="stylesheet" type="text/css" />
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

              <div style="background: linear-gradient(135deg, #0b3220 0%, #1a5c38 60%, #2D6A4F 100%); padding: 28px 0 22px;">
                <div class="app-container container-xxl position-relative">
                  <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                    <div>
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-eye-fill text-white opacity-75 fs-7"></i>
                        <span class="text-white opacity-75 fs-8 fw-bold text-uppercase ls-1">Viewing Post</span>
                      </div>
                      <h1 class="text-white fs-2 fw-bolder mb-1">
                        <span class="me-2">📊</span>How do you actually study for finals? Be honest.
                      </h1>
                      <p class="text-white opacity-65 fs-7 mb-0">
                        <span class="me-1">FEU · Academic Life</span>·
                        <span class="mx-1">Posted by Marco Torres</span>·
                        <span class="mx-1">4h ago · 442 votes</span>
                      </p>
                    </div>
                    <a href="/Discourse/index.php" class="btn btn-sm btn-light fw-bold flex-shrink-0 mt-2">
                      <i class="bi bi-arrow-left me-1"></i> Back to Feed
                    </a>
                  </div>
                </div>
              </div>
              <div id="kt_app_content" class="flex-column-fluid">
                <div class="app-container container-xxl py-5">
                  <div class="row g-5 align-items-start">

                    <div class="col-lg-8">
                      <div class="card border-0 shadow mb-5">

                        <div class="card-body pb-0 pt-5 px-5">

                          <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="badge badge-light-success rounded-pill px-4 py-2 fs-8">FEU</span>
                            <span class="badge badge-light-primary rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-journal-text me-1"></i>Academic Life
                            </span>
                            <span class="badge badge-light-warning rounded-pill px-4 py-2 fs-8">
                              <i class="bi bi-bar-chart-fill me-1"></i>POLL
                            </span>
                          </div>

                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-light-success rounded-pill px-5 py-2 fs-8">FEUTech</span>
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalReportPost">
                              <i class="bi bi-flag me-1"></i> Report
                            </button>
                          </div>

                          <div class="d-flex gap-3 align-items-center mb-4">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Marco Torres" class="h-40px w-40px rounded-circle" />
                            <div class="d-flex flex-column">
                              <a href="#" class="fs-6 fw-bold text-gray-800 text-hover-primary">Marco Torres</a>
                              <span class="text-muted fs-8"><i class="bi bi-clock me-1 fs-8"></i>4h ago</span>
                            </div>
                            <span class="badge badge-light-success rounded-pill px-5 py-2 fs-8">ACADEMIC LIFE</span>
                          </div>

                          <h2 class="fs-3 fw-bold text-gray-800 mb-4">
                            📊 Poll: How do you actually study for finals? Be honest.
                          </h2>
                        </div>

                        <div class="card-body pt-0 px-5">
                          <p class="fs-6 text-gray-700 mb-5">
                            Curious how my fellow FEU Tech students survive finals season. Drop your honest answer below 👇
                          </p>

                          <div class="card border border-success border-opacity-25 bg-light-success mb-4">
                            <div class="card-body p-5">
                              <h6 class="fs-6 fw-bold text-gray-800 mb-4">Choose your study strategy:</h6>

                              <?php 
                              // Control variable: Gawing true kapag bumoto na (mula sa DB) para lumitaw ang results
                              $HAS_VOTED = false; 

                              if ($HAS_VOTED): 
                                // ─── STATE A: USER HAS VOTED (Show Percentages & Progress Bars) ───
                              ?>
                                <div class="mb-4">
                                  <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fs-7 text-gray-700">Start early, study consistently</span>
                                    <span class="fs-8 fw-bold text-gray-600">28%</span>
                                  </div>
                                  <div class="bg-white rounded-pill overflow-hidden" style="height:8px;">
                                    <div class="bg-success rounded-pill h-100" style="width:28%;"></div>
                                  </div>
                                </div>

                                <div class="mb-4">
                                  <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fs-7 fw-semibold text-gray-800">Cram the night before</span>
                                    <span class="fs-8 fw-bold text-warning">45%</span>
                                  </div>
                                  <div class="bg-white rounded-pill overflow-hidden" style="height:8px;">
                                    <div class="bg-warning rounded-pill h-100" style="width:45%;"></div>
                                  </div>
                                </div>

                                <div class="mb-4">
                                  <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fs-7 text-gray-700">Rely on group chats and past papers</span>
                                    <span class="fs-8 fw-bold text-gray-600">19%</span>
                                  </div>
                                  <div class="bg-white rounded-pill overflow-hidden" style="height:8px;">
                                    <div class="bg-success rounded-pill h-100" style="width:19%;"></div>
                                  </div>
                                </div>

                                <div class="mb-4">
                                  <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fs-7 text-gray-700">Pray and submit anyway</span>
                                    <span class="fs-8 fw-bold text-gray-600">8%</span>
                                  </div>
                                  <div class="bg-white rounded-pill overflow-hidden" style="height:8px;">
                                    <div class="bg-success rounded-pill h-100" style="width:8%;"></div>
                                  </div>
                                </div>

                              <?php else: 
                                // ─── STATE B: USER HAS NOT VOTED (Show Clean Clickable Radio Options) ───
                              ?>
                                <form id="poll_vote_form" method="POST" action="submit-vote.php" class="mb-4">
                                  
                                  <label class="d-flex align-items-center p-3 rounded-3 border border-gray-300 bg-white cursor-pointer mb-3 text-hover-success transition-all" style="transition: 0.2s ease;">
                                    <input type="radio" name="poll_choice" value="1" class="form-check-input me-3" style="width:18px; height:18px; cursor: pointer;">
                                    <span class="fs-7 text-gray-800 fw-medium">Start early, study consistently</span>
                                  </label>

                                  <label class="d-flex align-items-center p-3 rounded-3 border border-gray-300 bg-white cursor-pointer mb-3 text-hover-success transition-all" style="transition: 0.2s ease;">
                                    <input type="radio" name="poll_choice" value="2" class="form-check-input me-3" style="width:18px; height:18px; cursor: pointer;">
                                    <span class="fs-7 text-gray-800 fw-medium">Cram the night before</span>
                                  </label>

                                  <label class="d-flex align-items-center p-3 rounded-3 border border-gray-300 bg-white cursor-pointer mb-3 text-hover-success transition-all" style="transition: 0.2s ease;">
                                    <input type="radio" name="poll_choice" value="3" class="form-check-input me-3" style="width:18px; height:18px; cursor: pointer;">
                                    <span class="fs-7 text-gray-800 fw-medium">Rely on group chats and past papers</span>
                                  </label>

                                  <label class="d-flex align-items-center p-3 rounded-3 border border-gray-300 bg-white cursor-pointer mb-4 text-hover-success transition-all" style="transition: 0.2s ease;">
                                    <input type="radio" name="poll_choice" value="4" class="form-check-input me-3" style="width:18px; height:18px; cursor: pointer;">
                                    <span class="fs-7 text-gray-800 fw-medium">Pray and submit anyway</span>
                                  </label>

                                  <button type="submit" class="btn btn-success btn-sm w-100 fw-bold py-3 fs-7">
                                    <i class="bi bi-check-circle me-1"></i> Submit Vote
                                  </button>
                                </form>
                              <?php endif; ?>

                              <p class="text-muted fs-8 mb-0 border-top pt-3 mt-2">
                                <i class="bi bi-people-fill me-1"></i>442 votes · 3 days left ·
                                <a href="#" class="text-success fw-semibold fs-8">Feu-voted</a>
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="card-body pt-0 px-5 pb-0">
                          <div class="d-flex justify-content-between align-items-center border-top border-bottom py-3">
                            <div class="d-flex flex-wrap gap-1">
                              <button class="btn btn-sm btn-light-success fw-semibold">
                                <i class="bi bi-hand-thumbs-up-fill"></i> Like <span class="ms-1 fw-bold">441</span>
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
                              <button class="btn btn-sm">
                                <i class="bi bi-bookmark"></i> Save
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="card-body px-5 py-5">
                          <h6 class="fs-6 fw-bold text-gray-800 mb-4">
                            Comments <span class="text-muted fw-normal fs-7">2</span>
                          </h6>

                          <div class="d-flex gap-3 mb-4">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Sofia Karin" class="h-35px w-35px rounded-circle flex-shrink-0" />
                            <div class="bg-light rounded-3 p-4 flex-grow-1">
                              <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="fs-7 fw-bold text-gray-800">Sofia Karin</span>
                                <span class="text-muted fs-8">30m ago</span>
                                <span class="ms-auto text-muted fs-8">
                                  <i class="bi bi-hand-thumbs-up-fill me-1"></i>10
                                </span>
                              </div>
                              <p class="fs-7 text-gray-700 mb-2">The last option is way too relatable lmao.</p>
                              <button class="btn btn-sm p-0 text-muted fs-8">
                                <i class="bi bi-reply me-1"></i>Reply
                              </button>
                            </div>
                          </div>

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
                              <p class="fs-7 text-gray-700 mb-2">Group chats are the actual syllabus honestly.</p>
                              <button class="btn btn-sm p-0 text-muted fs-8">
                                <i class="bi bi-reply me-1"></i>Reply
                              </button>
                            </div>
                          </div>

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
                    <div class="col-lg-4">

                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-header border-0 bg-light py-4">
                          <h6 class="card-title mb-0 fw-bold fs-6">About the Author</h6>
                        </div>
                        <div class="card-body p-5">
                          <div class="d-flex align-items-center gap-3 mb-5">
                            <img src="/Discourse/assets/images/catalina.webp" alt="Marco Torres" class="h-50px w-50px rounded-circle" />
                            <div>
                              <a href="#" class="fs-6 fw-bold text-gray-800 text-hover-primary d-block">Marco Torres</a>
                              <span class="text-muted fs-8 d-block">1302/2047 · Computer Engineering</span>
                            </div>
                          </div>
                          <div class="d-flex justify-content-around text-center mb-5">
                            <div>
                              <div class="fs-5 fw-bold text-gray-800">22</div>
                              <div class="text-muted fs-8">Posts</div>
                            </div>
                            <div>
                              <div class="fs-5 fw-bold text-gray-800">876</div>
                              <div class="text-muted fs-8">Followers</div>
                            </div>
                            <div>
                              <div class="fs-5 fw-bold text-gray-800">64</div>
                              <div class="text-muted fs-8">Following</div>
                            </div>
                          </div>
                          <a href="#" class="btn btn-sm btn-light-success w-100 fw-bold">
                            <i class="bi bi-person-plus-fill me-1"></i> Follow
                          </a>
                        </div>
                      </div>

                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-header border-0 bg-light py-4">
                          <h6 class="card-title mb-0 fw-bold fs-6">More Polls</h6>
                        </div>
                        <div class="card-body p-0">
                          <a href="#" class="d-flex align-items-start gap-3 p-4 border-bottom text-decoration-none text-hover-primary">
                            <span class="badge badge-light-warning rounded-pill px-3 py-2 fs-8 flex-shrink-0">#21</span>
                            <div>
                              <div class="fs-7 fw-semibold text-gray-800 mb-1">What's the hardest part of the CS program?</div>
                              <div class="text-muted fs-8">FEU · 4h ago · 80 pts</div>
                            </div>
                          </a>
                          <a href="#" class="d-flex align-items-start gap-3 p-4 text-decoration-none text-hover-primary">
                            <span class="badge badge-light-warning rounded-pill px-3 py-2 fs-8 flex-shrink-0">#21</span>
                            <div>
                              <div class="fs-7 fw-semibold text-gray-800 mb-1">Best FEU canteen stall, definitive</div>
                              <div class="text-muted fs-8">FEU · 3d ago · 105 votes</div>
                            </div>
                          </a>
                        </div>
                      </div>

                      <div class="card border-0 shadow-sm mb-5">
                        <div class="card-header border-0 bg-light py-4">
                          <h6 class="card-title mb-0 fw-bold fs-6">Poll Stats</h6>
                        </div>
                        <div class="card-body p-5">
                          <div class="d-flex flex-column gap-3">
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="fs-7 text-gray-600">Total votes</span>
                              <span class="fs-7 fw-bold text-gray-800">442</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="fs-7 text-gray-600">Time remaining</span>
                              <span class="badge badge-light-warning fs-8 fw-bold">3 days</span>
                            </div>
                            <div class="separator my-1"></div>
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="fs-8 text-gray-600">Start early…</span>
                              <span class="fs-8 fw-semibold text-gray-700">28 votes</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="fs-8 text-gray-600">Cram the night before</span>
                              <span class="fs-8 fw-semibold text-gray-700">104 votes</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="fs-8 text-gray-600">Group chats &amp; papers</span>
                              <span class="fs-8 fw-semibold text-gray-700">87 votes</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="fs-8 text-gray-600">Pray and submit</span>
                              <span class="fs-8 fw-bold text-success">222</span>
                            </div>
                          </div>
                        </div>
                      </div>

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