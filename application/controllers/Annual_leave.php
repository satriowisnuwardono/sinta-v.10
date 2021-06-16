<?php defined('BASEPATH') Or Exit ('No direct script access allowed');

	class Annual_leave extends My_controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Annual_leave_model');
			$this->load->library('form_validation');
		}
		
		/*-- CREATE --*/
		public function add()
		{
			$data['title'] 			= 'Add';
			$data['employee'] 		= $this->Annual_leave_model->get_employee();
			$this->render_backend('page/leave/add_employee_leave', $data);
		}

		public function process_input()
		{
			$this->Annual_leave_model->add();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('Annual_leave/annual_leave_master');
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function annual_leave_master()
		{
			$data['title'] 			= 'Data';

			if ($this->session->userdata('role_code') == '1' or 
				$this->session->userdata('role_code') == '2') {
			$data['leave_right'] 	= $this->Annual_leave_model->get_annual_leave_master();
			}

			if ($this->session->userdata('role_code') == '3' or 
				$this->session->userdata('role_code') == '4') {
			$data['leave_right'] 	= $this->Annual_leave_model->get_annual_leave_master_by_emp_code($this->session->userdata('employee_code'));
			}

			$this->render_backend('page/leave/annual_leave_master', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($id)
		{
			$data['title'] 			= 'Edit';
			$data['leave_right'] 	= $this->Annual_leave_model->get_annual_leave_master_by_id($id);
			$this->render_backend('page/leave/edit_employee_leave', $data);
		}

		public function process_update()
		{
			$this->Annual_leave_model->update();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('Annual_leave/annual_leave_master');
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->Annual_leave_model->delete($id);
			$this->session->set_flashdata('flash', 'Saved');
			redirect('Annual_leave/annual_leave_master');
		}
		/*-- END DELETE --*/
	}