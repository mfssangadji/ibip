<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>ibip - Riwayat</title>

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
            <a class="nav-link" href="{{route('uperizinan')}}">Perizinan</a>
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
            <th colspan="100">{{@$ibip->last()->perizinan->kepel->kepel}}</th>
          </tr>
          <tr>
            <th>ID</th>
              <th>Jenis Perizinan</th>
              <th>Tanggal Perizinan</th>
              <th>Berangkat</th>
              <th>Kembali</th>
              <th>Keterangan</th>
              <th>Proses</th>
          </tr>
          </thead>
          <tbody>
            @foreach($ibip as $i)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jenis_perizinan[$i->perizinan->jenis_perizinan]}}</td>
                <td>{{$i->perizinan->created_at->format('d F Y')}}</td>
                <td>{{$hari[explode(', ', $i->hari_tanggal_berangkat)[0]]}}, {{explode(', ', $i->hari_tanggal_berangkat)[1]}} ({{$i->jam_berangkat}})</td>
                @if($i->hari_tanggal_kembali == "")
                  <td>-</td>
                @else
                  <td>{{$hari[explode(', ', $i->hari_tanggal_kembali)[0]]}}, {{explode(', ', $i->hari_tanggal_kembali)[1]}} ({{$i->jam_kembali}})</td>
                @endif
                <td>{{$i->keterangan}}</td>
                @if($i->status == 0)
                  <td><a href="{{url('riwayat/'.$i->id)}}/comeback" onclick="return confirm('Apakah anda yakin?')">Konfirmasi Kembali</a> - <a href="{{url('riwayat/'.$i->id)}}/delete" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
                @else
                  <td>-</td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
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
