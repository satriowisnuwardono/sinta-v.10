<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Order IT</h1>
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
        <div class="row">
          <div class="col-sm-6 col-xs-12">
            <div class="card card-secondary card-outline">
              <div class="card-header">
                <h3 class="text-center">Form Job Order IT</h3>
              </div>

              <?php echo form_open('it_management/form_job_order_it'); ?>
              <div class="card-body">
                <div class="form-horizontal">
                  <div class="content">
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <input type="hidden" name="employee_code" id="employee_code" class="form-control form-control-sm" value="<?= $_SESSION['employee_code']?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jo_code" class="col-sm-4 control-label">Job Order Code</label>
                      <div class="col-sm-8">
                        <input type="text" name="jo_code" id="jo_code" class="form-control form-control-sm" value="JOIT-<?php echo sprintf("%04s", $jo_code) ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-sm-4 control-label">Client Name</label>
                      <div class="col-sm-8">
                        <input type="text" name="name" id="name" class="form-control form-control-sm" value="<?= $_SESSION['name']?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="request_type" class="col-sm-4 control-label">Request Type</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="request_type" id="request_type">
                          <option selected>No Selected</option>
                          <option value="1">Hardware</option>
                          <option value="2">Software</option>
                          <option value="3">Network</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="details" class="col-sm-4 control-label">Details</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="details" id="details"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-success" type="submit" name="btn" >Submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>

          <div class="col-sm-6 col-xs-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="text-center">Request Data List</h3>
              </div>
              <div class="card-body">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Request Type</th>
                      <th>Details</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($request_temp as $req) {
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td>
                        <?php if ($req->request_type == '1') {
                            echo "Hardware";
                        } else if ($req->request_type == '2') {
                          echo "Software";
                        } else if ($req->request_type == '3') {
                          echo "Network";
                        }
                        ?>
                      </td>
                      <td><?= $req->details; ?></td>
                      <td class="text-center"><a href="<?php echo base_url('it_management/delete_jo_temporary/'.$req->id_jo_temporary); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <a href="<?php echo base_url('it_management/send_request') ?>" class="btn btn-primary">Send Request</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>