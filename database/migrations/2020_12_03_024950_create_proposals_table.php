<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uctc_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('proposal');
            $table->string('status')->default("0");
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
        Schema::dropIfExists('uctc_proposals');
    }
}
