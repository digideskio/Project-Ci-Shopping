<?php
$this->load->view("top");
?>
<style type="text/css">
    .menu > ul >li:nth-child(6)
    {
        background: #58ACFA;
    }
    .menu > ul >li:nth-child(6) > a{
        color: #FFF;
    }
    .form-contact
    {
        width: 40%;
        float: left;
        background: #FFF;
        height: 540px;
    }
    .form-contact > h1{
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 18px;
        font-weight: bold;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .form
    {
        border: 1px solid #ddd;
        border-radius: 3px;
        margin-bottom: 21px;
        padding:14px 14px 10px;
        height: 370px;
        color: #585858;
    }
    .form > input{
        height: 30px;
        width: 250px;
        margin-left: 160px;
        border-radius: 0px;
    }
    .form > textarea
    {
        height: 100px;
        width: 250px;
        margin-left: 160px;
        border-radius: 0px;
    }
    .content
    {
        width: 58%;
        background: #FFF;
        float: left;
        height: 525px;
        border-top: 3px solid #F2F2F2;
        margin-top: 15px;
        margin-left:2%;
    }
    .content > h3 
    {
        color: #333;
        font-size: 18px;
        font-weight: bold;
        line-height: 24px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
    .content .quote
    {
        background-image: url(<?php echo base_url(); ?>upload/September2014031429PMicon-contact-info-quote.png);
        background-position: left top;
        background-repeat: no-repeat;
        border-bottom: 1px solid #ddd;
        color: #666;
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        padding-left: 54px;
    }
    .bottom
    {
        top:700px !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $('.submit').click(function () {
            var tieude = $('.tieude').val();
            var noidung = $('.noidung').val();
            var hoten = $('.hoten').val();
            var mail = $('.mail').val();
            var phone = $('.phone').val();
            checkMail = validateEmail(mail);
            checkNoidung = validateString(noidung);
            checkTieude = validateString(tieude);
            checkHoten = validateString(hoten);
            if (checkTieude == true && checkNoidung == true && checkHoten == true)
            {
                if (mail != '' && checkMail == true || mail == '')
                {
                    $.ajax({
                        url: baseUrl + 'frontend/process/insertContact',
                        type: 'POST',
                        data: {tieude: tieude, noidung: noidung, hoten: hoten, mail: mail, phone: phone},
                        success: function (data)
                        {
                            if (window.confirm('Liên hệ của bạn đã được gửi đi '))
                            {
                                setTimeout("location.reload(true);", 2000);
                            }
                            else
                            {
                                // They clicked no
                            }

                        }
                    });
                } else
                {
                    alert('Địa chỉ email không hợp lệ ! Vui lòng nhập lại hoặc bỏ trống !');
                }
            } else
            {
                alert('Vui lòng nhập đầy đủ thông tin  !');
            }
        });
    });
</script>
<div class="form-contact">
    <h1>IT SHOP XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH </h1>
    <div class="form">
        Tiêu đề * <input class="span3 tieude" type="text"><br />
        Nội dung * <textarea class="span3 noidung"></textarea><br />
        Họ và tên * <input class="span3 hoten" type="text"><br />
        Địa chỉ email <input class="span3 mail" type="text"><br />
        Số điện thoại <input class="span3 phone" type="text"><br />
    </div>
    <button style="border-radius:0px;background: #58ACFA; border: 0px; color: #FFF" class="btn-large btn-block submit" type="button">GỬI LIÊN HỆ </button>
</div>
<div class="content">
    <h3>Thông Tin Liên Hệ Khác</h3>
    <div class="quote">Tìm cửa hàng IT shop ? Xin mời ghé thăm trang <a href="#" title="Tìm cửa hàng " target="_blank">Tìm cửa hàng </a> để xem bản đồ và địa chỉ các cửa hàng trên toàn quốc.</div>
    <div><?php echo $contact['content']; ?></div>
</div>
<?php
$this->load->view('bottom');
?>

