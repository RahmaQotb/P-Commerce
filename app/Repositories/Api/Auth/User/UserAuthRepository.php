<?php

namespace App\Repositories\Api\Auth\User;

use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAuthRepository implements UserAuthRepositoryInterface
{
    public function register(RegisterRequest $request)
    {

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::guard('web')->login($user);
        $token = $user->createToken('API Token of ' . $user->name)->plainTextToken;

        return [$token, $user];
    }
    public function profile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);
        if (!$validated) {
            return response()->json([
                'msg' => 'Try Again!',
            ]);
        }

        $user = $request->user();

        $user->name = $validated['name'];
        $user->save();

        if ($request->hasFile('image')) {
            if ($user->hasMedia('images')) {
                $user->clearMediaCollection('images');
            }

            $user->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return $user;
    }
}
