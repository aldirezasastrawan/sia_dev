@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Data Siswa
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Siswa {{Auth::user()->role->namaRule}}</li>
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
                	<h3 class="box-title">Daftar Siswa <a href="{{{ URL::to('/siswa/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
				</div>
				<div class=row>
		            <div class="col-md-6">
		                <a href="{{ url('/siswa') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
		                <a href="{{ URL::to('/siswa/pdf') }}" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Data</a>
		            </div>
		            <div class="col-md-2">
		            </div>
		            <!-- Form Pencarian -->
		            <div class="col-md-4">
		                {!! Form::open(['method'=>'GET','url'=>'carisiswa'])  !!}
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
                  <table id="dataSiswa" class="table table-bordered table-hover">
                    <thead>
                      <tr>        
						<th>NIS</th>
						<th>NIK</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Keterangan</th>
						<th>Tahun Ajaran</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($siswas as $data)
                      <tr>			
						<td>{{ $data->nis }}</td>
						<td>{{ $data->nik }}</td>
						<td>{{ $data->nama_siswa }}</td>
						<td>{{ $data->kelas->nama_kelas }}</td>
						<td>{{ $data->jenis_kelamin }}</td>
						<td>{{ $data->alamat }}</td>
						<td>{{ $data->keterangan }}</td>
						<td>{{ $data->tahun_ajaran }}</td>                       
                        <td><a href="{{{ URL::to('siswa/'.$data->id.'/ubah') }}}">
	                         	<span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
	                        <a href="{{{  URL::to('siswa/hapus',[$data->nis]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Siswa {{{($data->nis).' - '.$data->nama_siswa }}}?')">
	                            <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span></a>
                        	<a href="{{{ URL::to('siswa/'.$data->nama_siswa.'/profile') }}}">
                              <span class="label label-info"><i class="fa fa-eye"> Detail </i></span>
                              </a>
                        </td>
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