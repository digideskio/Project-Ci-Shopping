<?php
function vn2latin($cs, $tolower = false) {
    /* Mảng chứa tất cả ký tự có dấu trong Tiếng Việt */
    $marTViet = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
        "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề",
        "ế", "ệ", "ể", "ễ",
        "ì", "í", "ị", "ỉ", "ĩ",
        "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ",
        "ờ", "ớ", "ợ", "ở", "ỡ",
        "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
        "ỳ", "ý", "ỵ", "ỷ", "ỹ",
        "đ",
        "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă",
        "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
        "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
        "Ì", "Í", "Ị", "Ỉ", "Ĩ",
        "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
        "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
        "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
        "Đ", " ");

    /* Mảng chứa tất cả ký tự không dấu tương ứng với mảng $marTViet bên trên */
    $marKoDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
        "a", "a", "a", "a", "a", "a",
        "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
        "i", "i", "i", "i", "i",
        "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
        "o", "o", "o", "o", "o",
        "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
        "y", "y", "y", "y", "y",
        "d",
        "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
        "A", "A", "A", "A", "A",
        "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
        "I", "I", "I", "I", "I",
        "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
        "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
        "Y", "Y", "Y", "Y", "Y",
        "D", "-");

    if ($tolower) {
        return strtolower(str_replace($marTViet, $marKoDau, $cs));
    }

    return str_replace($marTViet, $marKoDau, $cs);
}
function price($price)
{
    $str = strval($price);
    $length = strlen($str);
    $count = 0;
    $string = array();
    for($i = $length - 1; $i >= 0 ; $i-- )
    {
        $count++;
        $string[]= $str[$i];
        if($count%3 == 0)
        {
            $string[]= '.';
        }
    }
    $text ="";
    $string2 = array();
    for($j = count($string) - 1 ; $j >= 0; $j--)
    {
        $string2[] = $string[$j];
    }
    foreach ($string2 as $key => $value) {
         $text .= $value;
     } 
    return $text;
}
function curPageURL() {
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url(); ?>public/Libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/Libs/bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>public/JS/loadscript.js"></script>
        <script src="<?php echo base_url(); ?>public/Libs/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>public/JS/lazy.js""></script>
        <style type="text/css">
            *
            {
                margin: 0;
                padding: 0;
            }
            .main-container
            {
                width: 100%;
                height: auto;
                background: transparent;
                font-family: Tahoma;
            }
            .head
            {
                height: 50px;
                width: 100%;
                background: #333;
                margin-bottom: 10px;
            }
            .logo
            {
                position: absolute;
                width: 200px;
                color: #FFF;
                left: 5%;
            }
            .search
            {
                position: absolute;
                width: 400px;
                left: 25%;
                top: 7.5px;
            }
            input.search
            {
                border-radius: 0px;
            }
            .result
            {
                position: absolute;
                top: 39px;
                left: 25%;
                z-index: 1000;
                list-style-type: none;
                margin-left: 0px;
                background: #F2F2F2;
            }
            .result > li
            {
                border-bottom: 1px solid #F2F2F2;
                width: 400px;
            }
            .result a
            {
                text-decoration: none;
                color: #424242;
            }
            .result a:hover
            {
                color: #2E9AFE;
            }
            .container
            {
                width: 90%;
                height: auto;
                background: #FFF;
                position: absolute;
                left: 5%;
                top:110px;
            }
            .menu
            {
                width: 90%;
                height: 40px;
                background: #F2F2F2;
                left: 5%;
                z-index: 998;
                position: absolute;

            }
            .menu > ul
            {
                list-style-type: none;
            }
            .menu > ul > li
            {
                width: 100px;
                float: left;
                height: 40px;
                line-height: 40px;
                color: #58ACFA;
                text-align: center;
            }
            .menu > ul > li a
            {
                color: #58ACFA;
                text-decoration: none;
            }
            .menu > ul > li a:hover
            {
                color: #FFF;
            }
            .menu > ul > li:nth-child(1) a
            {
                color: #585858;
            }
            .menu > ul > li:nth-child(1) a:hover
            {
                color: #585858;
            }
            .menu > ul > li:nth-child(1):hover
            {
                background: #F2F2F2;
            }
            .menu > ul > li:nth-child(1):hover a
            {
                color: #585858;
            }
            .menu > ul > li:hover
            {
                background: #58ACFA;
                color: #FFF;
            }
            .menu > ul > li > ul
            {
                list-style-type: none;
                text-align: left;
            }
            .menu > ul > li > ul > li
            {
                width: 190px;
                height: 30px;
                line-height: 30px;
                background: #58ACFA;
                color: #FFF;
                padding-left: 10px;
            }
            .menu > ul > li > ul > li:hover
            {
                background: #01A9DB;
            }
            .menu > ul > li #list-cate
            {
                visibility: hidden;
            }
            .menu > ul > li:hover #list-cate
            {
                visibility:visible;
            }
            .menu > ul > li > ul > li a, .menu > ul > li > ul > li a:hover
            {
                text-decoration: none;
                color: #FFF;
            }
            .menu > ul > li:hover  a
            {
                color: #FFF;
            }
            #list-cate
            {
                position:absolute;
                left: 100px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $(window).bind('scroll', function () {
                    if ($(window).scrollTop() > 100) {
                        $('.menu').css({"position": "fixed", "top": "0%"});
                    }
                    else {
                        $('.menu').css({"position": "absolute", "top": "60px"});
                    }
                });
                //Search Auto complete 
                $('.search').keyup(function () {
                    keySearch = $('.search').val();
                    l = 0;
                    for (i = 0; i < keySearch.length; i++)
                    {
                        if (keySearch[i] !== ' ')
                        {
                            l++;
                        }
                    }
                    if (l !== 0)
                    {
                        $('#search > ul').html('');
                        resultHTML = '';
                        $.ajax({
                            url: baseUrl + 'frontend/process/searchQuery',
                            type: 'POST',
                            data: {data: keySearch},
                            success: function (data)
                            {
                                if (data !== null)
                                {
                                    for (i = 0; i < data.length; i++)
                                    {
                                        img = data[i].productimages;
                                        img = img.split(',');
                                        img1 = img[0];
                                        img1 = img1.replace('[', '');
                                        img1 = img1.replace(']', '');
                                        img1 = img1.replace('"', '');
                                        img1 = img1.replace('"', '');
                                        resultHTML += '<li><a href="#">' +
                                                '<img width="50" src="' + baseUrl + 'upload/' + img1 + '" />' +
                                                '&nbsp&nbsp' + data[i].productname +
                                                '</a></li>';
                                    }
                                    $('#search > ul').append(resultHTML).fadeIn('slow');
                                }
                            }
                        });
                    } else
                    {
                        $('#search > ul').html('');
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="main-container">
            <div class="head">
                <div class="logo"><h1>IT Shop</h1></div>
                <div>
                    <input style="height:30px" type="text" class="search" placeholder="Bạn cần sản phẩm gì cho hôm nay ?">
                    <div id="search">
                        <ul class="result">

                        </ul>
                    </div>
                </div>		
            </div>
            <div class="menu">
                <ul>
                    <li><i class="icon-home icon-black"></i><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                    <li>Danh mục<ul id="list-cate">
                            <?php
                            foreach ($listcate as $value) {
                                $url = str_replace(",", "", vn2latin($value['pcname'], true));
                                echo '<li><a href="' . base_url() . 'danh-muc/' . $url . '_post' . $value['pcid'] . '.html">' . $value['pcname'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url(); ?>bai-viet.html">Bài viết</a></li>
                    <li>Hỏi - đáp</li>
                    <li><a href="<?php echo base_url(); ?>gioi-thieu.html">Giới thiệu</a></li>
                    <li><a href="<?php echo base_url(); ?>lien-he.html">Liên hệ</a></li>
                </ul>
            </div>
            <div class="container">
