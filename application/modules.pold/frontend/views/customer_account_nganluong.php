<br />
<div class="link">
<a href="<?php echo base_url(); ?>">Trang chủ</a> / Nạp tiền cho tài khoản
</div>
<div class="nganluong">
<img src="<?php echo base_url(); ?>public/upload/nganluong.png">	
	<?php if($action == "add"){
	echo '
	<form action="'.base_url().'frontend/customer/nganluong/return" method="post">
		<h4>Vui lòng chọn giá trị tiền nạp vào tài khoản</h4>
		<input name="price" type="radio" value="50000" checked="checked"> 50.000 VNĐ <br />
		<input name="price" type="radio" value="100000"> 100.000 VNĐ <br />
		<input name="price" type="radio" value="200000"> 200.000 VNĐ <br />
		<button type="submit" name="submit">Tiếp tục</button>
	</form>';
	}elseif ($action == "return") {
		echo '<h4>Bạn chấp nhận đồng ý nạp vào tài khoản <font style="color:#DF3A01">'.$_POST['price'].' VNĐ</font>. Hoặc <a href="'.base_url().'frontend/customer/nganluong/add">quay lại</a>.</h4>';
		echo '<br /><a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=(quanmn.libra@gmail.com)&product_name=(NAPTIENTAIKHOANTHUSACH)&price=('.$_POST["price"].')&return_url=('.base_url().'frontend/customer/nganluong/ok?success='.$_POST["price"].')&comments=(NẠP TIỀN VÀO TÀI KHOẢN THÀNH CÔNG)" ><img src="https://www.nganluong.vn/data/images/buttons/17.gif"  border="0" /></a> ';
	}elseif($action=="success")
	{
		echo '<div class="success">Nạp tiền vào tài khoản thành công. Tài khoản của bạn được cộng thêm </div>'.$this->session->userdata['price']. 'VNĐ';
	}elseif ($action == "error") {
		echo '<div class="error">Lỗi can thiệp từ người dùng.</div>';
	}
	?>
</div>