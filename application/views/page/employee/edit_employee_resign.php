    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Employee Resign</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-users"></i> Employee</a></li>
              <li class="breadcrumb-item"> <?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h1 class="card-title"><i class="fa fa-plus-square"></i> 
              Update Employee Data
            </h1>
          </div>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php echo form_open_multipart('employee/edit_resign') ?>
          <div class="card-body">
            <input type="hidden" name="id" id="id" class="form-control form-control-sm" value="<?php echo $employee->id; ?>">
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="employee_code">Employee Code</label>
                  <input type="text" name="employee_code" id="employee_code" class="form-control form-control-sm" value="<?php echo $employee->employee_code; ?>" readonly>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="nik">NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control form-control-sm <?php echo form_error('nik') ? 'is-invalid':'' ?>" value="<?php echo $employee->nik; ?>" <?= ($this->session->userdata('role_code') == '3' ? "readonly" : "") ?> readonly>
                  <small id="nik" class="form-text text-danger"><?php echo form_error('nik'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="name">Full Name</label>
                  <input type="text" name="name" id="name" class="form-control form-control-sm <?php echo form_error('name') ? 'is-invalid':'' ?>" value="<?php echo $employee->name; ?>" readonly>
                  <small id="name" class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="gender">Gender</label>
                  <input type="text" name="gender" id="gender" class="form-control form-control-sm" value="<?php echo $employee->gender ?>" readonly>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3 col-sm-12">
                <div class="position-relative form-group">
                  <label for="place_of_birth">Place of Birth</label>
                  <input type="text" name="place_of_birth" id="place_of_birth" class="form-control form-control-sm <?php echo form_error('place_of_birth') ? 'is-invalid':'' ?>" value="<?php echo $employee->place_of_birth; ?>" readonly>
                  <small id="place_of_birth" class="form-text text-danger"><?php echo form_error('place_of_birth'); ?></small>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="position-relative form-group">
                  <label for="date_of_birth">Date of Birth</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control form-control-sm <?php echo form_error('date_of_birth') ? 'is-invalid':'' ?>" value="<?php echo $employee->date_of_birth; ?>" readonly>
                  </div>
                  <small id="date_of_birth" class="form-text text-danger"><?php echo form_error('date_of_birth'); ?></small>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="religion">Religion</label>
                  <select class="form-control form-control-sm" name="religion_code" id="religion_code" readonly>
                    <?php foreach ($religion as $r) :?>
                      <?php if($r->religion_code == $employee->religion_code ) : ?>
                          <option value="<?= $r->religion_code;?>" selected><?= $r->religion_name;?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="marital_status">Marital Status</label>
                  <select class="form-control form-control-sm" name="marital_status_code" id="marital_status_code" readonly>
                    <?php foreach ($marital_status as $ms) :?>
                      <?php if($ms->marital_status_code == $employee->marital_status_code ) : ?>
                          <option value="<?= $ms->marital_status_code;?>" selected><?= $ms->marital_status;?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" name="phone_number" id="phone_number" class="form-control form-control-sm" value="<?php echo $employee->phone_number; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="id_number">ID Card Number</label>
                  <input type="text" name="id_number" id="id_number" class="form-control form-control-sm <?php echo form_error('id_number') ? 'is-invalid':'' ?>" value="<?php echo $employee->id_number; ?>" readonly>
                  <small id="id_number" class="form-text text-danger"><?php echo form_error('id_number'); ?></small>
                </div>
              </div>
              
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="npwp">NPWP Number</label>
                  <input type="text" name="npwp" id="npwp" class="form-control form-control-sm" value="<?php echo $employee->npwp; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control form-control-sm" rows="2" name="address" id="address" readonly><?php echo $employee->address; ?></textarea>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="reference">Reference</label>
                  <input type="text" name="reference" id="reference" class="form-control form-control-sm" value="<?php echo $employee->reference; ?>" readonly>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <div class="row">
                    <label for="photos" class="col-md-2 col-form-label">Photo</label>
                      <div class="col-md-3">
                        <img src="<?php echo base_url();?>assets/dist/photos/<?php echo $employee->photos;?>" alt="user profile" class="profile-user-img img-fluid">\
                        <input type="hidden" name="old_image" id="photos" class="form-control" value="<?php echo $employee->photos;?>">
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="resign_date">Resign Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="resign_date" id="resign_date" class="form-control form-control-sm <?php echo form_error('resign_date') ? 'is-invalid':'' ?>" value="<?php echo $employee->resign_date; ?>" >
                  </div>
                  <small id="resign_date" class="form-text text-danger"><?php echo form_error('resign_date'); ?></small>
                </div>
              </div>
            </div>
          </div>
           <div class="card-footer">
            <div class="float-right">
              <a href="<?= base_url('employee/employee_details/'.$employee->employee_code); ?>" class="btn btn-warning"> Cancel</a>
              <button type="submit" name="btn" class="btn btn-success">Submit</button>
            </div>
          </div>
        <?php echo form_close(); ?>
     </div>
   </section>
    <!-- /.content -->