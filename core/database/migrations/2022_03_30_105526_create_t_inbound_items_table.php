<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTInboundItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('t_inbound_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_inbound_header_id');
            $table->unsignedBigInteger('m_item_id');
            $table->unsignedMediumInteger('quantity');
            $table->unsignedMediumInteger('note');
            $table->timestamps();
        });
        Schema::table('t_inbound_items', function (Blueprint $table) {
            $table->foreign('t_inbound_header_id')->references('id')->on('t_inbound_headers');
            $table->foreign('m_item_id')->references('id')->on('m_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_inbound_items');
    }
}
