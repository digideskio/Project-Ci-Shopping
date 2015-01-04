<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class About extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $this->load->model("mproduct");
        $this->load->model("mpage");
        $this->load->model("mtags");
        $view = array(
            "title" => "Giới thiệu | IT Shop ",
            "listcate" => $this->mproduct->listCate(),
            "about" => $this->mpage->showAbout(),
            "listtags" => $this->mtags->listAll(),
        );
        $this->load->view("about", $view);
    }

}
