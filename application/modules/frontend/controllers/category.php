<?php
class Category extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
    	$com = 'all';
        $type = 'all';
        $bt1 = 'all';
        $bt2 = 'all';
        $off = 0;
        $curentPage = 1;
        $num = 20;
        if(isset($_GET['page']))
        {
            $off = $_GET['page']*$num;
            $curentPage = $_GET['page']+1;
        }
        if(isset($_GET['com']))
        {
            $com = $_GET['com'];
        }
        if(isset($_GET['type']))
        {
            $type = $_GET['type'];
        }
        if(isset($_GET['bt1']))
        {
            $bt1 = $_GET['bt1'];
        }
        if(isset($_GET['bt2']))
        {
            $bt2 = $_GET['bt2'];
        }
        $order = 'productid';
        $by = 'DESC';
        $orderby = 'DEFAULT';
        if(isset($_GET['dir']))
        {
            switch ($_GET['dir']) {
                case 'ASC':
                    $order = 'productname';
                    $by = 'ASC';
                    $orderby = 'ASC';
                    break;
                case 'DESC':
                    $order = 'productname';
                    $by = 'DESC';
                    $orderby = 'DESC';
                    break;
                case 'PRICEDESC':
                    $order = 'productprice';
                    $by = 'DESC';
                    $orderby = 'PRICEDESC';
                    break;
                case 'PRICEASC':
                    $order = 'productprice';
                    $by = 'DESC';
                    $orderby = 'PRICEASC';
                    break;
                default:
                    $order = 'productid';
                    $by = 'DESC';
                    $orderby = 'DEFAULT';
                    break;
            }
        }
        $cid = $this->uri->segment(2);
        $cid2 = explode("_", $cid);
        $cid3 = explode(".", $cid2['1']);
        $cid4 = str_replace("post", "", $cid3['0']);
        $cid5 = intval($cid4);
        $this->load->model("mproduct");
        $total = $this->mproduct->countProductByCategory($cid5);
        $totalPage = ceil($total/$num);
        $category = $this->mproduct->showCategory($cid5, $off, $order, $by, $com, $type, $bt1, $bt2);
        if($category != NULL)
        {
            $title = $category['0']['pcname'];
        }else
        {
            $title = 'Không có sản phẩm';
        }
       	$view = array(
            "title" => "IT Shop | ".$title,
            "listcate" => $this->mproduct->listCate(),
            "category" => $category,
            "listtype" => $this->mproduct->listType(),
            "listcompany" => $this->mproduct->showCompanyByCategory($cid5),
            "curent" => "Trang ".$curentPage." / ".$totalPage,
            "total" => $totalPage,
            "num" => $num,
            "curentpage" => $curentPage,
            "orderby" => $orderby,
            "com"=>$com,
            "type"=> $type,
        );
        $this->load->view("category", $view);
    }
    public function post()
    {
        $cid = $this->uri->segment(2);
        $cid2 = explode("_", $cid);
        $cid3 = explode(".", $cid2['1']);
        $cid4 = str_replace("post", "", $cid3['0']);
        $cid5 = intval($cid4);
        $this->load->model("mproduct");
        $product = $this->mproduct->getProductById($cid5);
        if($product != NULL)
        {
            $title = $product['productname'];
        }else
        {
            $title = "Không tồn tại sản phẩm";
        }
        $view = array(
            "title" => "IT Shop | ".$title,
            "listcate" => $this->mproduct->listCate(),
            "product" => $product,
            "listproduct" => $this->mproduct->listProduct(),
        );
        $this->load->view("product", $view);
    }
}