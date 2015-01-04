<?php
// Controller Ajax dùng để xử lý các thao tác liên quan đến ajax
class Ajax extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    // Action loadcomment dùng để hiển thị các nhận xét tương ứng với sách
    // Start
    public function loadcomment()
    {
    	// Đếm tổng số record của các nhận xét tướng ứng với id của sách
    	$total = $this->Mcomment->countall($_POST['id']);
    	// Số bình luận mỗi lần hiển thị
    	$perpage = 3;
    	// Vị trí bắt đầu của record
    	$start = $_POST['star'];
    	// Lưu giá trị của tất cả các bình luận tương ứng với sách vào mảng array
 		$array = $this->Mcomment->listall( $perpage, $start,$_POST['id']);
 		// Nếu mảng không rỗng thì thực hiện in ra các bình luận
 		// Bắt đầu điều kiện
 		if($array != null){
 			// Start loop
	    	foreach ($array as $key) {
	    		// In ra tiêu đề nhận xét
	    		echo '<h3>'.$key['book2_comment_name'].'</h3>'; 
	    		// In ra tên của người nhận xét & thời gian viết nhận xét
	    		echo '<h4>'.$key['book2_comment_customer_fullname'].' <font style="color:#A4A4A4">'.$key['book2_comment_date'].'</font></h4>';
	    		// In ra nội dung của nhận xét
	    		echo '<p>'.$key['book2_comment_comment'].'</p>';
	    	}
	    	// End loop
	    }else // Ngược lại nếu mảng trống thì sẽ thông báo
	    {
	    	echo '<div>Không có thêm nhận xét nào</div>';
	    	// Ẩn đi button Xem thêm dưới phần các nhận xét
	    	echo '
	    		<script type="text/javascript">
				$(document).ready(function(){
					$("#go").hide();
				});
	    	';
	    }
	    // Kết thúc điều kiện
    }
    //End
}