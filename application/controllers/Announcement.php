<?php defined('BASEPATH') or exit('No direct script access allowed');

class Announcement extends My_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Announcement_model');
		$this->load->library('form_validation', 'upload');
	}

	/*-- CREATE --*/
	public function add()
	{
		$data['title'] 			= 'Add Announcement';

		//Untuk validasi form apakah sudah diisi sesuai dengan rules
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('details', 'Details', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->render_backend('page/announcement/add_announcement', $data);
		} else {
			$this->Announcement_model->insert();
			$this->session->set_flashdata('flash', 'Saved');
			redirect('announcement');
		}
	}
	/*-- END CREATE --*/

	/*-- READ --*/
	public function index()
	{
		$data['title'] 			= 'Annoucement List';
		$data['announcement'] 	= $this->Announcement_model->get_announcement();

		$this->render_backend('page/announcement/announcement_list', $data);
	}

	public function details($announcement_id)
	{
		$data['title'] 			= 'Annoucement Details';
		$data['announcement'] 	= $this->Announcement_model->get_announcement_by_id($announcement_id);

		$this->render_backend('page/announcement/announcement_details', $data);
	}
	/*-- END READ --*/

	/*-- UPDATE --*/
	/*-- END UPDATE --*/

	/*-- DELETE --*/
	/*-- END DELETE --*/

	/*-- DOWNLOAD --*/
	public function download($announcement_id)
	{
		$this->load->helper('download');
		$fileinfo = $this->files_model->download($announcement_id);
		$file = 'assets/dist/files/' . $fileinfo['filename'];
		force_download($file, NULL);
	}
}
