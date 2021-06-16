<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Cancellation</h1>
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
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Leave Cancellation</h3> 
          </div>

          <?php echo form_open(); ?>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="cancellation_agreement">Cancellation Agreement</label>
                <select class="form-control form-control-sm <?php echo form_error('cancellation_agreement') ? 'is-invalid':'' ?>" name="cancellation_agreement" id="cancellation_agreement">
                  <option value="">No Selected</option>
                    <?php foreach($employee as $row):?>
                      <option value="<?php echo $row->employee_code;?>"><?php echo $row->nik;?> | <?php echo $row->name;?></option>
                    <?php endforeach;?>
                </select>
                <small id="cancellation_agreement" class="form-text text-danger"><?php echo form_error('cancellation_agreement'); ?></small>
              </div>
            </div>
            <hr>

            <?php foreach ($annual_leave as $row) { }; ?>
            <div class="row">
              <div class="form-group col-sm-3">
                <label for="date_of_application">Date of Application</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                    <input type="text" name="date_of_application" id="date_of_application" class="form-control form-control-sm" value="<?php echo $row->date_of_application; ?>" readonly>
                </div>
              </div>
              <div class="form-group col-sm-3">
                <label for="nik">NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control form-control-sm" value="<?php echo $row->nik; ?>" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label for="explanation">Explanation</label>
                <input type="text" name="explanation" id="explanation" class="form-control form-control-sm <?php echo form_error('explanation') ? 'is-invalid':'' ?>" value="<?php echo $row->explanation; ?>" readonly>
                <small id="explanation" class="form-text text-danger"><?php echo form_error('explanation'); ?></small>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-sm" value="<?php echo $row->name; ?>" readonly>
              </div>
              <div class="form-group col-sm-3">
                <label for="rdo">Remaining Day Off</label>
                <input type="text" name="rdo" id="rdo" class="form-control form-control-sm" value="<?php echo $row->rdo; ?>" readonly>
              </div>
              <div class="form-group col-sm-3">
                <label for="leave_taken">Leave Taken</label>
                <input type="text" name="leave_taken" id="leave_taken" class="form-control form-control-sm <?php echo form_error('leave_taken') ? 'is-invalid':'' ?>" value="<?php echo $row->leave_taken; ?>">
                <small id="leave_taken" class="form-text text-danger"><?php echo form_error('leave_taken'); ?></small>
              </div>
            </div>

                      <div class="row">
              <div class="form-group col-sm-6">
                <label for="department_code">Department / Division</label>
                <input type="text" name="department_code" id="department_code" class="form-control form-control-sm" value="<?php echo $row->department_name; ?>" readonly>
              </div>
              <div class="form-group col-sm-2">
                <label for="leave_period">Leave Period</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                    <input type="text" name="leave_period" id="leave_period" class="form-control form-control-sm" value="<?php echo $row->leave_period; ?>" readonly>
                </div>
              </div>
              <div class="form-group col-sm-2">
                <label for="start_date">Start Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                    <input type="date" name="leave_start_date" id="leave_start_date" class="form-control form-control-sm <?php echo form_error('leave_start_date') ? 'is-invalid':'' ?>" value="<?php echo $row->leave_start_date; ?>">
                    <small id="start_date" class="form-text text-danger"><?php echo form_error('leave_start_date'); ?></small>
                </div>
              </div>
              <div class="form-group col-sm-2">
                <label for="end_date">End Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                    <input type="date" name="leave_end_date" id="leave_end_date" class="form-control form-control-sm <?php echo form_error('leave_end_date') ? 'is-invalid':'' ?>" value="<?php echo $row->leave_end_date; ?>">
                    <small id="end_date" class="form-text text-danger"><?php echo form_error('leave_end_date'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="position_code">position</label>
                <input type="text" name="position_code" id="position_code" class="form-control form-control-sm" value="<?php echo $row->position_name; ?>" readonly>
              </div>
              <div class="form-group col-sm-3">
                <label for="assignment_delegation">Assignment Delegation to</label>
                  <select class="form-control form-control-sm <?php echo form_error('assignment_delegation') ? 'is-invalid':'' ?>" name="assignment_delegation" id="assignment_delegation" readonly>
                      <?php foreach($employee as $emp):?>
                        <?php if($emp->employee_code == $row->assignment_delegation ) : ?>
                          <option value="<?= $emp->employee_code;?>" selected=""><?= $emp->nik;?> | <?= $emp->name;?></option>
                        <?php endif; ?>
                      <?php endforeach;?>
                  </select>
                  <small id="assignment_delegation" class="form-text text-danger"><?php echo form_error('assignment_delegation'); ?></small>
              </div>
              <div class="form-group col-sm-3">
                <label for="delegation_position">Delegation Position</label>
                <input type="text" name="delegation_position" id="delegation_position" class="form-control form-control-sm <?php echo form_error('delegation_position') ? 'is-invalid':'' ?>" value="<?php echo $row->delegation_position; ?>"  readonly>
                <small id="delegation_position" class="form-text text-danger"><?php echo form_error('delegation_position'); ?></small>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-12">
                <label for="reason_for_cancellation">Reason for Cancellation</label>
                <textarea class="form-control <?php echo form_error('reason_for_cancellation') ? 'is-invalid':'' ?>" rows="3" name="reason_for_cancellation" id="reason_for_cancellation"></textarea>
                <small id="reason_for_cancellation" class="form-text text-danger"><?php echo form_error('reason_for_cancellation'); ?></small>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-12">
                <input type="hidden" name="id_annual_leave" id="id_annual_leave" class="form-control form-control-sm" value="<?php echo $row->id_annual_leave; ?>">
                <input type="hidden" name="annual_leave_code" id="annual_leave_code" class="form-control form-control-sm" value="<?php echo $row->annual_leave_code ?>">
                <input type="hidden" name="employee_code" id="employee_code" class="form-control form-control-sm" value="<?php echo $row->employee_code ?>">
                <input type="hidden" name="status_checker1" id="status_checker1" class="form-control form-control-sm" value="<?php echo $row->status_checker1 ?>">
                <input type="hidden" name="checker1" id="checker1" class="form-control form-control-sm" value="<?php echo $row->checker1 ?>">
                <input type="hidden" name="status_checker2" id="status_checker2" class="form-control form-control-sm" value="<?php echo $row->status_checker2 ?>">
                <input type="hidden" name="checker2" id="checker2" class="form-control form-control-sm" value="<?php echo $row->checker2 ?>">
                <input type="hidden" name="status_cancellation_agreement" id="status_cancellation_agreement" class="form-control form-control-sm" value="1">
              </div>
            </div>

          </div>


          <div class="card-footer">
            <button class="btn btn-success">Submit</button>
            <a href="<?php echo base_url('leave_request/leave_approval_list'); ?>" class="btn btn-secondary">Cancel</a>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>