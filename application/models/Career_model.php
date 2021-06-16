<?php defined("BASEPATH") OR Exit('No direct script access allowed');
	
	class Career_model extends CI_Model
	{
		/*-- CHECK --*/
		public function checkCarCode()
		{
			$query 	= $this->db->query("SELECT MAX(career_code) as career_code from ms_career");
			$result = $query->row();
			return $result->career_code;
		}
		/*-- END CHECK --*/

		/*-- CREATE --*/
		public function insert_career()
		{
			$post 							= $this->input->post();
			$this->career_code 				= $post['career_code'];
			$this->employee_code 			= $post['employee_code'];
			$this->nik 						= $post['nik'];
			$this->position_code 			= $post['position_code'];
			$this->department_code 			= $post['department_code'];
			$this->division_code 			= $post['division_code'];
			$this->career_status 			= $post['career_status'];
			$this->hired_date 				= $post['hired_date'];
			$this->start_working_date 		= $post['start_working_date'];
			$this->end_up_working_date 		= $post['end_up_working_date'];
			$this->duration 				= $post['duration'];
			$this->pkwt 					= $post['pkwt'];
			$this->periode 					= $post['periode'];

			$this->db->insert('ms_career', $this);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_structural()
		{
			$this->db->select('*');
			$this->db->from('ms_career');
			$this->db->order_by('career_code', 'ASC');
			$this->db->join('ms_employee', 'ms_career.employee_code = ms_employee.employee_code');
			$this->db->join('ms_department','ms_department.department_code = ms_career.department_code');
			$this->db->join('ms_division', 'ms_division.division_code = ms_career.division_code');
			$this->db->join('ms_position', 'ms_position.position_code = ms_career.position_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_structural_history($employee_code)
		{
			$this->db->select('*');
			$this->db->from('ms_career');
			$this->db->where('employee_code', $employee_code);
			$this->db->order_by('career_code', 'DESC');

			$this->db->join('ms_position', 'ms_position.position_code = ms_career.position_code');
			$this->db->join('ms_department', 'ms_department.department_code = ms_career.department_code');
			$this->db->join('ms_division','ms_division.division_code = ms_career.division_code');


			$query = $this->db->get();
			return $query->result();
		}

		public function get_structural_by_emp_code($employee_code)
		{
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_career.employee_code', $emp_code);
			$this->db->from('ms_career');
			$this->db->join('ms_employee', 'ms_employee.employee_code = ms_career.employee_code');
			$this->db->join('ms_department','ms_department.department_code = ms_career.department_code');
			$this->db->join('ms_division', 'ms_division.division_code = ms_career.division_code');
			$this->db->join('ms_position', 'ms_position.position_code = ms_career.position_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_by_career_code($career_code)
		{
			return $this->db->get_where('ms_career',['career_code'=>$career_code])->row();
		}

		public function get_employee($employee_code)
		{
			return $this->db->get_where('ms_employee', ["employee_code"=>$employee_code])->row();
		}

		public function get_department()
		{
			$this->db->select('*');
			$this->db->from('ms_department');
			$this->db->order_by('department_name', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_division()
		{
			$this->db->select('*');
			$this->db->from('ms_division');
			$this->db->order_by('division_name', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_position()
		{
			$this->db->select('*');
			$this->db->from('ms_position');
			$this->db->order_by('position_name', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update()
		{
			$post 							= $this->input->post();
			$this->career_code 				= $post['career_code'];
			$this->employee_code 			= $post['employee_code'];
			$this->nik 						= $post['nik'];
			$this->position_code 			= $post['position_code'];
			$this->department_code 			= $post['department_code'];
			$this->division_code 			= $post['division_code'];
			$this->career_status 			= $post['career_status'];
			$this->hired_date 				= $post['hired_date'];
			$this->start_working_date 		= $post['start_working_date'];
			$this->end_up_working_date 		= $post['end_up_working_date'];
			$this->duration 				= $post['duration'];
			$this->pkwt 					= $post['pkwt'];
			$this->periode 					= $post['periode'];

			$this->db->update('ms_career', $this, array('career_code'=>$post['career_code']));
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($career_code)
		{
			$this->db->where('career_code', $career_code);
			$this->db->delete('ms_career');
		}
		/*-- END DELETE --*/
	}