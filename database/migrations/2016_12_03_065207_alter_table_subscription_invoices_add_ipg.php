<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSubscriptionInvoicesAddIpg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_invoices', function (Blueprint $table) {
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
        Schema::table('subscription_invoices', function (Blueprint $table) {
            $table->dropForeign('subscription_invoices_payment_gateway_id_foreign');
            $table->dropIndex('payment_gateway_id');
            $table->dropColumn('payment_gateway_id');
        });
    }
}
