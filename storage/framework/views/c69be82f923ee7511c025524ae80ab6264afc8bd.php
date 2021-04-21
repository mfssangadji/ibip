<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>ibip - Perizinan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
      <![endif]-->
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/navbar-top.css')); ?>" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>">ibip</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo e(route('welcome')); ?>">Beranda <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?php echo e(route('profil')); ?>">Profil</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?php echo e(route('riwayat')); ?>">Riwayat ibip</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?php echo e(route('ulogout')); ?>">Logout</a>
          </li>

        </ul>
      </div>
    </nav>
    <main role="main" class="d" style="width: 100%">
      <div style="padding: 30px;">
      <!-- /.box-header -->
      <div class="box-body">
        <table id="datapost" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th colspan="100"><?php echo e(@$perizinan->last()->kepel->kepel); ?></th>
          </tr>
          <tr>
            <th>ID</th>
              <th>Jenis Perizinan</th>
              <th>Tanggal Perizinan</th>
              <th>Status</th>
              <th>Proses</th>
          </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $perizinan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($jenis_perizinan[$p->jenis_perizinan]); ?></td>
                <td><?php echo e($status_perizinan[$p->status]); ?></td>
                <td><?php echo e($p->created_at->format('d F Y')); ?></td>
                <td>
                  <?php if(@$p->id == @Auth::user()->ibip->perizinan_id): ?>
                    -
                  <?php else: ?>
                    <a href="<?php echo e(url('perizinan/'.$p->id.'/pengajuan-ijin')); ?>">Ijin <?php echo e($jenis_perizinan[$p->jenis_perizinan]); ?></a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
      <!-- DataTables -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#datapost').DataTable();
      } );
  </script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\ibip\resources\views/perizinan.blade.php ENDPATH**/ ?>