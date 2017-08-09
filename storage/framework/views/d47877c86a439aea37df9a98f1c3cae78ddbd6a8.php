<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Tambah Data Jadwal Pelajaran
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Tambah Data Jadwal Pelajaran <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                      <?php echo e(Form::open(array('url' => '/jadwaladmin/simpantambah', 'class' => 'form-horizontal', 'id' => 'formJadwalTambah'))); ?>


                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group">
                          <label class="col-md-3 control-label">Kelas <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('kelas')): ?> has-error <?php endif; ?>">
                              
                                      <?php echo e(Form::select('kelass_id',  $kelass), array('class' => 'form-control')); ?>

                               
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Hari <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('hari')): ?> has-error <?php endif; ?>">
                              <select name="hari" class="form-control" value="<?php echo e(Request::old('hari')); ?>" required>
                                <option value=""> ----- Pilih Hari -----</option>
                                      <option value="Senin">Senin</option>
                                      <option value="Selasa">Selasa</option>
                                      <option value="Rabu">Rabu</option>
                                      <option value="Kamis">Kamis</option>
                                      <option value="Jum'at">Jum'at</option>
                                      <option value="Sabtu">Sabtu</option>
                                      <option value="Minggu">Minggu</option>
                              </select>
                              <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Jam Pelajaran <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('jam')): ?> has-error <?php endif; ?>">
                              <select name="jam" class="form-control" value="<?php echo e(Request::old('jam')); ?>" required>
                                <option value=""> ----- Pilih Jam Pelajaran -----</option>
                                      <option value="08.00-09.00 WIB">08.00-09.00 WIB</option>
                                      <option value="09.00-09.45 WIB">09.00-09.45 WIB</option>
                                      <option value="09.30-10.15 WIB">09.30-10.15 WIB</option>
                                      <option value="10.15-10.45 WIB">10.15-10.45 WIB</option>
                                  </select>
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Pelajaran <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('pelajaran')): ?> has-error <?php endif; ?>">
                              
                                      <?php echo e(Form::select('pelajarans_id',  $pelajarans), array('class' => 'form-control')); ?>

                               
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Guru <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('guru')): ?> has-error <?php endif; ?>">
                              
                                      <?php echo e(Form::select('gurus_id',  $gurus), array('class' => 'form-control')); ?>

                               
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Siswa <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('guru')): ?> has-error <?php endif; ?>">
                              
                                      <?php echo e(Form::select('siswas_id',  $siswas), array('class' => 'form-control')); ?>

                               
                                  <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo e(Request::old('jenis_kelamin')); ?>"> -->
                                  <small class="help-block"></small>
                                  <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Gedung <span class="required">* </span></label>
                          <div class="col-md-3  <?php if($errors->has('gedung')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="gedung" value="<?php echo e(Request::old('gedung')); ?>" placeholder="Masukkan Nama Gedung" maxlength="25" required autofocus>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Ruangan <span class="required">* </span></label>
                          <div class="col-md-3  <?php if($errors->has('ruangan')): ?> has-error <?php endif; ?>">
                              <input type="text" class="form-control" name="ruangan" value="<?php echo e(Request::old('ruangan')); ?>" placeholder="Masukkan Nama Ruangan" maxlength="25" required autofocus>
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Tahun Ajaran <span class="required">* </span></label>
                              <div class="col-md-3  <?php if($errors->has('tahun_ajaran')): ?> has-error <?php endif; ?>">
                                <select name="tahun_ajaran" id="value" class="form-control" value="<?php echo e(Request::old('tahun_ajaran')); ?>" required>
                                      <option value="">----- Pilih Tahun Ajaran -----</option>
                                      <option value="2018-2019">2018-2019</option>
                                      <option value="2019-2020">2019-2020</option>
                                      <option value="2020-2021">2020-2021</option>
                                      <option value="2021-2022">2021-2022</option>
                                  </select>
                              <!-- <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo e(Request::old('tahun_ajaran')); ?>" required> -->
                              <small class="help-block"></small>
                              <!-- <?php if($errors->has('jurNama')): ?> <small class="help-block"><?php echo e($errors->first('jurNama')); ?></small> <?php endif; ?> -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Status Mata Pelajaran <span class="required">* </span></label>
                            <div class="col-md-3  <?php if($errors->has('status_mapel')): ?> has-error <?php endif; ?>">
                                  <select name="status_mapel" id="value" class="form-control" value="<?php echo e(Request::old('status_mapel')); ?>" required>
                                      <option value="">----- Keterangan -----</option>
                                      <option value="Hadir">Hadir</option>
                                      <option value="Izin">Izin</option>
                                      <option value="Tidak Ada Keterangan">Tidak Ada Keterangan</option>
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

                              
                              <a href="<?php echo e(URL::to('jadwaladmin')); ?>" title="Cancel">
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