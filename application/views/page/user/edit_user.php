  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit User</h1>
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
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title"><span class="badge badge-secondary"><i class="fa fa-user"></i></span> Edit User Account</h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php echo form_open('user/edit'); ?>
        <div class="card-body">
            <div class="form-group row justify-content-center">
              <label for="user_code" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">User Code</label>
              <div class="col-sm-6">
                <input type="hidden" class="form-control form-control-sm" id="id" name="id" value="<?php echo $user->id; ?>">
                <input type="text" class="form-control form-control-sm" id="user_code" name="user_code" value="<?php echo $user->user_code; ?>" readonly>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="employee_code" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Employee Code</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="employee_code" name="employee_code" value="<?php echo $user->employee_code; ?>" readonly>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="name" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php echo $user->name; ?>" readonly>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="username" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Username</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="username" name="username" value="<?php echo $user->username; ?>" readonly>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="password" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Password</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="password" name="password" value="<?php echo $user->password; ?>">
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="role_code" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Role</label>
              <div class="col-sm-6">
                <select class="form-control" name="role_code" id="role_code">
                  <?php foreach ($role as $r) :?>
                      <?php if($r->role_code == $user->role_code ) : ?>
                          <option value="<?= $r->role_code;?>" selected><?= $r->role_name;?></option>
                        <?php else : ?>
                          <option value="<?= $r->role_code;?>"><?= $r->role_name;?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="access" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Access</label>
              <div class="col-sm-6">
                <select class="form-control" name="access" id="access">
                  <option selected><?php if ($user->access == 1) {
                      echo "Active";
                    } else {
                      echo "Off";
                    } ?>  
                  </option>
                  <option value="1">Active</option>
                  <option value="0">Off</option>
                </select>
              </div>
            </div>
          </div>
            <div class="card-footer">
              <div class="float-sm-right">
                <a href="<?= base_url('user/master_user'); ?>" class="btn btn-warning"> Cancel</a>
                <button type="submit" name="btn" class="btn btn-success">Submit</button>
              </div>
            </div>
          <?php echo form_close(); ?>
      </div>
    </div>
  </section>