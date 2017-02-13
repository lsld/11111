<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoriesTable extends Migration
{
    public function up(){

        Schema::create('item_categories', function (Blueprint $table) {

            $table->increments('id');

            $table->string('type');

            $table->string('name');

            $table->text('description');

            $table->timestamps();
        });
    }


    public function down(){
        //
        Schema::dropIfExists('item_categories');
    }
}