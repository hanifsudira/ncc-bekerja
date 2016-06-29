<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Hirarchy extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }

    public function getitem($id){
        // $query = $this->db->query("SELECT * FROM item WHERE id='$id' UNION SELECT * FROM item WHERE root_id='$id'");
        $query=$this->db->query("SELECT * FROM item");
        return $query->result();
    }

    public function getoneitem($id){
        $query = $this->db->query("SELECT * FROM item WHERE id='$id'");
        return $query->result();
    }

    public function countallitem($root){
        $query = $this->db->query("select count(*) as jumlah from item where root_id=$root");
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
        $email = $data['email'];
        $password = $data['password'];
        $instansi = $data['instansi'];
        $query = $this->db->query("INSERT INTO USER (email,PASSWORD,instansi,last_login) VALUES('$email',md5('$password'),'$instansi',now());");
        return $query;
    }

    public function getuserdata($email){
        $query = $this->db->query("select email,instansi,root_item from user where email='$email';");
        return $query->result();
    }

    public function defineroot($data){
        $nama = $data['nama'];
        $deskripsi = $data['deskripsi'];
        $path = $data['path_gambar'];
        $lat = $data['lat'];
        $lon = $data['lon'];
        $own = $data['user_own'];
        $query = $this->db->query("CALL sp_defineroot('$nama','$deskripsi','$path',$lat,$lon,'$own');");
        return $query->row()->balik;
    }

    public function insertnew($data){
        $nama = $data['nama'];
        $deskripsi = $data['deskripsi'];
        $path = $data['path_gambar'];
        $lat = $data['lat'];
        $lon = $data['lon'];
        $parent_id = $data['parent_id'];
        $parent_name = $data['parent_name'];
        $root_id = $this->session->root;
        $query = $this->db->query("insert into item (nama,deskripsi,path_gambar,lat,lon,parent_id,parent_name,root_id) values('$nama','$deskripsi','$path',$lat,$lon,'$parent_id','$parent_name','$root_id');");
        return $query;
    }

    public function hapus($id){
        $query = $this->db->query("CALL sp_hapusitem($id);");
        return $query->row()->balik;
    }


}