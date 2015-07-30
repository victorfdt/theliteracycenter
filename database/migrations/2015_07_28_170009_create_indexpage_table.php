<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexpageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create the table
        Schema::create('index_page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub_title')->nullabble();
            $table->string('date');
            $table->text('content');
            $table->string('path')->nullabble();;
            $table->string('image_align')->nullabble();;
            $table->integer('status')->default(2); //The post starts as offline.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('index_page');
    }
}
