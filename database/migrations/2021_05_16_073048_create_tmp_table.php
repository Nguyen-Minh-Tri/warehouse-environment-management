<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTmpTable extends Migration
{


    public function up()
    {
        Schema::create('tmp', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('data');
            $table->string('unit');
        });
    }


    public function down()
    {
        Schema::drop("tmp");
    }
}