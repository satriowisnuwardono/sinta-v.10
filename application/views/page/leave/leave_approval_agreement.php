<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Approval Agreement</h1>
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
            <h3 class="card-title">Leave Request Form</h3>
            <span class="float-right"><strong></strong></span> 
          </div>
          <?php echo form_open(); ?>
          <div class="card-body">
            <?php foreach ($annual_leave as $al) { ?>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="checker1" hidden="">Checker</label>
                  <input type="hidden" name="checker1" id="checker1" class="form-control form-control-sm" value="<?php echo $al->checker1; ?>" readonly>
                  <small id="checker1" class="form-text text-danger"><?php echo form_error('checker1'); ?></small>
              </div>
              <div class="form-group col-sm-6">
                <label for="checker2" hidden="">Signer</label>
                  <input type="hidden" name="checker2" id="checker2" class="form-control form-control-sm" value="<?php echo $al->checker2; ?>" readonly>
                  <small id="checker2" class="form-text text-danger"><?php echo form_error('checker2'); ?></small>

                <input type="hidden" name="annual_leave_code" id="annual_leave_code" value="<?php echo $al->annual_leave_code; ?>">
                <input type="hidden" name="employee_code" id="employee_code" value="<?php echo $al->employee_code; ?>">
                <input type="hidden" name="id_annual_leave" id="id_annual_leave" value="<?php echo $al->id_annual_leave; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-3">
                <label for="date_of_application">Date of Application</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                    <input type="text" name="date_of_application" id="date_of_application" class="form-control form-control-sm" value="<?php echo $al->date_of_application; ?>" readonly>
                </div>
                
              </div>
              <div class="form-group col-sm-3">
                <label for="nik">NIK</label>
                
                  <input type="text" name="nik" id="nik" class="form-control form-control-sm" value="<?php echo $al->nik; ?>" readonly>
              
              </div>
              <div class="form-group col-sm-6">
                <label for="explanation">Explanation</label>
                <input type="text" name="explanation" id="explanation" class="form-control form-control-sm <?php echo form_error('explanation') ? 'is-invalid':'' ?>" value="<?php echo $al->explanation; ?>" readonly>
                <small id="explanation" class="form-text text-danger"><?php echo form_error('explanation'); ?></small>
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" value="<?php echo $al->name; ?>" readonly>
              </div>
              <div class="form-group col-sm-3">
                <label for="rdo">Remaining Day Off</label>
                <input type="text" name="rdo" id="rdo" class="form-control form-control-sm" value="<?php echo $al->rdo; ?>" readonly>
              </div>
              <div class="form-group col-sm-3">
                <label for="leave_taken">Leave Taken</label>
                <input type="text" name="leave_taken" id="leave_taken" class="form-control form-control-sm <?php echo form_error('leave_taken') ? 'is-invalid':'' ?>" value="<?php echo $al->leave_taken; ?>">
                <small id="leave_taken" class="form-text text-danger"><?php echo form_error('leave_taken'); ?></small>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="department_code">Department / Division</label>
                <input type="text" name="department_code" id="department_code" class="form-control form-control-sm" value="<?php echo $al->department_name; ?>" readonly>
              </div>
              <div class="form-group col-sm-2">
                <label for="leave_period">Leave Period</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                    <input type="text" name="leave_period" id="leave_period" class="form-control form-control-sm" value="<?php echo $al->leave_period; ?>" readonly>
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
                    <input type="date" name="leave_start_date" id="leave_start_date" class="form-control form-control-sm <?php echo form_error('leave_start_date') ? 'is-invalid':'' ?>" value="<?php echo $al->leave_start_date; ?>">
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
                    <input type="date" name="leave_end_date" id="leave_end_date" class="form-control form-control-sm <?php echo form_error('leave_end_date') ? 'is-invalid':'' ?>" value="<?php echo $al->leave_end_date; ?>">
                    <small id="end_date" class="form-text text-danger"><?php echo form_error('leave_end_date'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="position_code">position</label>
                <input type="text" name="position_code" id="position_code" class="form-control form-control-sm" value="<?php echo $al->position_name; ?>" readonly>
              </div>
              <div class="form-group col-sm-3">
                <label for="assignment_delegation">Assignment Delegation to</label>
                  <select class="form-control form-control-sm <?php echo form_error('assignment_delegation') ? 'is-invalid':'' ?>" name="assignment_delegation" id="assignment_delegation">
                      <?php foreach($employee as $row):?>
                        <?php if($row->employee_code == $al->assignment_delegation ) : ?>
                          <option value="<?= $row->employee_code;?>" selected><?= $row->nik;?> | <?= $row->name;?></option>
                        <?php else : ?>
                          <option value="<?= $row->employee_code;?>"><?= $row->nik;?> | <?= $row->name;?></option>
                        <?php endif; ?>
                      <?php endforeach;?>
                  </select>
                  <small id="assignment_delegation" class="form-text text-danger"><?php echo form_error('assignment_delegation'); ?></small>
              </div>
              <div class="form-group col-sm-3">
                <label for="delegation_position">Delegation Position</label>
                <input type="text" name="delegation_position" id="delegation_position" class="form-control form-control-sm <?php echo form_error('delegation_position') ? 'is-invalid':'' ?>" value="<?php echo $al->delegation_position; ?>">
                <small id="delegation_position" class="form-text text-danger"><?php echo form_error('delegation_position'); ?></small>
              </div>
            </div>
            <?php 
              //Cek checker
              if($al->status_checker1 == '0') {
            ?>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="checker1_comment">Checker Comment</label>
                <textarea class="form-control form-control-sm" name="checker1_comment" id="checker1_comment" rows="2"></textarea>
              </div>
              <div class="form-group col-sm-6">
                <label for="status_checker1">Approval Status</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status_checker1" value="1">
                  <label class="form-check-label">Approved</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status_checker1" value="2">
                  <label class="form-check-label">Rejected</label>
                </div>
              </div>
            </div>
            <?php 
              } 
            ?>

            <?php 
              //Cek checker
              if($al->status_checker1 == '1') {
            ?>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="checker2_comment">Signer Comment</label>
                <input type="hidden" name="status_checker1" id="status_checker1" value="<?php echo $al->status_checker1; ?>">
                <textarea class="form-control form-control-sm" name="checker2_comment" id="checker2_comment" rows="2"></textarea>
              </div>
              <div class="form-group col-sm-6">
                <label for="status_checker2">Approval Status</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status_checker2" value="1">
                  <label class="form-check-label">Approved</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status_checker2" value="2">
                  <label class="form-check-label">Rejected</label>
                </div>
              </div>
            </div>
            <?php } ?>
          <?php } ?>
          </div>
          <div class="card-footer">
            <button class="btn btn-success">Submit</button>
            <a href="<?php echo base_url('leave_request/leave_approval_list'); ?>" class="btn btn-secondary">Cancel</a>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>