<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJobRequests2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `job_requests` DROP `code`;');
        DB::statement('UPDATE `job_requests` SET `duration` = "";');
        DB::statement('ALTER TABLE `job_requests` CHANGE `duration` `duration` int NOT NULL AFTER `entity_type`;');
        DB::statement("ALTER TABLE `job_requests` ADD `street_address` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL AFTER `entity_type`;");
        DB::statement("ALTER TABLE `job_requests` ADD `suburb` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL AFTER `street_address`;");
        DB::statement("ALTER TABLE `job_requests` ADD `post_code` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL AFTER `suburb`;");
        DB::statement("ALTER TABLE `job_requests` ADD `regions_id` int unsigned NOT NULL AFTER `state_id`;");

        /**/
        DB::statement("ALTER TABLE `hirer_request_items` DROP FOREIGN KEY `plant_hire_request_items_plant_hire_rq_id_foreign`;");
        DB::statement("ALTER TABLE `hirer_request_items` ADD FOREIGN KEY (`request_id`) REFERENCES `job_requests` (`id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_requests');
    }
}
