<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaihathotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baihathot', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenbaihathot');
            $table->string('file');
            $table->string('loibaihat');
            $table->string('image');
            $table->integer('idtheloai')->unsigned();
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
        Schema::dropIfExists('baihathot');
    }
}
