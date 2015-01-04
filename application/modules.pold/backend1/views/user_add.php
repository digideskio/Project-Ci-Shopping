<h2>Thêm Thành Viên</h2>
<div id="adduser">
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
<form action="<?php echo base_url(); ?>backend/user/useraction" method="post">
	<style type="text/css"> table,tr,td {border: none;}</style>
	<table>
		<tr><td id="title">Tài khoản</td><td><input type="text" name="username"></td></tr>
		<tr><td id="title">Mật khẩu</td><td><input type="password" name="pass1"></td></tr>
		<tr><td id="title">Nhập lại mật khẩu</td><td><input type="password" name="pass2"></td></tr>
		<tr><td id="title">Email</td><td><input type="text" name="email"></td></tr>
		<tr><td id="title">Level</td><td><input type="radio" name="level" value="0" checked="checked"> Thành viên <input type="radio" name="level" value="1"> Admin</td></tr>
		<tr><td id="title">Active</td><td><input type="radio" name="active" value="0" checked="checked"> Chưa <input type="radio" name="active" value="1"> Có</td></tr>
		<tr><td id="title">Họ tên</td><td><input type="text" name="fullname"></td></tr>
		<tr><td id="title">Số đt</td><td><input type="text" name="phone"></td></tr>
		<tr><td id="title">Địa chỉ</td><td><textarea name="address"></textarea></td></tr>
		<tr><td></td><td><input type="submit" id="submit" name="submit" value="Nhập"></td></tr>
	</table>
	<input type="hidden" name="action" value="submit"> 
</form>
</div>