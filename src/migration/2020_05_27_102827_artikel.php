<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Artikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bgr_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_id');
            $table->string('nama');
            $table->string('status')->default('aktif');
            $table->timestamps();
        }); 

        Schema::create('bgr_artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('judul');
            $table->text('judul_seo')->unique();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_deskripsi')->nullable();
            $table->text('tag')->nullable();
            $table->text('text');
            $table->string('gambar');
            $table->string('status')->default('draf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bgr_kategori');
        Schema::dropIfExists('bgr_artikel');
    }
}
