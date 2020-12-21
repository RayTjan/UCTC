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
            $table->foreignId('uctc_program_id')->constrained();
            $table->foreignId('uctc_user_id')->constrained();
            $table->enum('is_approved', ['0','1','2'])->default('0')->comment('0 = Pending, 1 = Approved, 2 = Rejected');
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
