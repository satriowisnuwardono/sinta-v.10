    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-bullhorn"></i> Announcement</a></li>
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
            <h3 class="card-title">Add Announcement</h3>
          </div>
          <?php echo form_open_multipart('announcement/add'); ?>
          <div class="card-body pad">
            <div class="form-group row">
              <label for="title" class="col-sm-3 col-form-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title">
              </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                  <div class="mb-3">
                    <!-- <textarea class="textarea" placeholder="Place some text here" name="details" id="details" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->
                    <textarea class="form-control" rows="6" name="details" id="details"></textarea>
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label for="files" class="col-sm-3 col-form-label">Upload Files</label>
              <div class="col-sm-9">
                <input type="file" name="attachment" id="files" class="form-control">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="float-sm-right">
              <a href="<?php echo base_url('announcement'); ?>" class="btn btn-warning"> Cancel</a>
              <button type="submit" name="btn" class="btn btn-success">Submit</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>