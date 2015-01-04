<?php
//Controller Index dùng để hiển thị nội dung của trang chủ
class Index extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("text");
    }
    public function index()
    {
        $data['list'] = $this->Mslider->listall("book2_slider_id");
        $data['searchoption'] = $this->Msearch->listAll();
        $data['cate']= $this->Mcate->listAll();
        $where1 = "book2_book_id";
        $data['newbook'] = $this->Mbook->productindex($where1);
        $where2 = "book2_book_vote";
        $data['votebook'] = $this->Mbook->productindex($where2);
        $where3 = "book2_book_qty2";
        $data['haybook'] = $this->Mbook->productindex($where3);
        $data['title'] = 'Thuê sách | Trang chủ';
        $data['template'] = 'index_home';
        $this->load->view("layout",$data);  
    }
}