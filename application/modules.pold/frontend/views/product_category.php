<br />
<div class="link">
<a href="<?php echo base_url(); ?>">Trang chủ</a> / <?php echo $title; ?>
</div>
<div class="list">
<?php $this->load->view("listcate"); ?>
</div>
<div class="showlist">
<h3><?php echo $title; ?></h3>	
<div class="view">
Hiển thị : <a href="?mode=grid">Dạng lưới</a> / <a href="?mode=list">Dạng danh sách</a> 
</div>
<?php
	switch ($view) {
		case 'list':
			if($book != null){
			foreach ($book as $key => $value) {
				echo '<div class="product-item">';
				echo '<img src="'.base_url().$value['book2_book_image'].'">';
				echo '<div class="product-item-info">';
				echo '<h4><a href="'.base_url().$value['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($value['book2_book_name']))).'.html">'.$value['book2_book_name'].'</a></h4>';
				echo $value['book2_book_author'].'</br>';
				echo '<b><font style="color:#04B431">'.$value['book2_book_price2'].' VNĐ</font></b></br>';
				echo substr($value['book2_book_info'], 0, 200 ).' <a id="more" href="'.base_url().$value['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($value['book2_book_name']))).'.html">Xem chi tiết</a></br>';
				echo '</div>';
				echo '</div>';
			}
			echo '<div id="page_link" align="center">';	
			echo $link;
			echo '</div>';
			}else
			{
				echo '<div class="null">Không có kết quả nào</div>';
			}
			break;
		case 'grid':
		if($book !=null){
			foreach ($book as $key => $value) {
				echo '<div class="product-item-2">';
				echo '<img src="'.base_url().$value['book2_book_image'].'"><br />';
				echo '<h4><a href="'.base_url().$value['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($value['book2_book_name']))).'.html">'.$value['book2_book_name'].'</a></h4>';
				echo $value['book2_book_author'].'</br>';
				echo '<b><font style="color:#04B431">'.$value['book2_book_price2'].' VNĐ</font></b>';
				echo '</div>';
			}
			echo '<div id="page_link" align="center">';	
			echo $link;
			echo '</div>';
			}else
			{
				echo '<div class="null">Không có kết quả nào</div>';
			}
			break;
		
		default:
			# code...
			break;
	}	
?>
</div>
