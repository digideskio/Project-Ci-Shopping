<h2>Các Hóa Đơn</h2>
<div id="oderlist">
	<table  cellspacing="0" border="0">
<tr>
	<td id="title">#</td>
	<td id="title">Tên khách hàng</td>
	<td id="title">Số điện thoại</td>
	<td id="title">Mã hóa đơn</td>
	<td id="title">Tổng tiền</td>
	<td id="title">Ngày thuê</td>
	<td id="title">Ngày hết hạn</td>
	<td id="title">Xóa</td>
</tr>
<?php
$stt=0;
if($data!= null){
foreach ($data as $key) {
	$stt++;
	echo '<tr>';
    echo '<td>'.$stt.'</td>';
    echo '<td>'.$key['book2_bill_customer_fullname'].'</td>';
    echo '<td>'.$key['book2_bill_phone'].'</td>';
    echo '<td>'.$key['book2_bill_code'].'</td>';
    echo '<td>'.$key['book2_bill_price1'].'</td>';
    if($key['book2_bill_date_start'] !='0000-00-00'){
    echo '<td>'.$key['book2_bill_date_start'].'</td>';
	}else
	{
		echo '<td>Chưa cập nhật</td>';
	}
	if($key['book2_bill_date_end']!='0000-00-00'){
    echo '<td>'.$key['book2_bill_date_end'].'</td>';
	}else
	{
		echo '<td>Chưa cập nhật</td>';
	}
    echo '<td><a href="'.base_url().'backend/oder/del/'.$key['book2_bill_id'].'">Xóa</a></td>';
	echo '</tr>';
  }
}else
{
	echo '<tr><td colspan="9">Không có kết quả nào</td></tr>';
}
?>
</table>
</div>	