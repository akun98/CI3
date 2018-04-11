<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class crud extends CI_Model{

	public function load_blog(){
		$sql = $this->db->query("SELECT * FROM biodata");
		return $sql->result_array();
	}

	public function simpan($post){
		//pastikan nama index post yang dipanggil sama seperti di form input
		$judul_blog = $this->db->escape($post['judul_blog']);
		$konten = $this->db->escape($post['konten']);

		$sql = $this->db->query("INSERT INTO biodata VALUES (NULL, $judul_blog, $konten, 1)");
		if($sql)
			return true;
		return false;
	}

	public function get_default($id){
		$sql = $this->db->query("SELECT * FROM biodata WHERE id_blog = ".intval($id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$judul_blog = $this->db->escape($post['judul_blog']);
		$konten = $this->db->escape($post['konten']);

		$sql = $this->db->query("UPDATE biodata SET judul_blog = $judul_blog, konten = $konten WHERE id_blog = ".intval($id));

		return true;
	}

	public function hapus($id){
		$sql = $this->db->query("DELETE from biodata WHERE id_blog = ".intval($id));
	}	