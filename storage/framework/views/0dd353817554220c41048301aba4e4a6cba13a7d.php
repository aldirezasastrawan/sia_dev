<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Absensi Siswa
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Absensi Siswa <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                        <h3>Pilih Kelas</h3>
                        <br>
                            <a href="<?php echo e(url('/absensi/tambah/kelas1')); ?>" class="btn btn-default"><i class="fa fa-hand-o-right"></i>  Kelas 1</a>
                            <a href="<?php echo e(URL::to('/absensi/tambah/kelas2')); ?>" class="btn btn-primary"><i class="fa fa-hand-o-right"></i>  Kelas 2</a>
                            <br>
                            <br>
                            <a href="<?php echo e(url('/absensi/tambah/kelas3')); ?>" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Kelas 3</a>
                            <a href="<?php echo e(URL::to('/absensi/tambah/kelas4')); ?>" class="btn btn-info"><i class="fa fa-hand-o-right"></i>  Kelas 4</a>
                            <br>
                            <br>
                            <a href="<?php echo e(url('/absensi/tambah/kelas5')); ?>" class="btn btn-warning"><i class="fa fa-hand-o-right"></i>  Kelas 5</a>
                            <a href="<?php echo e(URL::to('/absensi/tambah/kelas6')); ?>" class="btn btn-danger"><i class="fa fa-hand-o-right"></i>  Kelas 6</a>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row (main row) -->
  </div>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>