<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fill', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('fill_type_id')->unsigned()->index('fill_type_id');


            $table->string('fill_quality');


            $table->string('can_load_and_carry');


            $table->integer('tenant_id')->unsigned()->index('tenant_id');


            $table->timestamps();



            $table->foreign('fill_type_id')
                ->references('id')->on('fill_types')
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
        Schema::dropIfExists('fill');
    }
}
