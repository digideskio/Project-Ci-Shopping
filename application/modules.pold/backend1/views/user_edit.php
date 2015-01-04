<h2>Chỉnh Sửa Thành Viên</h2>
<div id="edituser">
<?php
	if(isset($error))
	{
		foreach ($error as $value) {
			echo '<p id="error">'.$value.'</p>';
		}
	}
	if(isset($success))
	{
		foreach ($success as $value) {
			echo '<p id="success">'.$value.'</p>';
		}
	}
?>
<form action="<?php echo base_url(); ?>backend/user/useraction/<?php echo $user['book2_user_id']; ?>" method="post">
	<style type="text/css"> table,tr,td {border: none;}</style>
	<table>
		<tr><td id="title">Tài khoản</td><td><?php echo $user['book2_user_username']; ?></td></tr>
		<tr><td id="title">Mật khẩu</td><td><input type="password" name="pass1"></td></tr>
		<tr><td id="title">Nhập lại mật khẩu</td><td><input type="password" name="pass2"></td></tr>
		<tr><td id="title">Email</td><td><input type="text" name="email" value="<?php echo $user['book2_user_email'] ?>"></td></tr>
		<tr><td id="title">Level</td><td><input type="radio" name="level" value="0" <?php  if($user['book2_user_level']==0) echo 'checked="checked"';?> > Thành viên <input type="radio" name="level" value="1" <?php  if($user['book2_user_level']==1) echo 'checked="checked"';?>> <font style="color:#B40404"><b>Admin</b></font></td></tr>
		<tr><td id="title">Active</td><td><input type="radio" name="active" value="0" <?php  if($user['book2_user_active']==0) echo 'checked="checked"';?>> Chưa <input type="radio" name="active" value="1" <?php  if($user['book2_user_active']==1) echo 'checked="checked"';?>> Có</td></tr>
		<tr><td id="title">Họ tên</td><td><input type="text" name="fullname" value="<?php echo $user['book2_user_fullname'] ?>"></td></tr>
		<tr><td id="title">Số điện thoại</td><td><input type="text" name="phone" value="<?php echo $user['book2_user_phone'] ?>"></td></tr>
		<tr><td id="title">Địa chỉ</td><td><textarea name="address"><?php echo $user['book2_user_address'] ?></textarea></td></tr>
		<tr><td></td><td><input type="submit" id="submit" name="submit" value="Nhập"></td></tr>
	</table>
	<input type="hidden" name="action" value="edit"> 
</form>
</div>