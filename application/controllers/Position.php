<?php 
	defined('BASEPATH') OR Exit('No direct script access allowed');

	class Position extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Position_model');
		}

		/*-- CREATE --*/
		public function add()
		{
			$this->Position_model->add();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('position/position');
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function position()
		{	
			$fromDB 			= $this->Position_model->checkPosCode();
			//Example DIV-0003, angka 3 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 				= substr($fromDB, 4, 4);
			$position_code_now 	= $index + 1;
			$data 				= array('position_code'=>$position_code_now);

			$data['title'] 			= 'Position';
			$data['position'] 		= $this->Position_model->getAllPositionData();
			$data['department'] 	= $this->Position_model->getAllDepartmentData();
			// $data['division'] 		= $this->Position_model->get_division($department_code);
			$this->render_backend('page/position/position_list', $data);
		}

		public function get_division()
		{
			$department_code 	= $this->input->post('id', TRUE);
			$data 				= $this->Position_model->get_division($department_code)->result();
			echo json_encode($data);
		}

		public function get_position()
		{
			$division_code 	= $this->input->post('id', TRUE);
			$data 			= $this->Position_model->get_position($division_code)->result();
			echo json_encode($data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->Position_model->delete($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('position/position');
		}
		/*-- END DELETE --*/
	}