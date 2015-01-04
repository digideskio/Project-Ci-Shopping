<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Contact extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $this->load->model("mproduct");
        $this->load->model("mpage");
        $this->load->model("mtags");
        $view = array(
            "title" => "Liên hệ | IT Shop ",
            "listcate" => $this->mproduct->listCate(),
            "contact" => $this->mpage->showContact(),
            "listtags" => $this->mtags->listAll(),
        );
        $this->load->view("contact", $view);
    }

}

