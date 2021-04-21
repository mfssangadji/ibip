<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Profil Saya</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/form-validation.css')}}" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('logo.png')}}" alt="" width="72" height="72">
        <h2>Form Profil</h2>
        <p class="lead">Berikut merupakan form data diri anda</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <ul class="list-group mb-3">
            @if(Auth::check())
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="{{route('welcome')}}" style="text-decoration: none; color: #000">Beranda</a></h6>
                </div>
              </li>
              
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="{{route('uperizinan')}}" style="text-decoration: none; color: #000">Perizinan</a></h6>
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="{{route('riwayat')}}" style="text-decoration: none; color: #000">Riwayat ibip</a></h6>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="{{route('ulogout')}}" style="text-decoration: none; color: #000">Logout</a></h6>
                </div>
              </li>
            @else
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="{{route('welcome')}}" style="text-decoration: none; color: #000">Beranda</a></h6>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="{{route('ulogin')}}" style="text-decoration: none; color: #000">Login Peserta</a></h6>
                </div>
              </li>
            @endif
          </ul>

          <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form> -->
        </div>
        <div class="col-md-8 order-md-1">
          @if (\Session::has('success'))
              <div class="alert alert-success">
                  Data berhasil diubah.
              </div>
          @endif
          <form method="post" action="" class="needs-validation" novalidate>
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" required id="nip" name="nip" placeholder="" value="{{$user->nip}}" required>
                <div class="invalid-feedback">
                  NIP tidak boleh kosong
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" required id="name" name="name" placeholder="" value="{{$user->name}}" required>
                <div class="invalid-feedback">
                  Nama lengkap tidak boleh kosong
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="no_siswa">Nomor Siswa</label>
                <input type="text" class="form-control" required id="no_siswa" name="no_siswa" placeholder="" value="{{$user->no_siswa}}" required>
                <div class="invalid-feedback">
                  Nomor Siswa tidak boleh kosong
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" required id="email" name="email" placeholder="you@example.com" value="{{$user->email}}" required>
                <div class="invalid-feedback">
                  Email tidak boleh kosong
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="no_telp">No. Telp </label>
              <input type="number" value="{{$user->no_telp}}" class="form-control" required id="no_telp" name="no_telp">
              <div class="invalid-feedback">
                No. Telp tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="password">Password <small style="color: red">*) kosongkan jika tidak diganti</small></label>
              <input type="password" class="form-control" id="password" name="password">
              <div class="invalid-feedback">
                Password tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="kelas">Kelas </label>
              <select class="form-control" name="kelas" required id="kelas">
                @foreach($kelas as $key => $val)
                  @if($key == $user->kelas)
                      <option value="{{$key}}" selected>{{$val}}</option>
                  @else
                      <option value="{{$key}}">{{$val}}</option>
                  @endif
                @endforeach
              </select>
              <div class="invalid-feedback">
                Kelas tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="kegiatan">Kegiatan</label>
              <select name="kepel_id" required class="form-control" id="kepel_id">
                @foreach($kepel as $kepel)
                    @if($kepel->id == $user->kepel_id)
                      <option value="{{$kepel->id}}" selected>{{$kepel->kepel}}</option>
                    @else
                      <option value="{{$kepel->id}}">{{$kepel->kepel}}</option>
                    @endif
                @endforeach
              </select>
              <div class="invalid-feedback">
                Kegiatan tidak boleh kosong
              </div>
            </div>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="gedung" name="stayon" type="radio" value="gedung" @if($user->gedung == 1) checked @endif class="custom-control-input" required>
                <label class="custom-control-label" for="gedung">Gedung D</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="mess" name="stayon" type="radio" value="mess" @if($user->mess == 1) checked @endif class="custom-control-input" required>
                <label class="custom-control-label" for="mess">Mess Putra</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="gedung_flat" name="stayon" type="radio" value="gedung_flat" @if($user->gedung_flat == 1) checked @endif class="custom-control-input" required>
                <label class="custom-control-label" for="gedung_flat">Gedung Flat</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="kamar_gedung">Kamar Gedung </label>
              <select class="form-control" name="kamar_gedung" disabled required id="kamar_gedung">
                <option value="" selected></option>
                @foreach($kamar_gedung as $key => $val)
                  @if($key == $user->kamar_gedung)
                      <option value="{{$key}}" selected>{{$val}}</option>
                  @else
                      <option value="{{$key}}">{{$val}}</option>
                  @endif
                @endforeach
              </select>
              <div class="invalid-feedback">
                Kamar Gedung tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="kamar_mess">Kamar Mess </label>
              <select class="form-control" name="kamar_mess" disabled required id="kamar_mess">
                <option value="" selected></option>
                @foreach($kamar_mess as $key => $val)
                  @if($key == $user->kamar_mess)
                      <option value="{{$key}}" selected>{{$val}}</option>
                  @else
                      <option value="{{$key}}">{{$val}}</option>
                  @endif
                @endforeach
              </select>
              <div class="invalid-feedback">
                Kamar Mess tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="gedung_flat">Gedung Flat </label>
              <select class="form-control" name="gedung_flat_in" disabled required id="gedung_flat_in">
                <option value="" selected></option>
                @foreach($gedung_flat as $key => $val)
                  @if($key == $user->gedung_flat)
                      <option value="{{$key}}" selected>{{$val}}</option>
                  @else
                      <option value="{{$key}}">{{$val}}</option>
                  @endif
                @endforeach
              </select>
              <div class="invalid-feedback">
                Gedung Flat tidak boleh kosong
              </div>
            </div>

            <hr class="mb-4">           
            <button class="btn btn-warning btn-sm" type="submit">Ubah Profil</button>
            <button class="btn btn-default btn-sm" type="submit" onclick="return self.history.back()">Kembali</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy;Copyright - BIN <?php echo date("Y"); ?>, Allright Reserved</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{asset("js/jquery-slim.min.js")}}"><\/script>')</script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/holder.min.js')}}"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      window.onload = function() {
        yourFunction(param1, param2);
      };

      $(document).ready(function(){
        $("input[name='stayon']").click(function () {
            if ($("#gedung").is(":checked")) {
                $('#kamar_mess').prop('disabled', true);
                $('#gedung_flat_in').prop('disabled', true);
                $("#kamar_gedung").removeAttr("disabled");
                $("#kamar_gedung").focus();
            } else if ($("#mess").is(":checked")) {
                $('#kamar_gedung').prop('disabled', true);
                $('#gedung_flat_in').prop('disabled', true);
                $("#kamar_mess").removeAttr("disabled");
                $("#kamar_mess").focus();
            } else if ($("#gedung_flat").is(":checked")) {
                $('#kamar_gedung').prop('disabled', true);
                $('#kamar_mess').prop('disabled', true);
                $("#gedung_flat_in").removeAttr("disabled");
                $("#gedung_flat_in").focus();
            }
        });

        $("input[name='stayon']").ready(function () {
            if ($("#gedung").is(":checked")) {
                $('#kamar_mess').prop('disabled', true);
                $('#gedung_flat_in').prop('disabled', true);
                $("#kamar_gedung").removeAttr("disabled");
                $("#kamar_gedung").focus();
            } else if ($("#mess").is(":checked")) {
                $('#kamar_gedung').prop('disabled', true);
                $('#gedung_flat_in').prop('disabled', true);
                $("#kamar_mess").removeAttr("disabled");
                $("#kamar_mess").focus();
            } else if ($("#gedung_flat").is(":checked")) {
                $('#kamar_gedung').prop('disabled', true);
                $('#kamar_mess').prop('disabled', true);
                $("#gedung_flat_in").removeAttr("disabled");
                $("#gedung_flat_in").focus();
            }
        });
        
      });
    </script>
  </body>
</html>
