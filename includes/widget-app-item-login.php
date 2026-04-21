<?php if (!isset($_SESSION['loggedin']) and !isset($_SESSION['ip_loggedin']) and !isset($_SESSION['temp_loggedin'])) { ?>
	<div id="edith-btn-login" class="app-navbar-item ms-1 ms-md-4">
		<div class="d-flex align-items-center">
			<a href="/api/v1/account/login-checkpoint?redirect_to=<?php echo ($_SERVER['REQUEST_URI'] == "/") ? "/portal" : $_SERVER['REQUEST_URI']; ?>"
				onclick="KTApp.showPageLoading()" class="btn btn-icon btn-primary btn-active-dark btn-sm fw-bold">
				<i class="fa fa-lock text-white"></i>
			</a>
		</div>
	</div>
<?php } ?>