    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Data Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fa fa-list"></i> Master Data</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                  <h3 class="card-title"><span class="badge badge-primary"><i class="nav-icon fas fa-users"></i></span> All Employee Data</h3>
                </div>
                <!-- ./Card Header -->

                <div class="card-header">
                  <!-- <a href="<?php echo base_url('employee/insert_employee'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Employee</a> -->

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="badge badge-light"><i class="fas fa-user-plus"></i></span> Add Employees</button>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                    
                  </div>
                  <?php if ( $this->session->flashdata('flash') ): ?>
                    <!-- <div class="alert alert-success" role="alert">
                      Data <strong> <?php echo $this->session->flashdata('flash'); ?> </strong> Sucessfully
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> -->
                  <?php endif; ?>

                  <table id="example1"  class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Religion</th>
                        <th scope="col">Marital Status</th>
                        <th scope="col">Option</th>
                        <th scope="col">User</th>
                        <th scope="col">Structural</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        foreach ($employee as $row) : ?>
                      <tr>
                        <td align="center"><?php echo $no++?></td>
                        <td align="center"><?php echo $row->nik; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->place_of_birth?>, <?php echo $row->date_of_birth; ?></td>
                        <td value="<?php echo $row->religion_code;?>"><?php echo $row->religion_name;?></td>
                        <td align="center" value="<?php echo $row->marital_status_code;?>"><?php echo $row->marital_status;?></td>
                        <td align="center"><a href="<?php echo base_url('employee/employee_details/'.$row->employee_code); ?>" class="btn btn-primary btn-sm" style="width: 100%;"><i class="fas fa-user-edit"></i></a></td>
                        <td align="center"><a href="<?php echo base_url('user/add_user/'.$row->employee_code); ?>" class="btn btn-secondary btn-sm" style="width: 100%;"><i class="fas fa-plus"></i></a></td>
                        <td align="center"><a href="<?php echo base_url('employee/add_structural/'.$row->employee_code); ?>" class="btn btn-info btn-sm" style="width: 100%;"><i class="fas fa-sitemap"></i></a></td>
                        <!-- <td align="center"><img src="<?php //echo base_url('assets/dist/photos/'.$row->photos) ?>" width="30" alignt="center"></td> -->
                        <!-- <td align="center" width="100">
                          <a class="btn btn-success btn-sm" href="<?php //echo base_url('employee/employee_details/'.$row->employee_code) ?>"><i class="fa fa-info"></i></a>
                          <a class="btn btn-primary btn-sm" href="<?php //echo base_url('employee/edit/'.$row->employee_code) ?>"><i class="fas fa-edit"></i></a>
                        -->
                        <td>
                          <a href="<?= base_url(); ?>employee/delete_employee/<?= $row->employee_code; ?>" class="btn btn-sm btn-danger" style="width: 100%;"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- ./Card Body -->
              </div>
            </div>
         </div>
      </div>
    </section>

