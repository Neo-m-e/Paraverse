<?php
if (!defined('MBG')) define('MBG', TRUE);
include_once($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

$META_TITLE = "Create a Community - Discourse";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $META_TITLE; ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/Discourse/assets/img/favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Metronic Core CSS -->
    <link rel="stylesheet" href="/Discourse/assets/plugins/global/plugins.bundle.css">
    <link rel="stylesheet" href="/Discourse/assets/css/style.keenicons.css">
    <link rel="stylesheet" href="/Discourse/assets/css/style.bundle.v2.full.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="/Discourse/assets/js/jquery.js"></script>

    <!-- Discourse Styles -->
    <link href="/Discourse/assets/css/discourse-css/create-post.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="light-header" class="app-default">
    <?php include(dirname(__DIR__) . "/partials/_page-loader.php"); ?>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?php include(dirname(__DIR__) . "/partials/_header.php"); ?>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <main>

                            <!-- Banner -->
                            <div class="page-banner w-100 py-10 mb-8" style="background-color: #0c3823;">
                                <div class="app-container container-xxl d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-yellow fw-bold fs-8 text-uppercase tracking-wider mb-1 d-block">NEW COMMUNITY</span>
                                        <h1 class="text-white fw-bolder fs-2tx mb-2">Create a Community</h1>
                                        <p class="text-white text-opacity-75 fs-7 mb-0">Build a dedicated space for your group, interests, or courses</p>
                                    </div>
                                    <button class="btn btn-sm btn-outline btn-outline-white text-white border-white border-opacity-25 px-6" onclick="window.location.href='/Discourse/communities/index.php'">Back</button>
                                </div>
                            </div>

                            <div class="app-container container-xxl pb-10">
                                <form id="createCommunityForm" onsubmit="handleFormSubmit(event)">
                                    <div class="row g-6">
                                        
                                        <!-- Main Form -->
                                        <div class="col-lg-8">
                                            <div class="card border border-gray-300 shadow-none rounded-2">
                                                <div class="card-body p-8">

                                                    <div class="d-flex align-items-center gap-3 mb-8">
                                                        <div class="w-25px h-25px bg-light-success rounded d-flex align-items-center justify-content-center" style="background-color: rgba(23, 198, 83, 0.12) !important; color: #17c653 !important;">
                                                            <i class="bi bi-people-fill fs-7" style="color: #17c653 !important;"></i>
                                                        </div>
                                                        <h3 class="fw-bolder text-dark fs-4 m-0">Community Details</h3>
                                                    </div>

                                                    <!-- Community Name -->
                                                    <div class="mb-6">
                                                        <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">COMMUNITY NAME *</label>
                                                        <input type="text" id="comm_name" class="form-control form-control-solid border" placeholder="E.g. FEU Tech Web Developers" required>
                                                    </div>

                                                    <!-- School & Privacy selectors -->
                                                    <div class="row g-4 mb-6">
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">SCHOOL *</label>
                                                            <select id="comm_school" class="form-select form-select-solid border" data-hide-search="true" required>
                                                                <option value="FEU TECH" selected>FEU TECH</option>
                                                                <option value="FEU ALABANG">FEU ALABANG</option>
                                                                <option value="FEU DILIMAN">FEU DILIMAN</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">GROUP PRIVACY *</label>
                                                            <select id="comm_privacy" class="form-select form-select-solid border" data-hide-search="true" required>
                                                                <option value="Public" selected>PUBLIC</option>
                                                                <option value="Private">PRIVATE</option>
                                                                <option value="Invite Only">INVITE ONLY</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Description -->
                                                    <div class="mb-0">
                                                        <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">DESCRIPTION *</label>
                                                        <textarea id="comm_desc" class="form-control form-control-solid border" rows="6" placeholder="Describe the purpose, topics, and guidelines of your community..." required></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sidebar -->
                                        <div class="col-lg-4">

                                            <!-- Publish Card -->
                                            <div class="card card-publish mb-6 shadow-none">
                                                <div class="card-body p-6">
                                                    <h5 class="fw-bolder text-dark mb-4 fs-5">Publish</h5>
                                                    
                                                    <p class="text-muted fs-8 mb-6">Ready to launch? Your community will be created immediately with automatic initial letters as its avatar.</p>

                                                    <button type="submit" class="btn w-100 btn-green mb-3 fw-bold">
                                                        <i class="bi bi-plus-lg me-1"></i> Create Community
                                                    </button>
                                                    <button type="button" class="btn w-100 btn-light bg-white border border-gray-300 text-dark fw-bold" onclick="window.location.href='/Discourse/communities/index.php'">Discard</button>
                                                </div>
                                            </div>

                                            <!-- Community Guidelines Card -->
                                            <div class="card rules-card shadow-none">
                                                <div class="card-body p-6">
                                                    <h5 class="fw-bolder text-dark mb-4 fs-5 d-flex align-items-center gap-2">
                                                        <i class="bi bi-lightbulb fs-4"></i> Guidelines
                                                    </h5>
                                                    <ul class="list-unstyled mb-0 fs-8">
                                                        <li class="d-flex align-items-start gap-2 mb-3">
                                                            <span class="tips-bullet">•</span>
                                                            <span>Choose a clear name representing your cohort or interests.</span>
                                                        </li>
                                                        <li class="d-flex align-items-start gap-2 mb-3">
                                                            <span class="tips-bullet">•</span>
                                                            <span>Define guidelines in your description to set member expectations.</span>
                                                        </li>
                                                        <li class="d-flex align-items-start gap-2">
                                                            <span class="tips-bullet">•</span>
                                                            <span>As the creator, you will automatically be assigned as community moderator.</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </main>
                    </div>
                    <?php include(dirname(__DIR__) . "/partials/_footer.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include(dirname(__DIR__) . "/partials/_scrolltop.php"); ?>

    <script>
        // Submit form
        function handleFormSubmit(event) {
            event.preventDefault();
            const name = $('#comm_name').val();
            const school = $('#comm_school').val();
            const privacy = $('#comm_privacy').val();

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    text: `Community "${name}" (${privacy}) has been successfully created under ${school}!`,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-green"
                    }
                }).then(function () {
                    window.location.href = "/Discourse/communities/index.php";
                });
            } else {
                alert(`Community "${name}" (${privacy}) created for ${school}!`);
                window.location.href = "/Discourse/communities/index.php";
            }
        }
    </script>
</body>

</html>
