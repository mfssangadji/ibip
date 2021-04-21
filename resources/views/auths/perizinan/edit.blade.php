@extends('auths.layouts.app')
@section('title', 'Ubah')
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
         <form role="form" method="POST" action="{{route('perizinan').'/'.$perizinan->id}}">
            @csrf
            @method('PATCH')
            <div class="box-body">

               <div class="form-group @if($errors->has('kepel')) has-error @endif">
                  <label for="name">Nama Kegiatan dan Pelatihan</label>
                  <select class="form-control" name="kepel_id" required>
                    <option selected></option>
                    @foreach($kepel as $kepel)
                      @if($kepel->id == $perizinan->kepel->id)
                        <option value="{{$kepel->id}}" selected>{{$kepel->kepel}}</option>
                      @else
                        <option value="{{$kepel->id}}">{{$kepel->kepel}}</option>
                      @endif
                    @endforeach
                  </select>
               </div>

               <div class="form-group @if($errors->has('kepel')) has-error @endif">
                  <label for="name">Status</label>
                  <select class="form-control" name="jenis_perizinan" required>
                    <option selected></option>
                    @foreach($jenis_perizinan as $key => $val)
                      @if($perizinan->jenis_perizinan == $key)
                        <option value="{{$key}}" selected>{{$val}}</option>
                      @else
                        <option value="{{$key}}">{{$val}}</option>
                      @endif
                    @endforeach
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