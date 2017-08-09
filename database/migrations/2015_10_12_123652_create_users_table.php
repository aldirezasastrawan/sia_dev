<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('roles_id')->nullable();
            $table->integer('gurus_id')->nullable()->unsigned();
            $table->integer('siswas_id')->nullable()->unsigned();
            $table->string('username')->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
           
        });


        Schema::create('roles',function(Blueprint $kolom){

            $kolom->increments('id');
            $kolom->string('namaRule');
        });


        

        // table siswas//

        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis');
            $table->string('nik');
            $table->string('nama_siswa');
            $table->integer('kelass_id')->nullable()->unsigned();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->string('tlp');
            $table->string('tahun_ajaran');
            $table->string('nama_wali');
            $table->string('keterangan');
            $table->timestamps();
        });

        // table kelas//

        Schema::create('kelass', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nama_kelas');
            $kolom->timestamps();
        });


        // table absensis//

        Schema::create('absensis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kelas');
            $table->string('tanggal');
            $table->unsignedInteger('siswas_id')->nullable();
            $table->string('thn_ajaran');
            $table->string('keterangan');
            $table->timestamps();
        });

        // table pembayarans//

        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('siswas_id')->nullable();
            $table->string('kelas');
            $table->string('tahun_ajaran');
            $table->string('jenis_pembayaran');
            $table->string('jumlah_pembayaran');
            $table->string('keterangan');
            $table->timestamps();
        });

        // table nilaiakademiks//

        Schema::create('nilaiakademiks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('siswas_id')->nullable();
            $table->unsignedInteger('pelajarans_id')->nullable();
            $table->string('kelas');
            $table->string('nilai_tugas');
            $table->string('nilai_ulangan');
            $table->string('jumlah_nilai');
            $table->timestamps();
        });

         // table nilainonakademiks//

        Schema::create('nilainonakademiks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('siswas_id')->nullable();
            $table->unsignedInteger('pelajarans_id')->nullable();
            $table->string('kelas');
            $table->string('nilai_tugas');
            $table->string('nilai_ulangan');
            $table->string('jumlah_nilai');
            $table->timestamps();
        });

        // table pelajarans//

        Schema::create('pelajarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pelajaran');
            $table->string('durasi');
            $table->string('keterangan');
            $table->timestamps();
        });

        // table jadwals//

        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kelass_id')->nullable();
            $table->string('hari');
            $table->string('jam');
            $table->unsignedInteger('pelajarans_id')->nullable();
            $table->unsignedInteger('gurus_id')->nullable();
            $table->unsignedInteger('siswas_id')->nullable();
            $table->string('gedung');
            $table->string('ruangan');
            $table->string('tahun_ajaran');
            $table->string('status_mapel');
            $table->timestamps();
        });

        // table gurus//

        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip');
            $table->string('nuptk');
            $table->string('nama_guru');
            $table->string('jenis_kelamin');
            $table->string('keterangan');
            $table->timestamps();
        });


        Schema::table('users',function(Blueprint $kolom){

            $kolom->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('gurus_id')->references('id')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('siswas_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('siswas',function(Blueprint $kolom){

            $kolom->foreign('kelass_id')->references('id')->on('kelass')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('absensis',function(Blueprint $table){

            $table->foreign('siswas_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pembayarans',function(Blueprint $table){

            $table->foreign('siswas_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('nilaiakademiks',function(Blueprint $table){

            $table->foreign('siswas_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pelajarans_id')->references('id')->on('pelajarans')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('nilainonakademiks',function(Blueprint $table){

            $table->foreign('siswas_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pelajarans_id')->references('id')->on('pelajarans')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('jadwals',function(Blueprint $table){

            $table->foreign('kelass_id')->references('id')->on('kelass')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pelajarans_id')->references('id')->on('pelajarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gurus_id')->references('id')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('siswas_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('roles');
        Schema::drop('siswas');
        Schema::drop('kelass');
        Schema::drop('absensis');
        Schema::drop('pembayarans');
        Schema::drop('nilaiakademiks');
        Schema::drop('nilainonakademiks');
        Schema::drop('pelajarans');
        Schema::drop('jadwals');
        Schema::drop('gurus');
    }
}
