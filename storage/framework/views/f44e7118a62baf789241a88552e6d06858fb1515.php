<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Siswa
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Siswa <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                      <?php echo e(Form::open(array('url' => '/siswa/simpantambah', 'class' => 'form-horizontal', 'id' => 'formSiswaTambah'))); ?>

                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">NIS <span class="required">* </span></label>
                          <div class="col-md-3  <?php if($errors->has('nis')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="nis" value="<?php echo e(Request::old('nis')); ?>" placeholder="Masukkan NIS Siswa" maxlength="25" required autofocus>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">NIK </span></label>
                          <div class="col-md-3  <?php if($errors->has('nik')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="nik" value="<?php echo e(Request::old('nik')); ?>">
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">Nama Siswa <span class="required">* </span></label>
                          <div class="col-md-4  <?php if($errors->has('nama_siswa')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="nama_siswa" value="<?php echo e(Request::old('nama_siswa')); ?>" required>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-3 control-label">Jenis Kelamin <span class="required">* </span></label>
		                        <div class="col-md-3  <?php if($errors->has('jenis_kelamin')): ?> has-error <?php endif; ?>">
	                      			<select name="jenis_kelamin" class="form-control" value="<?php echo e(Request::old('jenis_kelamin')); ?>" required>
	                      				      <option value=""> ----- Pilih Jenis Kelamin -----</option>
	                                    <option value="Laki-Laki">Laki-Laki</option>
	                                    <option value="Perempuan">Perempuan</option>
	                                </select>
		                              <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
		                              <small class="help-block"></small>
		                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
		                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tempat Lahir <span class="required">* </span></label>
                          <div class="col-md-4  <?php if($errors->has('tempat_lahir')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="tempat_lahir" value="<?php echo e(Request::old('tempat_lahir')); ?>" required>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tanggal Lahir <span class="required">* </span></label>
                          <div class="col-md-3  <?php if($errors->has('tanggal_lahir')): ?> has-error <?php endif; ?>">
                              <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo e(Request::old('tanggal_lahir')); ?>" required>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Alamat <span class="required">* </span> </label>
                          <div class="col-md-6  <?php if($errors->has('alamat')): ?> has-error <?php endif; ?>">
                              <textarea type="text" class="form-control" name="alamat" rows="4" value="<?php echo e(Request::old('alamat')); ?>" required></textarea>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Telphone <span class="required">* </span></label>
                          <div class="col-md-3  <?php if($errors->has('tlp')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="tlp" value="<?php echo e(Request::old('tlp')); ?>" required>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Kelas <span class="required">* </span></label>
	                          <div class="col-md-3  <?php if($errors->has('kelass_id')): ?> has-error <?php endif; ?>">
                          			<select name="value" id="value" class="form-control" value="<?php echo e(Request::old('kelass_id')); ?>" required>
                          				      <option value="kelass_id">----- Pilih Kelas Siswa -----</option>
                                      <?php foreach($siswas as $data): ?>
                                        <option value=""><?php echo e($data->nama_kelas); ?></option>
                                      <?php endforeach; ?>
                                    </select>
	                              <!-- <input type="text" class="form-control" name="kelas_id" value="<?php echo e(Request::old('kelas_id')); ?>"> -->
	                              <small class="help-block"></small>
	                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
	                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-md-3 control-label">Tahun Ajaran <span class="required">* </span></label>
                          		<div class="col-md-3  <?php if($errors->has('tahun_ajaran')): ?> has-error <?php endif; ?>">
                          			<select name="tahun_ajaran" id="value" class="form-control" value="<?php echo e(Request::old('tahun_ajaran')); ?>" required>
	                      				      <option value="">----- Pilih Tahun Ajaran -----</option>
	                                    <option value="2015-2016">2015-2016</option>
	                                    <option value="2016-2017">2016-2017</option>
	                                    <option value="2017-2018">2017-2018</option>
	                                    <option value="2018-2019">2018-2019</option>
	                                    <option value="2019-2020">2019-2020</option>
	                                </select>
                              <!-- <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo e(Request::old('tahun_ajaran')); ?>" required> -->
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Keterangan <span class="required">* </span></label>
                          	<div class="col-md-3  <?php if($errors->has('keterangan')): ?> has-error <?php endif; ?>">
                              		<select name="keterangan" id="value" class="form-control" value="<?php echo e(Request::old('tahun_ajaran')); ?>" required>
	                      				      <option value="">----- Keterangan -----</option>
	                                    <option value="Siswa">Siswa</option>
	                                    <option value="Santri">Santri</option>
	                                </select>
                              <!-- <input type="text" class="form-control" name="keterangan" value="<?php echo e(Request::old('keterangan')); ?>" required> -->
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="<?php echo e(URL::to('admin')); ?>" title="Cancel">
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