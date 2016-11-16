<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_facility', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties')->opUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')->opUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('property_facility');
    }
}
