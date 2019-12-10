<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaihathotCasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baihathot_casi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idbaihathot')->unsigned()->index();
            $table->foreign('idbaihathot')->references('id')->on('baihathot')->onDelete('cascade');

            $table->integer('idcasi')->unsigned()->index();
            $table->foreign('idcasi')->references('id')->on('casi')->onDelete('cascade');
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
        Schema::dropIfExists('baihathot_casi');
    }
}
