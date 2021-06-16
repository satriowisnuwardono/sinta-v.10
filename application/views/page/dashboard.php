<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><i class="fa fa-home"></i> <?php echo $title; ?></a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Admin Session -->
    <?php if ($this->session->userdata('role_code') == 1 or 
              $this->session->userdata('role_code') == 2 or 
              $this->session->userdata('role_code') == 3) { ?>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="card card-warning card-outline">
          <div class="row mt-3 mb-2 mr-2 ml-2">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $total_employee; ?></h3>

                  <p>Total Employees</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url('employee/master_employee'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $total_employee_active; ?></h3>

                  <p>Employee Active</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-check"></i>
                </div>
                <a href="<?php echo base_url('employee/master_employee_active'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $total_employee_off; ?></h3>

                  <p>Employee Off</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-times"></i>
                </div>
                <a href="<?php echo base_url('employee/master_employee_off'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3><?php echo $total_employee_resign; ?></h3>

                  <p>Employee Resign</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-friends"></i>
                </div>
                <a href="<?php echo base_url('employee/master_employee_resign'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>

        <div class="row">
          <!-- Profile Image -->
          <div class="col-md-3 col-sm-12">
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">

                <?php foreach ($profile as $row) { ?>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/dist/photos/'.$row->photos) ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $row->name; ?></h3>
                <p class="text-muted text-center"><?php echo $row->nik; ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Level</b>
                    <a class="float-right" value="<?php echo $row->role_code; ?>"><?php echo $row->role_name; ?></a>
                  </li>
                </ul>
                <!-- <a class="btn btn-primary btn-block" href="<?php ?>">Edit Profile</a> -->
                <!-- Button trigger modal -->
               <!--  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit-profile"></button>
 -->
                <a href="<?php echo base_url('employee/employee_details/'.$row->employee_code); ?>" class="btn btn-primary btn-sm" style="width: 100%;"><i class="fas fa-user-edit"></i> Edit Profile</a>
                  
                
      
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-12">
            <div class="card">
              <div class="card-header">
                 <ul class="nav nav-pills card-header-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#employee_list" data-toggle="tab">Employees Off Today</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#user_list" data-toggle="tab">User List</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <!-- User List -->
                <div class="tab-content">
                  <div id="user_list" class="tab-pane">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NAME</th>
                          <th scope="col">USER</th>
                          <th scope="col">LEVEL</th>
                          <th scope="col">STATUS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          foreach ($user as $row) {
                        ?>
                          <tr>
                            <td scope="row" class="text-center"><?php echo $no++; ?></td>
                            <td scope="row"><?php echo $row->name; ?></td>
                            <td scope="row"><?php echo $row->username; ?></td>
                            <td scope="row" value="<?php echo $row->role_code; ?>"><?php echo $row->role_name; ?></td>
                            <td scope="row" class="text-center">
                              <?php if ($row->access == 1) {
                                echo '<span class="badge badge-pill badge-success">Active</span>';
                              } else {
                                echo '<span class="badge badge-pill badge-danger">Off</span>';
                              } ?>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  
                  <!-- Employee List -->
                  <div id="employee_list" class="tab-pane active">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NIK</th>
                          <th scope="col">Name</th>
                          <th scope="col" width="20%">Hired Date</th>
                          <th scope="col" width="20%">End Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($employee as $row) {
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $row->nik; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td class="text-center"><?php echo $row->start_working_date; ?></td>
                            <td class="text-center"><?php echo $row->end_up_working_date; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>

    <!-- User Session -->
    <?php if ($this->session->userdata('role_code') == 4) { ?>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="card card-warning card-outline">
          <?php foreach ($leave_rights as $lr) { ?>
          <div class="row mt-3 mb-2 mr-2 ml-2">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $lr->total; ?></h3>

                  <p>Annual Leave Total</p>
                </div>
                <div class="icon">
                  <i class="fas fa-clipboard-list"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $lr->leave_taken; ?></h3>

                  <p>Total Leave Taken</p>
                </div>
                <div class="icon">
                  <i class="fas fa-plane-departure"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3><?php echo $lr->mass_leave; ?></h3>

                  <p>Mass Leave</p>
                </div>
                <div class="icon">
                  <i class="far fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="row">
          <!-- Profile Image -->
          <div class="col-md-3 col-sm-12">
            <div class="card card-warning card-outline">
              <?php foreach ($profile as $row) { ?>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/dist/photos/'.$row->photos); ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $row->name; ?></h3>
                <p class="text-muted text-center"><?php echo $row->nik; ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Level</b>
                    <a class="float-right" value="<?php echo $row->role_code; ?>"><?php echo $row->role_name; ?></a>
                  </li>
                </ul>
                <a class="btn btn-primary btn-block" href="<?php echo base_url('employee/employee_details/'.$row->employee_code); ?>">Edit Profile</a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-9 col-sm-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                 <ul class="nav nav-pills card-header-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#announcement" data-toggle="tab">Announcement</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#details" data-toggle="tab">Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#structural" data-toggle="tab">Structural</a>
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
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="#assessment" data-toggle="tab">Assessment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#performance" data-toggle="tab">Performance</a>
                  </li> -->
                </ul>
              </div>

              <div class="card-body">
                <!-- Announcement -->
                <div class="tab-content">
                  <div id="announcement" class="tab-pane active">
                    <ul class="list-group list-group-unbordered mb-3">
                      <?php foreach ($announcement as $row) {?>
                      <li class="list-group-item">
                        <b><i class="fas fa-file"></i> <?php echo $row->title; ?></b><small><a href="<?php echo base_url('announcement/details/'.$row->announcement_id); ?>"> ...(Read More)</a></small>
                        <b class="float-right"><?php echo $row->announcement_date ?></b>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                  
                  <!-- Employee Details -->
                  <div id="details" class="tab-pane">
                      <!-- Employee Data -->
                        <strong>
                          <i class="fas fa-server"></i> Employee Data
                        </strong>
                        <?php foreach ($details as $row) { ?>
                          <ul class="list-group list-group-unbordered">
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
                          </ul>
                        <?php } ?>
                  </div>

                  <!-- Structural -->
                  <div id="structural" class="tab-pane">
                    <?php foreach ($structural as $row) { ?>
                      <ul class="list-group list-group-unbordered mb-3">
                      <h5><span class="badge badge-pill badge-info">Priode : <?php echo $row->periode; ?></span></h5>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <b>Hired Date</b>
                            <a class="float-right"><?php echo $row->hired_date; ?></a>
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
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- Family -->
                  <div id="family" class="tab-pane">
                      <table class="table table-bordered table-sm">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Address</th>
                            <th scope="col" class="text-center">Contact</th>
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
                              <td class="text-center"><?php echo $row->status; ?></td>
                              <td><?php echo $row->address; ?></td>
                              <td class="text-center"><?php echo $row->contact; ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                  </div>

                  <!-- Education -->
                  <div id="education" class="tab-pane">
                      <table class="table table-bordered table-sm">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Education</th>
                            <th scope="col" class="text-center">Major</th>
                            <th scope="col" class="text-center">Start</th>
                            <th scope="col" class="text-center">Finish</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1;
                            foreach ($education as $row) { 
                          ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row->education; ?></td>
                              <td><?php echo $row->major; ?></td>
                              <td class="text-center"><?php echo $row->start; ?></td>
                              <td class="text-center"><?php echo $row->finish; ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                  </div>

                  <!-- Performance Assessment -->
                  <!-- <div id="assessment" class="tab-pane">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div> -->

                  <!-- Work Performance  -->
                 <!--  <div id="performance" class="tab-pane">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                  </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>