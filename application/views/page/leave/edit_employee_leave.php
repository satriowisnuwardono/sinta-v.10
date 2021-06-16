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
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">Edit Employee Leave Rights</h3>
          </div>
          <div class="card-body">
            <?php echo form_open('annual_leave/process_update'); ?>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="employee_code">Employee Code</label>
                <input type="text" name="employee_code" id="employee_code" class="form-control form-control-sm" value="<?php echo $leave_right->employee_code; ?>" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label for="employee_entry_date">Hired Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="employee_entry_date" id="employee_entry_date" class="form-control form-control-sm" value="<?php echo $leave_right->employee_entry_date; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="leave_periode">Leave Period</label>
                <input type="text" name="leave_period" id="leave_period" class="form-control form-control-sm" value="<?php echo $leave_right->leave_period; ?>">
              </div>
              <div class="form-group col-sm-6">
                <label for="total">Total</label>
                <input type="text" name="total" id="total" class="form-control form-control-sm" value="<?php echo $leave_right->total; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="effective_date">Effective Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="effective_date" id="effective_date" class="form-control form-control-sm" value="<?php echo $leave_right->effective_date; ?>">
                </div>
              </div>
              <div class="form-group col-sm-6">
                <label for="valid_until">End Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="valid_until" id="valid_until" class="form-control form-control-sm" value="<?php echo $leave_right->valid_until; ?>">
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <input type="hidden" name="id" id="id" class="form-control form-control-sm" value="<?php echo $leave_right->id; ?>">
            <button class="btn btn-sm btn-success" type="submit" name="btn">Submit</button>
            <a href="<?php echo base_url('annual_leave/annual_leave_master'); ?>" class="btn btn-warning btn-sm">Cancel</a>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>