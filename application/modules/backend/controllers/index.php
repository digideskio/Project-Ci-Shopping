<?php

class Index extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    //Load view tuong ung
    public function index() {
        //set default timezone
        date_default_timezone_set("Asia/Saigon");
        $datelogin = date('l jS \of F Y h:i:s A');
        //get ip address
        $ipaddress = 'UNKNOWN';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        if (isset($_SESSION['login'])) {
            $sessUser = $_SESSION['login'];
        } else {
            $sessUser = 0;
        }
        switch ($sessUser) {
            case 0:
                if (isset($_POST['data'])) {
                    $u = $_POST['data']['email'];
                    $p = $_POST['data']['password'];
                    $this->load->model("muser");
                    $check = $this->muser->checkUser($u, $p);
                    if ($check != "false") {
                        $_SESSION['userid'] = $check;
                        $_SESSION['login'] = 1;
                        $this->load->model('loguser');
                        $this->loguser->insertLoguser($check['userid'], $datelogin, $ipaddress);
                    } else {
                        echo "false";
                    }
                } else {
                    $view = array(
                        "page" => "login",
                        "title" => "IT Shop",
                    );
                    $this->load->view("layout", $view);
                }
                break;
            case 1:
                $params = $_SERVER['REQUEST_URI'];
                $param = explode('/', $params);
                $actions = $param[count($param) - 1];
                if ($actions == "index") {
                    $getAction = '';
                } else {
                    $action = explode('?', $actions);
                    $getAction = $action['1'];
                }

                switch ($getAction) {
                    case '':
                        $this->load->model("muser");
                        $pass = $this->muser->checkDefaultPass($_SESSION['userid']['userid']);
                        if ($pass['password'] == '123456') {
                            header("location:" . base_url() . "backend/index?profile");
                            exit();
                        } else {
                            $view = array("title" => "Admin control panel",
                                "page" => "index",);
                            $this->load->view("layout", $view);
                        }
                        break;
                    case 'user':
                        $this->load->model("muser");
                        $view = array(
                            "page" => "user",
                            "title" => "Quản lý thành viên",
                            "listuser" => $this->muser->listAll(),
                        );
                        $this->load->view("layout", $view);
                        break;
                    case 'product':
                        $this->load->model('mproduct');
                        $view = array(
                            "page" => "product",
                            "title" => "Quản lý sản phẩm",
                            "listtype" => $this->mproduct->listType(),
                            "listcate" => $this->mproduct->listCate(),
                            "listcom" => $this->mproduct->listCom(),
                            "listproduct" => $this->mproduct->listProduct(),
                        );
                        $this->load->view("layout", $view);
                        break;
                    case "profile":
                        $view = array(
                            "page" => "profile",
                            "title" => "Trang cá nhân",
                        );
                        $this->load->view("layout", $view);
                        break;
                    case "newarticle":
                        $view = array(
                            "page" => "newarticle",
                            "title" => "Tạo bài viết mới",
                        );
                        $this->load->view("layout", $view);
                        break;
                    case "article":
                        $this->load->model('marticle');
                        $view = array(
                            "page" => "listarticle",
                            "title" => "Quản  lý bài viết",
                            "listarticle" => $this->marticle->listAll(),
                        );
                        $this->load->view("layout", $view);
                        break;
                    case "editarticle":
                        $id = $_SESSION['article'];
                        $this->load->model('marticle');
                        $view = array(
                            "page" => "editarticle",
                            "title" => "Chỉnh sửa bài viết ",
                            "article" => $this->marticle->articleById($id),
                        );
                        $this->load->view("layout", $view);
                        break;
                    case "allpage":
                        $this->load->model('mpage');
                        $view = array(
                            "page" => "allpage",
                            "title" => "Quản lý trang ",
                            "mpage" => $this->mpage->listAll(),
                        );
                        $this->load->view("layout", $view);
                        break;
                    default:
                        $view = array(
                            "page" => "error",
                            "title" => "Trang này không tồn tại",
                        );
                        $this->load->view("layout", $view);
                        break;
                }
                break;
            default :
                break;
        }
    }

    //Xu ly
    public function action() {
        $params = $_SERVER['REQUEST_URI'];
        $param = explode('/', $params);
        $action = explode("?", $param[count($param) - 1]);
        switch ($action['1']) {
            case 'logout':
                unset($_SESSION['userid']);
                unset($_SESSION['login']);
                header('Location:' . base_url() . 'backend/index');
                break;
            case 'image':
                //Các Mimes quản lý định dạng file
                $mimes = array(
                    'image/jpeg', 'image/png', 'image/gif'
                );
                sleep(2);
                if (isset($_FILES['myfile'])) {
                    $fileName = $_FILES['myfile']['name'];
                    $fileType = $_FILES['myfile']['type'];
                    $fileError = $_FILES['myfile']['error'];
                    $fileStatus = array(
                        'status' => 0,
                        'message' => ''
                    );
                    if ($fileError == 1) { //Lỗi vượt dung lượng
                        $fileStatus['message'] = 'Dung lượng quá giới hạn cho phép';
                    } elseif (!in_array($fileType, $mimes)) { //Kiểm tra định dạng file
                        $fileStatus['message'] = 'Không cho phép định dạng này';
                    } else { //Không có lỗi nào
                        move_uploaded_file($_FILES['myfile']['tmp_name'], '././././upload/' . date('FYhisA') . $fileName);
                        $fileStatus['status'] = 1;
                        $fileStatus['message'] = "Bạn đã upload $fileName thành công";
                        $fileStatus['name'] = date('FYhisA') . $fileName;
                    }
                    echo json_encode($fileStatus);
                    exit();
                }
                break;
            case "product":
                $name = $_POST['name'];
                $info = $_POST['info'];
                $price = $_POST['price'];
                $type = $_POST['type'];
                $category = $_POST['category'];
                $img = json_decode($_POST['data']);
                $company = $_POST['com'];
                $quantily = $_POST['quan'];
                $this->load->model('mproduct');
                //echo str_replace('"','\"',json_encode($img));
                $this->mproduct->insertProduct($name, $info, $price, $type, $category, str_replace('"', '\"', json_encode($img)), $company, $quantily);
                break;
            case "editproduct":
                header('Content-Type: application/json');
                $id = $_POST['id'];
                $this->load->model('mproduct');
                $product = $this->mproduct->getProductById($id);
                echo json_encode($product);
                break;
            case "updateproduct":
                $id = $_POST['id'];
                $name = $_POST['name'];
                $info = $_POST['info'];
                $price = $_POST['price'];
                $type = $_POST['type'];
                $category = $_POST['category'];
                $img = json_decode($_POST['data']);
                $company = $_POST['com'];
                $quantily = $_POST['quan'];
                $this->load->model('mproduct');
                $this->mproduct->updateProductById($name, $info, $price, $type, $category, str_replace('"', '\"', json_encode($img)), $company, $quantily, $id);
                break;
            case "deleteproduct":
                $id = $_POST['id'];
                $this->load->model("mproduct");
                $this->mproduct->deleteProductById($id);
                break;
            case "profile1":
                $id = $_SESSION['userid']['userid'];
                $name = $_POST['name'];
                $com = $_POST['com'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $this->load->model("muser");
                $this->muser->updateUserInfo($name, $com, $phone, $address, $id);
                $check = $this->muser->checkIssetUserbyId($id);
                $_SESSION['userid'] = $check;
                break;
            case "profile2":
                $id = $_SESSION['userid']['userid'];
                $old = $_POST['old'];
                $pass = $_POST['pass'];
                $this->load->model('muser');
                $check = $this->muser->checkOldPass($old, $id);
                if ($check != 1) {
                    echo "false";
                } else {
                    $this->muser->updateUserPass($pass, $id);
                }
                break;
            case "newarticle":
                $id = $_SESSION['userid']['userid'];
                $title = $_POST['title'];
                $content = str_replace('"', '\"',($_POST['content']));
                $public = $_POST['public'];
                $img = json_decode($_POST['img']);
                $this->load->model('marticle');
                $this->marticle->insertArticle($title, $content, $public, $id, str_replace('"', '\"', json_encode($img)));
                break;
            case "articelbyid":
                header('Content-Type: application/json');
                $id = $_POST['id'];
                $_SESSION['article'] = $id;
                $this->load->model('marticle');
                echo json_encode($this->marticle->articlebyid($id));
                break;
            case "editarticle":
                $id = $_SESSION['article'];
                $title = $_POST['title'];
                $content = str_replace('"', '\"',($_POST['content']));
                $public = $_POST['public'];
                $img = json_decode($_POST['img']);
                $this->load->model('marticle');
                $this->marticle->editArticle($title, $content, $public, str_replace('"', '\"', json_encode($img)), $id);
                break;
            case "updatepage1":
                $content = str_replace('"', '\"',($_POST['content']));
                $this->load->model('mpage');
                $this->mpage->updateContact($content);
                break;
            case "updatepage2":
                $content = str_replace('"', '\"',($_POST['content']));
                $this->load->model('mpage');
                $this->mpage->updateAbout($content);
                break;
            default:
                # code...
                break;
        }
    }

}
