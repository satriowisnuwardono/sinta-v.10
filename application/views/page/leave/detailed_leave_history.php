    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Approval</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-umbrella-beach"></i> Annual Leave</a></li>
              <li class="breadcrumb-item"> <?php echo $title ?></li>
              <li class="breadcrumb-item active"> <?php echo $sub_title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-info card-outline">
          <div class="card-header">
            
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Annual Leave Code</th>
                  <th scope="col">Employee Name</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Leave Taken</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Checker</th>
                  <th scope="col">Signer</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($detailed_leave_history as $dlh) {
                ?>
                  <tr>
                    <td class="text-center" width="5%"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $dlh->annual_leave_code;?></td>
                    <td><?php echo $dlh->name;?></td>
                    <td class="text-center"><?php echo $dlh->nik;?></td>
                    <td class="text-center" width="5%"><?php echo $dlh->leave_taken;?></td>
                    <td class="text-center"><?php echo $dlh->leave_start_date;?></td>
                    <td class="text-center"><?php echo $dlh->leave_end_date;?></td>
                    <td class="text-center">
                      <?php if ($dlh->status_checker1 == '1') {
                        echo "<span><i class='fas fa-check-circle' style='color:#28a745;'></i></span>";
                      } else if ($dlh->status_checker1 == '0') {
                        echo "<span><i class='far fa-clock' style='color:#007bff;'></i></span>";
                      } 
                       else {
                        echo "<span><i class='fas fa-minus-circle' style='color:#dc3545;'></i></span>";
                      }?>
                    </td>
                    <td class="text-center">
                      <?php if ($dlh->status_checker1 == '1' and $dlh->status_checker2 == '1') {
                        echo "<span><i class='fas fa-check-circle' style='color:#28a745;'></i></span>";
                      } else if ($dlh->status_checker1 == '1' and $dlh->status_checker2 == '0') {
                        echo "<span><i class='far fa-clock' style='color:#007bff;'></i></span>";
                      } else if ($dlh->status_checker1 == '0' and $dlh->status_checker2 == '0') {
                        echo "<span><i class='far fa-clock' style='color:#007bff;'></i></span>";
                      }
                       else {
                        echo "<span><i class='fas fa-minus-circle' style='color:#dc3545;'></i></span>";
                      }?>
                    </td>
                    <td class="text-center">
                      <?php if ($dlh->status_checker1 == '1' && $dlh->status_checker2 == '1' && $dlh->status_cancellation_agreement == '0') {
                        echo "<span class='badge badge-pill badge-success'>Approved</span>";
                      } else if ($dlh->status_checker1 == '1' && $dlh->status_checker2 == '1' && $dlh->status_cancellation_agreement == '2') {
                        echo "<span class='badge badge-pill badge-warning'>Canceled</span>";
                      }  else if ($dlh->status_checker1 == '1' && $dlh->status_checker2 == '1' && $dlh->status_cancellation_agreement == '1') {
                        echo "<span class='badge badge-pill badge-info'>Waiting for Canceled</span>";
                      } else {
                         echo "<span class='badge badge-pill badge-primary'>Waiting</span>";
                      } ?>
                    </td>
                    <td class="text-center">
                      <?php if (date('Y-m-d') < $dlh->leave_start_date && $dlh->status_cancellation_agreement == 0 && $dlh->status_checker1 == '1' && $dlh->status_checker2 == '1') { ?>
                        <a href="<?php echo base_url('leave_request/cancellation/'.$dlh->annual_leave_code); ?>" class="btn btn-warning btn-sm">Cancel</a>
                        <?php } else { ?>
                        <span class='badge badge-pill badge-secondary'>Closed</span>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </section>