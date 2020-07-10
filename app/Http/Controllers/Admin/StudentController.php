<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
class StudentController extends Controller
{
    public function index(){
        $data['students']=Student::select('id','name','email','spec')->orderBy('id','DESC')->paginate(6);
        return view('admin.students.index')->with($data);
    }
    public function create(){
        return view('admin.students.create');
    }
    public function store(Request $request){
       $data=$request->validate([
          'name'=>'required|string|max:50',
          'email'=>'required|email|max:191|unique:students',
          'spec'=>'nullable|string'
       ]);
       Student::create($data);
       return redirect('Dashboard/students/');
    }
    public function edit($id){
        $data['student']=Student::findOrFail($id);
        return view('admin.students.edit')->with($data);
    }
    public function update(Request $request){
        $data=$request->validate([
         'name'=>'required|string|max:50',
         'email'=>'required|email|max:191|unique:students',
         'spec'=>'nullable|string'
        ]);
        Student::findOrFail($request->id)->update($data);
        return redirect('Dashboard/students/');
     }
     public function delete($id){
      Student::findOrFail($id)->delete();
        return redirect('Dashboard/students/');
     }
     public function showCourses($id){
         $data['courses']=Student::findOrFail($id)->courses;
         $data['student_id']=$id;
         return view('admin.students.showcourses')->with($data);
     }
     public function approveCourse($id,$c_id){
     DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update(['status'=>'approve']);
     return back();
   
     }
     public function addToCourse($id){
         $data['student_id']=$id;
         $data['courses']=Course::select('id','name')->get();
         return view('admin.students.addtocourse')->with($data);
     }
     public function storeCourse($id,Request $request){
        $data=$request->validate([
               'course_id'=>'required|exists:courses,id',
               
           ]);
           Db::table('course_student')->insert([
            'student_id'=>$id,
            'course_id'=>$data['course_id']
           ]);
           return redirect(route('Admin.students.showCourses',$id));
     }
}
