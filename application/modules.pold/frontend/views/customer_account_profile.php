<div class="profile-link">
<a href="<?php echo base_url(); ?>frontend/customer/payment/bill">Lịch sử giao dịch</a>
<a href="<?php echo base_url(); ?>frontend/customer/payment/book">Các sách đã từng thuê</a>
<a href="<?php echo base_url(); ?>frontend/customer/nganluong/add">Nạp tiền</a>
</div>
<div class="title">
<h3>Thông tin Tài khoản</h3>
</div>
<?php
if(isset($error)){ echo '<div class="error">Mật khẩu cũ không chính xác. Cập nhật thông tin đăng nhập thất bại.</div>';} 
if(isset($success1)){ echo '<div class="success-create">Cập nhật thông tin đăng nhập thành công.</div>';}
if(isset($success)){ echo '<div class="success-create">Cập nhật thông tin cá nhân thành công.</div>';} ?>
<div class="customer-create">
<form action="" method="post">
<fieldset><legend>Thông tin đăng nhập</legend>
Tài khoản<br />
<h3><?php echo $user['book2_user_username']; ?></h3><br />
Mật khẩu cũ<br />
<input type="password" name ="password"><?php if(isset($errorpassword)){ echo '<span class="error-create">Mật khẩu cũ không được để trống.</span>';} ?><br />
Mật khẩu mới<br />
<input type="password" name ="password1"><?php if(isset($errorpassword1)){ echo '<span class="error-create">Mật khẩu không được để trống.</span>';} ?><br />
Xác nhận mật khẩu mới<br />
<input type="password" name ="password2"><?php if(isset($errorpassword2)){ echo '<span class="error-create">Nhập lại mật khẩu không chính xác.</span>';} ?><br />
</fieldset>
<fieldset>
<legend>Thông tin cá nhân</legend>
Số point hiện có<br />
<h2><?php echo $user['book2_user_point']; ?></h2><br />
Họ tên<br />
<input type="text" name="fullname" value="<?php echo $user['book2_user_fullname']; ?>"><?php if(isset($errorfullname)){ echo '<span class="error-create">Họ tên không được để trống.</span>';} ?><br />
Địa chỉ email<br />
<input type="text" name="email" value="<?php echo $user['book2_user_email']; ?>"><?php if(isset($erroremail1)){ echo '<span class="error-create">Email không được để trống.</span>';} ?><?php if(isset($erroremail2)){ echo '<span class="error-create">Địa chỉ email không hợp lệ.</span>';} ?><br />
Số điện thoại<br />
<input type="text" name="phone" value="<?php echo $user['book2_user_phone']; ?>"><?php if(isset($errorphone)){ echo '<span class="error-create">Số điện thoại không được để trống.</span>';} ?><?php if(isset($errorphone1)){ echo '<span class="error-create">Số điện thoại không hợp lệ.</span>';} ?><br />
Địa chỉ<br />
<textarea name="address"><?php echo $user['book2_user_address']; ?></textarea><?php if(isset($erroraddress)){ echo '<span class="error-create">Địa chỉ không được để trống.</span>';} ?><br />
</fieldset>
<div class="submit-create">
<button type="submit" name="submit" >Cập nhật tài khoản</button>
</div>
</form>
</div>