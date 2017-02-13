<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForConstructingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `hirer_request_item_dropdown_datas` DROP FOREIGN KEY `plant_hire_request_item_dropdown_datas_option_id_foreign`;');
        DB::statement('ALTER TABLE `hirer_request_item_dropdown_datas` DROP FOREIGN KEY `plant_hire_request_item_dropdown_datas_d_p_id_foreign`;');

        DB::statement('ALTER TABLE `hirer_request_item_ms_datas` DROP FOREIGN KEY `plant_hire_request_item_ms_data_option_id_foreign`;');
        DB::statement('ALTER TABLE `hirer_request_item_ms_datas` DROP FOREIGN KEY `plant_hire_request_item_ms_data_d_p_id_foreign`;');

        DB::statement('ALTER TABLE `hirer_request_item_rb_datas` DROP FOREIGN KEY `hirer_request_item_rb_datas_rq_item_id_foreign`;');
        DB::statement('ALTER TABLE `hirer_request_item_rb_datas` DROP FOREIGN KEY `hirer_request_item_rb_datas_option_id_foreign`;');

        DB::statement('ALTER TABLE `hirer_request_item_text_datas` DROP FOREIGN KEY `plant_hire_request_item_text_datas_d_p_id_foreign`;');

        DB::statement('ALTER TABLE `hirer_request_items` DROP FOREIGN KEY `plant_hire_request_items_properties_id_foreign`;');

        //DB::statement('');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
