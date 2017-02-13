<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlantHireRequestItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `plant_hire_request_items` RENAME TO `hirer_request_items`;');
        DB::statement('ALTER TABLE `hirer_request_items` ADD `job_type_id` int(10) unsigned NOT NULL AFTER `id`, ADD FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`);');
        DB::statement('ALTER TABLE `hirer_request_items` CHANGE `plant_hire_rq_id` `request_id` int(10) unsigned NOT NULL AFTER `job_type_id`;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirer_request_items');
    }
}
