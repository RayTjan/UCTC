<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdditionsToPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uctc_programs', function (Blueprint $table) {
            $table->unsignedBigInteger('role')->nullable();
            $table->unsignedBigInteger('type')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->references('id')->on('uctc_categories')->onDelete('set null');
            $table->foreign('type')->references('id')->on('uctc_types')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uctc_programs', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('category');
        });
    }
}
