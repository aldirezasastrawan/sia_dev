<?php $__env->startSection('content'); ?>
	<br>
	<br>
	<div class="container">	
		<h1>
            Dashboard
            <small>Control panel</small>
	    </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Dashboard <?php echo e(Auth::user()->role->namaRule); ?></li>
	      </ol>
	    <div class="callout callout-info">
	        <h4>Selamat Datang Wali Siswa <?php echo e(Auth::user()->siswa->nama_siswa); ?></h4>
	        
	    </div>
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
          
            <div class="box-header with-border">
              <h3 class="box-title">Penting !!</h3>
            </div>
            <div style="display: block;" class="box-body">

               Data yag disajikan antara lain :
                <ul>
                <li>
                1. 	Jadwal Pelajaran Siswa</li>
                <li>
                2. 	Nilai - Nilai Siswa</li>
                <li>
                3. 	Pembayaran Siswa</li>
                <li>
                </ul>
            </div><!-- /.box-body -->
            
              nb : Nilai yang dimasukkan Sesuai dengan Hasil Belajar Siswa.
            
          </div>
          </div>
          </div>
          </div>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.masterwali', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>