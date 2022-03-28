<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLogAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('log_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_id');
            $table->char('column',36);
            $table->string('value');
        });
        Schema::table('log_attributes', function (Blueprint $table) {
            $table->foreign('log_id')->references('id')->on('logs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_attributes');
    }
}
