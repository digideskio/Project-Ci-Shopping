<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản lý trang 
        </h1>             
    </div>
</div>
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-bell"></i> Trang liên hệ 
    </li>
</ol>
<div class="form-group has-feedback">
    <input type="text" class="form-control url1" value="<?php echo base_url(); ?>lien-he.html"disabled="disabled">
</div>
<p>
    <textarea class="ckeditor content1" cols="80" id="editor2" rows="20"><?php echo $mpage['0']['content']; ?></textarea>
</p>
<div class="form-group has-feedback save-error" style="display:none">
    <p class="text-warning">Vui lòng nhập nội dung </p>
</div>
<div class="form-group has-feedback save-success" style="display:none">
    <p class="text-success">Đã lưu </p>
</div>
<div style="clear:left" class="form-group has-feedback">
    <button class="btn btn-large btn-primary submit1" type="submit">Cập nhật</button>
</div>
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-bullhorn "></i> Trang giới thiệu 
    </li>
</ol>
<div class="form-group has-feedback">
    <input type="text" class="form-control url2" value="<?php echo base_url(); ?>gioi-thieu.html"disabled="disabled">
</div>
<p>
    <textarea class="ckeditor content2" cols="80" id="editor1" rows="20"><?php echo $mpage['1']['content']; ?></textarea>
</p>
<div class="form-group has-feedback save-error-2" style="display:none">
    <p class="text-warning">Vui lòng nhập nội dung </p>
</div>
<div class="form-group has-feedback save-success-2" style="display:none">
    <p class="text-success">Đã lưu </p>
</div>
<div style="clear:left" class="form-group has-feedback">
    <button class="btn btn-large btn-primary submit2" type="submit">Cập nhật</button>
</div>
<script src="<?php echo base_url(); ?>CK/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>CK/adapters/jquery.js"></script>
<script>
    CKEDITOR.replace('editor2',{height: '500px'});
    CKEDITOR.replace('editor1',{height: '500px'});
    $('.submit1').click(function () {
        var content = CKEDITOR.instances.editor2.getData();
        if (content !== '')
        {
            $.ajax({
                url: baseUrl + 'backend/index/action?updatepage1',
                type: 'POST',
                data: {content: content},
                success: function (data)
                {
                    $('.save-error').css({"display": "none"});
                    $('.save-success').css({"display": "inline-block"});
                    setTimeout("location.reload(true);", 2000);
                }
            });
        } else
        {
            $('.save-error').css({"display": "block"});
        }
    });
    $('.submit2').click(function () {
        var content = CKEDITOR.instances.editor1.getData();
        if (content !== '')
        {
            $.ajax({
                url: baseUrl + 'backend/index/action?updatepage2',
                type: 'POST',
                data: {content: content},
                success: function (data)
                {
                    $('.save-error-2').css({"display": "none"});
                    $('.save-success-2').css({"display": "inline-block"});
                    setTimeout("location.reload(true);", 2000);
                }
            });
        } else
        {
            $('.save-error-2').css({"display": "block"});
        }
    });
</script>