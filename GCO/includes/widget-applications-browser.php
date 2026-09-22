<?php if (isset($_SESSION['loggedin']) || isset($_SESSION['ip_loggedin']) || isset($_SESSION['temp_loggedin'])) { ?>

    <?php /** INDUSTRY PARTNER VALIDATION **/
    if (!isset($_SESSION['ip_loggedin'])) { ?>
        <div class="app-navbar-item me-4 pe-4 border-end">
            <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-start">
                <img src="/assets/img/logo/icon-paraverse.svg" class="w-100">
            </div>
            <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-500px" data-kt-menu="true">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Paraverse Applications</div>
                    </div>
                    <div class="card-body bg-white py-5">
                        <div class="mh-450px scroll-y me-n5 pe-5">
                            <div class="row g-2">
                                <?php
                                $SQL = "SELECT * FROM apps ORDER BY sequence";
                                $RESULT = mysqli_query($EDITH, $SQL);
                                while ($APP = mysqli_fetch_array($RESULT)) {
                                    $APP['icon'] = $APP['icon'] == "avatar" ? getUserAvatar($identification, "SM") : $APP['icon'];
                                    $disabled = $APP['web'] == 1 ? "disabled opacity-25" : null;
                                    echo '
                						<div class="col-3">
    	            						<a href="' . $APP['slug'] . '" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3 ' . $disabled . '">
    		                                    <img data-src="' . $APP['icon'] . '" class="lozad w-25px h-25px mb-2"/>
    		                                    <span class="fw-semibold ellipsis">' . $APP['name'] . '</span>
    		                                </a>
    	                                </div>
                					';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php } else { ?>
    <a href="/portal/" onclick="KTApp.showPageLoading()" class="d-flex align-items-center me-4 pe-4 border-end">
        <img src="/assets/img/logo.png" class="h-35px">
    </a>
<?php } ?>