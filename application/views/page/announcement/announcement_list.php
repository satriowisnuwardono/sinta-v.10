    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Announcement List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-bullhorn"></i> Announcement</a></li>
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
            <h3 class="card-title">Announcement List</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-hover" id="example1">
              <thead>
                <tr>
                  <th scope="col" width="5%">#</th>
                  <th scope="col" width="10%">Date</th>
                  <th scope="col">Title</th>
                  <th scope="col" width="30%">Files</th>
                  <th scope="col" width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($announcement as $al) :
                ?>
                  <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $al->announcement_date; ?></td>
                    <td><?php echo $al->title; ?></td>
                    <td><?php echo $al->files; ?></td>
                    <td class="text-center">
                      <a href="<?php echo base_url('announcement/details/'.$al->announcement_id); ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                      <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
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