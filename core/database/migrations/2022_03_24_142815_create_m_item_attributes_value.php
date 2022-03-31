<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_item_attributes_values', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('m_item_attr_id');
            $table->unsignedBigInteger('m_attr_value_id');
            $table->unsignedSmallInteger('variant');
            $table->timestamps();
        });
        Schema::table('m_item_attributes_values', function (Blueprint $table){
            $table->foreign('m_item_attr_id')->references('id')->on('m_item_attributes');
            $table->foreign('m_attr_value_id')->references('id')->on('m_attribute_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_item_variant_attributes');
    }
}
