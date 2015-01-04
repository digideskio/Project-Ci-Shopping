<div class="profile-link">
<a href="<?php echo base_url(); ?>frontend/customer/payment/bill">Lịch sử giao dịch</a>
<a href="<?php echo base_url(); ?>frontend/customer/payment/book">Các sách đã từng thuê</a>
<a href="<?php echo base_url(); ?>frontend/customer/nganluong/add">Nạp tiền</a>
</div>
<div class="title">
<h3>Sách đã thuê</h3>
</div>
<div class="content">
<table cellspacing="0" border="0">
		<tr id="title">
			<td>STT</td>
			<td>Tên sách</td>
			<td></td>
			<td>Giá thuê</td>
			<td>Số lượng</td>;
		</tr>
		<?php
			$stt = 0;
			foreach($info as $item){
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
	<div id="page_link" align="center">
		<?php echo $pagination;?>
	</div>
</div>	