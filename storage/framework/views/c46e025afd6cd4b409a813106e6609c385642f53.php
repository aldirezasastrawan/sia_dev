<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Data Pelajaran
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Pelajaran <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                	<h3 class="box-title">Daftar Pelajaran <a href="<?php echo e(URL::to('/pelajaran/tambah')); ?>" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
				</div>
				<div class=row>
		            <div class="col-md-6">
		                <a href="<?php echo e(url('/pelajaran')); ?>" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
		            </div>
		            <div class="col-md-2">
		            </div>
		            <!-- Form Pencarian -->
		            <div class="col-md-4">
		                <?php echo Form::open(['method'=>'GET','url'=>'caripelajaran']); ?>

		                <div class="input-group custom-search-form">
		                    <input type="text" class="form-control" name="cari" placeholder="Cari...">
		                    <span class="input-group-btn">
		                        <span class="input-group-btn">
							        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
							     </span>
		                     </span>
		                 </div>
		                 <?php echo Form::close(); ?>

		            </div>
		        </div><br>      	
                  <table id="dataSiswa" class="table table-bordered table-hover">
                    <thead>
                      <tr>        
						<th>No</th>
						<th>Nama Pelajaran</th>
						<th>Durasi Waktu</th>
						<th>Keterangan</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach($pelajarans as $data): ?>
                      <tr>			
						<td><?php echo e($data->id); ?></td>
						<td><?php echo e($data->nama_pelajaran); ?></td>
						<td><?php echo e($data->durasi); ?></td>
						<td><?php echo e($data->keterangan); ?></td>
						<td><a href="<?php echo e(URL::to('pelajaran/'.$data->id.'/ubah')); ?>">
	                         	<span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
	                        <a href="<?php echo e(URL::to('pelajaran/hapus',[$data->id])); ?>" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Pelajaran <?php echo e(($data->id).' - '.$data->nama_pelajaran); ?>?')">
	                            <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span></a>   
	                    </td>
                      </tr>
                      <?php endforeach; ?> 
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
</div> 	

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>