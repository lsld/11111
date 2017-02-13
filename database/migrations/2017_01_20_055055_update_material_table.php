<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('material', function (Blueprint $table) {
            $table->dropForeign('material_resource_type_id_foreign');
            $table->dropColumn('resource_type_id');

            //new forignkey name for item_category_id
            $table->integer('main_category')->unsigned()->index('main_category');
            $table->foreign('main_category')
                ->references('id')->on('material_types')
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
        Schema::dropIfExists('material');
    }
}
