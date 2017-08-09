<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Data Absensi Siswa Kelas 2
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Absensi Siswa <?php echo e(Auth::user()->role->namaRule); ?></li>
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
	                	<div class="box-body">
	                		<h3 class="box-title">Absensi Siswa  </h3>
						</div>
						<br>
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
			                  		<div class="tab-content">
		                        <div id="panel_tab2_example1" class="tab-pane active">
		                            <form action="<?php echo e(URL:: to('/absensi/tambah/simpanabsensikelas')); ?>" method="post">
		                            	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
		                                <input type="hidden" name="kelas" value="<?php echo e($siswas->first()->kelass_id); ?>" />
		                            	<h4> Tanggal : <input type="text" name="tanggal" value=" <?php echo date('l, d F Y')?>" readonly=""/> </h4> 

		                                <table id="sample-table-1" class="table table-hover">
		                                    <thead>
		                                        <tr>
		                                            <th>NIS</th>
		                                            <th>Nama Siswa</th>
		                                            <th>Jenis Kelamin</th>
		                                            <th class="form-control">Tahun Ajaran</th>
		                                            <th class="center">Keterangan (Absen)</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php foreach($siswas as $data): ?>
		                                        <tr>
		                                            <td><?php echo e($data->nis); ?></td>
		                                            <td><?php echo e($data->nama_siswa); ?></td>
		                                            <td><?php echo e($data->jenis_kelamin); ?></td>
		                                            <td>
									                     <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo e($data->tahun_ajaran); ?>" readonly="">
									                </td>
		                                            <td class="center">
		                                                <label class="radio-inline">
		                                                    <input type="radio" value="Sakit" name="keterangan-<?php echo e($data->id); ?>[keterangan]" class="grey" required>
		                                                    (S)Sakit
		                                                </label>
		                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		                                                <label class="radio-inline">
		                                                    <input type="radio" value="Izin" name="keterangan-<?php echo e($data->id); ?>[keterangan]" class="grey" required>
		                                                    (I)Ijin
		                                                </label>
		                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		                                                <label class="radio-inline">
		                                                    <input type="radio" value="Absen" name="keterangan-<?php echo e($data->id); ?>[keterangan]" class="grey" required>
		                                                    (A)Absen
		                                                </label>
		                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		                                                <label class="radio-inline">
		                                                    <input type="radio" value="Hadir" name="keterangan-<?php echo e($data->id); ?>[keterangan]" class="grey" checked required>
		                                                    (H)Hadir
		                                                </label>
		                                            </td>
		                                        </tr>
		                                        <?php endforeach; ?>
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

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>