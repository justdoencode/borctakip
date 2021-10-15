<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Borclar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Borclar', function (Blueprint $table) {
          $table->increments('borc_id');
          $table->integer('borclu_id');
          $table->date('borc_baslangic_tarihi');
          $table->date('borc_bitis_tarihi');
          $table->integer('para_turu_id');
          $table->integer('borc_miktari');
          $table->text('aciklama')->nullable();
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
        Schema::dropIfExists('Borclar');
    }
}
