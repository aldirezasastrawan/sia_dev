<?php $__env->startSection('content'); ?>
<br>
<br>
	<div class="container">	
		<h1>
            Data Pengguna Sistem
            <small>Control panel</small>
	    </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Data Pengguna Sistem <?php echo e(Auth::user()->role->namaRule); ?></li>
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
                	<h3 class="box-title">Daftar Pengguna Sistem </h3>
				        </div>
                <div class=row>
                <div class="col-md-6">
                    <a href="<?php echo e(url('/register/aktif')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Siswa</a>
                    <a href="<?php echo e(URL::to('/register/guru')); ?>" class="btn btn-danger"><i class="fa fa-plus"></i> Guru</a>
                    <a href="<?php echo e(URL::to('/register')); ?>" class="btn btn-default" type="submit"><i class="fa fa-refresh"></i> Reset</a>
                </div>
                <div class="col-md-2">
                </div>
                <!-- Form Pencarian -->
                <div class="col-md-4">
                    <?php echo Form::open(['method'=>'GET','url'=>'caripengguna']); ?>

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
                  <table id="dataGuru" class="table table-bordered table-hover">
                    <thead>
                      <tr>        
              						<th>ID</th>
              						<th>Role Pengguna</th>
              						<th>User Name</th>
              						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach($users as $data): ?>
                      <tr>			
            						<td><?php echo e($data->id); ?></td>
            						<td><?php if($data->role->namaRule === 'Administrator'): ?>                               
                                          <span class="label label-primary"><i class="fa fa-check"> Admin </i></span>
                                        <?php elseif($data->role->namaRule === 'Pimpinan'): ?>
                                           <span class="label label-warning"><i class="fa fa-check-circle"> Pimpinan </i></span>
                                        <?php elseif($data->role->namaRule === 'Guru'): ?>
                                          <span class="label label-danger"><i class="fa fa-check-circle"> Guru </i></span>
                                       <?php elseif($data->role->namaRule === 'Wali'): ?>
                                      <span class="label label-info"><i class="fa fa-check-circle"> Wali Siswa </i></span>
                
                                        <?php endif; ?>
                        </td>
            						<td><span class="label label-success"><i class="fa fa-unlock-alt"> <?php echo e($data->username); ?> </i></span></td>
            						<td>
							             <a class="btn btn-warning btn-flat btn-sm" href="<?php echo e(URL::to('register/'.$data->id.'/ubah')); ?>">
	                         	<span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
	                        <a class="btn btn-danger btn-flat btn-sm" href="<?php echo e(URL::to('register/hapus',[$data->id])); ?>" title="Hapus Akun" onclick="return confirm('Apakah anda yakin akan menghapus Data Pengguna <?php echo e(($data->id).' - '.$data->role->namaRule); ?>?')"><i class="fa fa-trash"> Unreg </i></span>
                            </a>
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
<!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" id="myModalLabel">Register Mahasiswa - Tambah</h4>
                      </div>
                      <div class="modal-body">
           
                          <form id="formRegisterMahasiswa" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/accountmahasiswa/tambah')); ?>">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">  
                              <input type="hidden" name="level" id="level" value="3">          
                              <div class="form-group">
                                  <label class="col-md-4 control-label">NIM</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="nim" name="nim" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nama</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="nama" name="nama" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Username</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="username" name="username" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Password</label>
                                  <div class="col-md-6 has-error">
                                      <input type="password" class="form-control" id="password" name="password">
                                      <small class="help-block"></small>
                                  </div>
                              </div>       

                              <div class="form-group">
                                  <label class="col-md-4 control-label">Konfirmasi Password</label>
                                  <div class="col-md-6 has-error">
                                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                      <small class="help-block"></small>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary" id="button-reg">
                                          Simpan
                                      </button>
                                  </div>
                              </div>
                          </form>                       
           
                      </div>
                  </div>
              </div>
          </div>
          <!--end of Modal --> 

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>