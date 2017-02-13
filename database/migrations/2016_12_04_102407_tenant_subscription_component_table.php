<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TenantSubscriptionComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_subscription_component', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumption')->default(0);
            $table->timestamps();

            $table->integer('subscription_component_id')->unsigned()->index();
            $table->foreign('subscription_component_id')->references('id')
                ->on('subscription_components')->onDelete('cascade');

            $table->integer('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')
                ->on('tenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant_subscription_component');
    }
}
