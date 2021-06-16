<?php
	//cek apakah terdapat session name message
if ($this->session->flashdata('message')) {
	//jika ad
	echo "<div class='alert'>".$this->session->flashdata('message')."</div>";
	//tampilkan pesannya
}
?>

	<form action="<?php echo base_url('auth/login') ?>" method="post">
		<div class="input-group mb-3">
			<input type="text" name="username" class="form-control" placeholder="Username">
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-user"></span>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<input type="password" name="password" class="form-control" placeholder="Password">
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-lock"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- /.col -->
			<div class="col-12">
				<button type="submit" class="btn btn-primary btn-block">Log In</button>
			</div>
			<!--/.col -->
		</div>
	</form>