<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-align: center;">
      <i class="fab fa-staylinked" style="color: #F1872F"></i>
      <span class="brand-text font-weight-light"> S I N T A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/dist/img/Icon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['name']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url('dashboard') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">HUMAN RESOURCES</li>
        <!-- Announcement -->
          <?php 
          if ($this->session->userdata('role_code') == '1') {
          ?>
          <!-- Announcement -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('announcement/add'); ?>" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Add Announcement</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('announcement'); ?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Announcement List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

         <?php 
        if ($this->session->userdata('role_code') == '1' or
            $this->session->userdata('role_code') == '2') {
        ?>
        <!-- Master Department -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-building"></i>
            <p>
              Department
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
                <a href="<?php echo base_url('department/department') ?>" class="nav-link">
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Master Department</p>
                </a>
              </li>

              <li class="nav-item ml-4">
                <a href="<?php echo base_url('division/division') ?>" class="nav-link">
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Master Division</p>
                </a>
              </li>

              <li class="nav-item ml-4">
                <a href="<?php echo base_url('position/position') ?>" class="nav-link">
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Master Position</p>
                </a>
              </li>
          </ul>
        </li>
        <?php } ?>

        <!-- Master Employee -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php 
                  //Cek role user
                  if($this->session->userdata('role_code') == '1' or 
                  $this->session->userdata('role_code') == '2' or
                  $this->session->userdata('role_code') == '3' or
                  $this->session->userdata('role_code') == '4') {//Jika rolenya super admin
                  ?>
                <li class="nav-item ml-4">
                  <a href="<?php echo base_url('employee/master_employee'); ?>" class="nav-link">
                    <i class="fa fa-briefcase nav-icon"></i>
                    <p>Master Employee</p>
                  </a>
                </li>
              <?php } ?>

              <?php 
                if ($this->session->userdata('role_code') == '1' or
                    $this->session->userdata('role_code') == '2') { 
              ?>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('user/master_user'); ?>" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Master User</p>
                </a>
              </li>
              <?php } ?>

              <li class="nav-item ml-4">
                <a href="<?php echo base_url('career/master_career'); ?>" class="nav-link">
                  <i class="fa fa-building nav-icon"></i>
                  <p>Career</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('bpjs/master_bpjs'); ?>" class="nav-link">
                  <i class="fa fa fa-user-md nav-icon"></i>
                  <p>BPJS</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('education/master_education'); ?>" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Education</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('family/master_family'); ?>" class="nav-link">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Family</p>
                </a>
              </li>
              
            </ul>
          </li>

          <?php 
          if ($this->session->userdata('role_code') == '1' or
              $this->session->userdata('role_code') == '2' or
              $this->session->userdata('role_code') == '3' or
              $this->session->userdata('role_code') == '4') {
          ?>

          <!-- Master Leave -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-umbrella-beach"></i>
              <p>
                Annual Leave
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('annual_leave/annual_leave_master'); ?>" class="nav-link">
                  <i class="fas fa-hotel nav-icon"></i>
                  <p>Annual Leave Master</p>
                </a>
              </li>

              <?php  if ($this->session->userdata('role_code') == '1') {?>
             <li class="nav-item ml-4">
                <a href="<?php echo base_url('mass_leave'); ?>" class="nav-link">
                  <i class="fas fa-gift nav-icon"></i>
                  <p>Mass Leave</p>
                </a>
              </li>
              <?php } ?>

              <li class="nav-item ml-4">
                <a href="<?php echo base_url('leave_request/add'); ?>" class="nav-link">
                  <i class="fab fa-wpforms nav-icon"></i>
                  <p>Leave Request Form</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('leave_request'); ?>" class="nav-link">
                  <i class="fas fa-history nav-icon"></i>
                  <p>Annual Leave History</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('leave_request/leave_approval_list'); ?>" class="nav-link">
                  <i class="far fa-calendar-check nav-icon"></i>
                  <p>Leave Approval List</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('leave_request/leave_cancellation_list'); ?>" class="nav-link">
                  <i class="far fa-calendar-check nav-icon"></i>
                  <p>Leave Cancellation List</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Master Leave -->
          <?php } ?>

          <?php 
          if ($this->session->userdata('role_code') == '1' or
              $this->session->userdata('role_code') == '4') {
          ?>
          <li class="nav-header">IT MANAGEMENT</li>
          <!-- IT Request -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                IT Job Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('it_management/form_job_order_it')?>" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Form Job Order IT</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('it_management/job_order_list')?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Job Order List</p>
                </a>
              </li>
             <!--  <li class="nav-item ml-4">
                <a href="<?php echo base_url('admin_it/pendingList')?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>All IT Request Data</p>
                </a>
              </li> -->
              <?php if ($this->session->userdata('role_code') == '1') {?>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('it_management/jo_complete')?>" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Job Order Complete</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>

              <?php if ($this->session->userdata('role_code') == '1') {?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-toolbox nav-icon"></i>
                  <p>IT Equipment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item ml-4">
                    <a href="<?php echo base_url('it_management/equipment_type')?>" class="nav-link">
                      <i class="fas fa-tools nav-icon"></i>
                      <p>Equipment Type</p>
                    </a>
                  </li>
                  <li class="nav-item ml-4">
                    <a href="<?php echo base_url('it_management/equipment')?>" class="nav-link">
                      <i class="fas fa-tools nav-icon"></i>
                      <p>Equipment List</p>
                    </a>
                  </li>
                  <li class="nav-item ml-4">
                    <a href="<?php echo base_url('it_management/equipment_incoming')?>" class="nav-link">
                      <i class="fas fa-tools nav-icon"></i>
                      <p>Equipment Incoming</p>
                    </a>
                  </li>
                  <li class="nav-item ml-4">
                    <a href="<?php echo base_url('it_management/equipment_out')?>" class="nav-link">
                      <i class="fas fa-tools nav-icon"></i>
                      <p>Equipment Out</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php } ?>
          <?php } ?>
          
          <?php 
          if ($this->session->userdata('role_code') == '1') {
          ?>

          <!-- Pre & Continous Dyeing Menu -->
         <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-thermometer-empty"></i>
              <p>
                Pre & Con-Dyeing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('pc_order/order_list')?>" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Order Data</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('pc_order/history_list')?>" class="nav-link">
                  <i class="fa fa-history nav-icon"></i>
                  <p>History Update</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('lab_dip/lab_dip_data')?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>LAB DIP Data</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('pc_sent_order/sent_order_list')?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Order Data Sent</p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="<?php echo base_url('pc_order_cancel/order_cancel_list')?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Order Data Cancel</p>
                </a>
              </li>
            </ul>
          </li> -->

          <?php } ?>
          <!-- Log Out -->
          <li class="nav-header">LOG OUT</li>
          <li class="nav-item">
            <a href="<?php echo base_url('index.php/auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt" style="color: #F1872F"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>