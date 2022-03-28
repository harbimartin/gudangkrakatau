<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->string('kota');
            $table->string('longitude');
            $table->string('latitude');
            $table->unsignedDecimal('panjang');
            $table->unsignedDecimal('lebar');
            $table->unsignedDecimal('tinggi');
            $table->unsignedInteger('kapasitas');
            $table->unsignedBigInteger('m_cabang_id');
            $table->unsignedBigInteger('type_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::table('m_gudangs', function (Blueprint $table) {
            $table->foreign('m_cabang_id')->references('id')->on('m_cabangs');
            $table->foreign('type_id')->references('id')->on('m_gudang_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudangs');
    }
}
