<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContracting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contracting', function (Blueprint $table) {

            $table->increments('id');


            $table->integer('work_type_id')->unsigned()->index('work_type_id');

            $table->text('description');

            $table->integer('tenant_id')->unsigned()->index('tenant_id');

            $table->timestamps();

            $table->foreign('work_type_id')
                ->references('id')->on('service_properties')
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
        Schema::dropIfExists('contracting');
    }
}
