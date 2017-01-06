<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBestellingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestellingens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('winkel_id');
            $table->string('naam');
            $table->string('mail');
            $table->string('tel');
            $table->string('afhaalUur');
            $table->string('afhaalDatum');
            $table->double('totaalPrijs');
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
        Schema::dropIfExists('bestellingen');
    }
}
