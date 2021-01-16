<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uctc_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status',['0','1'])->default('0');
            $table->string('description');
            $table->date('due_date');
            $table->unsignedBigInteger('action_plan')->nullable();
            $table->unsignedBigInteger('PIC')->nullable();
            $table->timestamps();
            $table->foreign('action_plan')->references('id')->on('uctc_action_plans')->onDelete('cascade');
            $table->foreign('PIC')->references('id')->on('uctc_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uctc_tasks');
    }
}
