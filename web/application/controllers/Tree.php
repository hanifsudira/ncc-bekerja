<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends MYCI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function dashboard(){
        $this->load->model('hirarchy');
        $id = $this->session->root;
        $email = $this->session->email;
        $data = array('last_login' => $this->hirarchy->getlastlogin($email),'all_item' => $this->hirarchy->countallitem($id));
        $data['page'] = 'Dashboard';
        $this->load->view('header',$data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function insertnew(){
        $this->load->model('hirarchy');
        $data['query'] = $this->hirarchy->getitem($this->session->root);
        $data['page'] = 'Insert New';
        $this->load->view('header',$data);
        $this->load->view('insertnew');
        $this->load->view('footer');
    }

    public function hirarchy(){
        $this->load->model('hirarchy');
        $query = $this->hirarchy->getitem($this->session->root);
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
        $this->load->view('hirarchy');
        $this->load->view('footer');
    }

    public function tableview(){
        $this->load->model('hirarchy');
        $data['query'] = $this->hirarchy->getitem($this->session->root);
        $data['page'] = 'Table View';
        $this->load->view('header',$data);
        $this->load->view('tableview');
        $this->load->view('footer');
    }
}