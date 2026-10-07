<div id="kt_app_header" class="app-header bg-white" data-kt-sticky="true"
  data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
  data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">

  <div class="app-container container-xxl d-none justify-content-start align-items-center position-absolute h-100 bg-white"
    style="z-index: 999;">
    <div id="search-box"></div>
  </div>

  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">

    <div class="app-navbar flex-shrink-0">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-applications-browser.php'); ?>
      <a href="<?= $LAF_BASE_URL ?>/" onclick="KTApp.showPageLoading()" class="d-flex align-items-center ms-4">
        <img src="/LAF/lost-and-found/assets/images/LAF-logo.svg" class="h-25px me-2"> </a>
    </div>

    <div class="d-flex align-items-stretch justify-content-end" id="kt_app_header_wrapper">
      <div class="app-navbar flex-shrink-0 align-items-center">

        <!-- Lost and Found Admin -->
        <div class="app-navbar-item ms-1 ms-md-3">
          <a href="<?= $LAF_ADMIN_URL ?>/" class="btn btn-sm btn-light-primary">
            <i class="ki-duotone ki-setting-2 fs-5">
              <span class="path1"></span><span class="path2"></span>
            </i>
            Admin
          </a>
        </div>

        <div class="app-navbar-item ms-1 ms-md-3">
          <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px">
            <i class="bi bi-bell-fill fs-5"></i>
          </div>
        </div>

        <div class="d-none">
          <?php
          include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-app-item-login.php');
          include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-app-item-hamburger.php');
          ?>
        </div>

      </div>
    </div>
  </div>
</div>