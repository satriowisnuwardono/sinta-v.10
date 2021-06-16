<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class Division extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Division_model');
		}

		/*-- CREATE --*/
		public function add()
		{
			$this->Division_model->add();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('division/division');
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function division()
		{
			$fromDB 			= $this->Division_model->checkDivCode();
			//Example DIV-0003, angka 3 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 				= substr($fromDB, 4, 4);
			$division_code_now 	= $index + 1;
			$data 				= array('division_code'=>$division_code_now);

			$data['title']		= 'Division';
			$data['division']	= $this->Division_model->getAllDivisionData();
			$data['department']	= $this->Division_model->getAllDepartmentData();
			$this->render_backend('page/division/division_list', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id = null)
		{
			$this->Division_model->delete($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('division/division');
		}
		/*-- END DELETE --*/
	}