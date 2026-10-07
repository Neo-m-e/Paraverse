<?php if(isset($_SESSION['loggedin']) || isset($_SESSION['ip_loggedin'])){ ?>
<div class="app-navbar-item ms-1 ms-md-4">
	<div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px search-users">
        <i class="ki-duotone ki-magnifier fs-2">
        	<span class="path1"></span>
        	<span class="path2"></span>
        </i>
    </div>
</div>
<?php } ?>