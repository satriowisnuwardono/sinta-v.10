<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Department_model extends CI_Model
	{

	/*-- CHECK --*/
	public function checkDeptCode()
	{
		$query = $this->db->query("SELECT MAX(department_code) as department_code from ms_department");
		$result = $query->row();
		return $result->department_code;
	}
		
	/*-- CREATE --*/
		public function add()
		{
			$data 	= [
				'department_code' => $this->input->post('department_code'),
				'department_name' => $this->input->post('department_name')
			];

			$this->db->insert('ms_department', $data);
		}
	/*-- END CREATE --*/

	/*-- READ --*/
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
			$this->db->delete('ms_department');
		}
	/*-- END DELETE --*/
	}