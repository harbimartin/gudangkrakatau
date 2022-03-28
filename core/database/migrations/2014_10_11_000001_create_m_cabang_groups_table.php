<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCabangGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_cabang_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_cabang_id');
            $table->unsignedBigInteger('group_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::table('m_cabang_groups', function (Blueprint $table) {
            $table->foreign('m_cabang_id')->references('id')->on('m_cabangs');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
