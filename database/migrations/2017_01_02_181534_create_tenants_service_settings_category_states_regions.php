<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsServiceSettingsCategoryStatesRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tenants_service_settings_st_reg', function (Blueprint $table) {

            //tenants_service_settings_category_id
            $table->integer('ser_sett_id')->unsigned()->index('ser_sett_id');

            $table->integer('states_id')->unsigned()->index('states_id');

            $table->integer('regions_id')->unsigned()->index('regions_id');

            $table->timestamps();

            $table->foreign('ser_sett_id')
                ->references('id')->on('tenants_service_settings')
                ->onDelete('cascade');

            $table->foreign('states_id')
                ->references('id')->on('states')
                ->onDelete('cascade');

            $table->foreign('regions_id')
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
        Schema::dropIfExists('tenants_service_settings_st_reg');
    }
}
