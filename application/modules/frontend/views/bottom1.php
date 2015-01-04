</div>
 </div>
 <div class="bottom">
 	<div class="head-bottom">
 		<h1><i class="icon-white icon-envelope"></i> Đăng kí nhận bản tin - Nhiều Tiện Lợi và Ưu Đãi đang chờ bạn! <i class="icon-white icon-hand-right"></i> 
 			<input class="span3 name" type="text" placeholder="Họ tên của bạn ">
 			<input class="span3 mail" type="text" placeholder="Địa chỉ email của bạn ">
 			<button class="btn-small submit" type="button">ĐĂNG KÍ</button>
 		</h1>
 		
 	</div>
 	<div class="main-bottom">
 		<ul class="ul1">
 		<h1>Đang kinh doanh</h1>
 		<?php
 			foreach($listcate as $v)
 			{
 				$v['pcname'] = str_replace("(", "",$v['pcname']);
            	$v['pcname'] = str_replace(")", "",$v['pcname']);
            	$v['pcname'] = str_replace("&", "",$v['pcname']);
            	$v['pcname'] = str_replace("+", "",$v['pcname']);
            	$v['pcname'] = str_replace("'", "",$v['pcname']);
            	$v['pcname'] = str_replace('"', "",$v['pcname']);          
            	$v['pcname'] = str_replace('%', "",$v['pcname']);
            	$v['pcname'] = str_replace('/', "-",$v['pcname']);
            	$v['pcname'] = str_replace('\\', "-",$v['pcname']);
            	$url = str_replace(",", "", vn2latin($v['pcname'], true));
 				echo '<li><a href="'.base_url().'danh-muc/'.$url.'_post'.$v['pcid'].'.html">'.$v['pcname'].'</a></li>';
 			}
 		?>
 		</ul>
 		<ul class="ul2">
 		<h1>Tiện ích </h1>
 		<li><a href="<?php echo base_url(); ?>bai-viet.html">Tin công nghệ</a></li>
 		<li><a href="<?php echo base_url(); ?>bai-viet.html">Đánh giá sản phẩm công nghệ</a> </li>
 		<li><a href="<?php echo base_url(); ?>bai-viet.html">Thủ thuật</a> </li>
 		</ul>
 		<ul class="ul3">
 		<h1>Trợ giúp </h1>
 		<li><a href="<?php echo base_url(); ?>giao-dich-van-chuyen.html">Thanh toán và nhận hàng</a></li>
 		</ul>
 		<ul class="ul4">
 		<h1>IT Shop</h1>
  		<li><a href="<?php echo base_url(); ?>gioi-thieu.html">Giới thiệu</a></li>
   		<li><a href="<?php echo base_url(); ?>lien-he.html">Liên hệ</a></li>
 		</ul>
 		<ul class="ul5">
 		<h1>ĐẶt hàng </h1>
 		<li>( Quang Thái )</li>
 		<li><strong>0919 010 900</strong></li>
 		<li><strong>0979 010 949</strong></li>
 		<li><strong>0906 060 090</strong></li>
 		</ul>
 	</div>
 	<div class="bottom-bottom">
 	<h1>Sản phẩm, danh mục mới & nổi bật</h1>
 	<p>
 		<?php
 			foreach ($listtags as $value) {
 				echo '<a href="'.base_url().'tag/'.$value['tagsname'].'">'.$value['tagsname'].'</a>, ';
 			}
 		?>
 	</p>
 	</div>
 	<div class="copyright">
 	<p>
 	&copy 2014 - Bản quyền thuộc về IT SHOP 
 	</p>
 	</div>
 </div>
</body>
</html>
<style type="text/css">
.bottom
{
	width: 90%;
	height: auto;
	background: #FFF;
	position: absolute;
	top:2950px;
	left: 5%;
}
.head-bottom
{
	width: 100%;
	height: 30px;
	background: #00b7f1;
	padding-bottom: 8px;
}
.head-bottom h1
{
	height: 50px;
	margin-left: 1%;
	font-size: 13px;
    font-weight: normal;
    text-transform: uppercase;
    color: #FFF;
}
.head-bottom h1 input
{
	border-radius: 0px;
	height: 30px;
	margin-top: 3.5px;
	margin-left: 10px;
	border:none;
}
.head-bottom h1 button
{
	padding: 6px 20px;
	box-shadow: 0 -2px 0 #27870a inset;
	display: inline-block;
	vertical-align: top;
	width: 150px;
	height: 30px;
	background: linear-gradient(to bottom, #58bf0f 1%, #42aa0d 100%);
	border-radius: 5px;
	border:none;
	color: #FFF;
	margin-top: 3.5px;
	margin-left: 15px;
	font-weight: bold;

}
.main-bottom
{
	width: 98%;
	height: auto;
	margin-left: 1%;
	margin-bottom: 20px;
}
.main-bottom ul
{
	list-style-type: none;
	margin: 0px;
	padding: 0px;
	width: 20%;
	float: left;
}
.main-bottom h1
{
	font-size: 16px;
	color: #333;
	text-transform: uppercase;
}
.main-bottom a
{
	color: #999;
	font-size: 13px;
}
.main-bottom a:hover
{
	text-decoration: none;
}
.bottom-bottom
{
	width: 100%;
	border-top: 1px solid #F2F2F2;
	padding-top: 0px;
	margin-top: 10px;
	height: 100px;
	float: left;
}
.bottom-bottom h1
{
	font-size: 16px;
	color: #333;
	text-transform: uppercase;
	width: 98%;
	margin-left: 1%;
	color: #888;
}
.bottom-bottom p
{
	width: 98%;
	margin-left: 1%;
	height: auto;
	padding-bottom: 20px;
	border-bottom: 1px solid #F2F2F2;
	color: #888;
}
.bottom-bottom p a
{
	font-size: 13px;
	color: #888;
}
.copyright
{
	width: 98%;
	margin-left: 1%;
	height: auto;
	color: #888;
	padding-bottom: 20px;
	padding-top: 20px;
	float: left;
}
.copyright p
{
	padding-top: 20px;
}
</style>
<script>
            $('.submit').click(function(){
                var name = $('.name').val();
                var mail = $('.mail').val();
                checkMail = validateEmail(mail);
                checkName = validateString(name);
                if(checkName == true)
                {
                    if(checkMail == true)
                    {
                        $.ajax({
                        url: baseUrl + 'frontend/process/insertEmail',
                        type: 'POST',
                        data: {name : name, mail:mail},
                        success: function (data)
                        {
                            if (window.confirm('Đăng kí của bạn đã được gửi đi '))
                            {
                                setTimeout("location.reload(true);", 2000);
                            }
                            else
                            {
                                // They clicked no
                            }

                        }
                    });
                    }else{
                        
                        alert('Địa chỉ email không hợp lệ.');
                    }
                }else{
                    alert('Vui lòng nhập họ tên.');
                }
            });
        </script>