<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends MYCI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('typemodel');
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

    public function insertnew($id){
        $this->load->model('hirarchy');
        $data['query'] = $id;
        $data['type'] = $this->typemodel->get();
        $data['page'] = 'Insert New';
        $this->load->view('header',$data);
        $this->load->view('insertnew');
        $this->load->view('footer');
    }

    public function hirarchy(){
        $this->load->model('hirarchy');
        $query = $this->hirarchy->getitem();
        $jstree = array();
        foreach($query as $value){
            $temp = array();
            if($value->id==$this->session->root){
                $temp = array(
                    'id'        => $value->id,
                    'parent'    => '#',
                    'text'      => $value->nama." (".$value->nama_type.")",
                );
            }
            else{
                $temp = array(
                    'id'        => $value->id,
                    'parent'    => $value->parent_id,
                    'text'      => $value->nama." (".$value->nama_type.")",
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

    public function insertupload(){
        $path = ('.\\assets\\file\\'.$this->session->email);
        
        if(!is_dir($path)){
            mkdir($path,0777,TRUE);
        }

        $this->load->model('hirarchy');
        $data = array(
            'nama'       => $this->input->post('nama'),
            's_number'   => $this->input->post('sn'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'lat'        => $this->input->post('latitude'),
            'lon'        => $this->input->post('longitude'),
            'parent_id'  => $this->input->post('pid'),
            'id_type' => $this->input->post('id_type'),
        );
        $itemid = $this->hirarchy->insertnew($data);
        $newitempath = $path.'\\'.$itemid.'\\';

        if(!is_dir($newitempath)){
            mkdir($newitempath,0777,TRUE);
        }

        $config = array(
            'upload_path'   => $newitempath,
            'allowed_types' => 'jpg|png|gif|pdf|doc|docx|xls|xlsx|txt',
            'max_size'      => '4096'
        );

        $this->load->library('upload',$config);
        $files = $_FILES;
        //print_r($files);
        $this->upload->data();
        foreach($files as $file){
            $_FILES['userfile']['name']    = $file['name'][0];
            $_FILES['userfile']['tmp_name']= $file['tmp_name'][0];
            $filein = array(
                'path_file' => 'assets\\file\\'.$this->session->email.'\\'.$itemid.'\\'.$_FILES['userfile']['name'],
                'id_item'   => $itemid
            );
            echo $newitempath;
            $this->hirarchy->inserfile($filein);
            /*$this->upload->initialize($config);*/
            //$this->upload->do_upload('userfile[]');
            move_uploaded_file($_FILES['userfile']['tmp_name'], $newitempath.$_FILES['userfile']['name']);
        }
        redirect('tree/hirarchy');
    }

    public function hapus($inid){
        $this->load->model('hirarchy');
        $id = $inid;
        $query = $this->hirarchy->hapus($id);
        if($query) redirect('/tree/hirarchy');
    }

    public function edit($inid){
        $this->load->model('hirarchy');
        $id = $inid;
        $data['query'] = $this->hirarchy->getoneitem($id)[0];
        $data['page'] = 'Edit Item';
        $this->load->view('header',$data);
        $this->load->view('edit');
        $this->load->view('footer');
    }

    public function lihat($inid){
        $this->load->model('hirarchy');
        $id = $inid;
        $data['query'] = $this->hirarchy->getoneitem($id)[0];
        $data['file'] = $this->hirarchy->getfile($id);
        $data['page'] = 'Lihat Item';
        $this->load->view('header',$data);
        $this->load->view('lihat');
        $this->load->view('footer');
    }

    public function adduser($in=null){
        $this->load->model('hirarchy');
        $data['error'] = base64_decode($in);
        $data['page'] = 'Add User';
        $data['query'] = $this->hirarchy->getitem();;
        $this->load->view('header',$data);
        $this->load->view('register');
        $this->load->view('footer');
    }

    public function changepassword(){
        $this->load->model('hirarchy');
        $email = $this->input->post('email');
        $old = $this->input->post('old');
        $new = $this->input->post('new');
        echo $email,$old,$new;
        $query = $this->hirarchy->changepassword($email,$old,$new);
        if($query)
            redirect('/tree/hirarchy');
        else
            die('gagal');
    }
}