<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User_Controller extends MX_Controller
{
    protected $class_name;
    protected $function_name;

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library("cart");
        //Load những model, helper chung cần thiết ở đây
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("Mcate");
        $this->load->model("Mbook");
        $this->load->model("Muser");
        $this->load->model("Mcomment");
        $this->load->model("Mbill");
        $this->load->model("Mbilldetail");
        $this->load->model("Maddtime");
        $this->load->model("Msearch");
        $this->load->model("Mslider");
        
    }
}