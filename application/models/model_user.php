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
 		'password' => $enc_password
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
 }