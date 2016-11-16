<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('address');
            $table->string('town');
            $table->string('country');
            $table->integer('state_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states')->opUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('properties');
    }
}
