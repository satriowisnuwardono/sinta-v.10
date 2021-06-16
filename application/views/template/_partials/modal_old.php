<!-- Logout Delete Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModallabel">Are You Sure ?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<div class="modal-body">Delete data cannot be Returned</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
			</div>
		</div>
	</div>
</div>

<!-------------------ADD------------------>
<!-- Add Employee -->
<div class="modal fade bd-example-modal-lg" id="add-emp" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Add Employee : <span><small> EMP-<?php echo sprintf("%04s", $employee_code) ?></small></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('employee/add_employee') ?>
      <div class="modal-body">
      	<div class="form-row">
          <input type="text" name="employee_code" id="employee_code" class="form-control" value="EMP-<?php echo sprintf("%04s", $employee_code) ?>" hidden>
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="nik">NIK</label>
      				<input type="text" name="nik" id="nik" class="form-control">
      			</div>
      		</div>
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="id_number">ID Card Number</label>
      				<input type="text" name="id_number" id="id_number" class="form-control">
      			</div>
      		</div>
      	</div>
      	<div class="form-row">
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="name">Full Name</label>
      				<input type="text" name="name" id="name" class="form-control">
      			</div>
      		</div>
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="gender">Gender</label>
      				<select name="gender" id="gender" class="form-control">
                <option selected>No Selected</option>
                <option>Male</option>
                <option>Female</option>
              </select>
      			</div>
      		</div>
      	</div>
      	<div class="form-row">
      		<div class="col-md-3 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="place_of_birth">Place of Birth</label>
      				<input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
      			</div>
      		</div>
      		<div class="col-md-3 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="date_of_birth">Date of Birth</label>
      				<div class="input-group">
	      				<div class="input-group-prepend">
	                <span class="input-group-text">
	                  <i class="far fa-calendar-alt"></i>
	                </span>
	              </div>
	              <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
	            </div>
      			</div>
      		</div>
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="religion">Religion</label>
      				<select class="form-control" name="religion_code" id="religion_code">
                        <option value="">No Selected</option>
                        <?php foreach($religion as $row):?>
                        <option value="<?php echo $row->religion_code;?>"><?php echo $row->religion_name;?></option>
                        <?php endforeach;?>
                    </select>
      			</div>
      		</div>
      	</div>
      	<div class="form-row">
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="marital_status">Marital Status</label>
      				<select class="form-control" name="marital_status_code" id="marital_status_code">
                        <option value="">No Selected</option>
                        <?php foreach($marital_status as $row):?>
                        <option value="<?php echo $row->marital_status_code;?>"><?php echo $row->marital_status;?></option>
                        <?php endforeach;?>
                    </select>
      			</div>
      		</div>
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="phone_number">Phone Number</label>
      				<input type="text" name="phone_number" id="phone_number" class="form-control">
      			</div>
      		</div>
      	</div>
      	<div class="form-row">
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="address">Address</label>
      				<input type="text" name="address" id="address" class="form-control">
      			</div>
      		</div>
      		<div class="col-md-6 col-sm-12">
      			<div class="position-relative form-group">
      				<label for="reference">Reference</label>
      				<input type="text" name="reference" id="reference" class="form-control">
      			</div>
      		</div>
        </div>
      </div>
      <div class="modal-footer">
           	
            <button type="reset" class="btn btn-danger"><i class="fa fa-xlose"></i> Reset</button>
            <button type="submit" class="btn btn-success" id="swalSuccess">Submit</button>
            

           <!--  <div class="col-md-8">
                <?php //if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                    	<?php //echo $this->session->flashdata('success'); ?>
                    </div>
                    	<?php //endif; ?>
            </div> -->
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<!-- Add Family -->
<div class="modal fade bd-family-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Family</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

      <?php echo form_open('employee/insert_family'); ?>
      <div class="modal-body">
        <div class="position-relative form-group">
          <input type="text" name="employee_code" id="employee_code" class="form-control" value="<?php echo $employee_code->employee_code ?>" hidden>
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="status">Status</label>
          <input type="text" name="status" id="status" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="contact">Contact Number</label>
          <input type="text" name="contact" id="contact" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<!-- Add Education -->
       <!--  <div class="modal fade bd-education-modal-lg" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Add Education</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Education</label>
                        <div class="col-xs-9">
                            <input name="employee_code" id="employee_code" class="form-control" type="text" style="width:335px;" hidden>
                            <input name="education" id="education" class="form-control" type="text" style="width:335px;">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Major</label>
                        <div class="col-xs-9">
                            <input name="major" id="major" class="form-control" type="text" style="width:335px;">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-9">
                            <input name="status" id="status" class="form-control" type="text" style="width:335px;">
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div> -->
        <!--END MODAL ADD-->
