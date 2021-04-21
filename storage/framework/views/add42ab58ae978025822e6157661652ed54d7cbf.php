
<?php $__env->startSection('title', 'Data'); ?>
<?php $__env->startSection('stitle', 'Peserta'); ?>
<?php $__env->startSection('content'); ?>
	<style type="text/css">
		/*td.details-control {
            cursor: pointer;
        }
        
        tr.shown td.details-control {
            background: #f2f2f2;
        }*/
	</style>
	<div class="row">
        <div class="col-xs-12">
        	<div class="box">
                <div class="box-header">
                  <button onclick="return self.history.back()" class="btn btn-default pull-left">Kembali</button>
                </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datapost" class="table table-bordered table-striped">
	                <thead>
                    <tr><th colspan="100">Ijin <?php echo e($jenis_perizinan[$jp]); ?> - <?php echo e($kepel_title); ?></th></tr>
	                <tr>
	                  <th>ID</th>
                      <th>Peserta</th>
                      <th>Hari, Tanggal Berangkat</th>
                      <th>Hari, Tanggal Kembali</th>
                      <th>Keterangan</th>
                      <th>Status</th>
	                </tr>
	                </thead>
                    <tbody>
                        <?php $__currentLoopData = $perizinan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e(\App\Models\User::where('id', $p->user_id)->pluck('name')->first()); ?></td>
                                <td><?php echo e($hari[explode(', ', $p->hari_tanggal_berangkat)[0]]); ?>, <?php echo e(explode(', ', $p->hari_tanggal_berangkat)[1]); ?> (<?php echo e($p->jam_berangkat); ?>)</td>
                                <?php if($p->hari_tanggal_kembali == ""): ?>
                                    <td>-</td>
                                <?php else: ?>
                                    <td><?php echo e(@$hari[explode(', ', @$p->hari_tanggal_kembali)[0]]); ?>, <?php echo e(explode(', ', @$p->hari_tanggal_kembali)[1]); ?> (<?php echo e(@$p->jam_kembali); ?>)</td>
                                <?php endif; ?>
                                <td><?php echo e($p->keterangan); ?></td>
                                <td <?php if($p->status == 1): ?> style="border-left: 4px solid green" <?php else: ?> style="border-left: 4px solid red" <?php endif; ?>><?php echo e($status_ibip[$p->status]); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
	              </table>
	            </div>
	        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        //SweetAlert2 Toast
        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 1000
        // });

        // detail control
        // function format (d) {
        //     return '<table class="table table-bordered table-striped">'+
        //         '<tr><th>Jenis Perizinan</th><th>Total Peserta</th><th>Berangkat</th><th>Kembali</th></tr>'+
        //         '<tr>'+
        //             '<td>'+$.trim(d.jenis_perizinan)+'</td>'+
        //             '<td>'+$.trim(d.peserta)+'</td>'+
        //             '<td>'+$.trim(d.berangkat)+' Peserta</td>'+
        //             '<td>'+$.trim(d.kembali)+' Peserta</td>'+
        //         '</tr>'+
        //     '</table>';
        // }

        var table = $('#datapost').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/perizinan/peserta.blade.php ENDPATH**/ ?>