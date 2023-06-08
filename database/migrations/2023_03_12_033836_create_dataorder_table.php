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
        Schema::create('dataorder', function (Blueprint $table) {
            $table->string('Tgl OBC');
            $table->string('Material');
            $table->string('NOPO');
            $table->string('OBC');
            $table->string('SERI');
            $table->string('WARNA');
            $table->string('RPB');
            $table->string('HJE');
            $table->string('BPB');
            $table->string('KODE_PABRIK');
            $table->string('JHT');
            $table->string('QTY PESAN');
            $table->string('RENCET');
            $table->string('Tgl JTempo');
            $table->string('Personalisasi');
            $table->string('Perekat');
            $table->integer('GR');
            $table->string('No Pelat');
            $table->string('type');
            $table->string('Created On');
            $table->string('Sales Doc');
            $table->string('Item');
            $table->string('Material Description');
            $table->timestamp('tanggal_laporan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataorder');
    }
};
