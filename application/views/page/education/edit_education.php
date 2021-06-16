  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><i class="far fa-user"></i> Master Data</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title"><span class="badge badge-secondary"><i class="fa fa-user"></i></span> Edit User Account</h3>
        </div>
        <?php echo form_open('education/process'); ?>
          <div class="modal-body">
            <div class="form-group row">
                <div class="col-sm-8">
                  <input type="hidden" class="form-control form-control-sm" id="employee_code" name="employee_code" value="<?php echo $education_by_emp_code->id; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="institution" class="col-sm-4 col-form-label">Institution Name</label>
                <div class="col-sm-8">
                  <input type="hidden" class="form-control form-control-sm" id="employee_code" name="employee_code" value="<?php echo $education_by_emp_code->employee_code; ?>">
                  <input type="text" class="form-control form-control-sm" id="institution" name="institution" value="<?= $education_by_emp_code->institution; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="education" class="col-sm-4 col-form-label">Education</label>
                <div class="col-sm-8">
                  <select class="form-control form-control-sm" id="education" name="education">
                    <?php foreach ($education as $edu) :?>
                      <?php if($edu == $education_by_emp_code->education ) : ?>
                          <option value="<?= $edu;?>" selected><?= $edu;?></option>
                        <?php else : ?>
                          <option value="<?= $edu;?>"><?= $edu;?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="major" class="col-sm-4 col-form-label">Major</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="major" name="major" value="<?= $education_by_emp_code->major ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="from" class="col-sm-4 col-form-label">Start From</label>
                <div class="col-sm-3">
                  <select for="start" class="form-control form-control-sm" name="start" id="start">
                    <option selected=""><?= $education_by_emp_code->start ?></option>
                    <?php 
                    for($s=date('Y'); $s>=date('Y')-50; $s-=1){
                      echo "<option value='$s'>$s</option>";
                    } 
                    ?>
                  </select>
                </div>
                <label for="to" class="col-sm-2 col-form-label text-center">TO</label>
                <div class="col-sm-3">
                  <select for="finish" class="form-control form-control-sm" name="finish" id="finish">
                    <option selected=""><?= $education_by_emp_code->finish ?></option>
                    <?php 
                    for($f=date('Y'); $f>=date('Y')-50; $f-=1){
                      echo "<option value='$f'>$f</option>";
                    } 
                    ?>
                   </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <a href="<?php echo base_url('education/master_education'); ?>" class="btn btn-secondary">Cancel</a>
            <button type="submit" name="btn" class="btn btn-success">Save</button>
          </div>
          <?php echo form_close(); ?>
      </div>
    </div>
  </section>