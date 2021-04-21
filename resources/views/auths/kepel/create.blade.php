@extends('auths.layouts.app')
@section('title', 'Tambah')
@section('stitle', 'Data Kegiatan Pelatihan')
@section('content')
	<div class="row">
   <!-- left column -->
   <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Form <small>@yield('stitle')</small></h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
         <form role="form" method="POST" action="{{route('kepel')}}">
            @csrf
            <div class="box-body">
               <div class="form-group @if($errors->has('kepel')) has-error @endif">
                  <label for="name">Nama Kegiatan dan Pelatihan</label>
                  <input type="text" class="form-control" value="{{old('kepel')}}" required id="kepel" name="kepel">
                  @if($errors->has('kepel')) <span class="help-block"><small>Tidak boleh kosong</small></span> @endif
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
@endsection
@section('scripts')
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
@endsection