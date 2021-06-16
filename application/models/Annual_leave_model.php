<?php defined('BASEPATH') Or Exit ('No direct script access allowed');

	class Annual_leave_model extends CI_Model
	{
		
		/*-- CREATE --*/
		public function add()
		{
			$post 						= $this->input->post();
			$this->employee_code		= $post['employee_code'];
			$this->employee_entry_date	= $post['employee_entry_date'];
			$this->leave_period 		= $post['leave_period'];
			$this->effective_date 		= $post['effective_date'];
			$this->valid_until 			= $post['valid_until'];
			$this->total 				= $post['total'];
			// $this->leave_taken 			= $post['leave_taken'];
			// $this->mass_leave 			= $post['mass_leave'];
			// $this->remaining_days_off 	= $post['remaining_days_off'];

			$this->db->insert('ms_leave_rights', $this);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_annual_leave_master()
		{
			$this->db->select('*');
			$this->db->from('ms_leave_rights');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_leave_rights.employee_code');

			$query 	= $this->db->get();
			return $query->result();
		}

		public function get_annual_leave_master_by_emp_code($employee_code)
		{	
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_leave_rights.employee_code', $emp_code);
			$this->db->from('ms_leave_rights');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_leave_rights.employee_code');

			$query 	= $this->db->get();
			return $query->result();
		}

		public function get_annual_leave_master_by_id($id)
		{
			return $this->db->get_where('ms_leave_rights', ["id"=>$id])->row();
		}

		public function get_employee()
		{
			$this->db->select('*');
			$this->db->from('ms_employee');
			// $this->db->join('ms_career', 'ms_career.nik = ms_employee.nik');
			// $this->db->join('ms_division', 'ms_division.division_code = ms_career.division_code');
			$query = $this->db->get();
			return $query->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update()
		{
			$post 						= $this->input->post();
			$this->id 					= $post['id'];
			$this->employee_code		= $post['employee_code'];
			$this->employee_entry_date	= $post['employee_entry_date'];
			$this->leave_period 		= $post['leave_period'];
			$this->effective_date 		= $post['effective_date'];
			$this->valid_until 			= $post['valid_until'];
			$this->total 				= $post['total'];
			// $this->leave_taken 			= $post['leave_taken'];
			// $this->mass_leave 			= $post['mass_leave'];
			// $this->remaining_days_off 	= $post['remaining_days_off'];

			$this->db->update('ms_leave_rights', $this, array('id'=>$post['id']));
		}

		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('ms_leave_rights');
		}
		/*-- END DELETE --*/
	}