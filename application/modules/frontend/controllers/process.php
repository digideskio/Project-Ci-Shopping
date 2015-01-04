<?php
class Process extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function searchQuery()
    {
        header('Content-Type: application/json');
        $key = $_POST['data'];
        $this->load->model('mproduct');
        $product = $this->mproduct->productByKey($key);
        echo json_encode($product);
    }
    public function insertContact()
    {
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        $hoten = $_POST['hoten'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $this->load->model("mcontact");
        $this->mcontact->insertContact($tieude, $noidung, $hoten, $mail, $phone);
    }
    public function insertEmail()
    {
        $fullname = $_POST['name'];
        $mail = $_POST['mail'];
        $this->load->model('memail');
        $this->memail->insertEmail($fullname, $mail);
    }
}