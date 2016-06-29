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

    public function insertnew($msg=null){
        $this->load->model('hirarchy');
        $data['query'] = $this->hirarchy->getitem($this->session->root);
        $data['error'] = (base64_decode($msg)=="success" ? true : null);
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
            if($value->id==$this->session->root){
                echo 'lll';
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
 /*       echo '<pre>';
        var_dump($jstree);*/
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

    public function insertupload(){
        $path = './assets/img/'.$this->session->email;
        if(!is_dir($path)){
            mkdir($path,0777,TRUE);
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '4096',
            'max_width'     => '1907',
            'max_height'    => '1280'
        );
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('path_gambar')){
            echo $this->upload->display_errors();
        }
        else{
            $this->load->model('hirarchy');
            $fileinfo = $this->upload->data();
            $data = array(
                'nama'       => $this->input->post('nama'),
                'deskripsi'  => $this->input->post('deskripsi'),
                'path_gambar'=> $this->session->email.'/'.$fileinfo['file_name'],
                'lat'        => $this->input->post('latitude'),
                'lon'        => $this->input->post('longitude')
            );

            if(!$this->session->root){
                $data['user_own'] = $this->session->email;
                $query = $this->hirarchy->defineroot($data);
                if($query){
                    $this->session->set_userdata('root', $query);
                    redirect('/tree/dashboard');
                }
            }
            else{
                $parent = $this->input->post('parent[]');
                $parent = explode("|",$parent);
                $data['parent_id'] = $parent[0];
                $data['parent_name'] = $parent[1];
                $query = $this->hirarchy->insertnew($data);
                if($query) redirect('/tree/insertnew/'.base64_encode('success'));
            }
        }
    }

    public function hapus($inid){
        $this->load->model('hirarchy');
        $id = base64_decode($inid);
        $query = $this->hirarchy->hapus($id);
        if($query) redirect('/tree/tableview');
    }

    public function edit($inid){
        $this->load->model('hirarchy');
        $id = base64_decode($inid);
        $data['query'] = $this->hirarchy->getoneitem($id)[0];
        $data['page'] = 'Edit Item';
        $this->load->view('header',$data);
        $this->load->view('edit');
        $this->load->view('footer');
    }

    public function lihat($inid){
        $this->load->model('hirarchy');
        $id = base64_decode($inid);
        $data['query'] = $this->hirarchy->getoneitem($id)[0];
        $data['page'] = 'Lihat Item';
        $this->load->view('header',$data);
        $this->load->view('lihat');
        $this->load->view('footer');
    }

}