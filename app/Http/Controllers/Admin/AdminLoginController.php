<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AdminLoginRequest;
use App\Http\Requests\Auth\User\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        // dd('Admin login view reached');
        return view('Auth.Admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
{
    $admin = Admin::where('email',$request->email)->first();
    if($admin && Hash::check($request->password , $admin->password)){
        Auth::guard("admin")->login($admin);
        return redirect(url("admin/dashboard"));
    }
    return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        
        return redirect()->route('admin.login');
}
}