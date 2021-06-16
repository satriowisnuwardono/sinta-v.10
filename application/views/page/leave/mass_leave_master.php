<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mass Leave Data</h1>
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
            <h3 class="card-title">Mass Leave List</h3>
          </div>

          <?php 
          if ($this->session->userdata('role_code') == '1' or
              $this->session->userdata('role_code') == '2') {
          ?>
          <div class="card-header">
            <a href="<?php echo base_url('mass_leave/add'); ?>" class="btn btn-primary">Add Mass Leave</a>
          </div>
          <?php } ?>

          <div class="card-body">
            <div class="flash-data-mass-leave" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <table class="table table-bordered " id="example1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Infortmation</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Length</th>
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
                  foreach ($mass_leave as $ml) {
                ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $ml->leave_name; ?></td>
                  <td class="text-center"><?php echo $ml->start_date; ?></td>
                  <td class="text-center"><?php echo $ml->end_date; ?></td>
                  <td class="text-center"><?php echo $ml->mass_leave_total; ?></td>
                  <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2') {
                  ?>
                  <td class="text-center">
                   <!--  <a href="<?php echo base_url('mass_leave/delete/'.$ml->id); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                    <a onclick="deleteConfirm('<?php echo site_url('mass_leave/delete/'.$ml->mass_leave_id) ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

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
