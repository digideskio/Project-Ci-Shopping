<div class="profile-link">
<a href="<?php echo base_url(); ?>frontend/customer/payment/bill">Lịch sử giao dịch</a>
<a href="<?php echo base_url(); ?>frontend/customer/payment/book">Các sách đã từng thuê</a>
<a href="<?php echo base_url(); ?>frontend/customer/nganluong/add">Nạp tiền</a>
</div>
<div class="title">
<h3>Các hóa đơn</h3>
</div>
<div class="content">
<table cellspacing="0" border="0">
		<tr id="title">
			<td>STT</td>
			<td>Người nhận</td>
			<td>Điện thoại</td>
			<td>Địa chỉ nhận</td>
			<td>Thanh toán</td>
			<td>Trạng thái</td>
			<td>Ngày thuê</td>
			<td>Ngày trả</td>
			<td>Tiền phạt</td>
		</tr>
		<?php
			$stt = 0;
			foreach($info as $item){
				$stt++;
				echo "<tr>";
				echo "<td><a href='".base_url()."frontend/customer/payment/detail/$item[book2_bill_code]'>$stt</a></td>";
				echo "<td>$item[book2_bill_customer_fullname]</td>";
				echo "<td>$item[book2_bill_phone]</td>";
				echo "<td>$item[book2_bill_address]</td>";
				echo "<td>$item[book2_bill_price1]</td>";
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$end = $item['book2_bill_date_end'];				
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
				}elseif($end == "0000-00-00")
				{
					echo "<td>Chưa nhận</td>";
				}
				echo "<td>$item[book2_bill_date_start]</td>";
				echo "<td>$item[book2_bill_date_end]</td>";
				echo "<td>$item[book2_bill_bonus]</td>";
				echo "</tr>";			
			}
		?>
	</table>
	<div id="page_link" align="center">
		<?php echo $pagination;?>
	</div>
</div>	