    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Employee</h1> 
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
              Edit Employee Data
            </h1>
          </div>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php echo form_open_multipart('employee/edit') ?>
          <div class="card-body">
            <input type="hidden" name="id" id="id" class="form-control form-control-sm" value="<?php echo $employee->id; ?>">
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="employee_code">Employee Code</label>
                  <input type="text" name="employee_code" id="employee_code" class="form-control form-control-sm" value="<?php echo $employee->employee_code; ?>" readonly>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="nik">NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control form-control-sm <?php echo form_error('nik') ? 'is-invalid':'' ?>" value="<?php echo $employee->nik; ?>" <?= ($this->session->userdata('role_code') == '3' ? "readonly" : "") ?> >
                  <small id="nik" class="form-text text-danger"><?php echo form_error('nik'); ?></small>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="id_number">ID Card Number</label>
                  <input type="text" name="id_number" id="id_number" class="form-control form-control-sm <?php echo form_error('id_number') ? 'is-invalid':'' ?>" value="<?php echo $employee->id_number; ?>" <?= ($this->session->userdata('role_code') == '3' ? "readonly" : "") ?> >
                  <small id="id_number" class="form-text text-danger"><?php echo form_error('id_number'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="name">Full Name</label>
                  <input type="text" name="name" id="name" class="form-control form-control-sm <?php echo form_error('name') ? 'is-invalid':'' ?>" value="<?php echo $employee->name; ?>">
                  <small id="name" class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="place_of_birth">Place of Birth</label>
                  <input type="text" name="place_of_birth" id="place_of_birth" class="form-control form-control-sm <?php echo form_error('place_of_birth') ? 'is-invalid':'' ?>" value="<?php echo $employee->place_of_birth; ?>" >
                  <small id="place_of_birth" class="form-text text-danger"><?php echo form_error('place_of_birth'); ?></small>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="date_of_birth">Date of Birth</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control form-control-sm <?php echo form_error('date_of_birth') ? 'is-invalid':'' ?>" value="<?php echo $employee->date_of_birth; ?>" >
                  </div>
                  <small id="date_of_birth" class="form-text text-danger"><?php echo form_error('date_of_birth'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="gender">Gender</label>
                  <select name="gender" id="gender" class="form-control form-control-sm">
                    <option selected><?php echo $employee->gender; ?></option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="religion">Religion</label>
                  <select class="form-control form-control-sm" name="religion_code" id="religion_code">
                    <?php foreach ($religion as $r) :?>
                      <?php if($r->religion_code == $employee->religion_code ) : ?>
                          <option value="<?= $r->religion_code;?>" selected><?= $r->religion_name;?></option>
                        <?php else : ?>
                          <option value="<?= $r->religion_code;?>"><?= $r->religion_name;?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="marital_status">Marital Status</label>
                  <select class="form-control form-control-sm" name="marital_status_code" id="marital_status_code">
                    <?php foreach ($marital_status as $ms) :?>
                      <?php if($ms->marital_status_code == $employee->marital_status_code ) : ?>
                          <option value="<?= $ms->marital_status_code;?>" selected><?= $ms->marital_status;?></option>
                        <?php else : ?>
                          <option value="<?= $ms->marital_status_code;?>"><?= $ms->marital_status;?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="nationality">Nationality</label>
                  <select name="nationality" id="nationality" class="form-control form-control-sm">
                    <option selected value=""><?= $employee->nationality ?></option>
                    <option>WNI</option>
                    <option>WNA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="address">Address</label>
                  <input class="form-control form-control-sm" name="address" id="address" value="<?php echo $employee->address; ?>">
                </div>
              </div>
              <div class="col-md-2 col-sm-12">
                <div class="position-relative form-group">
                  <label for="neighborhood">Neighborhood</label>
                  <input class="form-control form-control-sm" name="neighborhood" id="neighborhood" value="<?php echo $employee->neighborhood; ?>">
                </div>
              </div>
              <div class="col-md-2 col-sm-12">
                <div class="position-relative form-group">
                  <label for="hamlet">Hamlet</label>
                  <input class="form-control form-control-sm" name="hamlet" id="hamlet" value="<?php echo $employee->hamlet; ?>">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="urban_village">Urban Village</label>
                  <input type="text" name="urban_village" id="urban_village" class="form-control form-control-sm" value="<?= $employee->urban_village; ?>">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="sub_district">Sub District</label>
                  <input type="text" name="sub_district" id="sub_district" class="form-control form-control-sm" value="<?= $employee->sub_district; ?>">
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="regency">Regency</label>
                  <input type="text" name="regency" id="regency" class="form-control form-control-sm" value="<?= $employee->regency; ?>">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="province">Province</label>
                  <input type="text" name="province" id="province" class="form-control form-control-sm" value="<?= $employee->province; ?>">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="zip">Zip Code</label>
                  <input type="text" name="zip" id="zip" class="form-control form-control-sm" value="<?= $employee->zip; ?>">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" name="phone_number" id="phone_number" class="form-control form-control-sm" value="<?= $employee->phone_number; ?>">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="last_education">Last Education</label>
                  <select name="last_education" id="last_education" class="form-control form-control-sm">
                    <option selected value=""><?= $employee->last_education; ?></option>
                    <option>SD</option>
                    <option>SMP</option>
                    <option>SMA</option>
                    <option>DIPLOMA I</option>
                    <option>DIPLOMA II</option>
                    <option>DIPLOMA III</option>
                    <option>DIPLOMA IV</option>
                    <option>STRATA I</option>
                    <option>STRATA II</option>
                    <option>STRATA III</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="majors">Majors</label>
                  <input type="text" name="majors" id="majors" class="form-control form-control-sm" value="<?= $employee->majors; ?>">
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" class="form-control form-control-sm" value="<?= $employee->email; ?>">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="hired_date">Hired Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="hired_date" id="hired_date" class="form-control form-control-sm <?php echo form_error('hired_date') ? 'is-invalid':'' ?>" value="<?= $employee->hired_date; ?>">
                  </div>
                  <small id="hired_date" class="form-text text-danger"><?php echo form_error('hired_date'); ?></small>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="npwp">NPWP Number</label>
                  <input type="text" name="npwp" id="npwp" class="form-control form-control-sm" value="<?= $employee->npwp; ?>">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="reference">Reference</label>
                  <input type="text" name="reference" id="reference" class="form-control form-control-sm" value="<?= $employee->reference; ?>">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="emergency_contact">Emergency Contact</label>
                  <input type="text" name="emergency_contact" id="emergency_contact" class="form-control form-control-sm" value="<?= $employee->emergency_contact; ?>">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="contact_name">Contact Name</label>
                  <input type="text" name="contact_name" id="contact_name" class="form-control form-control-sm" value="<?= $employee->contact_name; ?>">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="relation">Relation</label>
                  <input type="text" name="relation" id="relation" class="form-control form-control-sm" value="<?= $employee->relation; ?>">
                </div>
              </div>              
            </div>
            <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="blood_group">Blood Group</label>
                  <input type="text" name="blood_group" id="blood_group" class="form-control form-control-sm" value="<?= $employee->blood_group; ?>">
                </div>
              </div>
              
              <div class="col-md-4 col-sm-12">
                <div class="position-relative form-group">
                  <label for="photos">Photo</label>
                  <div class="row">
                      <div class="col-md-4">
                        <img src="<?php echo base_url();?>assets/dist/photos/<?php echo $employee->photos;?>" alt="user profile" class="profile-user-img img-fluid">
                      </div>

                    <div class="form-group col-md-8">
                      
                      <div class="custom-file">
                        <input type="file" class="custom-file-input <?php echo form_error('photos') ? 'is-invalid':'' ?>" id="photos" name="image">
                        <input type="hidden" name="old_photos" id="photos" class="form-control" value="<?php echo $employee->photos;?>">
                        <small id="photos" class="form-text text-danger"><?php echo form_error('photos'); ?></small>
                        <label class="custom-file-label" for="photos"><?= $employee->photos; ?></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>         
            </div>
          </div>
           <div class="card-footer">
            <div class="float-right">
              <a href="<?= base_url('employee/employee_details/'.$employee->employee_code); ?>" class="btn btn-warning"> Cancel</a>
              <button type="submit" name="btn" class="btn btn-success" value="upload">Submit</button>
            </div>
          </div>
        <?php echo form_close(); ?>
     </div>
   </section>
    <!-- /.content -->