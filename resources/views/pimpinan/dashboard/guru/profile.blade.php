@extends('pimpinan.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Data Guru
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Guru {{Auth::user()->role->namaRule}}</li>
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
              		<div class="box">
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../auth/images/sirojul.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $gurus->nama_guru }}</h3>

              <p class="text-muted text-center">{{ $gurus->keterangan }}</p>

              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  	<b>NIP</b> <a class="pull-right">{{ $gurus->nip }}</a>
	                </li>
	                <li class="list-group-item">
	                  	<b>NUPTK</b> <a class="pull-right">{{ $gurus->nuptk }}</a>
	                </li>
	                <li class="list-group-item">
	                  	<b>Jenis Kelamin</b> <a class="pull-right">{{ $gurus->jenis_kelamin }}</a>
	                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                	<form class="form-horizontal">
                  <div class="form-group">
                    <label for="nip" class="col-sm-2 control-label">NIP</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nip" value="{{$gurus->nip}}" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nuptk" class="col-sm-2 control-label">NUPTK</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nuptk" value="{{$gurus->nuptk}}" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jenis_kelamin" value="{{$gurus->jenis_kelamin}}" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan" class="col-sm-2 control-label">Keterangan Guru</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="keterangan" value="{{$gurus->keterangan}}" disabled="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  <!-- /.content-wrapper -->
								    
								    <!-- /.content -->
                	</div><!-- /.box-body -->
              	</div><!-- /.box -->

            </div><!-- /.col -->
</div> 	

@include('admin.include.footer')
             
@endsection