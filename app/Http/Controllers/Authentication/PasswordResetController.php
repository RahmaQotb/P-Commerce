<?php

namespace App\Http\Controllers\Authentication;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use App\Mail\ResetPassMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function create()
    {
        return view('Auth.User.auth-forgot-password');
    }
    public function store(Request $request)
    {


        $email = $request->validate([
            "email" => "required|email|exists:users"
        ]);
        $token = Str::random(64);
        Mail::to($request->email)->send(new ResetPassMail($token));



        DB::table("password_reset_tokens")->insert([
            "email" => $email["email"],
            "token" => $token
        ]);

        return redirect()->back()->with("success", "We Have Sent email to Reset Password");
    }

    public function show($token)
    {
        return view("Auth.User.reset-pass-form", compact("token"));
    }
    public function reset(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email|exists:users",
            "password" => ["required", "min:6", "confirmed"]
        ]);
        /*$token_row = DB::table("password_reset_tokens")->where([
            "email"=>$request->email,
            "token"=>$request->token
        ])->first();*/
        $token_row = DB::table("password_reset_tokens")->where([
            "email" => $request->email,
            "token" => $request->token
        ])->first();

        if (!$token_row) {
            DB::table("password_reset_tokens")->where([
                "email" => $request->email
            ])->delete();
            return redirect(url("login"))->with("failed","cant make token");
        }
        $password = Hash::make($validated["password"]);
        User::where("email", $validated["email"])->update(["password" => $password]);

        /*DB::table("password_reset_tokens")->where([
            "email"=>$request->email
        ])->delete();*/

        DB::table("password_reset_tokens")->where([
            "email" => $request->email
        ])->delete();

        return redirect(url("login"));
    }

}
