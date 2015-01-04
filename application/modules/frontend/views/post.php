<?php
$this->load->view("top");
?>
<style>
    .menu > ul >li:nth-child(3)
    {
        background: #58ACFA;
        color: #FFF;
    }
    .menu > ul >li:nth-child(3) > a{
        color: #FFF;
    }
    .menu > ul >li >ul >li
    {
        border: none;
    }
    .article
    {
        width: 70%;
        float: left;
        height: auto;
    }
    .article > h1{
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: bold;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .content ul, li
    {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .content ul{
        border-bottom: none;
    }
    .content ul
    {
        margin-bottom: 20px;
    }
    .content > h3, h3 > a{
        font-size: 18px;
        color: #444;
        text-transform: uppercase;
        font-weight: bold;
        text-decoration: none;
        padding-bottom: 5px;
        width: 100%;

    }
    .content a:hover{
        text-decoration: none;
        color: #58ACFA;
    }
    .date{
        width: 13.5%;
        padding-left: 1%;
        float: left;
        height: 50px;
        border-top: 1px solid #F2F2F2;
        border-right: 1px solid #F2F2F2;
        padding-top: 5px;
    }
    .author
    {
        width: 18.5%;
        float: left;
        padding-left: 1%;
        height: 50px;
        border-top: 1px solid #F2F2F2;
        border-right: 1px solid #F2F2F2;
        padding-top: 5px;
    }
    .view{
        width: 64%;
        padding-left: 1%;
        float: left;
        height: 50px;
        border-top: 1px solid #F2F2F2;
        padding-top: 5px;
    }
    .date b, .author b, .view b
    {
        font-size: 11px;
        color: #BDBDBD;
    }
    .date small, .author small, .view small
    {
        font-size: 11px;
    }
    .content img
    {
        margin-left: 1%;
        border: 1px solid #F2F2F2;
        overflow: hidden;
        display: block;
        width: 750px;
        height: 350px;
        margin-top: 5%;
    }
    .content p{
        padding-left: 1%;
        width: 750px;
    }
    .content .comment{
        width:100%;
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 20px;
        font-weight: bold;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .custom
    {
        background: url(<?php echo base_url(); ?>upload/September2014030321PMbgmail.gif) repeat-x;
        width:30%;
        float:left;
        height: 165px;
        text-align:center;
        margin-top:10px;
    }
    .custom h4
    {
        margin: 10px 0;
        font-weight: bold;
        font-size:14px;
        line-height: 1;
        color: #444;
        text-rendering: optimizelegibility;
        margin-top:10px;
    }
    input.mail, input.name
    {
        border-radius:0px;
        width:250px;
        height:30px;
        line-height:30px;
        margin:2px;
    }
    .border
    {
        border-bottom : 1px solid #F2F2F2;
        height:1px;
        width:100%;
        margin-left:1%;
    }
    .border1
    {
        margin-top:10px;
        height:1px;
        width:100%;
    }
    input.search-aticle-input
    {
        border-radius:0px;
        width:250px;
        height:30px;
        line-height:30px;
        margin:2px;
        margin-right:0;
    }
    button.search-aticle-submit
    {
        border-radius:0px;
        height:30px;
        margin-top:2px;
    }
    .topview
    {
        width:30%;
        height:auto;
        float:left;
        margin-bottom:20px;
    }
    .topview h1
    {
        font-size:16px;
        color:#FFF;
        background:#333;
        padding-left:15px;
        margin-bottom:0px;
    }
    .topview ul, li
    {
        list-style-type:none;
        border:none;
    }
    .topview ul
    {
        padding:0px;
        margin:0px;
    }
    .topview ul li
    {
        height:40px;
        background:#FFF;
        padding-left:10px;
        padding-right:10px;
        padding-top:5px;
        padding-bottom:5px;
        border-bottom:1px dashed #eaeaea;
    }
    .topview ul li:hover
    {
        background:#F2F2F2;
    }
    .topview ul li a
    {
        color:#333;


    }
    .topview ul li a:hover
    {
        text-decoration: none;
    }
</style>
</style>
<div class="article">
    <h1>TIN CÔNG NGHỆ - ĐÁNH GIÁ - THỦ THUẬT</h1>
    <div class="content">
        <ul>
            <?php
            $date = date_create($article['datecreated']);
            if ($article['img'] != "[]") {
                $img = $article['img'];
                $img = str_replace("[", "", $img);
                $img = str_replace("]", "", $img);
                $img = str_replace('"', "", $img);
            } else {
                $img = September2014113421AMno - image . jpg;
            }
            $url = str_replace(",", "", vn2latin($article['title'], true));
            echo '<li>';
            echo '<h3><a href="' . base_url() . 'bai-viet/' . $url . '_post' . $article['id'] . '.html">' . $article['title'] . '</a></h3>';
            echo '<div class="date"><b>Ngày đăng</b><br /><small>' . date_format($date, "d-m-Y") . '</small></div>';
            echo '<div class="author"><b>Người đăng</b><br /><small>' . $article['fullname'] . '</small></div>';
            echo '<div class="view"><b>Lượt xem</b><br /><small>' . $article['view'] . '</small></div>';
            echo '<a href="' . base_url() . 'bai-viet/' . $url . '_post' . $article['id'] . '.html"><img alt="' . $article['title'] . '" src="' . base_url() . 'upload/' . $img . '"></a>';
            echo "<div class='border1' id='fb-root'></div>
            <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=589494401120882&version=v2.0';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class='fb-like' data-href='" . base_url() . 'bai-viet/' . $url . '_post' . $article['id'] . "'.html' data-layout='standard' data-action='like' data-show-faces='true' data-share='true'></div>";
            echo "<div class='border'></div>";
            echo '<p class="bai-viet">' . $article['content'] . '</p>';
            echo '</li>';
            ?>
        </ul>
        <h1 class="comment">BÌNH LUẬN</h1>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=589494401120882&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-comments" data-href="<?php echo  base_url() . 'bai-viet/' . $url . '_post' . $article['id'] . ".html"; ?>" data-width="797" data-numposts="5" data-colorscheme="light"></div>
        <div>
        </div>
        <?php
        $this->load->view("bottom");
        ?>
    
        <div class="custom">
            <div>
                <h4>NHẬN BẢN TIN QUA EMAIL</h4>
                <input class="span3 name" type="text" placeholder="Họ và tên ">
                <input class="span3 mail" type="text" placeholder="Địa chỉ email của bạn ">
                <button style="margin-top: 10px; height: 30px; width: 100px;border-radius:0px;background: #58ACFA; border: 0px; color: #FFF; " class="btn-small submit" type="button">ĐĂNG KÍ </button>
            </div>
        </div>
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
        <div class="search-aticle">
            <div class="input-append">
                <input placeholder="Tìm kiếm bài viết" class="span3 search-aticle-input" id="appendedInputButton" type="text">
                <button  class="btn search-aticle-submit" type="button">Tìm kiếm </button>
            </div>
        </div>
        <div class="topview">
            <h1>BÀI VIẾT ĐƯỢC XEM NHIỀU NHẤT </h1>
            <ul>
                <?php
                foreach ($topview as $v) {
                    $url1 = str_replace(",", "", vn2latin($v['title'], true));
                    echo '<li><a href="' . base_url() . 'bai-viet/' . $url1 . '_post' . $v['id'] . '.html">' . $v['title'] . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=589494401120882&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div>
            <div class="fb-like-box" data-href="https://www.facebook.com/uitshop" data-width="341" data-height="256" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
        </div>
        <?php
        $this->load->view('bottom');
        ?>
        

