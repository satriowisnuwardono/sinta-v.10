    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master User</h1>
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
        <div class="flash-data-user" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <!-- Card Header -->
              <div class="card-header">
                <h3 class="card-title"><span class="badge badge-primary"><i class="nav-icon fas fa-user"></i></span> All User List Data</h3>
              </div>
              <!-- ./Card Header -->

              <!-- Card Body -->
              <div class="card-body">
                <table id="example1"  class="table table-bordered table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Username</th>
                      <th scope="col">Role</th>
                      <th scope="col">Access</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($user as $row) { ?>
                    <tr>
                      <td align="center"><?php echo $no++?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td value="<?php echo $row->role_code ?>"><?php echo $row->role_name ?></td>
                      <td align="center">
                        <?php if($row->access == 1) {
                            echo '<sapan class="badge badge-pill badge-success">On</span>';
                          } else {
                            echo '<sapan class="badge badge-pill badge-danger">Off</span>';
                          } ?>
                          
                      </td>
                      <td align="center">
                        <a href="<?= base_url('user/edit/'.$row->user_code); ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></a>
                        <a onclick="deleteConfirm('<?php echo base_url("user/delete/".$row->user_code); ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
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

