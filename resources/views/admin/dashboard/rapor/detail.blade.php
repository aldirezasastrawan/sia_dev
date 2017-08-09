@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Data Rapor
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Rapor {{Auth::user()->role->namaRule}}</li>
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

              <h3 class="profile-username text-center">{{ $siswas->nama_siswa }}</h3>

              <p class="text-muted text-center">{{ $siswas->keterangan }}</p>

              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  	<b>NIS</b> <a class="pull-right">{{ $siswas->nis }}</a>
	                </li>
	                <li class="list-group-item">
	                  	<b>NIK</b> <a class="pull-right">{{ $siswas->nik }}</a>
	                </li>
	                <li class="list-group-item">
	                  	<b>Jenis Kelamin</b> <a class="pull-right">{{ $siswas->jenis_kelamin }}</a>
	                </li>
                  <li class="list-group-item">
                      <b>Tempat Lahir</b> <a class="pull-right">{{ $siswas->tempat_lahir }}</a>
                  </li>
                  <li class="list-group-item">
                      <b>Tanggal Lahir</b> <a class="pull-right">{{ $siswas->tanggal_lahir }}</a>
                  </li>
                  <li class="list-group-item">
                      <b>Telfon</b> <a class="pull-right">{{ $siswas->tlp }}</a>
                  </li>
                  <li class="list-group-item">
                      <b>Alamat</b> <a class="pull-right">{{ $siswas->alamat }}</a>
                  </li>
                  <li class="list-group-item">
                      <b>Tahun AJaran</b> <a class="pull-right">{{ $siswas->tahun_ajaran }}</a>
                  </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
                     @foreach($nilaiakademiks as $data)
                      <tr>      
            <td>{{ $data->siswa->nama_siswa }}</td>
            <td>{{ $data->kelas->nama_kelas }}</td>
            <td>{{ $data->pelajaran->nama_pelajaran }}</td>
            <td>{{ $data->nilai_tugas }}</td>
            <td>{{ $data->nilai_ulangan}}</td>
            <td>{{ $data->jumlah_nilai}}</td>
            <td><a href="{{{ URL::to('nilaiakademikadmin/'.$data->id.'/ubah') }}}">
                            <span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
                          <a href="{{{  URL::to('nilaiakademikadmin/hapus',[$data->id]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Data Nilai Akademik {{{($data->pelajaran->nama_pelajaran).' - '.$data->siswa->nama_siswa}}}?')">
                              <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span></a>
                      </td>
                      </tr>
                      @endforeach 
                    </tbody>
                  </table>
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