<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UctcPencairanDana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uctc_pencairan_danas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->text('description');
            $table->enum('status',['0','1','2'])->default('0');
            $table->text('note')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('program')->nullable();
            $table->timestamps();
            $table->foreign('program')->references('id')->on('uctc_programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uctc_pencairan_danas');
    }
}
