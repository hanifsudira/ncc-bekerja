<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagenotfound extends MYCI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['page'] = '404 page';
        $this->load->view('header',$data);
        $this->load->view('pagenotfound');
        $this->load->view('footer');
    }
}