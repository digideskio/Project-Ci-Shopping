</div>
<div class="bottom">
<div id="help">
<ul><h3>Hỗ trợ khách hàng</h3>
	<li>Hotline : <font style="color:#DF3A01">0123456789</font></li>
	<li><a href="">Các câu hỏi thường gặp</a></li>
	<li><a href="">Chính sách thuê trả sách</a></li>
	<li><a href="">Phương thức vận chuyển</a></li>
	<li><a href="">Hướng dẫn đặt hàng</a></li>
</ul>	
</div>
<div id="ulaccount">
<ul><h3>Tài khoản của bạn</h3>
	<li><a href="<?php echo base_url(); ?>frontend/checkout/cart">Xem giỏ hàng</a></li>
	<li><a href="<?php echo base_url(); ?>frontend/customer/payment/bill">Lịch sử đơn hàng</a></li>
	<li><a href="<?php echo base_url(); ?>frontend/customer/account/profile">Thông tin tài khoản</a></li>
	<li><a href="<?php echo base_url(); ?>frontend/customer/account/forgotpassword">Quên mật khẩu</a></li>
	<li><a href="">Chính sách bảo mật</a></li>
	<li><a href="">Điều khoản sử dụng</a></li>
</ul>	
</div>
<div id="about">
<ul><h3>Về Xrita</h3>
	<li><a href="">Giới thiệu Xrita</a></li>
	<li><a href="">Tuyển dụng</a></li>
	<li><a href="">Thông tin tham khảo</a></li>
</ul>	
</div>
<div id="copyright">
	© 2014 - Bản quyền của Công Ty Cổ Phần Xrita - Xrita.vn
</div>
</div>
<a href="#" class="back-to-top">TOP</a>
<script>
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
</script>
</body>
</html>