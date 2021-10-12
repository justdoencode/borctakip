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
        Schema::dropIfExists('borclar');
        Schema::create('borclar', function (Blueprint $table) {
            $table->id();
            $table->string('borclu');
            $table->date('borc_baslangic_tarihi');
            $table->date('borc_bitis_tarihi');
            $table->string('para_turu');
            $table->integer('borc_miktari');
            $table->text('aciklama');
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
        Schema::dropIfExists('borclar');
    }
}
