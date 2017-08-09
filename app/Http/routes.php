<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'HomeController@index');

Route::get('register','RegisterController@index');
Route::get('register/tambah','RegisterController@getRegister');
Route::get('register/daftar','RegisterController@daftar');
Route::get('/register/aktif','RegisterController@daftarsiswa');
Route::get('/register/aktif/ambil_nis_ajax/','RegisterController@ambil_nis_ajax');
Route::post('/register/simpantambahsiswa/','RegisterController@postRegistersiswa');
Route::get('/register/guru','RegisterController@daftarguru');
Route::get('/register/guru/ambil_nip_ajax/','RegisterController@ambil_nip_ajax');
Route::post('/register/simpantambahguru/','RegisterController@postRegisterguru');
Route::get('caripengguna','RegisterController@cari');

Route::post('/register/simpantambah','RegisterController@postRegister');
Route::post('postRegister','RegisterController@postRegister');

Route::get('/register/{id}/ubah/','RegisterController@ubah');
Route::get('/register/hapus/{id}/','RegisterController@hapus');
Route::post('/register/simpanubah/{id}','RegisterController@simpanubah');

Route::get('login','LoginController@getLogin');
Route::post('postLogin','LoginController@postLogin');

Route::get('logout',function()
{
	Auth::logout();

	return view('auth.login');
});

Route::get('pageAksesKhusus',function()
{
	return view('pageAksesKhusus');
});

// // routes administrator
Route::get('admin','AdminController@dashboard');
Route::get('siswa','SiswaController@index');
Route::get('/siswa/tambah','SiswaController@tambah');
Route::post('/siswa/simpantambah','SiswaController@simpantambah');
Route::get('/siswa/{id}/ubah/','SiswaController@ubah');
Route::post('/siswa/simpanubah/{id}','SiswaController@simpanubah');
Route::get('/siswa/hapus/{nis}/','SiswaController@hapus');
Route::get('/siswa/{id}/profile/','SiswaController@detail');
Route::get('carisiswa','SiswaController@cari');
Route::get('/siswa/pdf','SiswaController@cetak','siswa.pdf');
///////////////////////////////////////////////////////////////////////////////////////////////
Route::get('jadwaladmin','JadwaladminController@index');
Route::get('jadwaladmin/tambah','JadwaladminController@tambah');
Route::post('/jadwaladmin/simpantambah','JadwaladminController@simpantambah');
Route::get('/jadwaladmin/{id}/ubah/','jadwaladminController@ubah');
Route::post('/jadwaladmin/simpanubah/{id}','jadwaladminController@simpanubah');
Route::get('/jadwaladmin/hapus/{id}/','jadwaladminController@hapus');
Route::get('carijadwaladmin','jadwaladminController@cari');
Route::get('/jadwaladmin/pdf','jadwaladminController@cetak','jadwaladmin.pdf');
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('guruadmin','GuruadminController@index');
Route::get('guruadmin/tambah','GuruadminController@tambah');
Route::post('/guruadmin/simpantambah','GuruadminController@simpantambah');
Route::get('/guruadmin/{id}/ubah/','GuruadminController@ubah');
Route::post('/guruadmin/simpanubah/{id}','GuruadminController@simpanubah');
Route::get('/guruadmin/hapus/{nip}/','GuruadminController@hapus');
Route::get('/guruadmin/{id}/profile/','GuruadminController@detail');
Route::get('cariguruadmin','GuruadminController@cari');
Route::get('/guruadmin/pdf','GuruadminController@cetak','guruadmin.pdf');

