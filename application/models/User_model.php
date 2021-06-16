<?php 
	defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class User_model extends CI_Model
	{
		/*-- CHECK --*/
		public function check_user_code()
		{
			$query 	= $this->db->query("SELECT MAX(user_code) as user_code from ms_user");
			$result = $query->row();
			return $result->user_code; 
		}
		/*-- END CHECK --*/

		/*-- CREATE --*/
		public function add()
		{
			$post 						= $this->input->post();
			$this->user_code			= $post['user_code'];
			$this->employee_code		= $post['employee_code'];
			$this->name 				= $post['name'];
			$this->Username 			= $post['username'];
			$this->password 			= $post['password'];
			$this->role_code 			= $post['role_code'];

			$this->db->insert('ms_user', $this);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_user()
		{
			$this->db->select('*');
			$this->db->from('ms_user');
			$this->db->join('ms_role','ms_role.role_code = ms_user.role_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_by_user_code($user_code)
		{
			return $this->db->get_where('ms_user', ["user_code"=>$user_code])->row();
		}

		public function get_employee($employee_code)
		{
			return $this->db->get_where('ms_employee', ["employee_code"=>$employee_code])->row();
		}

		public function get_role()
		{
			return $this->db->get('ms_role')->result();
		}

		public function get_last5user()
		{
			$this->db->select('*');
			$this->db->from('ms_user');
			$this->db->order_by('user_code','DESC');
			$this->db->limit(5);
			$this->db->join('ms_employee','ms_employee.employee_code = ms_user.employee_code');
			$this->db->join('ms_role','ms_role.role_code = ms_user.role_code');

			$query = $this->db->get();
			return $query->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update()
		{
			$post 						= $this->input->post();
			$this->id 					= $post['id'];
			$this->user_code 			= $post['user_code'];
			$this->employee_code		= $post['employee_code'];
			$this->name 				= $post['name'];
			$this->Username 			= $post['username'];
			$this->password 			= $post['password'];
			$this->role_code 			= $post['role_code'];
			$this->access 				= $post['access'];

			$this->db->update('ms_user', $this, array('user_code'=>$post['user_code']));
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($user_code)
		{
			$this->db->where('user_code', $user_code);
			$this->db->delete('ms_user');
		}
		/*-- END DELETE --*/
	}