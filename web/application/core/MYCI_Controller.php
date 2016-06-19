<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

class MYCI_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $loginData = $this->session->userdata("login");
        if(!$loginData) $this->expired();
    }

    protected function expired(){
        redirect('/');
    }
}