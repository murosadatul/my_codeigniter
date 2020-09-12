<!--
 * index.php
 * @author Murosadatul Mahmud <murosadatul@gmail.com>
 * @access public
 * @link https://github.com/murosadatul/my_codeigniter/application/views/theme/
 *-->
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
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <?php if(empty(!$load_plugins)){foreach ($load_plugins as $key => $value) {$this->load->view('theme/plugins/'.$load_plugins[$key].'css');}}?>
  {page_css}
  <!-- Theme style -->
  <link rel="stylesheet" href="{base_url}assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{base_url}assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
  <!--icon--> 
  <!-- <link rel="icon" type="image/png" sizes="16x16" href="{base_url}{favicon}"> -->
  <!-- Google Font: Source Sans Pro -->
  <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed"> 
<div class="wrapper">
  <!-- Navbar -->
  {navbar}
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  {sidebar}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {breadcrumb}
    <!-- /.content-header -->
    <!-- Main content -->
    {main_content}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">Copyright &copy; {year_dev}. {site_name} || Page rendered in <strong>{elapsed_time}</strong> seconds</footer>
  
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{base_url}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{base_url}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{base_url}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{base_url}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<!-- AdminLTE App -->
<script src="{base_url}assets/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="{base_url}assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript"> var base_url = '{base_url}';</script>
<script src="{base_url}assets/js/pages/mylib.js"></script>
<?php if(empty(!$load_plugins)){foreach ($load_plugins as $key => $value) {$this->load->view('theme/plugins/'.$load_plugins[$key].'js');}}?>
{page_js}
</body>
</html>