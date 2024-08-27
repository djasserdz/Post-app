<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    //delete user
    public function delete(Request $request,User $user){
        $user=auth()->user();
       $image_path=auth()->user()->image_path;
       if($image_path!='system_images/user.png'){
        File::delete('storage/'.$image_path);
       }
       $user->forceDelete();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect()->route('view.login');
    }

    //update email/username
    public function update_email_username(Request $request,User $user){
        $user=auth()->user();

       $request->validate([
        'username'=>['required'],
        'email'=>['required']
       ]);
       $user->update([
        'username'=>$request->input('username'),
        'email'=>$request->input('email'),
       ]);

       return back()->with('true','informations updated!');
    }
    //update password
    public function update_password(Request $request,User $user){
        $user=auth()->user();
        $password=$user->password;
        $request->validate([
            'current_password'=>['required'],
            'password'=>['required','confirmed'],
        ]);

        if(password_verify($request->input('current_password'),$password)){
             $user->update(['password'=>$request->input('password')]);
             return back()->with('true','Password updated!');
        }else{
            return back()->with('false','incorrect password');
        }
    }
}
