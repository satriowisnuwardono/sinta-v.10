<?php 
	defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class User extends My_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('User_model');
			$this->load->library('form_validation');
		}
		/*-- CREATE --*/
		public function add($employee_code)
		{	
			$fromDB = $this->User_model->check_user_code();
			//Example USER-0003, angka 5 adalah awal angka, dan 4 jumlah angka yang diambil
			$index = substr($fromDB, 5, 4);
			$user_code_now = $index + 1;
			$data = array('user_code'=>$user_code_now);

			$data['title'] 		= 'Add User';
			$data['employee']	= $this->User_model->get_employee($employee_code);
			$data['last_five']	= $this->User_model->get_last5user();
			$data['role']		= $this->User_model->get_role();
			
			$this->render_backend('page/user/add_user', $data);
		}

		public function insert_user()
		{
			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('role_code','Role', 'required');

			if ($this->form_validation->run()) {
				$this->User_model->add();
				$this->session->set_flashdata('flash', 'Saved');
				redirect('User/master_user');
			}
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function master_user()
		{
			$data['title'] 		= 'Master User';
			$data['user']		= $this->User_model->get_user();
			$this->render_backend('page/user/master_user', $data);

		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function edit($user_code = null)
		{
			$data['title'] 		= 'Edit User';
			$data['user'] 		= $this->User_model->get_by_user_code($user_code);
			$data['role']		= $this->User_model->get_role();

			//Untuk validasi form apakah sudah diisi sesuai dengan rules
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('role_code','Role', 'required');

			if ($this->form_validation->run()) {
				$this->User_model->update();
				$this->session->set_flashdata('flash','Updated');
				redirect('User/master_user');
			}

			$this->render_backend('page/user/edit_user', $data);
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($user_code)
		{
			$this->User_model->delete($user_code);
			$this->session->set_flashdata('flash','Deleted');
			redirect('User/master_user');
		}
		/*-- END DELETE --*/
	}