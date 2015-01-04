<?php $this->load->view("pro"); ?>
<div class="link">
<a href="<?php echo base_url(); ?>">Trang chủ</a> / Sách / <?php echo $parent_cate['book2_category_name']; ?> / <a href="<?php echo base_url();?>frontend/product/category/<?php echo $book['book2_category_id'];?>"><?php echo $book['book2_category_name']; ?></a> / <?php echo $book['book2_book_name']; ?>
</div>
<!--- In ra nội dung thông  tin của sách -->
<div class="show1">
	<img src="<?php echo base_url().$book['book2_book_image']; ?>">
	<div class="show11">
		<h3><?php echo $book['book2_book_name']; ?></h3>
		<table>
			<tr><td>Đánh giá</td><td>
				<input value="1" name="star3" type="radio" class="star" disabled="disabled" <?php if($book['book2_book_vote'] > 0 && $book['book2_book_vote'] <=10){ echo 'checked="checked"'; }?> /> 
				<input value="2" name="star3" type="radio" class="star" disabled="disabled" <?php if($book['book2_book_vote'] > 10 && $book['book2_book_vote'] <=20){ echo 'checked="checked"'; }?> /> 
				<input value="3" name="star3" type="radio" class="star" disabled="disabled" <?php if($book['book2_book_vote'] > 20 && $book['book2_book_vote'] <=30){ echo 'checked="checked"'; }?> />
				<input value="4" name="star3" type="radio" class="star" disabled="disabled" <?php if($book['book2_book_vote'] > 30 && $book['book2_book_vote'] <=40){ echo 'checked="checked"'; }?> /> 
				<input value="5" name="star3" type="radio" class="star" disabled="disabled" <?php if($book['book2_book_vote'] > 40){ echo 'checked="checked"'; }?>/> 
			<tr><td>Tác giả</td><td><font style="color:#09f"><b><?php echo $book['book2_book_author']; ?></b></font></td></tr>
			<tr><td>Giá bìa</td><td><?php echo $book['book2_book_price1']; ?> VND</td></tr>
			<tr><td>Giá thuê</td><td><font style="color:#04B404"><h2><?php echo $book['book2_book_price2']; ?> VND</h2></font></td></tr>
			<tr><td>Chưa thuê</td><td><font style="color:#FF0000"><?php echo $book['book2_book_qty']-$book['book2_book_qty2']; ?> quyển</font></td></tr>
		</table>
		<h4>Thông tin chi tiết</h4>
		<div class="thongtinct">
			<table>
				<tr><td>Nhà xuất bản</td><td><?php echo $book['book2_book_public']; ?></td></tr>
				<tr><td>Ngày xuất bản</td><td><?php echo $book['book2_book_date_public']; ?></td></tr>
				<tr><td>Mã sách</td><td><?php echo $book['book2_book_code']; ?></td></tr>
				<tr><td>Danh mục</td><td><a href="<?php echo base_url();?>frontend/product/category/<?php echo $book['book2_category_id'];?>"><?php echo $book['book2_category_name']; ?></a></td></tr>
				<tr><td>Từ khóa</td><td><?php echo $book['book2_book_tag']; ?></td></tr>
			</table>
		<form action="<?php echo base_url(); ?>frontend/checkout/cart" method="post">
		<input type="hidden" name="bookid" value="<?php echo $book['book2_book_id']; ?>">
		<input type="hidden" name="bookimage" value="<?php echo $book['book2_book_image']; ?>">
		<input type="hidden" name="bookname" value="<?php echo $book['book2_book_name']; ?>">
		<input type="hidden" name="bookprice1" value="<?php echo $book['book2_book_price1']; ?>">
		<input type="hidden" name="bookprice2" value="<?php echo $book['book2_book_price2']; ?>">	
		<button type="submit" name="checkout">Thêm vào giỏ hàng</button>
		</form>	
		</div>	
	</div>
</div>
<div class="show2">
	<h2>Giới thiệu sách</h2>
	<p>
	<h3><?php echo $book['book2_book_name']; ?></h3>
	<?php echo $book['book2_book_info']; ?>
	</p>