// Route::get('gantipasswordguru/{id}', 'GuruadminController@ganti');
// Route::post('gantipasswordguru/{id}','GuruadminController@simpanganti');
/////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('kelas','KelasController@index');
Route::get('/kelas/tambah','KelasController@tambah');
Route::post('/kelas/simpantambah','KelasController@simpantambah');
Route::get('/kelas/{id}/ubah/','KelasController@ubah');
Route::post('/kelas/simpanubah/{id}','KelasController@simpanubah');
Route::get('/kelas/hapus/{id}/','KelasController@hapus');
Route::get('carikelas','KelasController@cari');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('pelajaran','PelajaranController@index');
Route::get('/pelajaran/tambah','PelajaranController@tambah');
Route::post('/pelajaran/simpantambah','PelajaranController@simpantambah');
Route::get('/pelajaran/{id}/ubah/','PelajaranController@ubah');
Route::post('/pelajaran/simpanubah/{id}','PelajaranController@simpanubah');
Route::get('/pelajaran/hapus/{id}/','PelajaranController@hapus');
Route::get('caripelajaran','PelajaranController@cari');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('pembayaranadmin','PembayaranadminController@index');
Route::get('pembayaranadmin/tambah','PembayaranadminController@tambah');
Route::post('/pembayaranadmin/simpantambah','PembayaranadminController@simpantambah');
Route::get('/pembayaranadmin/{id}/ubah/','PembayaranadminController@ubah');
Route::post('/pembayaranadmin/simpanubah/{id}','PembayaranadminController@simpanubah');
Route::get('/pembayaranadmin/hapus/{id}/','PembayaranadminController@hapus');
Route::get('caripembayaranadmin','PembayaranadminController@cari');
Route::get('/pembayaranadmin/{id}/cetakkwitansi/','PembayaranadminController@cetakkwitansi');
Route::get('/pembayaranadmin/pdf','PembayaranadminController@cetak','pembayaranadmin.pdf');
Route::get('/pembayaranadmin/ambil_tahun_ajax/','PembayaranadminController@ambil_tahun_ajax');


Route::get('/pembayaranadmin/tambah/kelas1', 'PembayaranadminController@indexkelas1');
Route::post('/pembayaranadmin/tambah/simpanpembayarankelas','PembayaranadminController@simpanpembayarankelas');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('absensi','AbsensiController@index');
Route::get('absensi/tambah','AbsensiController@tambah');
Route::post('/absensi/simpantambah','AbsensiController@simpantambah');
Route::get('/absensi/{id}/ubah/','AbsensiController@ubah');
Route::post('/absensi/simpanubah/{id}','AbsensiController@simpanubah');
Route::get('/absensi/hapus/{id}/','AbsensiController@hapus');
Route::get('cariabsensi','AbsensiController@cari');
Route::get('/absensi/pdf','AbsensiController@cetak','absensi.pdf');

Route::get('/absensi/tambah/kelas1', 'AbsensiController@indexkelas1');
Route::get('/absensi/tambah/kelas2', 'AbsensiController@indexkelas2');
Route::get('/absensi/tambah/kelas3', 'AbsensiController@indexkelas3');
Route::get('/absensi/tambah/kelas4', 'AbsensiController@indexkelas4');
Route::get('/absensi/tambah/kelas5', 'AbsensiController@indexkelas5');
Route::get('/absensi/tambah/kelas6', 'AbsensiController@indexkelas6');
Route::post('/absensi/tambah/simpanabsensikelas','AbsensiController@simpanabsensikelas');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('daftar','DaftarController@index');
Route::get('daftar/tambah','DaftarController@tambah');
Route::post('/daftar/simpantambah','DaftarController@simpantambah');
Route::get('/daftar/{id}/ubah/','DaftarController@ubah');
Route::post('/daftar/simpanubah/{id}','DaftarController@simpanubah');
Route::get('/daftar/hapus/{id}/','DaftarController@hapus');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('nilaiakademikadmin','NilaiakademikadminController@index');
Route::get('nilaiakademikadmin/tambah','NilaiakademikadminController@tambah');
Route::post('/nilaiakademikadmin/simpantambah','NilaiakademikadminController@simpantambah');
Route::get('/nilaiakademikadmin/{id}/ubah/','NilaiakademikadminController@ubah');
Route::post('/nilaiakademikadmin/simpanubah/{id}','NilaiakademikadminController@simpanubah');
Route::get('/nilaiakademikadmin/hapus/{id}/','NilaiakademikadminController@hapus');
Route::get('carinilaiakademikadmin','NilaiakademikadminController@cari');
Route::get('/nilaiakademikadmin/pdf','NilaiakademikadminController@cetak','nilaiakademik.pdf');
Route::get('/nilaiakademikadmin/ambil_kelas_ajax','NilaiakademikadminController@ambil_kelas_ajax');

