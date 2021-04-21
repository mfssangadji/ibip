<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Cpanel - <?php echo $__env->yieldContent('title'); ?> <?php echo $__env->yieldContent('stitle'); ?></title>
      <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="icon" href="#">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/Ionicons/css/ionicons.min.css')); ?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/AdminLTE.min.css')); ?>">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/skins/_all-skins.min.css')); ?>">
      <!-- Morris chart -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/morris.js/morris.css')); ?>">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/jvectormap/jquery-jvectormap.css')); ?>">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>"><!-- DataTable -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
       <!-- Sweet Alert -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.css" integrity="sha512-gX6K9e/4ewXjtn8Q/oePzgIxs2KPrksR4S2NNMYLxenvF7n7eNon9XbqQxb+5jcqYBVCcncIxqF6fXJYgQtoAg==" crossorigin="anonymous" />
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/select2/dist/css/select2.min.css')); ?>">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
      <![endif]-->
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <?php echo $__env->make('auths.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="main-sidebar">
            <?php echo $__env->make('auths.parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  <?php echo $__env->yieldContent('title'); ?>
                  <small><?php echo $__env->yieldContent('stitle'); ?></small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i> Beranda</a></li>
                  <li class="active"><?php echo $__env->yieldContent('title'); ?> <?php echo $__env->yieldContent('stitle'); ?></li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <?php echo $__env->yieldContent('content'); ?>
            </section>
            <!-- /.content -->
         </div>   
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <div class="pull-right hidden-xs">
               <b>Version</b> 0.0.1
            </div>
            <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">IBIP</a>.</strong> All rights
            reserved.
         </footer>
         <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery 3 -->
      <script src="<?php echo e(asset('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo e(asset('admin/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo e(asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
      <!-- Morris.js charts -->
      <script src="<?php echo e(asset('admin/bower_components/raphael/raphael.min.js')); ?>"></script>
      <script src="<?php echo e(asset('admin/bower_components/morris.js/morris.min.js')); ?>"></script>
      <!-- Sparkline -->
      <script src="<?php echo e(asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo e(asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo e(asset('admin/bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo e(asset('admin/bower_components/moment/min/moment.min.js')); ?>"></script>
      <script src="<?php echo e(asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo e(asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo e(asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo e(asset('admin/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo e(asset('admin/dist/js/adminlte.min.js')); ?>"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?php echo e(asset('admin/dist/js/pages/dashboard.js')); ?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo e(asset('admin/dist/js/demo.js')); ?>"></script>
      <!-- DataTables -->
      <script src="<?php echo e(asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
      <script src="<?php echo e(asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
      <!-- bootstrap datepicker -->
      <script src="<?php echo e(asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
      <!-- Sweet Alert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.js" integrity="sha512-+uGHdpCaEymD6EqvUR4H/PBuwqm3JTZmRh3gT0Lq52VGDAlywdXPBEiLiZUg6D1ViLonuNSUFdbL2tH9djAP8g==" crossorigin="anonymous"></script>
      <!-- Select2 -->
      <script src="<?php echo e(asset('admin/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>
      <?php echo $__env->yieldContent('scripts'); ?>
   </body>
</html><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/layouts/app.blade.php ENDPATH**/ ?>