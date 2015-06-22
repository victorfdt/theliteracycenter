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
        // Insert default roles        
        DB::table('users')->insert(
            array(
                    array('name' => 'admin', 'email' => 'admin@litcenter.org', 'password' => '123', 'gender' => 'm', 'roles_id' => '1')                                           
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('name', 'admin')->delete();
    }
}
