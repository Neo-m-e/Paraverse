<div id="kt_app_header" class="app-header bg-white" data-kt-sticky="true"
  data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
  data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">

  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
    <div class="app-navbar flex-shrink-0">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-applications-browser.php'); ?>
      <a href="<?= $LAF_BASE_URL ?>/" onclick="KTApp.showPageLoading()" class="d-flex align-items-center ms-4">
        <img src="<?= $LAF_BASE_URL ?>/assets/images/LAF-logo.svg" class="h-25px me-2" alt="Lost and Found">
      </a>
    </div>

    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1" id="kt_app_header_wrapper">
      <div class="app-header-menu app-header-mobile-drawer align-items-stretch"
        data-kt-drawer="true" data-kt-drawer-name="app-header-menu"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="250px" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
        data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
        data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
        <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
          id="kt_app_header_menu" data-kt-menu="true">
          <div class="menu-item me-0 me-lg-2"><a href="<?= $LAF_BASE_URL ?>/#laf-hero" class="menu-link"><span class="menu-title">Home</span></a></div>
          <div class="menu-item me-0 me-lg-2"><a href="<?= $LAF_BASE_URL ?>/#laf-getting-started" class="menu-link"><span class="menu-title">How It Works</span></a></div>
          <div class="menu-item me-0 me-lg-2"><a href="<?= $LAF_BASE_URL ?>/#laf-built" class="menu-link"><span class="menu-title">Features</span></a></div>
          <div class="menu-item me-0 me-lg-2"><a href="<?= $LAF_BASE_URL ?>/#laf-recently-surrendered" class="menu-link"><span class="menu-title">Surrendered Items</span></a></div>
        </div>
      </div>

      <div class="app-navbar flex-shrink-0 align-items-center">
        <div class="app-navbar-item ms-1 ms-md-3">
          <a href="<?= $LAF_BASE_URL ?>/discover.php" class="btn btn-sm btn-primary">Open Lost &amp; Found</a>
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
