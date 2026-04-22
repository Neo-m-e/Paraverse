<div id="kt_app_header" class="app-header bg-white" data-kt-sticky="true"
  data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
  data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">

  <div
    class="app-container container-xxl d-none justify-content-start align-items-center position-absolute h-100 bg-white"
    style="z-index: 999;">
    <div id="search-box"></div>
  </div>

  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between "
    id="kt_app_header_container">

    <div class="app-navbar flex-shrink-0">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-applications-browser.php'); ?>
      <a href="//" onclick="KTApp.showPageLoading()" class="d-flex align-items-center">
        <h1 class="mb-0">
          <img src="" class="h-20px">
          <span class="fw-bolder text-primary d-none"></span>
        </h1>
      </a>
    </div>

    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1" id="kt_app_header_wrapper">

      <div class="app-header-menu app-header-mobile-drawer align-items-stretch " data-kt-drawer="true"
        data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
        data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
        data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
        <div
          class=" menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
          id="kt_app_header_menu" data-kt-menu="true">

          <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <a href="/badges" onclick="KTApp.showPageLoading()" class="menu-link text-hover-primary">
              <span class="menu-title">Badges</span>
            </a>
          </div>

        </div>
      </div>

      <div class="app-navbar flex-shrink-0">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-user-menu.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-app-item-login.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/includes/widget-app-item-hamburger.php');
        ?>
      </div>

    </div>

  </div>
</div>
