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
        Schema::table('pesertas', function (Blueprint $table) {
            $table->integer('nomor_urut')->nullable()->after('is_verified');
            $table->date('tanggal_tampil')->nullable()->after('nomor_urut');
            $table->string('tempat_tampil')->nullable()->after('tanggal_tampil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->dropColumn(['nomor_urut', 'tanggal_tampil', 'tempat_tampil']);
        });
    }
};