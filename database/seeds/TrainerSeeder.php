<?php

use Illuminate\Database\Seeder;
use App\Trainer;
class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([ 
            'name'=>'mohamed sherif',
            'spec'=>'web development',
            'img'=>'2.png'

        ]);
        Trainer::create([ 
            'name'=>'omar sherif',
            'spec'=>'web development',
            'img'=>'2.png'

        ]);
        Trainer::create([ 
            'name'=>'ahmed hossam',
            'spec'=>'dentist',
            'img'=>'2.png'

        ]);
        Trainer::create([ 
            'name'=>'sameh',
            'spec'=>'english teacher',
            'img'=>'2.png'

        ]);

    }
}
