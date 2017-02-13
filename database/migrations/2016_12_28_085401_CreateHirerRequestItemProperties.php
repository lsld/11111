<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHirerRequestItemProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirer_request_item_properties', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('request_id')->unsigned()->index();
            $table->integer('property_id')->comment = "this id from plant hire or service tables";
            $table->integer('dynamic_property_id')->comment = "this id from dynamic properties on plant hire or service tables";
            $table->string('type')->comment = "for identify data saved tables for three data types (text, DD, MS)";
            $table->text('description')->nullable(true);

            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('hirer_request_items')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirer_request_item_properties');
    }
}
