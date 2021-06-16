<?php defined("BASEPATH") OR Exit('No direct script access allowed');

	class Auth_model extends CI_model
	{
		
		public function get($username)
		{
			$this->db->where('username', $username);
			//Untuk menambahkan where clause username = username
			$result = $this->db->get('ms_user')->row();
			//Untuk mengeksekusi dan mengambil data query
			return $result;
		}
	}