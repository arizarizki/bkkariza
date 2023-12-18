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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->increments('id_loker');
            $table->string('nis');
            $table->unsignedBigInteger('id_perusahaan');
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->enum('status',['aktif','tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
