<?php defined('BASEPATH') OR Exit ('No direct script access allowed');
	
	class Bpjs extends My_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Bpjs_model');
			$this->load->library('form_validation');
		}

		/*-- CREATE --*/
		public function add()
		{
			$fromDB 				= $this->Bpjs_model->checkBpjsCode();
			//Example DEPT-0003, angka 4 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 					= substr($fromDB, 5, 4);
			$bpjs_code_now 			= $index + 1;
			$data 					= array('bpjs_code'=> $bpjs_code_now);
			$data['title'] 			= 'Add BPJS';
			$data['employee'] 		= $this->Bpjs_model->get_employee();

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('healthy_bpjs','Healthy BPJS','required|numeric');
			$this->form_validation->set_rules('clinic_name','Clinic Name','required');
			$this->form_validation->set_rules('labor_bpjs','Labor BPJS', 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/bpjs/add_bpjs', $data);
			}else{
				$this->Bpjs_model->add();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('bpjs/master_bpjs');
			}
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function master_bpjs()
		{
			$data['title'] 			= 'BPJS';

			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3' ) {
			$data['bpjs'] 			= $this->Bpjs_model->get_bpjs();
			}

			if ($this->session->userdata('role_code') == '4') {
			$data['bpjs'] 			= $this->Bpjs_model->get_bpjs_by_emp_code($this->session->userdata('employee_code'));
			}

			$this->render_backend('page/bpjs/master_bpjs', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($bpjs_code = null)
		{
			$data['title'] 			= 'Edit BPJS';
			$data['bpjs']			= $this->Bpjs_model->get_bpjs_by_code($bpjs_code);

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('healthy_bpjs','Healthy BPJS','required|numeric');
			$this->form_validation->set_rules('clinic_name','Clinic Name','required');
			$this->form_validation->set_rules('labor_bpjs','Labor BPJS', 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/bpjs/edit_bpjs', $data);
			}else{
				$this->Bpjs_model->update();
				$this->session->set_flashdata('flash', 'Updated');
				redirect('bpjs/master_bpjs');
			}
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($bpjs_code)
		{
			$this->Bpjs_model->delete($bpjs_code);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('Bpjs/master_bpjs');
		}
		/*-- END DELETE --*/
	}