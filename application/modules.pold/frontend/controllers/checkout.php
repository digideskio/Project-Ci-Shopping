<?php
//Controller Checkout xử lý thao tác giở hàng của khách hàng
class Checkout extends User_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    //Action xử lý thêm một sản phẩm vào giỏ hàng
    public function cart()
    {
    	//Kiểm tra nếu thực sự có submit thêm vào giỏ hàng
        if(isset($_POST['checkout']))
    	{
    		//Id của sách
            $bookid= $this->input->post("bookid");
            //Hình ảnh của sách
    		$bookimage= $this->input->post("bookimage");
            //Tên của sách
    		$bookname=$this->input->post("bookname");
            //Giá bìa của sách
    		$bookprice1=$this->input->post("bookprice1");
            //Giá thuê của sách
    		$bookprice2=$this->input->post("bookprice2");
            //Dùng mảng để lưu các thông  tin trên
            $data_cart = array(
               'id'      => $bookid,
               'qty'     => "1",
               'price'   => $bookprice2,
               'name'    => $bookname,
               'options' => array('image' => $bookimage, 'price1' => $bookprice1)
            );
            if($this->cart->total_items() <5){
                //Thêm sản phẩm vào giỏ hàng
                $this->cart->insert($data_cart);
                //Thông báo thêm thành công
        	    $data['success'][] = 'Thêm thành công '.$bookname.' vào giỏ hàng.'; 
            }else
            {
                $data['error'][] = 'Giỏ hàng chỉ chứa tối đa 5 sản phẩm. Vui lòng thanh toán giỏ hàng để tiếp tục chọn sản phẩm.';
            }
    	}
        //Cập nhật số lượng từng sản phẩm của giỏ hàng
        if(isset($_POST['update-cart']))
        {
            //Sản phẩm thứ nhất
            $rowid1 = $this->input->post("rowid1");
            $data_update1 = array(
                //rowid của sản phẩm
               'rowid' => $rowid1,
               //Số lượng của sản phẩm 
               'qty'   => $this->input->post("qty1")
            );
            //Cập nhật lại số lượng của sản phẩm
            $this->cart->update($data_update1);
            //Sản phẩm thứ  hai
            if($this->input->post("rowid2"))
            {
                $rowid2 = $this->input->post("rowid2");
                $data_update2 = array(
               'rowid' => $rowid2,
               'qty'   => $this->input->post("qty2")
            );
            $this->cart->update($data_update2);
            }
            //Sản phẩm thứ ba
            if($this->input->post("rowid3"))
            {
                $rowid3 = $this->input->post("rowid3");
                $data_update3 = array(
               'rowid' => $rowid3,
               'qty'   => $this->input->post("qty3")
            );
            $this->cart->update($data_update3);
            }
            //Sản phẩm thứ tư
            if($this->input->post("rowid4"))
            {
                $rowid4 = $this->input->post("rowid4");
                $data_update4 = array(
               'rowid' => $rowid4,
               'qty'   => $this->input->post("qty4")
            );
            $this->cart->update($data_update4);
            }
            //Sản phẩm thứ năm
            if($this->input->post("rowid5"))
            {
                $rowid5 = $this->input->post("rowid5");
                $data_update5 = array(
               'rowid' => $rowid5,
               'qty'   => $this->input->post("qty5")
            );
            $this->cart->update($data_update5);
            }
            //Thông báo cập nhật giỏ hàng thành công
            $data['success'][] = 'Cập nhật giỏ hàng thành công.'; 
        }
        //Chức năng xóa 1 sản  phẩm của giỏ hàng
        if($this->uri->segment(4)){$action =$this->uri->segment(4);}else{$action="";}
        if($action=="delete"){
            //Lấy rowid của sản phẩm muốn xóa trong giỏ hàng
            $rowid = $this->uri->segment(5);
            $data_update = array(
               'rowid' => $rowid,
               'qty'   => 0
            );
            //Cập nhật lại sản phẩm có số lượng là 0 <=> xoa sản phẩm khỏi giỏ hàng
            $this->cart->update($data_update);
            //Thông báo xóa sản phẩm thành công
            $data['success'][] = 'Xóa sản phẩm thành công.';
            //header("location:".base_url().'frontend/checkout/cart');
            //exit();
        }
    	$data['cate']= $this->Mcate->listAll();
        $data['title'] = 'Giỏ hàng';
        $data['template'] = 'checkout_cart';
        $data['searchoption'] = $this->Msearch->listAll();
        $this->load->view("layout",$data); 
    }
    //Thực hiện thanh toán giỏ hàng
    public function onpage()
    {
        //Kiểm tra đăng nhập
        if($this->session->userdata['customerid']){
            //Kiểm tra nếu có tồn tại giỏ hàng
            if($this->cart->total_items()){
                //Nếu có thực hiện submit thanh toán giỏ hàng
            if(isset($_POST['submit-onpage']))
            {
                //Thông tin của khách hàng
            $user = $this->Muser->checkIssetUserbyId($this->session->userdata['customerid']);
                //Nếu số tiền của khác hàng >= số tiền thanh toán của giỏ hàng mới thao tác thực hiện thanh toán giở hàng
                if($user['book2_user_point'] >= $this->cart->total())
                {
                    //Nếu tên khách hàng không để trống thì báo lỗi
                    if(empty($this->input->post("fullname")))
                    {
                        $data['error'][] = 'Tên khách hàng không được để trống.';
                    }else
                    {
                        $fullname = $this->input->post('fullname');
                    }
                    //Nếu số điện thoại khách hàng để trống sẽ báo lỗi
                    if(empty($this->input->post("phone")))
                    {
                        $data['error'][] = 'Số điện thoại không được để trống.';
                    }
                    //Nếu số điện thoại không là số sẽ báo lỗi
                    elseif (!is_numeric($this->input->post("phone"))) {
                        $data['error'][] = 'Số điện thoại không đúng định dạng.';
                    }
                    else
                    {
                        $phone = $this->input->post('phone');
                    }
                    //Nếu để trống địa chỉ sẽ báo lỗi
                     if(empty($this->input->post("address")))
                    {
                        $data['error'][] = 'Địa chỉ giao hàng không được để trống.';
                    }else
                    {
                        $address = $this->input->post('address');
                    }
                    //Nếu tồn tại các điều kiện
                    if(isset($fullname) && isset($phone) && isset($address))
                    {
                        //Tạo mã hóa đơn ngẫu nhiên
                        $md5_hash = md5(rand(0,999));
                        $code = substr($md5_hash, 15, 5).gmdate('dmyhis');
                        $bill_input = array(
                            //Id của khách hàng
                                "book2_bill_customer_id" => $this->session->userdata['customerid'],
                            //Tên của khách hàng
                                "book2_bill_customer_fullname" => $fullname,
                             //Số điện thoại của khách hàng
                                "book2_bill_phone" => $phone,
                            //Địa chỉ của khách hàng
                                "book2_bill_address" => $address,
                             //Tổng tiền của giỏ hàng
                                "book2_bill_price1" => $this->cart->total(),
                             //Trạng thái của giỏ hàng
                                "book2_bill_status" => 0,
                             //Mã hóa đơn(giỏ hàng)
                                "book2_bill_code" => $code,
                             //Số lượng snả phẩm của giỏ hàng
                                "book2_bill_qty" => $this->cart->total_items()
                            );
                        //insert giở hàng vào csdl
                        $this->Mbill->insert($bill_input);
                        //Insert thông tin hóa đơn
                        foreach ($this->cart->contents() as $key) {
                            $book_detail = array(
                                //id của khách hàng
                            "book2_bill_detail_customer_id" => $this->session->userdata['customerid'],
                            //mã hóa đơn
                            "book2_bill_detail_bill_code" => $code,
                            //id của sách
                            "book2_bill_detail_book_id" => $key['id'],
                            //tên của sách
                            "book2_bill_detail_book_name" => $key['name'],
                            //giá thuê của sách
                            "book2_bill_detail_book_price1" => $key['price'],
                            ///hình ảnh của sách
                            "book2_bill_detail_book_image" => $key['options']['image'],
                            //giá bìa của sách
                            "book2_bill_detail_book_price2" => $key['options']['price1'],
                            //số lượng của 1 quyển sách
                            "book2_bill_detail_book_qty" => $key['qty']);
                            //inser thông tin hóa đơn vào csdl
                            $this->Mbilldetail->insert($book_detail);
                            //Lấy thông tin của 1 sách trong giỏ hàng
                            $book=$this->Mbook->book($key['id']);
                            $book_update=array(
                                //Số lượng sách đã thuê của 1 sách đó
                                    "book2_book_qty2" => $book['book2_book_qty2']+$key['qty']
                                );
                            $where = array("book2_book_id" => $key['id']);
                            //Cập nhật lại ssố lượng sách thuê của sáchđó
                            $this->Mbook->update($book_update,$where);
                        }
                        //hủy giỏ hàng
                        $this->cart->destroy();
                        header("location:".base_url().'frontend/checkout/cart');
                        exit();

                    }
                }else
                {
                    $data['error'][] = 'Số dư trong tài khoản của bạn không đủ để thanh toán. Vui lòng nạp thêm.';
                }
            }
            $data['user'] = $this->Muser->checkIssetUserbyId($this->session->userdata['customerid']);
            $data['cate']= $this->Mcate->listAll();
            $data['title'] = 'Thanh toán';
            $data['template'] = 'checkout_onpage';
            $data['searchoption'] = $this->Msearch->listAll();
            $this->load->view("layout",$data);
            }else{
                header("location:".base_url());
                exit();
            } 
        }
        else
        {
         header("location:".base_url().'frontend/customer/account/login');
         exit();
       }
    }
}