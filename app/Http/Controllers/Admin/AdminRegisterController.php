<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminRegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Auth.Admin.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(AdminRegisterRequest $request): RedirectResponse
    {
        $validated=$request->validated();
       if($validated){
        $validated['password'] = Hash::make($validated['password']);
        $admin = Admin::create($validated);
        Auth::guard("admin")->login($admin);

        return redirect()->route("Admin.home");
       }
       return back();
    }
}
