<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordManager extends Controller
{
    function forgetPassword(){
        return view(view: "forget-password");

    }

    function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => "required|email|exists:users"
        ]);

        $token = Str::random(64);

        $existingRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$existingRecord) {
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }



        Mail::send("emails.forget-password", ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route(name:"forget.password"))->with("Success", "We have send an email to reset password.");

    }

    function resetPassword($token){

        return view("new-password", compact('token'));

    }
    
    function resetPasswordPost(Request $request){
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|confirmed",
            "password_confirmation" => "required"
        ]);
    
        try {
            $hashedPassword = Hash::make($request->password);
            User::where("email", $request->email)->update(["password" => $hashedPassword]);
            DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();
        } catch (\Exception $e) {
            logger($e->getMessage());
            // Handle the exception (you might want to redirect or return an error response)
        }
    
        return redirect()->to(route(name:"login"))->with("Success", "Password has been changed");
    }
    
}
