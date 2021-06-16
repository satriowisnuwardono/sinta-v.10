<?php defined('BASEPATH') OR Exit ('No direct script access allowed');
	
	class Education_model extends CI_Model
	{
		
		/*-- CREATE --*/
		public function add()
		{
			$post 					= $this->input->post();
			$this->employee_code 	= $post['employee_code'];
			$this->institution 		= $post['institution'];
			$this->education 		= $post['education'];
			$this->major 			= $post['major'];
			$this->start 			= $post['start'];
			$this->finish 			= $post['finish'];

			$this->db->insert('ms_education', $this);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_education()
		{
			$this->db->select('*');
			$this->db->from('ms_education');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_education.employee_code');
			$query = $this->db->get();
			return $query->result();
		}


		public function get_education_by_code($employee_code)
		{	
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_education.employee_code', $emp_code);
			$this->db->from('ms_education');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_education.employee_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_education_by_emp_code($employee_code)
		{
			return $this->db->get_where('ms_education', ['employee_code'=>$employee_code])->row();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update()
		{
			$post 					= $this->input->post();
			$this->id 				= $post['id'];
			$this->employee_code 	= $post['employee_code'];
			$this->institution 		= $post['institution'];
			$this->education 		= $post['education'];
			$this->major 			= $post['major'];
			$this->start 			= $post['start'];
			$this->finish 			= $post['finish'];

			$this->db->update('ms_education', $this, array('employee_code'=>$post['employee_code']));
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('ms_education');
		}
		/*-- END DELETE --*/
	}