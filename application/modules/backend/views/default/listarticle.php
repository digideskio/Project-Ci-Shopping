<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý bài viết
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"></i> Danh sách các bài viết
            </li>
        </ol>
    </div>
</div>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Hình ảnh hoạ bài viết</th>
            <th>Tiêu đề </th>
            <th>Người đăng </th>
            <th>Ngày đăng </th>
            <th>Ngày cập nhật </th>
            <th>Xuất bản </th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Hình ảnh minh hoạ bài viết  </th>
            <th>Tiêu đề </th>
            <th>Người đăng </th>
            <th>Ngày đăng </th>
            <th>Ngày cập nhật </th>
            <th>Xuất bản </th>
        </tr>
    </tfoot>

    <tbody>
        <?php
        foreach ($listarticle as $key => $value):
            echo '<tr>';
            ;
            $img = $value['img'];
            $img = str_replace("[", "", $img);
            $img = str_replace("]", "", $img);
            $img = str_replace('"', "", $img);
            if ($img != "") {
                echo '<td><a id="' . $value['id'] . '" class="inline" href="#inline_content_1"><img width="200px" src="' . base_url() . 'upload/' . $img . '"></a></td>';
            } else {
                echo '<td><a id="' . $value['id'] . '" class="inline" href="#inline_content_1"><img width="200px" src="' . base_url() . 'upload/September2014113421AMno-image.jpg"></a></td>';
            }
            echo '<td>' . $value['title'] . '</td>';
            echo '<td>' . $value['fullname'] . '</td>';
            echo '<td>' . $value['datecreated'] . '</td>';
            echo '<td>' . $value['dateupdate'] . '</td>';
            if ($value['public'] == 1) {
                echo '<td>Chưa </td>';
            } else {
                echo '<td>Có </td>';
            }
            echo '</tr>';

        endforeach;
        ?>
    </tbody>
</table>
<div style="display: none">
    <div id='inline_content_1' style='padding:10px; background:#fff;'>
        <div style="height: 400px;text-align: center" class="img-view">

        </div>
        <div style="text-align: center" class="form-group has-feedback">
            <a href="<?php echo base_url(); ?>backend/index?editarticle"><button class="btn btn-large btn-primary submit btn-info" type="submit">Xem online </button></a>
            <a href="<?php echo base_url(); ?>backend/index?editarticle"><button class="btn btn-large btn-primary submit" type="submit">Chỉnh sửa</button></a>
            <button class="btn btn-large btn-primary submit btn-danger" type="submit">Xoá </button>
        </div>  
    </div>

</div>
<script>
    var id = 0;
    $('.inline').click(function () {
        id = $(this).attr('id');
        id1 = parseInt(id);
        $.ajax({
            url: baseUrl + 'backend/index/action?articelbyid',
            type: 'POST',
            data: {id: id1},
            success: function (data)
            {
                if (data.img !== '[]')
                {
                    image = data.img;
                    image = image.replace(']', '');
                    image = image.replace('[', '');
                    image = image.replace('"', '');
                    $('.img-view').html('<img width="500px" src="' + baseUrl + 'upload/' + image + '">');
                } else
                {
                    $('.img-view').html('<img width="500px" src="' + baseUrl + 'upload/September2014113421AMno-image.jpg">');
                }
            }
        });
    });
    $('#example').dataTable();
    //Examples of how to assign the Colorbox event to elements
    $(".inline").colorbox({inline: true, width: "50%"});
    $(".callbacks").colorbox({
        onOpen: function () {
            alert('onOpen: colorbox is about to open');
        },
        onLoad: function () {
            alert('onLoad: colorbox has started to load the targeted content');
        },
        onComplete: function () {
            alert('onComplete: colorbox has displayed the loaded content');
        },
        onCleanup: function () {
            alert('onCleanup: colorbox has begun the close process');
        },
        onClosed: function () {
            alert('onClosed: colorbox has completely closed');
        }
    });

    $('.non-retina').colorbox({rel: 'group4', transition: 'none'})
    $('.retina').colorbox({rel: 'group4', transition: 'none', retinaImage: true, retinaUrl: true});

    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function () {
        $('#click').css({"background-color": "#f00", "color": "#fff", "cursor": "inherit"}).text("Open this window again and this message will still be here.");
        return false;
    });
</script>