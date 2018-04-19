<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_blog extends CI_Controller {
//comment
	public function index()
	{
		$this->load->model('list_Blog');
		$data['artikel'] = $this->list_Blog->get_artikels();
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
		$data = array();


		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_blog', 'judul_blog', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('konten', 'Konten dulu', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('penulis', 'penulis', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('email', 'email lo', 'required', array('required' => 'Isi %s, '));
		$this->form_validation->set_rules('genre', 'genre', 'required', array('required' => 'Isi %s, '));

		if ($this->form_validation->run()==FALSE){
			$this->load->view('data_form_blog');
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