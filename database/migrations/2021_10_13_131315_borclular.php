<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Borclular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Borclular', function (Blueprint $table) {
            $table->increments('borclu_id');
            $table->string('borclu_ad',50);
            $table->string('borclu_soyad',50);
            $table->string('borclu_telefon',12);
            $table->string('borclu_adres')->nullable();
            $table->string('borclu_kurum')->nullable();
            $table->integer('toplam_tl_borc')->default(0);
            $table->integer('toplam_dolar_borc')->default(0);
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
        Schema::dropIfExists('Borclular');
    }
}
