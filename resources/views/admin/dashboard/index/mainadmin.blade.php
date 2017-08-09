@extends('admin.layout.master')
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
	        <h4>Selamat Datang {{ Auth::user()->name }}</h4>
	        <p>Untuk menggunakan Sistem ini harap diperhatikan bagian-bagian data inti yang perlu dipersiapkan sebelumnya sebelum siap digunakan. </p>
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

              Data penting yang perlu disiapkan antara lain :
                <ul>
                <li>
                1. 	Data Siswa</li>
                <li>
                2. 	Data Guru</li>
                <li>
                3. 	Data Kelas</li>
                <li>                
                4. 	Data Pelajaran</li>
                <li>
                5. 	Proses Absensi Siswa</li>
                <li>
                6. 	Proses Jadwal Pelajaran dan Ruangan Belajar Mengajar</li>
                <li>
                7. 	Proses Nilai Siswa yang terdiri dari Nilai Akademik dan Nilai Non Akademik</li>
                <li>
                8. 	Proses Rapor Siswa </li>
                <li>
                7. 	Proses Pembayaran Siswa</li>
                <li>
                8. 	Rekap Data Siswa</li>
                <li>
                9. 	Rekap Data Guru</li>
                <li>
                10. Rekap Data Kelas</li>
                <li>
                11. Rekap Data Pelajaran</li>
                <li>
                12. Rekap Absensi</li>
                <li>
                13. Rekap Jadwal Pelajaran dan Ruang Mengajar</li>
                <li>
                14. Rekap Nilai Siswa</li>
                <li>
                15. Rekap Rapor Siswa</li>
                <li>
                16. Rekap Kwitansi Pembayaran</li>
                </ul>
            </div><!-- /.box-body -->
            
              nb : Dalam proses ini sangat tergantung pada urutan proses.
            
          </div>
          </div>
          </div>
          </div>

@include('admin.include.footer')
             
@endsection
@section('script')
@endsection