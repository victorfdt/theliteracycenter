<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDefaultAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert default admin - PASSWORD = 123456       
        DB::table('users')->insert(
            array(
                    array('name' => 'Bob', 'surname' => 'Admin', 'email' => 'admin@litcenter.org', 'password' => '$2y$10$mHE2H5npzU6ZysOszFw5WOLh3chXn6N1reC4tVsr7EmTWGIQlg8EG', 'gender' => 'm')                                           
        ));

        // Insert default admin role       
        DB::table('roles')->insert(
            array(
                    array('privilege' => '1', 'user_id' => '1')                                           
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->where('privilege', '1')->delete();
        DB::table('users')->where('name', 'Bob')->delete();
    }
}
