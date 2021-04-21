
<?php $__env->startSection('title', 'Tambah'); ?>
<?php $__env->startSection('stitle', 'Data Pengguna'); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
   <!-- left column -->
   <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Form <small><?php echo $__env->yieldContent('stitle'); ?></small></h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
         <form role="form" method="POST" action="<?php echo e(route('users')); ?>">
            <?php echo csrf_field(); ?>
            <div class="box-body">

               <div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" id="name" name="name">
                  <?php if($errors->has('name')): ?> <span class="help-block"><small>Tidak boleh kosong</small></span> <?php endif; ?>
               </div>

               <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" name="email">
                  <?php if($errors->has('email')): ?> <span class="help-block"><small>Tidak boleh kosong</small></span> <?php endif; ?>
               </div>

               <div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
                  <label for="password">Password</label> <small style="color: #666">Generated</small>
                  <input type="text" class="form-control" value="<?php echo e(rand(111111,999999)); ?>" id="password" name="password">
                  <?php if($errors->has('password')): ?> <span class="help-block"><small>Tidak boleh kosong</small></span> <?php endif; ?>
               </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <button type="submit" class="btn btn-primary">Proses</button>
               <button type="button" onclick="self.history.back()" class="btn btn-default">Batal</button>
            </div>
         </form>
      </div>
      <!-- /.box -->
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            maximumSelectionLength: 1,
            theme: 'classic'
        })

        $('.select2x').select2({
            maximumSelectionLength: 1,
            theme: 'classic',
            tags: true
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/users/create.blade.php ENDPATH**/ ?>