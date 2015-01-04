<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Controller extends MX_Controller {

    protected $class_name;
    protected $function_name;

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
        //Load những model, helper chung cần thiết ở đây
        $this->load->model('muser');
        $this->load->model('mcate');
        $this->load->helper("url");
        $this->load->library("session");
        //Load thư viện upload và config
    //
    }

}