<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Error_data extends My_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}

		public function index()
		{
			$data['title'] 			= 'Add';
			$this->render_backend('page/leave/leave_not_found', $data);
		}
	}