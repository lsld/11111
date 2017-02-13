<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTenantsServiceSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('tenants_service_settings', function (Blueprint $table) {


            $table->integer('job_type_id')->unsigned()->index()->after('id')->comment('FK with job type ');

            $table->text('supp_serv_ids')->after('tenant_id')->comment('list of services ids, FKs with supplier services tables');
            $table->text('states_ids')->after('supp_serv_ids')->comment('list of states id list');
            $table->text('regions_ids')->after('states_ids')->comment('list of regions id list');

            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('tenants_service_settings', function (Blueprint $table) {
            $table->dropColumn('job_type_id');
            $table->dropColumn('supp_serv_ids');
            $table->dropColumn('states_ids');
            $table->dropColumn('regions_ids');
        });
        Schema::enableForeignKeyConstraints();
    }
}
