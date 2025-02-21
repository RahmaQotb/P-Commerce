<?php

namespace App\Http\Controllers\Api\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use App\Services\Api\Auth\User\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    public function __construct(
        protected UserAuthService $userAuthService
    ) {}

    public function register(RegisterRequest $request)
    {
        [$token, $user] = $this->userAuthService->register($request);

        return response()->json([
            'success' => 'You Registered Successfully',
            'data' => $user,
            'token' => $token,
        ]);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
        ]);
    }
    public function profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' ,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('image')) {
            if ($user->hasMedia('images')) {
                $user->clearMediaCollection('images');
            }
            $user->addMedia($request->file('image'))->toMediaCollection('images');
        }
        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ], 200);
    }
}