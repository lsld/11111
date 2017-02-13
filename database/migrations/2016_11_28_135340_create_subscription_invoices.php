<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no')->default(0);
            $table->boolean('status')->default(0);
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->integer('tenant_id')->unsigned()->index('tenant_id');
            $table->integer('plan_id')->unsigned()->index('plan_id');

            $table->foreign('tenant_id')
                ->references('id')->on('tenants')
                ->onDelete('cascade');
            
            $table->foreign('plan_id')
                ->references('id')->on('plans')
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
        Schema::dropIfExists('subscription_invoices');
    }
}
