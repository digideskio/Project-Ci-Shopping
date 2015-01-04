<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Trang cá nhân
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> Thông tin cá nhân của <b><?php echo $_SESSION['userid']['fullname']; ?></b>
                            </li>
                        </ol>
                    </div>
                </div>
<!--- Form -->
<div class="form-group has-feedback">
<input type="text" class="form-control" value="<?php echo $_SESSION['userid']['email']; ?>" placeholder="Email đăng nhập không thể thay đổi" disabled="disabled">
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control name" placeholder="Tên đầy đủ của bạn " value="<?php echo $_SESSION['userid']['fullname']; ?>">
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control com" placeholder="Công ty của bạn " value="<?php echo $_SESSION['userid']['company']; ?>">
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control phone" placeholder="Số điện thoại của bạn " value="<?php echo $_SESSION['userid']['phone']; ?>">
</div>
<div class="form-group has-feedback">
<textarea  class="form-control address"  rows="3" placeholder="Địa chỉ sinh sống của bạn"><?php echo $_SESSION['userid']['address']; ?></textarea>
</div>
<div class="form-group has-feedback save-error" style="display:none">
<p class="text-warning">Vui lòng nhập đầy đủ thông tin của bạn</p>
</div>
<div class="form-group has-feedback save-success" style="display:none">
<p class="text-success">Thông tin của bạn đã được cập nhật.</p>
</div>
<div style="clear:left" class="form-group has-feedback">
<button class="btn btn-large btn-primary submit1" type="submit">Cập nhật</button>
</div>
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-lock"></i> Thay đổi mật khẩu
</li>
</ol>
<div class="form-group has-feedback">
<input type="password" class="form-control oldpass" placeholder="Mật khẩu cũ của bạn">
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control pass1" placeholder="Mật khẩu mới của bạn">
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control pass2" placeholder="Nhập lại mật khẩu mới của bạn">
</div>
<div class="form-group has-feedback pass-error" style="display:none">
<p class="text-warning">Vui lòng nhập đầy đủ và chính xác mật khẩu cũ và mật khẩu mới</p>
</div>
<div class="form-group has-feedback pass-success" style="display:none">
<p class="text-success">Thông tin của bạn đã được cập nhật.</p>
</div>
<div style="clear:left" class="form-group has-feedback">
<button class="btn btn-large btn-primary submit2" type="submit">Thay đổi</button>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/JS/profile.js"></script> 