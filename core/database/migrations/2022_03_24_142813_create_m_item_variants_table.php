<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_item_variants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->default('');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('m_item_id');
            $table->timestamps();
        });
        Schema::table('m_item_variants', function (Blueprint $table) {
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
        Schema::dropIfExists('m_variants');
    }
}
