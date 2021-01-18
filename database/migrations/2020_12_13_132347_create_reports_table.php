<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uctc_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report');
            $table->enum('status',['0','1','2'])->default("0");;
            $table->unsignedBigInteger('program')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
