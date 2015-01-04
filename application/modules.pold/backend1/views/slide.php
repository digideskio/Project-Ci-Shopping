<h2>Slides Show</h2>
<div id="slider">
<?php
$data=array();
foreach ($list as $key) {
	$data[]=$key['book2_slider_url'];
}
if(isset($success))
	{
		foreach ($success as $value) {
			echo '<p id="success">'.$value.'</p>';
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">
<style type="text/css"> table,tr,td {border: none;}</style>
<table>
<tr><td><input type="file" name="file1"></td></tr>
<tr><td><img src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['0']; ?>"></td></tr>
<tr><td><input type="file" name="file2"></td></tr>
<tr><td><img src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['1']; ?>"></td></tr>
<tr><td><input type="file" name="file3"></td></tr>
<tr><td><img src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['2']; ?>"></td></tr>
<tr><td><input type="file" name="file4"></td></tr>
<tr><td><img src="<?php echo base_url(); ?>public/upload/slider/<?php echo $data['3']; ?>"></td></tr>
</table>
<input type="submit" id="submit" name="submit" value="Cập nhật">
</form>
</div>