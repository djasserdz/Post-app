<?php

namespace App\Http\Controllers;




use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class googleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        $google_user = Socialite::driver('google')->fields(['birthday'])->stateless()->user();
        dd($google_user);




        $user = User::updateOrCreate(
            ['email' => $google_user->email],
            [
                'username' => $google_user->name,
                'email' => $google_user->email,
                'image_path' =>'system_images/user.png',
            ]
        );

        Auth::login($user);


        $user->google()->updateOrCreate(
            ['google_id' => $google_user->id],
            [
                'google_token' => $google_user->token,
            ]
        );

        // Redirect to the password setup route
        return redirect()->route('set.password');
    }
    public function set_password(Request $request,User $user){
        $user=auth()->user();
        $request->validate([
           'password'=>["required",'confirmed'],
        ]);
        $user->update(['password'=>$request->input('password')]);

        event(new Registered($user));
        return redirect()->route('view.profile');
   }
}
