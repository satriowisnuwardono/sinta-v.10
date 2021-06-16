<?php defined('BASEPATH') OR Exit('No direct script access allowed');

	class Mass_leave_model extends CI_Model
	{
		
		/*-- CREATE --*/
		public function insert()
		{
			$post 						= $this->input->post();
			$this->mass_leave_code 		= $post['mass_leave_code'];
			$this->mass_leave_total 	= $post['mass_leave_total'];
			$this->leave_name 			= $post['leave_name'];
			$this->start_date 			= $post['start_date'];
			$this->end_date 			= $post['end_date'];

			$this->db->insert('ms_mass_leave', $this);
		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_mass_leave()
		{
			return $this->db->get('ms_mass_leave')->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		public function delete($mass_leave_id)
		{
			$this->db->where('mass_leave_id', $mass_leave_id);
			$this->db->delete('ms_mass_leave');
		}
		/*-- END DELETE --*/
	}