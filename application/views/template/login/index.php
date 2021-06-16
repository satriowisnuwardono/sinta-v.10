<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('template/_partials/head'); ?>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card">
			<div class="login-logo">
				<i class="fab fa-staylinked"></i><br>
				<h4>
					<b>SYSTEM MANAGEMENT DATA</b>
				</h4>
			</div>
		<div class="card-body login-card-body">

			<p class="login-box-msg">Sign in to start your session</p>
			<?php 
			/*
			*variable $datacontent diambil dari core/My_controller.php
			*(application/core/My_Controller)
			*/
			echo $datacontent;
			?>
		</div>
		</div>
	</div>
	<?php $this->load->view('template/_partials/js'); ?>
</body>
</html>