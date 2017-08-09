<html>
	<head>
		<title>Laporan Data Nilai Non Akademik Siswa Sirojul Munir Bekasi</title>
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
					<font size="14">NILAI NON AKADEMIK SANTRI<br>
					PONDOK PESANTREN SIROJUL MUNIR BEKASI INDONESIA<br></font>
					<br>
					<hr>
					<br>
					</center>

                    <br>
                    <table >
                    <thead>
                      <tr>
                        <th>No.</th>          
                        <th>NAMA SANTRI</th>
                        <th>KELAS</th>
                        <th>PELAJARAN</th>
                        <th>NILAI TUGAS</th>
                        <th>NILAI ULANGAN</th>                                                               
                        <th>NILAI AKHIR</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;foreach ($nilainonakademiks as $data):  ?>
                      <tr>      
                        <td align="center"><?php echo e($i); ?><</td>
                        <td align="center"><?php echo e($data->siswa->nama_siswa); ?></td>
                        <td align="center"><?php echo e($data->kelas->nama_kelas); ?></td>
                        <td align="center"><?php echo e($data->pelajaran->nama_pelajaran); ?></td>
                        <td align="center"><?php echo e($data->nilai_tugas); ?></td>
						<td align="center"><?php echo e($data->nilai_ulangan); ?></td>
                        <td align="center"><?php echo e($data->jumlah_nilai); ?></td>
                      </tr>
                    <?php $i++; endforeach  ?>
                    </tbody>                  
                  </table>
                  <br>
                  <table border="0" >                    
	                  <tr>
	                    <td width="70%" align="center"></td>
	                    <td align="center">Indonesia, <?php echo e(date('d M Y')); ?></td>	                            
	                  </tr>
	                  <tr height="60px">
	                    <td width="70%" align="center"></td>
	                    <td></td>	                            
	                  </tr>              
	                            
                  </table>
	</body>
</html>