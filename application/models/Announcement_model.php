<?php defined('BASEPATH') OR Exit('No direct script access allowed');
	
	class Announcement_model extends CI_Model
	{
		/*-- UPLOAD --*/
		public function _upload()
		{
			$config['upload_path']		= 'assets/dist/files';
			$config['allowed_types']	= 'pdf|PDF';
			$config['max_size']			= 5200;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('attachment')) {
				return $this->upload->data('file_name');
			}

			return "";
		}
		/*-- END UPLOAD --*/

		/*-- DOWNLOAD --*/
		public function download($announcement_id)
		{
		  $query = $this->db->get_where('ms_announcement',array('announcement_id'=>$announcement_id));
		  return $query->row_array();
		}
		/*-- END DOWNLOAD --*/

		/*-- CREATE --*/
		public function insert()
		{
			$post 							= $this->input->post();
			$this->title 					= $post['title'];
			$this->details 					= $post['details'];
			$this->announcement_date 		= date('Y-m-d');
			$this->files 					= $this->_upload();

			$this->db->insert('ms_announcement', $this);

		}
		/*-- END CREATE --*/

		/*-- READ --*/
		public function get_announcement()
		{
			$this->db->select('*');
			$this->db->from('ms_announcement');

			$query = $this->db->get();
			return $query->result();
		}

		public function get_announcement_by_id($announcement_id)
		{
			$this->db->select('*');
			$this->db->where('announcement_id', $announcement_id);
			$this->db->from('ms_announcement');

			$query = $this->db->get();
			return $query->result();
		}
		/*-- END READ --*/

		/*-- UPDATE --*/
		/*-- END UPDATE --*/

		/*-- DELETE --*/
		/*-- END DELETE --*/

	}