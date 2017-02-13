<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_coordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_id');
            $table->string('address_type');
            $table->decimal('latitude', 11, 7);
            $table->decimal('longitude', 11, 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_coordinates');
    }
}
