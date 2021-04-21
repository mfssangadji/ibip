
<?php $__env->startSection('title', 'Tambah'); ?>
<?php $__env->startSection('stitle', 'Perizinan'); ?>
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
         <form role="form" method="POST" action="<?php echo e(route('perizinan')); ?>">
            <?php echo csrf_field(); ?>
            <div class="box-body">
               <div class="form-group <?php if($errors->has('kepel')): ?> has-error <?php endif; ?>">
                  <label for="name">Nama Kegiatan dan Pelatihan</label>
                  <select class="form-control" name="kepel_id" required>
                    <option selected></option>
                    <?php $__currentLoopData = $kepel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kepel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($kepel->id); ?>"><?php echo e($kepel->kepel); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
               </div>

               <div class="form-group <?php if($errors->has('kepel')): ?> has-error <?php endif; ?>">
                  <label for="name">Status</label>
                  <select class="form-control" name="jenis_perizinan" required>
                    <option selected></option>
                    <?php $__currentLoopData = $jenis_perizinan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
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
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/perizinan/create.blade.php ENDPATH**/ ?>