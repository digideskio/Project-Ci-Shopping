<script src="http://bxslider.com/js/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="http://bxslider.com/lib/jquery.bxslider.js"></script>
<!-- bxSlider CSS file -->
<link href="http://bxslider.com/lib/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>
<style type="text/css">

</style>
<div class="top-ad">
<!--<div class="ad_1">
	<img src="<?php echo base_url(); ?>public/upload/ad/ad_1.jpg">
</div>-->
<div class="image-slider">
  <ul class="bxslider">
  	<?php
  	$data=array();
		foreach ($list as $key) {
			$data[]=$key['book2_slider_url'];
		}
  	?>
  <li><img width="1040" src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['0']; ?>" /></li>
  <li><img width="1040" src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['1']; ?>" /></li>
  <li><img width="1040" src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['2']; ?>" /></li>
  <li><img width="1040" src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['3']; ?>" /></li>
</ul>
</div>
</div>

<div class="bar-2">
	<a href="<?php echo base_url(); ?>new/sach-moi-cap-nhat.html">SÁCH MỚI</a>
</div>
<div class="new-book">
<?php
	foreach ($newbook as $key) {
		echo '<div class="sub-new-book">';
		echo '<img src="'.base_url().$key['book2_book_image'].'">';
		echo '<p class="name"><a href="'.base_url().$key['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($key['book2_book_name']))).'.html">'.$key['book2_book_name'].'</a></p>';
		echo '<p class="author">'.$key['book2_book_author'].'</p>';
		echo '<h4>'.$key['book2_book_price2'].' VND</h4>';
		echo '</div>';
	}
?>
</div>

<div class="bar-3">
	<a href="<?php echo base_url(); ?>rating/sach-duoc-binh-chon-nhieu-nhat.html">SÁCH NỔI BẬT</a>
</div>
<div class="new-book">
<?php
	foreach ($votebook as $key) {
		echo '<div class="sub-new-book">';
		echo '<img src="'.base_url().$key['book2_book_image'].'">';
		echo '<p class="name"><a href="'.base_url().$key['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($key['book2_book_name']))).'.html">'.$key['book2_book_name'].'</a></p>';
		echo '<p class="author">'.$key['book2_book_author'].'</p>';
		echo '<h4>'.$key['book2_book_price2'].' VND</h4>';
		echo '</div>';
	}
?>
</div>
<div class="bar-4">
	<a href="<?php echo base_url(); ?>hay/sach-duoc-thue-nhieu-nhat.html">SÁCH HAY</a>
</div>
<div class="new-book">
<?php
	foreach ($haybook as $key) {
		echo '<div class="sub-new-book">';
		echo '<img src="'.base_url().$key['book2_book_image'].'">';
		echo '<p class="name"><a href="'.base_url().$key['book2_book_id'].'/sach/'.mb_strtolower(url_title(convert_accented_characters($key['book2_book_name']))).'.html">'.$key['book2_book_name'].'</a></p>';
		echo '<p class="author">'.$key['book2_book_author'].'</p>';
		echo '<h4>'.$key['book2_book_price2'].' VND</h4>';
		echo '</div>';
	}
?>
</div>

