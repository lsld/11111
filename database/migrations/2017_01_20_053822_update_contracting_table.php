<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContractingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contracting', function (Blueprint $table) {
            $table->dropForeign('contracting_work_type_id_foreign');
            $table->dropColumn('work_type_id');

            $table->integer('main_category')->unsigned()->index('main_category');
            $table->foreign('main_category')
                ->references('id')->on('service_properties')
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
        Schema::dropIfExists('contracting');
    }
}
