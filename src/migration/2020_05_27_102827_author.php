<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Author extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bgr_author', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_seo');
            $table->string('foto')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        }); 

        Schema::table('bgr_artikel', function (Blueprint $table) {
            $table->foreignId('author_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bgr_author');
        Schema::table('bgr_artikel', function (Blueprint $table) {
            $table->dropColumn('author_id');
         });
    }
}
