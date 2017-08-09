<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Data Siswa Sirojul Munir Bekasi</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
  
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Data Siswa Sirojul Munir Bekasi</h2></center>  
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">NO<br></th>
                <th class="tg-3wr7">NIS<br></th>
                <th class="tg-3wr7">NIK<br></th>
                <th class="tg-3wr7">Nama Siswa<br></th>
                <th class="tg-3wr7">Jenis Kelamin<br></th>
                <th class="tg-3wr7">Tempat Lahir<br></th>
                <th class="tg-3wr7">Tanggal Lahir<br></th>
                <th class="tg-3wr7">Alamat<br></th>
                <th class="tg-3wr7">No Telfon<br></th>
                <th class="tg-3wr7">Tahun Ajaran<br></th>
                <th class="tg-3wr7">Keterangan<br></th>
              </tr>
              <?php $i = 0 ?>
              @foreach ($siswas as $data)
              <?php $i++ ?>
              <tr>
                <td class="tg-rv4w" width="10%">{{$i}}</td>
                <td class="tg-rv4w" width="20%">{{$data->nis}}</td>
                <td class="tg-rv4w" width="40%">{{ $data->nik }}</td>
                <td class="tg-rv4w" width="30%">{{$data->nama_siswa}}</td>
                <td class="tg-rv4w" width="30%">{{$data->jenis_kelamin}}</td>
                <td class="tg-rv4w" width="30%">{{$data->tempat_lahir}}</td>
                <td class="tg-rv4w" width="30%">{{date('d M Y' ,strtotime($data->tanggal_lahir))}}</td>
                <td class="tg-rv4w" width="30%">{{$data->alamat}}</td>
                <td class="tg-rv4w" width="30%">{{$data->tlp}}</td>
                <td class="tg-rv4w" width="30%">{{$data->tahun_ajaran}}</td>
                <td class="tg-rv4w" width="30%">{{$data->keterangan}}</td>
              </tr>
              @endforeach
            </table>
        </body>
    </head>
</html>