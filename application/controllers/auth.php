<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Auth_model');
	}

	public function index()
	{	
		if ($this->session->userdata('authenticated'))
			//jika user sudah login (session authenticated ditemukan)
			redirect('dashboard');
			//redirect to homepage
		//function render_login use from file core/My_Controller.php
		$this->render_login('login');
		//Load view login.php
	}

	public function login()
	{
		$username	= $this->input->post('username');
		//ambil isi dari inputan username pada form login
		$password	= $this->input->post('password');
		//ambil isi dari inputan password pada form login

		$employee	= $this->Auth_model->get($username);
		//panggil fungsi get yang ada di employee_m.php

		if (empty($employee)) {
			//jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'username not found!');
			//buat session flashdata
			redirect('auth');
			//redirect to page login
		} else {
			if ($password == $employee->password){

				if ($employee->access > 0) {
				
				//jika password yang diinput sama dengan password yang di database
				$session =  array(
					'authenticated'			=> TRUE,
					//buat session authenticated dengan value true
					'employee_code'			=> $employee->employee_code,
					//buat session employee_code
					'username'				=> $employee->username,
					//buat session username
					// 'nik'					=> $employee->nik,
					// //buat session nik
					'name'					=> $employee->name,
					//buat session name
					'role_code'				=> $employee->role_code
					//buat session role code
				);

				$this->session->set_userdata($session);
				//buat session sesuai dengan $session
				redirect('dashboard/index');
				//redirect to homepage
			} else {
				$this->session->set_flashdata('message','username is not active');
				redirect('auth');
			}
		}else
			 {
				$this->session->set_flashdata('message', 'Invalid Username or Password');
				//buat session flashdata
				redirect('auth');
				//redirect to page login
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		//hapus semua session
		redirect('auth');
		//redirect to page login
	}
}