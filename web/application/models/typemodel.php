<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Typemodel extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
    function insert($data){
    	$this->db->insert('type',$data);
    }
    function update($data){
    	$this->db->where('id_type',$data['id_type']);
    	$this->db->update('type',$data);
    }
    function delete($id){
    	$this->db->where('id_type',$id);
    	$this->db->delete('type');
    }
    function get(){
    	$result=$this->db->get('type');
    	return $result->result();
    }
}