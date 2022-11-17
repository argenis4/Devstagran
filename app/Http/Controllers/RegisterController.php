<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    //

     public function index(){

return view('auth.register');
    }

   public function store(Request $request){
       // dd($request);
        //dd($request->get('username'));
        //validación  
        $request ->request->add(['username'=> Str::slug($request->username)]);

        $this->validate($request,  [
            'name'=>'required|max:30',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6',
        ]);
        // se usa para hashear la contraseña
         //Hash::make  
        

        User::create([
              'name'=> $request->name,
              'username'=> $request->username,
              'email'=> $request->email,
              'password'=> Hash::make( $request->password),
             
        ]);

        //autenticar usuarrio con helper 
/*
          auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
          ]);
          */

        auth()->attempt($request->only('email','password'));

        //redirecionar 

        return redirect()->route('posts.index');
    }
}
