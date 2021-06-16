<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Order IT Complete</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">IT Management</a></li>
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
            <h3 class="card-title">List Job Order Complete</h3>
          </div>
          <div class="card-body">
            <table class="table table-sm" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Job Order Code</th>
                  <th>User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($request as $row) {
                ?>
                <tr>
                  <td class="text-center" width="8%"><?= $no++; ?></td>
                  <td><?= $row->jo_code;?></td>
                  <td><?= $row->name;?></td>
                  <td class="text-center">
                    <a href="<?php echo base_url('it_management/detail_jo_complete/'.$row->jo_code) ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Details</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>