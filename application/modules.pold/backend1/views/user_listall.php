<h2>Danh Sách Thành Viên<a href="<?php echo base_url(); ?>backend/user/add"><button>Thêm Mới</button></a></h2>
<div id="listuser">
<table cellspacing="0" border="0">
<tr>
	<td id="title">#</td>
	<td id="title">Tài khoản</td>
	<td id="title">Email</td>
	<td id="title">Level</td>
	<td id="title">Active</td>
	<td id="title">Sửa</td>
	<td id="title">Xóa</td>
</tr>
<?php
$stt=0;
	foreach ($data as $value) {
		$stt++;
		echo '<tr>';
		echo '<td>'.$stt.'</td>';
		echo '<td>'.$value['book2_user_username'].'</td>';
		echo '<td>'.$value['book2_user_email'].'</td>';
		if($value['book2_user_level']==1)
		{
			echo '<td><font style="color:#B40404"><b>Admin</b></font></td>';
		}else
		{
			echo '<td>Thành viên</td>';
		}
		if($value['book2_user_active']==0)
		{
			echo '<td>Chưa</td>';
		}else
		{
			echo '<td>Có</td>';
		}
		echo '<td><a href="'.base_url().'backend/user/edit/'.$value['book2_user_id'].'">Sửa</a></td>';
		echo '<td><a href="'.base_url().'backend/user/delete/'.$value['book2_user_id'].'">Xóa</a></td>';
		echo '</tr>';
	}
?>
<tr>
	<td id="title"></td>
	<td id="title"></td>
	<td id="title"></td>
	<td id="title"></td>
	<td id="title"></td>
	<td id="title"></td>
	<td id="title"></td>
</tr>
</table>
<div class="link">
	<?php echo $link; ?>
</div>
</div>