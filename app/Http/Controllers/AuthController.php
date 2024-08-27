<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //register a new user
    public function register(Request $request,User $user){
        $field=$request->validate([
            'username'=>['required','min:6'],
            'email'=>['email','required'],
            'password'=>['required','confirmed'],
            'image'=>['image','mimes:png,jpg,jpeg']
        ]);
        $path=null;
        if($request->has('image')){
            $path=Storage::disk('public')->put('profile_images',$request->image);
        }
        else{
            $path='system_images/user.png';
        }
        $field['image_path']=$path;

       $user=User::create($field);

       Auth::login($user);

       event(new Registered($user));

       return redirect()->route('verification.notice');
    }
    //login
    public function login(Request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ],$request->filled('remember'))){
           return redirect()->route('view.profile');
        }
        else{
            return back()->with('false','these infos does not match our records');
        }
    }
    //logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }
}
