<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Data Siswa
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Siswa <?php echo e(Auth::user()->role->namaRule); ?></li>
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

              <h3 class="profile-username text-center"><?php echo e($siswas->nama_siswa); ?></h3>

              <p class="text-muted text-center"><?php echo e($siswas->keterangan); ?></p>

              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  	<b>NIS</b> <a class="pull-right"><?php echo e($siswas->nis); ?></a>
	                </li>
	                <li class="list-group-item">
	                  	<b>NIK</b> <a class="pull-right"><?php echo e($siswas->nik); ?></a>
	                </li>
	                <li class="list-group-item">
	                  	<b>Jenis Kelamin</b> <a class="pull-right"><?php echo e($siswas->jenis_kelamin); ?></a>
	                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                	<form class="form-horizontal">
                  <div class="form-group">
                    <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tempat_lahir" value="<?php echo e($siswas->tempat_lahir); ?>" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tanggal_lahir" value="<?php echo e(date('d M Y', strtotime($siswas->tanggal_lahir))); ?>" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tlp" class="col-sm-2 control-label">No Telfon</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tlp" value="<?php echo e($siswas->tlp); ?>" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="alamat" rows="4" disabled=""> <?php echo e($siswas->alamat); ?> </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tahun_ajaran" class="col-sm-2 control-label">Tahun Ajaran</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo e($siswas->tahun_ajaran); ?>" disabled="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
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

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pimpinan.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>