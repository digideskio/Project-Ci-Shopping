<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản lý <small>sản phẩm</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Quản trị
                            </li>
                        </ol>
                    </div>
                </div>
<!-- /.row -->
<a class="inline" href="#inline_content"><button class="btn btn-small btn-primary add-product" type="button"><i class="fa fa-fw fa-pencil"></i>Thêm mới</button></a>
<div style='display:none'>
            <div id='inline_content' style='padding:10px; background:#fff;'>
            <label class="form-title">Thêm mới một sản phẩm</label>
            <div class="form-group has-feedback">
                  <input type="text" class="form-control name" placeholder="Tên của sản phẩm">
            </div>
             <div class="form-group has-feedback">
                  <textarea  class="form-control info"  rows="10" placeholder="Thông tin về sản phẩm"></textarea>
             </div>
             <div class="form-group has-feedback">
                  <input type="text" class="form-control price" placeholder="Giá sản phẩm (VNĐ)">
             </div>
             <div class="form-group has-feedback">
                  <select class="span2 form-control type">
                    <option value="1">Chọn tình trạng sản phẩm</option>
                    <?php
                        foreach ($listtype as $key => $value):
                            echo '<option value="'.$value['ptid'].'">'.$value['ptname'].'</option>';
                        endforeach;
                    ?>
                  </select>
             </div>
             <div class="form-group has-feedback">
                  <select class="span2 form-control category">
                    <option value="1">Chọn loại sản phẩm</option>
                    <?php
                        foreach ($listcate as $key => $value):
                            echo '<option value="'.$value['pcid'].'">'.$value['pcname'].'</option>';
                        endforeach;
                    ?>
                  </select>
             </div>
            <div class="form-group has-feedback">
                  <select class="span2 form-control company">
                    <option value="1">Chọn hãng sản xuất</option>
                    <?php
                        foreach ($listcom as $key => $value):
                            echo '<option value="'.$value['cid'].'">'.$value['cname'].'</option>';
                        endforeach;
                    ?>
                  </select>
             </div>
             <div class="form-group has-feedback">
                  <input type="text" class="form-control quantily" placeholder="Số lượng">
             </div>
             <div class="form-group has-feedback upload">
                    
             </div>
             <div class="form-group has-feedback add-error" style="display:none">
             <p class="text-warning">Thêm mới sản phẩm thất bại.</p>
             </div>
             <div class="form-group has-feedback save-success" style="display:none">
             <p class="text-success">Thêm mới sản phẩm thành công.</p>
             </div>
             <div style="clear:left" class="form-group has-feedback">
              <button class="btn btn-large btn-primary btn-save" type="submit">Thêm</button>
            </div>
            <button type="button" id="cboxClose">close</button>      
            </div>

            <!-- -->
            <div id='inline_content_2' style='padding:10px; background:#fff;'>
            <label class="form-title">Chỉnh sửa sản phẩm</label>
            <div class="form-group has-feedback">
                  <input type="text" class="form-control edit-name" placeholder="Tên của sản phẩm">
            </div>
             <div class="form-group has-feedback">
                  <textarea  class="form-control edit-info"  rows="10" placeholder="Thông tin của sản phẩm"></textarea>
             </div>
             <div class="form-group has-feedback">
                  <input type="text" class="form-control edit-price" placeholder="Giá sản phẩm (VNĐ)">
             </div>
             <div class="form-group has-feedback">
                  <select class="span2 form-control edit-type">
                    <option value="1">Chọn tình trạng sản phẩm</option>
                    <?php
                        foreach ($listtype as $key => $value):
                            echo '<option value="'.$value['ptid'].'">'.$value['ptname'].'</option>';
                        endforeach;
                    ?>
                  </select>
             </div>
             <div class="form-group has-feedback">
                  <select class="span2 form-control edit-category">
                    <option value="1">Chọn loại sản phẩm</option>
                    <?php
                        foreach ($listcate as $key => $value):
                            echo '<option value="'.$value['pcid'].'">'.$value['pcname'].'</option>';
                        endforeach;
                    ?>
                  </select>
             </div>
            <div class="form-group has-feedback">
                  <select class="span2 form-control edit-company">
                    <option value="1">Chọn hãng sản xuất</option>
                    <?php
                        foreach ($listcom as $key => $value):
                            echo '<option value="'.$value['cid'].'">'.$value['cname'].'</option>';
                        endforeach;
                    ?>
                  </select>
             </div>
             <div class="form-group has-feedback">
                  <input type="text" class="form-control edit-quantily" placeholder="Số lượng">
             </div>
             <div class="form-group has-feedback img-upload">
             </div>
             <div class="form-group has-feedback upload-edit">

             </div>
             <div class="form-group has-feedback save-success" style="display:none">
             <p class="text-success">Sản phẩm được lưu thành công.</p>
             </div>
             <div style="clear:left" class="form-group has-feedback">
              <button class="btn btn-large btn-primary btn-save-edit" type="submit">Lưu</button>
            </div>
            <button type="button" id="cboxClose">close</button>      
            </div>

</div>
<div class="hover-active"><button class="btn btn-info">Xem online</button><a class="inline" href="#inline_content_2"><button class="btn btn-primary edit">Chỉnh sửa</button></a><button class="btn btn-danger" onclick="deleteRecord()">Xoá</button></div>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Loại sản phẩm</th>
                <th>Tình trạng</th>
                <th>Hãng sản xuất</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Tên</th>
                <th>Loại sản phẩm</th>
                <th>Tình trạng</th>
                <th>Hãng sản xuất</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php
                foreach ($listproduct as $key => $value):
                            echo '<tr class="hover" id="'.$value['productid'].'">';
                            echo '<td>'.$value['productname'].'</td>';
                            echo '<td>'.$value['pcname'].'</td>';
                            echo '<td>'.$value['ptname'].'</td>';
                            echo '<td>'.$value['cname'].'</td>';
                            echo '<td>'.$value['productprice'].'</td>';
                            echo '<td>'.$value['productquantity'].'</td>';
                            echo '</tr>';

                endforeach;
            ?>
        </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>public/JS/product.js"></script>  
<style type="text/css">
.hover-active
{
    display: none;
    position: relative;
    left: 20%;
    z-index: 999;
}
.hover-active button
{
    margin-right: 5px;
}
.progress {
            position: relative;
        }
 
.progress-text {
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: right;
            padding-right: 5px;
            color: #333;
        }
.image
{
    width: 115px;
    height: 86px;
    float: left;
}
#example_paginate
{
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 0px;
}
</style>