<?php defined('BASEPATH') OR Exit('No direct script access allowed');

	class Mass_leave extends My_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->model('Mass_leave_model');
			$this->load->library('form_validation');
		}
		
		/*-- CREATE --*/
		public function add()
		{
			$data['title'] 			= 'Add Mass Leave';

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('leave_name','Information','required');
			$this->form_validation->set_rules('start_date','Start Date','required');
			$this->form_validation->set_rules('end_date','End Date', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->render_backend('page/leave/add_mass_leave', $data);
			}else{
				$this->Mass_leave_model->insert();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('mass_leave');
			}
		
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function index()
		{
			$data['title'] 			= 'Mass Leave';
			$data['mass_leave'] 	= $this->Mass_leave_model->get_mass_leave();

			$this->render_backend('page/leave/mass_leave_master', $data);
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($mass_leave_id)
		{
			$this->Mass_leave_model->delete($mass_leave_id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('mass_leave');
		}
		/*-- END DELETE --*/
	}