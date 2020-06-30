<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Trainer;
use Image;

class TrainerController extends Controller
{
    public function index(){
        $data['trainers']=Trainer::select('id','name','phone','spec','img')->orderBy('id','DESC')->get();
        return view('admin.trainers.index')->with($data);
    }
    public function create(){
        return view('admin.trainers.create');
    }
    public function store(Request $request){
       $data=$request->validate([
          'name'=>'required|string|max:50',
          'phone'=>'nullable|string|max:20',
          'spec'=>'required|string|max:50',
          'img'=>'required|image|mimes:jpeg,png,jpg'
          
       ]);
       $new_img=$data['img']->hashName();
       Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_img));
       
       $data['img']=$new_img;
       
       Trainer::create($data);
       return redirect('Dashboard/trainers/');
    }

    public function edit($id){
        $data['trainer']=Trainer::findOrFail($id);
        return view('admin.trainers.edit')->with($data);
    }
    public function update(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'nullable|string|max:20',
            'spec'=>'required|string|max:50',
            'img'=>'nullable|image|mimes:jpeg,png,jpg'
        ]);
        $old_img=Trainer::findOrFail($request->id)->img;
        
        if($request->hasFile('img')){
            // image delete
          storage::disk('uploads')->delete('trainers/'.$old_img);
           // image creation
           
          $new_img=$data['img']->hashName();
          Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_img));
          $data['img']=$new_img;
        }
        else{
            $data['img']=$old_img;
        }
        Trainer::findOrFail($request->id)->update($data);
        return redirect('Dashboard/trainers/');
     }
     public function delete($id){
        $old_img=Trainer::findOrFail($id)->img;
        storage::disk('uploads')->delete('trainers/'.$old_img);
        Trainer::findOrFail($id)->delete();
        return redirect('Dashboard/trainers/');
     }
}
