<?php $this->load->view("pro"); ?>
<div class="title">
<h3>Tạo Tài Khoản Mới</h3>
</div>
<?php if(isset($success)){ echo '<div class="success-create">Tạo mới tài khoản thành công.</div>';} ?>
<div class="customer-create">
<form action="" method="post">
<fieldset><legend>Thông tin đăng nhập</legend>
Tài khoản<br />
<input type="text" name="username"><?php if(isset($errorusername)){ echo '<span class="error-create">Tên tài khoản không được để trống.</span>';} ?><?php if(isset($errorusername2)){ echo '<span class="error-create">Tên tài khoản này đã được dùng.</span>';} ?><br />
Mật khẩu<br />
<input type="password" name ="password1"><?php if(isset($errorpassword1)){ echo '<span class="error-create">Mật khẩu không được để trống.</span>';} ?><br />
Xác nhận mật khẩu<br />
<input type="password" name ="password2"><?php if(isset($errorpassword2)){ echo '<span class="error-create">Nhập lại mật khẩu không chính xác.</span>';} ?><br />
</fieldset>
<fieldset>
<legend>Thông tin cá nhân</legend>
Họ tên<br />
<input type="text" name="fullname"><?php if(isset($errorfullname)){ echo '<span class="error-create">Họ tên không được để trống.</span>';} ?><br />
Địa chỉ email<br />
<input type="text" name="email"><?php if(isset($erroremail1)){ echo '<span class="error-create">Email không được để trống.</span>';} ?><?php if(isset($erroremail2)){ echo '<span class="error-create">Địa chỉ email không hợp lệ.</span>';} ?><br />
Số điện thoại<br />
<input type="text" name="phone"><?php if(isset($errorphone)){ echo '<span class="error-create">Số điện thoại không được để trống.</span>';} ?><br />
Địa chỉ<br />
<textarea name="address"></textarea><?php if(isset($erroraddress)){ echo '<span class="error-create">Địa chỉ không được để trống.</span>';} ?><br />
</fieldset>
<div class="submit-create">
	<p>* Tôi đồng ý với <a href="">điều khoản sử dụng của Xrita</a></p>
	<button type="submit" name="submit" >Tạo tài khoản</button>
</div>
</form>
</div>