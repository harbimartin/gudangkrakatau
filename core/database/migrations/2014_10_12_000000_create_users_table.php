<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('jabatan');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
            // $table->unsignedBigInteger('group_id');
            $table->rememberToken();
            $table->timestamps();
        });
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('group_id')->references('id')->on('groups');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
