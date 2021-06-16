    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
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

    <section class="content">
      <div class="container-fluid">
        <div>
          <div class="row">
          <!-- Profile Image -->
          <div class="col-md-4 col-sm-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
              <h3 class="card-title">Add User Account</h3>
            </div>
            <?php echo form_open('user/insert_user'); ?>
              <div class="card-body">
                <input type="text" name="employee_code" id="employee_code" class="form-control" value="<?php echo $employee->employee_code ?>" hidden>
                <div class="position-relative form-group">
                  <label for="user_code">User Code</label>
                  <input type="text" name="user_code" id="user_code" class="form-control" value="USER-<?php echo sprintf("%04s", $user_code) ?>" readonly>
                </div>
                <div class="position-relative form-group">
                  <label for="nik">NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $employee->nik ?>" readonly>
                </div>
                <div class="position-relative form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="<?php echo $employee->name ?>" readonly>
                </div>
                <div class="position-relative form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="position-relative form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="position-relative form-group">
                  <label for="role_code">Role</label>
                  <select class="form-control" name="role_code" id="role_code">
                    <option value="">No Selected</option>
                    <?php foreach($role as $row):?>
                    <option value="<?php echo $row->role_code;?>"><?php echo $row->role_name;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="CREATE USER" />
              </div>
            <?php echo form_close(); ?>
            </div>
          </div>

          <!-- Show 5 New User -->
          <div class="col-md-8 col-sm-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                 <h3 class="card-title">The Last 5 User Data</h3>
              </div>

              <div class="card-body p-0">
                <!-- The Last 5 User Data -->
                <table class="table">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Name</td>
                      <td>NIK</td>
                      <td>Username</td>
                      <td>Level</td>
                      <td>Status</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no   = 1;
                      foreach ($last_five as $row) {
                     ?>
                    <tr>
                      <td><?php echo $no++;  ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->nik; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td value="<?php echo $row->role_code; ?>"><?php echo $row->role_name; ?></td>
                      <td>
                        <?php if ($row->access == 1) {
                          echo '<span class="badge badge-pill badge-success">Active</span>';
                        } else {
                          echo '<span class="badge badge-pill badge-danger">Off</span>';
                        } ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>