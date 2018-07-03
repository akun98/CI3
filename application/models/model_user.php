<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_user extends CI_Model{

	public function register($enc_password){
 // Array data user
 		$data = array(
 		'nama' => $this->input->post('nama'),
 		'email' => $this->input->post('email'),
 		'kodepos' => $this->input->post('kodepos'),
 		'username' => $this->input->post('username'),
 		'password' => $enc_password,
        'fk_level_id' => $this->input->post('membership')
 	);	
 // Insert user
 	return $this->db->insert('user', $data);
 	}

 	// Proses login user
    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');


        if($result->num_rows() == 1){
            return $result->row(0)->user_id;
        } else {
            return false;
        }
    }

    //menambahkan level user
    function get_user_level($user_id)
    {
        //dapatkan data user berdasarakan user_id
       $this->db->select('fk_level_id');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('user');


        if($result->num_rows() == 1){
            return $result->row(0)->fk_level_id;
        } else {
            return false;
        }
    }

    public function get_user_details( $username )
   {

        $this->db->join('levels', 'levels.level_id = user.fk_level_id', 'left');
       $this->db->where('username', $username);

       $result = $this->db->get('user');

       if ($result->num_rows() == 1) {
           return $result->row();
       } else {
           return false;
       }
   }

 }