Route::post('/nilaiakademikadmin/importnilai','NilaiakademikadminController@importnilai');
Route::get('/nilaiakademikadmin/tambah/kelas1', 'NilaiakademikadminController@indexkelas1');
Route::get('/nilaiakademikadmin/tambah/kelas2', 'NilaiakademikadminController@indexkelas2');
Route::get('/nilaiakademikadmin/tambah/kelas3', 'NilaiakademikadminController@indexkelas3');
Route::get('/nilaiakademikadmin/tambah/kelas4', 'NilaiakademikadminController@indexkelas4');
Route::get('/nilaiakademikadmin/tambah/kelas5', 'NilaiakademikadminController@indexkelas5');
Route::get('/nilaiakademikadmin/tambah/kelas6', 'NilaiakademikadminController@indexkelas6');
Route::post('/nilaiakademik/tambah/simpannilaiakademikkelas','NilaiakademikadminController@simpannilaiakademikkelas');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('nilainonakademikadmin','NilainonakademikadminController@index');
Route::get('nilainonakademikadmin/tambah','NilainonakademikadminController@tambah');
Route::post('/nilainonakademikadmin/simpantambah','NilainonakademikadminController@simpantambah');
Route::get('/nilainonakademikadmin/{id}/ubah/','NilainonakademikadminController@ubah');
Route::post('/nilainonakademikadmin/simpanubah/{id}','NilainonakademikadminController@simpanubah');
Route::get('/nilainonakademikadmin/hapus/{id}/','NilainonakademikadminController@hapus');
Route::get('carinilainonakademikadmin','NilainonakademikadminController@cari');
Route::get('/nilainonakademikadmin/pdf','NilainonakademikadminController@cetak','nilainonakademikadmin.pdf');

Route::post('/nilainonakademikadmin/importnilai','NilainonakademikadminController@importnilai');
Route::get('/nilainonakademikadmin/tambah/kelas1', 'NilainonakademikadminController@indexkelas1');
Route::get('/nilainonakademikadmin/tambah/kelas2', 'NilainonakademikadminController@indexkelas2');
Route::get('/nilainonakademikadmin/tambah/kelas3', 'NilainonakademikadminController@indexkelas3');
Route::get('/nilainonakademikadmin/tambah/kelas4', 'NilainonakademikadminController@indexkelas4');
Route::get('/nilainonakademikadmin/tambah/kelas5', 'NilainonakademikadminController@indexkelas5');
Route::get('/nilainonakademikadmin/tambah/kelas6', 'NilainonakademikadminController@indexkelas6');
Route::post('/nilainonakademik/tambah/simpannilainonakademikkelas','NilainonakademikadminController@simpannilainonakademikkelas');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('raporadmin','RaporadminController@index');
Route::get('/raporadmin/{id}/detail/','RaporadminController@detail');
Route::get('/rapor/{id}/pdf','RaporadminController@cetak','rapor siswa.pdf');




// // routes pimpinan;
Route::get('pimpinan','RolePimpinan\PimpinanController@index');

Route::get('datasiswa','RolePimpinan\PimpinanController@siswa');
Route::get('/datasiswa/{id}/profile/','RolePimpinan\PimpinanController@detailsiswa');
Route::get('/datasiswa/pdf','RolePimpinan\PimpinanController@siswacetak','datasiswa.pdf');

