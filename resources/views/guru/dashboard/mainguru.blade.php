@extends('admin.layout.masterguru')
@section('content')
	<br>
	<br>
	<div class="container">	
		<h1>
            Dashboard
            <small>Control panel</small>
	    </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Dashboard {{Auth::user()->role->namaRule}}</li>
	      </ol>
	    <div class="callout callout-info">
	        <h4>Selamat Datang {{ Auth::user()->guru->nama_guru }}</h4>
	    </div>
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
          
            <div class="box-header with-border">
              <h3 class="box-title">Penting !!</h3>
            </div>
            <div style="display: block;" class="box-body">

              Data yag disajikan antara lain :
                <ul>
                <li>
                1. 	Jadwal Mengajar Guru</li>
                </ul>
            </div><!-- /.box-body -->
            
              nb : Diharapkan Guru Mengajar Tepat Waktu Sesuai Jadwal dan Ruangan yang Sudah ditentukan.
            
          </div>
          </div>
          </div>
          </div>

@include('admin.include.footer')
             
@endsection
@section('script')
@endsection