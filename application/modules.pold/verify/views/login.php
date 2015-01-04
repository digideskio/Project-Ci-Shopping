<div class="user-login">
	<div class="error">
		<?php
if(isset($error))
{
	foreach ($error as $v) {
		echo '<p>'.$v.'</p>';
	}
}
?>
	</div>
<div class="user-login-icon">	
<img src="<?php echo base_url(); ?>public/template/verify/images/userloginicon.png">
</div>
<div class="user-login-form">
<form action="<?php echo base_url(); ?>verify/login/dologin" method="post" >
	<table>
	<tr><td><input id="username" type="text" name="username"></td></tr>
	<tr><td><input id="password" type="password" name="password"></td></tr>
	<tr><td><input id="submit-button" type="submit" name="submit" value="Đăng nhập"><a href="<?php echo base_url(); ?>verify/fogot">Quên mật khẩu ?</a></td></tr>
	</table>
</form>
</div>
</div>