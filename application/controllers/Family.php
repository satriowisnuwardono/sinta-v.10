<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class Family extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Family_model');
			$this->load->library('form_validation');
		}

		/*-- CREATE --*/
		public function add()
		{
			$this->Family_model->add();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('family/master_family');
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function master_family()
		{
			$data['title'] 			= 'Family';
			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3') {
			$data['family']			= $this->Family_model->get_family();
			}

			if ($this->session->userdata('role_code') == '4') {
			$data['family']			= $this->Family_model->get_family_by_code($this->session->userdata('employee_code'));
			}

			$this->render_backend('page/family/master_family', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($employee_code = null)
		{
			$data['title'] 			= 'Edit Family';
			$data['family'] 		= $this->Family_model->get_family_by_emp_code($employee_code);
			$this->render_backend('page/family/edit_family',$data);
		}
		public function process()
		{
			$this->Family_model->update();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('family/master_family');
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->Family_model->delete($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('family/master_family');
		}
		/*-- END DELETE --*/
	}