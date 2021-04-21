
<?php $__env->startSection('title', 'Data'); ?>
<?php $__env->startSection('stitle', 'Kegiatan Pelatihan'); ?>
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
	              <a href="<?php echo e(route('kepel.create')); ?>" class="btn btn-primary pull-left">Tambah Data</a>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datapost" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>ID</th>
                      <th>Nama Kegiatan dan Pelatihan</th>
                      <th>Jumlah Peserta</th>
	                  <th>Tahun Kegiatan</th>
	                  <th>Proses</th>
	                </tr>
	                </thead>
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
        //         '<tr><th>Golongan</th><th>Pangkat</th><th>Jabatan</th></tr>'+
        //         '<tr>'+
        //             '<td>'+$.trim(d.golongan)+'</td>'+
        //             '<td>'+$.trim(d.pangkat)+'</td>'+
        //             '<td>'+$.trim(d.jabatan)+'</td>'+
        //         '</tr>'+
        //     '</table>';
        // }

        var table = $('#datapost').DataTable({
            scrollX: false,
            processing: false,
            serverSide: false,
            ajax: "<?php echo e(route('kepel')); ?>",
            columns: [
                {data: 'id', className: 'details-control', name: 'id'},
                {data: 'kepel', className: 'details-control', name: 'kepel'},
                {data: 'peserta', className: 'details-control', name: 'peserta'},
                {data: 'tahun', className: 'details-control', name: 'tahun'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "order": [[0, 'desc']]
        });

        // detail control
        $('#datapost tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
     
            if (row.child.isShown()){
                row.child.hide();
                tr.removeClass('shown');
            }else{
                row.child( format(row.data())).show();
                tr.addClass('shown');
            }
        });

        /** edit **/
        $('#datapost').on('click', 'a.edit', function (e) {
            e.preventDefault();
            var tr = $(this).closest('tr');
            var id = tr.children('td:eq(0)').text();
            window.location="<?php echo e(route('kepel')); ?>/"+id+"/edit";
        });

        /** delete **/
        $('#datapost').on('click', '.delete', function (e) {
            e.preventDefault();
            var tr = $(this).closest('tr');
            var id = tr.children('td:eq(0)').text();
            var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
            
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success btn-sm',
                cancelButton: 'btn btn-danger btn-sm',
              },
              buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
              title: 'Apakah anda yakin?',
              text: "Tekan 'Ya' jika ingin menghapus data ini.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Ya',
              cancelButtonText: 'Tidak',
              reverseButtons: false
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '<?php echo e(route("kepel")); ?>/' + id,
                    data: {_token: CSRF_TOKEN},
                    success: function (data) { 
                        $('#datapost').DataTable().ajax.reload();
                    }
                }); 

                swalWithBootstrapButtons.fire(
                  'Berhasil',
                  'Data telah dihapus.',
                  'success'
                )
              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                
              }
            })
        });   
 });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/kepel/index.blade.php ENDPATH**/ ?>