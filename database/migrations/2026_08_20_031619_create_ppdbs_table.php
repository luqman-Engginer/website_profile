<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tahun_ajaran');
            $table->string('nama_siswa');
            $table->string('nisn');
            $table->string('jurusan');
            $table->string('asal_sekolah');
            $table->string('nama_orang_tua');
            $table->string('no_whatsapp');
            $table->string('status')->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
