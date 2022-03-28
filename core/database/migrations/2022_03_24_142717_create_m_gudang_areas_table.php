<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMGudangAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_gudang_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->unsignedDecimal('panjang');
            $table->unsignedDecimal('lebar');
            $table->unsignedDecimal('tinggi');
            $table->unsignedBigInteger('m_gudang_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::table('m_gudang_areas', function (Blueprint $table) {
            $table->foreign('m_gudang_id')->references('id')->on('m_gudangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudang_areas');
    }
}
