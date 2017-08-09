@extends('admin.layout.master')
@section('content')
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Pembayaran
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Pembayaran {{Auth::user()->role->namaRule}}</li>
		      </ol>
				    <meta charset="utf-8">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    
				    <!-- Tell the browser to be responsive to screen width -->
				    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
				    <!-- Bootstrap 3.3.5 -->
				    <link href="tmptadmin/bootstrap/css/bootstrap.min.css"  rel="stylesheet"  type="text/css">
               <link href="tmptadmin/plugins/datepicker/datepicker3.css"  rel="stylesheet"  type="text/css">
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
            <link href="tmptadmin/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
				    <!-- bikin script base_url untuk dipanggil dari javascript -->
            <link href="resources/assets/tes/bootstrap.css">
            <link href="{{URL::asset('resources/assets/tes/bootstrap.min.css') }}">
            
         
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
                      {{ Form::open(array('url' => '/pembayaranadmin/simpantambah', 'class' => 'form-horizontal', 'id' => 'formPembayaranTambah')) }}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                      
                      <div class="form-group">
                          <label class="control-label col-md-3">Nama Siswa </label>
                            <div class="col-md-3">
                              {{ Form::select('siswas_id', $siswas, null, array('class' => 'form-control input-large select2me')) }}
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">Kelas <span class="required">* </span></label>
                              <div class="col-md-3  @if ($errors->has('kelas')) has-error @endif">
                                  <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" readonly="">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tahun Ajaran <span class="required">* </span></label>
                              <div class="col-md-3  @if ($errors->has('tahun_ajaran')) has-error @endif">
                                  <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" readonly="">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Jenis Pembayaran <span class="required">* </span></label>
                            <div class="col-md-3  @if ($errors->has('jenis_pembayaran')) has-error @endif">
                              <select name="jenis_pembayaran" class="form-control" value="{{Request::old('jenis_pembayaran')}}" required>
                                <option value=""> ----- Pilih Jenis Pembayaran -----</option>
                                      <option class="daftar_ulang" value="Daftar Ulang">Daftar Ulang</option>
                                      <option class="spp" value="SPP">SPP</option>
                                  </select>
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
                                  <small class="help-block"></small>
                                  <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Jumlah Pembayaran <span class="required">* </span></label>
                            <div class="col-md-3  @if ($errors->has('jumlah_pembayaran')) has-error @endif">
                              <select name="jumlah_pembayaran" class="form-control" value="{{Request::old('jumlah_pembayaran')}}" required="" >
                                <option value=""> ----- Pilih Jumlah Pembayaran -----</option>
                                      <option class="spp" value="Rp. 300.000,-">Rp. 300.000,-</option>
                                      <option class="daftar_ulang" value="Rp. 1.250.000,-">Rp. 1.250.000,-</option>
                                  </select>
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
                                  <small class="help-block"></small>
                                  <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Keterangan <span class="required">* </span></label>
		                        <div class="col-md-3  @if ($errors->has('keterangan')) has-error @endif">
	                      			<select name="keterangan" class="form-control" value="{{Request::old('keterangan')}}" required>
	                      				<option value=""> ----- Pilih Keterangan -----</option>
	                                    <option value="Lunas">Lunas</option>
	                                    <option value="Belum Lunas">Belum Lunas</option>
	                                </select>
		                              <!-- <input type="text" class="form-control" name="jenis_kelamin" value="{{Request::old('jenis_kelamin')}}"> -->
		                              <small class="help-block"></small>
		                              <!-- @if ($errors->has('jurNama')) <small class="help-block">{{ $errors->first('jurNama') }}</small> @endif -->
		                        </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ URL::to('pembayaranadmin') }}}" title="Cancel">
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


<!-- <script src="tmptadmin/plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- Select2 -->
<script type="text/javascript" src="{{URL::asset('tmptadmin/plugins/select2/select2.full.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{URL::asset('tmptadmin/plugins/datepicker/select2.full.min.js')}}"></script> -->
<script type="text/javascript" src="{{URL::asset('tmptadmin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('tmptadmin/bootstrap/js/bootstrap.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    // $(".select2").select2();
    //   $('#datepicker').datepicker({
    //   autoclose: true
    // });
    $("select[name='siswas_id']").on('change', function() {
      // var url_target = 'pembayaranadmin/'+$(this).val() + '/ambil_tahun_ajax';
      $.ajax({
        url: "{{{ URL::to('pembayaranadmin/ambil_tahun_ajax') }}}",
        data: "siswas_id="+$(this).val(),
        type: "GET"
      }).done(function(response) {
        var res = JSON.parse(response);
        $("input[name='tahun_ajaran']").val(res.tahun_ajaran);
        $("input[name='kelas']").val(res.kelass_id);
        // console.log(res);
      }).fail(function(error) {
        console.log("Error Message: ", error);
      });
    });

    // $("select[name='siswas_id']").on('change', function() {
    //   // var url_target = 'pembayaranadmin/'+$(this).val() + '/ambil_tahun_ajax';
    //   $.ajax({
    //     url: "{{{ URL::to('pembayaranadmin/ambil_kelas_ajax') }}}",
    //     data: "siswas_id="+$(this).val(),
    //     type: "GET"
    //   }).done(function(response) {
    //     var res = JSON.parse(response);
    //     $("input[name='kelas']").val(res.kelass_id);
    //     // console.log(res);
    //   }).fail(function(error) {
    //     console.log("Error Message: ", error);
    //   });
    // });

    $("select[name='jenis_pembayaran']").on('change', function() {
      var selected_option = $(this).find('option:selected').attr('class');
      $("select[name='jumlah_pembayaran']").find('.' + selected_option).attr('selected', 'selected');
    });

    $("select[name='jumlah_pembayaran']").on('change', function() {
      var selected_option = $(this).find('option:selected').attr('class');
      $("select[name='jenis_pembayaran']").find('.' + selected_option).attr('selected', 'selected');
    });
});
</script>
@include('admin.include.footer')



@endsection