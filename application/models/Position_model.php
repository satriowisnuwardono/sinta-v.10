<?php 
	defined('BASEPATH') OR Exit('No direct script access allowed');

	class Position_model extends CI_Model
	{
		
		/*-- CHECK --*/
		public function checkPosCode()
		{
			$query  = $this->db->query("SELECT MAX(position_code) as position_code from ms_position");
			$result = $query->row();
			return $result->position_code;
		}

		/*-- END CHECK --*/

		/*-- CREATE --*/
		public function add()
		{
			$data 		= [
				'position_code' 	=> $this->input->post('position_code'),
				'department_code' 	=> $this->input->post('department_code'),
				'division_code' 	=> $this->input->post('division_code'),
				'position_name'		=> $this->input->post('position_name')
			];

			$this->db->insert('ms_position', $data);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function getAllPositionData()
		{
			return $this->db->get('ms_position')->result();
		}

		public function getAllDepartmentData()
		{
			return $this->db->get('ms_department')->result();
		}

		public function get_division($department_code)
		{
			$query 	= $this->db->get_where('ms_division', array('department_code'=> $department_code));
			return $query;
		}

		public function get_position($division_code)
		{
			$query 	= $this->db->get_where('ms_position', array('division_code'=> $division_code));
			return $query;
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('ms_position');
		}
		/*-- END DELETE --*/
	}