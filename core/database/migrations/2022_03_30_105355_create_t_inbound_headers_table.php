<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTInboundHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_inbound_headers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_gudang_id');
            $table->string('code');
            $table->unsignedBigInteger('m_angkutan_id');
            $table->unsignedBigInteger('receive_by');
            $table->string('note',512);
            $table->string('supir');
            $table->unsignedBigInteger('m_asal_id');
            $table->datetime('receive_at');
            $table->timestamps();
        });
        Schema::table('t_inbound_headers', function (Blueprint $table) {
            $table->foreign('m_gudang_id')->references('id')->on('m_gudangs');
            $table->foreign('m_angkutan_id')->references('id')->on('m_angkutans');
            $table->foreign('m_asal_id')->references('id')->on('m_asals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_inbound_headers');
    }
}
