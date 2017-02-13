<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFillRequestRestData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fill_request_rest_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->unsigned()->index();
            $table->date('required_date');
            $table->float('quantity');
            $table->integer('number_of_sites');
            $table->integer('fill_type')->unsigned()->index();
            $table->integer('can_load_and_carry')->default(0)->comment('Yes or No');
            $table->float('distance')->default(0)->comment('if Can load and Carry is yes? value : ');
            $table->string('fill_quality');

            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('job_requests')->onDelete('cascade');
            $table->foreign('fill_type')->references('id')->on('fill_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fill_request_rest_datas');
    }
}
