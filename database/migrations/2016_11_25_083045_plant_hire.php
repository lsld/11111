<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlantHire extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plant_hire', function (Blueprint $table) {
            $table->increments('id');


            //ok
            $table->integer('item_category_id')->unsigned()->index('item_category_id');


            //ok
            $table->integer('hire_type_id');

            

            $table->integer('tenant_id')->unsigned()->index('tenant_id');



            $table->text('description');

            $table->integer('quantity');


            /*
             *
             *
             */

            $table->foreign('item_category_id')
                ->references('id')
                ->on('plant_hire_properties')
                ->onDelete('cascade');


/*--------------------------------------*/



            $table->foreign('tenant_id')
                ->references('id')->on('tenants')
                ->onDelete('cascade');


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
        //
        Schema::dropIfExists('plant_hire');
    }
}
