<?php $this->load->view("pro"); ?>
<div class="title">
<h3>Quên mật khẩu ?</h3>
</div>
<?php
		if(isset($error))
		{
			foreach ($error as $key) {
				echo '<div class="error">';
				echo $key.'</div>';
			}
		}
		if(isset($success))
		{
			foreach ($success as $key) {
				echo '<div class="success">';
				echo $key.'</div>';
			}
		}
	?>
<div class="customer-forgot">
	<h3>Nhận về mật khẩu của bạn tại đây</h3>
	<form action="" method="post">
	<p>
	<h4>Vui lòng điền email của bạn dưới đây. Mật khẩu mới sẽ được gửi vào email của bạn.</h4>
	Tài khoản<br />
	<input type="text" name="username"><br />
	Địa chỉ email<br />
	<input type="text" name="email">
	</p>
	<a href="<?php echo base_url(); ?>frontend/customer/account/login"> << Quay lại trang đăng nhập </a><button type="submit" name="submit">Chấp nhận</button>
	</form>
</div>