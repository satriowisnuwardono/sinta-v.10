<?php defined('BASEPATH') OR Exit ('No direct script access allowed');
	
	class Education extends My_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Education_model');
			$this->load->library('form_validation');
		}
		/*-- CREATE --*/
		public function add()
		{	
			$data['education'] 					= ['SMP','SMA','SMK', 'DIPLOMA I','DIPLOMA II', 'DIPLOMA III', 'DIPLOMA IV', 'SARJANA (S1)', 'MAGISTER (S2)', 'DOKTOR (S3)'];
			$this->Education_model->add();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('education/master_education', $data);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function master_education()
		{
			$data['title'] 			= 'Education';

			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3') {
			$data['education'] 		= $this->Education_model->get_education();
			}

			if ($this->session->userdata('role_code') == '4') {
			$data['education'] 		= $this->Education_model->get_education_by_code($this->session->userdata('employee_code'));
			}

			$this->render_backend('page/education/master_education', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($employee_code = null)
		{	
			$data['title'] 						= 'Edit Education';
			$data['education_by_emp_code'] 		= $this->Education_model->get_education_by_emp_code($employee_code);
			$data['education'] 					= ['SMP','SMA','SMK', 'DIPLOMA I','DIPLOMA II', 'DIPLOMA III', 'DIPLOMA IV', 'SARJANA (S1)', 'MAGISTER (S2)', 'DOKTOR (S3)'];
			$this->render_backend('page/education/edit_education', $data);
		}

		public function process()
		{
			$this->Education_model->update();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('education/master_education');
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->Education_model->delete($id);
			$this->session->set_flashdata('flash','Deleted');
			redirect('education/master_education');
		}
		/*-- END DELETE --*/
	}