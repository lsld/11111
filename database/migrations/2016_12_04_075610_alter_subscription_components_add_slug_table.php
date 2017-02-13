<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSubscriptionComponentsAddSlugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_components', function (Blueprint $table) {
            $table->string('slug')->unique('subscription_components_slug_unique')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_components', function (Blueprint $table) {
            $table->dropIndex('subscription_components_slug_unique');
            $table->dropColumn('slug');
        });
    }
}
