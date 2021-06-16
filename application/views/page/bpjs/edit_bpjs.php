    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit BPJS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fa fa fa-user-md"></i> Master Data</a></li>
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
            <h3 class="card-title">Edit BPJS Data</h3>
          </div>
          <?php echo form_open('bpjs/edit'); ?>
          <div class="card-body">
            <div class="form-group row justify-content-center">
              <label for="bpjs_code" class="col-sm-2 col-form-label">BPJS Code</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-sm" id="bpjs_code" name="bpjs_code" value="<?php echo $bpjs->bpjs_code;?>" readonly>
                </div>
            </div>
            <div class="form-group row justify-content-center" hidden>
              <label for="employee_code" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
              <!--     <?php
                    //echo '<input type="text" class="form-control form-control-sm" id="employee_code" employee_code="employee_code" >';
                  ?> -->
                  <select class="form-control form-control-sm" name="employee_code" id="employee_code">
                    <option value="<?php echo $bpjs->employee_code ?>"><?php echo $bpjs->employee_code; ?></option>
                  </select>
                </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="healthy_bpjs" class="col-sm-2 col-form-label">BPJS Kesehatan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-sm" id="healthy_bpjs" name="healthy_bpjs" value="<?php echo $bpjs->healthy_bpjs; ?>">
                </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="clinic_name" class="col-sm-2 col-form-label">Clinic Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-sm" id="clinic_name" name="clinic_name" value="<?php echo $bpjs->clinic_name; ?>">
                </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="labor_bpjs" class="col-sm-2 col-form-label">BPJS Tenagakerja</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-sm" id="labor_bpjs" name="labor_bpjs" value="<?php echo $bpjs->labor_bpjs; ?>">
                </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="float-sm-right">
                  <a href="<?= base_url('bpjs/master_bpjs'); ?>" class="btn btn-warning"> Cancel</a>
                  <button type="submit" name="btn" class="btn btn-success">Submit</button>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>
