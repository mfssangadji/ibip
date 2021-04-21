<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Form Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/form-validation.css')); ?>" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo e(asset('logo.png')); ?>" alt="" width="72" height="72">
        <h2>Form Login</h2>
        <p class="lead">Lengkapi form login dibawah ini untuk masuk kedalam sistem</p>
      </div>
      <?php if(\Session::has('success')): ?>
          <div class="alert alert-success">
              Registrasi berhasil, silahkan login.
          </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><a href="<?php echo e(route('welcome')); ?>" style="text-decoration: none; color: #000">Beranda</a></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><a href="<?php echo e(route('registrasi')); ?>" style="text-decoration: none; color: #000">Registrasi Peserta</a></h6>
              </div>
            </li>
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
          <form method="post" action="" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" required id="nip" name="nip" placeholder="" value="" required>
                <div class="invalid-feedback">
                  NIP tidak boleh kosong
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" required id="password" name="password" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Password tidak boleh kosong
                </div>
              </div>
            </div>

            <hr class="mb-4">           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
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
    <script>window.jQuery || document.write('<script src="<?php echo e(asset("js/jquery-slim.min.js")); ?>"><\/script>')</script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/holder.min.js')); ?>"></script>
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

      $(function () {
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
    });
    </script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\ibip\resources\views/login.blade.php ENDPATH**/ ?>