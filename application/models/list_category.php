	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class list_category extends CI_Model {

		public function get_categorys(){
			$query = $this->db->get('categories');
			return $query->result();
		}	

		public function get_all_categories($limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			$this->db->order_by('categories.date_created', 'DESC');

			$query = $this->db->get('categories');
			return $query->result();
		}

		public function get_total()
		{
			return $this->db->count_all("categories");
		}

		public function get_categories_by_id($id)
    {

         // Inner Join dengan table Categories
        $this->db->select ( '
            categories.*
        ' );
        
        $query = $this->db->get_where('categories', array('cat_id' => $id));

        // Karena datanya cuma 1, kita return cukup via row() saja
        return $query->row();
    }

		public function get_single($id)
		{
			$query = $this->db->query('select * from biodata where id_blog='.$id);
			return $query->result();
		}

		public function get_default($id)
		{
			$data = array();
	  		$options = array('cat_id' => $id);
	  		$Q = $this->db->get_where('categories',$options,1);
	    		if ($Q->num_rows() > 0){
	      			$data = $Q->row_array();
	   			}
	  		$Q->free_result();
	 		return $data;
		}



		public function upload()
		{
			$config['max_size']  = '2048';
			$config['remove_space']  = TRUE;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('input_name')){
				$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
				return $return;
			} else {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			}
		}

		public function insert($upload)
		{
			$data = array(
				'cat_id' => '',
				'cat_name' => $this->input->post('cat_name'),
				'cat_description' => $this->input->post('cat_description'),
				'date_created' => $this->input->post('date_created'),
				
				
			);

			$this->db->insert('categories', $data);
		}

	// public function upload(){
	// 	$config['upload_path'] = './gambar/';
	// 	$config['allowed_types'] = 'jpg|png|jpeg';
	// 	$config['max_size']	= '2048';
	// 	$config['remove_space'] = TRUE;
	
	// 	$this->load->library('upload', $config); // Load konfigurasi uploadnya
	// 	if($this->upload->do_upload('gambar_blog')){ // Lakukan upload dan Cek jika proses upload berhasil
	// 		// Jika berhasil :
	// 		$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	// 		return $return;
	// 	}else{
	// 		// Jika gagal :
	// 		$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	// 		return $return;
	// 	}
	// }
	
	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data = array(
			'cat_id' => $this->input->post('null'),
			'cat_name' => $this->input->post('name_atk'),
			'cat_description' => $this->input->post('description_atk'),
			'date_created' => $this->input->post('date_created')
			
		);
		
		$this->db->insert('categories', $data);
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$cat_name = $this->db->escape($post['cat_name']);
		$cat_description = $this->db->escape($post['cat_description']);
		$date_created = $this->db->escape($post['date_created']);
		$sql = $this->db->query("UPDATE categories SET cat_name = $cat_name, cat_description = $cat_description, date_created = $date_created WHERE cat_id = ".intval($id));
		return true;
	}


		//fungsi delete
		public function hapus($id){
			$query = $this->db->query('DELETE from categories WHERE cat_id= '.$id);
		}
	}