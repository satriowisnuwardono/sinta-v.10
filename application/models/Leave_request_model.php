<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class Leave_request_model extends CI_Model
	{
		
		/*-- CREATE --*/
		public function insert()
		{
			$post 						= $this->input->post();
			$this->annual_leave_code	= $post['annual_leave_code'];
			$this->employee_code 		= $post['employee_code'];
			$this->nik 					= $post['nik'];
			$this->date_of_application 	= date('Y-m-d');
			$this->rdo  				= $post['rdo'];
			$this->leave_taken 			= $post['leave_taken'];
			$this->leave_period 		= $post['leave_period'];
			$this->leave_start_date 	= $post['leave_start_date'];
			$this->leave_end_date 		= $post['leave_end_date'];
			$this->assignment_delegation= $post['assignment_delegation'];
			$this->delegation_position 	= $post['delegation_position'];
			$this->explanation 			= $post['explanation'];
			$this->checker1 			= $post['checker1'];
			// $this->status_checker1 		= $post['status_checker1'];
			// $this->checker1_comment		= $post['checker1_comment'];
			$this->checker2 			= $post['checker2'];
			// $this->status_checker2 		= $post['status_checker2'];
			// $this->checker2_comment		= $post['checker2_comment'];

			$this->db->insert('ms_annual_leave', $this);
		}
		/*-- END CREATE --*/

		/*-- RRAD --*/
		public function get_employee_by_emp_code($employee_code)
		{	
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_leave_rights.employee_code', $emp_code);
			$this->db->from('ms_leave_rights');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_leave_rights.employee_code');
			$this->db->join('ms_career','ms_career.employee_code = ms_employee.employee_code');
			$this->db->join('ms_department','ms_department.department_code = ms_career.department_code');
			$this->db->join('ms_position','ms_position.position_code = ms_career.position_code');
			$this->db->order_by('ms_career.nik', 'DESC');
			$this->db->limit('1');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee()
		{
			return $this->db->get('ms_employee')->result();
		}

		public function get_position()
		{
			return $this->db->get('ms_position')->result();
		}

		public function get_leave_submission_list()
		{

			$this->db->select('*');
			$this->db->from('ms_annual_leave');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');
			$this->db->group_by('ms_annual_leave.employee_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_leave_submission_list_by_user($employee_code)
		{
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_annual_leave.employee_code', $emp_code);
			$this->db->from('ms_annual_leave');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');
			$this->db->group_by('ms_annual_leave.employee_code');
			
			$query = $this->db->get();
			return $query->result();

		}

		public function get_leave_submission_list_check($employee_code)
		{

			// $this->db->select('*');
			// $this->db->from('ms_annual_leave');
			// $this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');
			// $this->db->group_by('ms_annual_leave.employee_code');

			// $query = $this->db->get();
			// return $query->result();
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('checker1', $emp_code);
			$this->db->or_where_in('checker2', $emp_code);
			$this->db->or_where_in('cancellation_agreement', $emp_code);
			$this->db->from('ms_annual_leave');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');

			$query = $this->db->get();
			return $query->result();

		}

		public function get_leave_submission_list_cancellation($employee_code)
		{

			// $this->db->select('*');
			// $this->db->from('ms_annual_leave');
			// $this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');
			// $this->db->group_by('ms_annual_leave.employee_code');

			// $query = $this->db->get();
			// return $query->result();
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('cancellation_agreement', $emp_code);
			$this->db->from('ms_annual_leave');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');

			$query = $this->db->get();
			return $query->result();

		}

		public function get_detailed_leave_history($employee_code)
		{
			$this->db->select('*');
			$this->db->where('ms_annual_leave.employee_code', $employee_code);
			$this->db->from('ms_annual_leave');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_annual_leave_by_code($annual_leave_code)
		{
			$this->db->select('*');
			$this->db->where('ms_annual_leave.annual_leave_code', $annual_leave_code);
			$this->db->from('ms_annual_leave');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_annual_leave.employee_code', 'inner');
			//$this->db->join('ms_leave_rights', 'ms_leave_rights.employee_code = ms_annual_leave.employee_code');
			$this->db->join('ms_career','ms_career.nik = ms_employee.nik');
			$this->db->join('ms_department', 'ms_department.department_code = ms_career.department_code');
			$this->db->join('ms_position','ms_position.position_code = ms_career.position_code');

			$query = $this->db->get();
			return $query->result();
		}

		/*-- END RRAD --*/

		/*-- UPDATE --*/
		public function approval()
		{
			$post 									= $this->input->post();
			$this->id_annual_leave					= $post['id_annual_leave'];
			$this->annual_leave_code				= $post['annual_leave_code'];
			$this->employee_code 					= $post['employee_code'];
			$this->date_of_application 				= $post['date_of_application'];
			$this->nik 								= $post['nik'];
			$this->rdo  							= $post['rdo'];
			$this->leave_taken 						= $post['leave_taken'];
			$this->leave_period 					= $post['leave_period'];
			$this->leave_start_date 				= $post['leave_start_date'];
			$this->leave_end_date 					= $post['leave_end_date'];
			$this->assignment_delegation			= $post['assignment_delegation'];
			$this->delegation_position 				= $post['delegation_position'];
			$this->explanation 						= $post['explanation'];
			$this->checker1 						= $post['checker1'];
			$this->status_checker1 					= $post['status_checker1'];
			$this->checker1_comment					= $post['checker1_comment'];
			$this->checker2 						= $post['checker2'];
			$this->status_checker2 					= $post['status_checker2'];
			$this->checker2_comment					= $post['checker2_comment'];
			

			$this->db->update('ms_annual_leave', $this, array('annual_leave_code'=>$post['annual_leave_code']));
		}

		public function cancellation()
		{
			$post 									= $this->input->post();
			$this->id_annual_leave					= $post['id_annual_leave'];
			$this->annual_leave_code				= $post['annual_leave_code'];
			$this->employee_code 					= $post['employee_code'];
			$this->date_of_application 				= $post['date_of_application'];
			$this->nik 								= $post['nik'];
			$this->rdo  							= $post['rdo'];
			$this->leave_taken 						= $post['leave_taken'];
			$this->leave_period 					= $post['leave_period'];
			$this->leave_start_date 				= $post['leave_start_date'];
			$this->leave_end_date 					= $post['leave_end_date'];
			$this->assignment_delegation			= $post['assignment_delegation'];
			$this->delegation_position 				= $post['delegation_position'];
			$this->explanation 						= $post['explanation'];
			$this->checker1 						= $post['checker1'];
			$this->status_checker1 					= $post['status_checker1'];
			$this->checker1_comment					= $post['checker1_comment'];
			$this->checker2 						= $post['checker2'];
			$this->status_checker2 					= $post['status_checker2'];
			$this->checker2_comment					= $post['checker2_comment'];
			$this->cancellation_agreement			= $post['cancellation_agreement'];
			$this->status_cancellation_agreement	= $post['status_cancellation_agreement'];
			$this->reason_for_cancellation			= $post['reason_for_cancellation'];

			$this->db->update('ms_annual_leave', $this, array('annual_leave_code'=>$post['annual_leave_code']));
		}

		/*-- END UPDATE --*/

		/*-- DELETE --*/
		/*-- END DELETE --*/

		/*-- CHECK --*/
		public function checkCTCode()
		{
			$query 	= $this->db->query("SELECT MAX(annual_leave_code) as annual_leave_code from ms_annual_leave");
			$result = $query->row();
			return $result->annual_leave_code; 
		}
		/*-- CHECK --*/

	}