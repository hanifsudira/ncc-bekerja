<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Type extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('typemodel');
    }
    function index(){
    	$data['type'] = $this->typemodel->get();
    	$data['page'] = 'Type';

        $this->load->view('header',$data);
        $this->load->view('type');
        $this->load->view('footer');
    }
    function update(){
    	$input=$this->input->post();
    	print_r($input);
    	$this->typemodel->update($input);
    	redirect('type');
    }
    function hapus($id){
    	$this->typemodel->delete($id);
    	redirect('type');
    }
    function add(){
    	$input=$this->input->post();
    	$this->typemodel->insert($input);
    	redirect('type');
    }
}