<div class="modal fade bd-education-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Education</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('employee/insert_education'); ?>
      <div class="modal-body">
        <div class="position-relative form-group">
          <input type="text" name="employee_code" id="employee_code" class="form-control" value="<?php echo $employee_code->employee_code ?>" hidden>
          <label for="education">Education</label>
          <input type="text" name="education" id="education" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="major">Major</label>
          <input type="text" name="major" id="major" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="status">Status</label>
          <input type="text" name="status" id="status" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<!-------------------EDIT------------------>
<!-- Edit Employee -->
<div class="modal fade" id="edit-emp" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Employee : <span><small> EMP-<?php echo sprintf("%04s", $employee_code) ?></small></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('employee/add_employee') ?>
      <div class="modal-body">
        <div class="form-row">
          <input type="text" name="employee_code" id="employee_code" class="form-control" value="EMP-<?php echo sprintf("%04s", $employee_code) ?>" hidden>
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="nik">NIK</label>
              <input type="text" name="nik" id="nik" class="form-control">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="id_number">ID Card Number</label>
              <input type="text" name="id_number" id="id_number" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="name">Full Name</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option selected>No Selected</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-3 col-sm-12">
            <div class="position-relative form-group">
              <label for="place_of_birth">Place of Birth</label>
              <input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="position-relative form-group">
              <label for="date_of_birth">Date of Birth</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="religion">Religion</label>
              <select class="form-control" name="religion_code" id="religion_code">
                <option value="">No Selected</option>
                <?php foreach($religion as $row):?>
                <option value="<?php echo $row->religion_code;?>"><?php echo $row->religion_name;?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="marital_status">Marital Status</label>
                <select class="form-control" name="marital_status_code" id="marital_status_code">
                  <option value="">No Selected</option>
                  <?php foreach($marital_status as $row):?>
                  <option value="<?php echo $row->marital_status_code;?>"><?php echo $row->marital_status;?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="phone_number">Phone Number</label>
              <input type="text" name="phone_number" id="phone_number" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="position-relative form-group">
              <label for="reference">Reference</label>
              <input type="text" name="reference" id="reference" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
            
            <button type="reset" class="btn btn-danger"><i class="fa fa-xlose"></i> Reset</button>
            <button type="submit" class="btn btn-success" id="swalSuccess">Submit</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="edit-profile" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
          
        </div>
        <?php echo form_open('dashboard/edit'); ?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="employee_code" class="col-sm-3 col-form-label">Employee Code</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control" id="employee_code" name="employee_code" value="<?php echo $this->session->userdata('employee_code'); ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->session->userdata('name'); ?>">
            </div>
          </div>
           <div class="form-group row">
            <label for="photos" class="col-sm-3 col-form-label">Photo</label>
            <div class="col-sm-3">
              <img src="<?php echo base_url('assets/dist/photos/'.$this->session->userdata('photos')); ?>" alt="user profile" class="profile-user-img img-fluid">
            </div>
            <div class="col-sm-6">
            <div class="position-relative form-group">
              <label for="photos">Upload Photo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="photos" name="photos">
                  <label class="custom-file-label" for="photos">Choose file</label>
                </div>
            </div>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>