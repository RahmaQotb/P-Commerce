<?php

namespace App\Http\Controllers\Authentication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePassController extends Controller
{
    public function create(){
        return view("Auth.User.auth-change-password");
    }
    public function update(Request $request){
        $validated = $request->validate([
            "old_password"=>"required|current_password:web",
            "password"=>["required","string","min:6","confirmed",Password::defaults()]
        ]);
        $request->user()->update([
            "password"=>Hash::make($validated["password"])
        ]);
        Auth::guard("web")->logout();
        return redirect(url("/login"));
    }
}
