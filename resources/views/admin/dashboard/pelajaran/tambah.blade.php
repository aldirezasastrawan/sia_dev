@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Pelajaran
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Pelajaran {{Auth::user()->role->namaRule}}</li>
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
            <div class="col-md-12">
            		<div class="jumbotron">
                <div class="box-body flash-message" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                  <div class="box-header">
                    <div class="box-title">
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <div class="box-body no-padding">
                      {{ Form::open(array('url' => '/pelajaran/simpantambah', 'class' => 'form-horizontal', 'id' => 'formPelajaranTambah')) }}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">Nama Pelajaran <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('nama_pelajaran')) has-error @endif">
                              <input type="text" class="form-control" name="nama_pelajaran" value="{{Request::old('nama_pelajaran')}}" placeholder="Masukkan Nama Pelajaran" maxlength="100" required autofocus>
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Durasi Waktu <span class="required">* </span></label>
                            <div class="col-md-3  @if ($errors->has('durasi')) has-error @endif">
                              <select name="durasi" class="form-control" value="{{Request::old('durasi')}}" required>
                                <option value=""> ----- Pilih Durasi Pelajaran -----</option>
                                      <option value="45 Menit">45 Menit</option>
                                      <option value="60 Menit">60 Menit</option>
                                  </select>
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
                                  <small class="help-block"></small>
                                  <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Keterangan <span class="required">* </span></label>
		                        <div class="col-md-3  @if ($errors->has('keterangan')) has-error @endif">
	                      			<select name="keterangan" class="form-control" value="{{Request::old('keterangan')}}" required>
	                      				<option value=""> ----- Pilih Jenis Pelajaran -----</option>
	                                    <option value="Pelajaran Akademik">Pelajaran Akademik</option>
	                                    <option value="Pelajaran Non Akademik">Pelajaran Non Akademik</option>
	                                </select>
		                              <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
		                              <small class="help-block"></small>
		                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
		                        </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ URL::to('pelajaran') }}}" title="Cancel">
                              <button type="button" class="btn btn-default" id="button-reg">
                                  Cancel
                              </button>
                              </a>  
                          </div>
                      </div>
                      {{ Form::close() }} 
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
          </div>
          </div>
          </div>

@include('admin.include.footer')
             
@endsection