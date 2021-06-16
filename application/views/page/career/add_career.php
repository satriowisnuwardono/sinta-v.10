<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Structural Employee</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item "><?php echo $title; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main Section -->
  <section class="content">
    <div class="container-fluid">
      <!-- Add Structural -->
      <div class="row">
        <div class="col-md-5">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Add Employee Career</h3>
            </div>
            <?php echo form_open('career/insert_career') ?>
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="career_code">Career Code</label>
                  <input type="text" name="employee_code" id="employee_code" value="<?php echo $employee->employee_code ?>" class="form-control" hidden>
                  <input type="text" name="career_code" id="career_code" value="CAR-<?php echo sprintf("%04s", $career_code) ?>" class="form-control form-control-sm" readonly>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="nik">NIK</label>
                  <input type="text" name="nik" id="nik" value="<?php echo $employee->nik ?>" class="form-control form-control-sm" readonly>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 col-sm-12">
                <div class="position-relative form-group">
                  <label for="name">Employee Name</label>
                  <input type="text" name="name" id="name" value="<?php echo $employee->name ?>" class="form-control form-control-sm" readonly>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="department_code">Department</label>
                  <select class="form-control form-control-sm" name="department_code" id="department_code" required>
                    <option value="">No Selected</option>
                      <?php foreach($department as $row):?>
                        <option value="<?php echo $row->department_code;?>"><?php echo $row->department_name;?></option>
                      <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="division_code">Division</label>
                  <select name="division_code" id="division_code" required="required" class="form-control form-control-sm">
                    <option selected>No Selected</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="position_code">Position</label>
                  <select class="form-control form-control-sm" name="position_code" id="position_code" required="required">
                      <option value="">No Selected</option>
                      <!-- <?php foreach($position as $row):?>
                      <option value="<?php echo $row->position_code;?>"><?php echo $row->position_name;?></option>
                      <?php endforeach;?> -->
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="career_status">Status</label>
                  <select name="career_status" id="career_status" required="required" class="form-control form-control-sm">
                    <option selected>No Selected</option>
                    <option>Contract</option>
                    <option>Permanent</option>
                    <option>Probation</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm12">
                <div class="position-relative form-group">
                  <label for="hired_date">Hired Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                        <input type="date" name="hired_date" id="hired_date" value="" class="form-control form-control-sm">
                    </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="pkwt">PKWT</label>
                  <select name="pkwt" id="pkwt" required="required" class="form-control form-control-sm">
                    <option selected>No Selected</option>
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm12">
                <div class="position-relative form-group">
                  <label for="start_working_date">Start Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                        <input type="date" name="start_working_date" id="start_working_date" value="" class="form-control form-control-sm">
                    </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="end_up_working_date">End Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                        <input type="date" name="end_up_working_date" id="end_up_working_date" value="" class="form-control form-control-sm">
                    </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="periode">Period</label>
                  <input type="text" name="periode" id="periode" value="" class="form-control form-control-sm">
                </div>
              </div>
              
              <div class="col-md-6 col-sm-12">
                <div class="position-relative form-group">
                  <label for="duration">Duration</label>
                  <input type="text" name="duration" id="duration" value="" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        <div class="card-footer">
          <div class="float-sm-right">
            <a href="<?php echo base_url('career/master_career'); ?>" class="btn btn-warning">Cancel</a>
            <button class="btn btn-success" name="submit" type="submit">Save</button>
          </div>
        </div>
          <?php echo form_close(); ?>
      </div>
    </div>

    <div class="col-md-7">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">STRUCTURAL HISTORY</h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">NIK</th>
                <th class="text-center">PKWT</th>
                <th class="text-center">Start Date</th>
                <th class="text-center">End Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($structural as $s) {
              ?>
              <tr>
                <td class="text-center"><?= $s->nik ?></td>
                <td class="text-center"><?= $s->pkwt; ?></td>
                <td class="text-center"><?= $s->start_working_date; ?></td>
                <td class="text-center"><?= $s->end_up_working_date; ?></td>
                <?php if ($s->status == 1) { ?>
                  <td class="text-center"><span class="badge badge-succes">Active</span></td>
                <?php } else { ?>
                  <td class="text-center"><span class="badge badge-danger">Off</span></td>
                <?php } ?>
                <td>
                  <a href="<?= base_url('career/edit/'.$s->career_code) ?>" class="btn btn-secondary btn-sm"><i class="fas fa-pen-square"></i></a>
                  <a href="<?= base_url('career/delete/'.$s->career_code) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <?php  
                } 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </section>