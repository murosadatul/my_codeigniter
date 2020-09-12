<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{browser_title}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{base_url}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{base_url}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{base_url}assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{base_url}index2.html">{site_name}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session <br/>
      <span class="text-small text-danger"><?= $this->session->userdata('errorlog'); ?></span> </p>
      <!-- <form action="{base_url}auth" method="post"> -->
      <?php echo form_open('login'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-small text-danger"><?= form_error('username'); ?></span>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" <?php echo set_value('password'); ?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-small text-danger"><?= form_error('password'); ?></span>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <p class="text-center">Copyright &copy; {year_dev}. {site_name}</p>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{base_url}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{base_url}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{base_url}assets/js/adminlte.min.js"></script>

</body>
</html>