<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập <?php echo $title; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>public/Libs/bootstrap/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
        <link href="<?php echo base_url(); ?>public/Libs/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">

            <form action="" method="post" class="form-signin">
                <h2 class="form-signin-heading">Đăng Nhập</h2>
                <input type="text" class="input-block-level email" placeholder="Địa chỉ email">
                <input type="password" class="input-block-level password" placeholder="Mật khẩu">
                <div style="display:none" class="alert alert-error">
                Địa chỉ email và mật khẩu chưa chính xác. Vui lòng nhập lại lần nữa !
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Ghi nhớ
                </label>
                <button class="btn btn-large btn-primary submit">Đăng nhập</button>
            </form>

        </div> <!-- /c ontainer -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>public/Libs/jquery-2.1.1.min.js"></script>
        <script>
            $(document).ready(function(){
                params = window.location.href;
                $(".alert-error").hide();            
                $(".submit").click(function(event){
                    event.preventDefault();
                    var email = $(".email").val();
                    var password = $(".password").val();
                    if(email !=="" && password !=="")
                    {
                        var filter = {};
                        filter.email = email;
                        filter.password = password;
                        $.ajax({
                            type: "POST",
                            url: params,
                            data: { data:filter}
                        })
                        .done(function(data) {
                            console.log(data);
                            if(data === "false")
                                {
                                   $(".alert-error").show(); 
                                }
                                else
                                    {
                                        location.reload();
                                    }
                        });
                        
                    }
                else
                {
                    $(".alert-error").show();
                }

              
        });
});
        </script>
    </body>
</html>
