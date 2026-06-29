<?php
if (!defined('MBG')) define('MBG', TRUE);
include_once($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

$META_TITLE = "Discourse - FEU Communities";
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

  <!-- jQuery -->
  <script src="/Discourse/assets/js/jquery.js"></script>
  <link rel="stylesheet" href="/Discourse/assets/css/discourse-css/index.css">
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
<div class="app-container container-xxl">
                
                <!-- Banner -->
                <div class="card mb-10 border-0 page-main-banner" style="background-color: #1A8B44; overflow: hidden; position: relative; transition: background-color 0.3s ease;">
                    <!-- decorative circles -->
                    <div class="position-absolute" style="top: -20px; left: -20px; width: 100px; height: 100px; background-color: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    <div class="position-absolute" style="bottom: 20px; left: 100px; width: 50px; height: 50px; background-color: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    <div class="position-absolute" style="top: 50px; right: 50px; width: 80px; height: 80px; background-color: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    <div class="position-absolute" style="bottom: -10px; right: 150px; width: 120px; height: 120px; background-color: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    
                    <div class="card-body p-15 text-center position-relative z-index-1">
                        <h1 class="text-white fw-bolder fs-2tx mb-3">Discover Your <span class="text-warning">FEU Communities</span></h1>
                        <p class="text-white fs-5 mb-8">Connect with fellow Tamaraws, share academic resources, discuss campus events, and build lasting friendships.</p>
                        
                        <div class="d-flex justify-content-center">
                            <div class="position-relative w-100 mw-600px text-start">
                                <span class="svg-icon svg-icon-2 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-5 start-0 z-index-1">
                                    <i class="fas fa-search fs-5 text-muted"></i>
                                </span>
                                <input type="text" id="communitySearch" class="form-control form-control-solid ps-13 rounded-pill bg-white border-0" placeholder="Search a community..." style="height: 50px;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters & Action -->
                <div class="d-flex flex-stack flex-wrap gap-4 mb-10">
                    <div class="d-flex align-items-center gap-2 overflow-auto" id="communityFilters">
                        <button class="filter-btn btn btn-success px-6 py-3 fw-bold active" data-filter="all" style="background-color: #1A8B44; color: white;">All</button>
                        <button class="filter-btn btn btn-outline btn-outline-dashed btn-outline-default text-muted bg-white px-6 py-3 fw-bold" data-filter="my-communities">My Communities</button>
                        <button class="filter-btn btn btn-outline btn-outline-dashed btn-outline-default text-muted bg-white px-6 py-3 fw-bold" data-filter="FEU ALABANG">FEU ALABANG</button>
                        <button class="filter-btn btn btn-outline btn-outline-dashed btn-outline-default text-muted bg-white px-6 py-3 fw-bold" data-filter="FEU DILIMAN">FEU DILIMAN</button>
                        <button class="filter-btn btn btn-outline btn-outline-dashed btn-outline-default text-muted bg-white px-6 py-3 fw-bold" data-filter="FEU TECH">FEU TECH</button>
                    </div>
                    <a href="create.php" class="btn btn-warning d-flex align-items-center gap-2 fw-bolder text-white px-6 py-3">
                        <i class="fas fa-plus text-white"></i> CREATE COMMUNITY
                    </a>
                </div>

                <!-- Cards Grid -->
                <div class="row g-6 mb-10" id="communities-grid">
                    <?php
                    // Backend/DB fetch removed per supervisor revision — hardcoded sample data muna.
                    $communities_list = [
                        ['title' => 'FEU Tech',    'category' => 'FEU TECH',    'desc' => 'Official hub for FEU Institute of Technology students — academics, projects, and campus life.', 'members' => 12300, 'posts' => 842, 'logo_url' => '', 'icon' => 'bi-cpu', 'theme_color' => '#17c653', 'admin_id' => 'T202110294'],
                        ['title' => 'FEU Life',    'category' => 'FEU ALABANG', 'desc' => 'Connect with fellow Tamaraws across all campuses — events, wellness, and student life.', 'members' => 4800, 'posts' => 311, 'logo_url' => '', 'icon' => 'bi-heart-fill', 'theme_color' => '#d63384', 'admin_id' => 'T202110001'],
                        ['title' => 'CultureHub',  'category' => 'FEU DILIMAN', 'desc' => 'Music, art, and creative collaborations from the FEU community.', 'members' => 2750, 'posts' => 198, 'logo_url' => '', 'icon' => 'bi-music-note-beamed', 'theme_color' => '#0b5ed7', 'admin_id' => 'T202110002'],
                        ['title' => 'Freshies',    'category' => 'FEU TECH',    'desc' => 'A space for incoming freshmen to ask questions and meet new friends.', 'members' => 3100, 'posts' => 145, 'logo_url' => '', 'icon' => 'bi-people-fill', 'theme_color' => '#1A8B44', 'admin_id' => 'T202110294'],
                    ];

                    if (empty($communities_list)) { ?>
                      <div class="col-12 text-center py-10 text-muted">
                        <i class="bi bi-people fs-1 d-block mb-3 opacity-50"></i>
                        <p class="fs-5 fw-bold mb-1">No communities yet</p>
                        <p class="fs-7">Be the first to create one!</p>
                      </div>
                    <?php }
                    foreach($communities_list as $community) {
                        $comm_cat = $community['category'] ?? ($community['cat'] ?? 'FEU TECH');
                        $comm_desc = $community['desc'];
                        $comm_title = $community['title'];
                        $comm_members = $community['members'];
                        $comm_posts = $community['posts'];
                        $is_joined = false;
                        $is_admin = ($community['admin_id'] ?? '') === ($identification ?? '');
                    ?>
                    <div class="col-md-4 col-lg-3 community-item" 
                         data-category="<?php echo htmlspecialchars($comm_cat); ?>"
                         data-is-joined="<?php echo $is_joined ? '1' : '0'; ?>"
                         data-is-admin="<?php echo $is_admin ? '1' : '0'; ?>">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-6 text-center d-flex flex-column">
                                <div class="mb-4 d-flex justify-content-center">
                                    <div class="w-60px h-60px rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="<?php echo !empty($community['logo_url']) ? 'background-image: url(\'' . htmlspecialchars($community['logo_url']) . '\'); background-size: cover; background-position: center;' : getLightColorStyle($community['theme_color']); ?>">
                                        <?php if (empty($community['logo_url'])) { ?>
                                        <i class="bi <?php echo htmlspecialchars($community['icon'] ?? 'bi-people-fill'); ?> fs-2hx" style="color: <?php echo htmlspecialchars($community['theme_color']); ?> !important;"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                                <h3 class="fs-6 fw-bolder mb-2 text-dark">
                                    <a href="/Discourse/communities/index.php?c=<?php echo urlencode($comm_title); ?>" class="text-dark text-hover-success"><?php echo htmlspecialchars($comm_title); ?></a>
                                </h3>
                                <p class="text-muted fs-8 mb-4 flex-grow-1"><?php echo htmlspecialchars($comm_desc); ?></p>
                                 <div class="d-flex justify-content-center gap-4 mb-4">
                                     <div class="border border-dashed border-gray-300 rounded px-3 py-2 w-50">
                                         <div class="fs-7 fw-bold text-dark d-flex align-items-center justify-content-center">
                                             <i class="fas fa-user fs-8 me-1"></i> <span class="comm-members-val"><?php echo number_format($comm_members); ?></span>
                                         </div>
                                         <div class="fs-9 text-muted">Members</div>
                                     </div>
                                     <div class="border border-dashed border-gray-300 rounded px-3 py-2 w-50">
                                         <div class="fs-7 fw-bold text-dark d-flex align-items-center justify-content-center">
                                             <i class="fas fa-edit fs-8 me-1"></i> <?php echo number_format($comm_posts); ?>
                                         </div>
                                         <div class="fs-9 text-muted">Posts</div>
                                     </div>
                                 </div>
                                 <?php 
                                 // Already loaded above
                                 ?>
                                  <button class="btn btn-sm w-100 d-flex align-items-center justify-content-center gap-2 dc-list-join-btn" 
                                          data-comm-title="<?php echo htmlspecialchars($comm_title); ?>" 
                                          style="background-color: <?php echo $is_joined ? '#fbc501' : '#1A8B44'; ?>; color: white; border: none;">
                                     <i class="fas <?php echo $is_joined ? 'fa-check' : 'fa-plus'; ?> text-white fs-8"></i> 
                                     <span class="join-btn-text"><?php echo $is_joined ? 'JOINED' : 'JOIN COMMUNITY'; ?></span>
                                 </button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>



              </div>
            </main>
          </div>
          <?php include(dirname(__DIR__) . "/partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include(dirname(__DIR__) . "/partials/_scrolltop.php"); ?>

  <!-- Theme Color Picker Script -->
  <script>
    $(document).ready(function() {
        // 0. Custom topic tags
        var commTopics = [];

        function renderTopicTags() {
            var wrap = $('#comm-topics-wrap');
            wrap.empty();
            commTopics.forEach(function(t, i) {
                wrap.append(
                    $('<span class="badge bg-light-success text-success fw-bold px-3 py-2 d-inline-flex align-items-center gap-1" style="font-size:12px;"></span>')
                    .text(t)
                    .append($('<i class="bi bi-x ms-1" style="cursor:pointer;font-size:11px;"></i>').on('click', function() {
                        commTopics.splice(i, 1);
                        renderTopicTags();
                    }))
                );
            });
            $('#comm-topics-hidden').val(commTopics.join(','));
        }

        $('#comm-topic-add-btn').on('click', function() {
            var val = $('#comm-topic-input').val().trim();
            if (val && commTopics.length < 20 && !commTopics.includes(val)) {
                commTopics.push(val.charAt(0).toUpperCase() + val.slice(1));
                renderTopicTags();
            }
            $('#comm-topic-input').val('').focus();
        });
        $('#comm-topic-input').on('keypress', function(e) {
            if (e.which === 13) { e.preventDefault(); $('#comm-topic-add-btn').click(); }
        });

        // Reset topics on modal close
        $('#create_community_modal').on('hidden.bs.modal', function() {
            commTopics = [];
            renderTopicTags();
        });

        // 1. Handle theme color selection
        $('.theme-color-btn').on('click', function() {
            $('.theme-color-btn').removeClass('active');
            $('#comm-theme-color-custom').removeClass('active');
            $(this).addClass('active');
            const selectedColor = $(this).attr('data-color');
            $('.modal-theme-header').css('background-color', selectedColor);
        });
        $('#comm-theme-color-custom').on('input change', function() {
            $('.theme-color-btn').removeClass('active');
            $(this).addClass('active');
            const selectedColor = $(this).val();
            $('.modal-theme-header').css('background-color', selectedColor);
        });

        // 2. Filter and search functionality for cards
        function filterAndSearch() {
            const query = $('#communitySearch').val().toLowerCase();
            const activeFilter = $('.filter-btn.active').data('filter');
            
            $('.community-item').each(function() {
                const title = $(this).find('h3').text().toLowerCase();
                const desc = $(this).find('p').text().toLowerCase();
                
                const matchesQuery = title.includes(query) || desc.includes(query);
                const matchesFilter = (activeFilter === 'all') || 
                                      (activeFilter === 'my-communities' && ($(this).attr('data-is-joined') === '1' || $(this).attr('data-is-admin') === '1')) ||
                                      ($(this).data('category') === activeFilter);
                
                if (matchesQuery && matchesFilter) {
                    $(this).fadeIn(200);
                } else {
                    $(this).hide();
                }
            });
        }

        $('#communitySearch').on('keyup', filterAndSearch);

        $('.filter-btn').on('click', function(e) {
            e.preventDefault();
            $('.filter-btn').removeClass('active btn-success').css({'background-color': '', 'color': ''}).addClass('bg-white text-muted btn-outline btn-outline-dashed btn-outline-default');
            $(this).addClass('active btn-success').removeClass('bg-white text-muted btn-outline btn-outline-dashed btn-outline-default').css({'background-color': '#1A8B44', 'color': 'white'});
            filterAndSearch();
        });

        // 3. Add create community dynamic creation
        $('#create-community-form').on('submit', function(e) {
            e.preventDefault();
            
            const name = $('#comm-name').val();
            const desc = $('#comm-desc').val();
            let cat = $('#comm-cat').val();
            if (!cat) cat = 'my-communities';
            const activeColor = $('.theme-color-btn.active').length ? $('.theme-color-btn.active').attr('data-color') : ($('#comm-theme-color-custom').val() || '#1A8B44');
            const selectedIcon = $('#comm-icon').val() || 'bi-people-fill';
            
            var formData = new FormData();
            formData.append('name', name);
            formData.append('desc', desc);
            formData.append('School', cat);
            formData.append('theme_color', activeColor);
            formData.append('icon', selectedIcon);
            formData.append('custom_topics', commTopics.join(','));
            
            var logoFile = $('#comm-logo')[0].files[0];
            if (logoFile) {
                formData.append('logo', logoFile);
            }
            
            function hexToRgba(hex, opacity) {
                hex = hex.replace('#', '');
                let r, g, b;
                if (hex.length === 3) {
                    r = parseInt(hex.charAt(0) + hex.charAt(0), 16);
                    g = parseInt(hex.charAt(1) + hex.charAt(1), 16);
                    b = parseInt(hex.charAt(2) + hex.charAt(2), 16);
                } else {
                    r = parseInt(hex.substring(0, 2), 16);
                    g = parseInt(hex.substring(2, 4), 16);
                    b = parseInt(hex.substring(4, 6), 16);
                }
                return `rgba(${r}, ${g}, ${b}, ${opacity})`;
            }
            
            $.ajax({
                url: '/Discourse/communities/index-ajax-add-community.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const comm = response.community;
                        let icon = comm.icon || 'bi-cpu';
                        
                        let logoStyles = '';
                        let logoIconHtml = `<i class="bi ${icon} fs-2hx" style="color: ${comm.theme_color} !important;"></i>`;
                        if (comm.logo_url) {
                            logoStyles = `background-image: url('${comm.logo_url}'); background-size: cover; background-position: center;`;
                            logoIconHtml = '';
                        } else {
                            logoStyles = `background-color: ${hexToRgba(comm.theme_color, 0.1)} !important; color: ${comm.theme_color} !important;`;
                        }

                         const newCard = `
                         <div class="col-md-4 col-lg-3 community-item" data-category="${comm.category}" data-is-admin="1" style="display: none;">
                             <div class="card h-100 shadow-sm border-0">
                                 <div class="card-body p-6 text-center d-flex flex-column">
                                     <div class="mb-4 d-flex justify-content-center">
                                         <div class="w-60px h-60px rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="${logoStyles}">
                                             ${logoIconHtml}
                                         </div>
                                     </div>
                                    <h3 class="fs-6 fw-bolder mb-2 text-dark">
                                        <a href="/Discourse/communities/index.php?c=${encodeURIComponent(comm.title)}" class="text-dark text-hover-success">${comm.title}</a>
                                    </h3>
                                    <p class="text-muted fs-8 mb-4 flex-grow-1">${comm.desc}</p>
                                    <div class="d-flex justify-content-center gap-4 mb-4">
                                        <div class="border border-dashed border-gray-300 rounded px-3 py-2 w-50">
                                            <div class="fs-7 fw-bold text-dark d-flex align-items-center justify-content-center">
                                                <i class="fas fa-user fs-8 me-1"></i> <span class="comm-members-val">${comm.members}</span>
                                            </div>
                                            <div class="fs-9 text-muted">Members</div>
                                        </div>
                                        <div class="border border-dashed border-gray-300 rounded px-3 py-2 w-50">
                                            <div class="fs-7 fw-bold text-dark d-flex align-items-center justify-content-center">
                                                <i class="fas fa-edit fs-8 me-1"></i> ${comm.posts}
                                            </div>
                                            <div class="fs-9 text-muted">Posts</div>
                                        </div>
                                    </div>
                                     <button class="btn btn-sm w-100 d-flex align-items-center justify-content-center gap-2 dc-list-join-btn" 
                                             data-comm-title="${comm.title}" 
                                             style="background-color: #fbc501; color: white; border: none;">
                                        <i class="fas fa-check text-white fs-8"></i> 
                                        <span class="join-btn-text">JOINED</span>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                        
                        $('#communities-grid').prepend(newCard);
                        $('#communities-grid .community-item:first').fadeIn(400);
                        
                        $('#create_community_modal').modal('hide');
                        $('#create-community-form')[0].reset();
                        
                        // Reset modal theme header color to default
                        $('.modal-theme-header').css('background-color', '#1A8B44');
                        $('.theme-color-btn').removeClass('active');
                        $('.theme-color-btn[data-color="#1A8B44"]').addClass('active');

                        // Switch to the 'All' or 'My Communities' tab to see it if filtered
                        $('.filter-btn[data-filter="all"]').click();
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error creating community. Please try again.');
                }
            });
        });

        // Handle Join Community button in the grid list
        $(document).on('click', '.dc-list-join-btn', function(e) {
            e.preventDefault();
            const btn = $(this);
            const commTitle = btn.attr('data-comm-title');
            const card = btn.closest('.community-item');
            const memberCountSpan = card.find('.comm-members-val');
            
            const isAdmin = card.attr('data-is-admin') === '1';
            const isJoined = btn.find('.join-btn-text').text().trim() === 'JOINED';
            if (isJoined && isAdmin) {
                alert('You cannot leave this community because you are the admin. Please assign a new admin first.');
                return;
            }

            $.ajax({
                url: '/Discourse/communities/index-ajax-join-community.php',
                method: 'POST',
                data: { community_title: commTitle },
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        const textSpan = btn.find('.join-btn-text');
                        const icon = btn.find('i');
                        if (res.joined) {
                            btn.css('background-color', '#fbc501');
                            textSpan.text('JOINED');
                            icon.removeClass('fa-plus').addClass('fa-check');
                            card.attr('data-is-joined', '1');
                        } else {
                            btn.css('background-color', '#1A8B44');
                            textSpan.text('JOIN COMMUNITY');
                            icon.removeClass('fa-check').addClass('fa-plus');
                            card.attr('data-is-joined', '0');
                            
                            const activeFilter = $('.filter-btn.active').data('filter');
                            if (activeFilter === 'my-communities' && card.attr('data-is-admin') !== '1') {
                                card.fadeOut(200);
                            }
                        }
                        if (res.members_count !== null && memberCountSpan.length) {
                            memberCountSpan.text(res.members_count.toLocaleString());
                        }
                    } else {
                        alert(res.message || 'Error processing request.');
                    }
                },
                error: function() {
                    alert('Error communicating with database.');
                }
            });
        });
    });
  </script>
</body>

</html>