</div>
<div class="show3">
	<h2>Có thể bạn quan tâm</h2>
	<table>
		<tr>
			<?php
			foreach ($book_more as $key) {
				echo '<td><img src="'.base_url().$key['book2_book_image'].'"></td>';
			}
			?>
		</tr>
		<tr>
			<?php
			foreach ($book_more as $key) {
				echo '<td><a href="'.base_url().$key['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($key['book2_book_name']))).'.html">'.$key['book2_book_name'].'</a></td>';
			}
			?>
		</tr>
		<tr>
			<?php
			foreach ($book_more as $key) {
				echo '<td><font style="color:#04B431"><h3>'.$key['book2_book_price2'].' VND</h3></font></td>';
			}
			?>
		</tr>
	</table>
</div>
<!-- Phần nhập nhận xét của thành viên -->
<div class="show4">
<h2>Gửi nhận xét của bạn</h2>
<form action="" method="post" id="myForm">
	<!-- In ra thông báo thành công hoặc lỗi -->
	<?php
		if(isset($error))
		{
			foreach ($error as $key) {
				# code...
				echo '<span class="error-submit-product">'.$key.'</span><br />';
			}
		}
	 ?>
	 <?php
		if(isset($success))
		{
			foreach ($success as $key) {
				# code...
				echo '<span class="success-submit-product">'.$key.'</span><br />';
			}
		}
	 ?>
<!-- Phần đánh giá nhận xét  -->	 
1. Đánh giá của bạn về sách này<br /> 
<input value="1" name="star2" type="radio" class="star"/>
<input value="2" name="star2" type="radio" class="star"/>
<input value="3" name="star2" type="radio" class="star"/>
<input value="4" name="star2" type="radio" class="star"/> 
<input value="5" name="star2" type="radio" class="star"/><br />
2. Tiêu đề của nhận xét<br />
<input id="input" type="text" name="name"><br />
3. Viết nhận xét của bạn vào bên dưới<br />
<textarea name="comment"></textarea><br />
4. Vui lòng nhập mã xác nhận<br /><br />
<img src="<?php echo base_url(); ?>public/capcha.php" > <input id="capcha" type="text" name="capcha"><br /><br />
<button type="submit" name="submit" id="submit">Gửi nhận xét</button>
</form>
<p>
- Khuyến khích viết nhận xét:<br />
• Tối thiểu 100 từ, viết bằng tiếng Việt chuẩn, có dấu.<br />
• Nội dung là duy nhất và do chính người gửi nhận xét viết.<br />
• Hữu ích đối với người đọc: nêu rõ điểm tốt/chưa tốt của sản phẩm.<br />
• Không mang tính quảng cáo, kêu gọi mua sản phẩm một cách không cần thiết.<br />
</p>
</div>
<!--In ra nội dung của các nhận xét về sách -->
<div class="show5">
	<h2>Nhận xét</h2>
	<!-- Xử lý Ajax tải các nhận xét -->
		<script type="text/javascript">
		$(document).ready(function(){
			var star = 0;
			$("#go").click(function(){ 

				star =star +3;

				$.ajax
				    ({
				        type: "POST",
				        url: "<?php echo base_url(); ?>frontend/ajax/loadcomment",
				        data: "id="+<?php echo $book['book2_book_id']; ?>+"&star="+star,
				        success: function(msg)
				        {
				       
				                $("#loading").fadeIn('3000');
				                $("#comment").append(msg);
				        }
				    });
			 });
			$.ajax
		    ({
		        type: "POST",
		        url: "<?php echo base_url(); ?>frontend/ajax/loadcomment",
		        data: "id="+<?php echo $book['book2_book_id']; ?>+"&star="+star,
		        success: function(msg)
		        {
		       
		                $("#loading").fadeIn('3000');
		                $("#comment").html(msg);
		        }
		    });
		 });
		</script>
			<!--- In ra các nhận xét -->
			<div id="loading">
			<div id="comment"></div>
			<div id="go"><button>Xem Thêm</button></div>
			</div>
<!-- Phần bình luận dựa vào facebook -->
<h2>Thảo luận</h2>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=589494401120882";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php echo base_url().$book['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($book['book2_book_name']))); ?>.html" data-width="1066" data-numposts="5" data-colorscheme="light"></div>
</div>

