<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Deleted data will not be restored.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-------------------- ADD ------------------->
	<!-- ADD EMPLOYEE -->
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
	      </div>
	      <?php echo form_close(); ?>
	    </div>
	  </div>
	</div>
	<!-- END ADD EMPLOYEE -->

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

	      <?php echo form_open('family/add'); ?>
	      <div class="modal-body">
	        <div class="position-relative form-group">
	          <input type="text" name="employee_code" id="employee_code" class="form-control" value="<?php echo $employee->employee_code; ?>" hidden>
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
    <div class="modal fade bd-example-modal-lg add_education" id="add_education" data-backdrop="static"  role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
            <div class="modal-content">
        	    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Education</h5>
                </div>
            	<div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="institution" class="col-sm-4 col-form-label">Institution Name</label>
                            <div class="col-sm-8">
                	            <input type="hidden" class="form-control form-control-sm" id="institution" name="institution" value="<?php echo $employee_code->employee_code; ?>">
                                <input type="text" class="form-control form-control-sm" id="institution" name="institution">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-sm-4 col-form-label">Education</label>
                    	    <div class="col-sm-8">
                        	    <input type="text" class="form-control form-control-sm" id="education" name="education">
                            </div>
                        </div>
                        <div class="form-group row">
                        	<label for="major" class="col-sm-4 col-form-label">Major</label>
                            <div class="col-sm-8">
                            	<input type="text" class="form-control form-control-sm" id="major" name="major">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="from" class="col-sm-4 col-form-label">Start From</label>
                        	<div class="col-sm-3">
                                <select for="start" class="form-control form-control-sm" name="start" id="start">
                                    <option selected="">year</option>
                                    <?php 
                                    for($s=date('Y'); $s>=date('Y')-50; $s-=1){
                                      echo "<option value='$s'>$s</option>";
                                    } 
                                    ?>
                                </select>
                            </div>
                            <label for="to" class="col-sm-2 col-form-label text-center">TO</label>
                            <div class="col-sm-3">
                                <select for="finish" class="form-control form-control-sm" name="finish" id="finish">
                                    <option selected="">year</option>
                                    <?php 
                                    for($f=date('Y'); $f>=date('Y')-50; $f-=1){
                                      echo "<option value='$f'>$f</option>";
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

<!---------------- EDIT -------------->
	<!-- EDIT EMPLOYEE -->
	<div class="modal fade bd-edit-modal-lg" id="edit-emp" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
	<!-- END EDIT EMPLOYEE -->