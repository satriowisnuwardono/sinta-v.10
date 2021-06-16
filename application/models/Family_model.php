<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class Family_model extends CI_Model
	{

	/*-- CREATE --*/
	public function add()
	{
		$post 					= $this->input->post();
		$this->employee_code 	= $post['employee_code'];
		$this->name 			= $post['name'];
		$this->relationship 	= $post['relationship'];
		$this->contact 			= $post['contact'];
		$this->address 			= $post['address'];

		$this->db->insert('ms_family', $this);
	}
	/*-- END CREATE --*/

	/*-- READ --*/
	public function get_family()
	{
		return $this->db->get('ms_family')->result();
	
	}

	public function get_family_by_code($employee_code)
		{	
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_family.employee_code', $emp_code);
			$this->db->from('ms_family');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_family.employee_code');
			$query = $this->db->get();
			return $query->result();
		}

	public function get_family_by_emp_code($employee_code)
		{
			return $this->db->get_where('ms_family', ["employee_code"=>$employee_code])->row();
		}	/*-- END READ --*/

	/*-- UPDATE --*/
	public function update()
	{
		$post 					= $this->input->post();
		$this->id 				= $post['id'];
		$this->employee_code 	= $post['employee_code'];
		$this->name 			= $post['name'];
		$this->relationship 	= $post['relationship'];
		$this->contact 			= $post['contact'];
		$this->address 			= $post['address'];

		$this->db->insert('ms_family', $this, array('employee_code'=>$post['employee_code']));
	}
	/*-- END UPDATE --*/

	/*-- DELETE --*/
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('ms_family');
	}
	/*-- END DELETE --*/
	}