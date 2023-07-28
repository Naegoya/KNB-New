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
        Schema::create('mingguan_reports', function (Blueprint $table) {
            $table->id();
            $table->string('id_vendor');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->string('no_pa');
            $table->string('alamat');
            $table->date('tanggal_update');
            $table->string('status_pekerjaan');
            $table->string('tipe_kendala');
            $table->string('deskripsi_kendala');
            $table->string('est_pig_tarikan');
            $table->string('realisasi_tarikan');
            $table->string('est_pig_tracing');
            $table->string('realisasi_tracing');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mingguan_reports');
    }
};
