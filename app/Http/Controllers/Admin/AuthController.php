<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view("admin.auth.login");

    }
    public function handelLogin(Request $request){
        //dd($request);
        $data=$request->validate([
            'email' => 'required|email|max:191',
            'password' =>'required|string',
            ]);
       
      if(!Auth()->guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
        return back();
      }
      else{
          return redirect('/Dashboard');
      }
       
             
     }

public function logout(){
    //using Auth() helper function to avoid making use Auth
    Auth()->guard('admin')->logout();
    return redirect('Dashboard/login');
}


}
