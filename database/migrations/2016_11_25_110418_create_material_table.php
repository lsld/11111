<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('material', function (Blueprint $table) {

            $table->increments('id');


            $table->integer('resource_type_id')->unsigned()->index('resource_type_id');


            $table->integer('tenant_id')->unsigned()->index('tenant_id');


            $table->string('quality');


            $table->timestamps();


            $table->foreign('resource_type_id')
                ->references('id')
                ->on('material_types')
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
        //
        Schema::dropIfExists('material');
    }
}
