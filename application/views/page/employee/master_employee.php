<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fa fa-users"></i> Employee</li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-warning card-outline">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-clipboard-list"></i> Employee Data Table</h3>
      </div>
      <?php 
        //Cek role user
        if($this->session->userdata('role_code') == '1'or 
        $this->session->userdata('role_code') == '2') {//Jika rolenya super admin
      ?>
      <div class="card-header">
        <a href="<?php echo base_url(); ?>employee/add" class="btn btn-primary">Add Employee</a>
      </div>
      <?php } ?>
      <div class="card-body">
        <div class="flash-data-employee" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIK</th>
              <th scope="col" width="15%">Name</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Religion</th>
              <th scope="col" width="5%">Marital Status</th>
              <th scope="col">Option</th>
              <?php 
                //Cek role user
                if($this->session->userdata('role_code') == '1'or 
                $this->session->userdata('role_code') == '2') {//Jika rolenya super admin
              ?>
              <th scope="col">User</th>
              <th scope="col">Structural</th>
              <th scope="col">Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1; 
              foreach ($employee as $emp) : ?>
            <tr>
              <td align="center"><?= $no++; ?></td>
              <td align="center"><?= $emp->nik; ?></td>
              <td><?= $emp->name; ?></td>
              <td><?= $emp->place_of_birth; ?>, <?= $emp->date_of_birth; ?></td>
              <td align="center" value="<?= $emp->religion_code; ?>"><?= $emp->religion_name; ?></td>
              <td align="center" value="<?= $emp->marital_status_code; ?>"><?= $emp->marital_status; ?></td>
              <td align="center">
                <a href="<?= base_url('employee/employee_details/'.$emp->employee_code); ?>" class="btn btn-warning btn-sm" style="width: 100%;"><i class="fas fa-user-edit"></i></a>
              </td>
              <?php 
                //Cek role user
                if($this->session->userdata('role_code') == '1'or 
                $this->session->userdata('role_code') == '2') {//Jika rolenya super admin
              ?>
              <td align="center">
                <a href="<?= base_url('user/add/'.$emp->employee_code); ?>" class="btn btn-secondary btn-sm" style="width: 100%;"><i class="fas fa-plus"></i></a>
              </td>
              <td align="center">
                <a href="<?= base_url('career/add/'.$emp->employee_code); ?>" class="btn btn-info btn-sm" style="width: 100%;"><i class="fas fa-sitemap"></i></a>
              </td>
              <td>
                <a onclick="deleteConfirm('<?php echo base_url('employee/delete/'.$emp->id) ?>')" href="#!" class="btn btn-sm btn-danger" style="width: 100%;"><i class="fas fa-trash"></i></a>
              </td>
              <?php } ?>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>