    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Master Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fa fa-list"></i> Master Data</a></li>
              <li class="active"> / <?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row ml-1 mr-1">
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <!-- Card Header -->
              <div class="card-header">
                <h3 class="card-title"><span class="badge badge-primary"><i class="nav-icon fas fa-list"></i></span> Department List</h3>
              </div>
              <!-- ./Card Header -->

              <!-- Card Body -->
              <div class="card-body">
                <table id="example1"  class="table table-bordered table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">No</th>
                      <th scope="col">Department Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($department as $row) { ?>
                    <tr>
                      <td width="10%" class="text-center"><?php echo $no++?></td>
                      <td><?php echo $row->department_name; ?></td>
                      <td align="center" width="100">
                        <!-- Example single danger button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- ./Card Body -->
            </div>
          </div>

          <!-- Input Department -->
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <!-- Card Header -->
              <div class="card-header">
                <h3 class="card-title"><span class="badge badge-primary"><i class="nav-icon fas fa-plus"></i></span> Add Department Master</h3>
              </div>
              <!-- ./Card Header -->

              <form action="" method="post" enctype="multipart/form-data">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" name="department_name" id="department_name" class="form-control">
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" name="btn">Submit</button>
                </div>
                <!-- ./Card Body -->
              </form>
              
            </div>
          </div>
        </div>
    </section>