Route::get('dataguru','RolePimpinan\PimpinanController@guru');
Route::get('/dataguru/{id}/profile/','RolePimpinan\PimpinanController@detailguru');
Route::get('/dataguru/pdf','RolePimpinan\PimpinanController@gurucetak','dataguru.pdf');

Route::get('datakelas','RolePimpinan\PimpinanController@kelas');

Route::get('datapelajaran','RolePimpinan\PimpinanController@pelajaran');

Route::get('dataabsensi','RolePimpinan\PimpinanController@absensi');
Route::get('/dataabsensi/pdf','RolePimpinan\PimpinanController@absensicetak','dataabsensi.pdf');

Route::get('datajadwal','RolePimpinan\PimpinanController@jadwal');
Route::get('/datajadwal/pdf','RolePimpinan\PimpinanController@jadwalcetak','datajadwal.pdf');

Route::get('datapembayaran','RolePimpinan\PimpinanController@pembayaran');
Route::get('/datapembayaran/pdf','RolePimpinan\PimpinanController@pembayarancetak','datapembayaran.pdf');

Route::get('datanilaiakademik','RolePimpinan\PimpinanController@nilaiakademik');
Route::get('/datanilaiakademik/pdf','RolePimpinan\PimpinanController@nilaiakademikcetak','datanilaiakademik.pdf');

Route::get('datanilainonakademik','RolePimpinan\PimpinanController@nilainonakademik');
Route::get('/datanilainonakademik/pdf','RolePimpinan\PimpinanController@nilainonakademikcetak','datanilainonakademik.pdf');

Route::get('ubahpassword', 'RolePimpinan\PimpinanController@ubah');
Route::post('ubahpassword','RolePimpinan\PimpinanController@simpanubah');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// // routes guru;
Route::get('guru','GuruController@index');
Route::get('jadwalguru','jadwalguruController@index');
Route::get('carijadwalguru','jadwalguruController@cari');
Route::get('/jadwalguru/pdf','jadwalguruController@cetak','jadwalguru.pdf');

Route::get('gantipassword', 'GuruController@ubah');
Route::post('gantipassword','GuruController@simpanubah');
///////////////////////////////////////////////////////////////////////////////////////////////

// // routes wali;
Route::get('wali','WaliController@index');
Route::get('resetpassword', 'WaliController@ubah');
Route::post('resetpassword','WaliController@simpanubah');

Route::get('jadwalsiswa','jadwalsiswaController@index');
Route::get('carijadwalsiswa','jadwalsiswaController@cari');
Route::get('/jadwalsiswa/pdf','jadwalsiswaController@cetak','jadwalsiswa.pdf');

Route::get('nilaiakademiksiswa','NilaiakademiksiswaController@index');
Route::get('carinilaiakademiksiswa','NilaiakademiksiswaController@cari');
Route::get('/nilaiakademiksiswa/pdf','NilaiakademiksiswaController@cetak','nilaiakademiksiswa.pdf');

Route::get('nilainonakademiksiswa','NilainonakademiksiswaController@index');
Route::get('carinilainonakademiksiswa','NilainonakademiksiswaController@cari');
Route::get('/nilainonakademiksiswa/pdf','NilainonakademiksiswaController@cetak','nilainonakademiksiswa.pdf');

Route::get('pembayaransiswa','PembayaransiswaController@index');
Route::get('caripembayaransiswa','PembayaransiswaController@cari');
Route::get('/pembayaransiswa/pdf','PembayaransiswaController@cetak','pembayaransiswa.pdf');

Route::get('raporsiswa','RaporsiswaController@index');
Route::get('/raporsiswa/pdf','RaporsiswaController@cetak','raporsiswa.pdf');
Route::get('/raporsiswanon/pdf','RaporsiswaController@cetak1','raporsiswanon.pdf');
