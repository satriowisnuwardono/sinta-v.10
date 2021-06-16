<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <!-- <div class="container-fluid"> -->
        <div class="row">
          <!-- <div class="col-md-12 col-sm-12"> -->
            <!-- <div class="card border-warning"> -->
              <!-- <div class="card-header">
                 <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#department" data-toggle="tab">Department</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#division" data-toggle="tab">Division</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#position" data-toggle="tab">Position</a>
                  </li>
                </ul>
              </div>
 -->              
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
              <div class="card-body">
                <div class="tab-content">
                  <!-- department -->
                  
                  <div id="department" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-8 col-sm-12">
                        <div class="card card-warning card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Department List</h3>
                          </div>
                          <div class="card-body">
                             <table id="example1"  class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Department Code</th>
                                  <th scope="col">Department Name</th>
                                  <th scope="col" style="width: 20%;">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  foreach ($department as $row) :
                                ?>
                                <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?php echo $row->department_code; ?></td>
                                  <td><?php echo $row->department_name; ?></td>
                                  <td class="text-center">
                                    <a href="#" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url(); ?>department/deleteDepartment/<?= $row->id;?>" class="btn btn-sm btn-danger" id="tombol-hapus" name="tombol-hapus"><i class="fas fa-trash"></i></a>
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

                      <div class="col-md-4 col-sm-12">
                        <div class="card card-warning card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Add Master Department</h3>
                          </div>

                          <form action="<?php echo base_url('department/addDepartment'); ?>" method="post">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="department_code">Department Code</label>
                                <input class="form-control" id="department_code" name="department_code" value="DEPT-<?php echo sprintf("%04s", $department_code) ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="department_name">Department Name</label>
                                <input class="form-control" id="department_name" name="department_name">
                              </div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" name="addDepartment" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- division -->
                  <div id="division" class="tab-pane">
                    <div class="row">
                      <div class="col-md-8 col-sm-12">
                        <div class="card card-warning card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Master Division</h3>
                          </div>
                          <div class="card-body">
                             <table id="example1"  class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Division Code</th>
                                  <th scope="col">Department Name</th>
                                  <th scope="col">Division Name</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  foreach ($division as $row) :
                                ?>
                                <tr>
                                  <td><?= $no++;?></td>
                                  <td><?php echo $row->division_code ?></td>
                                  <td value="<?php echo $row->department_code ?>"><?php echo $row->department_name ?></td>
                                  <td><?= $row['division_name'] ?></td>
                                  <td></td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                          <div class="card-footer">
                            
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-12">
                        <div class="card card-warning card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Add Master Division</h3>
                          </div>
                          <div class="card-body">
                            <div class="form-group">
                                <label for="division_code">division Code</label>
                                <input class="form-control" id="division_code" name="division_code" value="DIV-<?php echo sprintf("%04s", $department_code) ?>" readonly>
                              </div>
                            <div class="position-relative form-group">
                              <label for="department_code">Department</label>
                              <select class="form-control" name="department_code" id="department_code" required>
                                <option value="">No Selected</option>
                                  <?php foreach($department as $row):?>
                                    <option value="<?php echo $row->department_code;?>"><?php echo $row->department_name;?></option>
                                  <?php endforeach;?>
                              </select>
                            </div>
                            <div class="position-relative form-group">
                              <label for="division_name">Division Name</label>
                              <input type="text" name="division_name" id="division_name" class="form-control">
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- position -->
                  <div id="position" class="tab-pane">
                    <div class="row">
                      <div class="col-md-8 col-sm-12">
                        <div class="card card-warning card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Master Position</h3>
                          </div>
                          <div class="card-body">
                             <table id="example1"  class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Position Name</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <td></td>
                                <td></td>
                                <td></td>>
                              </tbody>
                            </table>
                          </div>
                          <div class="card-footer">
                            
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-12">
                        <div class="card card-warning card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Add Master POsition</h3>
                          </div>
                          <div class="card-body">
                            
                            <div class="position-relative form-group">
                              <label for="position_name">Position Name</label>
                              <input type="text" name="position_name" id="position_name" class="form-control">
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
