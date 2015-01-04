<div id="list">
<h4>DANH MỤC SÁCH</h4>
<ul>
<li><a href="<?php echo base_url(); ?>new/sach-moi-cap-nhat.html">Sách mới cập nhật</a></li>
<li><a href="<?php echo base_url(); ?>rating/sach-duoc-binh-chon-nhieu-nhat.html">Sách được bình chọn nhiều nhất</a></li>
<li><a href="<?php echo base_url(); ?>hay/sach-duoc-thue-nhieu-nhat.html">Sách được thuê nhiều nhất</a></li>		
	<?php
	foreach ($cate as $key => $value) {
		if($value['book2_category_parent_id'] == 0)
		{
			echo '<li>';
			echo $value['book2_category_name'];
			echo '<ul>';
			foreach ($cate as $key2 => $value2) {
				if($value2['book2_category_parent_id'] == $value['book2_category_id'])
				{
					echo '<li>';
					echo '<a href="'.base_url().'frontend/product/category/'.$value2['book2_category_id'].'">';
					echo $value2['book2_category_name'];
					echo '</a>';
					echo '</li>';
				}
			}
			echo '</ul>';
			echo '</li>';
		}
	}
	?>
</ul>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=589494401120882";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="http://www.facebook.com/FacebookDevelopers" data-width="252" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>