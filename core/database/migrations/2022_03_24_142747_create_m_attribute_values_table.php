<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAttributeValuesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('m_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->char('code',5);
            $table->unsignedBigInteger('m_attr_id');
            $table->unsignedBigInteger('m_uom_id')->nullable();
            $table->timestamps();
        });
        Schema::table('m_attribute_values', function (Blueprint $table) {
            $table->foreign('m_attr_id')->references('id')->on('m_attributes');
            $table->foreign('m_uom_id')->references('id')->on('m_unit_measures');
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
