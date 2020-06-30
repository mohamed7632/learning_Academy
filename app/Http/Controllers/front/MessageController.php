<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Newsletter;
use App\message;
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
}
