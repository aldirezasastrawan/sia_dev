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
					<center>
					<font size="14">HASIL BELAJAR SANTRI<br>
					PONDOK PESANTREN SIROJUL MUNIR BEKASI INDONESIA<br>
					TAHUN AJARAN XYZ</font>
					<br>
					<hr>
					<br>
					</center>
					<?php if(isset($siswas)): ?>
                        
                            <table >
                                <tbody>
                                <tr>
                                  
                                  <td>NIS</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['nis'])): ?><?php echo e($siswas[0]['nis']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>NIK</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['nik'])): ?><?php echo e($siswas[0]['nik']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>NAMA SISWA</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['nama_siswa'])): ?><?php echo e($siswas[0]['nama_siswa']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>JENIS KELAMIN</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['jenis_kelamin'])): ?><?php echo e($siswas[0]['jenis_kelamin']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>TEMPAT LAHIR</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['tempat_lahir'])): ?><?php echo e($siswas[0]['tempat_lahir']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>TANGGAL LAHIR</td>                              
                                  <td><span class="badge bg-white">: <?php if(!empty(date('d M Y' ,strtotime($siswas[0]['tanggal_lahir'])))): ?><?php echo e(date('d M Y',strtotime($siswas[0]['tanggal_lahir']))); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>ALAMAT</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['alamat'])): ?><?php echo e($siswas[0]['alamat']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>TELPON</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['tlp'])): ?><?php echo e($siswas[0]['tlp']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>TAHUN AJARAN</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['tahun_ajaran'])): ?><?php echo e($siswas[0]['tahun_ajaran']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                <tr>
                                  <td>KETERANGAN</td>                                  
                                  <td><span class="badge bg-white">: <?php if(!empty($siswas[0]['keterangan'])): ?><?php echo e($siswas[0]['keterangan']); ?> <?php else: ?> - <?php endif; ?> </span></td>
                                </tr>
                                          
                               
                              </tbody>
                            </table>
                    <?php endif; ?>
                    <br>
                    <table >
                    <thead>
                      <tr>
                        <th>No.</th>          
                        <th>KELAS</th>
                        <th>NAMA PELAJARAN</th>                                                               
                        <th>NILAI AKHIR</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;foreach ($nilainonakademiks as $data):  ?>
                      <tr>      
                        <td align="center"><?php echo e($i); ?><</td>
                        <td align="center"><?php echo e($data->kelas->nama_kelas); ?></td>
                        <td align="center"><?php echo e($data->pelajaran->nama_pelajaran); ?></td>
                        <td align="center"><?php echo e($data->jumlah_nilai); ?></td>
                      </tr>
                    <?php $i++; endforeach  ?>
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
	                            
                  </table>
	</body>
</html>