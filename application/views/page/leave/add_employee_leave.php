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
            <h3 class="card-title">Add Employee Leave Rights</h3>
          </div>
          <div class="card-body">
            <?php echo form_open('annual_leave/process_input'); ?>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="employee_code">Name</label>
                  <select class="form-control form-control-sm theSelect" name="employee_code" id="employee_code">
                    <option value="">No Selected</option>
                      <?php foreach($employee as $row):?>
                        <option value="<?php echo $row->employee_code;?>"><?php echo $row->nik;?> | <?php echo $row->name;?></option>
                      <?php endforeach;?>
                  </select>
              </div>
              <div class="form-group col-sm-6">
                <label for="employee_entry_date">Hired Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="employee_entry_date" id="employee_entry_date" class="form-control form-control-sm">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="leave_period">Leave Period</label>
                <input type="text" name="leave_period" id="leave_period" class="form-control form-control-sm">
              </div>
              <div class="form-group col-sm-6">
                <label for="total">Total</label>
                <input type="text" name="total" id="total" class="form-control form-control-sm">
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
                    <input type="date" name="effective_date" id="effective_date" class="form-control form-control-sm">
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
                    <input type="date" name="valid_until" id="valid_until" class="form-control form-control-sm">
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-sm btn-success" type="submit" name="btn">Submit</button>
            <a href="" class="btn btn-warning btn-sm">Cancel</a>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>