<?php

$this->load->view("top");
?>
<style>
    .menu > ul >li:nth-child(5)
    {
        background: #58ACFA;
    }
    .menu > ul >li:nth-child(5) > a{
        color: #FFF;
    }
    .about > h1{
        border-left: 5px solid #58ACFA;
        color: #333;
        font-size: 18px;
        font-weight: bold;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
        text-transform: uppercase;
    }
    .about .content{
        color: #333;
        font-size: 14px;
        font-weight: normal;
        line-height: 24px;
        margin-bottom: 20px;
        padding-left: 10px;
    }
    .bottom
    {
        top:500px !important;
    }
</style>
<div class="about">
    <h1>GIỚI THIỆU VỀ IT SHOP </h1>
    <div class="content">
       <?php
            echo $about['content'];
       ?>
    </div>
</div>
<?php

$this->load->view("bottom");
?>

