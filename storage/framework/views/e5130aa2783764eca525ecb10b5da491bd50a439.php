<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Data Guru
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Guru <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                  <div class="box-body flash-message" data-uk-alert>
                      <a href="" class="uk-alert-close uk-close"></a>
                      <p><?php echo e(isset($successMessage) ? $successMessage : ''); ?></p>
                       <?php if(count($errors) > 0): ?>
                          <div class="alert alert-danger">
                              <strong>Whoops!</strong> Ada kesalahan saat melakukan input data.<br><br>
                              <ul>
                                  <?php foreach($errors->all() as $error): ?>
                                      <li><?php echo e($error); ?></li>
                                  <?php endforeach; ?>
                              </ul>
                          </div>
                      <?php endif; ?>
                    </div>
              		<div class="box">
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../auth/images/sirojul.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo e($gurus->nama_guru); ?></h3>

              <p class="text-muted text-center"><?php echo e($gurus->keterangan); ?></p>

              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  	<b>NIP</b> <a class="pull-right"><?php echo e($gurus->nip); ?></a>
	                </li>
	                <li class="list-group-item">
	                  	<b>NUPTK</b> <a class="pull-right"><?php echo e($gurus->nuptk); ?></a>
	                </li>
	                <li class="list-group-item">
	                  	<b>Jenis Kelamin</b> <a class="pull-right"><?php echo e($gurus->jenis_kelamin); ?></a>
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
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                	<form class="form-horizontal">
                  <div class="form-group">
                    <label for="nip" class="col-sm-2 control-label">NIP</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nip" value="<?php echo e($gurus->nip); ?>" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nuptk" class="col-sm-2 control-label">NUPTK</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nuptk" value="<?php echo e($gurus->nuptk); ?>" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e($gurus->jenis_kelamin); ?>" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan" class="col-sm-2 control-label">Keterangan Guru</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="keterangan" value="<?php echo e($gurus->keterangan); ?>" disabled="">
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="settings">
                <form id="formResetPassword" class="form-horizontal" role="form" method="POST" action="<?php echo e(URL::to('/gantipasswordguru/{id}')); ?>">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      <div class="form-group">
                          <label class="col-md-4 control-label">Password Baru </label>
                          <div class="col-md-4  <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
                              <input type="password" class="form-control" name="password" value="<?php echo e(Request::old('password')); ?>">
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>                              
                              <a href="<?php echo e(URL::to('/guruadmin')); ?>" title="Cancel">
                              <button type="button" class="btn btn-default" id="button-reg">
                                  Cancel
                              </button>
                              </a>  
                          </div>
                      </div>
                      </form> 
              </div>
              <!-- /.tab-pane -->
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
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>