<?php
//Controller Customer xử lý các thao tác liên quan đến người dùng
class Customer extends User_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    //Action account xử lý các thao tác liên quan đến người sử dụng
    public function account()
    {
        //Tải danh sách các thể loại 
        $data['cate']= $this->Mcate->listAll();
        //Gán giá trị cho biến action
        $action= $this->uri->segment(4);
        //Rẽ nhánh thực hiện các action 
        switch ($action) {
            //Action xử lý việc đăng nhập của người dùng
            case 'login':
                //Nếu đã tồn tại việc đăng nhập sẽ chuyển đến trang chủ
                if(isset($this->session->userdata['customerid']))
                {
                     header("location:".base_url());
                     exit();
                }
                // Nếu chưa đăng nhập và tồn tại việc bấm submit đăng nhập thì sẽ thực hiện các công việc
                if(isset($_POST["submit"]))
                {
                    //Nếu để trống tên đăng nhập sẽ báo lỗi, ngược lại sẽ gán vào biến username
                    if(empty($this->input->post("username")))
                    {
                        $data['error'][] = 'Tài khoản không được để trống, vui lòng kiểm tra lại.';
                    }else
                    {
                        $username = $this->input->post("username");
                    }
                    //Nếu để trống mật khẩu sẽ báo lỗi, ngược lại sẽ được gán vào biến password
                    if(empty($this->input->post("password")))
                    {
                        $data['error'][] = 'Mật khẩu không được để trống, vui lòng kiểm tra lại.';
                    }else
                    {
                        $password = $this->input->post("password");
                    }
                    //Nếu tồn tại 2 biến username và password sẽ xử lý 
                    if(isset($username) && isset($password))
                        {
                            //Kiểm tra user có tồn tại trong  csdl hay không, nếu không tồn tại sẽ báo lỗi
                            if($this->Muser->checkUser($username, md5($password)) == FALSE)
                            {
                                $data['error'][] = 'Tài khoản hoặc mật khẩu không đúng, vui lòng kiểm tra lại.';
                            }
                            else
                            {
                                //Ngược lại sẽ gán các session và chuyển trang đến trang chủ
                                $user=$this->Muser->checkUser($username, md5($password));
                                //Gán session id của người đăng nhâp
                                $this->session->set_userdata("customerid", $user['book2_user_id']);
                                //Gán session tên của người đăng nhập
                                $this->session->set_userdata("customername", $user['book2_user_fullname']);
                                //Gán session số tiền hiện tại của người đăng nhập có
                                $this->session->set_userdata("customerpoint", $user['book2_user_point']);
                                //Chuyển đến trang chủ
                                header("location:".base_url());
                                exit();
                            }
                        }
                        //Kết thúc điều kiện
                }
                $data['title'] = 'Xrita | Đăng nhập';
                $data['template'] = 'customer_account_login';
                $data['searchoption'] = $this->Msearch->listAll();
                $this->load->view("layout",$data);  
                break;
            case 'logout': // Đăng xuất
                //Xóa session và chuyển đến trang chủ
                $this->session->unset_userdata('customerid');
                header("location:".base_url());
                exit();
            break;   
            case 'create': // Tạo mới tài khoản
                //Nếu tồn tại đăng nhập sẽ chuyển đến trang chủ
                if(isset($this->session->userdata['customerid']))
                {
                     header("location:".base_url());
                     exit();
                }
                //Nếu chưa đăng nhập và có tồn tại thực hiện tao tác submit sẽ xử lý
                if(isset($_POST["submit"]))
                {
                   //Nếu để trống các trường bắt buộc sẽ báo lỗi 
                   if(empty($this->input->post("username")))
                    {
                        $data['errorusername'] = 1;
                    }elseif($this->Muser->checkUsername($this->input->post("username"))==FALSE) {//Nếu tên tài khoản đã tồn tại báo lỗi
                        $data['errorusername2'] = 1;
                    }
                    else
                    {
                        $username = $this->input->post("username");
                    }
                    //Nếu mật khẩu để trống sẽ báo lỗi
                    if(empty($this->input->post("password1")))
                    {
                        $data['errorpassword1'] = 1;
                    }
                    // Nếu mật khẩu & nhập lại mật khẩu không giống nhau sẽ báo lỗi
                    elseif($this->input->post("password1") != $this->input->post("password2"))
                    {
                        $data['errorpassword2'] = 1;
                    }
                    else
                    {
                        $password = $this->input->post("password1");
                    }
                    //Nếu tên người dùng để trống sẽ báo lỗi 
                    if(empty($this->input->post("fullname")))
                    {
                        $data['errorfullname'] = 1;
                    }
                    else
                    {
                        $fullname = $this->input->post("fullname");
                    }
                    //Nếu email để trống sẽ báo lỗi
                    if(empty($this->input->post("email")))
                    {
                        $data['erroremail1'] = 1;
                    }
                    //Nếu định dạng sai email sẽ báo lỗi
                    elseif(!filter_var($this->input->post("email"),FILTER_VALIDATE_EMAIL))
                        $data['erroremail2'] = 1;
                    else
                    {
                        $email = $this->input->post("email");
                    }
                    //Nếu Số điện thoại để trống sẽ báo lỗi
                    if(empty($this->input->post("phone")))
                    {
                        $data['errorphone'] = 1;
                    }else
                    {
                        $phone = $this->input->post("phone");
                    }
                    //Nếu địa chỉ để trống sẽ báo lỗi
                    if(empty($this->input->post("address")))
                    {
                        $data['erroraddress'] = 1;
                    }else
                    {
                        $address = $this->input->post("address");
                    }
                    //Nếu tồn tại username, password, fullname, email, phone, address sẽ thực hiện insert vào csdl
                    if(isset($username) && isset($password) && isset($fullname) && isset($email) && isset($phone) && isset($address))
                    {
                        $data['success']=1;
                        // Gán tất cả thông tin vào một mảng
                        $user_data= array(
                                //Tên tài khoản
                                "book2_user_username" => $username,
                                //Mật khẩu
                                "book2_user_password" => md5($password),
                                //Địa chỉ email
                                "book2_user_email"    => $email,
                                //Số điện thoại
                                "book2_user_phone"    => $phone,
                                //Cấp độ thành viên mặc định là 0 tương ứng là member
                                "book2_user_level"    => 0,
                                //Trạng thái kích hoạt là 1
                                "book2_user_active"   => 1,
                                //Tên của ngươi dùng(thành viên)
                                "book2_user_fullname" => $fullname,
                                //Địa chỉ của thành viên
                                "book2_user_address"  => $address
                            );
                        //Insert vào csdl
                        $this->Muser->insert($user_data);
                    }
                }
                $data['title'] = 'Xrita | Tạo tài khoản khách hàng';
                $data['template'] = 'customer_account_create';
                $data['searchoption'] = $this->Msearch->listAll();
                $this->load->view("layout",$data); 
            break;
            //Tìm lại mật khẩu
            case 'forgotpassword':
            //Kiểm tra nếu có bấm nút tìm mật khẩu sẽ thực hiện xử lý
                if(isset($_POST["submit"]))
                {
                    //Nếu không nhập vào tên tài khoản sẽ báo  lỗi
                    if(empty($this->input->post("username")))
                    {
                        $data['error'][] = 'Tài khoản không được để trống, vui lòng thử lại.';
                    }else
                    {
                        $username = $this->input->post("username");
                    }
                    //Nếu  không nhập vào email sẽ báo lỗi
                    if(empty($this->input->post("email")))
                    {
                        $data['error'][] = 'Địa chỉ email không được để trống, vui lòng thử lại.';
                    }
                    //Nếu nhập vào email không hợp lệ sẽ báo  lỗi
                    elseif(!filter_var($this->input->post("email"),FILTER_VALIDATE_EMAIL))
                        $data['error'][] = 'Địa chỉ email không hợp lệ, vui lòng thử lại.';
                    else
                    {
                        $email = $this->input->post("email");
                    }
                    //Nếu tồn tại các biến username, email sẽ xử lý
                    if(isset($username) && isset($email))
                    {
                        //Kiểm tra tên tài khoản và email có tồn tại trong csdl không. Nếu không sẽ báo lỗi
                        if($this->Muser->forgot($username, $email) == FALSE)
                        {
                            $data['error'][]='Tài khoản hoặc địa chỉ email không đúng, vui lòng thử lại.';
                        }else
                        {
                            //Tạo mật khẩu mới ngẫu nhiên
                            $md5_hash = md5(rand(0,999));
                            $pass = substr($md5_hash, 15, 5);
                            //Gán mật khẩu mới được mã hóa vào mảng
                            $newpass= array("book2_user_password" => md5($pass));
                            //Điều kiện để update cho user
                            $where = array("book2_user_username" => $username );
                            //Thực hiện update mật khẩu mới cho người dùng
                            $this->Muser->update($newpass, $where);
                            //Tải thư viện gửi google mail
                            $this->load->library(array("email","my_email"));
                            //Nội dung mail và địa chỉ nhận mail
                            $mail = array(
                                        "to_receiver"   => $email, 
                                        "message"       => 'Tài khoản '.$username.' có mật khẩu mới là : '.$pass,  
                                    );
            
                            $this->my_email->config($mail);  // thiết lập cấu hình mail
                            $this->my_email->sendmail();    // gửi mail
                            //Thông báo cập nhật mật khẩu mới thành công
                            $data['success'][]='Bạn vui lòng truy cập vào email để kiểm tra mật khẩu mới.';
                        }
                    }
                }
                $data['title'] = 'Xrita | Quên mật khẩu';
                $data['template'] = 'customer_account_forgotpassword';
                $data['searchoption'] = $this->Msearch->listAll();
                $this->load->view("layout",$data); 
            break;
            //Trang thông tin cá nhân của thành viên
            case 'profile':
            //Kiểm tra nếu chưa đăng nhập sẽ chuyển về trang đăng nhập
                if($this->session->userdata['customerid']){
                //Gán giá trị cho biến id là session id của thành viên sau khi đăng nhập    
                $id= $this->session->userdata['customerid'];
                //$id=$id= $this->uri->segment(5);
                $where =  array(
                        "book2_user_id" => $id
                    );
                //Lấy thông tin của thành viên dựa vào id
                //Nếu không tồn tại sẽ báo lỗi
                if($this->Muser->checkIssetUserbyId($id) == FALSE)
                {
                    echo 'Thành viên này không tồn tại.';
                }
                //Ngược lại sẽ hiển thị ra kết quả
                else
                {
                     //Nếu có bấm submit thì sẽ xử lý
                     if(isset($_POST['submit']))
                     {
                        //Nếu không để trống mật khẩu mới
                        if(!empty($this->input->post("password1")))
                        {
                            //Nếu để trống mạt khẩu cũ sẽ báo lỗi
                            if(empty($this->input->post("password")))
                            {
                                $data['errorpassword']=1;
                            }
                            //Nếu mật khẩu mới và nhập lại mật khẩu mới không chính xác sẽ báo lỗi
                            elseif($this->input->post("password1") != $this->input->post("password2"))
                            {
                                $data['errorpassword2'] =1;
                            }
                            //Gán giá trị vào biến password
                            else
                            {
                                $password = $this->input->post("password1");
                            }
                        }
                        //Nếu để trống tên người dùng sẽ báo lỗi
                        if(empty($this->input->post("fullname")))
                        {
                            $data['errorfullname'] = 1;
                        }
                        //Gán giá trị vào biến fullname
                        else
                        {
                            $fullname = $this->input->post("fullname");
                        }
                        //Nếu để trống email sẽ báo lỗi
                        if(empty($this->input->post("email")))
                        {
                            $data['erroremail1'] = 1;
                        }
                        //Nếu email không hợp lệ sẽ báo lỗi
                        elseif(!filter_var($this->input->post("email"),FILTER_VALIDATE_EMAIL))
                        {
                            $data['erroremail2'] =1;
                        }
                        //Gán giá trị vào biến email
                        else
                        {
                            $email= $this->input->post("email");
                        }
                        //Nếu số điện thoại để trống sẽ báo lỗi
                        if(empty($this->input->post("phone")))
                        {
                            $data['errorphone'] =1;
                        }
                        //Nếu số điện thoại nhập phải sai định dạng sẽ báo lỗi
                        elseif (!is_numeric($this->input->post("phone"))) {
                            $data['errorphone1'] =1;
                        }
                        //Gán giá trị cho biến phone
                        else
                        {
                            $phone = $this->input->post("phone");
                        }
                        //Nếu để trống địa chỉ sẽ báo lỗi
                        if(empty($this->input->post("address")))
                        {
                            $data['erroraddress'] =1;
                        }
                        //Gán giá trị cho biến address
                        else
                        {
                            $address = $this->input->post("address");
                        }
                        //Nếu tồn tại fullname, email, phone, address sẽ xử lý
                        if(isset($fullname) && isset($email) && isset($phone) && isset($address))
                        {
                            //Dùng mảng để lưu thông tin của thành viên ( không cập nhật mật khẩu mới)
                            $data_input = array(
                                    //Tên người dùng
                                    "book2_user_fullname" => $fullname,
                                    //Email người dùng
                                    "book2_user_email" => $email,
                                    //Số điện thoại người dùng
                                    "book2_user_phone" => $phone,
                                    //Địa chỉ người dùng
                                    "book2_user_address" => $address,
                                );
                            //Thông báo  cập nhật thông tin người dùng thành công
                            $data['success']=1;
                            //Cập nhật thông tin người dùng vào csdl
                            $this->Muser->update($data_input, $where);
                        }
                        //Nếu có cập nhật mật khẩu mới
                        //Nếu tồn tại biến password
                        if(isset($password)){
                            //Kiểm tra nếu mật khẩu cũ sai sẽ báo  lỗi
                            if($this->Muser->checkOldpass(md5($this->input->post("password")), $id) == FALSE)
                            {
                                $data['error'] = 1;
                            }
                            //Nếu mật khẩu cũ đúng sẽ xử lý
                            else
                            {
                                //Gán mật khảu mới vào mảng
                                $data_input = array(
                                        "book2_user_password" => md5($password)
                                    );
                                //Thông báo cập nhật mạt mới thành công
                                $data['success1'][]=1;
                                //Update mật khẩu mới vào csdl
                                $this->Muser->update($data_input, $where);
                            }
                        }

                     }
                     $data['user'] = $this->Muser->checkIssetUserbyId($id);
                     $data['title'] = 'Xrita | Thông tin tài khoản';
                     $data['template'] = 'customer_account_profile';
                     $data['searchoption'] = $this->Msearch->listAll();
                     $this->load->view("layout",$data);
                     //Kết thúc thông tin người dùng
                }
            }else
            {
                header("location:".base_url().'frontend/customer/account/login');
                exit();
            }
            break;
            default:
                # code...
                break;
        }
        //Kết thúc rẽ nhánh
    }
    //Action xử lý thông tin lịch sử thuê sách cua người dùng
    public function payment()
    {
        // Load thư  viện phận trang
        $this->load->library('pagination'); 
        $action = $this->uri->segment(4);
        switch ($action) {
            // Xem các sách đã thuê của người dùng
            case 'book':
            //Kiểm tra nếu không có đăng nhập sẽ chuyển đến trang đăng nhập
              if($this->session->userdata['customerid']){
                //Cấu hình phân trang và lấy dữ liệu
                $config['base_url']   = base_url(). "frontend/customer/payment/book";
                $config['total_rows'] = $this->Mbilldetail->count_all($this->session->userdata['customerid']);
                $config['per_page']   = 10;
                $config['uri_segment'] = 5; // xác định segment chứa page number
                $config['full_tag_open'] = '<p>';
                $config['full_tag_close'] = '</p>'; 
                $this->pagination->initialize($config);            
                $start = $this->uri->segment(5);
                $this->load->library("pagination",$config);
                $data['pagination'] = $this->pagination->create_links();
                $data['info'] = $this->Mbilldetail->listall($config['per_page'],$start, $this->session->userdata['customerid']);
                $data['template'] = 'customer_payment';
                }else
                {
                    header("location:".base_url().'frontend/customer/account/login');
                    exit();
                }
            break;
            //Xem danh sách các hóa đơn thuê sách của khách hàng
            case 'bill':
                //Kiểm tra đăng nhập của người dùng
                if($this->session->userdata['customerid']){
                //Cấu hình phân trang
                $config['base_url']   = base_url(). "frontend/customer/payment/book";
                $config['total_rows'] = $this->Mbill->count_all($this->session->userdata['customerid']);
                $config['per_page']   = 10;
                $config['uri_segment'] = 5; // xác định segment chứa page number
                $config['full_tag_open'] = '<p>';
                $config['full_tag_close'] = '</p>'; 
                $this->pagination->initialize($config);            
                $start = $this->uri->segment(5);
                $this->load->library("pagination",$config);
                $data['pagination'] = $this->pagination->create_links();
                $data['info'] = $this->Mbill->listall($config['per_page'],$start, $this->session->userdata['customerid']);
                $data['template'] = 'customer_bill';
                }else
                {
                    header("location:".base_url().'frontend/customer/account/login');
                    exit();
                }
            break;
            // Thông tin chi tiết của hóa đơn
            case 'detail':
            //Kiểm tra đăng nhập
                if($this->session->userdata['customerid']){
                    //Load các option của select box  thêm thời gian thuê sách
                    $data['addtime'] = $this->Maddtime->listAll();
                    //Mã hóa đơn
                    $code = $this->uri->segment(5);
                    // Kiểm tra nếu có hóa đơn thì hiển thị ra thông tin chi tiết c ủa hóa đơn đó
                    if($this->Mbilldetail->detail($code)!=FALSE)
                    {
                        //Thông tin chi tiết của hóa đơn
                        $data['detail'] = $this->Mbilldetail->detail($code);
                        //Nếu tồn tại submit thêm thời gian thuê sách thì xử lý
                        if(isset($_POST['submit-addtime']))
                        {
                            //Nếu sách chưa được giao cho khách hàng thì không thể xử lý nên báo lỗi
                            if($this->input->post("status") == 0){
                                $data['error'][] = 'Sách chưa nhận nên không thể gia hạn được.';
                            }
                            //Thời hạn  thuê sách đã hết nên không thể thực hiện gia hạn nên báo lỗi
                            elseif($this->input->post("status") == 2)
                            {
                                $data['error'][] = 'Sách đã trễ hạn trả nên không thể gia hạn được. Vui lòng nhanh chóng trả sách và thanh toán tiền phạt.';
                            }
                            //Sách đã trả rôi nên không thể gia hạn
                            elseif($this->input->post("status") == 3)
                            {
                                $data['error'][] = 'Sách đã trả nên không thể gia hạn được.';
                            }
                            // Xử lý sách đã giao nhưng không thuộc các trường hợp trên
                            elseif($this->input->post("status") == 1)
                            {
                                //Tổng số tiền cho việc gia hạn hóa đơn
                                $price  = $this->input->post("addtime")*$this->input->post("qty")*(1000);
                                //Lấy thông tin của khách hàng
                                $user=$this->Muser->checkIssetUserbyId($this->session->userdata['customerid']);
                                //Nêu số tiền của khách hàng lớn hơn số tiền để gia hạn mới thực hiện được việc gia hạn hóa đơn
                                if($user['book2_user_point'] >= $price){
                                    $user_where = array(
                                        "book2_user_id" => $this->session->userdata['customerid']
                                        );
                                    $update_user = array(
                                        "book2_user_point" => $user['book2_user_point']-$price// Số tiền còn lại sau khi trừ số tiền để gia hạn
                                        );
                                    //Cập nhật thông tin khách hàng sau khi gia hạn thành  công
                                    $this->Muser->update($update_user, $where);
                                    $bill_where = array(
                                        "book2_bill_code" => $code 
                                        );
                                    $date = $this->input->post("end");
                                    //Cong them ngay sau khi gia han thanh cong
                                    $new_date = strtotime ( '+'.$this->input->post("addtime").' day' , strtotime ( $date ) ) ;
                                    $new_date = date ( 'Y-m-j' , $new_date );
                                    //
                                    $bil_update = array(
                                        "book2_bill_bonus" => $data['detail']['book2_bill_bonus']+$price, // + thêm Số tiền gia hạn vào 
                                        "book2_bill_date_end" => $new_date // ngày kết thúc hóa đơn
                                        );
                                    // Cập nhật thêm ngày thuê sách cho hóa đơn được gia hạn thành công
                                    $this->Mbill->update($bil_update, $bill_where);
                                    //Thông báo gia hạn hóa đơn thành công
                                    $data['success'][] = 'Gia hạn hóa đơn thành công.';
                                }else // Báo lỗi số tiền của người dùng không đủ để gia hạn hóa đơn
                                {
                                    $data['error'][] = 'Số dư trong tài khoản không đủ để thực hiện. Vui lòng nạp thêm.';
                                }
                            }
                        }
                        $data['template'] = 'customer_payment_detail';
                    }
                }else{
                    header("location:".base_url().'frontend/customer/account/login');
                    exit();
                }
            break;
            default:
                # code...
            break;
            //Kết thúc rẽ nhánh
        }
        $data['cate']= $this->Mcate->listAll();
        $data['title'] = 'Lịch sử giao dịch';
        $data['searchoption'] = $this->Msearch->listAll();
        $this->load->view("layout",$data);            
    }
    // Action xử lý việc nạp thêm tiền cào tài khoản của người dùng thông qua ngân lượng
    public function nganluong()
    {
        session_start();
        //Kiểm tra đăng nhập
        if($this->session->userdata['customerid']){
        $action = $this->uri->segment(4);
        switch ($action) {
                //Hiển thị nội dung của trang nạp tiền
                case 'add':
                    $data['action'] = 'add';
                    break;
                //Hiển thị nội dung của trang xác nhận nạp tiền
                case 'return':
                    $data['action'] = 'return';
                    //Số tiền mà người dùng muốn nạp vào
                    $_SESSION['price'] = $_POST['price'];
                    //Tạo mã code ngẫu nhiên cho việc xác  nhận nạp tiền
                    $md5_hash = md5(rand(0,999));
                    $security_code = substr($md5_hash, 15, 5);
                    $_SESSION["page"] = $security_code;
                break;
                //Sau khi nạp tiền  thành công từ ngân lượng sẽ chuyển về trang này
                //Gửi các thông tin vào url
                case 'ok':
                    header("location:".base_url().'frontend/customer/nganluong/success?price='.$_GET['success'].'&verity='.$_SESSION["page"]);
                    exit();
                    break;
                // Cộng thêm tiền vào tài khoản người dùng
                case 'success':
                //Nếu tồn tại  và thỏa mãn các điều kiện về số tiền, mã ngẫu nhiên sẽ thực hiện thao tác  thêm tiền cho tài khoản người dùng
                    if(isset($_SESSION["page"]) && isset($_GET['verity']) && isset($_GET['success']) && ($_GET['verity'] == $_SESSION["page"]) && ($_GET['success'] == $_SESSION['price']))
                    {
                        //Thông báo thành công
                        $data['action'] = 'success';
                        //Xác định người dùng được nạp thêm
                        $where = array("book2_user_id" => $this->session->userdata['customerid']);
                        //Cộng thêm tiền đã nạp vào tài khoản người dùng
                        $input = array("book2_user_point" => $this->session->userdata("customerpoint")+$_SESSION['price'] );
                        //Cập nhật tiền đã nạp thêm vào tài khoản người dùng
                        $this->Muser->update($input, $where);
                        //Hủy session mã ngẫu nhiên
                        session_unset('page');
                    }else
                    {
                        // báo lỗi do người dùng can thiệp
                        $data['action'] = 'error';
                        //Hủy session mã ngẫu nhiên
                        session_unset('page');
                    }
                break;

                default:
                    # code...
                break;
                //Kết thúc rẽ nhánh
            }  
        $data['template'] = 'customer_account_nganluong';
        $data['title'] = 'Nạp tiền vào tài khoản';  
        $data['cate']= $this->Mcate->listAll();
        $data['searchoption'] = $this->Msearch->listAll();
        $this->load->view("layout",$data); 
        }else
        {
            header("location:".base_url().'frontend/customer/account/login');
            exit();
        }
    }
    //kết thúc action
}