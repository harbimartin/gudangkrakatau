<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemAttributesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_item_attributes', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('m_item_id');
            $table->unsignedBigInteger('m_attr_id');
            $table->unsignedBigInteger('m_value_id');
            $table->timestamps();
        });
        Schema::table('m_item_attributes', function (Blueprint $table){
            $table->foreign('m_item_id')->references('id')->on('m_items');
            $table->foreign('m_attr_id')->references('id')->on('m_attributes');
            $table->foreign('m_value_id')->references('id')->on('m_attribute_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('m_item_variant_attributes');
    }
}
