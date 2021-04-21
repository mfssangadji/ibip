
<?php $__env->startSection('title', 'Data'); ?>
<?php $__env->startSection('stitle', 'Peserta'); ?>
<?php $__env->startSection('content'); ?>
	<style type="text/css">
		td.details-control {
            cursor: pointer;
        }
        
        tr.shown td.details-control {
            background: #f2f2f2;
        }
	</style>
	<div class="row">
        <div class="col-xs-12">
        	<div class="box">
	            <!-- /.box-header -->
                <form role="form" method="POST" action="<?php echo e(route('peserta')); ?>">
                    <div class="box-body">
                       <div class="form-group">
                            <select id="table-filter" class="form-control">
                                <option selected disabled>Pilih Kegiatan dan Pelatihan</option>
                                <?php $__currentLoopData = $kepel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kepel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kepel->kepel); ?>"><?php echo e($kepel->kepel); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                       </div>
                    </div>
                 </form>
	            <div class="box-body">
	              <table id="datapost" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Nama Peserta</th>
                      <th>Kegiatan & Pelatihan</th>
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
        function format (d) {
            var kelas = <?php echo json_encode($kelas); ?>;
            var kamar_gedung = <?php echo json_encode($kamar_gedung); ?>;
            var kamar_mess = <?php echo json_encode($kamar_mess); ?>;
            var gedung_flat_in = <?php echo json_encode($gedung_flat); ?>;
            return '<table class="table table-bordered table-striped">'+
                '<tr><th>NIP</th><th>No. Siswa</th><th>No. Telp</th><th>Email</th><th>Kelas</th><th>Gedung D (Kamar)</th><th>Mess (Kamar)</th><th>Flat</th></tr>'+
                '<tr>'+
                    '<td>'+$.trim(d.nip)+'</td>'+
                    '<td>'+$.trim(d.no_siswa)+'</td>'+
                    '<td>'+$.trim(d.no_telp)+'</td>'+
                    '<td>'+$.trim(d.email)+'</td>'+
                    '<td>'+$.trim(kelas[d.kelas])+'</td>'+
                    '<td>'+$.trim(kamar_gedung[d.kamar_gedung])+'</td>'+
                    '<td>'+$.trim(kamar_mess[d.kamar_mess])+'</td>'+
                    '<td>'+$.trim(gedung_flat_in[d.gedung_flat_in])+'</td>'+
                '</tr>'+
            '</table>';
        }

        var table = $('#datapost').DataTable({
            dom: 'lrtip',
            scrollX: false,
            processing: false,
            serverSide: false,
            ajax: "<?php echo e(route('peserta')); ?>",
            columns: [
                {data: 'id', className: 'details-control', name: 'id'},
                {data: 'name', className: 'details-control', name: 'name'},
                {data: 'kepel', className: 'details-control', name: 'kepel'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "order": [[0, 'desc']]
        });

        $('#table-filter').on('change', function(){
           table.search(this.value).draw();   
        })

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
            window.location="<?php echo e(route('peserta')); ?>/"+id+"/edit";
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
                    url: '<?php echo e(route("peserta")); ?>/' + id,
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
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/peserta/index.blade.php ENDPATH**/ ?>