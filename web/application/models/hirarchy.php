<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Hirarchy extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }

    public function getitem($id){
        $query = $this->db->query("SELECT * FROM item WHERE id='$id' UNION SELECT * FROM item WHERE root_id='$id'");
        return $query->result();
    }

    public function countallitem($root){
        $query = $this->db->query("select count(*) as jumlah from item where root_id='$root'");
        return $query->row()->jumlah;
    }

    public function getlastlogin($email){
        $query = $this->db->query("select last_login from user where email='$email'");
        return $query->row()->last_login;
    }

    public function updatelastlogin($email){
        $this->db->query("update user set last_login=now() where email='$email'");
    }

    public function login($data){
        $email = $data['email'];
        $password = $data['password'];
        $query = $this->db->query("select 1 from user where email='$email' and password=md5('$password');");
        return $query->result();
    }

    public function register($data){

    }

    public function getuserdata($email){
        $query = $this->db->query("select email,instansi,root_item from user where email='$email';");
        return $query->result();
    }
}