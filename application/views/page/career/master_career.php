<!-- <?php 
  //if ($this->session->userdata('role_code') == 1 ) {
?> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Career</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="flash-data-career" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <!-- Card Header -->
              <div class="card-header">
                <h3 class="card-title"><span class="badge badge-primary"><i class="nav-icon fas fa-user"></i></span> All Career List Data</h3>
              </div>
              <!-- ./Card Header -->

              <!-- Card Body -->
              <div class="card-body">
                <table id="example1"  class="table table-bordered table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Career Code</th>
                      <th scope="col">Name</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Department</th>
                      <th scope="col">Division</th>
                      <th scope="col">Position</th>
                      <th scope="col">Status</th>
                      <?php 
                      if ($this->session->userdata('role_code') == '1' or
                          $this->session->userdata('role_code') == '2') {
                      ?>
                      <th scope="col" width="10%">Action</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($career as $row) { ?>
                    <tr>
                      <td align="center"><?php echo $no++?></td>
                      <td><?php echo $row->career_code; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->nik; ?></td>
                      <td value="<?php echo $row->department_code ?>"><?php echo $row->department_name ?></td>
                      <td value="<?php echo $row->division_code ?>"><?php echo $row->division_name ?></td>
                      <td value="<?php echo $row->position_code ?>"><?php echo $row->position_name ?></td>
                      <td><?php echo $row->career_status; ?></td>
                      <?php 
                      if ($this->session->userdata('role_code') == '1' or
                          $this->session->userdata('role_code') == '2') {
                      ?>
                      <td align="center">
                        <a href="<?= base_url('career/edit/'.$row->career_code); ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></a>
                        <a onclick="deleteConfirm('<?php echo base_url("career/delete/".$row->career_code); ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                      <?php } ?>
                      <!-- <td align="center"><img src="<?php //echo base_url('assets/dist/photos/'.$row->photos) ?>" width="30" alignt="center"></td> -->
                      <!-- <td align="center" width="100">
                        <a class="btn btn-success btn-sm" href="<?php //echo base_url('employee/employee_details/'.$row->employee_code) ?>"><i class="fa fa-info"></i></a>
                        <a class="btn btn-primary btn-sm" href="<?php //echo base_url('employee/edit/'.$row->employee_code) ?>"><i class="fas fa-edit"></i></a>

                        <a onclick="deleteConfirm('<?php //echo base_url('employee/delete/'.$row->employee_code) ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                          </td> -->
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- ./Card Body -->
            </div>


          </div>
        </div>
      </div>
    </section>
<!-- <?php //} ?> -->