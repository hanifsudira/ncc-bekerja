<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index($msg=null){
		
        $data['error'] = (base64_decode($msg)=="success" ? true : null);
        $this->load->view('login',$data);
    }

    public function register($msg=null){
        $data['error'] = (base64_decode($msg)=="error" ? true : null);
        $this->load->view('register',$data);
    }

    public function registerprocess(){
        $this->load->model('hirarchy');
        $data = array(
            'root_item'  	=> $this->input->post('id'),
            'email'     	=> $this->input->post('email'),
            'password'  	=> md5($this->input->post('password')),
			'last_login'	=> date('Y-m-d H:i:s'),
			'user_type'		=> 2
        );
        $query = $this->hirarchy->register($data);	
		if($query)
            redirect('tree/adduser/'.base64_encode('ok'));
        else
            redirect('tree/adduser/'.base64_encode('error'));
    }

    public function login(){
        $this->load->model('hirarchy');
        $data = array('email' =>$this->input->post('email'),'password'=> $this->input->post('password'));
        $query = $this->hirarchy->login($data);
        if($query){
            $result = $this->hirarchy->getuserdata($data['email']);
            $result = $result[0];
            $userdata = array(
                'email'     => $result->email,
                'root'      => $result->root_item,
                'login'     => 1,
                'user_type' => $result->user_type
            );
            $this->session->set_userdata($userdata);
            redirect('tree/hirarchy');
        }
        else{
            redirect('/');
        }
    }

    public function logout(){
        $this->load->model('hirarchy');
        $this->hirarchy->updatelastlogin($this->session->email);
        $this->session->sess_destroy();
        redirect('/');
    }
}