<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTmpTable extends Migration
{


    public function up()
    {
        Schema::create('tmp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('celsius');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop("tmp");
    }
}