    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Announcement Details</h1>
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
        <div>
          <div class="card card-info card-outline">
            <?php foreach ($announcement as $row) {?>
            <div class="card-header">
              <h3 class="text-center"><?php echo $row->title; ?></h3>
            </div>
            <div class="card-body">
              <p><?php echo $row->details; ?></p>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('announcement/download/'.$row->files); ?>"><i class="far fa-file-alt"></i> <?php echo $row->files; ?></a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>      
    </section>