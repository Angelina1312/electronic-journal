<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaspisaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raspisanies', function (Blueprint $table) {
            $table->id();
            $table->integer('id_group');
            $table->integer('den_ned');
            $table->integer('id_para');
            $table->integer('id_predmet');
            $table->integer('tip_zan');
            $table->integer('id_prepod');
            $table->integer('id_aud');
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
        Schema::dropIfExists('raspisanies');
    }
}
