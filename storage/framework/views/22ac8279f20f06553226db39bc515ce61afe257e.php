<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Ubah Data Absensi Siswa
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Ubah Data Absensi Siswa <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                      <?php echo e(Form::model($absensis, array('url' => array('absensi/simpanubah', $absensis->id),'class' => 'form-horizontal', 'id' => 'formAbsensiUbah', ))); ?>

                      
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group">
                            <label class="control-label col-md-3">Kelas</label>
                              <div class="col-md-3">
                                <?php echo e(Form::select('kelass_id', $kelass, null, array('class' => 'form-control input-large select2me', 'disabled', 'selected'))); ?>

                              </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Tanggal <span class="required">* </span></label>
                          <div class="col-md-3  <?php if($errors->has('tanggal')): ?> has-error <?php endif; ?>">
                              <input type="date" class="form-control" name="tanggal" value="<?php echo e($absensis->tanggal); ?>" disabled="">
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Siswa</label>
                              <div class="col-md-3">
                                <?php echo e(Form::select('siswas_id', $siswas, null, array('class' => 'form-control input-large select2me', 'disabled', 'selected'))); ?>

                              </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Tahun Ajaran <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('thn_ajaran')): ?> has-error <?php endif; ?>">
                              
                                      <?php echo e(Form::select('thn_ajaran', array('' => ' ----- Pilih Tahun Ajaran ----- ',
                               '2018-2019' => '2018-2019',
                               '2019-2020' => '2019-2020',
                               ), $absensis->thn_ajaran, array('class' => 'form-control', 'disabled', 'selected'))); ?>

                               
                                  <!-- <input type="text" class="form-control" name="thn_ajaran" value="<?php echo e(Request::old('thn_ajaran')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Keterangan <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('keterangan')): ?> has-error <?php endif; ?>">
                              
                                      <?php echo e(Form::select('keterangan', array('' => ' ----- Pilih Keterangan Absensi ----- ',
                               'Hadir' => 'Hadir',
                               'Absen' => 'Absen',
                               ), $absensis->keterangan, array('class' => 'form-control'))); ?>

                               
                                  <!-- <input type="text" class="form-control" name="keterangan" value="<?php echo e(Request::old('keterangan')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="<?php echo e(URL::to('absensi')); ?>" title="Cancel">
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

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>