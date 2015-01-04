<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admincp - <?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/icons.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/JS/loadscript.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/Libs/jquery-2.1.1.min.js"></script>
<!-- Load Flat bootstrap -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/bootflat/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/bootflat/js/html5shiv.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/bootflat/js/respond.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/bootflat/js/site.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/bootflat/css/site.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/bootflat/css/site.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/bootflat/css/site.min.css" />
<!--left menu-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/backend-left-menu.css" />
<!--data table-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/datatable/media/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/datatable/media/css/jquery.dataTables.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/datatable/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/datatable/media/css/jquery.dataTables_themeroller.css" />
<!--colorbox-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/Libs/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Libs/colorbox/example4/colorbox.css" />
</head>

<body>
<div class="main-view">
<div class="pill-view">

</div>
<div class="left-content">
<div class="left-button">
<button></button>
<button></button>
<button></button>
<button></button>
</div>
<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Products</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Product 1</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Product 2</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>
</div>
<div class="right-content">
<div class="header-right-content"></div>
<div class="header-right-content"></div>
<div class="content"><?php $this->load->view($view); ?></div>
</div>
</div>
</body>
</html>
<script>
$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});

	$('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');

	(function getColor() {
		var r, g, b;
		var textColor = $('#cssmenu').css('color');
		textColor = textColor.slice(4);
		r = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		g = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		b = textColor.slice(0, textColor.indexOf(')'));
		var l = rgbToHsl(r, g, b);
		if (l > 0.7) {
			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 1px rgba(0, 0, 0, .35)');
			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
		}
		else
		{
			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 0 rgba(255, 255, 255, .35)');
			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
		}
	})();

	function rgbToHsl(r, g, b) {
	    r /= 255, g /= 255, b /= 255;
	    var max = Math.max(r, g, b), min = Math.min(r, g, b);
	    var h, s, l = (max + min) / 2;

	    if(max == min){
	        h = s = 0;
	    }
	    else {
	        var d = max - min;
	        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
	        switch(max){
	            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
	            case g: h = (b - r) / d + 2; break;
	            case b: h = (r - g) / d + 4; break;
	        }
	        h /= 6;
	    }
	    return l;
	}
</script>
