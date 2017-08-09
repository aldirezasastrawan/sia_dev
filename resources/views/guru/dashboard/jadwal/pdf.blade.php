<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Jadwal Mengajar Guru Sirojul Munir Bekasi</title>
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
                <center>
                    <font size="14">JADWAL MENGAJAR GURU<br>
                    SIROJUL MUNIR BEKASI INDONESIA<br>
                    </font>
                    <br>
                    <hr>
                    <br>
                </center>
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">NO.<br></th>
                <th class="tg-3wr7">Kelas<br></th>
                <th class="tg-3wr7">Hari<br></th>
                <th class="tg-3wr7">Jam<br></th>
                <th class="tg-3wr7">Nama Pelajaran<br></th>
                <th class="tg-3wr7">Pengajar<br></th>
                <th class="tg-3wr7">Gedung<br></th>
                <th class="tg-3wr7">Ruangan<br></th>
                <th class="tg-3wr7">Tahun Ajaran<br></th>
              </tr>
              <?php $i = 0 ?>
              @foreach ($jadwals as $data)
              <?php $i++ ?>
              <tr>
                <td class="tg-rv4w" width="5%" align="center">{{$i}}</td>
                <td class="tg-rv4w" width="20%">{{$data->kelas->nama_kelas}}</td>
                <td class="tg-rv4w" width="10%">{{$data->hari}}</td>
                <td class="tg-rv4w" width="30%">{{$data->jam}}</td>
                <td class="tg-rv4w" width="30%">{{$data->pelajaran->nama_pelajaran}}</td>
                <td class="tg-rv4w" width="50%">{{$data->guru->nama_guru}}</td>
                <td class="tg-rv4w" width="30%">{{$data->gedung}}</td>
                <td class="tg-rv4w" width="20%">{{$data->ruangan}}</td>
                <td class="tg-rv4w" width="30%">{{$data->tahun_ajaran}}</td>
              </tr>
              @endforeach
            </table>
                <br>
                <br>
                <br>
                <table border="0" >                    
                      <tr>
                        <td width="70%" align="center"></td>
                        <td align="center">NB : Diharapkan Guru Mengajar Tepat Waktu Sesuai Jadwal dan Ruangan yang Sudah ditentukan.</td>
                      </tr>
                </table>
        </body>
    </head>
</html>