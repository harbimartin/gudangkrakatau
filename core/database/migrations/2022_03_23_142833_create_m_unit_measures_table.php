<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUnitMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_unit_measures', function (Blueprint $table) {
            $table->id();
            $table->char('code', 10);
            $table->double('decimal')->default(0);
            $table->string('desc')->default('-');
            $table->unsignedBigInteger('group_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::table('m_unit_measures', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('m_unit_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_unit_measures');
    }
}
