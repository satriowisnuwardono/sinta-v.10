<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class My_Controller extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->authenticated();
			//Call authenticated function
		}

		public function authenticated()
		{
			//Fungsi untuk mengecek apakah user telah login
			/*
			* pertama sistem akan mengecek apakah controller saat ini sedang di akses user sebagai auth atu bukan
			* karena fungsi cek login hanya diberlakukan untuk controller selain auth
			*/
			if ($this->uri->segment(1)!='auth' && $this->uri->segment(1)!='') {
				//cek apakah terdapat session dengan nama authenticated
				if (!$this->session->userdata('authenticated')) 
					//jika tidak ada, artinya belum login
					redirect('auth');
					//diarahkan kembali kehalaman login
			}
		}

		public function render_login($content, $data = NULL)
		{
			/*
			* $data['datacontent']
			* variable diatas ^ nantinya akan dikirm ke file views/template/login
			*/

			$data['datacontent']	= $this->load->view($content, $data, TRUE);
			$this->load->view('template/login/index', $data);
		}

		public function render_backend($content, $data = NULL)
		{
			/*
			* $data['datacontent'],
			* variable diatas ^ nantinya akan dikirm ke file views/template/backend
			*/
			$data['datacontent'] 	= $this->load->view($content, $data, TRUE);
			$this->load->view('template/backend/index', $data);
		}
	}
?>