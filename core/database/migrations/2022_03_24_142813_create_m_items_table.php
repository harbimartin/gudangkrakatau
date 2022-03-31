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
        Schema::create('m_items', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('m_item_id');
            $table->unsignedBigInteger('variant');
            $table->char('upc',16);
            $table->timestamps();
        });
        Schema::table('m_items', function (Blueprint $table){
            $table->foreign('m_item_id')->references('id')->on('m_item_headers');
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
