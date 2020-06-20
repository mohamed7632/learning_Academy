<?php

use Illuminate\Database\Seeder;
use App\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=1;$i<=3;$i++){
           for($j=1;$j<=4;$j++){
            Course::create([
                'category_id'=>$i,
                'trainer_id'=>rand(1,4),
                'name'=>"course num $j category $i",
                'small_desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel ipsum ut mauris congue mattis vitae ',
                 'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel ipsum ut mauris congue mattis vitae at ante. Ut eu porttitor odio. Suspendisse gravida lacus eget semper imperdiet. Proin finibus id mauris sit amet sollicitudin. Aenean eu mi vel mi sodales dapibus. Sed hendrerit luctus viverra. Fusce viverra congue porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam vitae turpis dui. Suspendisse faucibus pulvinar facilisis. Pellentesque rhoncus hendrerit urna semper blandit.

                 Proin quis elit lectus. Pellentesque suscipit lacus augue, sed viverra turpis pharetra vitae. Suspendisse vel venenatis dolor, sit amet viverra libero. Proin in ligula neque. Duis iaculis congue enim, eu volutpat nibh rhoncus a. Nunc eros erat, mattis non turpis ultrices, sagittis suscipit metus. Sed quis interdum urna. Suspendisse dictum lorem tellus, eget bibendum turpis pretium id.
                 
                 Proin sed faucibus lorem. Suspendisse ac elit nunc. Quisque viverra magna rutrum sem imperdiet venenatis. Mauris pulvinar est ac enim rhoncus faucibus. Cras sagittis sed magna eu placerat. Quisque et turpis in libero aliquet bibendum. Cras a arcu euismod, molestie velit eu, mollis velit. Curabitur a felis facilisis, consequat leo quis, maximus nulla. Maecenas scelerisque erat eu venenatis rutrum. Nam ac elementum augue.',

            'price'=>rand(1000,5000),
                 'img'=>"$i$j.png"
            ]);
           }
       }
    }
}
