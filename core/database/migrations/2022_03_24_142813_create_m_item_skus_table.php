<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemSkusTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        // Schema::create('m_item_skus', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('m_item_id');
        //     $table->unsignedBigInteger('m_attribute_id');
        //     $table->unsignedTinyInteger('sequence')->default(10);
        //     $table->boolean('status')->default(false);
        //     $table->timestamps();
        // });
        // Schema::table('m_item_skus', function (Blueprint $table) {
        //     $table->foreign('m_item_id')->references('id')->on('m_items');
        //     $table->foreign('m_attribute_id')->references('id')->on('m_attributes');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        // Schema::dropIfExists('m_item_variant_attributes');
    }
}
