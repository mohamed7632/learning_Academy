<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Trainer;
use App\Test;
use App\SiteContent;
class HomePageController extends Controller
{
    public function index(){
        $data['banner']=SiteContent::select('content')->where('name','banner')->first();
        $data['course_content']=SiteContent::select('content')->where('name','courses')->first();

        $data['courses']=Course::select('id','name','small_desc','category_id','trainer_id','img','price')
        ->orderBy('id','desc')->take(3)->get();
        //counter
       $data['course_count']=Course::count();
       $data['trainer_count']=Trainer::count();
       $data['Student_count']=Student::count();

       $data['test']=Test::select('name','spec','desc','img')->get();
  
        return view('front.index')->with($data);
       
    }
}
