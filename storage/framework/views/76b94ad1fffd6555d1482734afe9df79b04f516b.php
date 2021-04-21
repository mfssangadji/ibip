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
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/form-validation.css')); ?>" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo e(asset('logo.png')); ?>" alt="" width="72" height="72">
        <h2>Form Profil</h2>
        <p class="lead">Berikut merupakan form data diri anda</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <ul class="list-group mb-3">
            <?php if(Auth::check()): ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="<?php echo e(route('welcome')); ?>" style="text-decoration: none; color: #000">Beranda</a></h6>
                </div>
              </li>
              
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="<?php echo e(route('uperizinan')); ?>" style="text-decoration: none; color: #000">Perizinan</a></h6>
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="<?php echo e(route('riwayat')); ?>" style="text-decoration: none; color: #000">Riwayat ibip</a></h6>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="<?php echo e(route('ulogout')); ?>" style="text-decoration: none; color: #000">Logout</a></h6>
                </div>
              </li>
            <?php else: ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="<?php echo e(route('welcome')); ?>" style="text-decoration: none; color: #000">Beranda</a></h6>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><a href="<?php echo e(route('ulogin')); ?>" style="text-decoration: none; color: #000">Login Peserta</a></h6>
                </div>
              </li>
            <?php endif; ?>
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
          <?php if(\Session::has('success')): ?>
              <div class="alert alert-success">
                  Data berhasil diubah.
              </div>
          <?php endif; ?>
          <form method="post" action="" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" required id="nip" name="nip" placeholder="" value="<?php echo e($user->nip); ?>" required>
                <div class="invalid-feedback">
                  NIP tidak boleh kosong
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" required id="name" name="name" placeholder="" value="<?php echo e($user->name); ?>" required>
                <div class="invalid-feedback">
                  Nama lengkap tidak boleh kosong
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="no_siswa">Nomor Siswa</label>
                <input type="text" class="form-control" required id="no_siswa" name="no_siswa" placeholder="" value="<?php echo e($user->no_siswa); ?>" required>
                <div class="invalid-feedback">
                  Nomor Siswa tidak boleh kosong
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" required id="email" name="email" placeholder="you@example.com" value="<?php echo e($user->email); ?>" required>
                <div class="invalid-feedback">
                  Email tidak boleh kosong
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="no_telp">No. Telp </label>
              <input type="number" value="<?php echo e($user->no_telp); ?>" class="form-control" required id="no_telp" name="no_telp">
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
                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key == $user->kelas): ?>
                      <option value="<?php echo e($key); ?>" selected><?php echo e($val); ?></option>
                  <?php else: ?>
                      <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <div class="invalid-feedback">
                Kelas tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="kegiatan">Kegiatan</label>
              <select name="kepel_id" required class="form-control" id="kepel_id">
                <?php $__currentLoopData = $kepel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kepel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($kepel->id == $user->kepel_id): ?>
                      <option value="<?php echo e($kepel->id); ?>" selected><?php echo e($kepel->kepel); ?></option>
                    <?php else: ?>
                      <option value="<?php echo e($kepel->id); ?>"><?php echo e($kepel->kepel); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <div class="invalid-feedback">
                Kegiatan tidak boleh kosong
              </div>
            </div>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="gedung" name="stayon" type="radio" value="gedung" <?php if($user->gedung == 1): ?> checked <?php endif; ?> class="custom-control-input" required>
                <label class="custom-control-label" for="gedung">Gedung D</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="mess" name="stayon" type="radio" value="mess" <?php if($user->mess == 1): ?> checked <?php endif; ?> class="custom-control-input" required>
                <label class="custom-control-label" for="mess">Mess Putra</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="gedung_flat" name="stayon" type="radio" value="gedung_flat" <?php if($user->gedung_flat == 1): ?> checked <?php endif; ?> class="custom-control-input" required>
                <label class="custom-control-label" for="gedung_flat">Gedung Flat</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="kamar_gedung">Kamar Gedung </label>
              <select class="form-control" name="kamar_gedung" disabled required id="kamar_gedung">
                <option value="" selected></option>
                <?php $__currentLoopData = $kamar_gedung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key == $user->kamar_gedung): ?>
                      <option value="<?php echo e($key); ?>" selected><?php echo e($val); ?></option>
                  <?php else: ?>
                      <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <div class="invalid-feedback">
                Kamar Gedung tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="kamar_mess">Kamar Mess </label>
              <select class="form-control" name="kamar_mess" disabled required id="kamar_mess">
                <option value="" selected></option>
                <?php $__currentLoopData = $kamar_mess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key == $user->kamar_mess): ?>
                      <option value="<?php echo e($key); ?>" selected><?php echo e($val); ?></option>
                  <?php else: ?>
                      <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <div class="invalid-feedback">
                Kamar Mess tidak boleh kosong
              </div>
            </div>

            <div class="mb-3">
              <label for="gedung_flat">Gedung Flat </label>
              <select class="form-control" name="gedung_flat_in" disabled required id="gedung_flat_in">
                <option value="" selected></option>
                <?php $__currentLoopData = $gedung_flat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key == $user->gedung_flat): ?>
                      <option value="<?php echo e($key); ?>" selected><?php echo e($val); ?></option>
                  <?php else: ?>
                      <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\ibip\resources\views/profil.blade.php ENDPATH**/ ?>