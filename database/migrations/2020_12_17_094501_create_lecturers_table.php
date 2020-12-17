<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string("nip");
            $table->string("nidn");
            $table->string("name");
            $table->string("email");
            $table->string("description");
            $table->text("photo");
            $table->enum('gender',['M','F'])->default('M');
            $table->string("phone");
            $table->string("line_account");
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('title_id');
            $table->unsignedBigInteger('jaka_id');
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('jaka_id')->references('id')->on('jakas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
