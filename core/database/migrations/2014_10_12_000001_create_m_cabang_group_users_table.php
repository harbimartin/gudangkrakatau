<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCabangGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_cabang_group_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_cabang_group_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::table('m_cabang_group_users', function (Blueprint $table) {
            $table->foreign('m_cabang_group_id')->references('id')->on('m_cabang_groups');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
