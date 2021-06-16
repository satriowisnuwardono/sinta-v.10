<?php defined('BASEPATH') OR Exit('No direct script access allowed');

	class Employee_model extends CI_Model
	{
		
		/*-- Upload Image --*/
		// public function _upload()
		// {
		// 	$config['upload_path']		= 'assets/dist/photos';
		// 	$config['allowed_types']	= 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
		// 	$config['max_size']			= 5200;
		// 	$config['max_width']		= 5024;
		// 	$config['max_height']		= 5768;

		// 	$this->load->library('upload', $config);
		// 	if ($this->upload->do_upload('image')) {
		// 		return $this->upload->data('file_name');
		// 	}

		// 	return "default.png";
		// }
		public function _upload()
		{
			$config['upload_path'] 		= './assets/dist/photos';
			$config['allowed_types']	= 'gif|jpg|png';
			// $config['file_name'] 		= $this->employee_code;
			$config['max_size']			= 2000;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photos')) {
				return $this->upload->data('file_name');
			}

			return "default.png";
		}

		/*-- Input Employee Data --*/
		public function insert_employee()
		{
			$post 						= $this->input->post();
			$this->employee_code 		= $post['employee_code'];
			$this->nik 					= $post['nik'];
			$this->name 				= $post['name'];
			$this->id_number 			= $post['id_number'];
			$this->place_of_birth 		= $post['place_of_birth'];
			$this->date_of_birth 		= $post['date_of_birth'];
			$this->religion_code 		= $post['religion_code'];
			$this->gender 				= $post['gender'];
			$this->phone_number 		= $post['phone_number'];
			$this->nationality 			= $post['nationality'];
			$this->marital_status_code 	= $post['marital_status_code'];
			$this->address 		 		= $post['address'];
			$this->neighborhood  		= $post['neighborhood'];
			$this->hamlet  				= $post['hamlet'];
			$this->urban_village  		= $post['urban_village'];
			$this->sub_district  		= $post['sub_district'];
			$this->regency  			= $post['regency'];
			$this->province  			= $post['province'];
			$this->zip  				= $post['zip'];
			$this->hired_date 		 	= $post['hired_date'];
			$this->last_education 	 	= $post['last_education'];
			$this->majors 	 			= $post['majors'];
			$this->email 	 			= $post['email'];
			$this->emergency_contact 	= $post['emergency_contact'];
			$this->contact_name 		= $post['contact_name'];
			$this->relation 			= $post['relation'];
			$this->blood_group 			= $post['blood_group'];
			$this->npwp 				= $post['npwp'];
			$this->reference 	 		= $post['reference'];
			$this->photos 				= $this->_upload();

			$this->db->insert('ms_employee', $this);
		}

		/*-- CRETAE --*/
		public function add()
		{
			// $data = [
			// 	"employee_code"			=> $this->input->post('employee_code', true),
			// 	"nik" 					=> $this->input->post('nik', true),
			// 	"name" 					=> $this->input->post('name', true),
			// 	"id_number" 			=> $this->input->post('id_number', true),
			// 	"place_of_birth" 		=> $this->input->post('place_of_birth', true),
			// 	"date_of_birth" 		=> $this->input->post('date_of_birth', true),
			// 	"religion_code" 		=> $this->input->post('religion_code', true),
			// 	"gender" 				=> $this->input->post('gender', true),
			// 	"phone_number" 			=> $this->input->post('phone_number', true),
			// 	"marital_status_code" 	=> $this->input->post('marital_status_code', true),
			// 	"address" 				=> $this->input->post('address', true),
			// 	"reference" 			=> $this->input->post('reference', true),
			// 	"photos"				=> $this->_upload()
			// ];

			// $this->db->insert('ms_employee', $data);
			$post 						= $this->input->post();
			$this->employee_code 		= $post['employee_code'];
			$this->nik 					= $post['nik'];
			$this->name 				= $post['name'];
			$this->id_number 			= $post['id_number'];
			$this->place_of_birth 		= $post['place_of_birth'];
			$this->date_of_birth 		= $post['date_of_birth'];
			$this->religion_code 		= $post['religion_code'];
			$this->gender 				= $post['gender'];
			$this->phone_number 		= $post['phone_number'];
			$this->npwp 				= $post['npwp'];
			$this->marital_status_code 	= $post['marital_status_code'];
			$this->address 		 		= $post['address'];
			$this->reference 	 		= $post['reference'];
			$this->photos 				= $this->_upload();

			$this->db->insert('ms_employee', $this);
		}

		public function resign($employee_code)
		{

			// $this->db->select('employee_code, nik, name, id_number, place_of_birth, date_of_birth, religion_code, gender, phone_number, marital_status_code, address, npwp, reference, status, photos');
			// $this->db->from('ms_employee');
			// $this->db->where('employee_code', $employee_code);
			// $this->db->set('resign_date', date('Y-m-d'));

			// $sql 		= $this->db->get_compiled_insert('ms_employee_resign', $this);
			// $date       = date('Y-m-d');
			// $sql 		= "INSERT INTO ms_employee_resign (employee_code, nik, name, id_number, place_of_birth, date_of_birth, religion_code, gender, phone_number, marital_status_code, address, npwp, reference, status, photos, resign_date) SELECT employee_code, nik, name, id_number, place_of_birth, date_of_birth, religion_code, gender, phone_number, marital_status_code, address, npwp, reference, status, photos, '$date' FROM ms_employee WHERE ms_employee.employee_code = '$employee_code'";

			$sql 		= "INSERT INTO ms_employee_resign (employee_code, nik, name, id_number, place_of_birth, date_of_birth, religion_code, gender, phone_number, marital_status_code, address, npwp, reference, status, photos) SELECT employee_code, nik, name, id_number, place_of_birth, date_of_birth, religion_code, gender, phone_number, marital_status_code, address, npwp, reference, status, photos FROM ms_employee WHERE ms_employee.employee_code = '$employee_code'";
			$query 		= "DELETE FROM ms_employee WHERE ms_employee.employee_code = '$employee_code'";

			if ($this->db->query($sql)) {
				$this->db->query($query);
			} else {
				echo "Failed";
			}
		}
		/*-- END CRETAE --*/

		/*-- READ --*/
		public function get_employee()
		{
			$this->db->select('*');
			$this->db->from('ms_employee');
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee.marital_status_code');
			$this->db->order_by('ms_employee.employee_code', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee_active()
		{
			$this->db->select('*');
			$this->db->where('ms_employee.status', '1');
			$this->db->from('ms_employee');
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee.marital_status_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee_off()
		{
			$this->db->select('*');
			$this->db->where('ms_employee.status', '0');
			$this->db->from('ms_employee');
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee.marital_status_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee_resign()
		{
			$this->db->select('*');
			$this->db->from('ms_employee_resign');
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee_resign.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee_resign.marital_status_code');
			$query = $this->db->get();
			return $query->result();
		}		

		public function active($employee_code)
		{
			$this->db->where('employee_code', $employee_code);
			$this->db->set('status', 1);
			$this->db->update('ms_employee', array('employee_code'=>$employee_code));
			return true;
		}

		public function off($employee_code)
		{
			$this->db->where('employee_code', $employee_code);
			$this->db->set('status', 0);
			$this->db->update('ms_employee', array('employee_code'=>$employee_code));
			return true;
		}

		public function get_employee_by_emp_code($employee_code)
		{	
			$emp_code 		= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_employee.employee_code', $emp_code);
			$this->db->from('ms_employee');
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee.marital_status_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee_code($employee_code)
		{
			return $this->db->get_where('ms_employee', ["employee_code"=>$employee_code])->row();
		}

		public function get_employee_resign_code($employee_code)
		{
			return $this->db->get_where('ms_employee_resign', ["employee_code"=>$employee_code])->row();
		}

		public function get_employee_details($employee_code)
		{
			$this->db->select('*');
			$this->db->from('ms_employee');
			$this->db->where('employee_code', $employee_code);
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee.marital_status_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_employee_resign_details($employee_code)
		{
			$this->db->select('*');
			$this->db->from('ms_employee_resign');
			$this->db->where('employee_code', $employee_code);
			$this->db->join('ms_religion','ms_religion.religion_code = ms_employee_resign.religion_code');
			$this->db->join('ms_marital_status','ms_marital_status.marital_status_code = ms_employee_resign.marital_status_code');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_by_employee_id($id)
		{
			return $this->db->get_where('ms_employee', ["id"=>$id])->row();
		}

		public function get_by_employee_resign_id($id)
		{
			return $this->db->get_where('ms_employee_resign', ["id"=>$id])->row();
		}

		public function get_religion()
		{
			return $this->db->get('ms_religion')->result();
		}

		public function get_marital_status()
		{
			return $this->db->get('ms_marital_status')->result();
		}

		public function get_structural($employee_code)
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

		public function get_last_structural($employee_code)
		{
			$this->db->select('*');
			$this->db->from('ms_career');
			$this->db->where('employee_code', $employee_code);
			$this->db->order_by('career_code', 'DESC');
			$this->db->limit(1);

			$this->db->join('ms_position', 'ms_position.position_code = ms_career.position_code');
			$this->db->join('ms_department', 'ms_department.department_code = ms_career.department_code');
			$this->db->join('ms_division','ms_division.division_code = ms_career.division_code');


			$query = $this->db->get();
			return $query->result();
		}

		public function get_bpjs($employee_code)
		{
			// $this->db->select('*');
			// $this->db->from('ms_bpjs');
			// $this->db->where('ms_bpjs.employee_code', $employee_code);

			// $query 			= $this->db->get();
			// return $query->result();

			return $this->db->get_where('ms_bpjs', ["employee_code"=>$employee_code])->row();
		}

		public function get_family($employee_code)
		{
			$this->db->select('*');
			$this->db->from('ms_family');
			$this->db->where('ms_family.employee_code', $employee_code);

			$query 			= $this->db->get();
			return $query->result();
		}

		public function get_education($employee_code)
		{
			$this->db->select('*');
			$this->db->from('ms_education');
			$this->db->where('ms_education.employee_code', $employee_code);

			$query 			= $this->db->get();
			return $query->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update_employee()
		{
			$post 						= $this->input->post();
			$this->id 					= $post['id'];
			$this->employee_code 		= $post['employee_code'];
			$this->nik 					= $post['nik'];
			$this->name 				= $post['name'];
			$this->id_number 			= $post['id_number'];
			$this->place_of_birth 		= $post['place_of_birth'];
			$this->date_of_birth 		= $post['date_of_birth'];
			$this->religion_code 		= $post['religion_code'];
			$this->gender 				= $post['gender'];
			$this->phone_number 		= $post['phone_number'];
			$this->nationality 			= $post['nationality'];
			$this->marital_status_code 	= $post['marital_status_code'];
			$this->address 		 		= $post['address'];
			$this->neighborhood  		= $post['neighborhood'];
			$this->hamlet  				= $post['hamlet'];
			$this->urban_village  		= $post['urban_village'];
			$this->sub_district  		= $post['sub_district'];
			$this->regency  			= $post['regency'];
			$this->province  			= $post['province'];
			$this->zip  				= $post['zip'];
			$this->hired_date 		 	= $post['hired_date'];
			$this->last_education 	 	= $post['last_education'];
			$this->majors 	 			= $post['majors'];
			$this->email 	 			= $post['email'];
			$this->emergency_contact 	= $post['emergency_contact'];
			$this->contact_name 		= $post['contact_name'];
			$this->relation 			= $post['relation'];
			$this->blood_group 			= $post['blood_group'];
			$this->npwp 				= $post['npwp'];
			$this->reference 	 		= $post['reference'];
			if (!empty($_FILES["photos"]["name"])) {
				$this->photos 			= $this->_upload();
			} else {
            	$this->photos = $post["old_photos"];
			}

			$this->db->update('ms_employee', $this, array('id'=>$post['id']));
		} 

		public function update_employee_resign()
		{
			$post 						= $this->input->post();
			$this->id 					= $post['id'];
			$this->employee_code 		= $post['employee_code'];
			$this->nik 					= $post['nik'];
			$this->name 				= $post['name'];
			$this->id_number 			= $post['id_number'];
			$this->place_of_birth 		= $post['place_of_birth'];
			$this->date_of_birth 		= $post['date_of_birth'];
			$this->religion_code 		= $post['religion_code'];
			$this->gender 				= $post['gender'];
			$this->phone_number 		= $post['phone_number'];
			$this->npwp 				= $post['npwp'];
			$this->marital_status_code 	= $post['marital_status_code'];
			$this->address 		 		= $post['address'];
			$this->reference 	 		= $post['reference'];
			$this->resign_date 			= $post['resign_date'];
			if (!empty($_FILES["image"]["name"])) {
				$this->photos 			= $this->_upload();
			} else {
            	$this->photos = $post["old_image"];
			}

			$this->db->update('ms_employee_resign', $this, array('id'=>$post['id']));
		}
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('ms_employee');
		}

		public function _deleteImage($id)
		{
			$profile	= $this->get_by_employee_code($employee_code);
			if ($profile->image != "default.png") {
				$filename = explode(".", $profile->image)[0];
				return array_map('unlink', glob(FCPATH."assets/dist/photos/$filename.*"));
			}
		}
		/*-- END DELETE --*/

		/*-- CHECK --*/
		public function checkEmpCode()
		{
			$query 	= $this->db->query("SELECT MAX(employee_code) as employee_code from ms_employee");
			$result = $query->row();
			return $result->employee_code; 
		}
		/*-- CHECK --*/

		
	}