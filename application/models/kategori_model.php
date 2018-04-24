<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('nama_kategori');

        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function create_category()
    {
        $data = array(
            'nama_kategori'     => $this->input->post('nama_kategori'),
            'ket_kategori'   => $this->input->post('ket_kategori')
        );

        return $this->db->insert('kategori', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('kategori', array('id' => $id));
        return $query->row();
    }
}
