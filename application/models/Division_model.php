<?php defined('BASEPATH') OR Exit('NO direct script access allowed');
	
	class Division_model extends CI_Model
	{
		/*-- CHECK --*/
		public function checkDivCode()
		{
			$query = $this->db->query("SELECT MAX(division_code) as division_code from ms_division");
			$result = $query->row();
			return $result->division_code;
		}

		/*-- CREATE --*/
		public function add()
		{
			$data = [
				'department_code'	=> $this->input->post('department_code'),
				'division_code' 	=> $this->input->post('division_code'),
				'division_name' 	=> $this->input->post('division_name')
			];

			$this->db->insert('ms_division', $data);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function getAllDivisionData()
		{
			// return $this->db->get('ms_Division')->result_array();
			$this->db->select('*');
			$this->db->from('ms_division');
			// $this->db->join('ms_department','ms_department.department_code = ms_division.department_code');
			
			$query = $this->db->get();
			return $query->result();
		}

		public function getAllDepartmentData()
		{
			return $this->db->get('ms_department')->result_array();
		}

		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('ms_division');
		}
		/*-- END DELETE --*/
	}