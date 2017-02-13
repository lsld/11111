<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlantHireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plant_hire', function (Blueprint $table) {
            $table->integer('job_requests_id')->nullable()->unsigned()->index('job_requests_id');
            $table->foreign('job_requests_id')
                ->references('id')->on('job_requests')
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
        Schema::table('plant_hire', function (Blueprint $table) {
            //
        });
    }
}
