<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFillRequestRestDatas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `fill_request_rest_datas` CHANGE `distance` `distance` varchar(255) NULL DEFAULT null COMMENT \'if Can load and Carry is yes? value : \' AFTER `can_load_and_carry`;');

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
