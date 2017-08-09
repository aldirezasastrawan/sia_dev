@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Nilai Akademik Siswa Kelas 4
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Nilai Akademik Siswa {{Auth::user()->role->namaRule}}</li>
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
	                		<h3 class="box-title">Nilai Akademik </h3>
						</div>
			                  		<div class="tab-content">
		                        <div id="panel_tab2_example1" class="tab-pane active">
		                            <form action="{{URL:: to('/nilaiakademik/tambah/simpannilaiakademikkelas')}}" method="post">
		                            	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		                            	<input type="hidden" name="kelas" value="{{$siswas->first()->kelass_id}}" />
		                                <table id="sample-table-1" class="table table-hover">
		                                    <thead>
		                                        <tr>
		                                            <th>NIS</th>
		                                            <th>Nama Siswa</th>
		                                            <th>Jenis Kelamin</th>
		                                            <th> Pelajaran</th>
		                                            <th> Nilai Tugas</th>
		                                            <th> Nilai Ulangan</th>
		                                            <th> Jumlah Nilai</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        @foreach($siswas as $data)
		                                        <tr>
		                                            <td>{{$data->nis}}</td>
		                                            <td>
		                                            	{{$data->nama_siswa}}
		                                            	<input type="hidden" name="nilai-{{ $data->id }}[siswa_id]" value="{{$data->id}}">
		                                            </td>
		                                            <td>{{$data->jenis_kelamin}}</td>
									                <td>
									                	{{ Form::select('nilai-'.$data->id.'[pelajaran_id]', $pelajarans, null, array('class' => 'form-control input-large select2me')) }}
									                </td>
									                <td>
									                     <input type="text" class="form-control" name="nilai-{{$data->id}}[nilai_tugas]" placeholder="Masukkan Nilai Tugas" required>
									                </td>
									                <td>
									                     <input type="text" class="form-control" name="nilai-{{$data->id}}[nilai_ulangan]" placeholder="Masukkan Nilai Ulangan" required>
									                </td>
									                <td>
									                     <input type="text" class="form-control jumlah_tes" name="nilai-{{$data->id}}[jumlah_nilai]" placeholder="Masukkan Jumlah Nilai" required readonly="">
									                </td>
		                                        </tr>
		                                        @endforeach
		                                    </tbody>
		                                </table>
		                                	<input type="submit" class="btn btn-danger" value="Submit">
		                            </form>
		                        </div>
		                    </div>
	                </div><!-- /.box-body -->
	            </div><!-- /.box -->
          	</div><!-- /.row -->
	</div> 	
<script>
	$(".jumlah_tes").on('focus', function() {
		// utk ambil $data->id tanpa php
		var jn_name = $(this).attr('name').split('-');
		var id = jn_name[1].split('[')[0];

		// Ambil data inputan (nilai tugas & nilai ulangan)
		var n_tugas = $("input[name='nilai-" + id + "[nilai_tugas]']").val();
		var n_ulangan = $("input[name='nilai-" + id + "[nilai_ulangan]']").val();
		// console.log(n_tugas, n_ulangan);

		// Hitung Rata2
		var n_jumlah = (parseInt(n_tugas)+parseInt(n_ulangan))/2;
		// console.log(n_jumlah);

		$("input[name='nilai-" + id + "[jumlah_nilai]']").val(n_jumlah);
		// console.log("ROW NUMBER " + id + " => " + n_tugas + " + " + n_ulangan + " / 2 = " + n_jumlah);
	})
</script>
@include('admin.include.footer')
             
@endsection