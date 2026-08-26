<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('ppdbs', function (Blueprint $table) {
        $table->string('tahun_ajaran')->default('2026/2027')->after('user_id');
        $table->string('nama_siswa')->after('tahun_ajaran');
        $table->string('nisn')->unique()->after('nama_siswa');
        $table->string('jenis_kelamin')->after('nisn');
        $table->string('asal_sekolah')->after('jurusan');
        $table->string('nama_ayah')->after('asal_sekolah');
        $table->string('pekerjaan_ayah')->after('nama_ayah');
        $table->string('nama_ibu')->after('pekerjaan_ayah');
        $table->string('pekerjaan_ibu')->after('nama_ibu');
        $table->text('alamat')->after('no_whatsapp');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
