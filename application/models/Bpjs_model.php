<?php defined('BASEPATH') OR Exit ('No direct script access allowed');
	
	class Bpjs_model extends CI_Model
	{
		/*-- CHECK --*/
		public function checkBpjsCode()
		{
			$query = $this->db->query("SELECT MAX(bpjs_code) as bpjs_code from ms_bpjs");
			$result = $query->row();
			return $result->bpjs_code;
		}

		/*-- CREATE --*/
		public function add()
		{
			$post 					= $this->input->post();
			$this->bpjs_code 		= $post['bpjs_code'];
			$this->employee_code	= $post['employee_code'];
			$this->healthy_bpjs 	= $post['healthy_bpjs'];
			$this->clinic_name 		= $post['clinic_name'];
			$this->labor_bpjs 		= $post['labor_bpjs'];

			$this->db->insert('ms_bpjs', $this);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_bpjs()
		{
			$this->db->select('*');
			$this->db->from('ms_bpjs');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_bpjs.employee_code');
			$this->db->order_by('ms_employee.employee_code', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_bpjs_by_emp_code($employee_code)
		{	
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_bpjs.employee_code', $emp_code);
			$this->db->from('ms_bpjs');
			$this->db->join('ms_employee','ms_employee.employee_code = ms_bpjs.employee_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_bpjs_by_code($bpjs_code)
		{
			// $this->db->select('*');
			// $this->db->from('ms_bpjs');
			// $this->db->where('bpjs_code', $bpjs_code);
			// $this->db->join('ms_employee','ms_employee.employee_code = ms_bpjs.employee_code');
			
			// $query = $this->db->get();
			// return $query->result();
			
			return $this->db->get_where('ms_bpjs', array('bpjs_code'=>$bpjs_code))->row();
		}

		public function get_employee()
		{
			return $this->db->get('ms_employee')->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update()
		{
			$post 					= $this->input->post();
			$this->id 				= $post['id'];
			$this->bpjs_code 		= $post['bpjs_code'];
			$this->employee_code	= $post['employee_code'];
			$this->healthy_bpjs		= $post['healthy_bpjs'];
			$this->clinic_name 		= $post['clinic_name'];
			$this->labor_bpjs 		= $post['labor_bpjs'];

			$this->db->update('ms_bpjs', $this, array('bpjs_code'=>$post['bpjs_code']));
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($bpjs_code)
		{
			$this->db->where('bpjs_code', $bpjs_code);
			$this->db->delete('ms_bpjs');
		}
		/*-- END DELETE --*/
	}