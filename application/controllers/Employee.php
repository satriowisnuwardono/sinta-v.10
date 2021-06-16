<?php defined('BASEPATH') OR Exit('No direct script access allowed');

	class Employee extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Employee_model');
			$this->load->library('form_validation','upload');
		}

		/*-- CRETAE --*/
		public function add()
		{
			
			$fromDB = $this->Employee_model->checkEmpCode();
			//Example DEPT-0003, angka 4 adalah awal angka, dan 4 jumlah angka yang diambil
			$index = substr($fromDB, 5, 4);
			$employee_code_now = $index + 1;
			$data = array('employee_code'=>$employee_code_now);
			$data['title'] 			= 'Add Employee';
			$data['religion'] 		= $this->Employee_model->get_religion();
			$data['marital_status'] = $this->Employee_model->get_marital_status();

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('nik','NIK','required|numeric');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('id_number','ID Card Number', 'required|numeric');
			$this->form_validation->set_rules('place_of_birth','Place of Birth', 'required');
			$this->form_validation->set_rules('date_of_birth','Date of Birth', 'required');
			$this->form_validation->set_rules('hired_date','Hired Date', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/employee/add_employee', $data);
			}else{
				$this->Employee_model->insert_employee();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('employee/master_employee');
			}
		}
		/*-- END CRETAE --*/

		/*-- READ --*/
		public function master_employee()
		{
			$data['title'] 			= 'Master Employee';

			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3') {
				$data['employee']		= $this->Employee_model->get_employee();
			}

			if ($this->session->userdata('role_code') == '4' ) {
				$data['employee']		= $this->Employee_model->get_employee_by_emp_code($this->session->userdata('employee_code'));
			}
			// $data['religion'] 		= $this->Employee_model->get_religion();
			// $data['marital_status'] = $this->Employee_model->get_marital_status();
			$this->render_backend('page/employee/master_employee', $data);
		}

		public function master_employee_active()
		{
			$data['title'] 			= 'Employee Active';
			
			$data['employee']		= $this->Employee_model->get_employee_active();
			
			$this->render_backend('page/employee/master_employee_active', $data);
		}

		public function master_employee_off()
		{
			$data['title'] 			= 'Employee Off';

			$data['employee']		= $this->Employee_model->get_employee_off();
			
			$this->render_backend('page/employee/master_employee_off', $data);
		}

		public function master_employee_resign()
		{
			$data['title'] 			= 'Employee resign';

			$data['employee']		= $this->Employee_model->get_employee_resign();
			
			$this->render_backend('page/employee/master_employee_resign', $data);
		}

		public function employee_off($employee_code = null)
		{
			$data['off']			= $this->Employee_model->off($employee_code);
			redirect('employee/master_employee_off', $data);
		}

		public function employee_resign($employee_code = null)
		{
			$data['resign']			= $this->Employee_model->resign($employee_code);
			redirect('employee/master_employee_resign', $data);
		}

		public function employee_active($employee_code = null)
		{
			$data['active']			= $this->Employee_model->active($employee_code);
			redirect('employee/master_employee_active', $data);
		}

		public function employee_details($employee_code)
		{
			$data['title'] 			= 'Employee Details';
			$data['employee']		= $this->Employee_model->get_employee_details($employee_code);
			$data['employee_code'] 	= $this->Employee_model->get_employee_code($employee_code);
			$data['religion']		= $this->Employee_model->get_religion();
			$data['marital_status'] = $this->Employee_model->get_marital_status();
			$data['career'] 		= $this->Employee_model->get_structural($employee_code);
			$data['bpjs'] 			= $this->Employee_model->get_bpjs($employee_code);
			$data['last_career'] 	= $this->Employee_model->get_last_structural($employee_code);
			$data['family'] 		= $this->Employee_model->get_family($employee_code);
			$data['education'] 		= $this->Employee_model->get_education($employee_code);
			$this->render_backend('page/employee/employee_details', $data);
		}

		public function employee_resign_details($employee_code)
		{
			$data['title'] 			= 'Employee Details';
			$data['employee']		= $this->Employee_model->get_employee_resign_details($employee_code);
			$data['employee_code'] 	= $this->Employee_model->get_employee_resign_code($employee_code);
			$data['religion']		= $this->Employee_model->get_religion();
			$data['marital_status'] = $this->Employee_model->get_marital_status();
			$data['career'] 		= $this->Employee_model->get_structural($employee_code);

			$data['bpjs'] 			= $this->Employee_model->get_bpjs($employee_code);
			$data['family'] 		= $this->Employee_model->get_family($employee_code);
			$data['education'] 		= $this->Employee_model->get_education($employee_code);
			$this->render_backend('page/employee/employee_resign_details', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($id = null)
		{
			//if (!isset($id)) redirect('employee/master_employee');

			$data['title'] 			= 'Edit Employee';
			$data['employee'] 		= $this->Employee_model->get_by_employee_id($id);
			$data['religion'] 		= $this->Employee_model->get_religion();
			$data['marital_status'] = $this->Employee_model->get_marital_status();

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('nik','NIK','required|numeric');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('id_number','ID Card Number', 'required|numeric');
			$this->form_validation->set_rules('place_of_birth','Place of Birth', 'required');
			$this->form_validation->set_rules('date_of_birth','Date of Birth', 'required');

			if ($this->form_validation->run()) {
				$this->Employee_model->update_employee();
				$this->session->set_flashdata('flash', 'Updated');
				redirect('employee/master_employee');
			}

			$this->render_backend('page/employee/edit_employee', $data);
		}

		public function edit_resign($id = null)
		{
			//if (!isset($id)) redirect('employee/master_employee');

			$data['title'] 			= 'Edit Employee Resign';
			$data['employee'] 		= $this->Employee_model->get_by_employee_resign_id($id);
			$data['religion'] 		= $this->Employee_model->get_religion();
			$data['marital_status'] = $this->Employee_model->get_marital_status();

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('nik','NIK','required|numeric');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('id_number','ID Card Number', 'required|numeric');
			$this->form_validation->set_rules('place_of_birth','Place of Birth', 'required');
			$this->form_validation->set_rules('date_of_birth','Date of Birth', 'required');

			if ($this->form_validation->run()) {
				$this->Employee_model->update_employee_resign();
				$this->session->set_flashdata('flash', 'Updated');
				redirect('employee/master_employee_resign');
			}

			$this->render_backend('page/employee/edit_employee_resign', $data);
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->Employee_model->delete($id);
			$this->session->set_flashdata('flash','Deleted');
			redirect('employee/master_employee');
		}

		public function resign($employee_code)
		{
			$this->Employee_model->resign($employee_code);
			$this->session->set_flashdata('flash','Resign');
			redirect('employee/master_employee');
		}
		/*-- END DELETE --*/
	}