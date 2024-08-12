<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\changePassRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    
//     public function testview()
// {
//     return view("Admin.profile.change-password");
// }

    public function changePassword(){
        return view('Admin.profile.change-password');    
    }

    public function updatePassword(changePassRequest $request ){
       /** @var \App\Models\Admin $admin **/
       //tell PHP intelephense that $user variable is not Illuminate\Foundation\Auth\User but \App\Models\User
        $admin = Auth::guard('admin')->user();
      
        if (!Hash::check($request->Oldpassword, $admin->password)) {
            return redirect()->back()->withErrors(['Oldpassword' => " Your old password isn't correct."]);
        }

        $admin->update(['password' => Hash::make($request->Newpassword)]);
        

        return redirect(url("admin/dashboard"))->with('success', 'Password successfully updated.');
    }
}
