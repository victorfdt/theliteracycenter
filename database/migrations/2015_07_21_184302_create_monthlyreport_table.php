<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyreportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //Create the table
        Schema::create('monthly_reports', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('learner_name');
            $table->string('site');
            $table->integer('month');
            $table->integer('status')->default(1);
            $table->double('total_prep_time', 5, 2);
            $table->double('total_travel_time', 5, 2);
            $table->double('total_mileage', 5, 2);
            $table->text('goals_progress');
            $table->text('material_used')->nullabble();
            $table->text('comments')->nullabble();
            $table->boolean('goals_archieved')->default(false);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('monthly_reports');
    }
}
