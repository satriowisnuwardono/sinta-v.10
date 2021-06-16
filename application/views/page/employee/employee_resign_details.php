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
              <li class="breadcrumb-item ">Employee Data</li>
              <li class="breadcrumb-item active">Employee Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php foreach ($employee as $row) { ?>
    <!-- Main Section -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Employee Detail -->
          <div class="col-md-4 col-sm-12">
            <div class="card card-warning card-outline">
              
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>assets/dist/photos/<?= $row->photos; ?> " alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $row->name; ?></h3>
                <p class="text-muted text-center"><?php echo $row->nik; ?></p>
                <ul class="list-group list-group-unbordered mb-2">
                  <li class="list-group-item">
                    <b>Date of Birth</b>
                    <a class="float-right"><?php echo $row->place_of_birth; ?>, <?php echo $row->date_of_birth; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b>
                    <a class="float-right"><?php echo $row->gender; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b>
                    <a class="float-right"><?php echo $row->address; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>ID Card Number</b>
                    <a class="float-right"><?php echo $row->id_number; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>NPWP Number</b>
                    <a class="float-right"><?php echo $row->npwp; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Religion</b>
                    <a class="float-right" value="<?php echo $row->religion_code; ?>"><?php echo $row->religion_name; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Marital Status</b>
                    <a class="float-right" value="<?php echo $row->marital_status_code; ?>"><?php echo $row->marital_status; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone Number</b>
                    <a class="float-right"><?php echo $row->phone_number; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b>
                    <?php if ($row->status == 1) {
                      echo '<a class="float-right"><span class="badge badge-pill badge-success"> Active </span></a>';
                    } else {
                    echo '<a class="float-right"><span class="badge badge-pill badge-danger"> OFF </span></a>';
                  } ?>
                  </li>
                </ul>
                <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2' or
                      $this->session->userdata('role_code') == '4') {
                ?>
                <a href="<?php echo base_url('Employee/edit_resign/'.$row->id); ?>" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit Details</a>
                <?php } ?>
              </div>
              <div class="card-footer">
          
              </div>
            </div>
          </div>
          <?php } ?>

          <!-- Details -->
          <div class="col-md-8 col-sm-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                 <ul class="nav nav-pills card-header-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#structural" data-toggle="tab">Structural</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#bpjs" data-toggle="tab">BPJS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#family" data-toggle="tab">Family</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#education" data-toggle="tab">Education</a>
                  </li>
                  <?php 
                  if ($this->session->userdata('role_code') == '1') {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="#performance_assessment" data-toggle="tab">Performance Assessment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#work_performance" data-toggle="tab">Work Performance</a>
                  </li>
                  <?php } ?>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <!-- structural -->
                  
                  <div id="structural" class="tab-pane active">
                    <?php foreach ($career as $row) {?>
                      <h5><span class="badge badge-pill badge-info">Period : <?php echo $row->periode; ?></span></h5>
                    <ul class="list-group list-group-unbordered mb-3">
                      
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <b>PKWT</b>
                            <a class="float-right"><?php echo $row->pkwt; ?></a><br/>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <b>Hired Date</b>
                            <a class="float-right"><?php echo $row->hired_date; ?></a><br/>
                        </div>
                      </div>
                      
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <b>Start Date</b>
                            <a class="float-right"><?php echo $row->start_working_date; ?></a><br/>
                            <?php if($row->career_status == 'Contract' or $row->career_status == 'Probation') { ?>
                            <b>Duration</b>
                            <a class="float-right"><?php echo $row->duration; ?></a><br/>
                            <?php } else {
                               echo '<a href=""></a><br/>';
                            } ?>
                            <?php if($row->career_status == 'Contract' or $row->career_status == 'Probation') { ?>
                            <b>End Date</b>
                            <a class="float-right"><?php echo $row->end_up_working_date; ?></a><br/>
                            <?php } else {
                               echo '<a href=""></a><br/>';
                            } ?>
                            <b>Status</b>
                            <a class="float-right"><?php echo $row->career_status; ?></a>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <b>NIK</b>
                            <a class="float-right"><?php echo $row->nik; ?></a><br/>
                            <b>Department</b>
                            <a class="float-right" value="<?php echo $row->department_code; ?>"><?php echo $row->department_name; ?></a><br/>
                            <b>Division</b>
                            <a class="float-right" value="<?php echo $row->division_code; ?>"><?php echo $row->division_name; ?></a><br/>
                            <b>Position</b>
                            <a class="float-right" value="<?php echo $row->position_code; ?>"><?php echo $row->position_name; ?></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <?php } ?>
                  </div>

                  <!-- BPJS -->
                  <div id="bpjs" class="tab-pane">
                    <table class="table table-sm table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>BPJS Kesehatan</th>
                          <th>Clinic Name</th>
                          <th>BPJS Tenagakerja</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          foreach ($bpjs as $row) :
                        ?>
                        <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td class="text-center"><?= $row->healthy_bpjs; ?></td>
                          <td><?= $row->clinic_name; ?></td>
                          <td class="text-center"><?= $row->labor_bpjs; ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  
                  <!-- Employee family -->
                  <div id="family" class="tab-pane">
                    <table class="table table-sm table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">#</th>
                          <th scope="col" class="text-center">Name</th>
                          <th scope="col" class="text-center">Relationship</th>
                          <th scope="col" class="text-center">Address</th>
                          <th scope="col" class="text-center">Contact</th>
                          <?php 
                          if ($this->session->userdata('role_code') == '1' or
                              $this->session->userdata('role_code') == '2') {
                          ?>
                          <th scope="col" class="text-center">Option</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          foreach ($family as $row) {
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->relationship; ?></td>
                            <td><?php echo $row->address; ?></td>
                            <td class="text-center"><?php echo $row->contact; ?></td>
                            <?php 
                            if ($this->session->userdata('role_code') == '1' or
                                $this->session->userdata('role_code') == '2') {
                            ?>
                            <td class="text-center">
                              <a href="<?php echo base_url('family/delete/'.$row->id) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                    <?php 
                      if ($this->session->userdata('role_code') == '1' or
                          $this->session->userdata('role_code') == '2') {
                    ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_family">
                      <i class="fas fa-user-friends"></i></span> Add Family
                    </button>
                    <?php } ?>
                    <!-- Modal -->
                    <div class="modal fade" id="add_family" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Family</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <?php echo form_open('family/add') ?>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="name" class="col-sm-4 col-form-label">Name</label>
                              <div class="col-sm-8">
                                <input type="hidden" class="form-control form-control-sm" id="employee_code" name="employee_code" value="<?php echo $employee_code->employee_code; ?>">
                                <input type="text" class="form-control form-control-sm" id="name" name="name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="relationship" class="col-sm-4 col-form-label">Relationship</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" id="relationship" name="relationship">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="contact" class="col-sm-4 col-form-label">Contact</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" id="contact" name="contact">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="address" class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" id="address" name="address">
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Education -->
                  <div id="education" class="tab-pane">
                    <table class="table table-sm table-bordered" id="mydata">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Institution Name</th>
                          <th scope="col" class="text-center">Education</th>
                          <th scope="col" class="text-center">Major</th>
                          <th scope="col" class="text-center">Start</th>
                          <th scope="col" class="text-center">Finish</th>
                          <?php 
                            if ($this->session->userdata('role_code') == '1' or
                                $this->session->userdata('role_code') == '2') {
                            ?>
                          <th scope="col" class="text-center">Option</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                        <?php 
                          $no = 1;
                          foreach ($education as $row) {
                        ?>
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row->institution; ?></td>
                            <td><?= $row->education; ?></td>
                            <td><?= $row->major; ?></td>
                            <td class="text-center"><?= $row->start; ?></td>
                            <td class="text-center"><?= $row->finish; ?></td>
                            <?php 
                            if ($this->session->userdata('role_code') == '1' or
                                $this->session->userdata('role_code') == '2') {
                            ?>
                            <td class="text-center">
                              <a href="<?php echo base_url('education/delete/'.$row->id); ?>" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
                            </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
                    if ($this->session->userdata('role_code') == '1' or
                                $this->session->userdata('role_code') == '2') {
                    ?>
                    <div>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_education"><span class="badge badge-light"><i class="fas fa-plus"></i></span> Add Education</button>
                    </div>
                    <?php } ?>
                    <!-- Add Modal -->
                    <div class="modal fade" id="add_education" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Education</h5>
                          </div>
                          <?php echo form_open('education/add'); ?>
                          <div class="modal-body">
                              <div class="form-group row">
                                <label for="institution" class="col-sm-4 col-form-label">Institution Name</label>
                                <div class="col-sm-8">
                                  <input type="hidden" class="form-control form-control-sm" id="employee_code" name="employee_code" value="<?php echo $employee_code->employee_code; ?>">
                                  <input type="text" class="form-control form-control-sm" id="institution" name="institution">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="education" class="col-sm-4 col-form-label">Education</label>
                                <div class="col-sm-8">
                                  <select class="form-control form-control-sm" id="education" name="education">
                                    <option selected>select...</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    <option>SMK</option>
                                    <option>DIPLOMA I</option>
                                    <option>DIPLOMA II</option>
                                    <option>DIPLOMA III</option>
                                    <option>DIPLOMA IV</option>
                                    <option>SARJANA (S1)</option>
                                    <option>MAGISTER (S2)</option>
                                    <option>DOKTOR (S3)</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="major" class="col-sm-4 col-form-label">Major</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" id="major" name="major">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="from" class="col-sm-4 col-form-label">Start From</label>
                                <div class="col-sm-3">
                                  <select for="start" class="form-control form-control-sm" name="start" id="start">
                                    <option selected="">year</option>
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
                                    <option selected="">year</option>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="btn" class="btn btn-success">Save</button>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Performance Assessment -->
                  <div id="performance_assessment" class="tab-pane">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="badge badge-light"><i class="fas fa-plus"></i></span> Add Performance</button>
                    </div>
                  </div>

                  <!-- Work Performance -->
                  <div id="work_performance" class="tab-pane">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="badge badge-light"><i class="fas fa-plus"></i></span> Add Work Performance</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>