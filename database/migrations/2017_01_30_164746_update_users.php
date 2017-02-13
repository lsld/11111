<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            $table->text('admin_states_ids')->nullable()->after('status')->comment('Admin users states list');
            $table->integer('admin_user_role')->nullable()->after('admin_states_ids')->comment('Admin user roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admin_states_ids');
            $table->dropColumn('admin_user_role');
        });
        Schema::enableForeignKeyConstraints();
    }
}
