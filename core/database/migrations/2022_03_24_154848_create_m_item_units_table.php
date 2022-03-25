<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_item_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedBigInteger('m_item_id');
            $table->unsignedBigInteger('m_unit_id');
            $table->timestamps();
        });
        Schema::table('m_item_units', function (Blueprint $table) {
            $table->foreign('m_item_id')->references('id')->on('m_items');
            $table->foreign('m_unit_id')->references('id')->on('m_unit_measures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_units');
    }
}
