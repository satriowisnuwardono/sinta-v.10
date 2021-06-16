<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class It_management extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('It_management_Model');
			$this->load->library('form_validation','session');
		}

		/*-- CREATE --*/
		/*-- Equipment --*/
		public function add_equipment_type()
		{
			$this->form_validation->set_rules('equipment_type','Equipment Type', 'required');
			if ($this->form_validation->run()) {
				$this->It_management_Model->insert_equipment_type();
				redirect('It_management/equipment_type');
			}
		}

		public function add_equipment()
		{
			$this->form_validation->set_rules('id_equipment','Equipment Type', 'required');
			$this->form_validation->set_rules('item_name','Item Name', 'required');
			$this->form_validation->set_rules('safe_stock','Safe Stock', 'required');

			if ($this->form_validation->run()) {
				$this->It_management_Model->insert_equipment();
				redirect('It_management/equipment');
			}
		}

		public function add_equipment_incoming()
		{
			$this->form_validation->set_rules('item_code','Item Name', 'required');
			$this->form_validation->set_rules('total','Total', 'required');

			if ($this->form_validation->run()) {
				$this->It_management_Model->insert_equipment_in();
				redirect('It_management/equipment_incoming');
			}
		}

		public function add_equipment_out()
		{
			$this->form_validation->set_rules('item_code','Item Name', 'required');
			$this->form_validation->set_rules('total','Total', 'required');

			if ($this->form_validation->run()) {
				$this->It_management_Model->insert_equipment_out();
				redirect('It_management/equipment_out');
			}
		}

		/*-- Job Order --*/
		public function form_job_order_it()
		{	
			$fromDB 				= $this->It_management_Model->checkJoCode();
			//Example DEPT-0003, angka 4 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 					= substr($fromDB, 5, 5);
			$Jo_code_now 			= $index + 1;
			$data 					= array('jo_code'=> $Jo_code_now);
			$data['title'] 			= 'Job Order IT';

			//For validation data
			$this->form_validation->set_rules('details','Details','required');

			// if ($this->form_validation->run() == FALSE) {
			// 	$this->render_backend('page/It_management/form_job_order_it', $data);
			// } else {
			// 	$this->It_management_Model->insert_request();
			// 	$this->render_backend('page/It_management/form_job_order_it', $data);
			// }
			if ($this->form_validation->run()) {
				$this->It_management_Model->insert_request();
			}	
				$data['request_temp'] = $this->It_management_Model->get_by_emp_code($this->session->userdata('employee_code'));
				$this->render_backend('page/It_management/form_job_order_it', $data);
		}

		public function send_request()
		{
			$data['request'] 		= $this->It_management_Model->process($this->session->userdata('employee_code'));
			redirect('It_management/job_order_list');
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		/*-- Job Order List --*/
		public function job_order_list()
		{	
			$data['title'] 			= 'JO List';

			if ($this->session->userdata('role_code') == '1') {
			$data['request'] 		= $this->It_management_Model->get_by_request_admin();
			$this->render_backend('page/It_management/jo_list', $data);
			} else {
			$data['request'] 		= $this->It_management_Model->get_by_request($this->session->userdata('employee_code'));
			$this->render_backend('page/It_management/jo_list', $data);
			}
		}

		public function detail_job_order($jo_code)
		{
			$data['title'] 			= 'details';
			if ($this->session->userdata('role_code') == '1') {
			$data['details'] 		= $this->It_management_Model->get_by_request_details_admin($jo_code);
			$this->render_backend('page/It_management/detail_jo', $data);
			} else {
			$data['details'] 		= $this->It_management_Model->get_by_request_details($jo_code);
			$this->render_backend('page/It_management/detail_jo', $data);
			}
		}

		public function jo_complete()
		{
			$data['title'] 			= 'JO Complete';

			$data['request'] 		= $this->It_management_Model->get_by_jo_complete();
			$this->render_backend('page/It_management/jo_complete', $data);
			
		}

		public function detail_jo_complete($jo_code)
		{
			$data['title'] 			= 'details';

			$data['details'] 		= $this->It_management_Model->get_by_details_jo_complete($jo_code);
			$this->render_backend('page/It_management/detail_jo_complete', $data);
		}

		/*-- IT equipment_type --*/
		public function equipment_type()
		{
			$data['title'] 			= 'Equipment Type';
			$data['equipment'] 		= $this->It_management_Model->get_equipment_type();
			$this->render_backend('page/It_management/add_equipment_type', $data);
		}

		/*-- Equipment --*/
		public function equipment()
		{
			$fromDB 				= $this->It_management_Model->checkITCode();
			//Example DEPT-0003, angka 4 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 					= substr($fromDB, 3, 5);
			$item_code_now 			= $index + 1;
			$data 					= array('item_code'=> $item_code_now);

			$data['title'] 			= 'Equipment';
			$data['equipment'] 		= $this->It_management_Model->get_equipment();
			$data['equipment_type'] = $this->It_management_Model->get_equipment_type();
			$this->render_backend('page/It_management/add_equipment', $data);
		}

		/*-- Equipment In --*/
		public function equipment_incoming()
		{
			$data['title'] 			= 'Incoming';
			$data['equipment_in'] 	= $this->It_management_Model->get_equipment_in();
			$data['equipment_list'] = $this->It_management_Model->get_equipment();
			$this->render_backend('page/It_management/equipment_in',$data);
		}

		/*-- Equipment In --*/
		public function equipment_out()
		{
			$data['title'] 			= 'Out';
			$data['equipment_out'] 	= $this->It_management_Model->get_equipment_out();
			$data['equipment_list'] = $this->It_management_Model->get_equipment();
			$this->render_backend('page/It_management/equipment_out',$data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($id_jo = null)
		{
			$this->It_management_Model->update_request();
			redirect('It_management/job_order_list');
		}

		public function edit_equipment_type($id_equipment = null)
		{
			$this->It_management_Model->update_equipment_type();
			redirect('It_management/equipment_type');
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete_jo_temporary($id_jo_temporary)
		{
			$this->It_management_Model->delete_jo_temporary($id_jo_temporary);
			redirect('It_management/form_job_order_it');
		}

		public function delete_equipment_type($id_equipment)
		{
			$this->It_management_Model->delete_equipment($id_equipment);
			redirect('It_management/equipment_type');
		}

		public function delete_equipment($item_code)
		{
			$this->It_management_Model->delete_equipment($item_code);
			redirect('It_management/equipment');
		}
		/*-- END DELETE --*/
	}