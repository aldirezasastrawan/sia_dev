<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Data Absensi Akademik Sirojul Munir Bekasi</title>
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
                <center><h2>Data Absensi Akademik Sirojul Munir Bekasi</h2></center>  
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">NO.<br></th>
                <th class="tg-3wr7">Kelas<br></th>
                <th class="tg-3wr7">Tanggal<br></th>
                <th class="tg-3wr7">Nama Siswa<br></th>
                <th class="tg-3wr7">Tahun Ajaran<br></th>
                <th class="tg-3wr7">Keterangan<br></th>
              </tr>
              <?php $i = 0 ?>
              @foreach ($absensis as $data)
              <?php $i++ ?>
              <tr>
                <td class="tg-rv4w" width="5%" align="center">{{$i}}</td>
                <td class="tg-rv4w" width="20%" align="center" >{{$data->kelas}}</td>
                <td class="tg-rv4w" width="50%">{{date('l, d F Y' ,strtotime($data->tanggal))}}</td>
                <td class="tg-rv4w" width="30%">{{$data->siswa->nama_siswa}}</td>
                <td class="tg-rv4w" width="20%">{{$data->thn_ajaran}}</td>
                <td class="tg-rv4w" width="20%" align="center">{{$data->keterangan}}</td>
              </tr>
              @endforeach
            </table>
        </body>
    </head>
</html>