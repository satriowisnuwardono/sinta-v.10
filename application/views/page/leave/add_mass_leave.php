<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Mass Leave</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Annual Leave</li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Input Mass Leave Data</h3>
          </div>
           <?php echo form_open('mass_leave/add') ?>
          <div class="card-body">
            <div class="form-group row justify-content-center">
              <label for="mass_leave_code" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Mass Leave Code</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="mass_leave_code" name="mass_leave_code" value="CT_02" readonly>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="leave_name" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Information</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="leave_name" name="leave_name">
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="start_date" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Start Date</label>
              <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="start_date" id="start_date" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="end_date" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">End Date</label>
              <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="end_date" id="end_date" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="mass_leave_total" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Total</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="mass_leave_total" name="mass_leave_total">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?= base_url('mass_leave'); ?>" class="btn btn-warning"> Cancel</a>
            <button type="submit" name="btn" class="btn btn-success">Submit</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>