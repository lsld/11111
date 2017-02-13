<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id')->unsigned()->index('entity_id');
            $table->string('entity_type')->comment('eg: subscription_invoice');
            $table->boolean('status')->comment('1 = success, 0 = fail');;
            $table->text('attributes');
            $table->timestamps();



            $table->integer('payment_gateway_id')->unsigned()->index('payment_gateway_id');
            $table->foreign('payment_gateway_id')
                ->references('id')->on('payment_gateways')
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
        Schema::dropIfExists('payment_logs');
    }
}
