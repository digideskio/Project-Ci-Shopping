<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url(); ?>public/template/frontend/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>public/template/frontend/css/customer.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/template/frontend/js/style.js" ></script>
<script language="javascript" src="<?php echo base_url(); ?>public/template/frontend/js/jquery-1.9.1.min.js"></script>
<script src='<?php echo base_url(); ?>public/template/frontend/rating/jquery.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>public/template/frontend/rating/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<script src='<?php echo base_url(); ?>public/template/frontend/rating/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='<?php echo base_url(); ?>public/template/frontend/rating/jquery.rating.css' type="text/css" rel="stylesheet"/>
<link href='<?php echo base_url(); ?>public/template/frontend/css/checkout.css' type="text/css" rel="stylesheet"/>
<link href='<?php echo base_url(); ?>public/template/frontend/css/payment.css' type="text/css" rel="stylesheet"/>
<link href='<?php echo base_url(); ?>public/template/frontend/css/product.css' type="text/css" rel="stylesheet"/>
<title><?php echo $title; ?></title>
</head>

<body>
	<div class="top-bar">
	<div id="account">
	<?php if(!isset($this->session->userdata['customerid'])){
		echo '	
		<a href="'.base_url().'frontend/customer/account/login">Đăng Nhập</a> hoặc
		<a href="'.base_url().'frontend/customer/account/create">Đăng Kí</a> | 
		<a id="fogot" href="'.base_url().'frontend/customer/account/forgotpassword/">Quên mật khẩu ?</a>
		</div>
		';
		}else
		{
			echo '<h4>Xin chào <a href="'.base_url().'frontend/customer/account/profile">'.$this->session->userdata['customername'].'</a> | <a id="fogot" href="'.base_url().'frontend/customer/account/logout">Thoát</a></h4>';
		}
		?>
	</div>
	<div class="top-head">
		<div class="logo"><a href="<?php echo base_url(); ?>"><img width="100" src="<?php echo base_url(); ?>public/template/frontend/image/logo.png"></a>
		</div>
		<div class="search">
		<form action="<?php echo base_url(); ?>frontend/product/search" method="GET">
			<select name="keytype">
				<?php
				foreach ($searchoption as $key) {
					echo '<option value="'.$key['book2_search_option_value'].'">'.$key['book2_search_option_name'].'</option>';
				}
				?>
			</select>
			<input type="search" name="search"><button value="submit" type="submit" name="submit">TÌM</button> 
		</form>
		</div>
		<div class="mycart">
			<a href="<?php echo base_url(); ?>frontend/checkout/cart">Giỏ hàng</a> ( <?php if($this->cart->contents()){ echo $this->cart->total_items();}else{echo "0";} ?> )
		</div>
	</div>
	<div class="top-menu">
		<div id='cssmenu'>
			<ul>
			   <li class='active'><a href='<?php echo base_url(); ?>'><span>Home</span></a></li>
			   <li class='has-sub'><a href='#'><span>Sách</span></a>
			      <ul>
			      
			         <?php
			   		foreach ($cate as $key) {
			   			if($key['book2_category_parent_id']==0){
			   				echo "<li class='has-sub'><a href='#'><span>".$key['book2_category_name']."</span></a>";
			   				echo '<ul>';
			   				foreach ($cate as $value) {
			   					
			   					if($key['book2_category_id'] == $value['book2_category_parent_id'])
			   					{
			   						echo " <li><a href='".base_url()."frontend/product/category/".$value['book2_category_id']."'><span>".$value['book2_category_name']."</span></a></li>";
			   					}
			   					
			   				}
			   				echo '</ul>';
			   				echo "</li>";
			   			}
			   		}
			   		?>
			      </ul>
			   </li>
			   <li><a href='#'><span>Giới Thiệu</span></a></li>
			   <li class='last'><a href='#'><span>Liên Hệ</span></a></li>
			</ul>
			</div>
	</div>
	<div class="main">