<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản lý <small> thành viên</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i>  Quản trị
                            </li>
                        </ol>
                    </div>
                </div>
<!-- /.row -->
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Team</th>
                <th>Công ty</th>
                <th>Kích hoạt</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Team</th>
                <th>Công ty</th>
                <th>Kích hoạt</th>
                <th>Ngày tạo</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php
                foreach ($listuser as $key => $value):
                            echo '<tr class="hover" id="'.$value['userid'].'">';
                            echo '<td>'.$value['fullname'].'</td>';
                            echo '<td>'.$value['email'].'</td>';
                            echo '<td>'.$value['teamname'].'</td>';
                            echo '<td>'.$value['company'].'</td>';
                            echo '<td>'.$value['statusname'].'</td>';
                            echo '<td>'.$value['dateregistered'].'</td>';
                            echo '</tr>';

                endforeach;
            ?>
        </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>public/JS/user.js"></script>  