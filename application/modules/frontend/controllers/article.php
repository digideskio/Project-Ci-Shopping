<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Article extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $this->load->model("mproduct");
        $this->load->model("marticle");
        $this->load->model("mtags");
        $this->load->library('pagination');
        $this->load->helper('url');
        // cấu hình phân trang 
        $config['base_url'] = base_url('bai-viet/post/'); // xác định trang phân trang 
        $config['total_rows'] = $this->marticle->countAllPagin(); // xác định tổng số record 
        $config['per_page'] = 5; // xác định số record ở mỗi trang 
        $config['uri_segment'] = 3; // xác định segment chứa page number 
        $this->pagination->initialize($config);
        $view = array(
            "title" => "Bài viết | IT shop ",
            "listcate" => $this->mproduct->listCate(),
            "data" => $this->marticle->listAllPagin($config['per_page'], $this->uri->segment(3)),
            "link" => $this->pagination->create_links(),
            "topview" => $this->marticle->topView(),
            "listtags" => $this->mtags->listAll(),
        );
        $this->load->view("article", $view);
    }

    public function post() {
        $pid = $this->uri->segment(2);
        $pid2 = explode("_", $pid);
        $pid3 = explode(".", $pid2['1']);
        $pid4 = str_replace("post", "", $pid3['0']);
        $pid5 = intval($pid4);
        $this->load->model("marticle");
        $this->load->model("mproduct");
        $this->load->model("mtags");
        $article = $this->marticle->showById($pid5);
        $this->marticle->updateView($pid5);
        $view = array(
            "title" => $article['title'],
            "listcate" => $this->mproduct->listCate(),
            "article" => $article,
            "topview" => $this->marticle->topView(),
            "listtags" => $this->mtags->listAll(),
        );
        $this->load->view("post", $view);
    }
}
