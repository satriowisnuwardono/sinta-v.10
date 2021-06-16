<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Equipment Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">IT Assets</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="flash-data-equipment-type" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
          <div class="col-md-8 col-sm-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">Equipment List</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Equipment Type</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($equipment as $row) :
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $row->equipment_type; ?></td>
                      <td class="text-center">
                       <!-- Button trigger modal -->
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->id_equipment; ?>"><i class="fas fa-user-edit"></i></a>
                        <a onclick="deleteConfirm('<?php echo base_url("it_management/delete_equipment_type/".$row->id_equipment) ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                <h3 class="card-title">Add Equipment</h3>
              </div>
              <?php echo form_open('it_management/add_equipment_type'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <div class="position-relative form-group">
                      <label for="equipment_type">Equipment Type</label>
                      <input type="text" name="equipment_type" id="equipment_type" class="form-control">
                    </div>
                  </div>
                </div>
                  <div class="card-footer">
                    <button type="submit" name="add" class="btn btn-primary float-right">Save</button>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <?php 
    foreach ($equipment as $row) {
    ?>
     <div class="modal fade" id="staticBackdrop<?php echo $row->id_equipment?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Update Equipment</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open('it_management/edit_equipment'); ?>
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-sm-8">
                <input type="hidden" name="id_equipment" id="id_equipment" class="form-control form-control-sm" value="<?php echo $row->id_equipment; ?>">
              </div>
            </div>
            <div class="form-group row">
               <label for="equipment_type" class="col-sm-4 control-label">Equipment Type</label>
               <div class="col-sm-8">
                <input type="text" name="equipment_type" id="equipment_type" class="form-control form-control-sm" value="<?php echo $row->equipment_type; ?>">
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































































