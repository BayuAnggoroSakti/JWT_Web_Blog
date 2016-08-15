<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Member</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">

        <div class="login-box">
          
        <div class="panel panel-default top150">
            <div class="panel-heading"><h4 align="center" style="margin: 5px"> <b> LOGIN MEMBER</b></h4></div>
            <div class="login-box-body">
            
                <span><?php echo $captcha_return?></span>
                <?php echo form_open("member/login"); ?>
                    <div class="form-group has-feedback">  
                        <input type="text" class="form-control" name="username" placeholder="username"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>                      
                            <?php echo form_error('password'); ?>              
                    </div>
                   <div class="textfield">
                    <h5>Ketik captcha di bawah ini</h5>
                        <span class="input-group-addon">
                             <?php echo $cap_img; ?>
                        </span>
                      
                        <input type="text" name="captcha" class="form-control" placeholder="Masukkan Captcha" />
                    </div>
                        <?php echo form_error('captcha'); ?>
                        <br>
						
                        <div style="text-align:center;">
                           <input style="text-align=center;width:200px" type="submit"  class="btn btn-primary" value="Masuk" name="submit"/>
                           <a href="<?php echo site_url('member/login/daftar') ?>"><input style="text-align=center;width:200px" type="button"  class="btn btn-success" value="Daftar" name="submit"/></a>
                        </div><!-- /.col -->
                <?php echo form_close(); ?>
                    

</div>
</div>
              

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
       

    </body>
</html>