<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Category;
use App\Trainer;
use Image;

class CoursesController extends Controller
{
    public function index(){
        $data['courses']=Course::select('id','name','price','img')->orderBy('id','DESC')->paginate(4);
        return view('admin.courses.index')->with($data);
    }
    public function create(){
        $data['cats']=Category::select('id','name')->get();
        $data['trainers']=Trainer::select('id','name')->get();

        return view('admin.courses.create')->with($data);
    }
    public function store(Request $request){
       $data=$request->validate([
          'name'=>'required|string|max:50',
          'small_desc'=>'required|string|max:191',
          'desc'=>'required|string',
          'price'=>'required|integer',
          'category_id'=>'required|exists:categories,id',
          'trainer_id'=>'required|exists:trainers,id',
          'img'=>'required|image|mimes:jpeg,png,jpg'
          
       ]);
      // dd($data);
       $new_img=$data['img']->hashName();
       Image::make($data['img'])->resize(360,330)->save(public_path('uploads/courses/'.$new_img));
       
       $data['img']=$new_img;
       
       Course::create($data);
       return redirect('Dashboard/courses/');
    }

    public function edit($id){
        $data['cats']=Category::select('id','name')->get();
        $data['trainers']=Trainer::select('id','name')->get();
        $data['course']=Course::findOrFail($id);
        return view('admin.courses.edit')->with($data);
    }
    public function update(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:50',
          'small_desc'=>'required|string|max:191',
          'desc'=>'required|string',
          'price'=>'required|integer',
          'category_id'=>'required|exists:categories,id',
          'trainer_id'=>'required|exists:trainers,id',
          'img'=>'nullable|image|mimes:jpeg,png,jpg'
        ]);
        $old_img=Course::findOrFail($request->id)->img;
        
        if($request->hasFile('img')){
            // image delete
          storage::disk('uploads')->delete('courses/'.$old_img);
           // image creation
           
          $new_img=$data['img']->hashName();
          Image::make($data['img'])->resize(50,50)->save(public_path('uploads/courses/'.$new_img));
          $data['img']=$new_img;
        }
        else{
            $data['img']=$old_img;
        }
        Course::findOrFail($request->id)->update($data);
        return redirect('Dashboard/courses/');
     }
     public function delete($id){
        $old_img=Course::findOrFail($id)->img;
        storage::disk('uploads')->delete('courses/'.$old_img);
        Course::findOrFail($id)->delete();
        return redirect('Dashboard/courses/');
     }
}
