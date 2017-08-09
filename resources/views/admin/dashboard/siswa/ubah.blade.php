@extends('admin.layout.master')
@section('content')
<br>
<br>
  <div class="container"> 
    <h1>
            Ubah Data Siswa
            <small>Control panel</small>
      </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ubah Data Siswa {{Auth::user()->role->namaRule}}</li>
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
                      {{ Form::model($siswas, array('url' => array('siswa/simpanubah', $siswas->id),'class' => 'form-horizontal', 'id' => 'formSiswaUbah', )) }}
                      
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">NIS <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('nis')) has-error @endif">
                              <input type="text" class="form-control" name="nis" value="{{$siswas->nis}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">NIK <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('nik')) has-error @endif">
                              <input type="text" class="form-control" name="nik" value="{{$siswas->nik}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Nama Siswa <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('nama_siswa')) has-error @endif">
                              <input type="text" class="form-control" name="nama_siswa" value="{{$siswas->nama_siswa}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3">Kelas</label>
                            <div class="col-md-3">
                              {{ Form::select('kelass_id', $kelass, null, array('class' => 'form-control input-large select2me')) }}
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Jenis Kelamin <span class="required">* </span></label>
                            <div class="col-md-3  @if ($errors->has('jenis_kelamin')) has-error @endif">
                              
                                      {{ Form::select('jenis_kelamin', array('' => ' ----- Pilih Jenis Kelamin ----- ',
                               'Laki-Laki' => 'Laki-Laki',
                               'Perempuan' => 'Perempuan',
                               ), $siswas->jenis_kelamin, array('class' => 'form-control')) }}
                               
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
                                  <small class="help-block"></small>
                                  <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tempat Lahir <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('tempat_lahir')) has-error @endif">
                              <input type="text" class="form-control" name="tempat_lahir" value="{{$siswas->tempat_lahir}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tanggal Lahir <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('tanggal_lahir')) has-error @endif">
                              <input type="date" class="form-control" name="tanggal_lahir" value="{{$siswas->tanggal_lahir}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Alamat <span class="required">* </span> </label>
                          <div class="col-md-6  @if ($errors->has('alamat')) has-error @endif">
                              <textarea type="text" class="form-control" name="alamat" rows="4" > {{$siswas->alamat}} </textarea>
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Telphone <span class="required">* </span></label>
                          <div class="col-md-3  @if ($errors->has('tlp')) has-error @endif">
                              <input type="text" class="form-control" name="tlp" value="{{$siswas->tlp}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tahun Ajaran <span class="required">* </span></label>
                            <div class="col-md-3  @if ($errors->has('tahun_ajaran')) has-error @endif">
                              
                                      {{ Form::select('tahun_ajaran', array('' => ' ----- Pilih Tahun Ajaran ----- ',
                               '2018-2019' => '2018-2019',
                               '2019-2020' => '2019-2020',
                               ), $siswas->tahun_ajaran, array('class' => 'form-control')) }}
                               
                                  <!-- <input type="text" class="form-control" name="tahun_ajaran" value="{{Request::old('tahun_ajaran')}}"> -->
                                  <small class="help-block"></small>
                                  <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Keterangan <span class="required">* </span></label>
                            <div class="col-md-3  @if ($errors->has('keterangan')) has-error @endif">
                              
                                      {{ Form::select('keterangan', array('' => ' ----- Pilih Tahun Ajaran ----- ',
                               'Siswa' => 'Siswa',
                               'Santri' => 'Santri',
                               ), $siswas->keterangan, array('class' => 'form-control')) }}
                               
                                  <!-- <input type="text" class="form-control" name="keterangan" value="{{Request::old('keterangan')}}"> -->
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