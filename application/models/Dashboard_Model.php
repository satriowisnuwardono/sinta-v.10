<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard_model extends CI_Model
	{
		
		public function total_employee()
		{
			$query = $this->db->get('ms_employee');
			if ($query->num_rows() > 0) {
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function total_user()
		{
			$query = $this->db->get('ms_user');
			if ($query->num_rows() > 0) {
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function total_employee_active()
		{
			$this->db->select('*');
			$this->db->from('ms_employee');
			$this->db->where('status', '1');

			$query 	= $this->db->get();
			$active = $query->num_rows();

			return $active;
		}

		public function total_employee_off()
		{
			$this->db->select('*');
			$this->db->from('ms_employee');
			$this->db->where('status', '0');

			$query 	= $this->db->get();
			$off = $query->num_rows();

			return $off;
		}

		public function total_employee_resign()
		{
			$this->db->select('*');
			$this->db->from('ms_employee_resign');

			$query 	= $this->db->get();
			$resign = $query->num_rows();

			return $resign;
		}

		public function getById($id)
		{
			return $this->db->get_where('ms_employee', array('id'=>$id)->row());
		}

		public function get_last_five_user()
		{
			$this->db->select('*');
			$this->db->from('ms_user');
			$this->db->join('ms_role', 'ms_role.role_code = ms_user.role_code');
			$this->db->order_by('user_code','DESC');
			$this->db->limit('5');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_last_five_employee()
		{
			$this->db->select('*');
			$this->db->from('ms_employee');
			$this->db->order_by('employee_code','DESC');
			$this->db->limit('5');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee_off_by_month()
		{
			$this->db->select('*');
			$this->db->where('end_up_working_date', date('Y-m-d'));
			$this->db->from('ms_career');
			$this->db->join('ms_employee', 'ms_employee.employee_code = ms_career.employee_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function box_profile($employee_code)
		{
			$employee_code	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->from('ms_user');
			$this->db->where('ms_user.employee_code', $employee_code);

			$this->db->join('ms_employee','ms_employee.employee_code = ms_user.employee_code');
			$this->db->join('ms_role','ms_role.role_code = ms_user.role_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function employee_details($employee_code)
		{
			$employee_code	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->from('ms_employee');
			$this->db->where('ms_employee.employee_code', $employee_code);

			$this->db->join('ms_religion', 'ms_religion.religion_code = ms_employee.religion_code');
			$this->db->join('ms_marital_status', 'ms_marital_status.marital_status_code = ms_employee.marital_status_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function structural_details($employee_code)
		{
			$employee_code 	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->from('ms_career');
			$this->db->where('ms_career.employee_code', $employee_code);
			$this->db->order_by('periode', 'DESC');

			$this->db->join('ms_position','ms_position.position_code = ms_career.position_code');
			$this->db->join('ms_department','ms_department.department_code = ms_career.department_code');
		 	$this->db->join('ms_division','ms_division.division_code = ms_career.division_code');

			$query 			= $this->db->get();
			return $query->result();
		}

		public function family_details($employee_code)
		{
			$employee_code 	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->from('ms_family');
			$this->db->where('ms_family.employee_code', $employee_code);

			$query 			= $this->db->get();
			return $query->result();
		}

		public function education_details($employee_code)
		{
			$employee_code 	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->from('ms_education');
			$this->db->where('ms_education.employee_code', $employee_code);

			$query 			= $this->db->get();
			return $query->result();
		}

		public function leave_rights($employee_code)
		{
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_leave_rights.employee_code', $emp_code);
			$this->db->from('ms_leave_rights');

			$query 			= $this->db->get();
			return $query->result();
		}

		// public function update()
		// {
		// 	$data = [
		// 		'employee_code' 		=> $this->input->post('employee_code'),
		// 		'nik' 					=> $this->input->post('nik'),
		// 		'name' 					=> $this->input->post('name'),
		// 		'id_number' 			=> $this->input->post('id_number'),
		// 		'position_code' 		=> $this->input->post('position_code'),
		// 		'department_code' 		=> $this->input->post('department_code'),
		// 		'division_code' 		=> $this->input->post('division_code'),
		// 		'place_of_birth' 		=> $this->input->post('place_of_birth'),
		// 		'date_of_birth' 		=> $this->input->post('date_of_birth'),
		// 		'religion_code' 		=> $this->input->post('religion_code'),
		// 		'gender' 				=> $this->input->post('gender'),
		// 		'phone_number' 			=> $this->input->post('phone_number'),
		// 		'marital_status_code' 	=> $this->input->post('marital_status_code'),
		// 		'address' 				=> $this->input->post('address'),
		// 		'npwp' 					=> $this->input->post('npwp'),
		// 		'reference' 			=> $this->input->post('reference'),
		// 		'status' 				=> $this->input->post('status'),
		// 		'photos' 				=> $this->_upload()
		// 	];

		// 	$this->db->where('id', $this->input->post('id'));
		// 	$this->db->update('ms_employee', $data);
		// }

		// /*-- Upload Image --*/
		// public function _upload()
		// {
		// 	$config['upload_path']		= 'assets/dist/photos';
		// 	$config['allowed_types']	= 'gif|jpg|png|jpeg|JPG|JPEG';
		// 	$config['max_size']			= 5200;
		// 	$config['max_width']		= 5024;
		// 	$config['max_height']		= 5768;

		// 	$this->load->library('upload', $config);
		// 	if ($this->upload->do_upload('image')) {
		// 		return $this->upload->data('file_name');
		// 	}

		// 	return "default.jpg";
		// }
	}
?>