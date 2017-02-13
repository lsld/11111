<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlansAddTrialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->boolean('is_trial')->default(false)->after('price_non_member');
            $table->integer('trial_value')->unsigned()->defalt(false)->after('is_trial');
            $table->string('trial_unit')->nullable()->comment('days, weeks, months')->after('trial_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('is_trial');
            $table->dropColumn('trial_value');
            $table->dropColumn('trial_unit');
        });
    }
}
