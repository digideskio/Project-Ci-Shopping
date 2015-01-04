<div class="profile-link">
<a href="<?php echo base_url(); ?>frontend/customer/payment/bill">Lịch sử giao dịch</a>
<a href="<?php echo base_url(); ?>frontend/customer/payment/book">Các sách đã từng thuê</a>
<a href="<?php echo base_url(); ?>frontend/customer/nganluong/add">Nạp tiền</a>
</div>
<div class="title">
<h3>Chi tiết hóa đơn</h3>
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
<div class="content">
<table cellspacing="0" border="0">
		<tr id="title">
			<td>Người nhận</td>
			<td>Điện thoại</td>
			<td>Địa chỉ nhận</td>
			<td>Thanh toán</td>
			<td>Trạng thái</td>
			<td>Ngày thuê</td>
			<td>Ngày trả</td>
			<td>Tiền khác</td>
		</tr>
		<?php
			foreach($detail as $item){
				$qty = $item['book2_bill_qty'];
				$end = $item['book2_bill_date_end'];
				echo "<tr>";
				echo "<td>$item[book2_bill_customer_fullname]</td>";
				echo "<td>$item[book2_bill_phone]</td>";
				echo "<td>$item[book2_bill_address]</td>";
				echo "<td>$item[book2_bill_price1]</td>";
				date_default_timezone_set('Asia/Ho_Chi_Minh');				
				if(date('Y-m-d') < $end && $end != "0000-00-00" ){ 
   	 				$status = $item['book2_bill_status'];
					if($item['book2_bill_status']==1)
					{
						echo "<td>Đang thuê</td>";
					}elseif ($item['book2_bill_status']==3) {
						echo "<td>Đã trả</td>";
					}
				}elseif(date('Y-m-d') >= $end && $end != "0000-00-00" )
				{
					echo "<td>Hết hạn</td>";
					$status = 2;					
				}elseif($end == "0000-00-00")
				{
					echo "<td>Chưa nhận</td>";
					$status=0;
				}
				echo "<td>$item[book2_bill_date_start]</td>";
				echo "<td>$item[book2_bill_date_end]</td>";
				echo "<td>$item[book2_bill_bonus]</td>";
				echo "</tr>";	
				break;
				exit();		
			}
		?>
</table>
<br />	
<table cellspacing="0" border="0">
		<tr id="title">
			<td>STT</td>
			<td>Tên sách</td>
			<td></td>
			<td>Giá thuê</td>
			<td>Số lượng</td>
		</tr>
		<?php
			$stt = 0;
			foreach($detail as $item){
				$stt++;
				echo "<tr>";
				echo "<td>$stt</td>";
				echo "<td><img src='".base_url()."$item[book2_bill_detail_book_image]'></td>";
				echo "<td><a href='".base_url()."frontend/product/index/$item[book2_bill_detail_book_id]'>$item[book2_bill_detail_book_name]</td>";
				echo "<td>$item[book2_bill_detail_book_price1]</td>";
				echo "<td>$item[book2_bill_detail_book_qty]</td>";
				echo "</tr>";			
			}
		?>
	</table>
	<form action="" method="post">
	GIA HẠN :  
	<select name="addtime">
	<?php
		foreach ($addtime as $key) {
			# code...
			echo '<option value="'.$key['book2_addtime_date'].'">'.$key['book2_addtime_name'].' - '.$key['book2_addtime_date']*(1000).' VNĐ / 1 sản phẩm</option>';
		}
	?>	
	</select>
	<input name="status" type="hidden" value="<?php echo $status; ?>">
	<input name="qty" type="hidden" value="<?php echo $qty; ?>">
	<input name="end" type="hidden" value="<?php echo $end; ?>">
	<button name="submit-addtime" type="submit">Xác nhận</button>	
	</form>
</div>	