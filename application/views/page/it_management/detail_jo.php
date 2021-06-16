<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details Job Order IT</h1>
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
            <h3 class="card-title">Details Job Order</h3>
          </div>
          <div class="card-body">
            <table class="table table-sm" id="example1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Request Date</th>
                  <th>Details</th>
                  <th>Finish Date</th>
                  <th>Explanation</th>
                  <th>Status</th>
                  <?php if ($this->session->userdata('role_code') == '1') {?>
                  <th>Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($details as $row) {
                ?>
                <tr>
                  <td class="text-center" width="8%"><?= $no++; ?></td>
                  <td width="12%"><?= $row->request_date;?></td>
                  <td><?= $row->details;?></td>
                  <td width="12%">
                    <?php if ($row->request_status == '2') {
                      echo "$row->date_of_completion";
                    } else {
                      echo "";
                    } ?>
                  </td>
                  <td ><?= $row->explanation?></td>
                  <td class="text-center" width="10%">
                    <?php if ($row->request_status == '2') {
                      echo "<span class='badge badge-pill badge-primary'>Done</span>";
                    } else if ($row->request_status == '1') {
                      echo "<span class='badge badge-pill badge-success'>On Process</span>";
                    } else {
                      echo "<span class='badge badge-pill badge-warning'>Waiting</span>";
                    }?>
                  </td>
                  <?php if ($this->session->userdata('role_code') == '1') {?>
                  <td class="text-center" width="8%">
                    <!-- Button trigger modal -->
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->id_jo; ?>"><i class="fas fa-user-edit"></i></a>
                  </td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('it_management/job_order_list'); ?>" class="badge badge-light badge-pill"><i class="fas fa-arrow-circle-left"> Back</i></a>
          </div>
        </div>
      </div>
    </section>



    <!-- Modal -->
    <?php 
    foreach ($details as $row) {
    ?>
     <div class="modal fade" id="staticBackdrop<?php echo $row->id_jo?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Update Status Job Order</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open('it_management/edit'); ?>
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-sm-8">
                <input type="hidden" name="id_jo" id="id_jo" class="form-control form-control-sm" value="<?php echo $row->id_jo; ?>">
                <input type="hidden" name="employee_code" id="employee_code" class="form-control form-control-sm" value="<?php echo $row->employee_code; ?>">
                <input type="hidden" name="request_date" id="request_date" class="form-control form-control-sm" value="<?php echo $row->request_date; ?>">
                <input type="hidden" name="date_of_completion" id="date_of_completion" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-group row">
               <label for="jo_code" class="col-sm-4 control-label">Job Order Code</label>
               <div class="col-sm-8">
                <input type="text" name="jo_code" id="jo_code" class="form-control form-control-sm" value="<?php echo $row->jo_code; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
               <label for="name" class="col-sm-4 control-label">Client Name</label>
              <div class="col-sm-8">
                <input type="text" name="name" id="name" class="form-control form-control-sm" value="<?php echo $row->name?>" readonly>
               </div>
            </div>
            <div class="form-group row">
              <label for="request_type" class="col-sm-4 control-label">Request Type</label>
              <div class="col-sm-8">
                <?php if ($row->request_type == '1') {?>
                  <input type="text" class="form-control form-control-sm"  name="request_type" id="request_type" value="Hardware" readonly>
                <?php } else if ($row->request_type == '2') { ?>
                  <input type="text" class="form-control form-control-sm"  name="request_type" id="request_type" value="Software" readonly>
                <?php } else if ($row->request_type == '3') { ?>
                  <input type="text" class="form-control form-control-sm"  name="request_type" id="request_type" value="Network" readonly>
                <?php } ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="details" class="col-sm-4 control-label">Details</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="3" name="details" id="details" readonly><?php echo $row->details; ?></textarea>
               </div>
            </div>
            <div class="form-group row">
              <label for="request_status" class="col-sm-4 control-label">Request Status</label>
              <div class="col-sm-8">
                <select class="form-control form-control-sm" name="request_status" id="request_status">
                  <option selected>No Selected</option>
                  <option value="0">Waiting</option>
                  <option value="1">On Process</option>
                  <option value="2">Done</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="explanation" class="col-sm-4 control-label">Explanation</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="3" name="explanation" id="explanation"></textarea>
               </div>
            </div>
          </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" name="btn" class="btn btn-primary">Save</button>
           </div>
           <?php echo form_close(); ?>
         </div>
      </div>
     </div>
     <?php } ?>