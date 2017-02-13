<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlantHireRequestItem2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('ALTER TABLE `plant_hire_request_item_dropdown_datas` RENAME TO `hirer_request_item_dropdown_datas`;');
        DB::statement('ALTER TABLE `plant_hire_request_item_ms_data` RENAME TO `hirer_request_item_ms_datas`;');
        DB::statement('ALTER TABLE `plant_hire_request_item_text_datas` RENAME TO `hirer_request_item_text_datas`;');

        DB::statement('ALTER TABLE `hirer_request_item_dropdown_datas` DROP FOREIGN KEY `plant_hire_request_item_dropdown_datas_ph_rq_item_id_foreign`;');
        DB::statement('ALTER TABLE `hirer_request_item_dropdown_datas` CHANGE `ph_rq_item_id` `rq_item_id` int(10) unsigned NOT NULL AFTER `id`, ADD FOREIGN KEY (`rq_item_id`) REFERENCES `hirer_request_item_properties` (`id`);');

        DB::statement('ALTER TABLE `hirer_request_item_ms_datas` DROP FOREIGN KEY `plant_hire_request_item_ms_data_ph_rq_item_id_foreign`;');
        DB::statement('ALTER TABLE `hirer_request_item_ms_datas` CHANGE `ph_rq_item_id` `rq_item_id` int(10) unsigned NOT NULL AFTER `id`, ADD FOREIGN KEY (`rq_item_id`) REFERENCES `hirer_request_item_properties` (`id`);');

        DB::statement('ALTER TABLE `hirer_request_item_text_datas` DROP FOREIGN KEY `plant_hire_request_item_text_datas_ph_rq_item_id_foreign`;');
        DB::statement('ALTER TABLE `hirer_request_item_text_datas` CHANGE `ph_rq_item_id` `rq_item_id` int(10) unsigned NOT NULL AFTER `id`, ADD FOREIGN KEY (`rq_item_id`) REFERENCES `hirer_request_item_properties` (`id`);');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirer_request_item_dropdown_datas');
        Schema::dropIfExists('hirer_request_item_ms_datas');
        Schema::dropIfExists('hirer_request_item_text_datas');
    }
}
