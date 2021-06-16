<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class Leave_request extends My_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Leave_request_model');
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		/*-- CREATE --*/
		public function add()
		{
			$fromDB 						= $this->Leave_request_model->checkCTCode();
			//Example DEPT-0003, angka 4 adalah awal angka, dan 4 jumlah angka yang diambil
			$index 							= substr($fromDB, 3, 4);
			$annual_leave_code_now 			= $index + 1;
			$data 							= array('annual_leave_code'=>$annual_leave_code_now);

			$data['title'] 					= 'Add Leave Request';
			$data['employee'] 				= $this->Leave_request_model->get_employee();
			// $data['position'] 				= $this->Leave_request_model->get_position();
			$data['annual_leave']			= $this->Leave_request_model->get_employee_by_emp_code($this->session->userdata('employee_code'));

			$this->form_validation->set_rules('leave_taken','Leave Taken','required|numeric');
			$this->form_validation->set_rules('leave_start_date','Start Date','required');
			$this->form_validation->set_rules('leave_end_date','End Date','required');
			$this->form_validation->set_rules('assignment_delegation','Assignment Delegation to','required');
			$this->form_validation->set_rules('delegation_position','Delegation Position','required');
			$this->form_validation->set_rules('checker1','Checker','required');
			$this->form_validation->set_rules('checker2','Signer','required');
			$this->form_validation->set_rules('explanation','Explanation','required');


			if (empty($data['annual_leave'])) {
				$this->render_backend('page/leave/not_found', $data);
			} else {
				if ($this->form_validation->run() == FALSE) {
					$this->render_backend('page/leave/add_leave_request', $data);
				}else{
					$this->Leave_request_model->insert();
					$this->session->set_flashdata('flash', 'Saved');
					redirect('Leave_request');
				}
			}
			
			// if (!$data['annual_leave']) 
			// 	show_001();
		}

		// public function process()
		// {
		// 	$this->form_validation->set_rules('leave_taken','Leave Taken','required|numeric');
		// 	$this->form_validation->set_rules('start_date','Start Date','required');
		// 	$this->form_validation->set_rules('end_date','End Date','required');
		// 	$this->form_validation->set_rules('assignment_delegation','Assignment Delegation to','required');
		// 	$this->form_validation->set_rules('delegation_position','Delegation Position','required');
		// 	$this->form_validation->set_rules('checker1','Checker','required');
		// 	$this->form_validation->set_rules('checker2','Signer','required');
		// 	$this->form_validation->set_rules('explanation','Explanation','required');
		// }
		/*-- END CREATE --*/

		/*-- RRAD --*/
		public function index()
		{
			$data['title'] 					= 'history';
			if ($this->session->userdata('role_code') == '1' or
				$this->session->userdata('role_code') == '2' or
				$this->session->userdata('role_code') == '3') {
			$data['leave_submission_list']	= $this->Leave_request_model->get_leave_submission_list();
			}
			if ($this->session->userdata('role_code') == '4') {
			$data['leave_submission_list']	= $this->Leave_request_model->get_leave_submission_list_by_user($this->session->userdata('employee_code'));
			}
			$this->render_backend('page/leave/leave_submission_list',$data);
		}

		public function detailed_leave_history($employee_code = null)
		{
			$data['title'] 					= 'history';
			$data['sub_title'] 				= 'details';
			$data['detailed_leave_history'] = $this->Leave_request_model->get_detailed_leave_history($employee_code);
			$this->render_backend('page/leave/detailed_leave_history', $data);
		}

		public function leave_approval_list()
		{
			$data['title'] 					= 'Approval List';
			$data['leave_submission_list']  = $this->Leave_request_model->get_leave_submission_list_check($this->session->userdata['employee_code']);
			$this->render_backend('page/leave/leave_approval_list' , $data);
		}

		public function leave_cancellation_list()
		{
			$data['title'] 					= 'Cancellation List';
			$data['leave_cancellation_list']= $this->Leave_request_model->get_leave_submission_list_cancellation($this->session->userdata['employee_code']);
			$this->render_backend('page/leave/leave_cancellation_list' , $data);
		}
		/*-- END RRAD --*/

		/*-- UPDATE --*/
		public function edit($annual_leave_code)
		{
			
			$data['title'] 					= 'Leave Request';
			$data['employee'] 				= $this->Leave_request_model->get_employee();
			$data['annual_leave']			= $this->Leave_request_model->get_annual_leave_by_code($annual_leave_code);

			$this->form_validation->set_rules('leave_taken','Leave Taken','required|numeric');
			$this->form_validation->set_rules('leave_start_date','Start Date','required');
			$this->form_validation->set_rules('leave_end_date','End Date','required');
			$this->form_validation->set_rules('assignment_delegation','Assignment Delegation to','required');
			$this->form_validation->set_rules('delegation_position','Delegation Position','required');
			$this->form_validation->set_rules('checker1','Checker','required');
			$this->form_validation->set_rules('checker2','Signer','required');
			$this->form_validation->set_rules('explanation','Explanation','required');


			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/leave/leave_approval_agreement', $data);
			}else{
				$this->Leave_request_model->approval();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('Leave_request/leave_approval_list');
			}
			
			// if (!$data['annual_leave']) 
			// 	show_001();
		}

		public function cancellation($annual_leave_code)
		{
			$data['title'] 					= 'Leave Cancellation';
			$data['employee'] 				= $this->Leave_request_model->get_employee();
			$data['annual_leave']			= $this->Leave_request_model->get_annual_leave_by_code($annual_leave_code);

			$this->form_validation->set_rules('cancellation_agreement','Cancellation Agreement','required');
			$this->form_validation->set_rules('reason_for_cancellation','Reason for Cancellation','required');

			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/leave/leave_cancellation', $data);
			}else{
				$this->Leave_request_model->cancellation();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('Leave_request/leave_cancellation_list');
			}
		}

		public function cancellation_agreement($annual_leave_code)
		{
			$data['title'] 					= 'Leave Cancellation';
			$data['employee'] 				= $this->Leave_request_model->get_employee();
			$data['annual_leave']			= $this->Leave_request_model->get_annual_leave_by_code($annual_leave_code);

			$this->form_validation->set_rules('cancellation_agreement','Cancellation Agreement','required');
			$this->form_validation->set_rules('reason_for_cancellation','Reason for Cancellation','required');
			$this->form_validation->set_rules('status_cancellation_agreement', 'Status Cancellation Agreement', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/leave/leave_cancellation_agreement', $data);
			}else{
				$this->Leave_request_model->cancellation();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('Leave_request/leave_cancellation_list');
			}
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		/*-- END DELETE --*/
	}