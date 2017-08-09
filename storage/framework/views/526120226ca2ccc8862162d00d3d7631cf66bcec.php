      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>SIAKAD</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(URL::to('siswa')); ?>"><i class="fa fa-circle-o"></i> Siswa </a></li>
                <li><a href="<?php echo e(URL::to('guru')); ?>"><i class="fa fa-circle-o"></i> Guru </a></li>
                <li><a href="<?php echo e(URL::to('kelas')); ?>"><i class="fa fa-circle-o"></i> Kelas </a></li>
                <li><a href="<?php echo e(URL::to('pelajaran')); ?>"><i class="fa fa-circle-o"></i> Pelajaran </a></li>
               
              </ul>
            </li>
            <li class="<?php if(url('/absensi') == request()->url() or url('/absensi') == request()->url() ): ?> active <?php else: ?> '' <?php endif; ?> treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Data Absensi</span> <i class="fa fa-angle-left pull-right"></i>
               
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(URL::to('absensi')); ?>"><i class="fa fa-circle-o"></i>Absensi </a></li>
              </ul>
            </li>
            <li class="<?php if(url('/jadwal') == request()->url() or url('/jadwal/semesterprodi') == request()->url() ): ?> active <?php else: ?> '' <?php endif; ?> treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Data Jadwal</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(URL::to('jadwal')); ?>"><i class="fa fa-circle-o"></i> Setting Semester</a></li>
              </ul>
            </li>
            <li class="<?php if(url('/nilai') == request()->url()): ?> active <?php else: ?> '' <?php endif; ?> treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Nilai</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(URL::to('nilai')); ?>"><i class="fa fa-circle-o"></i> Data Nilai</a></li>
                
                
              </ul>
            </li>
            <li class="<?php if(url('/pembayaran') == request()->url()  ): ?> active <?php else: ?> '' <?php endif; ?> treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Data Pembayaran</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(URL::to('pembayaran')); ?>"><i class="fa fa-circle-o"></i> Data Pembayaran</a></li>  
              </ul>
            </li>
            
            <li class="<?php if(url('/accountmahasiswa') == request()->url() or url('/accountdosen') == request()->url() ): ?> active <?php else: ?> '' <?php endif; ?> treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>User Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(URL::to('accountmahasiswa')); ?>"><i class="fa fa-circle-o"></i> Akun Mahasiswa</a></li>
                <li><a href="<?php echo e(URL::to('accountdosen')); ?>"><i class="fa fa-circle-o"></i> Akun Dosen</a></li> 
                       
              
              </ul>
            </li>

                  
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Modal -->
      <div class="modal fade" id="myModalq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabelq">Modal title</h4>
            </div>
            <div class="modal-bodyq">
              ...
            </div>
            <div class="modal-footerq">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end of modal -->