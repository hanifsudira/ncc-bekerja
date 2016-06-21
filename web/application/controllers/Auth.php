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
            'email'     => $this->input->post('email'),
            'password'  => $this->input->post('password'),
            'instansi'  => $this->input->post('instansi')
        );
        $query = $this->hirarchy->register($data);
        if($query){
            redirect('/'.base64_encode('success'));
        }
        else{
            redirect('auth/register/'.base64_encode('error'));
        }
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
                'instansi'  => $result->instansi,
                'root'      => $result->root_item,
                'login'     => 1
            );
            $this->session->set_userdata($userdata);
            var_dump($userdata);
            redirect('tree/dashboard');
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