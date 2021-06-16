<!-- Content Header (Page iheader) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('employee/master_employee'); ?>"><i class="fa fa-briefcase nav-icon"></i> Master Data</a>
              <li class="breadcrumb-item active">Employee Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/dist/photos/'.$employee_code->photos); ?>">
                </div>
                  <h3 class="profile-user-name text-center"><?= $employee_code->name; ?></h3>
                  <p class="text-center"><?= $employee_code->nik; ?></p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <strong>Date of Birth</strong>
                      <a class="float-right"><?= $employee_code->place_of_birth; ?>, <?= $employee_code->date_of_birth; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Gender</strong>
                      <a class="float-right"><?= $employee_code->gender; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>ID Number</strong>
                      <a class="float-right"><?= $employee_code->id_number; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Religion</strong>
                      <?php foreach ($employee as $emp) { ?>
                      <a class="float-right">
                          <?= $emp->religion_name; ?>  
                      </a>
                    <?php } ?>
                    </li>
                    <li class="list-group-item">
                      <strong>Marital Status</strong>
                      <?php foreach ($employee as $emp) { ?>
                      <a class="float-right">
                          <?= $emp->marital_status; ?>  
                      </a>
                    <?php } ?>
                    </li>
                    <li class="list-group-item">
                      <strong>Tax ID Number</strong>
                      <a class="float-right"><?= $employee_code->npwp; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Phone Number</strong>
                      <a class="float-right"><?= $employee_code->phone_number; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Last Education</strong>
                      <a class="float-right"><?= $employee_code->last_education; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Majors</strong>
                      <a class="float-right"><?= $employee_code->majors; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Reference</strong>
                      <a class="float-right"><?= $employee_code->reference; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Address</strong>
                      <a class="float-right"><?= $employee_code->address; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Neighborhood</strong>
                      <a class="float-right"><?= $employee_code->neighborhood; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Hamlet</strong>
                      <a class="float-right"><?= $employee_code->hamlet; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Urban Village</strong>
                      <a class="float-right"><?= $employee_code->urban_village; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Sub-District</strong>
                      <a class="float-right"><?= $employee_code->sub_district; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Regency</strong>
                      <a class="float-right"><?= $employee_code->regency; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Province</strong>
                      <a class="float-right"><?= $employee_code->province; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Zip Code</strong>
                      <a class="float-right"><?= $employee_code->zip; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Blood Group</strong>
                      <a class="float-right"><?= $employee_code->blood_group; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Emergency Contact</strong>
                      <a class="float-right"><?= $employee_code->emergency_contact; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Contact Name</strong>
                      <a class="float-right"><?= $employee_code->contact_name; ?></a>
                    </li>
                    <li class="list-group-item">
                      <strong>Relation</strong>
                      <a class="float-right"><?= $employee_code->relation; ?></a>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">BPJS</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Health BPJS</th>
                      <th>Clinic Name</th>
                      <th>BPJS of Employment</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>
                        <?php 
                          if (empty($bpjs->healthy_bpjs)) {
                            echo 'empty';
                          } else { 
                            echo $bpjs->healthy_bpjs; 
                          } ?>
                      </td>
                      <td>
                        <?php 
                          if (empty($bpjs->clinic_name)) {
                            echo 'empty';
                          } else { 
                            echo $bpjs->clinic_name; 
                          } ?>
                      </td>
                      <td>
                        <?php 
                          if (empty($bpjs->labor_bpjs)) {
                            echo 'empty';
                          } else { 
                            echo $bpjs->labor_bpjs; 
                          } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">WORK HISTORY</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>PKWT</th>
                      <th>NIK</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Duration</th>
                      <th>Department</th>
                      <th>Position</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($career as $c) { ?>
                      <tr>
                        <td><?= $c->pkwt; ?></td>
                        <td><?= $c->nik; ?></td>
                        <td><?= $c->start_working_date; ?></td>
                        <td><?= $c->end_up_working_date; ?></td>
                        <td><?= $c->duration; ?></td>
                        <td><?= $c->department_name; ?></td>
                        <td><?= $c->position_name; ?></td>
                        <td><?= $c->career_status; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">REWARD AND PUNISHMENT</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                REWARD AND PUNISHMENT
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">TRAINING AND CERTIFICATION</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                TRAINING AND CERTIFICATION
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="content-footer">
        <div class="container-fluid">
            <div class="col-md-4 mb-3">
              <a href="<?= base_url('employee/edit/'.$employee_code->id); ?>" class="btn btn-primary btn-block mb-3"><i class="fas fa-user-edit"></i> Edit Employee</a>
            </div>         
        </div>
      </div>
    </section>