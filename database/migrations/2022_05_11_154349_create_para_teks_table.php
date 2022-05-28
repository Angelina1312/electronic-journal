<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParaTeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('para_teks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_predmet');
            $table->string('name_tema');
            $table->integer('id_prepod');
            $table->string('drop_info');
            $table->date('data');
            $table->integer('id_group');
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
        Schema::dropIfExists('para_teks');
    }
}
