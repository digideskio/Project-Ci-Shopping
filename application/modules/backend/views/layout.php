<?php
//Default folder view
$folder = "default";
//Load viewport header
if ($page != "login"):
    $this->load->view($folder . "/viewportheader");
    ?>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">IT Shop Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $_SESSION['userid']['fullname']; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $_SESSION['userid']['fullname']; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['userid']['fullname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>backend/index?profile"><i class="fa fa-fw fa-user"></i> Trang cá nhân</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backend/index?profile"><i class="fa fa-fw fa-envelope"></i> Hộp thư</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backend/index?profile"><i class="fa fa-fw fa-gear"></i> Cài đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>backend/index/action?logout"><i class="fa fa-fw fa-power-off"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a class="li-side-nav" href="<?php echo base_url(); ?>backend/index?product"><i class="fa fa-fw fa-dashboard"></i> Quản lý sản phẩm</a>
                    </li>
                    <li>
                        <a class="li-side-nav" href="<?php echo base_url(); ?>backend/index?user"><i class="fa fa-fw fa-user"></i> Quản lý thành viên</a>
                    </li>
                    <li>
                        <a class="li-side-nav" href="<?php echo base_url(); ?>backend/index?article"><i class="fa fa-fw fa-list-alt"></i> Quản lý bài viết</a>
                    </li>
                    <li>
                        <a class="li-side-nav" href="<?php echo base_url(); ?>backend/index?newarticle"><i class="fa fa-fw fa-pencil"></i> Tạo bài viết mới</a>
                    </li>
                    <li>
                        <a class="li-side-nav" href="<?php echo base_url(); ?>backend/index?allpage"><i class="fa fa-fw fa-file"></i> Quản lý trang </a>
                    </li>
                    <li>
                        <a class="li-side-nav" href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="li-side-nav" href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php
                $this->load->view($folder . "/" . $page);
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/Libs/sb-admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>public/Libs/sb-admin/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>public/Libs/sb-admin/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>public/Libs/sb-admin/js/plugins/morris/morris-data.js"></script>';
    <script type="text/javascript">
        //Active li tag
        var curentURL = document.URL;
        var curentPage = curentURL.split("?");
        $('.side-nav').find('li').removeClass("active");
        switch (curentPage[1])
        {
            case "user":
                $('.side-nav').find('li:nth-child(2)').addClass("active");
                break;
            case "profile":
                $('.side-nav').find('li:nth-child(8)').addClass("active");
                break;
            case "product":
                $('.side-nav').find('li:nth-child(1)').addClass("active");
                break;
            case "newarticle":
                $('.side-nav').find('li:nth-child(4)').addClass("active");
                break;
            case "article":
                $('.side-nav').find('li:nth-child(3)').addClass("active");
                break;
            case "allpage":
                $('.side-nav').find('li:nth-child(5)').addClass("active");
                break;
            default:
                $('.side-nav').find('li:nth-child(8)').addClass("active");
                break;
        }
    </script>
    <?php
endif;
//Losd login page
if ($page == "login"):
    $this->load->view($folder . "/" . $page);
endif;
//Load viewport bottom
if ($page != "login")
    $this->load->view($folder . "/viewportbottom");