<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Pengguna Sistem
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Pengguna Sistem <?php echo e(Auth::user()->role->namaRule); ?></li>
		      </ol>
				    <meta charset="utf-8">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    
				    <!-- Tell the browser to be responsive to screen width -->
				    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
				    <!-- Bootstrap 3.3.5 -->
				    <link href="<?php echo e(URL::asset('tmptadmin/bootstrap/css/bootstrap.min.css')); ?>"  rel="stylesheet"  type="text/css">
				    <!-- Font Awesome -->
				    <link href="<?php echo e(URL::asset('tmptadmin/bootstrap/css/font-awesome.min.css')); ?>"  rel="stylesheet"  type="text/css" >
				    <!-- Ionicons -->
				    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
				    <!-- <link href="<?php echo e(URL::asset('admin/plugins/ionicons/css/ionicons.min.css')); ?>"  rel="stylesheet"  type="text/css" > -->
				    <!-- jvectormap -->
				    
				    <link href="<?php echo e(URL::asset('tmptadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet"  type="text/css" >
				    <!-- Theme style -->
				   
				    <link href="<?php echo e(URL::asset('tmptadmin/dist/css/AdminLTE.min.css')); ?>" rel="stylesheet"  type="text/css" >
				    <!-- AdminLTE Skins. Choose a skin from the css/skins
				         folder instead of downloading all of them to reduce the load. -->
				    
				    <link href="<?php echo e(URL::asset('tmptadmin/dist/css/skins/_all-skins.min.css')); ?>"  rel="stylesheet" >
				    <link href="<?php echo e(URL::asset('tmptadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>" rel="stylesheet" type="text/css">
				    <link href="<?php echo e(URL::asset('auth/images/logo.ico')); ?>" rel="SHORTCUT ICON" />
				    <link href="<?php echo e(URL::asset('tmptadmin/plugins/datatables/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css">
				    <!-- bikin script base_url untuk dipanggil dari javascript -->
				    <meta name="base_url" content="<?php echo e(URL::to('/')); ?>">
  		
  		
<div class="row">
            <div class="col-md-12">
            		<div class="jumbotron">
                <div class="box-body flash-message" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p><?php echo e(isset($successMessage) ? $successMessage : ''); ?></p>
                     <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                <?php foreach($errors->all() as $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="box box-primary">
                  <div class="box-header">
                    <div class="box-title">
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <div class="box-body no-padding">
                      <?php echo e(Form::open(array('url' => '/register/simpantambahsiswa', 'class' => 'form-horizontal'))); ?>

                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                       <?php echo e(Form::hidden('roles', '4', array('id' => 'roles_id'))); ?>    
                          <div class="form-group">
                              <label class="control-label col-md-4">Nama Siswa </label>
                                <div class="col-md-3">
                                  <?php echo e(Form::select('siswas_id', $siswas, null, array('class' => 'form-control input-large select2me'))); ?>

                                </div>
                          </div> 
                          <div class="form-group">
                              <label class="col-md-4 control-label">Username <span class="required">* </span></label>
                              <div class="col-md-3  <?php if($errors->has('username')): ?> has-error <?php endif; ?>">
                                  <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" readonly="">
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-4 control-label">Nama Wali <span class="required">* </span></label>
                              <div class="col-md-3  <?php if($errors->has('nama_wali')): ?> has-error <?php endif; ?>">
                                  <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Masukkan Nama Wali" readonly="">
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-4 control-label">Password <span class="required">* </span></label>
                              <div class="col-md-3">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                  <small class="help-block"></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary" id="button-reg">
                                      Simpan
                                  </button>
                                  <a href="<?php echo e(URL::to('register')); ?>" title="Cancel">
                                    <button type="button" class="btn btn-default" id="button-reg">
                                        Cancel
                                    </button>
                                  </a>
                              </div>
                          </div>
                      <?php echo e(Form::close()); ?>

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
          </div>
          </div>
          </div>
<script type="text/javascript" src="<?php echo e(URL::asset('tmptadmin/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- <script type="text/javascript" src="<?php echo e(URL::asset('tmptadmin/plugins/datepicker/select2.full.min.js')); ?>"></script> -->
<script type="text/javascript" src="<?php echo e(URL::asset('tmptadmin/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('tmptadmin/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script>
  $(function () {

    $("select[name='siswas_id']").on('change', function() {
      // var url_target = 'pembayaranadmin/'+$(this).val() + '/ambil_tahun_ajax';
      $.ajax({
        url: "<?php echo e(URL::to('register/aktif/ambil_nis_ajax')); ?>",
        data: "siswas_id="+$(this).val(),
        type: "GET"
      }).done(function(response) {
        var res = JSON.parse(response);
        $("input[name='username']").val(res.nis);
        $("input[name='nama_wali']").val(res.nama_wali);
        // console.log(res);
      }).fail(function(error) {
        console.log("Error Message: ", error);
      });
    });
});
</script>
<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>