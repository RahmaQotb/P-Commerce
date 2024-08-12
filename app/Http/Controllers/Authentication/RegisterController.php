<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view("Auth.User.auth-register");
    }

    public function store(RegisterRequest $request){
        $validated = $request->validated();
        $validated["password"]=Hash::make($validated["password"]);
        $user = User::create($validated);
        Auth::guard("web")->login($user);
        return redirect("");
    }
}
