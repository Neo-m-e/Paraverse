<div id="kt_app_header" class="app-header bg-white" data-kt-sticky="true"
  data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
  data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
    <div class="app-navbar flex-shrink-0">
      <?php
      $applicationsWidget = $_SERVER['DOCUMENT_ROOT'] . '/includes/widget-applications-browser.php';
      if (file_exists($applicationsWidget)) include($applicationsWidget);
      ?>
      <a href="<?= $LAF_BASE_URL ?>/" onclick="KTApp.showPageLoading()" class="d-flex align-items-center ms-4">
        <img src="<?= $LAF_BASE_URL ?>/assets/images/LAF-logo.svg" class="h-25px" alt="Lost and Found">
      </a>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="<?= $LAF_ADMIN_URL ?>/" class="btn btn-sm btn-light-primary">
        <i class="ki-duotone ki-setting-2 fs-5"><span class="path1"></span><span class="path2"></span></i>
        Admin
      </a>
      <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-40px h-40px">
        <i class="bi bi-bell-fill fs-5"></i>
      </div>
      <div class="symbol symbol-40px symbol-circle">
        <img src="<?= $LAF_BASE_URL ?>/assets/images/catalina.webp" alt="User">
      </div>
    </div>
  </div>
</div>
