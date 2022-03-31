<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_item_headers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('classification_id');
            $table->string('desc');
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::table('m_item_headers', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('m_item_groups');
            $table->foreign('classification_id')->references('id')->on('m_item_classifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_items');
    }
}
