<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFillRequestRestDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `fill_request_rest_datas` CHANGE `distance` `distance` double(8,2) NULL DEFAULT \'0.00\' COMMENT \'if Can load and Carry is yes? value : \' AFTER `can_load_and_carry`;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
