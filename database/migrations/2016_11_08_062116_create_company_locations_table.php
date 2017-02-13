<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable(true);
            $table->string('street_address_1');
            $table->string('street_address_2')->nullable(true);
            $table->integer('states_id')->unsigned()->index('states_id');
            $table->integer('regions_id')->unsigned()->index('regions_id');
            $table->integer('company_id')->unsigned()->index('company_id');
            $table->string('suburb')->nullable(true);
            $table->string('post_code')->nullable(true);
            $table->string('phone');
            $table->string('mobile')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('membership_id')->nullable(true);
            $table->string('type');
            $table->timestamps();


            $table->foreign('states_id')
                ->references('id')->on('states')
                ->onDelete('cascade');

            $table->foreign('regions_id')
                ->references('id')->on('regions')
                ->onDelete('cascade');

            $table->foreign('company_id')
                ->references('id')->on('companies')
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
        Schema::dropIfExists('company_locations');
    }
}
