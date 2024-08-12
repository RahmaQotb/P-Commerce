<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class AdminForgetPasswordController extends Controller{

        public function forgetpassword(){
            return view("Auth.Admin.forgot-password");
        }
        public function forgetpasswordPost(Request $request){
            $request->validate([
                'email' => 'email|required|exists:admins'
            ]);

            $token = Str::random(64);

            DB::table("password_reset_tokens")->insert([
                'email' => $request->email,
                'token' => $token,
            ]);

            Mail::to($request->email)->send(new ResetPassMail($token));

            return back()->with(
                "success" , "We have send an email to reset your password"
            );


        }

        
        public function resetpassword($token){
                return view("Auth.Admin.reset-password" , compact("token"));
        }

        public function resetpasswordPost(Request $request){

                $request->validate([
                'email' => 'email|required|exists:admins',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
                ]);

                $updatepass = DB::table("password_reset_tokens")
                ->where([
                "email"=>$request->email,
                "token"=> $request->token
                ])->first();

                if(!$updatepass){
                    return redirect()->to(route("admin.reset.password"));

                }
                Admin::where("email" , $request->email)
                ->update(["password" =>Hash::make($request->password)]);

                DB::table("password_reset_tokens")
                ->where(["email"=>$request->email])
                ->delete();

                return redirect()->to(route("admin.login"));

        }
}
