<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsServiceSettingsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tenants_service_settings_category', function (Blueprint $table) {
            $table->increments('id');
            //tenants_service_settings_id
            $table->integer('ser_sett_id')->unsigned()->index('ser_sett_id');
            $table->integer('category_id')->unsigned()->index('category_id');
            $table->timestamps();

            $table->foreign('ser_sett_id')
                ->references('id')->on('tenants_service_settings')
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
        Schema::dropIfExists('tenants_service_settings_category');
    }
}
