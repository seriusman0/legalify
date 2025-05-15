<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('id_service');
            $table->string('nama_service');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('id_kategori');
            $table->decimal('harga', 10, 2);
            $table->text('bonus')->nullable();
            $table->string('durasi', 50)->nullable();
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->date('tanggal_dibuat');
            $table->date('tanggal_diperbarui');
            $table->timestamps();

            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('service_categories')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
