<?php $this->load->view("pro"); ?>
<div class="title">
<h3>Đăng Nhập hoặc Tạo Tài Khoản Mới</h3>
</div>
	<?php
		if(isset($error))
		{
			foreach ($error as $key) {
				echo '<div class="error">';
				echo $key.'</div>';
			}
		}
	?>
<div class="new-customer">
	<h3>Các khách hàng mới</h3>
	<p>
	Tạo tài khoản trên website, bạn có thể mua hàng và thanh toán nhanh hơn, sử dụng nhiều địa chỉ nhận hàng, xem và theo dõi đơn hàng trong tài khoản và nhiều hơn thế nữa.
	</p>
	<a href="<?php echo base_url(); ?>frontend/customer/account/create"><button>Đăng ký tài khoản mới</button></a>
</div>
<div class="old-customer">
	<h3>Khách hàng đã đăng kí</h3/>
		<form action="" method="post">
	<p>		
		Tài khoản </br>
		<input type="text" name="username"><br />
		Mật khẩu <br />
		<input type="password" name="password"><br />
		<a href="<?php echo base_url(); ?>frontend/customer/account/forgotpassword">Quên mật khẩu ?</a><br />
	</p>	
		<button type="submit" name="submit">Đăng nhập vào Xrita</button>
		</form>
	
</div>