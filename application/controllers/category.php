<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$this->load->model('list_category');
		$data['topik'] = $this->list_category->get_categorys();
		$this->load->view('category_view', $data);

		
	}

	public function detail($id)
	{
		$this->load->model('list_category');
		$data['detail'] = $this->list_category->get_single($id);
		$this->load->view('home_detail', $data);
	}

	// Membuat fungsi create
	public function tambah()
	{

		$this->load->model('list_category');
		 $data = array();		
  
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('cat_name', 'Name', 'required', array('required' => 'isi %s .'));
		 $this->form_validation->set_rules('cat_description','Description','required',array('required' => 'isi %s.'));

		 if($this->form_validation->run()==FALSE){
		 	$this->load->view('category_create');
		 }
		 else
		 {
		 	if ($this->input->post('simpan')) {
				$this->list_category->insert();
				redirect('category');

		 }
		 $this->load->view('category_create', $data);
		}
	}

	//fungsi update
	
	public function edit($id){
		$this->load->model("list_category");
		$data['tipe'] = "Edit";
		$this->load->helper('form');
		$data['default'] = $this->list_category->get_categories_by_id($id);

		if(isset($_POST['simpan'])){
			$this->list_category->update($_POST, $id);
			redirect("category");
		}

		$this->load->view("category_edit",$data);
	}


	//fungsi delete
	public function delete($id){
		$this->load->model('list_category');
		$this->list_category->hapus($id);
		redirect('category');
	}

	
}
?>