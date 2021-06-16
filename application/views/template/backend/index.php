<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('template/_partials/head') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<?php $this->load->view('template/_partials/navbar') ?>

		<?php $this->load->view('template/_partials/sidebar') ?>

		<!-- Main Content -->
		<div class="content-wrapper">
			<?php echo $datacontent ?>
		</div>
		<!-- End Main Content -->

		<?php $this->load->view('template/_partials/footer') ?>
	</div>

	<?php $this->load->view('template/_partials/js') ?>

	<?php $this->load->view('template/_partials/modal') ?>
</body>
</html>