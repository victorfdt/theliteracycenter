<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create the table
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day');
            $table->double('hours', 5, 2);
            $table->integer('monthly_report_id')->unsigned();
            $table->foreign('monthly_report_id')->references('id')->on('monthly_reports')->onDelete('cascade');
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
        Schema::drop('sessions');
    }
}
