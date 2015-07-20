<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('function');
            $table->integer('contract');
            $table->boolean('payed')->default(false);
            $table->text('description')->nullabble();
            $table->text('responsabilities')->nullabble();
            $table->text('requirements')->nullabble();
            $table->text('skills')->nullabble();
            $table->boolean('active')->default(true); 
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
        Schema::drop('job_opportunities');
    }
}
