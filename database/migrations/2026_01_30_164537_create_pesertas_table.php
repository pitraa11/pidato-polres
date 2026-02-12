<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();
            $table->string('nama_peserta');
            $table->string('hp_peserta', 20);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->unsignedInteger('usia');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kelas');
            $table->string('nama_ortu');
            $table->string('hp_ortu', 20);
            $table->string('nama_pengawas');
            $table->string('hp_pengawas', 20);
            $table->text('tema_pidato');
            $table->string('jenjang');
            $table->text('alamat');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
