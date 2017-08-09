<html>
	<head>
		<title>Cetak Rapor</title>
	</head>
	<body>
	<style type="text/css">
		table{
			width: 100%;
		}
		table, th, td {
		   /* border: 1px solid black; */
		  
		}
		th, td {
		    padding: 5px;
		    text-align: left;
		   	vertical-align: middle;
		   	border-bottom: 1px solid #ddd;
		   	font-size: 12px;
		}		
		th {
			border-top: 1px solid #ddd;
			height: 20px;
			background-color: #ddd;
			text-align : center;
		}
	</style>
					
					<font size="14">KWITANSI PEMBAYARAN<br>
					PONDOK PESANTREN SIROJUL MUNIR BEKASI INDONESIA<br>
					TAHUN AJARAN <?php echo e($pembayarans->tahun_ajaran); ?></font><br><br>
          <div style="font-family:Arial; font-size:10px;">
                JL. SIROJUL MUNIR, BOJONGSARI, RT.04, RW.02, NO.35, KEL. JATISARI, KEC. JATIASIH, KOTA BEKASI, JAWA BARAT, INDONESIA 17426.  
          </div>
          <div style="font-family:Arial; font-size:12px;">
                Telp/Fax  : (021) 84306494.<br>
                Email     : sirojulmunir1@gmail.com. 
          </div>
					<hr>
					<br>
          <?php if(isset($pembayarans)): ?>
                        
                  <table >
                      <tbody>
                      <tr>
                        <td>Kode Pembayaran</td>                                  
                        <td><span class="badge bg-white">: <?php if(!empty($pembayarans->id)): ?><?php echo e($pembayarans->id); ?> <?php else: ?> - <?php endif; ?> </span></td>
                      </tr>
                      <tr>
                        <td>NIS</td>                                  
                        <td><span class="badge bg-white">: <?php if(!empty($pembayarans->siswa->nis)): ?><?php echo e($pembayarans->siswa->nis); ?> <?php else: ?> - <?php endif; ?> </span></td>
                      </tr>
                      <tr>
                        <td>NIK</td>                                  
                        <td><span class="badge bg-white">: <?php if(!empty($pembayarans->siswa->nik)): ?><?php echo e($pembayarans->siswa->nik); ?> <?php else: ?> - <?php endif; ?> </span></td>
                      </tr>
                      <tr>
                        <td>Nama Siswa</td>                                  
                        <td><span class="badge bg-white">: <?php if(!empty($pembayarans->siswa->nama_siswa)): ?><?php echo e($pembayarans->siswa->nama_siswa); ?> <?php else: ?> - <?php endif; ?> </span></td>
                      </tr>
                      <tr>
                        <td>Kelas</td>                                  
                        <td><span class="badge bg-white">: <?php if(!empty($pembayarans->siswa->kelas->nama_kelas)): ?><?php echo e($pembayarans->siswa->kelas->nama_kelas); ?> <?php else: ?> - <?php endif; ?> </span></td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>                              
                        <td><span class="badge bg-white">: <?php if(!empty(date('d M Y' ,strtotime($pembayarans->created_at)))): ?><?php echo e(date('d M Y',strtotime($pembayarans->created_at))); ?> <?php else: ?> - <?php endif; ?> </span></td>
                      </tr>
                    </tbody>
                  </table>
          <?php endif; ?>
					       <br>
                    <table >
                    <thead>
                      <tr>
                        <th>JENIS PEMBAYARAN</th>          
                        <th>TERBILANG</th>
                        <th>KETERANGAN</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                  
                      <tr>
                        <td align="center"><?php echo e($pembayarans->jenis_pembayaran); ?></td>
                        <td align="center"><?php echo e($pembayarans->jumlah_pembayaran); ?></td>
                        <td align="center"><?php echo e($pembayarans->keterangan); ?></td>
                      </tr>

                    </tbody>                  
                  </table>
                  <br>
                  <table border="0" >                    
                    <tr>
                      <td width="70%" align="center"></td>
                      <td align="center">Bekasi, <?php echo e(date('d M Y')); ?></td>                              
                    </tr>
                    <tr height="60px">
                      <td width="70%" align="center"></td>
                      <td></td>                             
                    </tr>              
                    <tr>
                      <td width="70%" align="center"></td>
                      <td align="center"><br><br><br>_________________________</td>                             
                    </tr>            
                  </table>
	</body>
</html>