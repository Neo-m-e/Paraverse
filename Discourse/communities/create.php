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

    <!-- Discourse Styles copied from create post -->
    <link href="/Discourse/assets/css/discourse-css/create-post.css" rel="stylesheet" type="text/css" />

    <style>
        .cover-photo-preview-container {
            position: relative;
            width: 100%;
            height: 180px;
            border-radius: 6px;
            background: linear-gradient(135deg, #1e7145 0%, #0c3823 100%);
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            transition: background 0.3s ease;
        }
        .cover-photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .cover-photo-edit-badge {
            background: rgba(255, 255, 255, 0.95);
            color: #1e7145;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .cover-photo-edit-badge:hover {
            background: #ffffff;
            transform: scale(1.03);
        }
        .theme-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: transform 0.15s ease;
        }
        .theme-circle:hover {
            transform: scale(1.1);
        }
        .theme-circle.active {
            border-color: #333;
            transform: scale(1.1);
        }
        .color-picker-input {
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 0;
            background: none;
        }
        .color-picker-input::-webkit-color-swatch-wrapper {
            padding: 0;
        }
        .color-picker-input::-webkit-color-swatch {
            border: 2px solid #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
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

                            <div class="page-banner w-100 py-10 mb-8">
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

                                                    <div class="mb-6">
                                                        <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">Cover Photo *</label>
                                                        <div class="cover-photo-preview-container" id="cover-photo-preview">
                                                            <div class="cover-photo-overlay">
                                                                <div class="cover-photo-edit-badge" onclick="document.getElementById('cover_input').click()">
                                                                    <i class="bi bi-camera-fill"></i> Change Cover Image
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="file" id="cover_input" accept="image/*" class="d-none" onchange="previewBannerImage(this)">
                                                    </div>

                                                    <div class="mb-6">
                                                        <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">COMMUNITY NAME *</label>
                                                        <input type="text" id="comm_name" class="form-control form-control-solid border" placeholder="E.g. FEU Tech Web Developers" required>
                                                    </div>

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

                                                    <div class="mb-0">
                                                        <label class="form-label fs-8 fw-bold text-gray-700 text-uppercase">DESCRIPTION *</label>
                                                        <textarea id="comm_desc" class="form-control form-control-solid border" rows="6" placeholder="Describe the purpose, topics, and guidelines of your community..." required></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">

                                            <div class="card card-publish mb-6 shadow-none">
                                                <div class="card-body p-6">
                                                    <h5 class="fw-bolder text-dark mb-4 fs-5">Publish</h5>
                                                    
                                                    <div class="mb-6">
                                                        <label class="form-label fs-9 fw-bold text-gray-600 text-uppercase d-block mb-2">Color Setup Version</label>
                                                        <select class="form-select form-select-sm form-select-solid border" id="design-toggle-select" onchange="toggleDesignVersion(this.value)">
                                                            <option value="presets" selected>Design 1: Preset Circles</option>
                                                            <option value="picker">Design 2: Custom Color Picker</option>
                                                        </select>
                                                    </div>

                                                    <!-- Design 1: Presets -->
                                                    <div id="presets-panel" class="mb-6">
                                                        <label class="form-label fs-9 fw-bold text-gray-600 text-uppercase d-block mb-3">Theme Color Preset</label>
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <div class="theme-circle active" style="background-color: #1e7145;" data-color="#1e7145" onclick="selectPresetColor(this)"></div>
                                                            <div class="theme-circle" style="background-color: #0b5ed7;" data-color="#0b5ed7" onclick="selectPresetColor(this)"></div>
                                                            <div class="theme-circle" style="background-color: #6610f2;" data-color="#6610f2" onclick="selectPresetColor(this)"></div>
                                                            <div class="theme-circle" style="background-color: #d63384;" data-color="#d63384" onclick="selectPresetColor(this)"></div>
                                                            <div class="theme-circle" style="background-color: #dc3545;" data-color="#dc3545" onclick="selectPresetColor(this)"></div>
                                                            <div class="theme-circle" style="background-color: #212529;" data-color="#212529" onclick="selectPresetColor(this)"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Design 2: Color Picker -->
                                                    <div id="picker-panel" class="mb-6 d-none">
                                                        <label class="form-label fs-9 fw-bold text-gray-600 text-uppercase d-block mb-2">Custom Theme Color</label>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <input type="color" id="theme-color-picker" class="color-picker-input" value="#1e7145" oninput="pickerColorChanged(this.value)">
                                                            <div>
                                                                <span class="fs-7 fw-bold text-dark" id="color-hex-val">#1E7145</span>
                                                                <span class="text-muted d-block" style="font-size: 10px;">Select custom shade</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn w-100 btn-green mb-3 fw-bold" id="submit-btn">
                                                        <i class="bi bi-plus-lg me-1"></i> Create Community
                                                    </button>
                                                    <button type="button" class="btn w-100 btn-light bg-white border border-gray-300 text-dark fw-bold" onclick="window.location.href='/Discourse/communities/index.php'">Discard</button>
                                                </div>
                                            </div>

                                            <!-- Community Guidelines Card (mimics Tips card) -->
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
        let currentThemeColor = '#1e7145';
        let designMode = 'presets';

        // Select cover photo file upload preview (FB banner)
        function previewBannerImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cover-photo-preview')
                        .css('background-image', 'url(' + e.target.result + ')')
                        .attr('data-has-custom-img', 'true');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Switch between presets and color picker dynamically
        function toggleDesignVersion(mode) {
            designMode = mode;
            if (mode === 'presets') {
                $('#presets-panel').removeClass('d-none');
                $('#picker-panel').addClass('d-none');
            } else {
                $('#picker-panel').removeClass('d-none');
                $('#presets-panel').addClass('d-none');
            }
        }

        // Live preview preset color select
        function selectPresetColor(element) {
            $('.theme-circle').removeClass('active');
            $(element).addClass('active');

            const color = $(element).attr('data-color');
            updateActiveThemeColor(color);
        }

        // Live preview color picker change
        function pickerColorChanged(color) {
            $('#color-hex-val').text(color.toUpperCase());
            updateActiveThemeColor(color);
        }

        // Utility to adjust theme color updates on page
        function updateActiveThemeColor(color) {
            currentThemeColor = color;
            
            // Update default background gradient of cover image if no custom image upload is active
            if (!$('#cover-photo-preview').attr('data-has-custom-img')) {
                $('#cover-photo-preview').css('background', `linear-gradient(135deg, ${color} 0%, ${adjustColorBrightness(color, -25)} 100%)`);
            }

            // Update submit button color
            $('#submit-btn').css('background-color', color);
            $('.cover-photo-edit-badge').css('color', color);
        }

        // Adjust color brightness helper (for gradient creation)
        function adjustColorBrightness(hex, percent) {
            let R = parseInt(hex.substring(1, 3), 16);
            let G = parseInt(hex.substring(3, 5), 16);
            let B = parseInt(hex.substring(5, 7), 16);

            R = parseInt(R * (100 + percent) / 100);
            G = parseInt(G * (100 + percent) / 100);
            B = parseInt(B * (100 + percent) / 100);

            R = (R < 255) ? R : 255;
            G = (G < 255) ? G : 255;
            B = (B < 255) ? B : 255;

            const rHex = (R.toString(16).length === 1) ? "0" + R.toString(16) : R.toString(16);
            const gHex = (G.toString(16).length === 1) ? "0" + G.toString(16) : G.toString(16);
            const bHex = (B.toString(16).length === 1) ? "0" + B.toString(16) : B.toString(16);

            return "#" + rHex + gHex + bHex;
        }

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
