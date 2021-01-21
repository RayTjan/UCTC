<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("nim");
            $table->string("name");
            $table->string("email");
            $table->string("batch");
            $table->string("description");
            $table->text("photo")->nullable();
            $table->enum('gender',['M','F'])->default('M');
            $table->string("phone");
            $table->string("line_account");
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
