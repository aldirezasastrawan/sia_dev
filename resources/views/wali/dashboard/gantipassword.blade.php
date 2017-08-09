@extends('admin.layout.masterwali')
@section('content')
<br>
<br>
  <div class="container"> 
    <h1>
            Ubah Password
            <small>Control panel</small>
      </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ubah Password {{Auth::user()->role->namaRule}}</li>
          </ol>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.5 -->
            <link href="{{URL::asset('tmptadmin/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet"  type="text/css">
            <!-- Font Awesome -->
            <link href="{{URL::asset('tmptadmin/bootstrap/css/font-awesome.min.css')}}"  rel="stylesheet"  type="text/css" >
            <!-- Ionicons -->
            <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
            <!-- <link href="{{URL::asset('admin/plugins/ionicons/css/ionicons.min.css')}}"  rel="stylesheet"  type="text/css" > -->
            <!-- jvectormap -->
            
            <link href="{{URL::asset('tmptadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"  type="text/css" >
            <!-- Theme style -->
           
            <link href="{{URL::asset('tmptadmin/dist/css/AdminLTE.min.css')}}" rel="stylesheet"  type="text/css" >
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            
            <link href="{{URL::asset('tmptadmin/dist/css/skins/_all-skins.min.css')}}"  rel="stylesheet" >
            <link href="{{URL::asset('tmptadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">
            <link href="{{URL::asset('auth/images/logo.ico') }}" rel="SHORTCUT ICON" />
            <link href="{{URL::asset('tmptadmin/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
            <!-- bikin script base_url untuk dipanggil dari javascript -->
            <meta name="base_url" content="{{ URL::to('/') }}">

          <div class="row">
            <div class="col-xs-12">
              <div class="box-body flash-message" data-uk-alert>
                <a href="" class="uk-alert-close uk-close"></a>
                <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
                 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada kesalahan saat melakukan input data.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>
              <div class="box">
                <div class="box box-primary">   
                  <div class="box-header">
                    <br>
                  </div><!-- /.box-header -->               
                  <div class="box-body no-padding">
                      <form id="formResetPassword" class="form-horizontal" role="form" method="POST" action="{{{ URL::to('/resetpassword') }}}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label class="col-md-4 control-label">Password Lama</label>
                          <div class="col-md-4 @if ($errors->has('passwordlama')) has-error @endif">
                              <input type="password" class="form-control" name="passwordlama" value="{{Request::old('passwordlama')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Password Baru </label>
                          <div class="col-md-4  @if ($errors->has('password')) has-error @endif">
                              <input type="password" class="form-control" name="password" value="{{Request::old('password')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Konfirmasi Password Baru </label>
                          <div class="col-md-4  @if ($errors->has('password_confirmation')) has-error @endif">
                              <input type="password" class="form-control" name="password_confirmation" value="{{Request::old('password_confirmation')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>                              
                              <a href="{{{ URL::to('/wali') }}}" title="Cancel">
                              <button type="button" class="btn btn-default" id="button-reg">
                                  Cancel
                              </button>
                              </a>  
                          </div>
                      </div>
                      </form>   
                  </div><!-- /.box-body -->
                </div><!-- /.box -->

              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
          </div>
          </div>

@include('admin.include.footer')
             
@endsection