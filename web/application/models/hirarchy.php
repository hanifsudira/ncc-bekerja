<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Hirarchy extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
    public function getitem(){
        $this->db->reconnect();
        $query = $this->db->query('select * from item');
        return $query->result();
    }
}