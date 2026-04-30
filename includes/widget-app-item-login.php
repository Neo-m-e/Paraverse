<?php if (!isset($_SESSION['loggedin']) and !isset($_SESSION['ip_loggedin']) and !isset($_SESSION['temp_loggedin'])) { ?>
	<div id="edith-btn-login" class="app-navbar-item ms-1 ms-md-4">
		<div class="d-flex align-items-center">
			<a href="..."
				onclick="KTApp.showPageLoading()"
				class="btn btn-icon btn-sm fw-bold btn-active-opacity-75"
				style="background-color: #F97316 !important; transition: all 0.2s ease;">
				<i class="fa fa-lock text-white"></i>
			</a>
		</div>
	</div>
<?php } ?>