<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuplierMyQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->double('price', 15, 8);
            $table->date('expiry_date');
            $table->tinyInteger('status')->default(0);
            $table->integer('job_request_id')->unsigned()->index('job_request_id');
            $table->integer('tenant_id')->unsigned()->index('tenant_id');
            $table->boolean('is_drafted');
            $table->timestamps();

            $table->foreign('job_request_id')
                ->references('id')->on('job_requests')
                ->onDelete('cascade');

            $table->foreign('tenant_id')
                ->references('id')->on('tenants')
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
        Schema::dropIfExists('quotes');
    }
}
