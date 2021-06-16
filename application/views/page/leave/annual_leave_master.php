<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Annual Leave Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Annual Leave</li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Employee Leave Rights Data</h3>
          </div>

          <?php 
          if ($this->session->userdata('role_code') == '1' or
              $this->session->userdata('role_code') == '2') {
          ?>
          <div class="card-header">
            <a href="<?php echo base_url('annual_leave/add'); ?>" class="btn btn-primary">Add Employee</a>
          </div>
          <?php } ?>

          <div class="card-body">
            <div class="flash-data-leave" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <table class="table table-bordered " id="example1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Periode</th>
                  <th scope="col">Effective Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Total</th>
                  <th scope="col">Leave Taken</th>
                  <th scope="col">Remaining Days Off</th>
                  <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2') {
                  ?>
                  <th scope="col">Action</th>
                  <?php } ?>
              </thead>
              <tbody>
                <?php 
                  $no = 1; 
                  foreach ($leave_right as $lr) {
                ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $lr->name; ?></td>
                  <td class="text-center"><?php echo $lr->nik; ?></td>
                  <td class="text-center"><?php echo $lr->leave_period; ?></td>
                  <td class="text-center"><?php echo $lr->effective_date; ?></td>
                  <td class="text-center"><?php echo $lr->valid_until; ?></td>
                  <td class="text-center"><?php echo $lr->total; ?></td>
                  <td class="text-center"><?php echo $lr->leave_taken; ?></td>
                  <td class="text-center" width="5%"><?php echo $lr->remaining_days_off; ?></td>
                  <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2') {
                  ?>
                  <td class="text-center">
                    <a href="<?php echo base_url('annual_leave/edit/'.$lr->id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <a onclick="deleteConfirm('<?php echo base_url("annual_leave/delete/".$lr->id); ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </section>
