<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Hirarchy extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
	
	public function checkchild($id){
		$query=$this->db->query("SELECT COUNT(*) as a FROM item WHERE parent_id = $id");
		if($query)
			return $query->row()->a;
	}
	
	public function getitembyid($id){
		$temp = "select * from item, type where item.parent_id=$id and item.id_type=type.id_type or isnull(item.id_type)";
		$query=$this->db->query($temp);
        if($query)
			return $query->result();
	}

    public function getitem(){
        //$query=$this->db->query("SELECT * FROM item, type where item.id_type=type.id_type or ISNULL(item.id_type)");
        $id = $this->session->root;
		$temp = "select * from item, type where item.id=$id and item.id_type=type.id_type or isnull(item.id_type)";
		$query=$this->db->query($temp);
		if($query)
			return $query->result();
    }
	
	public function getallitem(){
		$query=$this->db->query("SELECT id, nama FROM item");
		if($query)
			return $query->result();
	}

    public function getoneitem($id){
        $query = $this->db->query("SELECT * FROM item WHERE id='$id'");
        if($query)
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
        #$email = $data['email'];
        #$password = $data['password'];
        #$root = $data['root_item'];
        #$query = $this->db->query("INSERT INTO USER VALUES('$email',md5('$password'),'$root',now(),2);");
        $query  = $this->db->insert('user',$data);
		return $query;
    }

    public function getuserdata($email){
        $query = $this->db->query("select email,root_item,user_type from user where email='$email';");
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
        $this->db->insert('item',$data);
        return $this->db->insert_id();
    }
	
	public function insertupdate($id,$data){
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('item', $data);
		$this->db->trans_complete();
		return ($this->db->trans_status() === FALSE) ? 0 : 1;
	}

    public function hapus($id){
        $query = $this->db->query("CALL sp_hapusitem($id);");
        return $query->row()->balik;
    }
	
	public function uplevel($id){
		$query = $this->db->query("CALL sp_uplevel($id)");
		return $query;
	}

    public function changepassword($email,$old,$new){
        $query = $this->db->query("CALL sp_changepwd('$email','$old','$new');");
        return $query->row()->ret;
    }

    public function inserfile($data){
        $this->db->insert('file',$data);
    }

    public function getfile($id){
        $query = $this->db->query("select * from file where id_item=$id");
		if($query)
			return $query->result();
    }
}