<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Career</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><i class="fa fa-building"></i> Master Data</li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main Section -->
  <section class="content">
    <div class="container-fluid">
      <!-- Edit Career -->
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Employee Career</h3>
        </div>
        
        <?php echo form_open('career/update') ?>
        <div class="card-body">

          <div class="row">
            <input type="text" name="id" id="id" value="<?php echo $career->id; ?>" class="form-control" hidden>
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="career_code">Career Code</label>
                <input type="text" name="employee_code" id="employee_code" value="<?php echo $career->employee_code; ?>" class="form-control" hidden>
                <input type="text" name="career_code" id="career_code" value="<?php echo $career->career_code; ?>" class="form-control form-control-sm" readonly>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" value="<?php echo $career->nik ?>" class="form-control form-control-sm" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="department_code">Department</label>
                <select class="form-control form-control-sm" name="department_code" id="department_code" required>
                  <?php foreach($department as $dept):?>
                    <?php if ($dept->department_code == $career->career_code) : ?>
                      <option value="<?php echo $dept->department_code;?>" selected><?php echo $dept->department_name;?></option>
                    <?php else : ?>
                      <option value="<?php echo $dept->department_code;?>"><?php echo $dept->department_name;?></option>
                    <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="division_code">Division</label>
                <select name="division_code" id="division_code" required="required" class="form-control form-control-sm">
                  <?php foreach ($division as $div) : ?>
                    <?php if ($div->division_code == $career->division_code) { ?>
                      <option value="<?php echo $div->division_code ?>"><?php echo $div->division_name; ?></option>
                    <?php } ?>
                  <?php endforeach; ?>
                  <option value="">No Selected</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="position_code">Position</label>
                <select class="form-control form-control-sm" name="position_code" id="position_code" required="required">
                  <?php foreach ($position as $pos) : ?>
                    <?php if ($pos->position_code == $career->position_code) { ?>
                      <option value="<?php echo $pos->position_code ?>"><?php echo $pos->position_name; ?></option>
                    <?php } ?>
                  <?php endforeach; ?>
                  <option value="">No Selected</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="career_status">Status</label>
                <select name="career_status" id="career_status" required="required" class="form-control form-control-sm">
                  <option selected><?php echo $career->career_status; ?></option>
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
                      <input type="date" name="hired_date" id="hired_date" value="<?php echo $career->hired_date; ?>" class="form-control form-control-sm">
                  </div>
              </div>
            </div>
            <div class="col-md-3 col-sm12">
              <div class="position-relative form-group">
                <label for="start_working_date">Start Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                      <input type="date" name="start_working_date" id="start_working_date" value="<?php echo $career->start_working_date; ?>" class="form-control form-control-sm">
                  </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="position-relative form-group">
                <label for="end_up_working_date">End Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                      <input type="date" name="end_up_working_date" id="end_up_working_date" value="<?php echo $career->end_up_working_date; ?>" class="form-control form-control-sm">
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="position-relative form-group">
                <label for="periode">Periode</label>
                <input type="text" name="periode" id="periode" value="<?php echo $career->periode; ?>" class="form-control form-control-sm">
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="position-relative form-group">
                <label for="pkwt">PKWT</label>
                <select name="pkwt" id="pkwt" required="required" class="form-control form-control-sm">
                  <option selected><?php echo $career->pkwt; ?></option>
                  <option>1</option>
                  <option>2</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="position-relative form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" id="duration" value="<?php echo $career->duration; ?>" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="float-right">
            <a href="<?php echo base_url('career/master_Career'); ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" name="btn" class="btn btn-success">Save</button>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>