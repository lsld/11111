<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('entity_id');
            $table->string('entity_type');
            $table->string('duration');
            $table->text('description');
            $table->date('expiry_date');
            $table->integer('job_type_id')->unsigned()->index('job_type_id');
            $table->integer('state_id')->unsigned()->index('state_id');
            $table->integer('user_id')->unsigned()->index('user_id');
            $table->date('required_date');
            $table->string('status');
            $table->timestamps();

            $table->foreign('job_type_id')
                ->references('id')->on('job_types')
                ->onDelete('cascade');

            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('job_requests');
    }
}
