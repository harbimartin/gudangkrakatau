<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_cabang_group_user_id');
            $table->enum('action', ['CREATE','UPDATE','DELETE']);
            $table->unsignedBigInteger('tables');
            $table->unsignedBigInteger('m_id');
            $table->timestamp('time')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('m_cabang_group_user_id')->references('id')->on('m_cabang_group_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
