<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class It_management_Model extends CI_Model
	{
		
		/*-- CHECK --*/
		public function checkJoCode()
		{
			$query = $this->db->query("SELECT MAX(jo_code) as jo_code from ms_jo_it");
			$result = $query->row();
			return $result->jo_code;
		}

		public function checkITCode()
		{
			$query = $this->db->query("SELECT MAX(item_code) as item_code from ms_it_equipment");
			$result = $query->row();
			return $result->item_code;
		}

		/*-- CREATE --*/
		public function insert_request()
		{
			$post 					= $this->input->post();
			$this->jo_code 			= $post['jo_code'];
			$this->employee_code 	= $post['employee_code'];
			$this->name 			= $post['name'];
			$this->request_type		= $post['request_type'];
			$this->request_date 	= date('Y-m-d');
			$this->details 			= $post['details'];

			$this->db->insert('ms_jo_it_temporary', $this);
		}

		/*-- Equipment Type --*/
		public function insert_equipment_type()
		{
			$post 					= $this->input->post();
			$this->equipment_type 	= $post['equipment_type'];

			$this->db->insert('ms_it_equipment_type', $this);
		}

		/*-- Equipment --*/
		public function insert_equipment()
		{
			$post 					= $this->input->post();
			$this->item_code 		= $post['item_code'];
			$this->id_equipment 	= $post['id_equipment'];
			$this->item_name 		= $post['item_name'];
			$this->unit_type 		= $post['unit_type'];
			$this->first_stock 		= $post['first_stock'];
			$this->safe_stock 		= $post['safe_stock'];
			// $this->last_stock 		= $post['last_stock'];
			// $this->total_in 		= $post['total_in'];
			// $this->total_out 		= $post['total_out'];

			$this->db->insert('ms_it_equipment', $this);
		}

		public function insert_equipment_in()
		{
			$post 					= $this->input->post();
			$this->item_code 		= $post['item_code'];
			$this->total 			= $post['total'];
			$this->request_date		= $post['request_date'];
			$this->date_in  		= $post['date_in'];
			$this->explanation 		= $post['explanation'];

			$this->db->insert('ms_it_equipment_in', $this);
		}

		public function insert_equipment_out()
		{
			$post 					= $this->input->post();
			$this->item_code 		= $post['item_code'];
			$this->total 			= $post['total'];
			$this->out_date  		= $post['out_date'];
			$this->explanation 		= $post['explanation'];

			$this->db->insert('ms_it_equipment_out', $this);
		}

		public function process()
		{
			$emp_code 	= $this->session->userdata['employee_code'];
			$sql 		= "INSERT INTO ms_jo_it(jo_code, employee_code, name, request_type, request_date, details) SELECT jo_code, employee_code, name, request_type, request_date, details FROM ms_jo_it_temporary WHERE ms_jo_it_temporary.employee_code = '$emp_code'";
			$query 		= "DELETE FROM ms_jo_it_temporary";

			if ($this->db->query($sql)) {
				$this->db->query($query);
			} else {
				echo "Failed";
			}
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_by_emp_code($employee_code)
		{
			$emp_code 	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_jo_it_temporary.employee_code', $employee_code);
			$this->db->from('ms_jo_it_temporary');

			$query 		= $this->db->get();
			return $query->result();
		}

		public function get_by_request($employee_code)
		{
			$emp_code 	= $this->session->userdata['employee_code'];
			$this->db->select('*');
			$this->db->where('ms_jo_it.employee_code', $emp_code);
			$this->db->from('ms_jo_it');
			$this->db->group_by('jo_code');
			$this->db->order_by('jo_code', 'desc');

			$query 		= $this->db->get();
			return $query->result();
		}

		public function get_by_request_admin()
		{
			$this->db->select('*');
			$this->db->where('request_status', '0');
			$this->db->or_where_in('request_status', '1');
			$this->db->from('ms_jo_it');
			$this->db->group_by('jo_code');
			$this->db->order_by('jo_code', 'desc');

			$query 		= $this->db->get();
			return $query->result();
		}

		public function get_by_request_details($jo_code)
		{
			$this->db->select('*');
			$this->db->where('ms_jo_it.jo_code', $jo_code);
			$this->db->from('ms_jo_it');

			$query 		= $this->db->get();
			return $query->result();
		}

		public function get_by_request_details_admin($jo_code)
		{
			$this->db->select('*');
			$this->db->where('ms_jo_it.jo_code', $jo_code);
			$this->db->where('request_status', '0');
			$this->db->or_where_in('request_status', '1');
			$this->db->from('ms_jo_it');

			$query 		= $this->db->get();
			return $query->result();
		}

		public function get_by_jo_complete()
		{
			$this->db->select('*');
			$this->db->where('request_status', '2');
			$this->db->from('ms_jo_it');
			$this->db->group_by('jo_code');
			$this->db->order_by('jo_code', 'desc');

			$query 		= $this->db->get();
			return $query->result();
		}

		public function get_by_details_jo_complete($jo_code)
		{
			$this->db->select('*');
			$this->db->where('ms_jo_it.jo_code', $jo_code);
			$this->db->where('request_status', '2');
			$this->db->from('ms_jo_it');

			$query 		= $this->db->get();
			return $query->result();
		}

		/*-- IT Assets --*/
		public function get_equipment_type()
		{
			return $this->db->get('ms_it_equipment_type')->result();
		}

		public function get_equipment()
		{
			return $this->db->get('ms_it_equipment')->result();
		}

		public function get_equipment_in()
		{
			$this->db->select('*');
			$this->db->from('ms_it_equipment_in');
			$this->db->join('ms_it_equipment', 'ms_it_equipment.item_code = ms_it_equipment_in.item_code');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_equipment_out()
		{
			$this->db->select('*');
			$this->db->from('ms_it_equipment_out');
			$this->db->join('ms_it_equipment', 'ms_it_equipment.item_code = ms_it_equipment_out.item_code');

			$query = $this->db->get();
			return $query->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		public function update_request()
		{
			$post 						= $this->input->post();
			$this->id_jo 				= $post['id_jo'];
			$this->jo_code 				= $post['jo_code'];
			$this->employee_code 		= $post['employee_code'];
			$this->name 				= $post['name'];
			$this->request_type			= $post['request_type'];
			$this->request_date 		= $post['request_date'];
			$this->details 				= $post['details'];
			$this->request_status		= $post['request_status'];
			$this->date_of_completion 	= date('Y-m-d');
			$this->explanation 			= $post['explanation'];

			$this->db->update('ms_jo_it', $this, array('id_jo'=>$post['id_jo']));
		}

		/*-- Equipment --*/
		public function update_equipment_type()
		{
			$post 					= $this->input->post();
			$this->id_equipment 	= $post['id_equipment'];
			$this->equipment_type 	= $post['equipment_type'];

			$this->db->update('ms_it_equipment_type', $this, array('id_equipment'=>$post['id_equipment']));
		}

		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete_jo_temporary($id_jo_temporary)
		{
			return $this->db->delete('ms_jo_it_temporary', array('id_jo_temporary'=>$id_jo_temporary));
		}

		/*-- Equipment Type--*/
		public function delete_equipment_type($id_equipment)
		{
			return $this->db->delete('ms_it_equipment_type', array('id_equipment'=>$id_equipment));
		}

		/*-- Equipment --*/
		public function delete_equipment($item_code)
		{
			return $this->db->delete('ms_it_equipment', array('item_code'=>$item_code));
		}
		/*-- END DELETE --*/
	}