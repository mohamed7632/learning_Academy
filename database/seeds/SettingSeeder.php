<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name'=>'learning academy',
            'logo'=>'logo.png',
            'favicon'=>'favicon.png',
             'city'=>'cairo,egypt',
             'address'=>'1 el maniel',
             'phone'=>'01117858476',
             'work_hours'=>'sun to thurs 7am to 3pm',
             'email'=>'mohamedsherif763@gmail.com',
             'map'=>'map here',
             'fb'=>'https://www.facebook.com',
             'twitter'=>'https://www.twitter.com',
             'insta'=>'https://www.instagram.com',


        ]);
    }
}
