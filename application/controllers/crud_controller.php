<?php
Class crud_controller extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
	}

	public function index(){
		$this->load->model("crud");
		$data['list_blog'] = $this->crud->load_blog();
		$this->load->view("home_view",$data);
	}


	public function add(){
		$this->load->model("crud");
		$data['tipe'] = "Add";

		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			$this->crud->simpan($_POST);
			redirect("crud_controller");
		}

		$this->load->view("data_form_blog",$data);
	}

	

	public function edit($id){
		$this->load->model("crud");
		$data['tipe'] = "Edit";
		$data['default'] = $this->crud->get_default($id);

		if(isset($_POST['tombol_submit'])){
			$this->crud->update($_POST, $id);
			redirect("crud_controller");
		}

		$this->load->view("data_form_blog",$data);
	}


	public function delete($id){
		$this->load->model("crud");
		$this->crud->hapus($id);
		redirect("crud_controller");
	}



}