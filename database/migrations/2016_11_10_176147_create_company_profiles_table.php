<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(true);
            $table->string('logo')->nullable(true);
            $table->string('phone_1')->nullable(true);
            $table->string('phone_2')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('website')->nullable(true);
            $table->text('projects')->nullable(true);
            $table->text('services')->nullable(true);
            $table->text('about')->nullable(true);
            $table->integer('company_id')->unsigned()->index('tenant_id');
            $table->integer('operating_category_id')->nullable(true)->unsigned()->index('operating_category_id');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');


            $table->foreign('operating_category_id')
                ->references('id')->on('operating_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}
