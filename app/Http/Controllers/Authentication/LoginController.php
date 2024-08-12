<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function create(){
        return view("Auth.User.auth-login");
    }
    public function store(LoginRequest $request){
        $validated = $request->validated();
        
        if(!Auth::attempt($request->only("email","password"))){
            return redirect()->back()->with("failed","Credientials not correct");
        }
        else{
            //$request->session()->regenerate();
            //return redirect()->intended(View::make("User.index"));
            return view("User.index");
        }

    }
}
