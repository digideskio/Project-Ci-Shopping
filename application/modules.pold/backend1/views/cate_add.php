<h2>Thêm Thể Loại Sách</h2>
<div id="addcate">
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
<form action="<?php echo base_url(); ?>backend/cate/cateaction" method="post">
	<style type="text/css"> table,tr,td {border: none;}</style>
	<table>
		<tr><td id="title">Tên thể lớn</td><td>
			<select name="parent">
			<option value="0">Vui lòng chọn thể loại</option>
			<?php
				if(isset($cate))
				{
					foreach ($cate as $key) {
					echo '<option value="'.$key['book2_category_id'].'">'.$key['book2_category_name'].'</option>';
					}
				}
			?>
		</select>
		</td></tr>
		<tr><td id="title">Tên thể loại</td><td><input type="text" name="cate_name"></td></tr>
		<tr><td></td><td><input type="submit" id="submit" name="submit" value="Nhập"></td></tr>
	</table>
	<input type="hidden" name="action" value="submit"> 
</form>
</div>