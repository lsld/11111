<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name')->nullable();
            $table->decimal('price_member', 10, 3)->nullable();
            $table->decimal('price_non_member', 10, 3)->nullable();

            $table->integer('subscription_category_id')->unsigned()->index();
            $table->foreign('subscription_category_id')->references('id')
                ->on('subscription_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plans');
    }
}
