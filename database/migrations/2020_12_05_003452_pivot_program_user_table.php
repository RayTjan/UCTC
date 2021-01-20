<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotProgramUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uctc_program_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uctc_program_id')->constrained()->onDelete('cascade');
            $table->foreignId('uctc_user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uctc_program_user');

    }
}
