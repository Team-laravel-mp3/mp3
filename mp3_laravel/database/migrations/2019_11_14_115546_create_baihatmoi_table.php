<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaihatmoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baihatmoi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenbaihat');
            $table->text('loibaihat');
            $table->string('nghesi')->nullable();
            $table->string('file');
            $table->string('image');
            $table->integer('iduser')->unsigned();
            $table->integer('idtheloai')->unsigned();
            $table->integer('status');
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
        Schema::dropIfExists('baihatmoi');
    }
}
