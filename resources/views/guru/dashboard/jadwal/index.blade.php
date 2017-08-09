@extends('admin.layout.masterguru')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Jadwal Mengajar
            <small>{{Auth::user()->name}}</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Jadwal Mengajar {{Auth::user()->role->namaRule}}</li>
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
                <div class="box-body">
                	<h3 class="box-title">Daftar Jadwal Mengajar</h3>
				</div>      
				<div class=row>
		            <div class="col-md-6">
		                <a href="{{ url('/jadwalguru') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
		                <a href="{{ URL::to('/jadwalguru/pdf') }}" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Data</a>
		            </div>
		            <div class="col-md-2">
		            </div>
		            <!-- Form Pencarian -->
		            <div class="col-md-4">
		                {!! Form::open(['method'=>'GET','url'=>'carijadwalguru'])  !!}
		                <div class="input-group custom-search-form">
		                    <input type="text" class="form-control" name="cari" placeholder="Cari...">
		                    <span class="input-group-btn">
		                        <span class="input-group-btn">
							        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
							     </span>
		                     </span>
		                 </div>
		                 {!! Form::close() !!}
		            </div>
		        </div><br>           	
                  <table id="dataGuru" class="table table-bordered table-hover">
                    <thead>
                      <tr>        
						<th>Kelas</th>
						<th>Hari</th>
						<th>Jam</th>
						<th>Pelajaran</th>
						<th>Guru</th>
						<th>Gedung</th>
						<th>Ruangan</th>
						<th>Tahun Ajaran</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($jadwals as $data)
                      <tr>			
						<td>{{ $data->kelas->nama_kelas }}</td>
						<td>{{ $data->hari }}</td>
						<td>{{ $data->jam }}</td>
						<td>{{ $data->pelajaran->nama_pelajaran }}</td>
						<td>{{ $data->guru->nama_guru }}</td>
						<td>{{ $data->gedung }}</td>
						<td>{{ $data->ruangan }}</td>
						<td>{{ $data->tahun_ajaran }}</td>
                      </tr>
                      @endforeach 
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
</div> 	

@include('admin.include.footer')
             
@endsection