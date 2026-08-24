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
            $table->string('jurusan');
            $table->string('no_whatsapp');
            $table->text('alamat');
            $table->string('status')->default('Menunggu'); // Menunggu, Diterima, Ditolak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
