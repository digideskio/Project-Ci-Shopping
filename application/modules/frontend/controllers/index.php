<?php

class Index extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $this->load->model("mproduct");
        $this->load->model("marticle");
        $this->load->model("mtags");
        $view = array(
            "title" => "Trang chủ | IT Shop",
            "listcate" => $this->mproduct->listCate(),
            "listmobile" => $this->mproduct->showMobile(),
            "listtablet" => $this->mproduct->showTablet(),
            "listpc" => $this->mproduct->showPc(),
            "listtb" => $this->mproduct->showTb(),
            "listar" => $this->marticle->listArticlePublicTrue(),
            "listtags" => $this->mtags->listAll(),
        );
        $this->load->view("index", $view);
    }

}
