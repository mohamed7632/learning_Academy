<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Category;
class CourseController extends Controller
{
    function cat($id){
    $data['cat']=Category::findorfail($id);
    $data['courses']=Course::where('category_id',$id)->paginate(3);
    return view('front.courses.cat')->with($data);
    }
    function show($id,$cid){
        $data['course']=Course::findOrFail($cid);
  
         return view('front.courses.show')->with($data);

    }
}
