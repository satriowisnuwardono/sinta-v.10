<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Department extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Department_model');
		}

	/*-- CREATE --*/
		public function add()
		{
			$this->Department_model->add();
			$this->session->set_flashdata('flash', 'Saved');
			redirect(base_url('department/department'));
		}
	/*-- END CREATE --*/

	/*-- READ --*/
		public function department()
		{
			$fromDB = $this->Department_model->checkDeptCode();
			//Example DEPT-0003, angka 4 adalah awal angka, dan 4 jumlah angka yang diambil
			$index = substr($fromDB, 5, 4);
			$department_code_now = $index + 1;
			$data = array('department_code'=>$department_code_now); 

			$data['title'] 	= 'Department';
			$data['department'] = $this->Department_model->getAllDepartmentData();
			// $data['division'] = $this->Department_model->getAllDivisionData();
			$this->render_backend('page/department/department_list', $data);
		}

	/*-- END READ --*/

	/*-- UPDATE --*/
	/*-- END UPDATE --*/

	/*-- DELETE --*/
		public function delete($id = null)
		{
			$this->Department_model->delete($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('department/department');
		}
	/*-- END DELETE --*/
	}