<h2>Các Thể Loại Sách<a href="<?php echo base_url(); ?>backend/cate/add"><button>Thêm Mới</button></a></h2>
<div id="listcate">
<table cellspacing="0" border="0">
<tr>
	<td id="title">#</td>
	<td id="title">Tên</td>
	<td id="title">Thể loại lớn</td>
	<td id="title">Sửa</td>
	<td id="title">Xóa</td>
</tr>
	<?php
		$stt=0;
		foreach ($listall as $key) {
			$stt++;
			echo '<tr>';
			echo '<td>'.$stt.'</td>';
			echo '<td>'.$key['book2_category_name'].'</td>';
			if($key['book2_category_parent_id'] == 0)
			{
				echo '<td>Không</td>';
			}else
			{
				echo '<td>Có</td>';
			}
			echo '<td><a href="'.base_url().'backend/cate/edit/'.$key['book2_category_id'].'">Sửa</a></td>';
			echo '<td><a href="'.base_url().'backend/cate/del/'.$key['book2_category_id'].'">Xóa</a></td>';
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