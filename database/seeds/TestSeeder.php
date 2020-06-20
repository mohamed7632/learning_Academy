<?php

use Illuminate\Database\Seeder;
use App\Test;
class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
            'name'=>'mohamed',
            'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel ipsum ut mauris congue mattis vitae',
            'img'=>'2.png',
        ]);
        Test::create([
            'name'=>'mohamed',
            'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel ipsum ut mauris congue mattis vitae',
            'img'=>'1.png',
        ]);
        Test::create([
            'name'=>'mohamed',
            'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel ipsum ut mauris congue mattis vitae',
            'img'=>'3.png',
        ]);
        Test::create([
            'name'=>'ahmed',
            'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel ipsum ut mauris congue mattis vitae',
            'img'=>'2.png',
        ]);
    }
}
