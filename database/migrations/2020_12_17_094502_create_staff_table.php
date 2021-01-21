<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string("nip");
            $table->string("name");
            $table->string("email");
            $table->string("description");
            $table->text("photo")->nullable();
            $table->enum('gender',['M','F'])->default('M');
            $table->string("phone");
            $table->string("line_account");
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('title_id');
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('title_id')->references('id')->on('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
