<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Equipment</h1>
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
        <div class="flash-data-equipment" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Equipment List</h3>
            </div>
            <div class="card-header">
              <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_equipment"><i class="fas fa-plus-square"></i> Add Equipment</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Code</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Unit Type</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Safe Stock</th>
                    <th scope="col">Total Out</th>
                    <th scope="col">Last Stock</th>
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
                    <td class="text-center"><?php echo $row->item_code; ?></td>
                    <td><?php echo $row->item_name; ?></td>
                    <td class="text-center"><?php echo $row->unit_type; ?></td>
                    <td class="text-center"><?php echo $row->first_stock; ?></td>
                    <td class="text-center"><?php echo $row->safe_stock; ?></td>
                    <td class="text-center"><?php echo $row->total_out; ?></td>
                    <td class="text-center"><?php echo $row->last_stock; ?></td>
                    <td class="text-center">
                    <!-- Button trigger modal -->
                      <a onclick="deleteConfirm('<?php echo base_url("it_management/delete_equipment/".$row->item_code); ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
      </div>
    </section>

    <!-- MOdal -->
    <!-- Modal Add Equipment -->
    <div class="modal fade" id="add_equipment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Add Equipment</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open('it_management/add_equipment'); ?>
          <div class="modal-body">
            <div class="form-group row">
              <label for="item_code" class="col-sm-4 control-label">Item Code</label>
              <div class="col-sm-8">
                <input type="text" name="item_code" id="item_code" class="form-control form-control-sm" value="IT-<?php echo sprintf("%04s", $item_code) ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
               <label for="id_equipment" class="col-sm-4 control-label">Equipment Type</label>
               <div class="col-sm-8">
                <select class="form-control form-control-sm" name="id_equipment" id="id_equipment">
                  <option selected="">No Selected</option>
                  <?php foreach ($equipment_type as $row) {?>
                  <option value="<?php echo $row->id_equipment; ?>"><?php echo $row->equipment_type; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="item_name" class="col-sm-4 control-label">Item Name</label>
              <div class="col-sm-8">
                <input type="text" name="item_name" id="item_name" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-group row">
               <label for="unit_type" class="col-sm-4 control-label">Equipment Type</label>
               <div class="col-sm-8">
                <select class="form-control form-control-sm" name="unit_type" id="unit_type">
                  <option selected="">No Selected</option>
                  <option>Bottle</option>
                  <option>Cartridge</option>
                  <option>Pack</option>
                  <option>Pcs</option>
                  <option>Roll</option>
                  <option>Roll/Box</option>
                  <option>Unit</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="first_stock" class="col-sm-4 control-label">Stock</label>
              <div class="col-sm-8">
                <input type="text" name="first_stock" id="first_stock" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-group row">
              <label for="safe_stock" class="col-sm-4 control-label">Safe Stock</label>
              <div class="col-sm-8">
                <input type="text" name="safe_stock" id="safe_stock" class="form-control form-control-sm">
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