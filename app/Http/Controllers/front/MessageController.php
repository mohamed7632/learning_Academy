<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Newsletter;
use App\message;
use App\Student;
use App\Course;
class MessageController extends Controller
{
    function newsletter(Request $request){
     $data=\Validator::make($request->all(),[
     'email'=>'required|email'
     ]);
    
    if($data->fails()){
        return back()->withErrors($data);
        
    }
    else{
        $Newsletter=new Newsletter();
        $Newsletter->email=$request->email;
        $Newsletter->save();
        //return redirect('message/newsletter');
        return back();
    }
}


function contact(Request $request){
    $data=\Validator::make($request->all(),[
        'name'=>'required|email|string|max:191',
        'email'=>'required|string|max:191',
        'subject'=>'nullable|string|max:191',
        'message'=>'required|max:10000'

    ]);
   
   
       
    message::create($data);
       //return redirect('message/contact');
       return back();
   
}

public function enroll(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:191',
        'email' => 'required|email',
        'spec' => 'nullable|string',
        'course_id' => 'required|exists:courses,id'
    ]);


    $old_student = Student::where('email' , $request->email)->first();
    if($old_student == Null)
    {
        $student = new Student();
        $student->name = $data['name'];
        $student->email= $data['email'];
        $student->spec= $data['spec'];
        $student->save();

        $student_id=$student->id;
     }
     else{
        $student_id=$old_student->id;
        if($data['name']!=null){
            $old_student->update(['name'=>$data['name']]);
        }
        if($data['spec']!=null){
            $old_student->update(['spec'=>$data['spec']]);
        }
     }
     DB::table('course_student')->insert([
       'course_id'=>$data['course_id'],
        'student_id'=>$student_id,
        'created_at'=>now(),
        'updated_at'=>now()
     ]);
     return back();
     

 }

}
