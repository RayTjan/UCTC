<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uctc_finances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->string('type');
            $table->unsignedBigInteger('program')->nullable();
            $table->timestamps();
            $table->foreign('program')->references('id')->on('uctc_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}