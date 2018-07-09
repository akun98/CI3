	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class list_user extends CI_Model {

		public function get_users(){
			$query = $this->db->get('user');
			return $query->result();
		}	

		public function get_all_users($limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			$this->db->order_by('user.register_date', 'DESC');

			$query = $this->db->get('user');
			return $query->result();
		}

		public function get_total()
		{
			return $this->db->count_all("user");
		}

		public function get_user_by_id($id)
    {

         // Inner Join dengan table Categories
        $this->db->select ( '
            user.*
        ' );
        
        $query = $this->db->get_where('user', array('user_id' => $id));

        // Karena datanya cuma 1, kita return cukup via row() saja
        return $query->row();
    }

		public function get_single($id)
		{
			$query = $this->db->query('select * from user where user_id='.$id);
			return $query->result();
		}

		public function get_default($id)
		{
			$data = array();
	  		$options = array('user_id' => $id);
	  		$Q = $this->db->get_where('user',$options,1);
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
				'user_id' => '',
				'nama' => $this->input->post('Nama'),
				'username' => $this->input->post('Username'),
				'register_date' => $this->input->post('register_date'),
				
				
			);

			$this->db->insert('user', $data);
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
			'user_id' => $this->input->post('null'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'register_date' => $this->input->post('register_date')
			
		);
		
		$this->db->insert('user', $data);
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$nama = $this->db->escape($post['nama']);
		$username = $this->db->escape($post['username']);
		$register_date = $this->db->escape($post['register_date']);
		$sql = $this->db->query("UPDATE user SET nama = $nama, username = $username, register_date = $register_date WHERE user_id = ".intval($id));
		return true;
	}


		//fungsi delete
		public function hapus($id){
			$query = $this->db->query('DELETE from user WHERE user_id= '.$id);
		}
	}