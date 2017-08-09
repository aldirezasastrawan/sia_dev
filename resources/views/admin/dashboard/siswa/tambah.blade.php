@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Siswa
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Siswa {{Auth::user()->role->namaRule}}</li>
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
                      {{ Form::open(array('url' => '/siswa/simpantambah', 'class' => 'form-horizontal', 'id' => 'formSiswaTambah')) }}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">NIS <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('nis')) has-error @endif">
                              <input type="text" class="form-control" name="nis" value="{{Request::old('nis')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">NIK </span></label>
                          <div class="col-md-3  @if ($errors->has('nik')) has-error @endif">
                              <input type="text" class="form-control" name="nik" value="{{Request::old('nik')}}" placeholder="Masukkan NIK Siswa">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">Nama Siswa <span class="required">* </span></label>
                          <div class="col-md-4  @if ($errors->has('nama_siswa')) has-error @endif">
                              <input type="text" class="form-control" name="nama_siswa" value="{{Request::old('nama_siswa')}}" placeholder="Masukkan Nama Siswa" >
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3">Kelas </label>
                            <div class="col-md-3">
                              {{ Form::select('kelass_id', $kelass, null, array('class' => 'form-control input-large select2me')) }}
                            </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">Jenis Kelamin <span class="required">* </span></label>
		                        <div class="col-md-3  @if ($errors->has('jenis_kelamin')) has-error @endif">
	                      			<select name="jenis_kelamin" class="form-control" value="{{Request::old('jenis_kelamin')}}" >
	                      				      <option value=""> ----- Pilih Jenis Kelamin -----</option>
	                                    <option value="Laki-Laki">Laki-Laki</option>
	                                    <option value="Perempuan">Perempuan</option>
	                                </select>
		                              <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
		                              <small class="help-block"></small>
		                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
		                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tempat Lahir <span class="required">* </span></label>
                          <div class="col-md-4  @if ($errors->has('tempat_lahir')) has-error @endif">
                              <input type="text" class="form-control" name="tempat_lahir" value="{{Request::old('tempat_lahir')}}" placeholder="Masukkan Tempat Lahir" >
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tanggal Lahir <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('tanggal_lahir')) has-error @endif">
                              <input type="date" class="form-control" name="tanggal_lahir" value="{{Request::old('tanggal_lahir')}}" >
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Alamat <span class="required">* </span> </label>
                          <div class="col-md-6  @if ($errors->has('alamat')) has-error @endif">
                              <textarea type="text" class="form-control" name="alamat" rows="4" value="{{Request::old('alamat')}}" placeholder="Masukkan Alamat" ></textarea>
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Telphone <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('tlp')) has-error @endif">
                              <input type="text" class="form-control" name="tlp" value="{{Request::old('tlp')}}" placeholder="Masukkan No Telphone" >
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="col-md-3 control-label">Tahun Ajaran <span class="required">* </span></label>
                          		<div class="col-md-3  @if ($errors->has('tahun_ajaran')) has-error @endif">
                          			<select name="tahun_ajaran" id="value" class="form-control" value="{{Request::old('tahun_ajaran')}}" >
	                      				      <option value="">----- Pilih Tahun Ajaran -----</option>
	                                    <option value="2018-2019">2018-2019</option>
	                                    <option value="2019-2020">2019-2020</option>
	                                </select>
                              <!-- <input type="text" class="form-control" name="tahun_ajaran" value="{{Request::old('tahun_ajaran')}}" required> -->
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-md-3 control-label">Nama Wali <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('nama_wali')) has-error @endif">
                              <input type="text" class="form-control" name="nama_wali" value="{{Request::old('nama_wali')}}" placeholder="Masukkan Nama Wali Siswa">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Keterangan <span class="required">* </span></label>
                          	<div class="col-md-3  @if ($errors->has('keterangan')) has-error @endif">
                              		<select name="keterangan" id="value" class="form-control" value="{{Request::old('tahun_ajaran')}}" >
	                      				      <option value="">----- Keterangan -----</option>
	                                    <option value="Siswa">Siswa</option>
	                                    <option value="Santri">Santri</option>
	                                </select>
                              <!-- <input type="text" class="form-control" name="keterangan" value="{{Request::old('keterangan')}}" required> -->
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ URL::to('siswa') }}}" title="Cancel">
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