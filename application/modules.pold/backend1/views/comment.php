<h2>Các Đánh Giá</h2>
<div class="commentlist">
	<?php
		if($data == null)
		{
			echo "Chưa có dữ liệu.";
		}else
		{
			foreach ($data as $key) {
				echo '<p>';
				echo '<h3>'.$key['book2_comment_name'].'</h3>';
				echo '<h4>'.$key['book2_comment_customer_fullname'].'</h4>';
				echo '<h4>'.$key['book2_comment_date'].'</h4>';
				echo '<h4>Về sách "'.$key['book2_comment_book_name'].'"</h4>';
				echo '<h4>Đánh giá : '.$key['book2_comment_rating'].'</h4>';
				echo $key['book2_comment_comment'];
				echo '</p>';
			}
		}
	?>
<div class="link">
	<?php echo $link; ?>
</div>	
</div>