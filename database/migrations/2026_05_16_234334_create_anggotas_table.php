<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('anggotas', function (Blueprint $table) {
        $table->id();
        $table->string('no_anggota')->unique();
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('telepon', 15)->nullable();
        $table->tinyText('alamat')->nullable();
        $table->date('tgl_daftar');
        $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
