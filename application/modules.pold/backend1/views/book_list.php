<h2>Các Sách<a href="<?php echo base_url(); ?>backend/book/add"><button>Thêm Mới</button></a></h2>
<div id="listbook">
<table  cellspacing="0" border="0">
<tr>
	<td id="title">#</td>
	<td id="title">Tên sách</td>
	<td id="title">Thể loại</td>
	<td id="title">Tác giả</td>
	<td id="title">Hình ảnh</td>
	<td id="title">Sửa</td>
	<td id="title">Xóa</td>
</tr>
<?php
$stt=0;
foreach ($book as $key) {
	$stt++;
	echo '<tr>';
    echo '<td>'.$stt.'</td>';
    echo '<td>'.$key['book2_book_name'].'</td>';
    echo '<td>'.$key['book2_category_name'].'</td>';
    echo '<td>'.$key['book2_book_author'].'</td>';
    echo '<td><img src="'.base_url().$key['book2_book_image'].'"></td>';
    echo '<td><a href="'.base_url().'backend/book/edit/'.$key['book2_book_id'].'">Sửa</a></td>';
    echo '<td><a href="'.base_url().'backend/book/del/'.$key['book2_book_id'].'">Xóa</a></td>';
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