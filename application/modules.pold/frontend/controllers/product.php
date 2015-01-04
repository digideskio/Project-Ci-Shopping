<?php
// Controller dùng cho việc xử lý liên quan đến sách
// class Product kế thừa của class User_Controller nằm tại thư mục core
class Product extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("text");
    }
    // Action in ra thông tin của 1 quyển sách
    public function index()
    {
    	//Khởi tạo session
        session_start();
        //Khởi tạo thời gian mặc định
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //Lấy id của sách 
        $bookid= $this->uri->segment(1);
        // Lấy thông tin của sách dựa vào id
        $data['book'] = $this->Mbook->book($bookid);
        // Lấy thông tin của thể loại của sách
        $data['parent_cate'] = $this->Mcate->showParentCate($data['book']['book2_category_parent_id']);
        //Lấy các sách cùng thể loại với sách đang xem
        $data['book_more'] = $this->Mbook->showookByparentid($data['book']['book2_book_cate']);
        //Lấy danh sách các thể loại sách
        $data['cate']= $this->Mcate->listAll();
        //Tiêu đề của trang
        $data['title'] = $data['book']['book2_book_name'];
        //Template của action này
        $data['template'] = 'product_index';
        //Phần xử lý viết nhận xét
        //Điều kiện nếu sách này có tồn tại trong csdl
    	if($this->Mbook->showBookbyId($bookid)!=FALSE){
            //Nếu có thực hiện hành động submit nhận xét thì sẽ xử lý các công việc sau
            if(isset($_POST['submit']))
            {
                //Nếu chưa đăng  nhập sẽ được thông báo
                if(!isset($this->session->userdata['customerid']))
                {
                    $data['error'][] = 'Chưa đăng nhập. Vui lòng thử lại.';
                }else // Ngược lại đã đăng nhập
                {
                    // Nếu để trống tiêu đề của nhận xét sẽ thông báo ngược lại sẽ gán giá trị của tiêu đề vào biến name
                    if(empty($this->input->post("name")))
                    {
                        $data['error'][] = 'Tiêu đề của nhận xét không được  để trống.';
                    }else
                    {
                        $name = $this->input->post("name");
                    }
                    // Nếu để trống nội dung của nhận xét sẽ thông báo ngược lại sẽ gán nội dung thông báo vào biến comment
                    if(empty($this->input->post("comment")))
                    {
                        $data['error'][] = 'Nội dung của nhận xét không được  để trống.';
                    }else
                    {
                        $comment = $this->input->post("comment");
                    }
                    // Nếu chưa nhập mã capcha sẽ thông báo, nếu nhập mã capcha không đúng cũng sẽ được thông báo ngược lại sẽ gán mã capcha vào bién capcha
                    if(empty($this->input->post("capcha")))
                    {
                        $data['error'][] = 'Mã xác nhận không được  để trống.';
                    }elseif($this->input->post("capcha") != $_SESSION["security_code"])
                    {
                        $data['error'][] = 'Mã xác nhận không chính xác.';
                    }
                    else
                    {
                        $capcha = $this->input->post("capcha");
                    }
                    // Xét điều kiện nếu tồn tại các biến name, comment, capcha thì sẽ xử lý insert  nhận xét vào csdl
                    if(isset($name) && isset($comment) && isset($capcha))
                    {
                        // Khởi tạo một mảng để chứa thông tin của nhận xét
                        $data_comment = array(
                            "book2_comment_name" => $name,// Gán tên nhận xét
                            "book2_comment_comment" => $comment, //Gán nội dung nhận xét
                            "book2_comment_customer_id" => $this->session->userdata['customerid'], // Gán id của người nhận xét
                            "book2_comment_customer_fullname" => $this->session->userdata['customername'],//Gán tên của người nhận xét
                            "book2_comment_book_id" => $bookid,//Gán id của sách được nhận xét
                            "book2_comment_date" => date("Y-m-d H:i:s"),//Gán thời gian của nhận xét
                            "book2_comment_book_name" => $data['book']['book2_book_name'],//Gán tên của sách được nhận xét
                            "book2_comment_book_cate_id" => $data['book']['book2_category_id'],//Gán id của thể loại của sách được nhận xét
                            "book2_comment_rating" => $this->input->post("star2"),//Gán giá trị của đánh giá sách
                            );
                        // Insert nhận xét vào csdl
                        $this->Mcomment->insert($data_comment);
                        // Update trường book2_book_vote của sách đang xem 
                        $where = array(
                            "book2_book_id" => $bookid// Gán id của sách
                            );
                        $data_rating = array(
                                "book2_book_vote" => $this->input->post("star2")+$data['book']['book2_book_vote']//+ thêm giá trị đánh giá của sách sau khi được nhận xét
                            );
                        $this->Mbook->update($data_rating, $where);
                        // Thông báo gửi nhận xét thành công
                        $data['success'][] = 'Gửi nhận xét thành công.';
                    }///
                }
            }

	    	//Tải nội dung các option của khung tìm kiếm
            $data['searchoption'] = $this->Msearch->listAll();
            //Load view
	        $this->load->view("layout",$data);
	    }else{
            // Chuyển đến trang đăng nhập nếu chưa đang nhập
	    	header("location:".base_url().'frontend/page_error');
            exit();
	    } 
        //Kết thúc điều kiện 
    }
    //Kết thúc action
    //Action in ra những sách thuộc cùng một thể loại  
    public function category()
    {
        // Khởi tạo  chế độ hiện thị của các sách ở dạng danh sách hay lưới, mặc định là chế độ xem danh sách
         if(isset($_GET['mode']))
        {
             $data['view'] = $_GET['mode'];
         }else
        {
            $data['view'] = "list"; 
        }
        //Kết thúc
        //Cấu hình phân trang hiển thị
        $this->load->library('pagination'); 
        $id= $this->uri->segment(4);
        $category = $this->Mcate->checkIssetcatebyId($id);
        //
        $config['base_url']   = base_url(). "frontend/product/category/".$id."/";
        $config['total_rows'] = $this->Mbook->count_allBycateid($id);
        $config['per_page']   = 8;
        $config['uri_segment'] = 5; // xác định segment chứa page number
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>'; 
        $this->pagination->initialize($config);            
        $start = $this->uri->segment(5);
        $this->load->library("pagination",$config);
        $data['link'] = $this->pagination->create_links();
        $data['book'] = $this->Mbook->listallByCateid($config['per_page'],$start, $id);
        //Kết thúc cấu hình phân trang
        $data['cate']= $this->Mcate->listAll();
        $data['title'] = $category['book2_category_name'];
        $data['template'] = 'product_category';
        $data['searchoption'] = $this->Msearch->listAll();
        $this->load->view("layout",$data); 
    }
    //Kết thúc action
    //Bắt đầu action hiển thị các sách thuộc mới nhất, hay nhất, bình chọn nhiều nhất
     public function listproduct()
    {
        //Khởi tạo chế độ xem 
        if(isset($_GET['mode']))
        {
             $data['view'] = $_GET['mode'];
         }else
        {
            $data['view'] = "list"; 
        }
        //
        // Lấy action hiện tại 
        $action= $this->uri->segment(1);
        // Rẽ nhánh các action tương ứng với mới nhất, bình chọn nhiều nhất, hay nhất (thuê nhiều nhất)
        switch ($action) {
            case 'new':
                // Lấy các sách mới nhất
                 $data['product'] = $this->Mbook->product("book2_book_id");
                 $data['title'] = 'Sách mới cập nhật';
                break;
            case 'rating':
                //Lấy các sách được bình chọn nhiều  nhất
                 $data['product'] = $this->Mbook->product("book2_book_vote");
                 $data['title'] = 'Sách được bình chọn nhiều nhất';
                break;
            case 'hay':
                //Lấy các sách được thuê nhiều nhất
                 $data['product'] = $this->Mbook->product("book2_book_qty2");
                 $data['title'] = 'Sách được thuê nhiều nhất';
                break;
            default:
                # code...
                break;
        }
        //Kết thúc rẽ nhánh
        $data['cate']= $this->Mcate->listAll();
        $data['template'] = 'product_list';
        $data['searchoption'] = $this->Msearch->listAll();
        $this->load->view("layout",$data); 
    }
    //Kết thúc action
    //Action lấy các sách tương ứng với từ khóa tìm kiếm
    public function search()
    {
        // tương ứng với trường tương ứng của table book2_book trong csdl
        $data['keytype']= $keytype = $_GET['keytype'];
        // Từ khóa đã nhập vào để tìm kiếm
        session_start();
        if(!isset($_SESSION['key']))
        {
            $_SESSION['key'] = $_GET['search'];
        }
        $data['product'] = $_SESSION['key'];
        //Chế độ xem của các sách
        if(isset($_GET['mode']))
        {
             $data['view'] = $_GET['mode'];
         }else
        {
            $data['view'] = "list"; 
        }
        //Cấu hình phân trang cho trang hiển thị các sách được tìm kiếm có kết  quả
        $this->load->library('pagination'); 
        //
        $config['base_url']   = base_url(). "frontend/product/search?keytype=".$keytype."&search=".$_SESSION['key']."/";
        $config['total_rows'] = $this->Mbook->count_allSearch($keytype, $_SESSION['key']);
        $config['per_page']   = 8;
        $config['uri_segment'] = 5; // xác định segment chứa page number
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>'; 
        $this->pagination->initialize($config);            
        $start = $this->uri->segment(5);
        $this->load->library("pagination",$config);
        $data['link'] = $this->pagination->create_links();
        $data['book'] = $this->Mbook->listallSearch($config['per_page'],$start, $keytype, $_SESSION['key']);
       //Kết thúc cấu hình phân trang
        $data['cate']= $this->Mcate->listAll();
        $data['title'] = 'Các kết quả tìm kiếm cho : '.$_SESSION['key'];
        $data['template'] = 'product_search';
        $data['searchoption'] = $this->Msearch->listAll();
        $this->load->view("layout",$data); 
        
    }
    //Kết thúc action
}