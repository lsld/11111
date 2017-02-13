<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlantHireRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plant_hire_requests', function (Blueprint $table) {
            $table->integer('request_id')->unsigned()->index();
            $table->foreign('request_id')->references('id')->on('job_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plant_hire_requests', function (Blueprint $table) {
            //
        });
    }
}
