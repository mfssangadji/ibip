@extends('auths.layouts.app')
@section('title', 'Data')
@section('stitle', 'Peserta')
@section('content')
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
                    <tr><th colspan="100">Ijin {{$jenis_perizinan[$jp]}} - {{$kepel_title}}</th></tr>
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
                        @foreach($perizinan as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{\App\Models\User::where('id', $p->user_id)->pluck('name')->first()}}</td>
                                <td>{{$hari[explode(', ', $p->hari_tanggal_berangkat)[0]]}}, {{explode(', ', $p->hari_tanggal_berangkat)[1]}} ({{$p->jam_berangkat}})</td>
                                @if($p->hari_tanggal_kembali == "")
                                    <td>-</td>
                                @else
                                    <td>{{@$hari[explode(', ', @$p->hari_tanggal_kembali)[0]]}}, {{explode(', ', @$p->hari_tanggal_kembali)[1]}} ({{@$p->jam_kembali}})</td>
                                @endif
                                <td>{{$p->keterangan}}</td>
                                <td @if($p->status == 1) style="border-left: 4px solid green" @else style="border-left: 4px solid red" @endif>{{$status_ibip[$p->status]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
	              </table>
	            </div>
	        </div>
        </div>
    </div>
@endsection
@section('scripts')
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
@endsection