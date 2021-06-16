    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BPJS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fa fa fa-user-md"></i> Master Data</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">All BPJS Data</h3>
          </div>
          <?php 
          if ($this->session->userdata('role_code') == '1' or
              $this->session->userdata('role_code') == '2') {
          ?>
          <div class="card-header">
            <a href="<?php echo base_url('bpjs/add'); ?>" class="btn btn-primary">Add BPJS</a>
          </div>
          <?php } ?>
          <div class="card-body">
            <div class="flash-data-bpjs" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">BPJS Code</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Name</th>
                  <th scope="col">BPJS Kesehatan</th>
                  <th scope="col">Clinic Name</th>
                  <th scope="col">BPJS Tenagakerja</th>
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
                foreach ($bpjs as $row) :
                ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td class="text-center"><?= $row->bpjs_code; ?></td>
                  <td class="text-center"><?= $row->nik; ?></td>
                  <td><?= $row->name; ?></td>
                  <td class="text-center"><?= $row->healthy_bpjs; ?></td>
                  <td><?= $row->clinic_name; ?></td>
                  <td class="text-center"><?= $row->labor_bpjs; ?></td>
                  <?php 
                  if ($this->session->userdata('role_code') == '1' or
                      $this->session->userdata('role_code') == '2') {
                  ?>
                  <td class="text-center">
                    <a href="<?php echo base_url('bpjs/edit/'.$row->bpjs_code); ?>" class="btn btn-secondary btn-sm"><i class="fas fa-user-edit"></i></a>
                    <a onclick="deleteConfirm('<?php echo base_url("bpjs/delete/".$row->bpjs_code); ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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