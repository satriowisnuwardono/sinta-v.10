<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee Details</h1>
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
      <div class="row">
      <!-- Add Structural -->
        <div class="col-md-5 col-sm-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Added Structural Level</h3>
            </div>
            <?php echo form_open('employee/insert_structural') ?>
            <div class="card-body">
              <div class="position-relative form-group">
                <label for="nik">NIK</label>
                <input type="text" name="employee_code" id="employee_code" value="<?php echo $employee->employee_code ?>" class="form-control" hidden>
                <input type="text" name="nik" id="nik" value="<?php echo $employee->nik ?>" class="form-control" readonly>
              </div>
              <div class="position-relative form-group">
                <label for="position_code">Position</label>
                <select class="form-control" name="position_code" id="position_code">
                    <option value="">No Selected</option>
                    <?php foreach($position as $row):?>
                    <option value="<?php echo $row->position_code;?>"><?php echo $row->position_name;?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="position-relative form-group">
                <label for="department_code">Department</label>
                <select class="form-control" name="department_code" id="department_code" required>
                  <option value="">No Selected</option>
                    <?php foreach($department as $row):?>
                      <option value="<?php echo $row->department_code;?>"><?php echo $row->department_name;?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="position-relative form-group">
                <label for="division_code">Division</label>
                <select name="division_code" id="division_code" required="required" class="form-control">
                  <option>No Selected</option>
                </select>
              </div>
              <div class="position-relative form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required="required" class="form-control">
                  <option selected>No Selected</option>
                  <option>Contract</option>
                  <option>Permanent</option>
                  <option>Probation</option>
                </select>
              </div>
              <div class="form-row">
                <div class="col-md-6 col-sm-12">
                  <div class="position-relative form-group">
                    <label for="hired_date">Hired Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                          <input type="date" name="hired_date" id="hired_date" value="" class="form-control">
                      </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="position-relative form-group">
                    <label for="end_date">End Date</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                          <input type="date" name="end_date" id="end_date" value="" class="form-control">
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 col-sm-12">
                  <div class="position-relative form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="duration" value="" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="position-relative form-group">
                    <label for="periode">Periode</label>
                    <input type="text" name="periode" id="periode" value="" class="form-control">
                  </div>
                </div>
              </div>
              
            </div>
            <div class="card-footer">
              <button class="btn btn-primary btn-block" name="submit" type="submit">Save Structure Level</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      <!-- Structural List -->
      <div class="col-md-7 col-sm-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Structural History :</h3>
            </div>
            <div class="card-body">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Position</th>
                    <th scope="col" class="text-center">Hired Date</th>
                    <th scope="col" class="text-center">End Date</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($career as $row) {
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td valign="<?php echo '$row->position_code' ?>"><?php echo $row->position_name ?></td>
                    <td class="text-center"><?php echo $row->hired_date; ?></td>
                    <td class="text-center"><?php echo $row->end_date; ?></td>
                    <td class="text-center"><?php echo $row->status; ?></td>
                    <td class="text-center"><a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>