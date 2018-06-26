<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_blog extends CI_Controller {
//comment
	public function index()
	{
		$this->load->model('list_Blog');
		// $data['artikel'] = $this->list_Blog->get_artikel();
		// $this->load->view('home_view', $data);

		// Dapatkan data dari model Blog dengan pagination
 		// Jumlah artikel per halaman
 		$limit_per_page = 3;
 		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		 $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

 		// Dapatkan jumlah data
		 $total_records = $this->list_Blog->get_total();
		if ($total_records > 0) {
 			// Dapatkan data pada halaman yg dituju
 			$data['artikel'] = $this->list_Blog->get_artikel($limit_per_page, $start_index);

		 // Konfigurasi pagination
 		$config['base_url'] = base_url() . 'v_blog/index/';
 		$config['total_rows'] = $total_records;
 		$config['per_page'] = $limit_per_page;
 		$config['uri_segment'] = 3;

		 $this->pagination->initialize($config);

		 // Buat link pagination
 		$data['links'] = $this->pagination->create_links();
		}
		
		// Passing data ke view
		$this->load->view('home_view', $data);
	}

	public function detail($id)
	{
		$this->load->model('list_Blog');
		$data['detail'] = $this->list_Blog->get_single($id);
		$this->load->view('home_detail', $data);
	}

	public function add()
	{
		$this->load->model('list_blog');
		$this->load->model('list_category');
		$data = array();
		$data['kategori'] = $this->list_category->get_categorys();


		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_blog', 'judul_blog', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('konten', 'Konten dulu', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('penulis', 'penulis', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('email', 'email lo', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('genre', 'genre', 'required', array('required' => 'Isi %s, '));

		if ($this->form_validation->run()==FALSE){
			$this->load->view('data_form_blog', $data);
		}
		else{
			if ($this->input->post('simpan')) {
			$upload = $this->list_blog->upload();

			if ($upload['result'] == 'success') {
				$this->list_blog->save($upload);
				redirect('v_blog');
			}else{
				$data['message'] = $upload['error'];
			}
		}
			$this->load->view('data_form_blog', $data);
		}
	}

	public function edit($id){
		$this->load->model("list_blog");
		$this->load->model('list_category');
		$data['kategori'] = $this->list_category->get_categorys();
		
		$this->load->library('form_validation');

		$data['default'] = $this->list_blog->get_default($id);

		if(isset($_POST['simpan'])){
			$this->list_blog->update($_POST, $id);

			redirect("v_blog");
		}

		$this->load->view("data_form_edit_blog",$data);
	}


	public function delete($id){
		$this->load->model("list_blog");
		$this->list_blog->hapus($id);
		redirect("v_blog");
	}
}