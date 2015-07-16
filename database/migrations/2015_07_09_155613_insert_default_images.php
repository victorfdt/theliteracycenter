<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Image;

class InsertDefaultImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('images')->insert([            
                ['name' => 'Main 1', 'type' => '1', 'order' => 1, 'path' => Image::DIRECTORY . '/default/' . 'Main 1.jpg',  'link' => ''],
                ['name' => 'Main 2', 'type' => '1', 'order' => 2, 'path' => Image::DIRECTORY . '/default/' . 'Main 2.jpg',  'link' => ''],
                ['name' => 'General', 'type' => '2', 'order' => 0, 'path' => Image::DIRECTORY . '/default/' . 'general.jpg',  'link' => ''],
                ['name' => 'Footer', 'type' => '5', 'order' => 0, 'path' => Image::DIRECTORY . '/default/' . 'Footer.png',  'link' => ''],
                ['name' => 'Logo',   'type' => '4', 'order' => 0, 'path' => Image::DIRECTORY . '/default/' . 'Logo.jpg',  'link' => ''],
                ['name' => 'Paypal', 'type' => '3', 'order' => 1, 'path' => Image::DIRECTORY . '/default/' . 'paypal.png',  'link' => 'https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=J9P2aVzxziHIBEc0ikzJL-T8liOjdc03LyKDPQ0RkrnQ6Jr1KhCkmr1R1Wq&dispatch=5885d80a13c0db1f8e263663d3faee8de6030e9239419d79c3f52f70a3ed57ec'],
                ['name' => 'Amazon Smile', 'type' => '3', 'order' => 2, 'path' => Image::DIRECTORY . '/default/' . 'amazon.jpg',  'link' => 'http://smile.amazon.com/ch/35-2088005'],
                ['name' => 'ProLiteracy', 'type' => '3', 'order' => 3, 'path' => Image::DIRECTORY . '/default/' . 'proliteracy.jpg',  'link' => 'http://www.proliteracy.org'],
                ['name' => 'Help', 'type' => '3', 'order' => 4, 'path' => Image::DIRECTORY . '/default/' . 'gethelp.png',  'link' => '']                                   
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
