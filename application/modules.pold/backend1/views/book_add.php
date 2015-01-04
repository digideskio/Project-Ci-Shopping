<h2>Thêm Sách</h2>
<div id="addbook">
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
<form action="<?php echo base_url(); ?>backend/book/bookaction" method="post" enctype="multipart/form-data">
	<style type="text/css"> table,tr,td {border: none;}</style>
	<table>
		<tr><td id="title">Tên sách</td><td><input type="text" name="bookname"></td></tr>
		<tr><td id="title">Thể loại</td>
			<td>
				<select name="cate">
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
			</td>
		</tr>
		<tr><td id="title">Tác giả</td><td><input type="text" name="author"></td></tr>
		<tr><td id="title">Giá bìa</td><td><input type="text" name="price1"></td></tr>
		<tr><td id="title">Giá thuê</td><td><input type="text" name="price2"></td></tr>
		<tr><td id="title">Giới thiệu sách</td><td><textarea name="bookinfo"></textarea></td></tr>
		<tr><td id="title">Nhà xuất bản</td><td><input type="text" name="bookpublic"></td></tr>
		<tr><td id="title">Ngày xuất bản</td><td><input type="text" name="bookdatepublic" id="datepicker"></td></tr>
		<tr><td id="title">Mã sách</td><td><input type="text" name="bookcode"></td></tr>
		<tr><td id="title">Hình ảnh</td><td><input type="file" name="bookimage"></td></tr>
		<tr><td id="title">Số lượng</td><td><input type="text" name="bookqty"></td></tr>
		<tr><td id="title">Từ khóa</td><td><input type="text" name="booktag"></td></tr>
		<tr><td></td><td><input type="submit" id="submit" name="submit" value="Nhập"></td></tr>
	</table>
	<input type="hidden" name="action" value="submit"> 
</form>
</div>