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
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($leave_submission_list as $lsl) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $lsl->annual_leave_code;?></td>
                    <td><?php echo $lsl->name;?></td>
                    <td class="text-center"><?php echo $lsl->nik;?></td>
                    <td class="text-center"><?php echo $lsl->leave_taken;?></td>
                    <td class="text-center"><?php echo $lsl->start_date;?></td>
                    <td class="text-center"><?php echo $lsl->end_date;?></td>
                    <td class="text-center">
                      <?php if ($lsl->status_checker1 == '1') {
                        echo "<span><i class='fas fa-check-circle' style='color:#28a745;'></i></span>";
                      } else if ($lsl->status_checker1 == '0') {
                        echo "<spann class='badge badge-warning'>Pending</span>";
                      } 
                       else {
                        echo "<spann class='badge badge-danger'>Rejected</span>";
                      }?>
                    </td>
                    <td class="text-center">
                      <?php if ($lsl->status_checker1 == '1' and $lsl->status_checker2 == '1') {
                        echo "<span><i class='fas fa-check-circle' style='color:#28a745;'></i></span>";
                      } else if ($lsl->status_checker1 == '1' and $lsl->status_checker2 == '0') {
                        echo "<span><i class='far fa-clock' style='color:#007bff;'></i></span>";
                      } else if ($lsl->status_checker1 == '0' and $lsl->status_checker2 == '0') {
                        echo "<span><i class='fas fa-minus-circle' style='color:#dc3545;'></i></span>";
                      }
                       else {
                        echo "<spann class='badge badge-danger'>Rejected</span>";
                      }?>
                    </td>
                    <td>
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Details</a>
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