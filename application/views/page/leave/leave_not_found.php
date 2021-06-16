<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Annual Leave Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Annual Leave</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
	      <div class="error-page">
	        <div class="error-content">
	          <h3 class="text-center"><i class="fas fa-exclamation-triangle text-warning"></i> Oops! You don't have leave yet</h3>

	          <p style="text-align: center">
	            We could not find your leave data in the database.<br>
	            Meanwhile, you may <a href="<?php echo base_url('dashboard'); ?>"> return to dashboard</a> or use other features.
	          </p>
	        </div>
	        <!-- /.error-content -->
	      </div>
	      <!-- /.error-page -->
      </div>
    </section>