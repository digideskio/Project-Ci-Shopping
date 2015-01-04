<?php
$this->load->view("top");
?>
<div class="top">
<h1>XRITA ADMIN <span id="welcome">Xin chào <?php echo $this->session->userdata['user']; ?>, <a href="<?php echo base_url(); ?>verify/logout/dologout">Thoát</a></span></h1>
</div>
<div class="menu">
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300);
.menu #cssmenu {
  position: relative;
  margin: 0;
  font-family: 'Roboto Condensed';
  line-height: 1;
  width: 250px;
}
.menu .align-right {
  float: right;
}
.menu #cssmenu ul {
  margin: 0;
  padding: 0;
  list-style: none;
  display: block;
}
.menu #cssmenu ul li {
  position: relative;
  margin: 0;
  padding: 0;
}
.menu #cssmenu ul li a {
  text-decoration: none;
  cursor: pointer;
}
.menu #cssmenu > ul > li > a {
  color: #dddddd;
  text-transform: uppercase;
  display: block;
  padding: 20px;
  border-top: 1px solid #000000;
  border-left: 1px solid #000000;
  border-right: 1px solid #000000;
  background: #222222;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
  letter-spacing: 1px;
  font-size: 16px;
  font-weight: 300;
  -webkit-transition: all 0.25s ease-in;
  -moz-transition: all 0.25s ease-in;
  -ms-transition: all 0.25s ease-in;
  -o-transition: all 0.25s ease-in;
  transition: all 0.25s ease-in;
  position: relative;
}
.menu #cssmenu > ul > li:first-child > a {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.menu #cssmenu > ul > li:last-child > a {
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  border-bottom: 1px solid #000000;
}
.menu #cssmenu > ul > li:hover > a,
.menu #cssmenu > ul > li.open > a,
.menu #cssmenu > ul > li.active > a {
  background: #151515;
  color: #ffffff;
}
.menu #cssmenu ul > li.has-sub > a::after {
  content: '';
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-top: 13px solid #000000;
  border-botom: 13px solid transparent;
  border-left: 125px solid transparent;
  border-right: 125px solid transparent;
  left: 0;
  bottom: -13px;
  bottom: 0px;
  z-index: 1;
  opacity: 0;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
}
.menu #cssmenu ul > li.has-sub > a::before {
  content: '';
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-top: 13px solid #151515;
  border-botom: 13px solid transparent;
  border-left: 125px solid transparent;
  border-right: 125px solid transparent;
  left: 0;
  bottom: -12px;
  bottom: -1px;
  z-index: 3;
  opacity: 0;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
}
.menu #cssmenu ul > li.has-sub::after {
  content: '';
  display: block;
  position: absolute;
  width: 0;
  height: 0;
  border: 7px solid transparent;
  border-top-color: #dddddd;
  z-index: 2;
  right: 20px;
  top: 24.5px;
  pointer-events: none;
}
.menu #cssmenu ul > li:hover::after,
.menu #cssmenu ul > li.active::after,
.menu #cssmenu ul > li.open::after {
  border-top-color: #ffffff;
}
.menu #cssmenu ul > li.has-sub.open > a::after {
  opacity: 1;
  bottom: -13px;
}
.menu #cssmenu ul > li.has-sub.open > a::before {
  opacity: 1;
  bottom: -12px;
}
.menu #cssmenu ul ul {
  display: none;
}
.menu #cssmenu ul ul li {
  border-left: 1px solid #ccc;
  border-right: 1px solid #ccc;
}
.menu #cssmenu ul ul li a {
  background: #f1f1f1;
  display: block;
  position: relative;
  font-size: 15px;
  padding: 14px 20px;
  border-bottom: 1px solid #dddddd;
  color: #777777;
  font-weight: 300;
  -webkit-transition: all 0.25s ease-in;
  -moz-transition: all 0.25s ease-in;
  -ms-transition: all 0.25s ease-in;
  -o-transition: all 0.25s ease-in;
  transition: all 0.25s ease-in;
}
.menu #cssmenu ul ul li:first-child > a {
  padding-top: 18px;
}
.menu #cssmenu ul ul ul li {
  border: 0;
}
.menu #cssmenu ul ul li:hover > a,
.menu #cssmenu ul ul li.open > a,
.menu #cssmenu ul ul li.active > a {
  background: #e4e4e4;
  color: #666666;
}
.menu #cssmenu ul ul > li.has-sub > a::after {
  border-top: 13px solid #dddddd;
}
.menu #cssmenu ul ul > li.has-sub > a::before {
  border-top: 13px solid #e4e4e4;
}
.menu #cssmenu ul ul ul li a {
  padding-left: 30px;
}
.menu #cssmenu ul ul > li.has-sub::after {
  top: 18.5px;
  border-width: 6px;
  border-top-color: #777777;
}
.menu #cssmenu ul ul > li:hover::after,
.menu #cssmenu ul ul > li.active::after,
.menu #cssmenu ul ul > li.open::after {
  border-top-color: #666666;
}


</style>	
	<div id='cssmenu'>
<ul>
   <li class='active'><a href='<?php echo base_url(); ?>backend/calendar/index'><span>Dashboard</span></a></li>
   <li class='has-sub'><a href='<?php echo base_url(); ?>backend/user/listall'><span>Người Dùng</span></a>
      <ul>
         <li><a href='<?php echo base_url(); ?>backend/user/add'><span>Thêm Mới</span></a></li>
         <li class='last'><a href='#'><span>Tất Cả</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='<?php echo base_url(); ?>backend/cate/listall'><span>Thể Loại</span></a>
      <ul>
         <li><a href='#'><span>Thêm mới</span></a></li>
         <li class='last'><a href='#'><span>Tất Cả</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='<?php echo base_url(); ?>backend/book/listall'><span>Sách</span></a>
      <ul>
         <li><a href='#'><span>Thêm Mới</span></a></li>
         <li class='last'><a href='#'><span>Tất Cả</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='<?php echo base_url(); ?>backend/oder/listall'><span>Hóa Đơn</span></a>
      <ul>
         <li><a href='#'><span>Tất Cả</span></a></li>
         <li><a href='#'><span>Chưa Giao</span></a></li>
         <li><a href='#'><span>Đã Giao </span></a></li>
         <li><a href='#'><span>Hết Hạn Hôm Nay</span></a></li>
         <li><a href='#'><span>Quá Hạn</span></a></li>
         <li class='last'><a href='#'><span>Đã Trả</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Bài Viết </span></a>
      <ul>
         <li><a href='#'><span>Thêm Mới</span></a></li>
         <li class='last'><a href='#'><span>Tất Cả</span></a></li>
      </ul>
   </li>
   <li><a href='<?php echo base_url(); ?>backend/comment/index'><span>Đánh Giá</span></a></li>
   <li><a href='#'><span>Page</span></a></li>
   <li><a href='#'><span>Quảng Cáo</span></a></li>
   <li><a href='<?php echo base_url(); ?>backend/image/slide'><span>Slideshow</span></a></li>
   <li class='last'><a href='#'><span>Cài Đặt</span></a></li>
</ul>
</div>
</div>
<div class="page">
<?php 
$this->load->view($template);
?>
</div>
<?php
$this->load->view("bottom");
?>
