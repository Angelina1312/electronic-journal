<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtmetkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otmetkis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_student');
            $table->integer('id_para_tek');
            $table->integer('ocenka');
            $table->integer('prisutstvie');
            $table->date('data');
            $table->integer('id_prepod');
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
        Schema::dropIfExists('otmetkis');
    }
}
