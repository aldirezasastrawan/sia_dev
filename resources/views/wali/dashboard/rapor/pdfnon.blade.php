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
					@if(isset($siswas))
                        
                            <table >
                                <tbody>
                                <tr>
                                  
                                  <td>NIS</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['nis'])){{$siswas[0]['nis']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>NIK</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['nik'])){{$siswas[0]['nik']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>NAMA SISWA</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['nama_siswa'])){{$siswas[0]['nama_siswa']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>JENIS KELAMIN</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['jenis_kelamin'])){{$siswas[0]['jenis_kelamin']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>TEMPAT LAHIR</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['tempat_lahir'])){{$siswas[0]['tempat_lahir']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>TANGGAL LAHIR</td>                              
                                  <td><span class="badge bg-white">: @if(!empty(date('d M Y' ,strtotime($siswas[0]['tanggal_lahir'])))){{date('d M Y',strtotime($siswas[0]['tanggal_lahir']))}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>ALAMAT</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['alamat'])){{$siswas[0]['alamat']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>TELPON</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['tlp'])){{$siswas[0]['tlp']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>TAHUN AJARAN</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['tahun_ajaran'])){{$siswas[0]['tahun_ajaran']}} @else - @endif </span></td>
                                </tr>
                                <tr>
                                  <td>KETERANGAN</td>                                  
                                  <td><span class="badge bg-white">: @if(!empty($siswas[0]['keterangan'])){{$siswas[0]['keterangan']}} @else - @endif </span></td>
                                </tr>
                                          
                               
                              </tbody>
                            </table>
                    @endif
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
                        <td align="center">{{$i}}<</td>
                        <td align="center">{{ $data->kelas->nama_kelas }}</td>
                        <td align="center">{{ $data->pelajaran->nama_pelajaran }}</td>
                        <td align="center">{{ $data->jumlah_nilai }}</td>
                      </tr>
                    <?php $i++; endforeach  ?>
                    </tbody>                  
                  </table>
                  <br>
                  <table border="0" >                    
	                  <tr>
	                    <td width="70%" align="center"></td>
	                    <td align="center">Bekasi, {{date('d M Y')}}</td>	                            
	                  </tr>
	                  <tr height="60px">
	                    <td width="70%" align="center"></td>
	                    <td></td>	                            
	                  </tr>              
	                            
                  </table>
	</body>
</html>