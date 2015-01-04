<?php
$this->load->view("top");
if(isset($_GET['bt1']))
{
    $bt1 = $_GET['bt1'];
}else
{
    $bt1 = 500000;
}
if(isset($_GET['bt2']))
{
    $bt2 = $_GET['bt2'];
}else
{
    $bt2 = 10000000;
}
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
    .category
    {
        width: 20%;
        float: left;
        height: auto;
    }
    .main-content
    {
    	width: 80%;
    	float: left;
    	height: auto;
    }
    .category > h1{
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: bold;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .main-category-type, .main-category-price
    {
    	border: 1px solid #F2F2F2;
    	height: auto;
    	padding-left: 10px;
    	border-radius: 2px;
    	margin-bottom: 20px;
    	padding-right: 10px;
    }
    .main-category-type h4, .main-category-price h4
    {
    	padding: 0px;
    	font-size: 14px;
    	text-align: left;
    	background: rgb(253,253,253);
    	border-bottom: 1px solid #F2F2F2;
    	padding: 5px;
    	margin-top: 0px;
    }
    .main-category-type ul,  .main-category-price b
    {
    	list-style-type: none;
    	margin: 4px;
    	padding: 0px;
    	font-size: 13px;
    	color: #666;
    }
    .main-category-type > ul >li
    {
    	border-top:1px solid #F2F2F2;
    	padding-top:2px;
    	padding-bottom: 5px;
    }
    .main-category-type > ul >li >a
    {
    	text-decoration: none;
    	color: #666;
    }
     .main-category-type > ul >li >a:hover
     {
     	color: #58ACFA;
     }
    .main-category-type > ul >li:nth-child(1)
    {
    	border-top: none;
    }
    .main-category-price #slider-range
    {
    	margin-bottom: 20px;
    }
    .main-category-price #company
    {
    	border-top:1px solid #F2F2F2;
    }
    ul.company
    {
    	list-style-type: none;
    	margin: 0px;
    	padding: 0px;
    }
    ul.company > li 
    {
    	border-top: 1px #F2F2F2 dashed;
    	padding-top: 2px;
    	padding-bottom: 2px;
    }
    ul.company > li > a
    {
    	text-decoration: none;
    	margin-left: 5px;
    	font-size: 13px;
    	color: #666;
    }
    ul.company > li > a:hover
    {
    	color: #58ACFA;
    }
    .like-box
    {
    	padding: 8px;
    	border: 1px solid #F2F2F2;
    	border-radius: 2px;
    	margin-bottom: 20px;
    }
    .head-main-content
    {
    	width: 99%;
    	height: 30px;
    	padding: 5px;
    	background: #F2F2F2;
    	margin-top: 10px;
    }
    .head-main-content h4
    {
    	width: 80px;
    	float: left;
    	font-size: 13px;
    	color: #555;
    	margin-left: 20px;
    	margin-top: 5px;
    }
    .head-main-content select
    {
    	width: 200px;
    	float: left;
    	margin-left: 0px;
    }
    .head-main-content i
    {
        font-style: normal;
        font-size: 13px;
        margin-top: 5px;
        margin-left: 50%;
        float: left;
    }
    .product-view
        {
        width: 100%;
    	height: auto;
    	padding: 5px;
    	margin-top: 10px;
        }
    .product-view > ul
    {
    	list-style-type: none;
    	margin: 0px;
    }
    .product-view > ul >li 
    {
    	width: 225px;
    	float: left;
    	margin-left: 0px;
    	text-align: center;
    	margin-bottom: 20px;
        height: 230px;
    }
    .product-view a h3
    {
    	color: #444444;
    	font-size: 12px;
    	font-weight: normal;
    	text-align: left;
    	line-height: 20px;
    	padding: 10px;

    }
    .product-view a:hover , .product-view a h3:hover
    {
    	color: #58ACFA;
    }
    .product-view h4
    {
    	color: #444444;
    	font-size: 12px;
    	font-weight: bold;
    	text-align: left;
    	line-height: 20px;
    	padding: 10px;
    	margin-top: 0px;
    	padding-top: 0px;
    }
    .link
    {
        width: 99%;
        height: 30px;
        float: left;
        background: #F2F2F2;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .link ul
    {
        list-style-type: none;
    }
    .link ul li
    {
        width: 20px;
        float: left;
        padding: 5px;
        font-size: 13px;
        color: #333;
        margin-right: 10px;
        font-weight: bold;
        text-align: center;
        background: #FFF;
        border: 1px solid #F2F2F2;
    }
    .link ul li a
    {

        color: #fff;
        
    }
    .link ul li a:hover
    {
        text-decoration: none;
    }
    .link ul li.url
    {
       background: #58ACFA; 
    }
    .link ul li.strong
    {
       background: #58ACFA; 
       width: 50px;
    }
    .submit
    {
        width: 100%;
        height: 40px;
        line-height: 20px;
        text-align: center;
        margin-bottom: 20px;
    }
</style>
<div class="category">
<h1><?php if($category != NULL)echo $category['0']['pcname']; ?></h1>
<div class="main-category-type ">
        <h4>DANH MỤC SẢN PHẨM</h4>
        <ul>
        	<li class="changtype" id="all"><a href="#">Tất cả </a></li>
            <?php
        		foreach ($listtype as $value) {
        			echo '<li class="changtype" id="'.$value['ptid'].'"><a href="#">'.$value['ptname'].'</a></li>';
        		}
        	?>
        </ul> 
    </div>  
<div class="main-category-price">
<h4>MUA THEO </h4>
<p>
  <label for="amount"><b>Giá</b></label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
<div id="slider-range" style="height:250px;"></div>
<button style="border-radius:0px;background: #58ACFA; border: 0px; color: #FFF" class="btn-large btn-block submit" type="button"><i class="icon-ok icon-white"></i>LỌC</button>
<p id="company">
  <label for="amount"><b>Thương hiệu</b></label>
</p>
<ul class="company">
  	<?php
  		foreach ($listcompany as $value) {
  			echo '<li class="changcompany" id="'.$value['cid'].'"><a href="#">'.$value['cname'].' ( '.$value['count'].' )</a></li>';
  		}
  	?>
  </ul> 
</div>
<div class="like-box" >
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=589494401120882&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/uitshop" data-width="210" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
</div>
</div>
<div class="main-content">
<div class="head-main-content">
<h4>Xếp theo </h4>
<select class="target">
  <option value="DEFAULT">Hàng mới nhập </option>
  <option id="asc" value="ASC">Tên: A đến Z </option>
  <option id="desc" value="DESC">Tên: Z đến A </option>
  <option value="PRICEDESC">Giá: Cao đến thấp </option>
  <option value="PRICEASC">Giá: Thấp đến cao </option>
</select>
<i><?php echo $curent; ?></i>
</div>
<div class="product-view">
<ul>
<?php
if($category != NULL)
{
foreach ($category as $value) {
			$img1 = $value['productimages'];
            $img2 = explode(',', $img1);
            $img3 = $img2[0];
            $img4 = str_replace('[', '', $img3);
            $img5 = str_replace(']', '', $img4);
            $img6 = str_replace('"', '', $img5);
            $value['productname'] = str_replace("(", "",$value['productname']);
            $value['productname'] = str_replace(")", "",$value['productname']);
            $value['productname'] = str_replace("&", "",$value['productname']);
            $value['productname'] = str_replace("+", "",$value['productname']);
            $value['productname'] = str_replace("'", "",$value['productname']);
            $value['productname'] = str_replace('"', "",$value['productname']);
            $value['productname'] = str_replace('%', "",$value['productname']);
            $value['productname'] = str_replace('\\', "-",$value['productname']);
            $value['productname'] = str_replace('/', "-",$value['productname']);
            $url = str_replace(",", "", vn2latin($value['productname'], true));
	echo '<li><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html">
			<img alt="'.$value['productname'].'" title="'.$value['productname'].'" class="lazy" data-src="'.base_url().'upload/'.$img6.'" width="150px">
			<a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html"><h3>'.$value['productname'].'</h3></a>
			<h4>'.price($value['productprice']).' VNĐ</h4>
			</a>
			</li>';
}
}
?>
</ul>
</div>
<div class="link">
<ul>
<?php
$count = 0;
for($i=$curentpage-1; $i<=$total; $i++ )
{
    if($i == $curentpage)
    {
        echo '<li>'.$i.'</li>';
    }else if($i == 0)
    {

    }else if ($i == $curentpage-1)
    {
        echo '<li class="strong" class="url"><a href="?page='.($i-1).'&dir='.$orderby.'&com='.$com.'&type='.$type.'">Trước</a></li>';
    }
    else
    {
        echo '<li class="url"><a href="?page='.($i-1).'&dir='.$orderby.'&com='.$com.'&type='.$type.'">'.$i.'</a></li>';
    }
    $count++;
}
?>
</ul>
</div>
</div>
<?php
$this->load->view("bottom");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
  $(function() {
    bt1 = <?php echo $bt1; ?>;
    bt2 = <?php echo $bt2; ?>;
    $( "#slider-range" ).slider({
      orientation: "vertical",
      min: 100000,
      max: 50000000,
      range: true,
      values: [ bt1, bt2],
      slide: function( event, ui ) {
        $( "#amount" ).val(ui.values[ 0 ] + " VND - " + ui.values[ 1 ] +" VND").css({"font-size":"13px"});
        bt1 = ui.values[ 0 ];
        bt2 = ui.values[ 1 ];
      }
    });
    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
      " VND - " + $( "#slider-range" ).slider( "values", 1 )+" VND" ).css({"font-size":"13px"});
    //
    curentURL = document.URL;
    curentURL = curentURL.split('?');
    if(curentURL['1'] != null){
    get = curentURL['1'].split('&');
    if(get['1'] != null)
    {
        get2  = get['1'].split('=');
        switch(get2['1'])
        {
            case "ASC":
                $('.target option:nth-child(2)').attr("selected","selected");
            break;
            case "DESC":
                $('.target option:nth-child(3)').attr("selected","selected");
            break;
            case "PRICEASC":
                $('.target option:nth-child(5)').attr("selected","selected");
            break;
            case "PRICEDESC":
                $('.target option:nth-child(4)').attr("selected","selected");
            break;
            default:
                $('.target option:nth-child(1)').attr("selected","selected");
                break;
        }
    }
}
    $('.target').change(function(){
        target = $('.target option:selected').attr("value");
        page = <?php echo $curentpage-1; ?>;
        com = <?php echo $com; ?>;
        type = <?php echo $type; ?>;
        location.href=curentURL['0']+'?page='+page+'&dir='+target;
       
    });
    $('.changcompany').click(function(){
        page = <?php echo $curentpage-1; ?>;
        location.href=curentURL['0']+'?page='+page+'&com='+$(this).attr('id');
    });
    $('.changtype').click(function(){
        page = <?php echo $curentpage-1; ?>;
        location.href=curentURL['0']+'?page='+page+'&type='+$(this).attr('id');
    });
    $('.submit').click(function(){
        target = $('.target option:selected').attr("value");
        page = <?php echo $curentpage-1; ?>;
        com = <?php echo $com; ?>;
        type = <?php echo $type; ?>;
        location.href=curentURL['0']+'?page='+page+'&dir='+target+'&bt1='+bt1+'&bt2='+bt2;
    });
  });
  jQuery(document).ready(function() {
    jQuery("img.lazy").lazy(
    	{delay: 100});
	});
  </script>