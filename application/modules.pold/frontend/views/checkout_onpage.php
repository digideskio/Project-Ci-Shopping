<style type="text/css">
.address-customer
{
	width: 398px;
	float: left;
	height: 400px;
	border: 1px solid #BDBDBD;
	padding-left: 130px;
	padding-top: 20px;
	color: #585858;
	font-size: 15px;
	margin-bottom: 20px;
}
.address-customer h4
{
	font-size: 16px;
	font-family: Tahoma;
	margin-bottom: 10px;
	font-weight: normal;
	color: #2E2E2E;

}
.address-customer input
{
	width: 300px;
	height: 30px;
	line-height: 30px;
	margin-bottom: 10px;
	margin-top: 10px;
}
.address-customer textarea
{
	width: 300px;
	height: 100px;
	margin-bottom: 10px;
	margin-top: 10px;
}
.address-customer button
{
	width: 200px;
	height: 40px;
	line-height: 30px;
	font-weight: bold;
	color: #fff;
	background-color: #01A9DB;
	border: none;
	margin-left: 50px;
}
.address-customer button:hover
{
	background-color: #B40404;
}
.customer-bill
{
	width: 418px;
	float: left;
	height: 355px;
	border: 0px solid #BDBDBD;
	margin-left: 50px;
	color: #848484;
	padding: 30px;
	background-color: #E0F8F7;
}
.customer-bill table
{
	width: 416px;
	font-size: 13px;
	font-family: Tahoma;
}
.customer-bill #title
{
	font-size: 20px;
	border-bottom: 1px solid #BDBDBD;
}
.customer-bill #title a
{
	color: #09f;
	text-decoration: none;
	font-size: 16px;
}
.customer-bill #title a:hover
{
	text-decoration: underline;
}
.customer-bill table a 
{
	text-decoration: none;
	color: #848484;
}
.customer-bill table a:hover
{
	text-decoration: underline;
	color: #09f;
}
.customer-bill p
{
	background-color: #FAFAFA;
	height: 50px;
	line-height: 50px;
	font-weight: bold;
	text-align: center;
	font-family: Tahoma;
}
</style>
<?php $this->load->view("pro"); ?>
<div class="title">
<h3>Thuê Sách và Thanh Toán</h3>
</div>
<?php
		if(isset($error))
		{
			foreach ($error as $key) {
				echo '<div class="error">';
				echo $key.'</div>';
			}
		}
		if(isset($success))
		{
			foreach ($success as $key) {
				echo '<div class="success">';
				echo $key.'</div>';
			}
		}
	?>
<div class="address-customer">
<h4>Số dư Tài khoản của bạn : <font style="color:#FF4000"><b><?php echo $user['book2_user_point']; ?> VNĐ</b></font></h4>	
<h4>Thông tin giao hàng : </h4>
<form action="" method="post">
1. Tên khách hàng <br />
<input type="text" name="fullname"><br />
2. Số điện thoại <br />
<input type="text" name="phone"><br />
3. Địa chỉ giao hàng<br />
<textarea name="address"></textarea><br />
<button type="submit" name="submit-onpage">Thuê Sách và Thanh Toán</button>
<form>
</div>
<div class="customer-bill">
<table cellspacing="0" border="0">
<tr><td colspan="2" id="title"><b>Đơn Hàng</b> ( <?php echo $this->cart->total_items(); ?> sản phẩm ) <a href="<?php echo base_url(); ?>frontend/checkout/cart">Sửa</a></td></tr>
<?php
	foreach ($this->cart->contents() as $key) {
		echo '<tr><td><b>'.$key['qty'].' x </b><a href="'.base_url().'frontend/product/index/'.$key['id'].'">'.$key['name'].'</a></td><td>'.$key['price'].' VNĐ</td></tr>';
	}
?>
<tr id="total"><td><b>Tạm tính</b></td><td><b><font style="color:#FE642E" ><?php echo $this->cart->total(); ?> VNĐ</font></b></td></tr>
<tr><td><b>Thời gian thuê</b></td><td><b><font style="color:#FE642E" > 30 ngày </font></b></td></tr>
</table>
<p>TỔNG CỘNG <font style="color:#FE642E" ><?php echo $this->cart->total(); ?> VNĐ</font></p>
</div>