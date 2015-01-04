<h2>Chỉnh Sửa Sách</h2>
<div id="editbook">
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
<form action="<?php echo base_url(); ?>backend/book/bookaction/<?php echo $book['book2_book_id']; ?>" method="post" enctype="multipart/form-data">
	<style type="text/css"> table,tr,td {border: none;}</style>
	<table>
		<tr><td id="title">Tên sách</td><td><input type="text" name="bookname" value="<?php echo $book['book2_book_name']; ?>"></td></tr>
		<tr><td id="title">Thể loại</td>
			<td>
				<select name="cate">
				<?php
				if(isset($cate))
				{
					foreach ($cate as $key) {
					if($book['book2_book_parent_id'] == $key['book2_book_id'])
					{
						echo '<option selected="selected" value="'.$key['book2_category_id'].'">'.$key['book2_category_name'].'</option>';	
					}else{	
						echo '<option value="'.$key['book2_category_id'].'">'.$key['book2_category_name'].'</option>';
						}
					}
				}
				?>
			</select>
			</td>
		</tr>
		<tr><td id="title">Tác giả</td><td><input type="text" name="author" value="<?php echo $book['book2_book_author']; ?>"></td></tr>
		<tr><td id="title">Giá bìa</td><td><input type="text" name="price1" value="<?php echo $book['book2_book_price1']; ?>"></td></tr>
		<tr><td id="title">Giá thuê</td><td><input type="text" name="price2" value="<?php echo $book['book2_book_price2']; ?>"></td></tr>
		<tr><td id="title">Giới thiệu sách</td><td><textarea name="bookinfo"><?php echo $book['book2_book_info']; ?></textarea></td></tr>
		<tr><td id="title">Nhà xuất bản</td><td><input type="text" name="bookpublic" value="<?php echo $book['book2_book_public']; ?>"></td></tr>
		<tr><td id="title">Ngày xuất bản</td><td><input type="text" name="bookdatepublic" id="datepicker" value="<?php echo $book['book2_book_date_public']; ?>"></td></tr>
		<tr><td id="title">Mã sách</td><td><?php echo $book['book2_book_code']; ?></td></tr>
		<tr><td id="title">Hình ảnh cũ</td><td><img src="<?php echo base_url().$book['book2_book_image']; ?>"></td></tr>
		<tr><td id="title">Hình ảnh mới</td><td><input type="file" name="bookimage2"></td></tr>
		<tr><td id="title">Số lượng</td><td><input type="text" name="bookqty" value="<?php echo $book['book2_book_qty']; ?>"></td></tr>
		<tr><td id="title">Từ khóa</td><td><input type="text" name="booktag" value="<?php echo $book['book2_book_tag']; ?>"></td></tr>
		<tr><td></td><td><input type="submit" id="submit" name="submit" value="Nhập"></td></tr>
	</table>
	<input type="hidden" name="action" value="edit"> 
</form>
</div>