<?php defined("BASEPATH") OR Exit('No direct script access allowed');
	
	class Career extends My_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Career_model');
			$this->load->model('Employee_model');
			$this->load->library('form_validation');
		}
		/*-- CREATE --*/
		public function add($employee_code)
		{
			$fromDB 			= $this->Career_model->checkCarCode();
			//Example DIV-0003, angka 3 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 				= substr($fromDB, 4, 4);
			$career_code_now 	= $index + 1;
			$data 				= array('career_code'=>$career_code_now);

			$data['title'] 				= 'Add Career';
			$data['career'] 			= $this->Career_model->get_structural();
			$data['structural'] 		= $this->Career_model->get_structural_history($employee_code);
			$data['employee']			= $this->Career_model->get_employee($employee_code);
			$data['department']			= $this->Career_model->get_department();
			$this->render_backend('page/career/add_career', $data);
		}

		public function insert_career()
		{
			$this->Career_model->insert_career();
			$this->session->set_flashdata('flash', 'Saved');
			// redirect('career/master_career');
			
			$data['title'] 			= 'Master Employee';

			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3') {
				$data['employee']		= $this->Employee_model->get_employee();
			}

			$this->render_backend('page/employee/master_employee', $data);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function master_career()
		{
			$data['title'] 				= 'Career';
			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3') {
				$data['career'] 			= $this->Career_model->get_structural();
			}

			if ($this->session->userdata('role_code') == '4') {
				$data['career'] 			= $this->Career_model->get_structural_by_emp_code($this->session->userdata('employee_code'));
			}
			
			$this->render_backend('page/career/master_career', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($career_code = null)
		{
			// $data['title'] 				= 'Edit';
			// $data['career'] 			= $this->Career_model->get_by_career_code($career_code);
			// $data['department']			= $this->Career_model->get_department();
			// $data['division']			= $this->Career_model->get_division();
			// $data['position']			= $this->Career_model->get_position();

			// //Untuk validasi form apakah sudah diisi sesuai dengan rules
			// $this->form_validation->set_rules('department','Department','required');
			// $this->form_validation->set_rules('division','Division','required');
			// $this->form_validation->set_rules('position','Position', 'required');

			// if ($this->form_validation->run()) {
			// 	$this->Career_model->update();
			// 	$this->session->set_flashdata('flash', 'Saved');
			// 	redirect('career/master_career');
			// }

			// $this->render_backend('page/career/edit_career', $data);

			$data['title'] 			= 'Edit Career';
			$data['career'] 		= $this->Career_model->get_by_career_code($career_code);
			$data['department'] 	= $this->Career_model->get_department();
			$data['division']		= $this->Career_model->get_division();
			$data['position']		= $this->Career_model->get_position();

			$this->render_backend('page/career/edit_career', $data);
		}

		public function update()
		{
				$this->Career_model->update();
				$this->session->set_flashdata('flash', 'Updated');
				redirect('Career/master_career');
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($career_code)
		{
			$this->Career_model->delete($career_code);
			$this->session->set_flashdata('flash','Deleted');
			redirect('career/master_career');
		}
		/*-- END DELETE --*/
	}