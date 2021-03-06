@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Data Nilai Non Akademik
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Nilai Non Akademik {{Auth::user()->role->namaRule}}</li>
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

				    <div class="box-body">
	                  <form action="{{ URL::to('nilaiakademikadmin/importnilai') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		                    <table class="table">
		                    <tbody>  
		                      <tr >
		                        <td colspan="2" >
		                        1. Gunakan Tombol "Download Peserta Kelas" untuk mendownload format file Upload.<br>
		                        2. Upload file dalam ekstensi *.xlsx, *.xls, *.csv dan format sesuai dengan format file yang didownload.
		                        </td>
		                        
		                      </tr>                     
		                      <tr>
		                        <td width="250px"><input class="btn " type="file" name="import_file" /></td>
		                        <td align="left"><button type="submit" class="btn btn-primary">Import Nilai</button></td>     
		                      </tr>                      
		                    </tbody>
		                    </table>
		                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                   </form>
	                  
	                </div>
  		
  		
    <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                	<h3 class="box-title">Daftar Data Nilai Non Akademik <a href="{{{ URL::to('/nilainonakademikadmin/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
				</div>
				<div class=row>
		            <div class="col-md-6">
		                <a href="{{ url('/nilainonakademikadmin') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
		                <a href="{{ URL::to('/nilainonakademikadmin/pdf') }}" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Data</a>
		            </div>
		            <div class="col-md-2">
		            </div>
		            <!-- Form Pencarian -->
		            <div class="col-md-4">
		                {!! Form::open(['method'=>'GET','url'=>'carinilainonakademikadmin'])  !!}
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
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<th>Mata Pelajaran</th>
						<th>Nilai Tugas</th>
						<th>Nilai Ulangan</th>
						<th>Jumlah Nilai</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($nilainonakademiks as $data)
                      <tr>			
						<td>{{ $data->siswa->nama_siswa }}</td>
						<td>{{ $data->siswa->kelas->nama_kelas  }}</td>
						<td>{{ $data->pelajaran->nama_pelajaran }}</td>
						<td>{{ $data->nilai_tugas }}</td>
						<td>{{ $data->nilai_ulangan}}</td>
						<td>{{ $data->jumlah_nilai}}</td>
						<td><a href="{{{ URL::to('nilainonakademikadmin/'.$data->id.'/ubah') }}}">
	                         	<span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
	                        <a href="{{{  URL::to('nilainonakademikadmin/hapus',[$data->id]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Data Nilai Non Akademik {{{($data->pelajaran->nama_pelajaran).' - '.$data->siswa->nama_siswa}}}?')">
	                            <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span></a>
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