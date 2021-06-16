<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Dashboard_model');
			$this->load->model('Announcement_model');
			$this->load->library('form_validation');
		}

		public function index()
		{	
			$data['title']					= 'Dashboard';
			$data['user']					= $this->Dashboard_model->get_last_five_user();
			$data['employee']				= $this->Dashboard_model->get_employee_off_by_month();
			$data['total_employee']			= $this->Dashboard_model->total_employee();
			$data['total_user']				= $this->Dashboard_model->total_user();
			$data['total_employee_active']	= $this->Dashboard_model->total_employee_active();
			$data['total_employee_off']		= $this->Dashboard_model->total_employee_off();
			$data['total_employee_resign']	= $this->Dashboard_model->total_employee_resign();
			$data['profile']				= $this->Dashboard_model->box_profile($this->session->userdata('employee_code'));
			$data['details']				= $this->Dashboard_model->employee_details($this->session->userdata('employee_code'));
			$data['structural']				= $this->Dashboard_model->structural_details($this->session->userdata('employee_code'));
			$data['family']					= $this->Dashboard_model->family_details($this->session->userdata('employee_code'));
			$data['education']				= $this->Dashboard_model->education_details($this->session->userdata('employee_code'));
			$data['leave_rights'] 			= $this->Dashboard_model->leave_rights($this->session->userdata('employee_code'));
			$data['announcement'] 			= $this->Announcement_model->get_announcement();
			$this->render_backend('page/dashboard', $data);
		}

		// public function edit($id)
		// {
		// 	$this->Dashboard_model->update();
		// 	$this->session->set_flashdata('flash', 'Updated');
		// 	redirect('index');
		// }
	}
?>