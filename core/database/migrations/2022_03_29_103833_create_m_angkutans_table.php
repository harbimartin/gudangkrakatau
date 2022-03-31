<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAngkutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_angkutans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code',12);
            $table->unsignedBigInteger('group_id');
            $table->string('desc')->default('-');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::table('m_angkutans', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('m_angkutan_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_angkutan_groups');
    }
}
