<?php
$this->load->view("top");

?>
<style type="text/css">
    .slide-container
    {
        width: 80%;
        height: 352px;
        background: #ccc;
        float:left;
        z-index: 999; 
    }
    .article-container
    {
        width: 20%;
        float: left;
        background: transparent;
        height: 353px;
    }
    .article-container > ul 
    {
        list-style-type: none;
    }
    .article-container > ul  > li a{
        color: #1C1C1C;
        font-weight: bold;
        font-size: 11px;
    }
    .article-container > ul  > li a:hover{
        color: #01A9DB;
        text-decoration: none;
    }
    .article-container > ul  > li:nth-child(1)
    {
        border-bottom: 1px solid #D8D8D8;
        padding-bottom: 5px;
    }
    .article-container > ul  > li:nth-child(2){
        margin-top: 6px;
    }
    .mobile-bar
    {
        width: 99.5%;
        height: 38px;
        background: #F2F2F2;
        position: absolute;
        top:360px;
        border:1px solid #D8D8D8;
    }
    .title-bar-1
    {
        width: 100px;
        background: #00b7f1;
        height: 38px;
        color: #FFF;
        line-height: 38px;
        font-weight: bold;
        font-size: 18px;
        padding-left: 20px;
    }
    .title-bar-1 a
    {
        text-decoration: none;
        color: #FFF;
    }
    .arrow-bar-1
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 18px solid transparent;
        border-left: 13px solid #00b7f1;
        border-right: 0px solid transparent;
        border-bottom: 18px solid transparent;
        position: absolute;
        top: 0;
        left: 118.2px;
    }
    .mobile-image
    {
        margin-top: 55px;
        width: 910px;
        float: left;
    }
    .mobile-company
    {
        width: 220px;
        float: left;
        margin-top: 55px;
        margin-left: 1.5px;
    }
    .mobile-company ul
    {
        list-style-type: none;
        margin: 0px;
    }
    .mobile-company ul li
    {
        width: 108px;
        float: left;
        border:1px solid #F2F2F2;
        height: 65.6px;
        text-align: center;
        line-height: 60px;
    }
    .mobile-company img
    {
        opacity: 0.5;
        filter: alpha(opacity=40);
    }
    .mobile-company img:hover
    {
        opacity: 1.0;
        filter: alpha(opacity=100); 
    }
    .mobile-show
    {
        width: 910px;
        float: left;
        height: 257px;
        margin-top: 10px;
    }
    .mobile-show a
    {
        color: #333;
    }
    .mobile-show a:hover
    {
        text-decoration: none;
        color: #58ACFA;
    }
    .mobile-ad
    {
        width: 220px;
        float: left;
        margin-top: 10px;
    }
    .mobile-show ul
    {
        list-style-type: none;
        margin: 0;
    }
    .mobile-show ul li 
    {
        width: 227.5px;
        height: 100%;
        float: left;
        background: #FFF;
    }
    .mobile-show ul li img
    {
        width: 70%;
        margin-left: 15%;
        margin-top: 5px;
    }
    .mobile-show ul li h4
    {
        margin: 5px;
        text-align: left;
        font-weight: normal;
        font-size: 13px;
    }
    .mobile-show ul li b
    {
        margin: 5px;
        text-align: left;
        font-size: 13px;
    }
    .mobile-show #clickNet, .mobile-show #clickPrev
    {
        width: 50px;
        float: left;
    }
    .arrowNext
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-left: 13px solid #ccc;
        border-right: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowNext:hover
    {
        border-left: 13px solid #F2F2F2;
    }
    .arrowPrev
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-right: 13px solid #ccc;
        border-left: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowPrev:hover
    {
        border-right: 13px solid #F2F2F2;
    }
    .mobile-arrow-show
    {
        position: absolute;
        top:920px;
    }
    .tablet-bar
    {
        width: 99.5%;
        height: 38px;
        background: #F2F2F2;
        position: absolute;
        top:960px;
        border:1px solid #D8D8D8;
    }
    .title-bar-2
    {
        width: 200px;
        background: #00b7f1;
        height: 38px;
        color: #FFF;
        line-height: 38px;
        font-weight: bold;
        font-size: 18px;
        padding-left: 20px;
    }
    .title-bar-2 a
    {
        text-decoration: none;
        color: #FFF;
    }
    .arrow-bar-2
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 18px solid transparent;
        border-left: 13px solid #00b7f1;
        border-right: 0px solid transparent;
        border-bottom: 18px solid transparent;
        position: absolute;
        top: 0;
        left: 218.2px;
    }
    .tablet-image
    {
        margin-top: 60px;
        width: 910px;
        float: left;
    }
    .tablet-company
    {
        width: 220px;
        float: left;
        margin-top: 60px;
        margin-left: 1.5px;
    }
    .tablet-company ul
    {
        list-style-type: none;
        margin: 0px;
    }
    .tablet-company ul li
    {
        width: 108px;
        float: left;
        border:1px solid #F2F2F2;
        height: 73px;
        text-align: center;
        line-height: 71px;
    }
    .tablet-company img
    {
        opacity: 0.5;
        filter: alpha(opacity=40);
        margin-top: 10px;
    }
    .tablet-company img:hover
    {
        opacity: 1.0;
        filter: alpha(opacity=100); 
    }
    .tablet-show
    {
        width: 910px;
        float: left;
        height: 257px;
        margin-top: 10px;
    }
    .tablet-show a
    {
        color: #333;
    }
    .tablet-show a:hover
    {
        text-decoration: none;
        color: #58ACFA;
    }
    .tablet-ad
    {
        width: 220px;
        float: left;
        margin-top: 10px;
    }
    .tablet-show ul
    {
        list-style-type: none;
        margin: 0;
    }
    .tablet-show ul li 
    {
        width: 227.5px;
        height: 100%;
        float: left;
        background: #FFF;
    }
    .tablet-show ul li img
    {
        width: 70%;
        margin-left: 15%;
        margin-top: 5px;
    }
    .tablet-show ul li h4
    {
        margin: 5px;
        text-align: left;
        font-weight: normal;
        font-size: 13px;
    }
    .tablet-show ul li b
    {
        margin: 5px;
        text-align: left;
        font-size: 13px;
    }
    .tablet-show #clickNet2, .tablet-show #clickPrev2
    {
        width: 50px;
        float: left;
    }
    .arrowNext2
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-left: 13px solid #ccc;
        border-right: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowNext2:hover
    {
        border-left: 13px solid #F2F2F2;
    }
    .arrowPrev2
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-right: 13px solid #ccc;
        border-left: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowPrev2:hover
    {
        border-right: 13px solid #F2F2F2;
    }
    .tablet-arrow-show
    {
        position: absolute;
        top:1550px;
    }
    /* PC-Laptop */
    .pc-bar
    {
        width: 99.5%;
        height: 38px;
        background: #F2F2F2;
        position: absolute;
        top:1590px;
        border:1px solid #D8D8D8;
    }
    .title-bar-3
    {
        width: 200px;
        background: #00b7f1;
        height: 38px;
        color: #FFF;
        line-height: 38px;
        font-weight: bold;
        font-size: 18px;
        padding-left: 20px;
    }
    .title-bar-3 a
    {
        text-decoration: none;
        color: #FFF;
    }
    .arrow-bar-3
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 18px solid transparent;
        border-left: 13px solid #00b7f1;
        border-right: 0px solid transparent;
        border-bottom: 18px solid transparent;
        position: absolute;
        top: 0;
        left: 218.2px;
    }
    .pc-image
    {
        margin-top: 60px;
        width: 910px;
        float: left;
    }
    .pc-company
    {
        width: 220px;
        float: left;
        margin-top: 60px;
        margin-left: 1.5px;
    }
    .pc-company ul
    {
        list-style-type: none;
        margin: 0px;
    }
    .pc-company ul li
    {
        width: 108px;
        float: left;
        border:1px solid #F2F2F2;
        height: 73px;
        text-align: center;
        line-height: 71px;
    }
    .pc-company img
    {
        opacity: 0.5;
        filter: alpha(opacity=40);
        margin-top: 10px;
    }
    .pc-company img:hover
    {
        opacity: 1.0;
        filter: alpha(opacity=100); 
    }
    .pc-show
    {
        width: 910px;
        float: left;
        height: 257px;
        margin-top: 10px;
    }
    .pc-show a
    {
        color: #333;
    }
    .pc-show a:hover
    {
        text-decoration: none;
        color: #58ACFA;
    }
    .pc-ad
    {
        width: 220px;
        float: left;
        margin-top: 10px;
    }
    .pc-show ul
    {
        list-style-type: none;
        margin: 0;
    }
    .pc-show ul li 
    {
        width: 227.5px;
        height: 100%;
        float: left;
        background: #FFF;
    }
    .pc-show ul li img
    {
        width: 70%;
        margin-left: 15%;
        margin-top: 5px;
    }
    .pc-show ul li h4
    {
        margin: 5px;
        text-align: left;
        font-weight: normal;
        font-size: 13px;
    }
    .pc-show ul li b
    {
        margin: 5px;
        text-align: left;
        font-size: 13px;
    }
    .pc-show #clickNet3, .pc-show #clickPrev3
    {
        width: 50px;
        float: left;
    }
    .arrowNext3
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-left: 13px solid #ccc;
        border-right: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowNext3:hover
    {
        border-left: 13px solid #F2F2F2;
    }
    .arrowPrev3
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-right: 13px solid #ccc;
        border-left: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowPrev3:hover
    {
        border-right: 13px solid #F2F2F2;
    }
    .pc-arrow-show
    {
        position: absolute;
        top:2180px;
    }
    .tb-bar
    {
        width: 99.5%;
        height: 38px;
        background: #F2F2F2;
        position: absolute;
        top:2215px;
        border:1px solid #D8D8D8;
    }
    .title-bar-4
    {
        width: 200px;
        background: #00b7f1;
        height: 38px;
        color: #FFF;
        line-height: 38px;
        font-weight: bold;
        font-size: 18px;
        padding-left: 20px;
    }
    .title-bar-4 a
    {
        text-decoration: none;
        color: #FFF;
    }
    .arrow-bar-4
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 18px solid transparent;
        border-left: 13px solid #00b7f1;
        border-right: 0px solid transparent;
        border-bottom: 18px solid transparent;
        position: absolute;
        top: 0;
        left: 218.2px;
    }
    .tb-image
    {
        margin-top: 60px;
        width: 910px;
        float: left;
    }
    .tb-company
    {
        width: 220px;
        float: left;
        margin-top: 60px;
        margin-left: 1.5px;
    }
    .tb-company ul
    {
        list-style-type: none;
        margin: 0px;
    }
    .tb-company ul li
    {
        width: 108px;
        float: left;
        border:1px solid #F2F2F2;
        height: 66px;
        text-align: center;
        line-height: 66px;
    }
    .tb-company img
    {
        opacity: 0.5;
        filter: alpha(opacity=40);
        margin-top: 10px;
    }
    .tb-company img:hover
    {
        opacity: 1.0;
        filter: alpha(opacity=100); 
    }
    .tb-show
    {
        width: 910px;
        float: left;
        height: 257px;
        margin-top: 10px;
    }
    .tb-show a
    {
        color: #333;
    }
    .tb-show a:hover
    {
        text-decoration: none;
        color: #58ACFA;
    }
    .tb-ad
    {
        width: 220px;
        float: left;
        margin-top: 10px;
    }
    .tb-show ul
    {
        list-style-type: none;
        margin: 0;
    }
    .tb-show ul li 
    {
        width: 227.5px;
        height: 100%;
        float: left;
        background: #FFF;
    }
    .tb-show ul li img
    {
        width: 70%;
        margin-left: 15%;
        margin-top: 5px;
    }
    .tb-show ul li h4
    {
        margin: 5px;
        text-align: left;
        font-weight: normal;
        font-size: 13px;
    }
    .tb-show ul li b
    {
        margin: 5px;
        text-align: left;
        font-size: 13px;
    }
    .tb-show #clickNet4, .tb-show #clickPrev4
    {
        width: 50px;
        float: left;
    }
    .arrowNext4
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-left: 13px solid #ccc;
        border-right: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowNext3:hover
    {
        border-left: 13px solid #F2F2F2;
    }
    .arrowPrev4
    {
        display: inline-block;
        width: 0;
        height: 0;
        margin: 5px;
        vertical-align: middle;
        border-top: 10px solid transparent;
        border-right: 13px solid #ccc;
        border-left: 0px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .arrowPrev4:hover
    {
        border-right: 13px solid #F2F2F2;
    }
    .tb-arrow-show
    {
        position: absolute;
        top:2775px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function ()
    {
        //
        var cout = 1;
        $('.mobile-show > ul > li').hide();
        for (i = 1; i < 5; i++)
        {
            $('.mobile-show > ul > li:nth-child(' + i + ')').show();
        }
        $('#clickNext').click(function () {
            cout = cout + 4;
            if (cout < 1 || cout > 20)
            {
                cout = 1;
            }
            $('.mobile-show > ul > li').hide();
            for (i = cout; i < cout + 5; i++)
            {
                $('.mobile-show > ul > li:nth-child(' + i + ')').slideDown(1000);
            }
        });
        $('#clickPrev').click(function () {
            cout = cout - 4;
            if (cout < 1 || cout > 20)
            {
                cout = 1;
            }
            $('.mobile-show > ul > li').hide();
            for (i = cout; i < cout + 4; i++)
            {
                $('.mobile-show > ul > li:nth-child(' + i + ')').slideDown(1000);
            }
        });
        var cout2 = 1;
        $('.tablet-show > ul > li').hide();
        for (i = 1; i < 5; i++)
        {
            $('.tablet-show > ul > li:nth-child(' + i + ')').show();
        }
        $('#clickNext2').click(function () {
            cout2 = cout2 + 4;
            if (cout2 < 1 || cout2 > 20)
            {
                cout2 = 1;
            }
            $('.tablet-show > ul > li').hide();
            for (i = cout2; i < cout2 + 5; i++)
            {
                $('.tablet-show > ul > li:nth-child(' + i + ')').slideDown(1000);
            }
        });
        $('#clickPrev2').click(function () {
            cout2 = cout2 - 4;
            if (cout2 < 1 || cout2 > 20)
            {
                cout2 = 1;
            }
            $('.tablet-show > ul > li').hide();
            for (i = cout2; i < cout2 + 4; i++)
            {
                $('.tablet-show > ul > li:nth-child(' + i + ')').slideDown(1000);
            }
        });
    });
</script>
<div class="slide-container">
    <?php $this->load->view("slide-container") ?>
</div>
<div class="article-container">
    <ul>
        <?php
        $i = 0;
        foreach ($listar as $v) {
            $url = str_replace(",", "", vn2latin($v['title'], true));
            if ($i != 0) {
                echo '<li><a href="' . base_url() . 'bai-viet/' . $url . '_post' . $v['id'] . '.html">' . $v['title'] . '</a></li>';
            } else {
                if ($v['img'] != '[]') {
                    $img = $v['img'];
                    $img = str_replace("[", "", $img);
                    $img = str_replace("]", "", $img);
                    $img = str_replace('"', "", $img);
                } else {
                    $img = 'September2014113421AMno-image.jpg';
                }
                echo '<li><a href="' . base_url() . 'bai-viet/' . $url . '_post' . $v['id'] . '.html"><img src="' . base_url() . 'upload/' . $img . '" >';
                echo $v['title'] . '</a>';
                echo '</li>';
            }
            $i++;
        }
        ?>
    </ul>
</div>
<div class="mobile-bar">
    <div class="title-bar-1"><a href="<?php echo base_url(); ?>danh-muc/dien-thoai_post2.html">Điện thoại</a></div>
    <div class="arrow-bar-1"></div>
</div>
<div class="mobile-image">
    <img width="910" src="<?php echo base_url(); ?>upload/September2014054444PMMobile.jpg">
</div>
<div class="mobile-company">
    <ul>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055316PMBrands-16-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055638PMBrands-15-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055647PMBrands-37-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055655PMBrands-42-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055703PMBrands-49-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055711PMBrands-117-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055718PMBrands-151-thumb-hover-homepage.jpg"></a></li>
        <li><a href="<?php echo base_url(); ?>danh-muc/dien-thoai_post2.html">Xem tất cả</a></li>

    </ul>
</div>
<div class="mobile-show">
    <ul>
        <?php
        foreach ($listmobile as $value) {
            $img1 = $value['productimages'];
            $img2 = explode(',', $img1);
            $img3 = $img2[0];
            $img4 = str_replace('[', '', $img3);
            $img5 = str_replace(']', '', $img4);
            $img6 = str_replace('"', '', $img5);
            $value['productname'] = str_replace("(", "",$value['productname']);
            $value['productname'] = str_replace(")", "",$value['productname']);
            $value['productname'] = str_replace("&", "",$value['productname']);
            $value['productname'] = str_replace("+", "",$value['productname']);
            $value['productname'] = str_replace("'", "",$value['productname']);
            $value['productname'] = str_replace('"', "",$value['productname']);
            $value['productname'] = str_replace('%', "",$value['productname']);
            $value['productname'] = str_replace('/', "-",$value['productname']);
            $value['productname'] = str_replace('\\', "-",$value['productname']);
            $url = str_replace(",", "", vn2latin($value['productname'], true));
            echo '<li><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html"><img style="height:110px" src="' . base_url() . 'upload/' . $img6 . '">';
            echo '<h4><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html">' . $value['productname'] . '</a></h4>';
            echo '<b>' . price($value['productprice']) . ' VNĐ</b>';
            echo '</a></li>';
        }
        ?>
    </ul>
</div>
<div class="mobile-arrow-show">
    <div class="arrowPrev"id="clickPrev"></div>
    <div class="arrowNext" id="clickNext"></div>
    <a href="<?php echo base_url(); ?>danh-muc/dien-thoai_post2.html">Xem tất cả</a>
</div>
<div class="mobile-ad"><img src="<?php echo base_url(); ?>upload/September2014073549PMFile-1409906579.jpg" ></div>
<div class="tablet-bar">
    <div class="title-bar-2"><a href="<?php echo base_url(); ?>danh-muc/may-tinh-bang_post3.html">Máy tính bảng</a></div>
    <div class="arrow-bar-2"></div>
</div>
<div class="tablet-image">
    <img width="910" src="<?php echo base_url(); ?>upload/September2014082553AMFile-1408557607.jpg">
</div>
<div class="tablet-company">
    <ul>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055316PMBrands-16-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055638PMBrands-15-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055647PMBrands-37-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055655PMBrands-42-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055703PMBrands-49-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055711PMBrands-117-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055718PMBrands-151-thumb-hover-homepage.jpg"></a></li>
        <li><a href="<?php echo base_url(); ?>danh-muc/may-tinh-bang_post3.html">Xem tất cả</a></li>

    </ul>
</div>
<div class="tablet-show">
    <ul>
        <?php
        foreach ($listtablet as $value) {
            $img1 = $value['productimages'];
            $img2 = explode(',', $img1);
            $img3 = $img2[0];
            $img4 = str_replace('[', '', $img3);
            $img5 = str_replace(']', '', $img4);
            $img6 = str_replace('"', '', $img5);
            $value['productname'] = str_replace("(", "",$value['productname']);
            $value['productname'] = str_replace(")", "",$value['productname']);
            $value['productname'] = str_replace("&", "",$value['productname']);
            $value['productname'] = str_replace("+", "",$value['productname']);
            $value['productname'] = str_replace("'", "",$value['productname']);
            $value['productname'] = str_replace('"', "",$value['productname']);
            $value['productname'] = str_replace('%', "",$value['productname']);
            $url = str_replace(",", "", vn2latin($value['productname'], true));
            echo '<li><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html"><img style="height:110px" src="' . base_url() . 'upload/' . $img6 . '">';
            echo '<h4><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html">' . $value['productname'] . '</a></h4>';
            echo '<b>' . price($value['productprice']) . ' VNĐ</b>';
            echo '</a></li>';
        }
        ?>
    </ul>
</div>
<div class="tablet-arrow-show">
    <div class="arrowPrev"id="clickPrev2"></div>
    <div class="arrowNext" id="clickNext2"></div>
    <a href="<?php echo base_url(); ?>danh-muc/may-tinh-bang_post3.html">Xem tất cả</a>
</div>
<div class="tablet-ad"><img src="<?php echo base_url(); ?>upload/September2014073549PMFile-1409906579.jpg" ></div>
<div class="pc-bar">
    <div class="title-bar-3"><a href="<?php echo base_url(); ?>danh-muc/laptop-pc_post1.html">Laptop - PC</a></div>
    <div class="arrow-bar-3"></div>
</div>
<div class="pc-image">
    <img width="910" src="<?php echo base_url(); ?>upload/September2014092738AMFile-1409108154.jpg">
</div>
<div class="pc-company">
    <ul>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055316PMBrands-16-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055638PMBrands-15-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055647PMBrands-37-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014055655PMBrands-42-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014052257AMGiaoDienWebsite12032013_04.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014052304AMGiaoDienWebsite12032013_12.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014052313AMGiaoDienWebsite12032013_13.jpg"></a></li>
        <li><a href="<?php echo base_url(); ?>danh-muc/laptop-pc_post1.html">Xem tất cả</a></li>

    </ul>
</div>
<div class="pc-show">
    <ul>
        <?php
        foreach ($listpc as $value) {
            $img1 = $value['productimages'];
            $img2 = explode(',', $img1);
            $img3 = $img2[0];
            $img4 = str_replace('[', '', $img3);
            $img5 = str_replace(']', '', $img4);
            $img6 = str_replace('"', '', $img5);
            $value['productname'] = str_replace("(", "",$value['productname']);
            $value['productname'] = str_replace(")", "",$value['productname']);
            $value['productname'] = str_replace("&", "",$value['productname']);
            $value['productname'] = str_replace("+", "",$value['productname']);
            $value['productname'] = str_replace("'", "",$value['productname']);
            $value['productname'] = str_replace('"', "",$value['productname']);
            $value['productname'] = str_replace('%', "",$value['productname']);
            $url = str_replace(",", "", vn2latin($value['productname'], true));
            echo '<li><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html"><img style="height:110px" src="' . base_url() . 'upload/' . $img6 . '">';
            echo '<h4><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html">' . $value['productname'] . '</a></h4>';
            echo '<b>' . price($value['productprice']) . ' VNĐ</b>';
            echo '</a></li>';
        }
        ?>
    </ul>
</div>
<div class="pc-arrow-show">
    <div class="arrowPrev"id="clickPrev3"></div>
    <div class="arrowNext" id="clickNext3"></div>
    <a href="<?php echo base_url(); ?>danh-muc/laptop=pc_post1.html">Xem tất cả</a>
</div>
<div class="pc-ad"><img src="<?php echo base_url(); ?>upload/September2014073549PMFile-1409906579.jpg" ></div>
<div class="tb-bar">
    <div class="title-bar-4"><a href="<?php echo base_url(); ?>danh-muc/thiet-bi-so-phu-kien_post4.html">Thiết bị số - Phụ kiện</a></div>
    <div class="arrow-bar-4"></div>
</div>
<div class="tb-image">
    <img width="910" src="<?php echo base_url(); ?>upload/September2014061101AMFile-1410750432.jpg">
</div>
<div class="tb-company">
    <ul>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061641AMBrands-55-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061648AMBrands-58-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061655AMBrands-59-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061703AMBrands-79-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061713AMBrands-115-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061726AMBrands-318-thumb-hover-homepage.jpg"></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>upload/September2014061732AMBrands-566-thumb-hover-homepage.jpg"></a></li>
        <li><a href="<?php echo base_url(); ?>danh-muc/thiet-bi-so-phu-kien_post4.html">Xem tất cả</a></li>

    </ul>
</div>
<div class="tb-show">
    <ul>
        <?php
        foreach ($listtb as $value) {
            $img1 = $value['productimages'];
            $img2 = explode(',', $img1);
            $img3 = $img2[0];
            $img4 = str_replace('[', '', $img3);
            $img5 = str_replace(']', '', $img4);
            $img6 = str_replace('"', '', $img5);
            $value['productname'] = str_replace("(", "",$value['productname']);
            $value['productname'] = str_replace(")", "",$value['productname']);
            $value['productname'] = str_replace("&", "",$value['productname']);
            $value['productname'] = str_replace("+", "",$value['productname']);
            $value['productname'] = str_replace("'", "",$value['productname']);
            $value['productname'] = str_replace('"', "",$value['productname']);
            $value['productname'] = str_replace('%', "",$value['productname']);
            $value['productname'] = str_replace('\\', "-",$value['productname']);
            $value['productname'] = str_replace('/', "-",$value['productname']);
            $url = str_replace(",", "", vn2latin($value['productname'], true));
            echo '<li><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html"><img style="height:110px" src="' . base_url() . 'upload/' . $img6 . '">';
            echo '<h4><a href="'.base_url().'san-pham/'.$url.'_post'.$value['productid'].'.html">' . $value['productname'] . '</a></h4>';
            echo '<b>' . price($value['productprice']) . ' VNĐ</b>';
            echo '</a></li>';
        }
        ?>
    </ul>
</div>
<div class="tb-arrow-show">
    <div class="arrowPrev"id="clickPrev4"></div>
    <div class="arrowNext" id="clickNext4"></div>
    <a href="<?php echo base_url(); ?>danh-muc/thiet-bi-so-phu-kien_post4.html">Xem tất cả</a>
</div>
<div class="tb-ad"><img src="<?php echo base_url(); ?>upload/September2014073549PMFile-1409906579.jpg" ></div>
<?php
$this->load->view("bottom1");
?>
