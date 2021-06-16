<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Equipment Out</h1>
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
              <h3 class="card-title">Equipment Out</h3>
            </div>
            <div class="card-header">
              <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_equipment_out"><i class="fas fa-plus-square"></i> Add Equipment Out</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Out Date</th>
                    <th scope="col">Explanation</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($equipment_out as $row) :
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td><?php echo $row->item_name; ?></td>
                    <td class="text-center"><?php echo $row->total; ?></td>
                    <td class="text-center"><?php echo $row->out_date; ?></td>
                    <td class="text-center"><?php echo $row->explanation; ?></td>
                    <td class="text-center">
                    <!-- Button trigger modal -->
                      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->id_equipment; ?>"><i class="fas fa-user-edit"></i></a>
                      <a onclick="deleteConfirm('<?php echo base_url("it_management/delete_equipment/".$row->id_equipment) ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
    <div class="modal fade" id="add_equipment_out" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Add Equipment Out</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open('it_management/add_equipment_out'); ?>
          <div class="modal-body">
            <div class="form-group row">
              <label for="item_code" class="col-sm-4 control-label">Item Name</label>
              <div class="col-sm-8">
                <select class="form-control form-control-sm" name="item_code" id="item_code">
                  <option selected="">No Selected...</option>
                  <?php foreach ($equipment_list as $el) { ?>
                  <option value="<?php echo $el->item_code ?>"><?php echo $el->item_name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="total" class="col-sm-4 control-label">Total</label>
              <div class="col-sm-8">
                <input type="text" name="total" id="total" class="form-control form-control-sm">
              </div>
            </div>

            <div class="form-group row">
              <label for="out_date" class="col-sm-4 control-label">Out Date</label>
              <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                      <input type="date" name="out_date" id="out_date" value="" class="form-control form-control-sm">
                  </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="explanation" class="col-sm-4 control-label">Explanation</label>
              <div class="col-sm-8">
                <textarea type="text" name="explanation" id="explanation" class="form-control" rows="3"></textarea>
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