<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Family</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">All Family Data</h3>
          </div>
          <div class="card-body">
            <div class="flash-data-family" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Relationship</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Address</th>
                  <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2') {
                  ?>
                  <th scope="col">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($family as $fam) :
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $fam->name; ?></td>
                  <td><?= $fam->relationship; ?></td>
                  <td><?= $fam->contact; ?></td>
                  <td><?= $fam->address; ?></td>
                  <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2') {
                  ?>
                  <td>
                    <a href="<?php echo base_url('employee/employee_details/'.$fam->employee_code); ?>" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                    <a href="<?php echo base_url('family/edit/'.$fam->employee_code); ?>" class="btn btn-secondary btn-sm"><i class="fas fa-user-edit"></i></a>
                    <a onclick="deleteConfirm('<?php echo base_url("family/delete".$fam->id); ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                  <?php } ?>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </section>