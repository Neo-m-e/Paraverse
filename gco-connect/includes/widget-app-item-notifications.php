<?php if(isset($_SESSION['loggedin']) || isset($_SESSION['ip_loggedin']) || isset($_SESSION['temp_loggedin'])){ ?>
<div class="app-navbar-item ms-1 ms-md-4">

    <div class="btn btn-icon btn-custom position-relative btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
        <i class="ki-duotone ki-notification fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path2"></span>
        </i> 
        <?php 
            $notificationCount = countNotifications(); 
            if($notificationCount > 0){ 
                echo '<span class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-danger w-15px h-15px ms-n4 mt-3">'. $notificationCount .'</span>';
            }
        ?>
    </div>

    <div class="menu menu-notifications menu-sub menu-sub-dropdown menu-column w-100 w-lg-500px" data-kt-menu="true" id="edith_notifications" user="<?php echo $identification; ?>">
        <div class="notifications-body scroll-y mh-325px my-5 mx-0 row">
            <h4 class="col-12 px-8 mb-3">Notifications</h4>
        </div>

        <div class="notifications-footer py-2 text-center border-top d-none">
            <a href="/notifications" class="btn btn-color-gray-600 btn-active-color-primary">
                View All Notifications
                <i class="ki-duotone ki-arrow-right fs-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </a>             
        </div>
    </div>

</div>
<?php } ?>