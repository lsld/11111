<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLocationRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('company_location_region', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_location_id')->unsigned()->index('company_location_id');
            $table->integer('region_id')->unsigned()->index('region_id');

            $table->foreign('company_location_id')
                ->references('id')->on('company_locations')
                ->onDelete('cascade');

            $table->foreign('region_id')
                ->references('id')->on('regions')
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
        //
        Schema::dropIfExists('company_location_region');
    }
}
