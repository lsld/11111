<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanSubscriptionComponentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_subscription_component', function (Blueprint $table) {

            $table->integer('plan_id')->unsigned()->index();
            $table->foreign('plan_id')->references('id')
                ->on('plans')->onDelete('cascade');

            $table->integer('subscription_component_id')->unsigned()->index();
            $table->foreign('subscription_component_id')->references('id')
                ->on('subscription_components')->onDelete('cascade');

            $table->integer('quantity')->default(0);
            $table->boolean('is_limit')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plan_subscription_component');
    }
}
