<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>ibip - Pengajuan Perizinan</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
      <![endif]-->
    <!-- Custom styles for this template -->
    <link href="{{asset('css/navbar-top.css')}}" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="{{route('welcome')}}">ibip</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('welcome')}}">Beranda <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="{{route('profil')}}">Profil</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="#">Riwayat ibip</a>
          </li>

        </ul>
      </div>
    </nav>
    <main role="main" class="container">
      <form method="post" action="{{url('perizinan/'.$perizinan->id.'/pengajuan-ijin')}}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Kegiatan dan Pelatihan</label>
          <input type="text" class="form-control" value="{{$perizinan->kepel->kepel}}" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" disabled>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Jenis Perizinan</label>
          <input type="text" class="form-control" value="{{$jenis_perizinan[$perizinan->jenis_perizinan]}}" disabled required id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Keterangan</label>
          <textarea class="form-control" required name="keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Proses</button>
        <button type="button" onclick="self.history.back()" class="btn btn-warning">Kembali</button>
      </form>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery 3 -->
      <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{asset('admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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
