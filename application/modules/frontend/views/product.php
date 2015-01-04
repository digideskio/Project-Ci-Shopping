<?php
	$this->load->view("top");
?>
<style>
    .menu > ul >li:nth-child(2)
    {
        background: #58ACFA;
        color: #FFF;
    }
    .menu > ul >li:nth-child(2) > a{
        color: #FFF;
    }
    .menu > ul >li >ul >li
    {
        border: none;
    }
    .head-view
    {
        width: 100%;
        height: auto;
    }
    .head-view > h2
    {
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: normal;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .carousel
    {
        width: 50%;
        float: left;
    }
    .carousel-inner img
    {
        width: 100%;
    }
    .info-view
    {
        width: 45%;
        height: auto;
        float: left;
        color: #333;
        padding-left: 5%;
    }
    .info1
    {
        width: 50%;
        float: left;
        height: auto;
        border-right: 1px solid #F2F2F2;
    }
    .info2
    {
        width: 49%;
        float: left;
        height: auto;
        border-left: 1px solid #F2F2F2;
    }
    .info-view  h4
    {
        color: #333;
        font-size: 13px;
        font-weight: normal;
        line-height: 13px;
        margin-bottom: 13px;
    }
    .info-view  h2
    {
        color: #333;
        font-size: 20px;
        font-weight: normal;
        line-height: 24px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .info-view  b  a
    {
        color: #58ACFA;
    }
    .info-view  h3
    {
        color: #090;
        font-size: 18px !important;
    }
    .info2 p
    {
        padding: 0 0 0 14px;
        margin: 0 0 8px 0;
        font-size: 13px;
        color: #333;
    }
    .info3
    {
        width: 100%;
        height: auto;
        float: left;
        margin-bottom: 20px;
        color: #333;
        font-size: 13px;
    }
    .info3 h2
    {
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: normal;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .info4
    {
        width: 100%;
        height: auto;
        float: left;
        margin-bottom: 20px;
        color: #333;
        font-size: 13px;
    }
    .info4 h2
    {
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: normal;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .info4 ul
    {
        list-style-type: none;
        margin: 0px;
        padding: 0px;
    }
    .info4 li
    {
        width: 20%;
        float: left;
        height: auto;
    }
    .info4 li
    {
        text-align: center;
    }
    .info4 ul li h4
    {
        text-align: left;
        margin-left: 10px;
        color: #333;
        font-size: 13px;
    }
    .info4  h4 a
    {
        text-decoration: none;
        font-weight: normal;
        font-size: 12px;
        color: #333;
    }
     .info4  h4 a:hover
     {
        text-decoration: underline;
        color: #58ACFA;
     }
     .info5
     {
        width: 100%;
        height: auto;
        float: left;
        margin-bottom: 20px;
        color: #333;
        font-size: 13px;
     }
     .info5 h2
    {
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: normal;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
</style>
<div class="head-view">
<h2><?php echo $product['pcname'].' <b>'.$product['productname'].'</b>'; ?></h2>
<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
   <?php
 $img = str_replace("[", "", $product['productimages']);
 $img = str_replace("]", "", $img);
 $img = str_replace('"', "", $img);
 $imgUrl = explode(",", $img);
echo '<img class="active item" src="'.base_url().'upload/'.$imgUrl[0].'" />';
 for($i = 1; $i < count($imgUrl); $i++)
 {
    echo '<img class="item" src="'.base_url().'upload/'.$imgUrl[$i].'" />';
 }
?> 
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>
<div class="info-view">
<h2><?php echo $product['productname']; ?></h2>
<div class="info1">
<h4>Thương hiệu</h4>
<b><a href="<?php echo base_url(); ?>tags/<?php echo $product['cname'];?>"><?php echo $product['cname']; ?></a></b>
<h4>Giá bán tại IT Shop</h4>
<h3><?php echo price($product['productprice']); ?> VNĐ</h3>
<h4>Số lượng sản phẩm hiện có</h4>
<h3><?php echo $product['productquantity']; ?></h3>
</div>
<div class="info2">
<p>
<strong>
    Bao test 1 tuần 
</strong>
</p>
<p>
Không bảo hành nguồn và màn hình cảm ứng
</p>
<p>
Miễn phí vận chuyển
</p>
<p>
<strong>Liên hệ IT Shop - Quang Thái</strong><br />
<strong>0919 010 900</strong><br />
<strong>0979 010 949</strong><br />
<strong>0906 060 090</strong><br />
</p>
<p>Xem thêm <a href="<?php echo base_url(); ?>giao-dich-van-chuyen.html">Hình thức giao dịch & phương thức vận chuyển</a></p>
</div>
</div>
<div class="info3">
<h2>Mô tả sản phẩm</h2>
<p>
    <?php $info = str_replace('-', "<br />-",$product['productinfo']);
        echo $info;
    ?>
</p>
</div>
<div class="info4">
<h2>Sản phẩm mới về</h2>
<ul>
<?php
    for($i=0; $i<=4; $i++)
    {
            $img1 = $listproduct[$i]['productimages'];
            $img2 = explode(',', $img1);
            $img3 = $img2[0];
            $img4 = str_replace('[', '', $img3);
            $img5 = str_replace(']', '', $img4);
            $img6 = str_replace('"', '', $img5);
            $listproduct[$i]['productname'] = str_replace("(", "",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace(")", "",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace("&", "",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace("+", "",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace("'", "",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace('"', "",$listproduct[$i]['productname']);          
            $listproduct[$i]['productname'] = str_replace('%', "",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace('/', "-",$listproduct[$i]['productname']);
            $listproduct[$i]['productname'] = str_replace('\\', "-",$listproduct[$i]['productname']);
            $url = str_replace(",", "", vn2latin($listproduct[$i]['productname'], true));
            echo '<li><a href="'.base_url().'san-pham/'.$url.'_post'.$listproduct[$i]['productid'].'.html"><img style="height:110px" src="' . base_url() . 'upload/' . $img6 . '">';
            echo '<h4><a href="'.base_url().'san-pham/'.$url.'_post'.$listproduct[$i]['productid'].'.html">' . $listproduct[$i]['productname'] . '</a></h4>';
            echo '<h4>' . price($listproduct[$i]['productprice']) . ' VNĐ</h4>';
            echo '</a></li>';
    }
?>
</ul>
</div>
<div class="info5">
<h2>Bình luận về sản phẩm</h2>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=589494401120882&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php echo curPageURL(); ?>" data-width="1139" data-numposts="5" data-colorscheme="light"></div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/JS/showimg.js"></script>
<script type="text/javascript">
    $('.carousel').carousel({
  interval: 3000
})
</script>
<?php
	$this->load->view("bottom");
?>