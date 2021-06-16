<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit</h1>
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
      <div class="container-fluid">
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">Edit Family</h3>
          </div>
          <?php echo form_open('family/process'); ?>
          <div class="card-body">
            <div class="form-group row justify-content-center">
              <label for="name" class="col-sm-2 col-form-label col-form-label-sm col align-self-center">Name</label>
              <div class="col-sm-6">
                <input type="hidden" class="form-control form-control-sm" id="employee_code" name="employee_code" value="<?php echo $family->employee_code; ?>">
                <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php echo $family->name; ?>">
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <label for="relationship" class="col-sm-2 col-form-label">Relationship</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-sm" id="relationship" name="relationship" value="<?php echo $family->relationship; ?>">
                </div>
            </div>
             <div class="form-group row justify-content-center">
               <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control form-control-sm" id="contact" name="contact" value="<?php echo $family->contact; ?>">
                 </div>
             </div>
             <div class="form-group row justify-content-center">
               <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-6">
                  <textarea class="form-control form-control-sm" id="address" name="address" rows="3" ><?php echo $family->address; ?></textarea>
                </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="float-sm-right">
                  <a href="<?= base_url('family/master_family'); ?>" class="btn btn-warning"> Cancel</a>
                  <button type="submit" name="btn" class="btn btn-success">Submit</button>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>
