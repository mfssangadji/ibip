<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>ibip system</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">ibip</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Beranda</a>
            @if(Auth::check())
              <a class="nav-link" href="{{route('profil')}}">Profil</a>
              <a class="nav-link" href="{{route('uperizinan')}}">Perizinan</a>
              <a class="nav-link" href="{{route('riwayat')}}">Riwayat ibip</a>
              <a class="nav-link" href="{{route('ulogout')}}">Logout</a>
            @else
              <a class="nav-link" href="{{route('registrasi')}}">Registrasi</a>
              <a class="nav-link" href="{{route('ulogin')}}">Login</a>
            @endif
            
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">ibip</h1>
        <p class="lead">Optimalisasi Form Perijinan Siswa Melalui Digitalisasi Pada Pusat Pendidikan dan Pelatihan Badan Intelijen Negara</p>
        <img src="{{asset('logo.png')}}" style="width: 300px; border-radius: 50px;">
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>&copy;Copyright - <a href="https://bin.go.id/" target="_blank">BIN</a> <?php echo date("Y"); ?>, Allright Reserved
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{asset("js/jquery-slim.min.js")}}"><\/script>')</script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </body>
</html>
