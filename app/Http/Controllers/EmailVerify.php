<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerify extends Controller
{
    //return the view to send a request to verify
    public function verification_view(){
        return view('auth.verify-email');
    }
    public function sendverifivation( Request $request){
         $request->user()->sendEmailVerificationNotification();

         return back()->with('true','Email sent!');
    }
    public function verify_email(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->route('view.profile');
    }

}
