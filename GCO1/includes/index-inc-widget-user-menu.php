<?php if (
    isset($_SESSION['loggedin']) ||
    (isset($_SESSION['ip_loggedin']) and strpos($currentUrl, '/briefcase/') !== false) ||
    (isset($_SESSION['temp_loggedin']) !== false)
) { ?>
    <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
        <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img data-src="<?php echo getUserAvatar($identification, "MD"); ?>" class="lozad bg-dark rounded-3"
                alt="<?php echo DISPLAY_NAME($ACCOUNT); ?>" />
        </div>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
            data-kt-menu="true">
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="<?php echo getUserAvatar($identification, "MD"); ?>" />
                    </div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            <?php echo DISPLAY_NAME($ACCOUNT); ?>
                        </div>
                        <span class="fw-semibold text-muted fs-7"><?php echo $identification; ?></span>
                    </div>
                </div>
            </div>

            <?php
            include("widget-menu-briefcase.php");
            include("widget-menu-mflix.php");
            include("widget-menu-credentials.php");
            include("widget-menu-eventually.php");
            include("widget-menu-gco-connect.php");
            include("widget-menu-icare.php");
            include("widget-menu-network-map.php");
            ?>

            <div class="separator my-2"></div>
            <div class="menu-item px-5">
                <p class="px-5 mb-0 text-uppercase fs-8 fw-bold text-gray-600">Account</p>
            </div>

            <div class="menu-item px-5">
                <a href="/portal/" onclick="KTApp.showPageLoading()" class="menu-link px-5">Portal</a>
            </div>
            <div class="menu-item px-5">
                <a href="/account/me/" onclick="KTApp.showPageLoading()" class="menu-link px-5">Account Settings</a>
            </div>
            <div class="menu-item px-5">
                <a href="/account/logout" onclick="KTApp.showPageLoading()" class="menu-link px-5">Sign Out</a>
            </div>
        </div>
    </div>
<?php } ?>