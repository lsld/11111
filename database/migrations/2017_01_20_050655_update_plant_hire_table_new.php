<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlantHireTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('plant_hire', function (Blueprint $table) {


            //drop the foreign key item_category_id
            /*$table->dropForeign('local_table_foreign_id_foreign');
            $table->dropColumn('foreign_id');*/
            $table->dropForeign('plant_hire_item_category_id_foreign');
            $table->dropColumn('item_category_id');

            //new forignkey name for item_category_id
            $table->integer('main_category')->unsigned()->index('main_category');
            $table->foreign('main_category')
                ->references('id')->on('plant_hire_properties')
                ->onDelete('cascade');

            $table->integer('job_type')->unsigned()->index('job_type');
            $table->foreign('job_type')
                ->references('id')->on('job_types')
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
        Schema::dropIfExists('plant_hire');
    }
}
