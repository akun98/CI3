<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud_user extends CI_Controller {

	public function index()
	{
		$this->load->model('list_user');
		$data['pengguna'] = $this->list_user->get_users();
		$this->load->view('crud_user_view', $data);

		
	}

	public function detail($id)
	{
		$this->load->model('list_user');
		$data['detail'] = $this->list_user->get_single($id);
		$this->load->view('home_detail', $data);
	}

	// Membuat fungsi create
	//public function tambah()
	//{

		//$this->load->model('list_category');
		 //$data = array();		
  
		 //$this->load->library('form_validation');
		 //$this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'isi %s .'));
		 //$this->form_validation->set_rules('password','Password','required',array('required' => 'isi %s.'));

		 //if($this->form_validation->run()==FALSE){
		 	//$this->load->view('user_create');
		 //}
		 //else
		 //{
		 	//if ($this->input->post('simpan')) {
				//$this->list_category->insert();
				//redirect('crud_user');

		 //}
		 //$this->load->view('user_create', $data);
		//}
	//}

	//fungsi update
	
	public function edit($id){
		$this->load->model("list_user");
		$data['tipe'] = "Edit";
		$this->load->helper('form');
		$data['default'] = $this->list_user->get_user_by_id($id);

		if(isset($_POST['simpan'])){
			$this->list_user->update($_POST, $id);
			redirect("user");
		}

		$this->load->view("user_edit",$data);
	}


	//fungsi delete
	public function delete($id){
		$this->load->model('list_user');
		$this->list_user->hapus($id);
		redirect('crud_user');
	}

	
}
?>