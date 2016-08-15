<!DOCTYPE html>
<html>
      <meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
  <body class="hold-transition register-page">
    <div class="register-box">

      <div class="register-box-body">
         <div class="panel-heading"><h4 align="center" style="margin: 5px"><i class="glyphicon glyphicon-user"></i> <b> Daftar Member</b></h4></div>
         <span><?php echo $captcha_return?></span>
        <form action="<?php echo site_url('member/login/daftar') ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" placeholder="Nama Lengkap">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('nama'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo form_error('email'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('username'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="passconf" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <?php echo form_error('password'); ?>
          </div>
          <div class="form-group has-feedback">
            <textarea class="form-control" name="alamat" placeholder="Alamat lengkap" rows="3"><?php echo set_value('alamat') ?></textarea>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
            <?php echo form_error('alamat'); ?>
          </div>
           <div class="form-group has-feedback">
           <!--  <input type="text" name="no_hp" class="form-control" value="<?php echo set_value('no_hp') ?>" placeholder="Nomor HP"> -->
            <select name="no_hp">
              <option value="123123">halo</option>
              <option value="213123">bayue</option>
            </select>
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            <?php echo form_error('no_hp'); ?>
          </div>
                     <div class="textfield">
                    <h3>Ketik Captcha di bawah ini :</h3>
                        <span class="input-group-addon">
                             <?php echo $cap_img; ?>
                        </span>
                      
                        <input type="text" name="captcha" class="form-control" placeholder="Masukkan Captcha" />
                    </div>
                        <?php echo form_error('captcha'); ?>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
             <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
              <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat">
            </div><!-- /.col -->
          </div>
        </form>

      
      </div><!-- /.form-box -->
    <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
    </body>
</html>