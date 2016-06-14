<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        $this->load->view('login');
    }

    public function insertnew(){
        $data['page'] = 'Insert New';
        $this->load->view('header',$data);
        $this->load->view('insertnew');
        $this->load->view('footer');
    }

    public function hirarchy(){
        $this->load->model('hirarchy');
        $query = $this->hirarchy->getitem();
        /*var_dump($query);*/
        $jstree = array();
        foreach($query as $value){
            $temp = array();
            if($value->parent_id==0){
                $temp = array(
                    'id'        => $value->id,
                    'parent'    => '#',
                    'text'      => $value->nama
                );
            }
            else{
                $temp = array(
                    'id'        => $value->id,
                    'parent'    => $value->parent_id,
                    'text'      => $value->nama
                );
            }
            $jstree[]=$temp;
        }
        $data['test'] = json_encode($jstree);
        $data['page'] = 'Tree View';
        $this->load->view('header',$data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function tableview(){
        $this->load->model('hirarchy');
        $data['query'] = $this->hirarchy->getitem();
        $data['page'] = 'Table View';
        $this->load->view('header',$data);
        $this->load->view('tableview');
        $this->load->view('footer');
    }
}