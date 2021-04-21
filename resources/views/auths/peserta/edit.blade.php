@extends('auths.layouts.app')
@section('title', 'Ubah')
@section('stitle', 'Data Pengguna')
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
         <form role="form" method="POST" action="{{route('users').'/'.$user->id}}">
            @csrf
            @method('PATCH')
            <div class="box-body">

               <div class="form-group @if($errors->has('name')) has-error @endif">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name">
                  @if($errors->has('name')) <span class="help-block"><small>Tidak boleh kosong</small></span> @endif
               </div>

               <div class="form-group @if($errors->has('email')) has-error @endif">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="{{$user->email}}" id="email" name="email">
                  @if($errors->has('email')) <span class="help-block"><small>Tidak boleh kosong</small></span> @endif
               </div>

               <div class="form-group @if($errors->has('password')) has-error @endif">
                  <label for="password">Password <small><span style="color:red">*) kosongkan jika tidak diganti</span></small></label>
                  <input type="text" class="form-control" id="password" name="password">
                  @if($errors->has('password')) <span class="help-block"><small>Tidak boleh kosong</small></span> @endif
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