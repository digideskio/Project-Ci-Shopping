<?php $this->load->view("pro"); ?>
<div class="title">
<h3>Giỏ hàng ( <?php if($this->cart->contents()){ echo $this->cart->total_items();}else{echo "0";} ?> sản phẩm) <a href="<?php echo base_url(); ?>">Tiếp tục mua hàng</a> <a href="<?php echo base_url(); ?>frontend/checkout/onpage"><button>Thực Hiện Thanh Toán</button></a></h3>
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
<div class="addcart">
<form action="" method="post">
	<?php 
	echo '<table cellspacing="0" border="0">';
	echo '<tr id="title"><td><h3>Tên sách</h3></td><td></td><td><h3>Giá thuê</h3></td><td><h3>Số lượng</h3></td><td><h3>Tổng tạm</h3></td></tr>';
	if($this->cart->contents()){
		$id=0;
	foreach ($this->cart->contents() as $key) {
		# code...
		$id++;
		echo '<tr>';
		echo '<td><img src="'.base_url().$key['options']['image'].'"></td>';
		echo '<td><a class="booklink" href="'.base_url().'frontend/product/index/'.$key['id'].'">'.$key['name'].'</a></td>';
		echo '<td>'.$key['price'].'</td>';
		echo '<td><input type="text" name="qty'.$id.'" value="'.$key['qty'].'" ><br /><a href="'.base_url().'frontend/checkout/cart/delete/'.$key['rowid'].'">Bỏ sản phẩm</a></td>';
		echo '<td><b>'.$key['price'].'</b></td>';
		echo '</tr>';
		echo '<input type="hidden" name="rowid'.$id.'" value="'.$key['rowid'].'">';
	}
	}else
	{
		echo '<tr><td colspan="5">Chưa có sản phẩm</td></tr>';
	}
	echo '<tr><td></td><td></td><td></td><td colspan="2"><button id="update-cart" type="submit" name="update-cart">Cập nhật giỏ hàng</button></td></tr>';
	echo '</table>';
	?>
</form>
</div>
<div class="submit-onpage">
<div class="submit-onpage-1">
<h4>Bạn cần phải <a href="<?php echo base_url(); ?>frontend/customer/account/login">đăng nhập</a> để thanh toán. | Chưa có tài khoản <a href="<?php echo base_url(); ?>frontend/customer/account/create">đăng kí</a> ngay.</h4>
<p>
Miễn phí vận chuyển : từ 100,000đ tại thành phố Hồ Chí Minh. <br />
Thanh toán an toàn và bảo mật <br />
<img src="<?php echo base_url(); ?>public/template/frontend/image/nganluong.jpg"><br />
Gia hạn hóa đơn trước ngày hết hạn.<br />
Gọi <b>(08) 1234 5678</b> để được Hỗ Trợ cả thứ 7 và Chủ nhật từ 8-21h.
</p>
</div>
<div class="submit-onpage-2">
<table>
<tr><td>Tổng sản phẩm</td><td><?php echo $this->cart->total_items(); ?></td></tr>
<tr><td><b>Tổng tạm</b></td><td><b><?php echo $this->cart->total(); ?> VNĐ</b></td></tr>
<tr><td><b>Thời gian thuê</b></td><td><b> 30 ngày</b></td></tr>
</table>
<h3>TỔNG CỘNG : <font style="color:#FF4000"><?php echo $this->cart->total(); ?> VNĐ</font></h3>
<a href="<?php echo base_url(); ?>frontend/checkout/onpage"><button>Thực Hiện Thanh Toán</button></a>
</div>
</div>